<script>
function calculateAmount(val) {
    var total_ppn = parseFloat(val) * 0.1;
    var total_pph = parseFloat(val) * 0.02;

    var total_tagihan_faktur = parseFloat(val) + parseFloat(total_ppn);
    var total_tagihan_rekening_koran = (parseFloat(val) + parseFloat(total_ppn)) - parseFloat(total_pph);

    var objppn = document.getElementById('id_ppn');
    var objpph = document.getElementById('id_pph');
    var objTagihanFaktur = document.getElementById('id_tagihan_faktur');
    var objTagihanRekeningKoran = document.getElementById('id_rekening_koran');

    objppn.value = total_ppn;
    objpph.value = total_pph;
    objTagihanFaktur.value = total_tagihan_faktur;
    objTagihanRekeningKoran.value = total_tagihan_rekening_koran;
}

function calculateAmountEdit(val) {
    var total_ppn = parseFloat(val) * 0.1;
    var total_pph = parseFloat(val) * 0.02;

    var total_tagihan_faktur = parseFloat(val) + parseFloat(total_ppn);
    var total_tagihan_rekening_koran = (parseFloat(val) + parseFloat(total_ppn)) - parseFloat(total_pph);

    var objppn = document.getElementById('edit_id_ppn');
    var objpph = document.getElementById('edit_id_pph');
    var objTagihanFaktur = document.getElementById('edit_id_tagihan_faktur');
    var objTagihanRekeningKoran = document.getElementById('edit_id_rekening_koran');

    objppn.value = total_ppn;
    objpph.value = total_pph;
    objTagihanFaktur.value = total_tagihan_faktur;
    objTagihanRekeningKoran.value = total_tagihan_rekening_koran;
}


$(document).ready(function() {
    const formInput = $("#insert_rekap_wo_form");
    const formEdit = $("#edit_rekap_wo_form");
    getData();

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

	$.validator.addMethod("valueNotEquals", function(value, element, arg){
		return value !== '-';
	}, "Pilihan tidak boleh sama.");

	formInput.validate({
		rules: {
			insert_id_rekanan_perusahaan: {
				required: true,
				valueNotEquals: true,
			},
			insert_id_proyek: {
				required: true,
				valueNotEquals: true,
			},
			insert_work_order: {
				required: true
			},
			insert_tanggal: {
				required: true
			},
			insert_nilai_kontrak: {
				required: true
			},
			insert_ppn: {
				required: true
			},
			insert_pph: {
				required: true
			},
			insert_tagihan_faktur: {
				required: true
			},
			insert_rekening_koran: {
				required: true
			}
		},
		messages: {
			insert_id_rekanan_perusahaan: {
				required: "Pilih perusahaan rekanan !",
				valueNotEquals: "Pilih perusahaan rekanan !"
			},
			insert_id_proyek: {
				required: "Pilih nama proyek !",
				valueNotEquals: "Pilih nama proyek !"
			},
			insert_work_order: {
				required: "Masukkan Work Order !",
			},
			insert_tanggal: {
				required: "Masukkan tanggal !",
			},
			insert_nilai_kontrak: {
				required: "Masukkan nilai kontrak !",
			},
			insert_ppn: {
				required: "Masukkan pph !",
			},
			insert_pph: {
				required: "Masukkan ppn !",
			},
			insert_tagihan_faktur: {
				required: "Masukkan tagihan faktur !",
			},
			insert_rekening_koran: {
				required: "Masukkan rekening koran !",
			}
		},
		submitHandler: function(formInput) {
			Notiflix.Confirm.Show('Konfirmasi Input', 'Apakah data yang diinputkan sudah benar ?',
				'Ya', 'Tidak',
				function() {
					let initialForm = $("#insert_rekap_wo_form")[0];
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
			edit_id_rekanan_perusahaan: {
				required: true,
				valueNotEquals: true,
			},
			edit_id_proyek: {
				required: true,
				valueNotEquals: true,
			},
			edit_work_order: {
				required: true
			},
			edit_tanggal: {
				required: true
			},
			edit_nilai_kontrak: {
				required: true
			},
			edit_ppn: {
				required: true
			},
			edit_pph: {
				required: true
			},
			edit_tagihan_faktur: {
				required: true
			},
			edit_rekening_koran: {
				required: true
			}
        },
        messages: {
			edit_id_rekanan_perusahaan: {
				required: "Pilih perusahaan rekanan !",
				valueNotEquals: "Pilih perusahaan rekanan !"
			},
			edit_id_proyek: {
				required: "Pilih nama proyek !",
				valueNotEquals: "Pilih nama proyek !"
			},
			edit_work_order: {
				required: "Masukkan Work Order !",
			},
			edit_tanggal: {
				required: "Masukkan tanggal !",
			},
			edit_nilai_kontrak: {
				required: "Masukkan nilai kontrak !",
			},
			edit_ppn: {
				required: "Masukkan pph !",
			},
			edit_pph: {
				required: "Masukkan ppn !",
			},
			edit_tagihan_faktur: {
				required: "Masukkan tagihan faktur !",
			},
			edit_rekening_koran: {
				required: "Masukkan rekening koran !",
			}
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
                }
			);
        }
    });

    const table = $('#data_rekap_wo_table').DataTable({
        scrollX: true,
        language: {
            search: "Filter"
        },
        responsive: true,
        columns: [{
                title: "No",
                data: "id",
                render: function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            },
            {
                title: "Nama Proyek",
                data: "nama_proyek"
            },
            {
                title: "Tanggal",
                data: "tanggal"
            },
            {
                title: "Work Order",
                data: "workorder"
            },
            {
                title: "Perusahaan",
                data: "nama_perusahaan"
            },
            {
                title: "Pekerjaan",
                data: "nama_proyek"
            },
            {
                title: "Nilai Kontrak",
                data: "nilai_kontrak",
                render: $.fn.dataTable.render.number(',', '.', 0, 'Rp. ')
            },
            {
                title: "PPN 10%",
                data: "ppn",
                render: $.fn.dataTable.render.number(',', '.', 0, 'Rp. ')
            },
            {
                title: "PPH 2%",
                data: "pph",
                render: $.fn.dataTable.render.number(',', '.', 0, 'Rp. ')
            },
            {
                title: "Tagihan Faktur",
                data: "tagihan_faktur",
                render: $.fn.dataTable.render.number(',', '.', 0, 'Rp. ')
            },
            {
                title: "Rekening Koran",
                data: "rekening_koran",
                render: $.fn.dataTable.render.number(',', '.', 0, 'Rp. ')
            },
            {
                title: "Action",
                data: {
                    id_rekap_data_wo: "id_rekap_data_wo"
                },
                render: function(data) {
                    let statusButton =
                        '<button class="btn btn-primary" type="button"  onclick="showModal(' +
                        data.id_rekap_data_wo +
                        ')" ><i class="fa fa-edit"></i></button><button class="btn btn-danger" type="button" data-original-title="Hapus Data WO" title="" onclick="deleteConfirmation(' +
                        data.id_rekap_data_wo + ')"><i class="fa fa-trash-o"></i></button>'
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
        }
	);
}

const getData = () => {
    $.ajax({
        url: 'rekap_wo/getRekapDataWo',
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

            $('#data_rekap_wo_table').dataTable().fnClearTable();
            $('#data_rekap_wo_table').dataTable().fnAddData(response.data);
            return;
        }
    })
};

const insertData = (formData) => {
    $.ajax({
        url: 'rekap_wo/ajaxInsert',
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
        url: 'rekap_wo/ajaxUpdate',
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
        url: 'rekap_wo/ajaxDelete',
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
            $('#edit_id_work_order').val(response.data.workorder);
            $('#edit_tanggal').val(response.data.tanggal);
            $('#edit_nilai_kontrak').val(response.data.nilai_kontrak);
            $('#edit_id_ppn').val(response.data.ppn);
            $('#edit_id_pph').val(response.data.pph);
            $('#edit_id_tagihan_faktur').val(response.data.tagihan_faktur);
            $('#edit_id_rekening_koran').val(response.data.rekening_koran);
            $('#editIDForm').val(response.data.id_rekap_data_wo);
        }
    });
}


const showModal = (id) => {
    $('#editModal').modal('show');
    $.ajax({
        url: 'rekap_wo/getByID',
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
            $('#perusahaan_rekanan_modal').val(response.data.id_perusahaan_rekanan);
            $('#editModalLabel').text('Edit Data WO - ' + response.data.workorder);
            getDataProyekModal(response);
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
                    <h3>Rekap Data WO</h3>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>/ltr/index.html">Home</a></li>
                        <li class="breadcrumb-item">Forms </li>
                        <li class="breadcrumb-item active">Rekap Data WO</li>
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
                        <h5>Form Data WO</h5>
                        <span>Silahkan isi data sesuai dengan form yang telah disediakan.</span>
                    </div>
                    <div class="card-body">
                        <form id="insert_rekap_wo_form">
                            <div class="row">
                                <div class="col-md-4 mb-3">
                                    <label for="insert_id_rekanan_perusahaan">Perusahaan Rekanan</label>
                                    <select class="form-control" name="insert_id_rekanan_perusahaan"
                                        id="perusahaan_rekanan">
                                        <option value=""> - Pilih Salah Satu -</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="insert_id_proyek">Nama Proyek/Pekerjaan</label>
                                    <select class="form-control" name="insert_id_proyek" id="id_proyek">
                                        <option value="">- Pilih Salah Satu -</option>
                                    </select>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="insert_pph">Work Order</label>
                                    <input class="form-control" type="text" id="id_work_order" placeholder="Work Order"
                                        name="insert_work_order" required="Work Order Tidak Boleh Kosong">
                                </div>

                            	<div class="form-group col-md-4 mb-3">
                                	<label class="control-label text-lg-left" for="Tanggal">Tanggal</label>
                                    <input class="datepicker-here form-control" id="tanggal" name="insert_tanggal"
                                        type="text" data-language="en" data-multiple-dates-separator=", "
                                        data-position="bottom left" placeholder="Tanggal" data-original-title=""
                                        title="">
                            	</div>


                                <div class="col-md-4 mb-3">
                                    <label for="insert_nilai_kontrak">Nilai Kontrak</label>
                                    <input class="form-control" type="text" onchange="calculateAmount(this.value)"
                                        placeholder="Nilai Kontrak" id="insert_nilai_kontrak"
                                        name="insert_nilai_kontrak" required="Nilai Kontrak tidak boleh kosong">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="insert_ppn">PPN 10%</label>
                                    <input class="form-control" type="text" id="id_ppn" placeholder="PPN 10%"
                                        name="insert_ppn" required="PPN 10% Tidak Boleh Kosong" readonly>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="insert_pph">PPH 2%</label>
                                    <input class="form-control" type="text" id="id_pph" placeholder="PPH 2%"
                                        name="insert_pph" required="PPH 2% Tidak Boleh Kosong" readonly>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="insert_ppn">Tagihan Faktur</label>
                                    <input class="form-control" type="text" id="id_tagihan_faktur"
                                        placeholder="Tagihan Faktur" name="insert_tagihan_faktur"
                                        required="Tagihan Faktur Tidak Boleh Kosong" readonly>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="insert_pph">Rekening Koran</label>
                                    <input class="form-control" type="text" id="id_rekening_koran"
                                        placeholder="Rekening Koran" name="insert_rekening_koran"
                                        required="Rekening Koran Tidak Boleh Kosong" readonly>
                                </div>
                            </div>

                            <button class="btn btn-primary" id="btn_insert_rekap_wo" type="submit">Simpan</button>
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
                            <table class="table table-border-horizontal" id="data_rekap_wo_table">
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
                <form id="edit_rekap_wo_form">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="edit_id_rekanan_perusahaan">Perusahaan Rekanan</label>
                            <select class="form-control" name="edit_id_rekanan_perusahaan"
                                id="perusahaan_rekanan_modal">
                                <option value=""> - Pilih Salah Satu -</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="edit_id_proyek">Nama Proyek/Pekerjaan</label>
                            <select class="form-control" name="edit_id_proyek" id="id_proyek_modal">
                                <option value="">- Pilih Salah Satu -</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="edit_id_work_order">Work Order</label>
                            <input class="form-control" type="text" id="edit_id_work_order" placeholder="Work Order"
                                name="edit_work_order" required="Work Order Tidak Boleh Kosong">
                        </div>
                    </div>
					<div class="row">
						<div class="form-group col-md-12 mb-3">
							<label for="edit_tanggal">Tanggal</label>
							<input class="datepicker-here form-control" id="edit_tanggal" name="edit_tanggal"
								   type="text" data-language="en" data-multiple-dates-separator=", "
								   data-position="bottom left" placeholder="Tanggal" data-original-title=""
								   title="">
						</div>
					</div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="edit_nilai_kontrak">Nilai Kontrak</label>
                            <input class="form-control" id="edit_nilai_kontrak" type="text" onchange="calculateAmountEdit(this.value)" placeholder="Nilai Kontrak"
                                name="edit_nilai_kontrak" required="Nama Proyek Tidak Boleh Kosong">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="edit_id_ppn">PPN 10%</label>
                            <input class="form-control" type="text" id="edit_id_ppn" placeholder="PPN 10%"
                                name="edit_ppn" required="PPN 10% Tidak Boleh Kosong" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="edit_id_pph">PPH 2%</label>
                            <input class="form-control" type="text" id="edit_id_pph" placeholder="PPH 2%"
                                name="edit_pph" required="PPH 2% Tidak Boleh Kosong" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="edit_id_tagihan_faktur">Tagihan Faktur</label>
                            <input class="form-control" type="text" id="edit_id_tagihan_faktur"
                                placeholder="Tagihan Faktur" name="edit_tagihan_faktur"
                                required="Tagihan Faktur Tidak Boleh Kosong" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="edit_id_rekening_koran">Rekening Koran</label>
                            <input class="form-control" type="text" id="edit_id_rekening_koran"
                                placeholder="Rekening Koran" name="edit_rekening_koran"
                                required="Rekening Koran Tidak Boleh Kosong" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <input class="form-control" type="text" id="editIDForm" name="idRekapWO" hidden>
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <script type="text/javascript">
$(document).ready(function() {
            
</script> -->
