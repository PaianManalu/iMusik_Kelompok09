<!-- edit.blade.php -->
<html>

<head>
    <title>Edit Video</title>
    <link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>" />
    <style>
        /* admin.css */

        .edit-form {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
            border-radius: 5px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="file"],
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button.btn-update {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button.btn-update:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="edit-form">
        <h2>Edit Video</h2>
        <form method="POST" action="<?php echo e(route('update.file', ['file_id' => $video->id])); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <label for="video">Video:</label>
            <input type="file" name="video" id="video" />

            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" value="<?php echo e($video->nama); ?>" />

            <label for="deskripsi">Deskripsi:</label>
            <input type="text" name="deskripsi" id="deskripsi" value="<?php echo e($video->deskripsi); ?>" />

            <label for="album">Album:</label>
            <input type="text" name="album" id="album" value="<?php echo e($video->album); ?>" />

            <label for="artist">Artist:</label>
            <input type="text" name="artist" id="artist" value="<?php echo e($video->artist); ?>" />

            <button type="submit" class="btn-update">Update</button>
        </form>
    </div>
</body>

</html><?php /**PATH C:\adminweb\admin\resources\views/edit.blade.php ENDPATH**/ ?>