<script>
$(document).ready(function() {
    const formInput = $("#insert_data_proyek_form");
    const formEdit = $("#edit_data_proyek_form");
    getData();

    formInput.validate({
        rules: {
            insert_nama_proyek: "required",
            insert_alamat_proyek: "required",
            insert_nama_pic_proyek: "required",
            insert_no_hp_pic_proyek: "required",
            insert_id_pt: "required",
        },
        messages: {
            insert_nama_proyek: "Masukkan nama proyek!",
            insert_alamat_proyek: "Masukkan alamat proyek!",
            insert_nama_pic_proyek: "Masukkan nama PIC!",
            insert_no_hp_pic_proyek: "Masukkan no hp PIC!",
            insert_id_pt: "Pilih proyek yang mengerjakan!",
        },
        submitHandler: function(formInput) {

            Notiflix.Confirm.Show('Konfirmasi Input', 'Apakah data yang diinputkan sudah benar ?',
                'Ya', 'Tidak',
                function() {
                    let initialForm = $("#insert_data_proyek_form")[0];
                    let formData = new FormData(initialForm);
                    insertData(formData);
                },
                function() {
                    return;
                }
            );
        }
    });

    formEdit.validate({
        rules: {
            edit_nama_proyek: "required",
            edit_alamat_proyek: "required",
            edit_nama_pic: "required",
            edit_no_hp_pic: "required",
            edit_id_pt: "required",
        },
        messages: {
            edit_nama_proyek: "Masukkan nama proyek!",
            edit_alamat_proyek: "Masukkan alamat proyek!",
            edit_nama_pic: "Masukkan nama PIC!",
            edit_no_hp_pic: "Masukkan no hp PIC!",
            edit_id_pt: "Pilih proyek yang mengerjakan!",
        },
        submitHandler: function(formEdit) {
            Notiflix.Confirm.Show('Konfirmasi Input', 'Apakah data yang diinputkan sudah benar ?',
                'Ya', 'Tidak',
                function() {
                    let initialForm = formEdit;
                    let formData = new FormData(initialForm);
                    editData(formData);
                },
                function() {
                    return;
                });
        }
    });

    const table = $('#data_proyek_table').DataTable({
        scrollX: true,
        language: {
            search: "Filter"
        },
        responsive: true,
        columns: [{
                title: "Nama Proyek",
                data: "nama_proyek"
            },
            {
                title: "Alamat Proyek",
                data: "alamat_proyek"
            },
            {
                title: "Nama PIC",
                data: "nama_pic"
            },
            {
                title: "No HP PIC",
                data: "no_hp_pic"
            },
            {
                title: "Nama Perusahaan",
                data: "nama_pt"
            },
            {
                title: "Action",
                data: {
                    id_proyek: "id_proyek"
                },
                render: function(data) {
                    let statusButton =
                        '<button class="btn btn-primary" type="button"  onclick="showModal(' +
                        data.id_proyek +
                        ')" ><i class="fa fa-edit"></i></button><button class="btn btn-danger" type="button" data-original-title="Hapus Data Proyek" title="" onclick="deleteConfirmation(' +
                        data.id_proyek + ')"><i class="fa fa-trash-o"></i></button>'
                    return statusButton;
                }
            }
        ]
    })
});

const deleteConfirmation = (id) => {
    Notiflix.Confirm.Show('Konfirmasi Hapus', 'Apakah anda yakin akan menghapus data ini ?', 'Ya', 'Tidak',
        function() {
            deleteData(id);
            return;
        },
        function() {
            return;
        });
}

const getData = () => {
    $.ajax({
        url: 'data_proyek/getDataProyek',
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
            console.log('wlwl', response);
            if (response.status !== 'success') {
                Notiflix.Report.Failure('Terjadi Kesalahan', response.message, 'Tutup');
                return;
            }

            $('#data_proyek_table').dataTable().fnClearTable();
            $('#data_proyek_table').dataTable().fnAddData(response.data);
            return;
        }
    })
};

const insertData = (formData) => {
    $.ajax({
        url: 'data_proyek/ajaxInsert',
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
        url: 'data_proyek/ajaxUpdate',
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
};

const showModal = (id) => {
    $('#editModal').modal('show');
    $.ajax({
        url: 'data_proyek/getByID',
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

            $('#editModalLabel').text('Edit Data ' + response.data.nama_proyek);
            $('#edit_nama_proyek').val(response.data.nama_proyek);
            $('#edit_alamat_proyek').val(response.data.alamat_proyek);
            $('#edit_nama_pic').val(response.data.nama_pic);
            $('#edit_no_hp_pic').val(response.data.no_hp_pic);
            $('#edit_id_pt').val(response.data.id_pt);
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
                    <h3>Laporan Harian</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>/ltr/index.html">Home</a></li>
                        <li class="breadcrumb-item">Forms </li>
                        <li class="breadcrumb-item active">Laporan Haria</li>
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
                        <h5>Form Laporan Harian</h5>
                        <span>Silahkan isi data sesuai dengan form yang telah disediakan.</span>
                    </div>
                    <div class="card-body">
                        <form id="insert_data_proyek_form">


                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body animate-chk">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group row">
                                                    <label class="col-lg-12 control-label text-lg-left" for="Jenis">Nama
                                                        Pekerjaan</label>
                                                    <div class="col-lg-12">
                                                        <select class="form-control digits" name="insert_id_pt" id="pt">
                                                            <option value="-">- Pilih Salah Satu -</option>
                                                            <?php foreach($getPt as $row):?>
                                                            <option value="<?php echo $row->id_pt;?>">
                                                                <?php echo $row->nama_pt;?></option>
                                                            <?php endforeach;?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <!-- Text input-->
                                                <div class="form-group row">
                                                    <label class="col-lg-12 control-label text-lg-left"
                                                        for="textinput">Saldo</label>
                                                    <div class="col-lg-12">
                                                        <input id="textinput" name="saldo" type="text"
                                                            placeholder="Saldo"
                                                            class="form-control btn-square input-md">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <!-- <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="insert_nama_proyek">Nama Pekerjaan</label>
                                    <select class="form-control digits" name="insert_id_pt" id="pt">
                                        <option value="-">- Pilih Salah Satu -</option>
                                        <?php 
                                    foreach($getPt as $row):?>
                                        <option value="<?php echo $row->id_pt;?>"><?php echo $row->nama_pt;?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div> -->

                            <!-- <div class="field_wrapper">
                                <div class="form-group row">
                                    <label class="col-lg-12 control-label text-lg-left"
                                        for="Keterangan">Keterangan</label>
                                    <div class="col-lg-6">
                                        <div class="input-group">
                                            <input id="Keterangan" name="Keterangan" class="form-control btn-square"
                                                placeholder="Keterangan" type="text">
                                            <div class="input-group-prepend"><span class="btn btn-primary btn-right">add
                                                    more</span></div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="insert_nama_proyek">Nama Proyek</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" placeholder="Nama field"
                                                name="field_name[]" required="Nama field">
                                            <a href="javascript:void(0);" class="add_button btn btn btn-primary"
                                                title="Add field"><i class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
 -->
                            <div class="field_wrapper">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body animate-chk">
                                            <div class="row">
                                                <div class="col">
                                                    <!-- Text input-->
                                                    <div class="form-group row">
                                                        <label class="col-lg-12 control-label text-lg-left"
                                                            for="Tanggal">Tanggal</label>
                                                        <div class="col-lg-12">
                                                            <input class="datepicker-here form-control digits"
                                                                name="tanggal" type="text" data-language="en"
                                                                data-multiple-dates-separator=", "
                                                                data-position="bottom left" placeholder="Tanggal"
                                                                data-original-title="" title="">
                                                        </div>
                                                    </div>

                                                    <!-- Text input-->
                                                    <div class="form-group row">
                                                        <label class="col-lg-12 control-label text-lg-left"
                                                            for="textinput">Keterangan</label>
                                                        <div class="col-lg-12">
                                                            <input id="textinput" name="Keterangan" type="text"
                                                                placeholder="Keterangan"
                                                                class="form-control btn-square input-md">
                                                        </div>
                                                    </div>
                                                    <!-- Text input-->
                                                    <div class="form-group row">
                                                        <label class="col-lg-12 control-label text-lg-left"
                                                            for="Qyt">Quantity</label>
                                                        <div class="col-lg-12">
                                                            <input id="Qyt" name="Qyt" type="text"
                                                                placeholder="Quantity"
                                                                class="form-control btn-square input-md">

                                                        </div>
                                                    </div>

                                                    <!-- Text input-->
                                                    <div class="form-group row">
                                                        <label class="col-lg-12 control-label text-lg-left"
                                                            for="Satuan">Satuan</label>
                                                        <div class="col-lg-12">
                                                            <input id="Satuan" name="Satuan" type="text"
                                                                placeholder="Satuan"
                                                                class="form-control btn-square input-md">

                                                        </div>
                                                    </div>



                                                    <!-- Select Basic -->
                                                    <div class="form-group row">
                                                        <label class="col-lg-12 control-label text-lg-left"
                                                            for="Jenis">Kredit</label>
                                                        <div class="col-lg-12">
                                                            <input id="Kredit" name="Kredit" type="text"
                                                                placeholder="Kredit"
                                                                class="form-control btn-square input-md">
                                                        </div>
                                                    </div>

                                                    <!-- Select Basic -->
                                                    <div class="form-group row">
                                                        <label class="col-lg-12 control-label text-lg-left"
                                                            for="Jenis">Debit</label>
                                                        <div class="col-lg-12">
                                                            <input id="Debit" name="Debit" type="text"
                                                                placeholder="Debit"
                                                                class="form-control btn-square input-md">
                                                        </div>
                                                    </div>





                                                    <a href="javascript:void(0);" class="add_button btn btn btn-primary"
                                                        title="Tambah Keterangan">Tambah Keterangan</i></a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="insert_nama_pic_proyek">Nama PIC Proyek</label>
                                <input class="form-control" type="text" placeholder="Nama PIC Proyek" name="insert_nama_pic_proyek" required="Nama PIC Proyek Tidak Boleh Kosong">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="insert_no_hp_pic_proyek">No Hp PIC Proyek</label>
                                <input class="form-control" type="text" placeholder="No Hp PIC Proyek" name="insert_no_hp_pic_proyek" required="No Hp PIC Proyek Tidak Boleh Kosong">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="insert_alamat_proyek">Alamat Proyek</label>
                                <textarea class="form-control" name="insert_alamat_proyek" rows="3" placeholder="Alamat Proyek"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="insert_id_pt">Perusahaan yang Mengerjakan</label>
                                <select class="form-control digits" name="insert_id_pt" id="pt">
									<option value="-">- Pilih Salah Satu -</option>
									<?php 
                                    foreach($getPt as $row):?>
										<option value="<?php echo $row->id_pt;?>"><?php echo $row->nama_pt;?></option>
									<?php endforeach;?>
								</select>
                            </div>
                        </div> -->
                            <button class="btn btn-primary" id="btn_insert_data_proyek" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Proyek</h5>
                        Dibawah ini adalah data proyek.
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-border-horizontal" id="data_proyek_table">
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
                <form id="edit_data_proyek_form">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Nama Proyek</label>
                            <input class="form-control" id="edit_nama_proyek" type="text" placeholder="Nama Proyek"
                                name="form_edit_nama_proyek" required="Nama Proyek Tidak Boleh Kosong">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Alamat Proyek</label>
                            <input class="form-control" id="edit_alamat_proyek" type="text" placeholder="Alamat Proyek"
                                name="form_edit_alamat_proyek" required="Alamat Proyek Tidak Boleh Kosong">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Nama PIC Proyek</label>
                            <input class="form-control" id="edit_nama_pic" type="text" placeholder="Nama PIC Proyek"
                                name="form_edit_nama_pic" required="Nama PIC Tidak Boleh Kosong">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">No HP PIC Proyek</label>
                            <input class="form-control" id="edit_no_hp_pic" type="text" placeholder="No HP PIC"
                                name="form_edit_no_hp_pic" required="No HP PIC Tidak Boleh Kosong">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Perusahaan Yang Mengerjakan</label>
                            <select class="form-control digits" name="form_edit_id_pt" id="edit_id_pt">
                                <option value="-">- Pilih Salah Satu -</option>
                                <?php 
                                    foreach($getPt as $row):?>
                                <option value="<?php echo $row->id_pt;?>"><?php echo $row->nama_pt;?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <input class="form-control" type="text" id="editIDForm" name="idProyek" hidden>
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    // <input class="form-control" type="text" placeholder="Nama field" name="field_name[]" required="Nama field">
    var fieldHTML =
        '<div class="col-md-6"> <div class="card"> <div class="card-body animate-chk"> <div class="row"> <div class="col"> <!-- Text input--> <div class="form-group row"> <label class="col-lg-12 control-label text-lg-left" for="Qyt">Quantity</label> <div class="col-lg-12"> <input id="Qyt" name="Qyt" type="text" placeholder="Quantity" class="form-control btn-square input-md"></div> </div><!-- Text input--> <div class="form-group row"> <label class="col-lg-12 control-label text-lg-left" for="Tanggal">Tanggal</label> <div class="col-lg-12"> <input class="datepicker-here form-control digits" name="tanggal" type="text" data-language="en" data-multiple-dates-separator=", " data-position="bottom left" placeholder="Tanggal" data-original-title="" title=""> </div> </div><!-- Select Basic --> <div class="form-group row"> <label class="col-lg-12 control-label text-lg-left" for="Jenis">Jenis</label> <div class="col-lg-12"> <select id="Jenis" name="Jenis" class="form-control btn-square"> <option value="Kredit">Kredit</option> <option value="Debit">Debit</option> </select> </div> </div><!-- Text input--> <div class="form-group row"> <label class="col-lg-12 control-label text-lg-left" for="Satuan">Satuan</label> <div class="col-lg-12"> <input id="Satuan" name="Satuan" type="text" placeholder="Satuan" class="form-control btn-square input-md"></div></div><!-- Text input--> <div class="form-group row"> <label class="col-lg-12 control-label text-lg-left" for="textinput">Saldo</label> <div class="col-lg-12"> <input id="textinput" name="saldo" type="text" placeholder="Saldo" class="form-control btn-square input-md"> </div> </div><a href="javascript:void(0);" class="btn btn-danger remove_button" title="Hapus Keterangan">Hapus Keterangan</i></a></div> </div> </div> </div> </div>'
    // '<div class="row"><div class="col-md-4 mb-3"><div class="input-group"><input type="text" name="field_name[]" class="form-control" value=""/><a href="javascript:void(0);" class="btn btn-danger remove_button"><i class="fa fa-minus"></i></a></div></div></div></div>'; //New input field html 
    var x = 1; //Initial field counter is 1

    //Once add button is clicked
    $(addButton).click(function() {
        //Check maximum number of input fields
        if (x < maxField) {
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });

    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e) {
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>