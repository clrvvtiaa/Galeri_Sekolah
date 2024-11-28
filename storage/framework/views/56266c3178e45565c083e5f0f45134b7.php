

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Kelola Slideshow</h3>
                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#addSlideshow">
                        <i class="fas fa-plus"></i> Tambah Foto
                    </button>
                </div>
                <div class="card-body">
                    <?php if(session('success')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="10%">No</th>
                                <th width="30%">Gambar</th>
                                <th>Judul</th>
                                <th>Alt Text</th>
                                <th width="15%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $slideshows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($index + 1); ?></td>
                                <td>
                                    <img src="<?php echo e(asset('storage/' . $slide->image)); ?>" 
                                         alt="<?php echo e($slide->alt_text); ?>" 
                                         class="img-thumbnail" 
                                         style="max-height: 100px">
                                </td>
                                <td><?php echo e($slide->title); ?></td>
                                <td><?php echo e($slide->alt_text); ?></td>
                                <td>
                                    <form action="<?php echo e(route('admin.slideshow.destroy', $slide->id)); ?>" 
                                          method="POST" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Foto -->
<div class="modal fade" id="addSlideshow" tabindex="-1" role="dialog" aria-labelledby="addSlideshowLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="<?php echo e(route('admin.slideshow.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="addSlideshowLabel">Tambah Foto Slideshow</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Judul (opsional)</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alt Text (opsional)</label>
                        <input type="text" name="alt_text" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ukk_sulistia\resources\views/admin/slideshow/index.blade.php ENDPATH**/ ?>