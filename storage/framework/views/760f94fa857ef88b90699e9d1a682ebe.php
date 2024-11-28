

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Edit Jurusan</h1>
    <form action="<?php echo e(route('jurusan.update', $jurusan->id)); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" name="judul" value="<?php echo e($jurusan->judul); ?>" required>
        </div>
        <div class="form-group">
            <label for="gambar">Gambar</label>
            <input type="file" class="form-control" name="gambar">
            <img src="<?php echo e(asset('storage/' . $jurusan->gambar)); ?>" width="100" alt="Gambar Jurusan">
        </div>
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" required><?php echo e($jurusan->deskripsi); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ukk_sulistia\resources\views/admin/jurusan/edit.blade.php ENDPATH**/ ?>