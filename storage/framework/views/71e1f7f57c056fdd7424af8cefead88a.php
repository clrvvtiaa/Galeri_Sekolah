
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <form action="/galleries" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-3">
                        <label for="post_id">Judul Post</label>
                        <select name="post_id" class="form-control" id="post_id" required>
                        <option value="">Pilih Post</option>
                        <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($post->id); ?>"><?php echo e($post->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-12 col-md-6">
                        <div class="form-group mb-3">
                        <label for="position">Posisi</label>
                        <input type="number" name="position" class="form-control" id="position" required>
                        <small>Nilai posisi berupa angka !</small>
                    </div>
                        </div>

                        <div class="col-12 col-md-6">
                        <div class="form-group mb-3">
                        <label for="status">Status</label>
                        <select name="status" class="form-control" id="status" required>
                            <option value="">Pilih Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="tidak-aktif">Tidak Aktif</option>
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
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ukk_sulistia\resources\views/admin/galleries/create.blade.php ENDPATH**/ ?>