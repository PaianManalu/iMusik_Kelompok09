<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            background-image: url("<?php echo e(asset('images/login.jpeg')); ?>");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 94vh;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            padding: 70px;
            font-family: 'Helvetica Neue', Arial, sans-serif;
            font-size: 32px;
            font-weight: bold;
            color: #333;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        form {
            background-color: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
            border-radius: 25px;
            box-shadow: 10px 10px 5px rgba(0, 0, 0, 0.2);
            padding: 50px;
            width: 500px;
            height: 280px;
            max-width: 500px;
            margin: 0 auto;
            border: 1px solid rgba(0, 0, 0, 0.2);
        }


        label {
            font-size: 25px;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[name="username"],
        input[type="password"] {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 10px;
            width: 100%;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 20px 23px;
            cursor: pointer;
        }

        .btn-danger {
            background-color: gray;
            color: #fff;
            border-radius: 30px;
            padding: 15px 40px;
            margin-left: 10px;
            float: right;
        }

        .btn-danger:hover,
        .btn-primary:hover {
            opacity: 0.8;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        .mb-2 {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .btn-primary {
            font-size: 20px;
            width: 520px;
            height: 40px;
            border-radius: 30px;
            padding: 10px 20px;
            margin-bottom: 20px;
        }
    </style>

</head>

<body>
    
    <?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-6">
            <?php if(session('success')): ?>
            <p class="alert alert-success"><?php echo e(session('success')); ?></p>
            <?php endif; ?>
            <?php if($errors->any()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <p class="alert alert-danger"><?php echo e($err); ?></p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
            <h1>Login</h1>
            <form action="<?php echo e(route('login.action')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="mb-3">
                    <label>Username <span class="text-danger"></span></label>
                    <input class="form-control" type="username" name="username" placeholder="Masukkan Username Anda" value="<?php echo e(old('username')); ?>" />
                </div>
                <div class="mb-3">
                    <label>Password <span class="text-danger"></span></label>
                    <input class="form-control" type="password" name="password" placeholder="Masukkan Sandi Anda" />
                </div><br>
                <div class="mb-3">
                    <button class="btn btn-primary">Login</button>
                    <a class="btn btn-danger" href="<?php echo e(route('home')); ?>">Back</a>
                </div>
            </form>
        </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\iMusik\iMusik_Kelompok09\resources\views/user/login.blade.php ENDPATH**/ ?>