

<?php $__env->startSection('content'); ?>
<div class="container my-5">
    <style>
        /* Styling untuk header */
h2.mb-4 {
    font-size: 2.4rem;
    font-weight: bold;
    text-align: center;
    color: #34495e;
    position: relative;
    margin-bottom: 2rem;
}

h2.mb-4::after {
    content: "";
    display: block;
    width: 60px;
    height: 4px;
    background: linear-gradient(45deg, #ff9a9e, #a18cd1); /* Gradasi pink ke biru */
    margin: 10px auto 0;
    border-radius: 2px;
}

/* Styling untuk card menjadi kotak persegi */
.card {
    border: none;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 0; /* Ubah border-radius menjadi 0 untuk membuatnya kotak */
    overflow: hidden;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    background: white;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.15);
}

/* Card Body */
.card-body {
    padding: 1.5rem;
    background: #f9f9f9;
}

/* Card Title */
.card-title {
    font-size: 1.6rem;
    font-weight: bold;
    color: #2c3e50;
    margin-bottom: 0.5rem;
}

/* Card Text */
.card-text {
    color: #7f8c8d;
    line-height: 1.6;
    font-size: 1rem;
}

/* Styling untuk teks muted */
.text-muted {
    font-size: 0.85rem;
    color: #95a5a6;
    font-style: italic;
    margin-top: 1rem;
    display: flex;
    align-items: center;
}

/* Ikon untuk teks muted */
.text-muted i {
    margin-right: 8px;
}

/* Tambahan: Styling untuk border card header dengan gradasi */
.card-header-modern {
    background: linear-gradient(45deg, #ff9a9e, #a18cd1); /* Gradasi pink ke biru */
    color: white;
    padding: 1.5rem 2rem;
    position: relative;
    border-radius: 20px 20px 0 0; /* Membuat sudut atas melengkung */
    text-align: center; /* Memusatkan teks */
}


    </style>

    <h2 class="mb-4">Informasi</h2>

    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title"><?php echo e($post->title); ?></h5>
                <p class="card-text"><?php echo $post->content; ?></p>
                <p class="text-muted">
                </p>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ukk_sulistia\resources\views/informasi.blade.php ENDPATH**/ ?>