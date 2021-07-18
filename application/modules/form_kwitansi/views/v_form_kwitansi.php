<script>
$(document).ready(function() {
        const formInput = $("#insert_data_kwitansi_form");
        const formEdit = $("#edit_kwitansi_form");
        getData();

        formInput.validate({
            rules: {
                insert_asal_perusahaan: {
                    selectcheck: true
                },
                insert_sudah_terima_dari: "required",
                insert_terbilang_uang: "required",
                insert_nominal_uang: "required",
                insert_untuk_pembayaran: "required",
            },
            messages: {
                insert_asal_perusahaan: "Masukkan asal perusahaan!",
                insert_sudah_terima_dari: "Masukkan asal uang!",
                insert_terbilang_uang: "Masukkan jumlah uang (terbilang)!",
                insert_nominal_uang: "Masukkan jumlah uang (nominal)!",
                insert_untuk_pembayaran: "Masukkan alasan pembayaran!",
            },
            submitHandler: function(formInput) {

                Notiflix.Confirm.Show('Konfirmasi Input', 'Apakah data yang diinputkan sudah benar ?', 'Ya', 'Tidak',
                    function() {
                        // Yes button callback alert('Thank you.'); 
                        let initialForm = $("#insert_data_kwitansi_form")[0];
                        let formData = new FormData(initialForm);
                        insertData(formData);
                    },
                    function() {
                        // No button callback alert('If you say so...'); 
                        return;
                    });
            }
        });

        formEdit.validate({
            rules: {
                edit_asal_perusahaan: {
                    selectcheck: true
                },
                edit_sudah_terima_dari: "required",
                edit_terbilang_uang: "required",
                edit_nominal_uang: "required",
                edit_untuk_pembayaran: "required",
            },
            messages: {
                edit_asal_perusahaan: "Masukkan asal perusahaan!",
                edit_sudah_terima_dari: "Masukkan asal uang!",
                edit_terbilang_uang: "Masukkan jumlah uang (terbilang)!",
                edit_nominal_uang: "Masukkan jumlah uang (nominal)!",
                edit_untuk_pembayaran: "Masukkan alasan pembayaran!",
            },
            submitHandler: function(formEdit) {
                Notiflix.Confirm.Show('Konfirmasi Edit', 'Apakah data yang diinputkan sudah benar ?', 'Ya', 'Tidak',
                    function() {
                        // Yes button callback alert('Thank you.'); 
                        let initialForm = formEdit[0];
                        let formData = new FormData(initialForm);
                        editData(formData);
                    },
                    function() {
                        // No button callback alert('If you say so...'); 
                        return;
                    });
            }
        });

        const table = $('#data_kwitansi_table').DataTable({
            scrollX: true,
            language: {
                search: "Filter"
            },
            responsive: true,
            columns: [
                {
                    title: "No. Kwitansi",
                    data: "no_kwitansi"
                },
                {
                    title: "Sudah Terima Dari",
                    data: "sudah_terima_dari"
                },
                {
                    title: "Uang (Terbilang)",
                    data: "terbilang_uang"
                },
                {
                    title: "Uang (Nominal)",
                    data: "nominal_uang",
                    className: 'text-right',
                    render: $.fn.dataTable.render.number(',', '.', 0, 'Rp. ')
                },
                {
                    title: "Untuk Pembayaran",
                    data: "untuk_pembayaran"
                },
                {
                    title: "Tanggal",
                    data: "tanggal",
                    render:function(data){
                        let date = new Date(data);
                        let month = date.getMonth() + 1;
                        let fullDate = date.getDate()+'/'+month+'/'+date.getFullYear();
                        return fullDate; 
                    }
                },
                {
                    title: "Action",
                    data: {
                        id_kwitansi: "id_kwitansi"
                    },
                    render: function(data) {
                        let statusButton = '<button class="btn btn-primary" type="button"  onclick="showModal(' + data.id_kwitansi + ')" ><i class="fa fa-edit"></i></button><button class="btn btn-danger" type="button" data-original-title="Hapus Data Proyek" title="" onclick="deleteConfirmation(' + data.id_kwitansi + ')"><i class="fa fa-trash-o"></i></button>'
                        return statusButton;
                    }
                },
                {
                    title: "Download",
                    data: {
                        id_kwitansi: "id_kwitansi"
                    },
                    className: 'text-center',
                    render: function(data) {
                        let html = '<div class="btn-group" role="group" aria-label="First group">';
                        html += '<a href="form_kwitansi/downloadKwitansi/'+data.id_kwitansi+'" class="btn btn-sm btn-primary btn-icon" title="Download Kartu Angsuran"><i class="fa fa-download"></i></a>';
                        html += '</div>';

                        return html;
                    }
                }
            ]
        })
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
            url: 'form_kwitansi/getDataKwitansi',
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
                if (response.status !== 'success') {
                    Notiflix.Report.Failure('Terjadi Kesalahan', response.message, 'Tutup');
                    return;
                }

                $('#data_kwitansi_table').dataTable().fnClearTable();
                $('#data_kwitansi_table').dataTable().fnAddData(response.data);
                return;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error getData : ' + textStatus + ' ' + errorThrown);
            }
        })
    }

    const insertData = (formData) => {
        $.ajax({
            url: 'form_kwitansi/ajaxInsert',
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
    }

    const editData = (formData) => {
        $.ajax({
            url: 'data_kwitansi/ajaxUpdate',
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
            url: 'data_proyek/ajaxDelete',
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
    }

    const showModal = (id) => {
        $('#editModal').modal('show');
        $.ajax({
            url: 'form_kwitansi/getByID',
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

                $('#editModalLabel').text('Edit Data ' + response.data.no_kwitansi);
                $('#edit_sudah_terima_dari').val(response.data.sudah_terima_dari);
                $('#edit_terbilang_uang').val(response.data.terbilang_uang);
                $('#edit_nominal_uang').val(response.data.nominal_uang);
                $('#edit_untuk_pembayaran').val(response.data.untuk_pembayaran);
                $('#editIDForm').val(response.data.id_proyek);
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
                <h3>Data Kwitansi</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>/ltr/index.html">Home</a></li>
                    <li class="breadcrumb-item">Forms  </li>
                    <li class="breadcrumb-item active">Data Kwitansi</li>
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
                    <h5>Data Kwitansi</h5>
                    <span>Silahkan isi data sesuai dengan form yang telah disediakan.</span>
                </div>
                <div class="card-body">
                    <form id="insert_data_kwitansi_form">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Asal Perusahaan</label>
                                <select class="form-control" name="insert_asal_perusahaan" id="insert_asal_perusahaan">
									<option value="-">- Pilih Salah Satu -</option>
									<?php 
                                    foreach($getPt as $row){?>
										<option value="<?php echo $row->key_pt;?>"><?php echo $row->nama_pt;?></option>
									<?php } ?>
								</select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Sudah Terima Dari</label>
                                <input class="form-control" id="insert_sudah_terima_dari" type="text"  placeholder="Sudah Terima Dari" name="insert_sudah_terima_dari">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Banyaknya Uang (Terbilang)</label>
                                <input class="form-control" id="insert_terbilang_uang" type="text" placeholder="Banyaknya Uang (Terbilang)" name="insert_terbilang_uang">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Banyaknya Uang (Nominal)</label>
                                <input class="form-control" id="insert_nominal_uang" type="number" placeholder="Banyaknya Uang (Nominal)" name="insert_nominal_uang">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Untuk Pembayaran</label>
                                <textarea class="form-control" id="insert_untuk_pembayaran" name="insert_untuk_pembayaran" rows="3" placeholder="Untuk Pembayaran"></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary" id="btn_insert_kwitansi" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Data Kwitansi</h5>
                    Dibawah ini adalah data kwitansi.
                </div>
                <div class="card-body">
                <div class="table-responsive">
                <table class="table table-border-horizontal" id="data_kwitansi_table">
                </table>
                </div>
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
                <form id="edit_kwitansi_form">
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label for="validationCustom01">Asal Perusahaan</label>
                            <select class="form-control" name="edit_asal_perusahaan" id="edit_asal_perusahaan">
                                <option value="-">- Pilih Salah Satu -</option>
                                <?php 
                                foreach($getPt as $row){?>
                                    <option value="<?php echo $row->key_pt;?>"><?php echo $row->nama_pt;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-4">
                            <label for="validationCustom01">Sudah Terima Dari</label>
                            <input class="form-control" id="edit_sudah_terima_dari" type="text"  placeholder="Sudah Terima Dari" name="edit_sudah_terima_dari">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Banyaknya Uang (Terbilang)</label>
                            <input class="form-control" id="edit_terbilang_uang" type="text" placeholder="Banyaknya Uang (Terbilang)" name="edit_terbilang_uang">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Banyaknya Uang (Nominal)</label>
                            <input class="form-control" id="edit_nominal_uang" type="number" placeholder="Banyaknya Uang (Nominal)" name="edit_nominal_uang">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Untuk Pembayaran</label>
                            <textarea class="form-control" id="edit_untuk_pembayaran" name="edit_untuk_pembayaran" rows="3" placeholder="Untuk Pembayaran"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input class="form-control" type="text" id="editIDForm" name="idKwitansi" hidden>
                            <button class="btn btn-primary btn-block btn_modal_edit" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>