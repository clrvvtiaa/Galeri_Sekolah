

<?php $__env->startSection('content'); ?>
<div class="profile-wrapper">
    <!-- Hero Section -->
    <div class="profile-hero">
        <div class="hero-bg"></div>
        <div class="hero-content">
            <h1 class="hero-title">Profil Sekolah</h1>
            <p class="hero-subtitle">SMKN 4 BOGOR</p>
            <div class="hero-decoration">
                <span></span>
                <i class="fas fa-school"></i>
                <span></span>
            </div>
        </div>
    </div>

    <div class="container profile-container">
        <!-- Profile Cards -->
        <?php $__currentLoopData = $profiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profile): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="glass-card" data-aos="fade-up" data-aos-delay="100">
            <div class="card-blur"></div>
            <div class="card-content">
                <div class="card-header">
                    <div class="header-icon">
                        <?php if(strtolower($profile->judul) == 'kepala sekolah'): ?>
                            <i class="fas fa-user-tie"></i>
                        <?php elseif(strtolower(trim($profile->judul)) == 'smkn 4 bogor'): ?>
                            <i class="fas fa-landmark"></i>
                        <?php else: ?>
                            <i class="fas fa-info-circle"></i>
                        <?php endif; ?>
                    </div>
                    <h2><?php echo e($profile->judul); ?></h2>
                </div>

                <div class="card-body">
                    <?php if(strtolower($profile->judul) == 'kepala sekolah'): ?>
                        <div class="kepsek-profile">
                            <div class="kepsek-image-container">
                                <div class="image-frame">
                                    <img src="<?php echo e(asset('assets/images/kepsek.jpg')); ?>" alt="Kepala Sekolah">
                                </div>
                                <div class="kepsek-details">
                                    <h3>Drs. Mulya Murprihartono</h3>
                                    <span>Kepala SMKN 4 Bogor</span>
                                </div>
                            </div>
                            <div class="kepsek-description">
                                <?php echo $profile->isi; ?>

                            </div>
                        </div>
                    <?php elseif(strtolower(trim($profile->judul)) == 'smkn 4 bogor'): ?>
                        <div class="school-profile">
                            <div class="school-logo">
                                <img src="<?php echo e(asset('assets/images/logo smk.png')); ?>" alt="SMKN 4 Bogor">
                            </div>
                            <div class="school-description">
                                <?php echo $profile->isi; ?>

                            </div>
                        </div>
                    <?php else: ?>
                        <div class="regular-content">
                            <?php echo $profile->isi; ?>

                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<style>
.profile-wrapper {
    background: linear-gradient(135deg, #f6f9fc, #edf1f7);
    min-height: 100vh;
    padding: 2rem 0;
}

.profile-hero {
    position: relative;
    height: 400px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 4rem;
    overflow: hidden;
}

.hero-bg {
    position: absolute;
    inset: 0;
    background: linear-gradient(45deg, #FF69B4, #4169E1);
    opacity: 0.9;
}

.hero-content {
    position: relative;
    text-align: center;
    color: white;
}

.hero-title {
    font-size: 4rem;
    font-weight: 800;
    margin-bottom: 0.5rem;
    text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
}

.hero-subtitle {
    font-size: 1.5rem;
    opacity: 0.9;
    margin-bottom: 1.5rem;
}

.hero-decoration {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 1rem;
}

.hero-decoration span {
    width: 50px;
    height: 2px;
    background: rgba(255,255,255,0.7);
}

.hero-decoration i {
    font-size: 1.5rem;
}

.profile-container {
    max-width: 1200px;
    margin: 0 auto;
}

.glass-card {
    position: relative;
    background: rgba(255, 255, 255, 0.7);
    backdrop-filter: blur(10px);
    border-radius: 24px;
    margin-bottom: 2rem;
    overflow: hidden;
    transition: all 0.3s ease;
}

.glass-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

.card-blur {
    position: absolute;
    inset: 0;
    background: linear-gradient(135deg, rgba(255,255,255,0.4), rgba(255,255,255,0.2));
    backdrop-filter: blur(10px);
}

.card-content {
    position: relative;
    padding: 2rem;
}

.card-header {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 2rem;
}

.header-icon {
    width: 50px;
    height: 50px;
    background: linear-gradient(135deg, #FF69B4, #4169E1);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
}

.kepsek-profile {
    display: grid;
    grid-template-columns: 300px 1fr;
    gap: 2rem;
}

.kepsek-image-container {
    text-align: center;
}

.image-frame {
    border-radius: 20px;
    overflow: hidden;
    margin-bottom: 1rem;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}

.image-frame img {
    width: 100%;
    height: auto;
    transition: transform 0.5s ease;
}

.image-frame:hover img {
    transform: scale(1.05);
}

.kepsek-details {
    background: rgba(255,255,255,0.5);
    padding: 1rem;
    border-radius: 12px;
}

.school-profile {
    display: grid;
    grid-template-columns: 200px 1fr;
    gap: 2rem;
    align-items: center;
}

.school-logo img {
    max-width: 100%;
    height: auto;
    transition: transform 0.3s ease;
}

.school-logo:hover img {
    transform: scale(1.1);
}

@media (max-width: 992px) {
    .kepsek-profile,
    .school-profile {
        grid-template-columns: 1fr;
    }
    
    .hero-title {
        font-size: 3rem;
    }
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem;
    }
    
    .card-content {
        padding: 1.5rem;
    }
}
</style>

<!-- Tambahkan AOS untuk animasi scroll -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\ukk_sulistia\resources\views/profile.blade.php ENDPATH**/ ?>