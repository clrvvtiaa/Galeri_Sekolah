

<?php $__env->startSection('title', 'Daftar Informasi'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="my-4">Daftar Informasi</h1>
    <a href="<?php echo e(route('informasis.create')); ?>" class="btn btn-primary mb-3">Tambah Informasi</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th>
                <th>Judul</th>
                <th>Konten</th> <!-- Tambahkan kolom untuk Konten -->
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $informasis; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $informasi): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($loop->iteration); ?></td>
                    <td><?php echo e($informasi->judul); ?></td>
                    <td><?php echo e(\Str::limit($informasi->konten, 50)); ?> <!-- Menampilkan 50 karakter pertama dari konten -->
                    </td>
                    <td><?php echo e(ucfirst($informasi->action)); ?></td>
                    <td>
                        <a href="<?php echo e(route('informasis.edit', $informasi->id)); ?>" class="btn btn-warning btn-sm">Edit</a>
                        <form action="<?php echo e(route('informasis.destroy', $informasi->id)); ?>" method="POST" class="d-inline">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus informasi ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ukk_sulistia\resources\views/admin/informasis/index.blade.php ENDPATH**/ ?>