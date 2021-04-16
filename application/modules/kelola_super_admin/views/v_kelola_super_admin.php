<script>
    $(document).ready(function() {
        const formInput = $("#insert_super_admin");
        const formEdit = $("#edit_super_admin");
        getData();

        formInput.validate({
            rules: {
                insert_nama: "required",
                insert_email: {
                    required: true,
                    email: true
                },
                insert_hp: "required",
                insert_password: {
                    required: true,
                    minlength: 5
                },
                insert_alamat: "required"
            },
            messages: {
                insert_nama: "Masukkan nama super admin !",
                insert_email: "Masukkan email super admin yang valid !",
                insert_hp: "Masukkan nomor hp super admin !",
                insert_password: {
                    required: "Masukkan password super admin !",
                    minlength: "Panjang password minimal 5 karakter !"
                },
                insert_alamat: "Masukkan alamat super admin !"
            },
            submitHandler: function(formInput) {
                Notiflix.Confirm.Show('Konfirmasi Input', 'Apakah data yang diinputkan sudah benar ?', 'Ya', 'Tidak',
                    function() {
                        // Yes button callback alert('Thank you.'); 
                        let initialForm = $("#insert_super_admin")[0];
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
                editNamaForm: "required",
                editEmailForm: {
                    required: true,
                    email: true
                },
                editNoHPForm: "required",
                editPasswordForm: {
                    required: true,
                    minlength: 5
                },
                editAlamatForm: "required"
            },
            messages: {
                editNamaForm: "Masukkan nama super admin !",
                editEmailForm: "Masukkan email super admin yang valid !",
                editNoHPForm: "Masukkan nomor hp super admin !",
                editPasswordForm: {
                    required: "Masukkan password super admin !",
                    minlength: "Panjang password minimal 5 karakter !"
                },
                editAlamatForm: "Masukkan alamat super admin !"
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

        const table = $('#super_admin_table').DataTable({
            scrollX: true,
            language: {
                search: "Filter"
            },
            responsive: true,
            columns: [{
                    title: "Nama Super Admin",
                    data: "nama"
                },
                {
                    title: "Email Super Admin",
                    data: "email"
                },
                {
                    title: "No. HP Super Admin",
                    data: "no_hp"
                },
                {
                    title: "Password",
                    data: "password"
                },
                {
                    title: "Alamat",
                    data: "alamat"
                },
                {
                    title: "Role",
                    data: "role",
                    render: function(data) {

                        let role = {
                            1: {
                                desc: 'Super Admin'
                            },
                            2: {
                                desc: 'Admin'
                            }
                        };
                        return role[data].desc;
                    }
                },
                {
                    title: "Action",
                    data: {
                        id_user: "id_user"
                    },
                    render: function(data) {
                        let statusButton = '<button class="btn btn-primary" type="button"  onclick="showModal(' + data.id_user + ')" ><i class="fa fa-edit"></i></button><button class="btn btn-danger" type="button" data-original-title="Hapus Data Admin" title="" onclick="deleteConfirmation(' + data.id_user + ')"><i class="fa fa-trash-o"></i></button>'
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
            url: 'kelola_super_admin/getSuperAdmin',
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

                $('#super_admin_table').dataTable().fnClearTable();
                $('#super_admin_table').dataTable().fnAddData(response.data);
                return;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error getData : ' + textStatus + ' ' + errorThrown);
            }
        })
    }

    const insertData = (formData) => {
        $.ajax({
            url: 'kelola_super_admin/ajaxInsert',
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
            url: 'kelola_super_admin/ajaxUpdate',
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
            url: 'kelola_super_admin/ajaxDelete',
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
            url: 'kelola_super_admin/getByID',
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

                $('#editModalLabel').text('Edit Data ' + response.data.nama);
                $('#editNamaForm').val(response.data.nama);
                $('#editEmailForm').val(response.data.email);
                $('#editNoHPForm').val(response.data.no_hp);
                $('#editAlamatForm').val(response.data.alamat);
                $('#editRoleForm').val(response.data.role);
                $('#editIDForm').val(response.data.id_user);

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
                    <h3>Manajemen Admin</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/ltr/index.html">Home</a></li>
                        <li class="breadcrumb-item">Forms </li>
                        <li class="breadcrumb-item active">Kelola Super Admin</li>
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
                <?php echo $this->session->flashdata('notif'); ?>
                <div class="card">
                    <div class="card-header">
                        <h5>Form Kelola Super Admin</h5>
                        <span>Silahkan isi data sesuai dengan form yang telah disediakan.</span>
                    </div>

                    <div class="card-body">

                        <form id="insert_super_admin">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="insert_nama">Nama</label>
                                    <input id="insert_nama" class="form-control" type="text" placeholder="Nama Admin" name="insert_nama">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="insert_email">Email</label>
                                    <input id="insert_email" class="form-control" type="email" placeholder="Email Admin" name="insert_email">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="insert_hp">No Handphone</label>
                                    <input id="insert_hp" class="form-control" type="text" placeholder="Nomor HP Admin" name="insert_hp">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="insert_password">Password</label>
                                    <input id="insert_password" class="form-control" type="password" placeholder="Password Admin" name="insert_password">
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="insert_alamat">Alamat</label>
                                    <input id="insert_alamat" class="form-control" type="text" placeholder="alamat Admin" name="insert_alamat">
                                </div>
                            </div>
                            <button class="btn btn-primary" id="btn_insert_super_admin" type="submit">Simpan</button>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Admin</h5>
                        Dibawah ini adalah data super admin untuk CV. Anugrah Agung Teknik.
                    </div>
                    <div class="table-responsive">
                        <table class="table table-border-horizontal" id="super_admin_table">

                        </table>
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
                <form id="edit_super_admin">
                    <div class="row">
                        <div class="col-md-12 mb-12">
                            <label for="editNamaForm">Nama</label>
                            <input class="form-control" type="text" id="editNamaForm" name="editNamaForm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-12">
                            <label for="editEmailForm">Email</label>
                            <input class="form-control" type="email" placeholder="Email Admin" id="editEmailForm" name="editEmailForm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-12">
                            <label for="editNoHPForm">No Handphone</label>
                            <input class="form-control" type="text" placeholder="Nomor HP Admin" id="editNoHPForm" name="editNoHPForm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-12">
                            <label for="editPasswordForm">Password</label>
                            <input class="form-control" type="password" placeholder="Password Admin" id="editPasswordForm" name="editPasswordForm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-12">
                            <label for="editAlamatForm">Alamat</label>
                            <input class="form-control" type="text" placeholder="alamat Admin" id="editAlamatForm" name="editAlamatForm">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-12">
                            <input class="form-control" type="text" id="editRoleForm" name="roleUser" hidden>
                            <input class="form-control" type="text" id="editIDForm" name="idUser" hidden>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>