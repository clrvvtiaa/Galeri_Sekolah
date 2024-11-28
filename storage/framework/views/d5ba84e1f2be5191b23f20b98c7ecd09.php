<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login | Web Galeri Sekolah</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      background: linear-gradient(to right, #ff9a9e, #fecfef); 
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card {
      border-radius: 15px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    .btn-primary {
      background-color: #5b9bd5;
      border-color: #5b9bd5;
    }

    .btn-primary:hover {
      background-color: #4a8ab9;
      border-color: #4a8ab9;
    }

    .form-control:focus {
      box-shadow: 0 0 5px rgba(91, 155, 213, 0.8);
      border-color: #5b9bd5;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="w-100 mx-auto" style="max-width: 420px;">
      <div class="card p-4">
        <div class="card-body">
          <h3 class="text-center mb-4 text-primary">Welcome Back!</h3>
          <p class="text-center text-muted mb-4">Please login to your account</p>
          
          <?php if(session('error')): ?>
          <div class="alert alert-danger fade show" role="alert">
            <?php echo e(session('error')); ?>

          </div>
          <?php endif; ?>

          <form action="/login" method="post">
            <?php echo csrf_field(); ?>
            <div class="mb-3">
              <label for="email" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-3">
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
              </div>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2">Login</button>
          </form>

          <div class="text-center mt-3">
            <span class="text-muted">Don't have an account?</span>
            <a href="<?php echo e(route('register')); ?>" class="text-primary text-decoration-none">Register</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
<?php /**PATH C:\ukk_sulistia\resources\views/auth/login.blade.php ENDPATH**/ ?>