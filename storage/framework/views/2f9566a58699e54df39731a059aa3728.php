

<?php $__env->startSection('content'); ?>
<!-- Bagian Galeri -->
<section class="gallery-section">
    <div class="container">
        <div class="row g-4">
            <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4 col-md-6">
                <div class="gallery-card">
                    <div class="gallery-img-wrapper">
                        <img src="<?php echo e(asset('images/' . $gallery->file)); ?>" alt="<?php echo e($gallery->title); ?>">
                        <div class="overlay">
                            <div class="overlay-content">
                                <h4><?php echo e($gallery->title); ?></h4>
                                <a href="<?php echo e(asset('images/' . $gallery->file)); ?>" class="btn btn-light btn-sm mt-2" target="_blank">
                                    <i class="fas fa-expand-alt"></i> Lihat Detail
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="gallery-info">
                        <h5><?php echo e($gallery->title); ?></h5>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>

        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center">
                <?php echo e($galleries->links()); ?>

            </div>
        </div>
    </div>
</section>

<style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f8f9fa;
    }

    /* Kartu Galeri */
    .gallery-section {
        padding: 50px 0;
    }

    .gallery-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        transition: transform 0.3s ease;
    }

    .gallery-card:hover {
        transform: translateY(-10px);
    }

    .gallery-img-wrapper {
        position: relative;
        height: 250px;
        overflow: hidden;
    }

    .gallery-img-wrapper img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .gallery-card:hover .gallery-img-wrapper img {
        transform: scale(1.1);
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0,0,0,0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: 0.3s ease;
    }

    .gallery-card:hover .overlay {
        opacity: 1;
    }

    .overlay-content {
        color: white;
        text-align: center;
        padding: 20px;
        transform: translateY(20px);
        transition: 0.3s ease;
    }

    .gallery-card:hover .overlay-content {
        transform: translateY(0);
    }

    .gallery-info {
        padding: 20px;
    }

    .gallery-info h5 {
        margin: 0;
        font-weight: 600;
        color: #2c3e50;
    }

    .gallery-info p {
        margin: 10px 0 0;
        font-size: 0.9rem;
    }

    .gallery-info i {
        margin-right: 5px;
        color: #007bff;
    }

    /* Pagination */
    .pagination {
        margin: 0;
    }

    .page-link {
        border-radius: 50%;
        margin: 0 5px;
        border: none;
        width: 40px;
        height: 40px;
        line-height: 40px;
        text-align: center;
        padding: 0;
        color: #007bff;
        background: white;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .page-item.active .page-link {
        background: #007bff;
        color: white;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ukk_sulistia\resources\views/galeri.blade.php ENDPATH**/ ?>