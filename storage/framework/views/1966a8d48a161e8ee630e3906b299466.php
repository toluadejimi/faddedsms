<!doctype html>
<html lang="en">
 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/public/concept/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo e(url('')); ?>/public/concept/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/public/concept/assets/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo e(url('')); ?>/public/concept/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">

        <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php if(session()->has('message')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session()->get('message')); ?>

                    </div>
                    <?php endif; ?>
                    <?php if(session()->has('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo e(session()->get('error')); ?>

                    </div>
                    <?php endif; ?>

        <div class="card ">
            <div class="card-header text-center"><a href="#"><img class="logo-img" src="#" alt="ADMIN"></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form action="/admin-login" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="username" type="text" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" name="password" type="password" placeholder="Password">
                    </div>
                  
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="<?php echo e(url('')); ?>/public/concept/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?php echo e(url('')); ?>/public/concept/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/project/faddedsms/resources/views/admin-login.blade.php ENDPATH**/ ?>