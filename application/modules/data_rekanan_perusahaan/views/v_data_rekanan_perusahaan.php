<script>
$(document).ready(function() {
    const formInput = $("#insert_harga_perusahaan_rekanan_form");
    const formEdit = $("#edit_perusahaan_rekanan_form");
    getData();

    formInput.validate({
        rules: {
            insert_nama_perusahaan: {
                required: true,
            },
            insert_alamat_perusahaan: {
                required: true,
            },
        },
        messages: {
            insert_nama_perusahaan: {
                required: "Masukkan nama perusahaan !",
            },
            insert_alamat_perusahaan: {
                required: "Masukkan alamat perusahaan !",
            },
        },
        submitHandler: function(formInput) {
            Notiflix.Confirm.Show('Konfirmasi Input', 'Apakah data yang diinputkan sudah benar ?',
                'Ya', 'Tidak',
                function() {
                    // Yes button callback alert('Thank you.'); 
                    let initialForm = $("#insert_harga_perusahaan_rekanan_form")[0];
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
            edit_nama_perusahaan: {
                required: true,
            },
            edit_alamat_perusahaan: {
                required: true,
            },
        },
        messages: {
            edit_nama_perusahaan: {
                required: "Masukkan nama perusahaan !",
            },
            edit_alamat_perusahaan: {
                required: "Masukkan alamat perusahaan !",
            },
        },
        submitHandler: function(formEdit) {
            Notiflix.Confirm.Show('Konfirmasi Input', 'Apakah data yang diinputkan sudah benar ?',
                'Ya', 'Tidak',
                function() {
                    // Yes button callback alert('Thank you.'); 
                    let initialForm = $("#edit_perusahaan_rekanan_form")[0];
                    let formData = new FormData(initialForm);
                    editData(formData);
            },
                function() {
                    // No button callback alert('If you say so...'); 
                    return;
                });
        }
    });

    const table = $('#perusahaan_rekanan_table').DataTable({
        scrollX: true,
        language: {
            search: "Filter"
        },
        responsive: true,
        columns: [{
                title: "Nama Perusahaan",
                data: "nama_perusahaan"
            },
            {
                title: "Alamat Perusahaan",
                data: "alamat_perusahaan"
            },
            {
                title: "Action",
                data: {
                    id_perusahaan_rekanan: "id_perusahaan_rekanan"
                },
                render: function(data) {
                    let html = '<div class="btn-group" role="group" aria-label="First group">';
                    html += '<button class="btn btn-primary" type="button"  onclick="showModal(' +
                    data.id_perusahaan_rekanan +
                    ')" ><i class="fa fa-edit"></i></button><button class="btn btn-danger" type="button" data-original-title="Hapus Data Rekanan Perusahaan" title="" onclick="deleteConfirmation(' +
                    data.id_perusahaan_rekanan + ')"><i class="fa fa-trash-o"></i></button>'
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
        url: 'data_rekanan_perusahaan/getDataPerusahaan',
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
                $('#perusahaan_rekanan_table').dataTable().fnClearTable();
                return;
            }

            $('#perusahaan_rekanan_table').dataTable().fnClearTable();
            $('#perusahaan_rekanan_table').dataTable().fnAddData(response.data);
            return;
        }
    })
}

const insertData = (formData) => {
    $.ajax({
        url: 'data_rekanan_perusahaan/ajaxInsert',
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
        url: 'data_rekanan_perusahaan/ajaxUpdate',
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
        url: 'data_rekanan_perusahaan/ajaxDelete',
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
        url: 'data_rekanan_perusahaan/getByID',
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

            $('#editModalLabel').text('Edit Data ' + response.data.nama_perusahaan);
            $('#edit_nama_perusahaan').val(response.data.nama_perusahaan);
            $('#edit_alamat_perusahaan').val(response.data.alamat_perusahaan);
            $('#idPerusahaan').val(response.data.id_perusahaan_rekanan);
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
                    <h3>Data Rekanan Perusahaan</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>/ltr/index.html">Home</a></li>
                        <li class="breadcrumb-item">Forms </li>
                        <li class="breadcrumb-item active">Data Rekanan Perusahaan</li>
                    </ol>
                </div>
                <div class="col-lg-6">
                    <!-- Bookmark Start-->
                    <div class="bookmark pull-right">
                        <ul>
                            <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title=""
                                    data-original-title="Chat"><i data-feather="message-square"></i></a></li>
                            <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title=""
                                    data-original-title="Icons"><i data-feather="command"></i></a></li>
                            <li><a href="#" data-container="body" data-toggle="popover" data-placement="top" title=""
                                    data-original-title="Learning"><i data-feather="layers"></i></a></li>
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
                        <h5>Form Data Rekanan Perusahaan</h5>
                        <span>Silahkan isi data sesuai dengan form yang telah disediakan.</span>
                    </div>
                    <div class="card-body">
                        <form id="insert_harga_perusahaan_rekanan_form">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="insert_nama_perusahaan">Nama Perusahaan</label>
                                    <input class="form-control" id="insert_nama_perusahaan" type="text"
                                        placeholder="Nama Perusahaan" name="insert_nama_perusahaan"
                                        required="Nama Material Tidak Boleh Kosong">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="insert_alamat_perusahaan">Alamat Perusahaan</label>
                                    <textarea class="form-control" name="insert_alamat_perusahaan" rows="3" placeholder="Alamat Perusahaan"></textarea>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block" id="btn_insert_perusahaan_rekanan" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Rekanan Perusahaan</h5>
                        Dibawah ini adalah Data Rekanan Perusahaan.
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-border-horizontal" id="perusahaan_rekanan_table">
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
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Modal title</h5>
                <button type="button" class="btn-close" onclick="$('#editModal').modal('hide');"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit_perusahaan_rekanan_form">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="edit_nama_perusahaan">Nama Perusahaan</label>
                            <input class="form-control" id="edit_nama_perusahaan" type="text" placeholder="Nama Perusahaan"
                                name="form_edit_nama_perusahaan" required="Nama Perusahaan Tidak Boleh Kosong">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="edit_alamat_perusahaan">Alamat Perusahaan</label>
                            <textarea class="form-control" id="edit_alamat_perusahaan" name="form_edit_alamat_perusahaan" rows="3" placeholder="Alamat Perusahaan"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input class="form-control" type="text" id="idPerusahaan" name="idPerusahaan" hidden>
                            <button class="btn btn-primary btn-block btn_modal_edit" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>