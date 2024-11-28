<!-- resources/views/profiles/create.blade.php -->
 <!-- Menggunakan layout utama aplikasi -->

<?php $__env->startSection('title', 'Tambah Profil'); ?> <!-- Menetapkan title halaman -->

<?php $__env->startSection('content'); ?>
<div class="mb-4 text-center">
    <h1 class="display-4">Tambah Profil</h1> <!-- Teks di luar card dengan ukuran besar -->
</div>

<div class="card mb-4">
    <div class="card-body">
        <form action="<?php echo e(route('profiles.store')); ?>" method="POST" class="needs-validation" novalidate>
            <?php echo csrf_field(); ?>
            <div class="form-group row">
                <label for="judul" class="col-md-3 col-form-label">Judul</label>
                <div class="col-md-9">
                    <input type="text" name="judul" id="judul" class="form-control" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="isi" class="col-md-3 col-form-label">Isi</label>
                <div class="col-md-9">
                    <textarea name="isi" id="isi" class="form-control" rows="5" required></textarea>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-9 offset-md-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo e(route('profiles.index')); ?>" class="btn btn-secondary">Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="text-center">
    <h2 class="mt-4">Informasi Tambahan</h2>
    <p class="lead">Silakan isi form di atas untuk menambahkan profil baru.</p>
</div>

<style>
    .card {
        border: 1px solid #007bff;
        border-radius: 0.25rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Tambahkan bayangan untuk kedalaman */
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s ease; /* Animasi transisi */
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .display-4 {
        margin-bottom: 20px;
        font-weight: 700; /* Berat font lebih tebal */
    }

    .lead {
        font-size: 1.25rem; /* Ukuran font yang lebih besar untuk teks penjelasan */
        margin-bottom: 20px; /* Jarak bawah */
    }

    .form-control {
        border-radius: 0.25rem; /* Radius sudut */
        transition: border-color 0.3s; /* Animasi transisi */
    }

    .form-control:focus {
        border-color: #007bff; /* Warna border saat fokus */
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25); /* Bayangan saat fokus */
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ukk_sulistia\resources\views/admin/profiles/create.blade.php ENDPATH**/ ?>