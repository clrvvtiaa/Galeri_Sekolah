

<?php $__env->startSection('title', 'Daftar galleries'); ?>

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

    <h1 class="mb-4">Daftar galleries</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <a href="<?php echo e(url('/galleries/create')); ?>" class="btn btn-primary mb-3">+ Gallery</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Post</th>
                <th>Posisi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $galleryItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($index + 1); ?></td>
                    <td><?php echo e($galleryItem->post->title); ?></td>
                    <td><?php echo e($galleryItem->position); ?></td>
                    <td>
                    <?php if($galleryItem->status == 'aktif'): ?>
                                <span class="badge bg-success"><?php echo e(Str::ucfirst($galleryItem->status)); ?></span>
                                <?php else: ?>
                                <span class="badge bg-warning"><?php echo e(Str::ucfirst($galleryItem->status)); ?></span>
                                <?php endif; ?>
                    </td>
                    <td class="d-flex">
                        <a href="/galleries/<?php echo e($galleryItem->id); ?>" class="btn btn-success btn-sm me-2 d-flex align-items-center">
                            <i data-feather="info" class="me-1"></i> Detail
                        </a>

                        <a href="<?php echo e(url('/galleries/' . $galleryItem->id . '/edit')); ?>" class="btn btn-warning btn-sm me-2 d-flex align-items-center">
                            <i data-feather="edit" class="me-1"></i> Edit
                        </a>

                        <form action="<?php echo e(url('/galleries/' . $galleryItem->id)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center" onclick="return confirm('Yakin ingin menghapus galleries ini?')">
                                <i data-feather="trash-2" class="me-1"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php if($galleries->isEmpty()): ?>
        <p class="text-center">Belum ada galleries yang terdaftar.</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ukk_sulistia\resources\views/admin/galleries/index.blade.php ENDPATH**/ ?>