<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('template/plugins/fontawesome-free/css/all.min.css')); ?>">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo e(asset('template/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('template/dist/css/adminlte.min.css')); ?>">

  <!-- Custom CSS -->
  <style>
    body {
      background: linear-gradient(135deg, #444552, #a3a4af);
      font-family: 'Source Sans Pro', sans-serif;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-box {
      background: rgba(255, 255, 255, 0.9);
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      padding: 40px 30px;
      width: 100%;
      max-width: 400px;
    }

    .login-logo a {
      font-size: 32px;
      color: #767a8d;
      font-weight: bold;
      text-decoration: none;
    }

    .login-box-msg {
      text-align: center;
      font-size: 18px;
      color: #333;
    }

    .input-group-text {
      background-color: #f4f6f9;
      border-color: #ccc;
    }

    .form-control {
      border-radius: 4px;
      box-shadow: none;
      height: 50px;
    }

    .btn-primary {
      background-color: #3f55d7;
      border-color: #3f55d7;
      font-weight: 600;
      transition: background-color 0.3s ease;
    }

    .btn-primary:hover {
      background-color: #344ccf;
    }

    .alert-danger {
      background-color: #f8d7da;
      border-color: #f5c6cb;
      color: #721c24;
      border-radius: 5px;
      padding: 15px;
      margin-bottom: 15px;
    }

    .alert-danger ul {
      margin: 0;
      padding-left: 20px;
    }

    .alert-danger li {
      list-style-type: none;
    }

    .footer-text {
      text-align: center;
      color: #fff;
      margin-top: 20px;
    }
  </style>
</head>

<body>
  <div class="login-box">
    <div class="login-logo">
      <a href=""><b>Admin</b></a>
    </div>

    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan Login</p>

        <form action="<?php echo e(route('loginproses')); ?>" method="post">
          <?php echo csrf_field(); ?>
          <?php if($errors->any()): ?>
          <div class="alert alert-danger">
            <ul>
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
          <?php endif; ?>

          <div class="input-group mb-3">
            <input type="email" class="form-control" name="email" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
          </div>
        </form>

      </div>
    </div>
  </div>

  <script src="<?php echo e(asset('template/plugins/jquery/jquery.min.js')); ?>"></script>
  <script src="<?php echo e(asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
  <script src="<?php echo e(asset('template/dist/js/adminlte.min.js')); ?>"></script>
</body>

</html>
<?php /**PATH /home/fadil/fadil/admin-ab/resources/views/admin/login.blade.php ENDPATH**/ ?>