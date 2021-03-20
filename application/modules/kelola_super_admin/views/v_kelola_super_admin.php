<div class="page-body">
    <div class="container-fluid">
       <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <h3>Manajemen Admin</h3>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url();?>/ltr/index.html">Home</a></li>
                    <li class="breadcrumb-item">Forms  </li>
                    <li class="breadcrumb-item active">Kelola Admin</li>
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
                    <h5>Form Kelola Super Admin</h5>
                    <span>Silahkan isi data sesuai dengan form yang telah disediakan.</span>
                </div>
                <div class="card-body">
                    <form class="needs-validation" method="post" action="<?php echo base_url('kelola_super_admin/insertSuperAdmin');?>">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Nama</label>
                                <input class="form-control" type="text" placeholder="Nama Admin" name="nama" required="Nama Super Admin Tidak Boleh Kosong">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Email</label>
                                <input class="form-control" type="email" placeholder="Email Admin" name="email" required="Email Super Admin Tidak Boleh Kosong">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">No Handphone</label>
                                <input class="form-control" type="text" placeholder="Nomor HP Admin" name="no_hp" required="Nomor HP Super Admin Tidak Boleh Kosong">
                            </div>
                        </div>
                         <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Password</label>
                                <input class="form-control" type="text" placeholder="Password Admin" name="password" required="Password Super Admin Tidak Boleh Kosong">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="validationCustom01">Alamat</label>
                                <input class="form-control" type="text" placeholder="alamat Admin" name="alamat" required="Alamat Super Admin Tidak Boleh Kosong">
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
                    <h5>Data Admin</h5>
                    Dibawah ini adalah data super admin untuk CV. Anugrah Agung Teknik.
                </div>
                <div class="table-responsive">
                    <table class="table table-border-horizontal">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Super Admin</th>
                                <th scope="col">Email Super Admin</th>
                                <th scope="col">No HP Super Admin</th>
                                <th scope="col">Password</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Role</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <?php $a=1;
                        foreach ($dataSuperAdmin as $key) {
                            ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?php echo $a;?></th>
                                    <td><?php echo $key['nama'];?></td>
                                    <td><?php echo $key['email'];?></td>
                                    <td><?php echo $key['no_hp'];?></td>
                                    <td><?php echo md5($key['password']);?></td>
                                    <td><?php echo $key['alamat'];?></td>
                                    <?php if ($key['role'] === '1') { ?>
                                        <td>Super Admin</td>
                                    <?php } ?>  
                                    <td><button class="btn btn-primary" type="button" data-original-title="Edit Data Admin" title=""data-toggle="modal" data-target="#editModal" onclick="">Edit</button>
                                        <button class="btn btn-danger" type="button" data-original-title="Hapus Data Admin" title="" onclick="hapus(<?php echo $key['id_user'];?>)">Hapus</button>
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

<!-- endpagebody -->
</div>
