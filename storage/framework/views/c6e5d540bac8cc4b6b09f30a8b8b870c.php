

<?php $__env->startSection('title', 'Daftar posts'); ?>

<?php $__env->startSection('content'); ?>
<style>
    /* Header tabel dengan gradasi */
    .table thead th {
        background: linear-gradient(45deg, #ff9a9e, #a18cd1); /* Gradasi pink ke biru */
        color: white;
        text-align: center;
        font-weight: bold;
    }

    /* Warna untuk baris tabel */
    .table tbody tr:nth-child(odd) {
        background-color: #f9f9f9; /* Warna abu-abu muda */
    }

    .table tbody tr:nth-child(even) {
        background-color: #ffffff; /* Warna putih */
    }

    /* Hover efek untuk baris tabel */
    .table tbody tr:hover {
        background-color: #ffe4e1; /* Warna merah muda lembut */
    }

    /* Teks pada tabel */
    .table td {
        color: #34495e; /* Warna teks */
        vertical-align: middle; /* Menengah teks secara vertikal */
    }

    /* Tombol aksi */
    .btn {
        transition: all 0.3s ease;
    }

    .btn:hover {
        transform: scale(1.1); /* Efek zoom saat hover */
    }
</style>

    <h1 class="mb-4">Daftar Post</h1>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <a href="<?php echo e(url('/posts/create')); ?>" class="btn btn-primary mb-3">+ Post</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Petugas</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $postItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($index + 1); ?></td>
                    <td><?php echo e($postItem->title); ?></td>
                    <td><?php echo e($postItem->category->title); ?></td>
                    <td><?php echo e($postItem->petugas->name); ?></td>
                    <td>
                        <?php if(Str::lower($postItem->status) == 'publish'): ?>
                            <span class="badge bg-success text-white"><?php echo e(Str::ucfirst($postItem->status)); ?></span>
                        <?php else: ?>
                            <span class="badge bg-warning text-white"><?php echo e(Str::ucfirst($postItem->status)); ?></span>
                        <?php endif; ?>
                    </td>
                    <td class="d-flex">
                        <a href="#" class="btn btn-info btn-sm me-2 d-flex align-items-center justify-content-center" type="button" data-bs-toggle="modal" data-bs-target="#postDetail<?php echo e($postItem->id); ?>" style="width: 40px; height: 40px;">
                            <i data-feather="info"></i>
                        </a>
                        <a href="<?php echo e(url('/posts/' . $postItem->id . '/edit')); ?>" class="btn btn-warning btn-sm me-2 d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                            <i data-feather="edit"></i>
                        </a>
                        <form action="<?php echo e(url('/posts/' . $postItem->id)); ?>" method="POST" style="display: inline;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('delete'); ?>
                            <button type="submit" class="btn btn-danger btn-sm d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;" onclick="return confirm('Yakin ingin menghapus post ini?')">
                                <i data-feather="trash-2"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>

    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- Modal Post -->
    <div class="modal fade" id="postDetail<?php echo e($post->id); ?>" tabindex="-1" aria-labelledby="postDetail<?php echo e($post->id); ?>Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="postDetail<?php echo e($post->id); ?>Label"><i data-feather="info"></i> Detail Post</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <td>Judul</td>
                            <td>:</td>
                            <td><?php echo e($post->title); ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Dibuat</td>
                            <td>:</td>
                            <td><?php echo e(\Carbon\Carbon::parse($post->created_at)->format('d M Y')); ?></td>
                        </tr>
                        <tr>
                            <td>Dibuat Oleh</td>
                            <td>:</td>
                            <td><?php echo e($post->petugas->name); ?></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td><?php echo e(Str::ucfirst($post->status)); ?></td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>:</td>
                            <td><?php echo e($post->category->title); ?></td>
                        </tr>
                        <tr>
                            <td>Isi</td>
                            <td>:</td>
                            <td><?php echo e($post->content); ?></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> 
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php if($posts->isEmpty()): ?>
        <p class="text-center">Belum ada posts yang terdaftar.</p>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ukk_sulistia\resources\views/admin/posts/index.blade.php ENDPATH**/ ?>