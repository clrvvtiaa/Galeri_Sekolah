
<?php $__env->startSection('content'); ?>

    <div class="card">
        <div class="card-body">
            <form action="/posts/<?php echo e($post->id); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('put'); ?>
                <div class="form-group mb-3">
                    <label for="title">Judul</label>
                    <input type="text" name="title" class="form-control" id="title" required value="<?php echo e($post->title); ?>">
                </div>
                <div class="row">
                    <div class="col">
                    <div class="form-group mb-3">
                    <label for="category_id">Kategori</label>
                    <select name="category_id" id="category_id" class="form-control" required >
                        <option value="">Pilih Kategori</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($category->id); ?>" <?php if($category->id == $post->id): ?> selected <?php endif; ?>><?php echo e($category->title); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                </div>
                    </div>
                    
                    <div class="col">
                    <div class="form-group mb-3">
                    <label for="status">Status</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="">Pilih Status</option>
                        <option value="publish" <?php if($post->status == 'publish'): ?> selected <?php endif; ?>>Publish</option>
                        <option value="draft" <?php if($post->status == 'draft'): ?> selected <?php endif; ?>>Draft</option>
                    </select>
                </div>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label for="content">Isi</label>
                    <textarea name="content" id="content" class="form-control" required> <?php echo e($post->content); ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary d-block mx-auto">Simpan</button>
            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ukk_sulistia\resources\views/admin/posts/edit.blade.php ENDPATH**/ ?>