

<?php $__env->startSection('title', 'Edit Agenda'); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="mb-4">Edit Agenda</h1>

    <!-- Alert validasi -->
    <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <!-- Form edit agenda -->
    <form action="<?php echo e(route('agenda.update', $agenda->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="<?php echo e(old('title', $agenda->title)); ?>" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea id="description" name="description" class="form-control" rows="4"><?php echo e(old('description', $agenda->description)); ?></textarea>
        </div>

        <div class="mb-3">
            <label for="agenda_date" class="form-label">Agenda Date</label>
            <input type="date" id="agenda_date" name="agenda_date" class="form-control" value="<?php echo e(old('agenda_date', $agenda->agenda_date)); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="<?php echo e(route('agenda.index')); ?>" class="btn btn-secondary">Kembali</a>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ukk_sulistia\resources\views/admin/agenda/edit.blade.php ENDPATH**/ ?>