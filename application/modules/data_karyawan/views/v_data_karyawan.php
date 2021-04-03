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
                    <form class="needs-validation" method="post" action="<?php echo base_url('simpan_material');?>">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Nama Karyawan</label>
                                <input class="form-control" type="text" placeholder="Nama Karyawan" name="nama_karyawan" required="Nama Karyawan Tidak Boleh Kosong">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">No Hp Karyawan</label>
                                <input class="form-control" type="text" placeholder="No Hp Karyawan" name="no_hp_karyawan" required="No Hp Karyawan Tidak Boleh Kosong">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Alamat Karyawan</label>
                                <textarea class="form-control" name="alamat_karyawan" rows="3" placeholder="Alamat Karyawan"></textarea>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit">Simpan</button>
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
                <table class="stripe" id="example-style-8">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Karyawan</th>
                                <th scope="col">No Hp Karyawan</th>
                                <th scope="col">Alamat Karyawan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php $a=1;
                        foreach ($dataKaryawan as $key) {
                            ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $a;?></th>
                                    <td><?php echo $key['nama_karyawan'];?></td>
                                    <td><?php echo $key['no_hp_karyawan'];?></td>
                                    <td><?php echo $key['alamat_karyawan'];?></td>
                                    <td><button class="btn btn-primary" type="button" data-original-title="Edit Data Admin" title=""data-toggle="modal" data-target="#editModal" onclick=""><i class="fa fa-edit"></i></button>
                                        <button class="btn btn-danger" type="button" data-original-title="Hapus Data Admin" title="" onclick="hapus(<?php echo $key['id_user'];?>)"><i class="fa fa-trash-o"></i></button>
                                    </td>
                                </tr>
                                <?php $a++; } ?>
                            </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- endpagebody -->
</div>
