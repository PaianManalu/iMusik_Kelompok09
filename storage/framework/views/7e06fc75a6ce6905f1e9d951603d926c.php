<form action="<?php echo e(route('admin.login')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="mb-3">
        <label>Username <span class="text-danger">*</span></label>
        <input class="form-control" type="text" name="username" value="<?php echo e(old('username')); ?>" />
    </div>
    <div class="mb-3">
        <label>Password <span class="text-danger">*</span></label>
        <input class="form-control" type="password" name="password" />
    </div>
    <div class="mb-3">
        <button class="btn btn-primary">Login</button>
        <a class="btn btn-danger" href="<?php echo e(route('home')); ?>">Back</a>
    </div>
</form><?php /**PATH C:\adminweb\admin\resources\views/loginadmin.blade.php ENDPATH**/ ?>