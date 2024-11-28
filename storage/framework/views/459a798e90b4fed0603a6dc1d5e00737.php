

<?php $__env->startSection('content'); ?>
<div class="container mt-5">
    <div class="card bg-primary text-light shadow-lg">
        <div class="card-body text-center">
            <h1 class="display-4 welcome-title">Selamat Datang di Halaman Dashboard Admin</h1>
            <p class="lead welcome-message">Kami senang Anda di sini!</p>
            <hr class="my-4 bg-light">
            <p class="mb-0">Jelajahi fitur fitur yang tersedia untuk Anda.</p>
        </div>
    </div>
</div>

<style>
    .welcome-title {
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .welcome-message {
        font-style: italic;
        margin-bottom: 20px;
    }

    .card {
        border-radius: 15px;
        overflow: hidden;
    }

    .card-body {
        padding: 40px;
    }

    hr {
        height: 2px;
        border: none;
        background-color: #ffffff;
    }

    @media (max-width: 768px) {
        .card-body {
            padding: 20px;
        }

        .welcome-title {
            font-size: 2rem;
        }
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ukk_sulistia\resources\views/admin/dashboard/index.blade.php ENDPATH**/ ?>