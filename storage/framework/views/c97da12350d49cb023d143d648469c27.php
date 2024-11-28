
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="/galleries/<?php echo e($gallery->id); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <div class="form-group mb-3">
                        <label for="post_id">Judul Post</label>
                        <select name="post_id" class="form-control" id="post_id" required>
                            <option value="">Pilih Post</option>
                            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($post->id); ?>" <?php if($post->id == $gallery->post_id): ?> selected <?php endif; ?>><?php echo e($post->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="position">Posisi</label>
                                <input type="number" name="position" class="form-control" id="position" required value="<?php echo e($gallery->position); ?>">
                                <small>Nilai posisi berupa angka!</small>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="form-group mb-3">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" id="status" required>
                                    <option value="">Pilih Status</option>
                                    <option value="aktif" <?php if($gallery->status == 'aktif'): ?> selected <?php endif; ?>>Aktif</option>
                                    <option value="tidak-aktif" <?php if($gallery->status == 'tidak-aktif'): ?> selected <?php endif; ?>>Tidak Aktif</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary d-block mx-auto">Simpan</button>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ukk_sulistia\resources\views/admin/galleries/edit.blade.php ENDPATH**/ ?>