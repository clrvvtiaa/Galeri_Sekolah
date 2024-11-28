

<?php $__env->startSection('title', 'Daftar Profil'); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="mb-4">Daftar Profil</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <a href="<?php echo e(route('profiles.create')); ?>" class="btn btn-primary mb-3">+ Tambah Profil</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($index + 1); ?></td>
                    <td><?php echo e($profile->judul); ?></td>
                    <td><?php echo e($profile->isi); ?></td>
                    <td class="d-flex">
                        <a href="<?php echo e(route('profiles.edit', $profile->id)); ?>" class="btn btn-warning btn-sm me-2 d-flex align-items-center">
                            <i data-feather="edit" class="me-1"></i> Edit
                        </a>

                        <form action="<?php echo e(route('profiles.destroy', $profile->id)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center" onclick="return confirm('Yakin ingin menghapus profil ini?')">
                                <i data-feather="trash-2" class="me-1"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php if($profiles->isEmpty()): ?>
        <p class="text-center">Belum ada profil yang terdaftar.</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ukk_sulistia\resources\views/profiles/index.blade.php ENDPATH**/ ?>