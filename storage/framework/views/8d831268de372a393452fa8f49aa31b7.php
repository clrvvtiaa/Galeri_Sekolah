

<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Tambah Informasi</h1>
    <form action="<?php echo e(route('informasi.store')); ?>" method="POST" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" class="form-control" name="judul" id="judul" required>
        </div>
        <div class="mb-3">
            <label for="konten" class="form-label">Konten (Foto)</label>
            <input type="file" class="form-control" name="konten" id="konten" required>
        </div>
        <div class="mb-3">
            <label for="action" class="form-label">Status</label>
            <select class="form-control" name="action" id="action">
                <option value="aktif">Aktif</option>
                <option value="nonaktif">Nonaktif</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ukk_sulistia\resources\views/admin/informasi/create.blade.php ENDPATH**/ ?>