<?php echo view('_partials/header'); ?>
<?php echo view('_partials/sidebar'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Menu Baru</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Menu</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('product/store'); ?>" method="post">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $inputs = session()->getFlashdata('inputs') ?? [];
                                $errors = session()->getFlashdata('errors');
                                if (!empty($errors)) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        Whoops! Ada kesalahan saat input data, yaitu:
                                        <ul>
                                            <?php foreach ($errors as $error) : ?>
                                                <li><?= esc($error) ?></li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                <?php } ?>

                                <div class="form-group">
                                    <label for="">Nama Menu</label>
                                    <input type="text" class="form-control" name="nama_menu" placeholder="Enter product name" value="<?= esc($inputs['nama_menu'] ?? '') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Menu</label>
                                    <select name="jenis_menu" id="" class="form-control">
                                        <option value="">Pilih Kategori</option>
                                        <option <?= ($inputs['jenis_menu'] ?? '') == "makanan" ? "selected" : "" ?> value="makanan">Makanan</option>
                                        <option <?= ($inputs['jenis_menu'] ?? '') == "minuman" ? "selected" : "" ?> value="minuman">Minuman</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <input type="number" class="form-control" name="harga" placeholder="Input Harga" value="<?= esc($inputs['harga'] ?? '') ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Status Menu</label>
                                    <select name="status_menu" id="" class="form-control">
                                        <option value="">Pilih Kategori</option>
                                        <option <?= ($inputs['status_menu'] ?? '') == "Ada" ? "selected" : "" ?> value="Ada">Ada</option>
                                        <option <?= ($inputs['status_menu'] ?? '') == "Tidak Ada" ? "selected" : "" ?> value="Tidak Ada">Tidak Ada</option>
                                    </select>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('product'); ?>" class="btn btn-outline-info">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo view('_partials/footer'); ?>