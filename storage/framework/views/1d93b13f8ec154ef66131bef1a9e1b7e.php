

<?php $__env->startSection('title', 'Daftar Petugas'); ?>

<?php $__env->startSection('content'); ?>
<style>
    /* Header tabel dengan gradasi */
    .table thead th {
        background: linear-gradient(45deg, #ff9a9e, #a18cd1); /* Gradasi pink ke biru */
        color: white;
        text-align: center;
        font-weight: bold;
    }

    /* Warna untuk baris tabel */
    .table tbody tr:nth-child(odd) {
        background-color: #f9f9f9; /* Warna abu-abu muda */
    }

    .table tbody tr:nth-child(even) {
        background-color: #ffffff; /* Warna putih */
    }

    /* Hover efek untuk baris tabel */
    .table tbody tr:hover {
        background-color: #ffe4e1; /* Warna merah muda lembut */
    }

    /* Teks pada tabel */
    .table td {
        color: #34495e; /* Warna teks */
        vertical-align: middle; /* Menengah teks secara vertikal */
    }

    /* Tombol aksi */
    .btn {
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: scale(1.1); /* Efek zoom saat hover */
    }
</style>

    <h1 class="mb-4">Daftar Petugas</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <a href="<?php echo e(url('/petugas/create')); ?>" class="btn btn-primary mb-3">Tambah Petugas</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $petugas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $petugasItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <!-- Ubah dari $users ke $petugas -->
                <tr>
                    <td><?php echo e($index + 1); ?></td>
                    <td><?php echo e($petugasItem->name); ?></td>
                    <td><?php echo e($petugasItem->email); ?></td>
                    <td>
                        <a href="<?php echo e(url('/petugas/' . $petugasItem->id . '/edit')); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form action="<?php echo e(url('/petugas/' . $petugasItem->id)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus petugas ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php if($petugas->isEmpty()): ?>
        <p class="text-center">Belum ada petugas yang terdaftar.</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ukk_sulistia\resources\views/admin/petugas/index.blade.php ENDPATH**/ ?>