

<?php $__env->startSection('title', 'Tambah Informasi'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1 class="my-4">Tambah Informasi</h1>

    <form action="<?php echo e(route('informasis.store')); ?>" method="POST" enctype="multipart/form-data">
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
        <div class="mb-3">
            <label for="konten" class="form-label">Foto Konten</label>
            <input type="file" name="konten" id="konten" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="action" class="form-label">Status</label>
            <select name="action" id="action" class="form-control">
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="<?php echo e(route('informasis.index')); ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ukk_sulistia\resources\views/admin/informasis/create.blade.php ENDPATH**/ ?>