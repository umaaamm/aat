<script>
    $(document).ready(function() {
        const formInput = $("#insert_data_slip_gaji_form");
        const formEdit = $("#edit_slip_gaji_form");
        getData();

        $.validator.addMethod("validEndPeriod", function(value, element, params) {
            return value > $('#periode_awal').val();
        }, "Tanggal periode akhir harus melebihi tanggal periode awal.");

        $.validator.addMethod("valueNotEquals", function(value, element, arg){
            return value !== '-';
        }, "Pilihan tidak boleh sama.");

        formInput.validate({
            rules: {
                insert_nama_perusahaan: {
                    required: true,
                    valueNotEquals: true,
                },
                insert_nama_proyek: {
                    required: true,
                    valueNotEquals: true,
                },
                insert_nama_karyawan: {
                    required: true,
                    valueNotEquals: true,
                },
                periode_awal: {
                    required: true,
                },
                periode_akhir: {
                    required: true,
                    validEndPeriod: true
                },
                insert_gaji_pokok: {
                    required: true,
                },
                insert_uang_makan: {
                    required: true,
                },
                insert_uang_lembur: {
                    required: true,
                },
                insert_lama_lembur: {
                    required: true,
                },
            },
            messages: {
                insert_nama_perusahaan: {
                    required: "Masukkan nama perusahaan !",
                    valueNotEquals: "Masukkan nama perusahaan !",
                },
                insert_nama_proyek: {
                    required: "Masukkan nama proyek !",
                    valueNotEquals: "Masukkan nama proyek !"
                },
                insert_nama_karyawan: {
                    required: "Masukkan nama karyawan !",
                    valueNotEquals: "Masukkan nama karyawan !"
                },
                periode_awal: {
                    required: "Masukkan periode awal !"
                },
                periode_akhir: {
                    required: "Masukkan periode akhir !",
                    validEndPeriod: "Tanggal periode akhir harus melebihi tanggal periode awal."
                },
                insert_gaji_pokok: {
                    required: "Masukkan gaji pokok !"
                },
                insert_uang_makan: {
                    required: "Masukkan uang makan !"
                },
                insert_uang_lembur: {
                    required: "Masukkan uang lembur !"
                },
                insert_lama_lembur: {
                    required: "Masukkan lama lembur !"
                },
            },
            submitHandler: function(formInput) {
                Notiflix.Confirm.Show('Konfirmasi Input', 'Apakah data yang diinputkan sudah benar ?', 'Ya', 'Tidak',
                    function() {
                        // Yes button callback alert('Thank you.'); 
                        let initialForm = $("#insert_data_slip_gaji_form")[0];
                        let formData = new FormData(initialForm);
                        insertData(formData);
                    },
                    function() {
                        // No button callback alert('If you say so...'); 
                        return;
                    });
            }
        });

        $.validator.addMethod("editValidEndPeriod", function(value, element, params) {
            return value > $('#edit_periode_awal').val();
        }, "Tanggal periode akhir harus melebihi tanggal periode awal.");

        $.validator.addMethod("editValueNotEquals", function(value, element, arg){
            return value !== '-';
        }, "Pilihan tidak boleh sama.");

        formEdit.validate({
            rules: {
                edit_nama_perusahaan: {
                    required: true,
                    editValueNotEquals: true,
                },
                edit_nama_proyek: {
                    required: true,
                    editValueNotEquals: true,
                },
                edit_nama_karyawan: {
                    required: true,
                    editValueNotEquals: true,
                },
                edit_periode_awal: {
                    required: true,
                },
                edit_periode_akhir: {
                    required: true,
                    editValidEndPeriod: true
                },
                edit_gaji_pokok: {
                    required: true,
                },
                edit_uang_makan: {
                    required: true,
                },
                edit_uang_lembur: {
                    required: true,
                },
                edit_lama_lembur: {
                    required: true,
                },
            },
            messages: {
                edit_nama_perusahaan: {
                    required: "Masukkan nama perusahaan !",
                    editValueNotEquals: "Masukkan nama perusahaan !",
                },
                edit_nama_proyek: {
                    required: "Masukkan nama proyek !",
                    editValueNotEquals: "Masukkan nama proyek !"
                },
                edit_nama_karyawan: {
                    required: "Masukkan nama karyawan !",
                    editValueNotEquals: "Masukkan nama karyawan !"
                },
                edit_periode_awal: {
                    required: "Masukkan periode awal !"
                },
                edit_periode_akhir: {
                    required: "Masukkan periode akhir !",
                    editValidEndPeriod: "Tanggal periode akhir harus melebihi tanggal periode awal."
                },
                edit_gaji_pokok: {
                    required: "Masukkan gaji pokok !"
                },
                edit_uang_makan: {
                    required: "Masukkan uang makan !"
                },
                edit_uang_lembur: {
                    required: "Masukkan uang lembur !"
                },
                edit_lama_lembur: {
                    required: "Masukkan lama lembur !"
                },
            },
            submitHandler: function(formEdit) {
                Notiflix.Confirm.Show('Konfirmasi Edit', 'Apakah data yang diinputkan sudah benar ?', 'Ya', 'Tidak',
                    function() {
                        // Yes button callback alert('Thank you.'); 
                        let initialForm = $("#edit_slip_gaji_form")[0];
                        let formData = new FormData(initialForm);
                        editData(formData);
                    },
                    function() {
                        // No button callback alert('If you say so...'); 
                        return;
                    });
            }
        });

        const table = $('#data_slip_gaji_table').DataTable({
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
                    title: "Nama PT",
                    data: "nama_pt"
                },
                {
                    title: "Nama Proyek",
                    data: "nama_proyek"
                },
                {
                    title: "Gaji Pokok",
                    data: "gaji_pokok",
                    className: 'text-right',
                    render: $.fn.dataTable.render.number(',', '.', 0, 'Rp. ')
                },
                {
                    title: "Uang Makan",
                    data: "uang_makan",
                    className: 'text-right',
                    render: $.fn.dataTable.render.number(',', '.', 0, 'Rp. ')
                },
                {
                    title: "Lama Kerja",
                    data: {
                        periode_akhir : "periode_akhir",
                        periode_awal : "periode_awal",
                    },
                    render:function(data){   
                        let differentInTime = new Date(data.periode_akhir) - new Date(data.periode_awal);
                        let differentInDays = differentInTime / (1000 * 3600 * 24);
                        return differentInDays + " hari"; 
                    }
                },
                {
                    title: "Uang Lembur",
                    data: "uang_lembur",
                    className: 'text-right',
                    render: $.fn.dataTable.render.number(',', '.', 0, 'Rp. ')
                },
                {
                    title: "Lama Lembur",
                    data: {
                        lama_lembur : "lama_lembur",
                    },
                    render:function(data){
                        return data.lama_lembur + " jam"; 
                    }
                },
                {
                    title: "Action",
                    data: {
                        id_slip_gaji: "id_slip_gaji"
                    },
                    render: function(data) {                        
                        let html = '<div class="btn-group" role="group" aria-label="First group">';
                        html += '<button class="btn btn-primary" type="button"  onclick="showModal(' + data.id_slip_gaji + ')" ><i class="fa fa-edit"></i></button><button class="btn btn-danger" type="button" data-original-title="Hapus Data Slip Gaji" title="" onclick="deleteConfirmation(' + data.id_slip_gaji + ')"><i class="fa fa-trash-o"></i></button>';
                        html += '</div>';
                        return html;
                    }
                },
                {
                    title: "Download",
                    data: {
                        id_slip_gaji: "id_slip_gaji"
                    },
                    className: 'text-center',
                    render: function(data) {
                        let html = '<div class="btn-group" role="group" aria-label="First group">';
                        html += '<a href="slip_gaji/downloadSlipGaji/'+data.id_slip_gaji+'" class="btn btn-sm btn-primary btn-icon" title="Download Slip Gaji"><i class="fa fa-download"></i></a>';
                        html += '</div>';

                        return html;
                    }
                }
            ]
        })

        $("#insert_gaji_pokok").on('keyup', function(){
            var n = parseInt($(this).val().replace(/\D/g,''),10);
            $(this).val(n.toLocaleString());
        });

        $("#insert_uang_makan").on('keyup', function(){
            var n = parseInt($(this).val().replace(/\D/g,''),10);
            $(this).val(n.toLocaleString());
        });

        $("#insert_uang_lembur").on('keyup', function(){
            var n = parseInt($(this).val().replace(/\D/g,''),10);
            $(this).val(n.toLocaleString());
        });

        $("#edit_gaji_pokok").on('keyup', function(){
            var n = parseInt($(this).val().replace(/\D/g,''),10);
            $(this).val(n.toLocaleString());
        });

        $("#edit_uang_makan").on('keyup', function(){
            var n = parseInt($(this).val().replace(/\D/g,''),10);
            $(this).val(n.toLocaleString());
        });

        $("#edit_uang_lembur").on('keyup', function(){
            var n = parseInt($(this).val().replace(/\D/g,''),10);
            $(this).val(n.toLocaleString());
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
            url: 'slip_gaji/getDataSlipGaji',
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
                    $('#data_slip_gaji_table').dataTable().fnClearTable();
                    return;
                }

                $('#data_slip_gaji_table').dataTable().fnClearTable();
                $('#data_slip_gaji_table').dataTable().fnAddData(response.data);
                return;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error getData : ' + textStatus + ' ' + errorThrown);
            }
        })
    }

    const insertData = (formData) => {
        $.ajax({
            url: 'slip_gaji/ajaxInsert',
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
            url: 'slip_gaji/ajaxUpdate',
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
                console.log(response);
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
            url: 'slip_gaji/ajaxDelete',
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
            url: 'slip_gaji/getByID',
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

                let gaji_pokok = parseInt(response.data.gaji_pokok.replace(/\D/g,''),10);
                let uang_makan = parseInt(response.data.uang_makan.replace(/\D/g,''),10);
                let uang_lembur = parseInt(response.data.uang_lembur.replace(/\D/g,''),10);
                $('#edit_nama_perusahaan').val(response.data.id_pt);
                $('#edit_nama_proyek').val(response.data.id_proyek);
                $('#edit_nama_karyawan').val(response.data.id_karyawan);
                $('#edit_periode_awal').val(response.data.periode_awal);
                $('#edit_periode_akhir').val(response.data.periode_akhir);
                $('#edit_gaji_pokok').val(gaji_pokok.toLocaleString());
                $('#edit_uang_makan').val(uang_makan.toLocaleString());
                $('#edit_uang_lembur').val(uang_lembur.toLocaleString());
                $('#edit_lama_lembur').val(response.data.lama_lembur);
                $('#idSlipGaji').val(response.data.id_slip_gaji);
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
                <h3>Slip Gaji</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>/ltr/index.html">Home</a></li>
                    <li class="breadcrumb-item">Forms  </li>
                    <li class="breadcrumb-item active">Slip Gaji</li>
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
                    <h5>Slip Gaji</h5>
                    <span>Silahkan isi data sesuai dengan form yang telah disediakan.</span>
                </div>
                <div class="card-body">
                    <form id="insert_data_slip_gaji_form">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Nama Perusahaan</label>
                                <select class="form-control" name="insert_nama_perusahaan" id="insert_nama_perusahaan">
									<option value="-">- Pilih Salah Satu -</option>
									<?php 
                                    foreach($getPt as $row){?>
										<option value="<?php echo $row->id_pt;?>"><?php echo $row->nama_pt;?></option>
									<?php } ?>
								</select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="insert_nama_proyek">Nama Proyek</label>
                                <select class="form-control" name="insert_nama_proyek" id="insert_nama_proyek">
									<option value="-">- Pilih Salah Satu -</option>
									<?php 
                                    foreach($getProyek as $row){?>
										<option value="<?php echo $row->id_proyek;?>"><?php echo $row->nama_proyek;?></option>
									<?php } ?>
								</select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="insert_nama_karyawan">Nama Karyawan</label>
                                <select class="form-control" name="insert_nama_karyawan" id="insert_nama_karyawan">
									<option value="-">- Pilih Salah Satu -</option>
									<?php 
                                    foreach($getKaryawan as $row){?>
										<option value="<?php echo $row->id_karyawan;?>"><?php echo $row->nama_karyawan;?></option>
									<?php } ?>
								</select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="periode_awal">Periode Awal</label>
                                <input class="form-control" id="periode_awal" type="date" placeholder="Tanggal Periode Awal" name="periode_awal">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="periode_akhir">Periode Akhir</label>
                                <input class="form-control" id="periode_akhir" type="date" placeholder="Tanggal Periode Akhir" name="periode_akhir">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="insert_gaji_pokok">Gaji Pokok (Harian)</label>
                                <input class="form-control" id="insert_gaji_pokok" type="text" placeholder="Gaji Pokok (Harian)" name="insert_gaji_pokok">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="insert_uang_makan">Uang Makan (Harian)</label>
                                <input class="form-control" id="insert_uang_makan" type="text" placeholder="Uang Makan (Harian)" name="insert_uang_makan">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="insert_uang_lembur">Uang Lembur (Jam)</label>
                                <input class="form-control" id="insert_uang_lembur" type="text" placeholder="Uang Lembur (Jam)" name="insert_uang_lembur">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="insert_lama_lembur">Lama Lembur (jam)</label>
                                <input class="form-control" id="insert_lama_lembur" type="number" placeholder="Lama Lembur (Jam)" name="insert_lama_lembur">
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block" id="btn_insert_slip_gaji" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Data Slip Gaji</h5>
                    Dibawah ini adalah data slip gaji.
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-border-horizontal" id="data_slip_gaji_table">
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
                <h5 class="modal-title" id="editModalLabel">Edit Data Slip Gaji</h5>
                <button type="button" class="btn-close" onclick="$('#editModal').modal('hide');" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit_slip_gaji_form">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="edit_nama_perusahaan">Nama Perusahaan</label>
                            <select class="form-control required" name="edit_nama_perusahaan" id="edit_nama_perusahaan">
                                <option value="-">- Pilih Salah Satu -</option>
                                <?php 
                                foreach($getPt as $row){?>
                                    <option value="<?php echo $row->id_pt;?>"><?php echo $row->nama_pt;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="edit_nama_proyek">Nama Proyek</label>
                            <select class="form-control" name="edit_nama_proyek" id="edit_nama_proyek">
                                <option value="-">- Pilih Salah Satu -</option>
                                <?php 
                                foreach($getProyek as $row){?>
                                    <option value="<?php echo $row->id_proyek;?>"><?php echo $row->nama_proyek;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="edit_nama_karyawan">Nama Karyawan</label>
                            <select class="form-control" name="edit_nama_karyawan" id="edit_nama_karyawan">
                                <option value="-">- Pilih Salah Satu -</option>
                                <?php 
                                foreach($getKaryawan as $row){?>
                                    <option value="<?php echo $row->id_karyawan;?>"><?php echo $row->nama_karyawan;?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="edit_periode_awal">Periode Awal</label>
                            <input class="form-control" id="edit_periode_awal" type="date" placeholder="Tanggal Periode Awal" name="edit_periode_awal">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="edit_periode_akhir">Periode Akhir</label>
                            <input class="form-control" id="edit_periode_akhir" type="date" placeholder="Tanggal Periode Akhir" name="edit_periode_akhir">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="edit_gaji_pokok">Gaji Pokok (Harian)</label>
                            <input class="form-control" id="edit_gaji_pokok" type="text" placeholder="Gaji Pokok (Harian)" name="edit_gaji_pokok">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="edit_uang_makan">Uang Makan (Harian)</label>
                            <input class="form-control" id="edit_uang_makan" type="text" placeholder="Uang Makan (Harian)" name="edit_uang_makan">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="edit_uang_lembur">Uang Lembur (Jam)</label>
                            <input class="form-control" id="edit_uang_lembur" type="text" placeholder="Uang Lembur (Jam)" name="edit_uang_lembur">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="edit_lama_lembur">Lama Lembur (jam)</label>
                            <input class="form-control" id="edit_lama_lembur" type="number" placeholder="Lama Lembur (Jam)" name="edit_lama_lembur">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input class="form-control" type="text" id="idSlipGaji" name="idSlipGaji" hidden>
                            <button class="btn btn-primary btn-block btn_modal_edit" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>