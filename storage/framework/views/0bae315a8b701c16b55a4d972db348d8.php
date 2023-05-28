<!-- hapus.blade.php -->
<html>

<head>
    <title>Hapus Video</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>" />
</head>

<body>
    <div class="container">
        <div class="video-list">
            <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="video-item">
                <div class="video-info">
                    <h3><?php echo e($video->nama); ?></h3>
                    <p><?php echo e($video->deskripsi); ?></p>
                    <p>Album: <?php echo e($video->album); ?></p>
                    <p>Artist: <?php echo e($video->artist); ?></p>
                </div>
                <div class="video-actions">
                    <form method="POST" action="<?php echo e(route('delete.file', ['file_id' => $video->id])); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn-delete">Delete<?php /**PATH C:\adminweb\admin\resources\views/hapus.blade.php ENDPATH**/ ?>