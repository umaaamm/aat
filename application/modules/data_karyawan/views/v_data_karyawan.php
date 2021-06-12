<script>
    $(document).ready(function() {
        const formInput = $("#insert_data_karyawan_form");
        const formEdit = $('#edit_karyawan_form');
        getData();

        formInput.validate({
            rules: {
                insert_nama_karyawan: "required",
                insert_no_hp_karyawan: "required",
                insert_alamat_karyawan: "required"
            },
            messages: {
                insert_nama_karyawan: "Masukkan nama karyawan !",
                insert_no_hp_karyawan: "Masukkan no hp karyawan !",
                insert_alamat_karyawan: "Masukkan alamat karyawan !"
            },
            submitHandler: function(formInput) {
                Notiflix.Confirm.Show('Konfirmasi Input', 'Apakah data yang diinputkan sudah benar ?', 'Ya', 'Tidak',
                    function() {
                        // Yes button callback alert('Thank you.'); 
                        let initialForm = $("#insert_data_karyawan_form")[0];
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
                form_edit_nama_karyawan: "required",
                form_edit_alamat_karyawan: "required",
                form_edit_no_hp_karyawan: "required"
            },
            messages: {
                form_edit_nama_karyawan: "Masukkan nama karyawan !",
                form_edit_alamat_karyawan: "Masukkan alamat karyawan !",
                form_edit_no_hp_karyawan: "Masukkan no hp karyawan !",
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

        const table = $('#data_karyawan_table').DataTable({
            scrollX: true,
            language: {
                search: "Filter"
            },
            responsive: true,
            columns: [
                {
                    title: "Nama Karyawan",
                    data: "nama_karyawan"
                },
                {
                    title: "Nomor HP",
                    data: "no_hp_karyawan"
                },
                {
                    title: "Alamat Karyawan",
                    data: "alamat_karyawan"
                },
                {
                    title: "Action",
                    data: {
                        id_material: "id_karyawan"
                    },
                    render: function(data) {
                        let statusButton = '<button class="btn btn-primary" type="button"  onclick="showModal(' + data.id_karyawan + ')" ><i class="fa fa-edit"></i></button><button class="btn btn-danger" type="button" data-original-title="Hapus Data Material" title="" onclick="deleteConfirmation(' + data.id_karyawan + ')"><i class="fa fa-trash-o"></i></button>'
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
            url: 'data_karyawan/getDataKaryawan',
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

                $('#data_karyawan_table').dataTable().fnClearTable();
                $('#data_karyawan_table').dataTable().fnAddData(response.data);
                return;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error getData : ' + textStatus + ' ' + errorThrown);
            }
        })
    };

    const insertData = (formData) => {
        $.ajax({
            url: 'data_karyawan/ajaxInsert',
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

    const deleteData = (id) => {
        $.ajax({
            url: 'data_karyawan/ajaxDelete',
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

    const editData = (formData) => {
        $.ajax({
            url: 'data_karyawan/ajaxUpdate',
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

    const showModal = (id) => {
        $('#editModal').modal('show');
        $.ajax({
            url: 'data_karyawan/getByID',
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
                
                $('#editModalLabel').text('Edit Data ' + response.data.nama_karyawan);
                $('#edit_nama_karyawan').val(response.data.nama_karyawan);
                $('#edit_alamat_karyawan').val(response.data.alamat_karyawan);
                $('#edit_no_hp_karyawan').val(response.data.no_hp_karyawan);
                $('#editIDForm').val(response.data.id_karyawan);
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
                <h3>Data Karyawan</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>/ltr/index.html">Home</a></li>
                    <li class="breadcrumb-item">Forms  </li>
                    <li class="breadcrumb-item active">Data Karyawan</li>
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
                    <h5>Form Data Karyawan</h5>
                    <span>Silahkan isi data sesuai dengan form yang telah disediakan.</span>
                </div>
                <div class="card-body">
                    <form id="insert_data_karyawan_form">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">Nama Karyawan</label>
                                <input class="form-control" type="text" placeholder="Nama Karyawan" name="insert_nama_karyawan" required="Nama Karyawan Tidak Boleh Kosong">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom01">No Hp Karyawan</label>
                                <input class="form-control" type="text" placeholder="No Hp Karyawan" name="insert_no_hp_karyawan" required="No Hp Karyawan Tidak Boleh Kosong">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="validationCustom01">Alamat Karyawan</label>
                                <textarea class="form-control" name="insert_alamat_karyawan" rows="3" placeholder="Alamat Karyawan"></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" id="btn_insert_data_karyawan" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Data Karyawan</h5>
                    Dibawah ini adalah Data Karyawan.
                </div>
                <div class="card-body">
                <div class="table-responsive">
                <table class="table table-border-horizontal" id="data_karyawan_table">
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
                <form id="edit_karyawan_form">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Nama Karyawan</label>
                            <input class="form-control" type="text" placeholder="Nama Karyawan" id="edit_nama_karyawan" name="form_edit_nama_karyawan" required="Nama Karyawan Tidak Boleh Kosong">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">No Hp Karyawan</label>
                            <input class="form-control" type="text" placeholder="No Hp Karyawan" id="edit_no_hp_karyawan" name="form_edit_no_hp_karyawan" required="No Hp Karyawan Tidak Boleh Kosong">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Alamat Karyawan</label>
                            <textarea class="form-control" id="edit_alamat_karyawan" name="form_edit_alamat_karyawan" rows="3" placeholder="Alamat Karyawan"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input class="form-control" type="text" id="editIDForm" name="idKaryawan" hidden>
                            <button class="btn btn-primary btn-block" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
