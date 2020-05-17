<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
                <?php echo e(config('app.name', 'Laravel')); ?>

            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="<?php echo e(__('Toggle navigation')); ?>">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>


            </div>
        </div>
    </nav>

    <main class="py-4">


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Unos jedokratne lozinke</div>

                        <?php if($errors->count()>0): ?>
                            <div class="alert alert-danger">
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($error); ?>

                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        <?php endif; ?>

                        <?php if(session()->has('Message')): ?>
                            <div class="alert alert-info">
                                <?php echo e(session()->get('Message')); ?>

                            </div>
                        <?php endif; ?>

                        <div class="card-body">
                            <form action="/verifyOTP" method="post">
                                <?php echo csrf_field(); ?>
                                <div class="form-group">
                                    <label for="otp">Jednokratna lozinka</label>
                                    <input type="text" name="OTP" id="otp" class="form-control" required>
                                </div>
                                <input type="submit" value="Potvrda" class="btn btn-danger">
                            </form>
                        </div>


                        <div class="container mb-4">
                            <form action="/resend_otp" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="submit" class="btn btn-sm btn-outline-dark mr-4" value="Slanje lozinke">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="via" id="sms" value="sms">
                                    <label class="form-check-label" for="sms">SMS</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="via" id="email" value="email" checked>
                                    <label class="form-check-label" for="email">e-mail</label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </main>
</div>
</body>
</html>



<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/new_tfa/resources/views/OTP/verify.blade.php ENDPATH**/ ?>