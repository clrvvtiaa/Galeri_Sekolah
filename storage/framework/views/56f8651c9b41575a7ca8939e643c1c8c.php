
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12 col-md-4">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Judul Post</td>
                            <td>:</td>
                            <td><?php echo e($gallery->post->title); ?></td>
                        </tr>

                        <tr>
                            <td>Judul Post</td>
                            <td>:</td>
                            <td><?php echo e($gallery->position ?? '-'); ?></td>
                        </tr>

                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td>
                                <?php if($gallery->status == 'aktif'): ?>
                                <span class="badge bg-success"><?php echo e(Str::ucfirst($gallery->status)); ?></span>
                                <?php else: ?>
                                <span class="badge bg-warning"><?php echo e(Str::ucfirst($gallery->status)); ?></span>
                                <?php endif; ?>
                            </td>
                        </tr>

                        <tr>
                            <td>Dibuat Pada</td>
                            <td>:</td>
                            <td><?php echo e(\Carbon\Carbon::parse($gallery->created_at)->format('d M Y')); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-12 col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="m-0 p-0"><i data-feather="image"></i> Foto</h4>

                <!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addImageModal">
  + Foto
</button>

<!-- Modal -->
<div class="modal fade" id="addImageModal" tabindex="-1" aria-labelledby="addImageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form action="/images/store" method="POST" enctype="multipart/form-data" class="modal-content">
      <?php echo csrf_field(); ?>
      <!-- Modal Header -->
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-secondary" id="addImageModalLabel">Tambah Foto</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      
      <!-- Modal Body -->
      <div class="modal-body">
        <!-- Add your modal content here -->
        <input type="hidden" name="gallery_id" value="<?php echo e($gallery->id); ?>">
        <div class="mb-3">
            <label for="file">Foto</label>
            <input type="file" name="file" id="file" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="title">Judul</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
      </div>
      
      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      
</form>
  </div>
</div>        
            </div>
            <div class="card-body bg-light">
            <!-- tampilkan error validasi jika ada-->
             <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                   <ul class="m-0 p-0">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   </ul>
                </div>
             <?php endif; ?>

                <div class="row">
                    <?php $__empty_1 = true; $__currentLoopData = $gallery->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="col-12 col-md-4">
                        <div class="card">
                                <img src="<?php echo e(asset('images/' . $image->file)); ?>" alt="<?php echo e($image->title); ?>" class="img-fluid">
                                <div class="p-2">
                                    <h5><?php echo e($image->title); ?></h5>

                                    <form action="/images/<?php echo e($image->id); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('delete'); ?>
                                        <button type="submit" class="btn btn-link btn-sm d-block ms-auto" onclick="return confirm('Apakah Anda Yakin?')">
                                            <i data-feather="trash-2" class="text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div class="col-12">
                        <div class="alert alert-warning">Foto tidak di temukan.</div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ukk_sulistia\resources\views/admin/galleries/show.blade.php ENDPATH**/ ?>