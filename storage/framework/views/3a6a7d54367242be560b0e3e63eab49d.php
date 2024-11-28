

<?php $__env->startSection('title', 'Daftar Agendas'); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="mb-4">Manage Agendas</h1>

    <!-- Alert success -->
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <!-- Button tambah agenda -->
    <a href="<?php echo e(route('agenda.create')); ?>" class="btn btn-primary mb-3">Tambah Agenda</a>

    <!-- Tabel daftar agenda -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Agenda Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $agendas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agenda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><?php echo e($agenda->title); ?></td>
                    <td><?php echo e($agenda->description); ?></td>
                    <td><?php echo e($agenda->agenda_date); ?></td>
                    <td>
                        <!-- Tombol edit -->
                        <a href="<?php echo e(route('agenda.edit', $agenda->id)); ?>" class="btn btn-info btn-sm">Edit</a>

                        <!-- Tombol hapus -->
                        <form action="<?php echo e(route('agenda.destroy', $agenda->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus agenda ini?');">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr>
                    <td colspan="4" class="text-center">Tidak ada agenda</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ukk_sulistia\resources\views/admin/agenda/index.blade.php ENDPATH**/ ?>