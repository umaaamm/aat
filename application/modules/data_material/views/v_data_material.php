<script>
    $(document).ready(function() {
        const formInput = $("#insert_harga_material_form");
        const formEdit = $("#edit_material_form");
        getData();

        formInput.validate({
            rules: {
                insert_nama_material: "required",
                insert_harga_material: "required",
                insert_satuan_material: "required"
            },
            messages: {
                insert_nama_material: "Masukkan nama material !",
                insert_harga_material: "Masukkan harga material !",
                insert_satuan_material: "Pilih satuan material !",
            },
            submitHandler: function(formInput) {
                Notiflix.Confirm.Show('Konfirmasi Input', 'Apakah data yang diinputkan sudah benar ?', 'Ya', 'Tidak',
                    function() {
                        // Yes button callback alert('Thank you.'); 
                        let initialForm = $("#insert_harga_material_form")[0];
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
                form_edit_nama_material: "required",
                form_edit_harga_material: "required",
                form_edit_satuan_material: "required"
            },
            messages: {
                form_edit_nama_material: "Masukkan nama material !",
                form_edit_harga_material: "Masukkan harga material !",
                form_edit_satuan_material: "Pilih satuan material !",
            },
            submitHandler: function(formEdit) {
                Notiflix.Confirm.Show('Konfirmasi Input', 'Apakah data yang diinputkan sudah benar ?', 'Ya', 'Tidak',
                    function() {
                        // Yes button callback alert('Thank you.'); 
                        let initialForm = formEdit;
                        let formData = new FormData(initialForm);
                        editData(formData);
                    },
                    function() {
                        // No button callback alert('If you say so...'); 
                        return;
                    });
            }
        });

        const table = $('#harga_material_table').DataTable({
            scrollX: true,
            language: {
                search: "Filter"
            },
            responsive: true,
            columns: [
                {
                    title: "Nama Material",
                    data: "nama_material"
                },
                {
                    title: "Harga Material",
                    data: "harga_material"
                },
                {
                    title: "Satuan Material",
                    data: "nama_satuan"
                },
                {
                    title: "Action",
                    data: {
                        id_material: "id_material"
                    },
                    render: function(data) {
                        let statusButton = '<button class="btn btn-primary" type="button"  onclick="showModal(' + data.id_material + ')" ><i class="fa fa-edit"></i></button><button class="btn btn-danger" type="button" data-original-title="Hapus Data Material" title="" onclick="deleteConfirmation(' + data.id_material + ')"><i class="fa fa-trash-o"></i></button>'
                        return statusButton;
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
            url: 'data_material/getDataMaterial',
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

                $('#harga_material_table').dataTable().fnClearTable();
                $('#harga_material_table').dataTable().fnAddData(response.data);
                return;
            }
        })
    }

    const insertData = (formData) => {
        $.ajax({
            url: 'data_material/ajaxInsert',
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
            url: 'data_material/ajaxUpdate',
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
            url: 'data_material/ajaxDelete',
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
            url: 'data_material/getByID',
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
                
                $('#editModalLabel').text('Edit Data ' + response.data.nama_material);
                $('#edit_nama_material').val(response.data.nama_material);
                $('#edit_harga_material').val(response.data.harga_material);
                $('#edit_id_satuan').val(response.data.satuan);
                $('#editIDForm').val(response.data.id_material);
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
                <h3>Data Material</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>/ltr/index.html">Home</a></li>
                    <li class="breadcrumb-item">Forms  </li>
                    <li class="breadcrumb-item active">Data Material</li>
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
                    <h5>Form Data Material</h5>
                    <span>Silahkan isi data sesuai dengan form yang telah disediakan.</span>
                </div>
                <div class="card-body">
                    <form id="insert_harga_material_form">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Nama Material</label>
                                <input class="form-control" id="insert_nama_material" type="text" placeholder="Nama Material" name="insert_nama_material" required="Nama Material Tidak Boleh Kosong">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Harga Material</label>
                                <input class="form-control" id="insert_harga_material" type="text" placeholder="Harga Material" name="insert_harga_material" required="Harga Material Tidak Boleh Kosong">
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Satuan</label>
                                <select class="form-control digits" name="insert_satuan_material" id="insert_satuan_material">
									<option value="-">- Pilih Salah Satu -</option>
									<?php 
                                    foreach($dataSatuan as $row):?>
										<option value="<?php echo $row->id_satuan;?>"><?php echo $row->nama_satuan;?></option>
									<?php endforeach;?>
								</select>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" id="btn_insert_harga_material" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Data Material</h5>
                    Dibawah ini adalah data material.
                </div>
                <div class="card-body">
                <div class="table-responsive">
                <table class="table table-border-horizontal" id="harga_material_table">
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
                <button type="button" class="btn-close" onclick="$('#editModal').modal('hide');" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit_material_form">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Nama Material</label>
                            <input class="form-control" id="edit_nama_material" type="text" placeholder="Nama Material" name="form_edit_nama_material" required="Nama Materia Tidak Boleh Kosong">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Harga Material</label>
                            <input class="form-control" id="edit_harga_material" type="text" placeholder="Harga Material" name="form_edit_harga_material" required="Harga Material Tidak Boleh Kosong">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Satuan</label>
                            <select class="form-control digits" name="form_edit_id_satuan" id="edit_id_satuan">
                                <option value="-">- Pilih Salah Satu -</option>
                                <?php 
                                foreach($dataSatuan as $row):?>
                                    <option value="<?php echo $row->id_satuan;?>"><?php echo $row->nama_satuan;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input class="form-control" type="text" id="editIDForm" name="idMaterial" hidden disabled>
                            <button class="btn btn-primary btn-block btn_modal_edit" type="submit">Simpan</button>        
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>