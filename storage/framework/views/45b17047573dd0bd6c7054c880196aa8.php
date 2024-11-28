

<?php $__env->startSection('title', 'Tambah Agenda'); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="mb-4">Tambah Agenda</h1>

    <form action="<?php echo e(route('agendas.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="form-group mb-3">
            <label for="title">Judul</label>
            <select class="form-control" name="title" id="title" required>
                <option value="">Pilih Post</option>
                <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($post->title); ?>"><?php echo e($post->title); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" name="description" id="description" rows="3"><?php echo e(old('description')); ?></textarea>
        </div>

        <div class="form-group">
            <label for="agenda_date">Tanggal Agenda</label>
            <input type="date" name="agenda_date" id="agenda_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Agenda</button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ukk_sulistia\resources\views/admin/agendas/create.blade.php ENDPATH**/ ?>