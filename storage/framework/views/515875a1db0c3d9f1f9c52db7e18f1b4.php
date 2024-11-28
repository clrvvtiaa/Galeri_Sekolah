

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <!-- basic table -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Detail Jurusan</h4>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Judul:</label>
                                <p class="form-control-static"><?php echo e($jurusan->judul); ?></p>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Deskripsi:</label>
                                <p class="form-control-static"><?php echo e($jurusan->deskripsi); ?></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label">Gambar:</label>
                                <div class="mt-2">
                                    <?php if($jurusan->gambar): ?>
                                        <img src="<?php echo e(asset('storage/' . $jurusan->gambar)); ?>" 
                                             alt="Gambar <?php echo e($jurusan->judul); ?>" 
                                             class="img-fluid rounded" 
                                             style="max-height: 300px">
                                    <?php else: ?>
                                        <p class="text-muted">Tidak ada gambar</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="text-right">
                            <a href="<?php echo e(route('jurusan.edit', $jurusan->id)); ?>" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <a href="<?php echo e(route('jurusan.index')); ?>" class="btn btn-dark">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control-static {
        padding-top: 7px;
        margin-bottom: 15px;
        border-bottom: 1px solid #eee;
        min-height: 36px;
    }
    
    .form-label {
        font-weight: bold;
        color: #333;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ukk_sulistia\resources\views/admin/jurusan/show.blade.php ENDPATH**/ ?>