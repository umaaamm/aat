<script>
    $(document).ready(function() {
        const formInput = $("#insert_laporan_harian_form");
        const formEdit = $("#edit_data_proyek_form");
        const formKeterangan = $("#insert_keterangan_laporan_harian_form");
        const formEditLaporanHarian = $("#edit_data_laporan_harian_form");

        getData();

        // $("#divIDClass").hide();


        // get data dropdown
        $.ajax({
            type: 'POST',
            url: "rekap_wo/getRekananPerusahaanAjax",
            cache: false,
            success: function(msg) {
                $("#perusahaan_rekanan").html(msg);
            }
        });

        $("#perusahaan_rekanan").change(function() {
            var perusahaan_rekanan = $("#perusahaan_rekanan").val();
            $.ajax({
                type: 'POST',
                url: "rekap_wo/getProyekAjax",
                data: {
                    perusahaan_rekanan: perusahaan_rekanan
                },
                cache: false,
                success: function(msg) {
                    $("#id_proyek").html(msg);
                }
            });
        });

        $.ajax({
            type: 'POST',
            url: "rekap_wo/getRekananPerusahaanAjax",
            cache: false,
            success: function(msg) {
                $("#perusahaan_rekanan_modal").html(msg);
            }
        });

        $("#perusahaan_rekanan_modal").change(function() {
            var perusahaan_rekanan = $("#perusahaan_rekanan_modal").val();
            $.ajax({
                type: 'POST',
                url: "rekap_wo/getProyekAjax",
                data: {
                    perusahaan_rekanan: perusahaan_rekanan
                },
                cache: false,
                success: function(msg) {
                    $("#id_proyek_modal").html(msg);
                }
            });
        });

        // end get dropdown
        formKeterangan.validate({
            rules: {
                insert_id_laporan_harian: "required",
                insert_keterangan: "required",
                insert_qyt: "required",
                insert_satuan: "required",
                insert_kredit: "required",
                insert_debit: "required",
                insert_id_status_bayar: "required",
                insert_id_keterangan: "required"
            },
            messages: {
                insert_id_laporan_harian: "Masukkan nama perusahaan rekanan!",
                insert_keterangan: "Masukkan keterangan!",
                insert_qyt: "Masukkan Qyt!",
                insert_satuan: "Masukkan Satuan!",
                insert_kredit: "Masukkan Nomonila Kredit!",
                insert_debit: "Masukkan Nominal Debit!",
                insert_id_status_bayar: "Masukkan Keterangan!",
                insert_id_keterangan: "Masukkan Keterangan Status!"
            },
            submitHandler: function(formKeterangan) {

                Notiflix.Confirm.Show('Konfirmasi Input', 'Apakah data yang diinputkan sudah benar ?',
                    'Ya', 'Tidak',
                    function() {
                        let initialForm = $("#insert_keterangan_laporan_harian_form")[0];
                        let formData = new FormData(initialForm);
                        insertDataKeterangan(formData);
                    },
                    function() {
                        return;
                    }
                );
            }
        });


        formEditLaporanHarian.validate({
            rules: {
                perusahaan_rekanan_modal: "required",
                id_proyek_modal: "required",
                edit_tanggal_laporan_harian: "required",
                edit_saldo_laporan_harian: "required"
            },
            messages: {
                perusahaan_rekanan_modal: "Masukkan nama perusahaan rekanan!",
                id_proyek_modal: "Masukkan nama proyek!",
                edit_tanggal_laporan_harian: "Masukkan tanggal!",
                edit_saldo_laporan_harian: "Masukkan saldo!",
            },
            submitHandler: function(formKeterangan) {

                Notiflix.Confirm.Show('Konfirmasi Input', 'Apakah data yang diinputkan sudah benar ?',
                    'Ya', 'Tidak',
                    function() {
                        let initialForm = $("#edit_data_laporan_harian_form")[0];
                        let formData = new FormData(initialForm);
                        editDataLaporanHaraian(formData);
                    },
                    function() {
                        return;
                    }
                );
            }
        });

        formInput.validate({
            rules: {
                insert_id_rekanan_perusahaan: "required",
                insert_id_proyek: "required",
                insert_tanggal: "required",
                insert_saldo: "required"
            },
            messages: {
                insert_id_rekanan_perusahaan: "Masukkan nama perusahaan rekanan!",
                insert_id_proyek: "Masukkan nama proyek!",
                insert_tanggal: "Masukkan tanggal!",
                insert_saldo: "Masukkan saldo!",
            },
            submitHandler: function(formInput) {

                Notiflix.Confirm.Show('Konfirmasi Input', 'Apakah data yang diinputkan sudah benar ?',
                    'Ya', 'Tidak',
                    function() {
                        let initialForm = $("#insert_laporan_harian_form")[0];
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

        const table = $('#data_laporan_harian_table').DataTable({
            scrollX: true,
            language: {
                search: "Filter"
            },
            responsive: true,
            columns: [{
                    title: "Nama Perusahaan Rekanan",
                    data: "nama_perusahaan"
                },
                {
                    title: "Nama Proyek",
                    data: "nama_proyek"
                },
                {
                    title: "Tanggal Laporan",
                    data: "tanggal"
                },
                {
                    title: "Action",
                    data: {
                        id_laporan_harian: "id_laporan_harian"
                    },
                    render: function(data) {
                        let statusButton =
                            '<button class="btn btn-primary" type="button"  onclick="showModal(' +
                            data.id_laporan_harian +
                            ')" ><i class="icofont icofont-eye-alt"></i></button>&nbsp;<button class="btn btn-primary" type="button"  onclick="showModalEdit(' +
                            data.id_laporan_harian +
                            ')" ><i class="fa fa-edit"></i></button>&nbsp;<button class="btn btn-danger" type="button" data-original-title="Hapus Data Proyek" title="" onclick="deleteConfirmation(' +
                            data.id_laporan_harian + ')"><i class="fa fa-trash-o"></i></button>'
                        return statusButton;
                    }
                }
            ]
        })

        const tables = $('#data_laporan_harian_tables').DataTable({
            scrollX: true,
            language: {
                search: "Filter"
            },
            responsive: true,
            columns: [{
                    title: "Tanggal",
                    data: "tanggal"
                },
                {
                    title: "Keterangan",
                    data: "keterangan"
                },
                {
                    title: "Qyt",
                    data: "qyt"
                },
                {
                    title: "Satuan",
                    data: "satuan"
                },
                {
                    title: "Kredit",
                    data: "kredit"
                },
                {
                    title: "Debit",
                    data: "debit"
                },
                {
                    title: "Keterangan",
                    data: "value_keterangan"
                },
                {
                    title: "Keterangan Bayar",
                    data: "value_status"
                },
                {
                    title: "Action",
                    data: {
                        id_laporan_harian: "id_laporan_harian"
                    },
                    render: function(data) {
                        let statusButton =
                            '<button class="btn btn-danger" type="button" data-original-title="Hapus Data" title="" onclick="deleteConfirmationKeteranganLaporan(' +
                            data.id_data_laporan_harian + ')"><i class="fa fa-trash-o"></i></button>'
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

    const deleteConfirmationKeteranganLaporan = (id) => {
        Notiflix.Confirm.Show('Konfirmasi Hapus', 'Apakah anda yakin akan menghapus data ini ?', 'Ya', 'Tidak',
            function() {
                deleteDataKeterangan(id);
                return;
            },
            function() {
                return;
            });
    }

    const getData = () => {
        $.ajax({
            url: 'laporan_harian/getDataLaporanHarian',
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

                $('#data_laporan_harian_table').dataTable().fnClearTable();
                $('#data_laporan_harian_table').dataTable().fnAddData(response.data);
                return;
            }
        })
    };


    const getDataModal = (id_laporan_harian) => {
        $.ajax({
            url: 'laporan_harian/getDetailDataLaporanHarian',
            type: 'POST',
            data: {
                id_laporan_harian: id_laporan_harian
            },
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

                $('#data_laporan_harian_tables').dataTable().fnClearTable();
                $('#data_laporan_harian_tables').dataTable().fnAddData(response.data);
                return;
            }
        })
    };

    const insertData = (formData) => {
        $.ajax({
            url: 'laporan_harian/ajaxInsert',
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

    const insertDataKeterangan = (formData) => {
        $.ajax({
            url: 'laporan_harian/ajaxInsertKeterangan',
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

    //editlaporanharian
    const editDataLaporanHaraian = (formData) => {
        $.ajax({
            url: 'laporan_harian/ajaxUpdateLaporanHarian',
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
                $('#editModalLaporan').modal('hide');
                getData();
                return;
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error editData : ' + textStatus + ' ' + errorThrown);
            }
        })
    }
    //end edit laporan harian

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
            url: 'laporan_harian/ajaxDelete',
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

    const deleteDataKeterangan = (id) => {
        $.ajax({
            url: 'laporan_harian/ajaxDeleteKeterangan',
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
        getDataModal(id);
        $('#editModal').modal('show');
        $.ajax({
            url: 'laporan_harian/getByID',
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

                $('#editModalLabel').text('Detail Laporan Harian ' + response.data.nama_proyek);
                $('#edit_nama_perusahaan').val(response.data.nama_perusahaan);
                $('#edit_nama_proyek').val(response.data.nama_proyek);
                $('#edit_saldo').val(response.data.saldo);
                $('#editIDForm').val(response.data.id_proyek);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error showModal : ' + textStatus + ' ' + errorThrown);
            }
        })
    };
    const showModalEdit = (id) => {
        $('#editModalLaporan').modal('show');
        $.ajax({
            url: 'laporan_harian/getByID',
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

                $('#editModalLaporanTitle').text('Edit Laporan Harian ' + response.data.nama_proyek);
                $('#perusahaan_rekanan_modal').val(response.data.id_perusahaan_rekanan);
                getDataProyekModal(response);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error showModal : ' + textStatus + ' ' + errorThrown);
            }
        })
    };

    const getDataProyekModal = (response) => {
        $.ajax({
            type: 'POST',
            url: "rekap_wo/getProyekAjax",
            data: {
                perusahaan_rekanan: response.data.id_perusahaan_rekanan
            },
            cache: false,
            success: function(msg) {
                $("#id_proyek_modal").html(msg);
                $('#id_proyek_modal').val(response.data.id_proyek);
                $('#edit_saldo_laporan_harian').val(response.data.saldo);
                $('#edit_tanggal_laporan_harian').val(response.data.tanggal);
                $('#editIDForm_laporan').val(response.data.id_laporan_harian);
            }
        });
    }
</script>

<div class="page-body">
    <div class="container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-lg-6">
                    <h3>Laporan Harian</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>/ltr/index.html">Home</a></li>
                        <li class="breadcrumb-item">Forms </li>
                        <li class="breadcrumb-item active">Laporan Harian</li>
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
                        <h5>Form Laporan Harian</h5>
                        <span>Silahkan isi data sesuai dengan form yang telah disediakan.</span>
                    </div>
                    <div class="card-body">
                        <form id="insert_laporan_harian_form">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="insert_id_rekanan_perusahaan">Perusahaan Rekanan</label>
                                    <select class="form-control" name="insert_id_rekanan_perusahaan" id="perusahaan_rekanan">
                                        <option value=""> - Pilih Salah Satu -</option>
                                    </select>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="insert_id_proyek">Nama Proyek/Pekerjaan</label>
                                    <select class="form-control" name="insert_id_proyek" id="id_proyek">
                                        <option value="">- Pilih Salah Satu -</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="Tanggal">Tanggal</label>
                                    <input class="datepicker-here form-control" id="tanggal" name="insert_tanggal" type="text" data-language="en" data-multiple-dates-separator=", " data-position="bottom left" placeholder="Tanggal" data-original-title="" title="">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="insert_nama_proyek">Saldo</label>
                                    <input class="form-control" type="text" placeholder="Saldo" name="insert_saldo" required="Saldo Tidak Boleh Kosong">
                                </div>
                            </div>

                            <button class="btn btn-primary" id="btn_insert_laporan_harian" type="submit">Simpan</button>

                        </form>

                        <div id="divIDClass">
                            <br>

                            <h5>Input Keterangan</h5>
                            <hr>

                            <form id="insert_keterangan_laporan_harian_form">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="insert_pph">Tanggal Laporan Harian</label>
                                        <select class="form-control digits" name="insert_id_laporan_harian" id="perusahaan_rekanan">
                                            <option value="-">- Pilih Salah Satu -</option>
                                            <?php
                                            foreach ($getLaporanHarian as $row) : ?>
                                                <option value="<?php echo $row->id_laporan_harian; ?>">
                                                    <?php echo $row->nama_perusahaan; ?> - <?php echo $row->nama_proyek; ?> - <?php echo $row->tanggal; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="insert_keterangan">Keterangan</label>
                                        <input class="form-control" type="text" id="id_keterangan" placeholder="Keterangan" name="insert_keterangan" required="Keterangan Tidak Boleh Kosong">
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="insert_qyt">QYT</label>
                                        <input class="form-control" type="text" placeholder="Qyt" id="insert_qyt" name="insert_qyt" required="Qyt tidak boleh kosong">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="insert_satuan">Satuan</label>
                                        <input class="form-control" type="text" id="id_satuan" placeholder="Satuan" name="insert_satuan" required="Satuan Tidak Boleh Kosong">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="insert_kredit">Kredit</label>
                                        <input class="form-control" type="text" id="id_kredit" placeholder="Kredit" name="insert_kredit" required="Kredit Tidak Boleh Kosong">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="insert_debit">Debit</label>
                                        <input class="form-control" type="text" id="id_debit" placeholder="Debit" name="insert_debit" required="Debit Tidak Boleh Kosong">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="insert_pph">Keterangan</label>
                                        <select class="form-control digits" name="insert_id_keterangan" id="insert_id_keterangan">
                                            <option value="-">- Pilih Salah Satu -</option>
                                            <?php
                                            foreach ($getKeterangan as $row) : ?>
                                                <option value="<?php echo $row->id_keterangan; ?>">
                                                    <?php echo $row->value_keterangan; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="insert_pph">Keterangan Status Bayar</label>
                                        <select class="form-control digits" name="insert_id_status_bayar" id="insert_id_status_bayar">
                                            <option value="-">- Pilih Salah Satu -</option>
                                            <?php
                                            foreach ($getStatusBayar as $row) : ?>
                                                <option value="<?php echo $row->id_keterangan_status; ?>">
                                                    <?php echo $row->value_status; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <button class="btn btn-primary" id="btn_insert_keterangan_laporan_harian" type="submit">Simpan</button>
                            </form>
                            <!-- endkwkwwk -->

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Laporan Harian</h5>
                        Dibawah ini adalah data laporan harian.
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-border-horizontal" id="data_laporan_harian_table">
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
<div class="modal fade" id="editModalLaporan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLaporanTitle">Modal title</h5>
                <button type="button" class="btn-close" onclick="$('#editModalLaporan').modal('hide');" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit_data_laporan_harian_form">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Nama Perusahaan Rekanan</label>
                            <select class="form-control" name="perusahaan_rekanan_modal" id="perusahaan_rekanan_modal">
                                <option value=""> - Pilih Salah Satu -</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Pekerjaan/Proyek</label>
                            <select class="form-control" name="id_proyek_modal" id="id_proyek_modal">
                                <option value="">- Pilih Salah Satu -</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="Tanggal">Tanggal</label>
                            <input class="datepicker-here form-control" id="edit_tanggal_laporan_harian" name="edit_tanggal_laporan_harian" type="text" data-language="en" data-multiple-dates-separator=", " data-position="bottom left" placeholder="Tanggal" data-original-title="" title="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Saldo</label>
                            <input class="form-control" id="edit_saldo_laporan_harian" type="text" placeholder="Saldo" name="edit_saldo_laporan_harian" required="Saldo Boleh Kosong">
                        </div>
                    </div>
                    <div class="row">
                        <input class="form-control" type="text" id="editIDForm_laporan" name="editIDForm_laporan" hidden>
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal Detail-->
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Modal title</h5>
                <button type="button" class="btn-close" onclick="$('#editModal').modal('hide');" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit_data_proyek_form">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Nama Perusahaan</label>
                            <input class="form-control" id="edit_nama_perusahaan" type="text" placeholder="Nama Perusahaan" name="form_edit_nama_perusahaan" required="Nama Perusahaan Tidak Boleh Kosong" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Pekerjaan/Proyek</label>
                            <input class="form-control" id="edit_nama_proyek" type="text" placeholder="Nama Proyek" name="form_edit_nama_proyek" required="Nama Proyek Tidak Boleh Kosong" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="validationCustom01">Saldo</label>
                            <input class="form-control" id="edit_saldo" type="text" placeholder="Saldo" name="form_edit_saldo" required="Saldo Boleh Kosong" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Detail Laporan Harian</h5>
                                    Dibawah ini adalah data laporan harian.
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-border-horizontal" id="data_laporan_harian_tables">
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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