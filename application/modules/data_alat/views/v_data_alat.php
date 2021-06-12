<script>
    $(document).ready(function() {
        const formInput = $('#insert_data_alat_form');
        const formEdit = $('#edit_alat_form');
        getData();

        formInput.validate({
            rules: {
                insert_merk_alat: "required",
                insert_tahun_beli: "required",
                insert_seri_alat: "required",
                insert_jumlah_alat: "required",
                insert_kondisi_alat: "required"
            },
            messages: {
                insert_merk_alat: "Masukkan merk alat !",
                insert_tahun_beli: "Masukkan tahun beli !",
                insert_seri_alat: "Masukkan seri alat !",
                insert_jumlah_alat: "Masukkan jumlah alat !",
                insert_kondisi_alat: "Pilih kondisi alat !",
            },
            submitHandler: function(formInput) {
                Notiflix.Confirm.Show('Konfirmasi Input', 'Apakah data yang diinputkan sudah benar ?', 'Ya', 'Tidak',
                    function() {
                        // Yes button callback alert('Thank you.'); 
                        let initialForm = $("#insert_data_alat_form")[0];
                        let formData = new FormData(initialForm);
                        insertData(formData);
                    },
                    function() {
                        // No button callback alert('If you say so...'); 
                        return;
                    }
                );
            }
        });

        formEdit.validate({
            rules: {
                form_edit_merk_alat: "required",
                form_edit_tahun_beli: "required",
                form_edit_seri_alat: "required",
                form_edit_jumlah_alat: "required",
                form_edit_kondisi_alat: "required"
            },
            messages: {
                form_edit_merk_alat: "Masukkan merk alat !",
                form_edit_tahun_beli: "Masukkan tahun beli !",
                form_edit_seri_alat: "Masukkan seri alat !",
                form_edit_jumlah_alat: "Masukkan jumlah alat !",
                form_edit_kondisi_alat: "Pilih kondisi alat !",
            },
            submitHandler: function(formInput) {
                Notiflix.Confirm.Show('Konfirmasi Input', 'Apakah data yang diinputkan sudah benar ?', 'Ya', 'Tidak',
                    function() {
                        // Yes button callback alert('Thank you.'); 
                        let initialForm = formEdit[0];
                        let formData = new FormData(initialForm);
                        editData(formData);
                    },
                    function() {
                        // No button callback alert('If you say so...'); 
                        return;
                    }
                );
            }
        });

        const table = $('#data_alat_table').DataTable({
            scrollX: true,
            language: {
                search: "Filter"
            },
            responsive: true,
            columns: [
                {
                    title: "Merk Alat",
                    data: "merk_alat"
                },
                {
                    title: "Tahun Beli",
                    data: "tahun_beli"
                },
                {
                    title: "Seri Alat",
                    data: "seri_alat"
                },
                {
                    title: "Jumlah Alat",
                    data: "jumlah_alat"
                },
                {
                    title: "Kondisi Alat",
                    data: "kondisi_alat"
                },
                {
                    title: "Action",
                    data: {
                        id_alat: "id_alat"
                    },
                    render: function(data) {
                        let statusButton = '<button class="btn btn-primary" type="button"  onclick="showModal(' + data.id_alat + ')" ><i class="fa fa-edit"></i></button><button class="btn btn-danger" type="button" data-original-title="Hapus Data Alat" title="" onclick="deleteConfirmation(' + data.id_alat + ')"><i class="fa fa-trash-o"></i></button>'
                        return statusButton;
                    }
                }
            ]
        });
    });

    const deleteConfirmation = (id) => {
        Notiflix.Confirm.Show('Konfirmasi Hapus', 'Apakah anda yakin akan menghapus data ini ?', 'Ya', 'Tidak',
            function() {
                // Yes button callback alert('Thank you.'); 
                deleteData(id);
                return;
            },
            function() {
                // No button callback alert('If you say so...'); 
                return;
            });
    }

    const getData = () => {
        $.ajax({
            url: 'data_alat/getDataAlat',
            type: 'GET',
            dataType: 'json',
            beforeSend: function() {
                // Statement
                Notiflix.Loading.Pulse('Mohon Menunggu...');
            },
            complete: function() {
                // remove
                Notiflix.Loading.Remove();
            },
            success: function(response) {
                console.log(response)
                if (response.status !== 'success') {
                    Notiflix.Report.Failure('Terjadi Kesalahan', response.message, 'Tutup');
                    return;
                }

                $('#data_alat_table').dataTable().fnClearTable();
                $('#data_alat_table').dataTable().fnAddData(response.data);
                return;
            }
        })
    };

    const insertData = (formData) => {
        $.ajax({
            url: 'data_alat/ajaxInsert',
            data: formData,
            type: 'POST',
            dataType: 'json',
            mimeType: 'multipart/form-data',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                // Statement
                Notiflix.Loading.Pulse('Mohon Menunggu...');
            },
            complete: function() {
                // remove
                Notiflix.Loading.Remove();
            },
            success: function(response) {
                if (response.status !== 'success') {
                    Notiflix.Report.Failure('Terjadi Kesalahan', response.message, 'Tutup');
                    return;
                }
                Notiflix.Report.Success('Berhasil', response.message, 'Tutup');
                getData();
                return;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error insertData : ' + textStatus + ' ' + errorThrown);
            }
        })
    };

    const editData = (formData) => {
        $.ajax({
            url: 'data_alat/ajaxUpdate',
            data: formData,
            type: 'POST',
            dataType: 'json',
            mimeType: 'multipart/form-data',
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                // Statement
                Notiflix.Loading.Pulse('Mohon Menunggu...');
            },
            complete: function() {
                // remove
                Notiflix.Loading.Remove();
            },
            success: function(response) {
                if (response.status !== 'success') {
                    Notiflix.Report.Failure('Terjadi Kesalahan', response.message, 'Tutup');
                    return;
                }
                Notiflix.Report.Success('Berhasil', response.message, 'Tutup');
                $('#editModal').modal('hide');
                getData();
                return;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error editData : ' + textStatus + ' ' + errorThrown);
            }
        })
    }

    const deleteData = (id) => {
        $.ajax({
            url: 'data_alat/ajaxDelete',
            data: {
                id: id
            },
            type: 'POST',
            dataType: 'json',
            beforeSend: function() {
                // Statement
                Notiflix.Loading.Pulse('Mohon Menunggu...');
            },
            complete: function() {
                // remove
                Notiflix.Loading.Remove();
            },
            success: function(response) {
                if (response.status !== 'success') {
                    Notiflix.Report.Failure('Terjadi Kesalahan', response.message, 'Tutup');
                    return;
                }
                Notiflix.Report.Success('Berhasil', response.message, 'Tutup');
                $('#editModal').modal('hide');
                getData();
                return;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error deleteData : ' + textStatus + ' ' + errorThrown);
            }
        })
    };

    const showModal = (id) => {
        $('#editModal').modal('show');
        $.ajax({
            url: 'data_alat/getByID',
            data: {
                id: id
            },
            type: 'POST',
            dataType: 'json',
            beforeSend: function() {
                // Statement
                Notiflix.Loading.Pulse('Mohon Menunggu...');
            },
            complete: function() {
                // remove
                Notiflix.Loading.Remove();
            },
            success: function(response) {
                if (response.status !== 'success') {
                    Notiflix.Report.Failure('Terjadi Kesalahan', response.message, 'Tutup');
                    return;
                }

                $('#editModalLabel').text('Edit Data ' + response.data.merk_alat);
                $('#edit_merk_alat').val(response.data.merk_alat);
                $('#edit_tahun_beli').val(response.data.tahun_beli);
                $('#edit_seri_alat').val(response.data.seri_alat);
                $('#edit_jumlah_alat').val(response.data.jumlah_alat);
                $('#edit_kondisi_alat').val(response.data.kondisi_alat);
                $('#editIDForm').val(response.data.id_alat);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error showModal : ' + textStatus + ' ' + errorThrown);
            }
        })
    };
</script>


<div class="page-body">
    <div class="container-fluid">
       <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Data Alat</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>/ltr/index.html">Home</a></li>
                    <li class="breadcrumb-item">Forms  </li>
                    <li class="breadcrumb-item active">Data Alat</li>
                </ol>
            </div>
            <div class="col-lg-6">
                <!-- Bookmark Start-->
                <div class="bookmark pull-right">
                    <ul>
                        <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Chat"><i data-feather="message-square"></i></a></li>
                        <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Icons"><i data-feather="command"></i></a></li>
                        <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title="" data-original-title="Learning"><i data-feather="layers"></i></a></li>
                        <li><a href="#"><i class="bookmark-search" data-feather="star"></i></a>
                            <form class="form-inline search-form">
                                <div class="form-group form-control-search">
                                    <input type="text" placeholder="Search..">
                                </div>
                            </form>
                        </li>
                    </ul>
                </div>
                <!-- Bookmark Ends-->
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <?php echo $this->session->flashdata('notif');?>
            <div class="card">
                <div class="card-header">
                    <h5>Form Data Alat</h5>
                    <span>Silahkan isi data sesuai dengan form yang telah disediakan.</span>
                </div>
                <div class="card-body">
                    <form id="insert_data_alat_form">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Merk Alat</label>
                                <input class="form-control" id="insert_merk_alat" type="text" placeholder="Merk Alat" name="insert_merk_alat" required="Merk Alat Tidak Boleh Kosong">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Tahun Beli</label>
                                <input class="form-control" id="insert_tahun_beli" type="text" placeholder="Tahun Beli" name="insert_tahun_beli" required="Tahun Beli Tidak Boleh Kosong">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Seri Alat</label>
                                <input class="form-control" id="insert_seri_alat" type="text" placeholder="Seri Alat" name="insert_seri_alat" required="Seri Alat Tidak Boleh Kosong">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Jumlah Alat</label>
                                <input class="form-control" id="insert_jumlah_alat" type="number" placeholder="Jumlah Alat" name="insert_jumlah_alat" required="Jumlah Alat Tidak Boleh Kosong">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Kondisi Alat</label>
                                <select class="form-control digits" name="insert_kondisi_alat" id="insert_kondisi_alat">
									<option value="-">- Pilih Salah Satu -</option>
									<?php 
                                    foreach($dataKondisi as $row):?>
										<option value="<?php echo $row->id_kondisi;?>"><?php echo $row->kondisi_alat;?></option>
									<?php endforeach;?>
								</select>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" id="btn_insert_data_alat" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Data Alat</h5>
                    Dibawah ini adalah data alat.
                </div>
                <div class="card-body">
                <div class="table-responsive">
                <table class="table table-border-horizontal" id="data_alat_table">
                </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- endpagebody -->
</div>

<!-- Modal Edit-->
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit_alat_form">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label for="validationCustom01">Merk Alat</label>
                            <input class="form-control" id="edit_merk_alat" type="text" placeholder="Merk Alat" name="form_edit_merk_alat" required="Merk Alat Tidak Boleh Kosong">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label for="validationCustom01">Tahun Beli</label>
                            <input class="form-control" id="edit_tahun_beli" type="text" placeholder="Tahun Beli" name="form_edit_tahun_beli" required="Tahun Beli Tidak Boleh Kosong">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Seri Alat</label>
                            <input class="form-control" id="edit_seri_alat" type="text" placeholder="Seri Alat" name="form_edit_seri_alat" required="Seri Alat Tidak Boleh Kosong">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Jumlah Alat</label>
                            <input class="form-control" id="edit_jumlah_alat" type="number" placeholder="Jumlah Alat" name="form_edit_jumlah_alat" required="Jumlah Alat Tidak Boleh Kosong">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Kondisi Alat</label>
                            <select class="form-control digits" name="form_edit_kondisi_alat" id="edit_kondisi_alat">
                                <option value="-">- Pilih Salah Satu -</option>
                                <?php 
                                foreach($dataKondisi as $row):?>
                                    <option value="<?php echo $row->id_kondisi;?>"><?php echo $row->kondisi_alat;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input class="form-control" type="text" id="editIDForm" name="idAlat" hidden>
                            <button class="btn btn-primary btn-block btn_modal_edit" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>