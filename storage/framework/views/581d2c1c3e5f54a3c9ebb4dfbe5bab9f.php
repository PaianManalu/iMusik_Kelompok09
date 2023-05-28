<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Video Player</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="css/styless.css">
    <style>
    </style>
    <div class="sidebar">
        <input type="checkbox" class="menu-toggle" id="menu-toggle">
        <label for="menu-toggle">&#9776;</label>
        <nav class="nav-menu">
            <div class="navbar">
                <div class="sidebar">
                    <div class="users">
                        <i class="fas fa-user"></i>
                        <p>User: <b><?php echo e(Auth::user()->name); ?></b></p>
                    </div><br><br><br>
                    <ul class="menu">
                        <form action="http://localhost:8000/search" method="GET">
                            <input type="text" name="search" placeholder="Cari video...">
                            <button type="submit">Cari</button>
                        </form><br>
                        <a class="active" href="<?php echo e(route('fetch')); ?>"><i class="fa fa-fw fa-home"></i><br> Home</a>
                        <a href="#"><i class="fa fa-fw fa-ellipsis-h"></i><br> Lain-lain</a>
                    </ul><br><br>

                    <div class="playlist">

                        <button onclick="togglePlaylist()">
                            <h2>Create Playlist</h2>
                        </button>
                        <ul id="playlistItems" style="display: none;">
                            <!-- Daftar video yang ditambahkan ke playlist akan ditampilkan di sini -->
                        </ul>
                    </div>

                    <a class="btn-danger" href="<?php echo e(route('logout')); ?>">Logout</a><br><br><br>


                    <script>
                        var playlistItems = [];

                        // Memulihkan playlist dari localStorage saat halaman dimuat
                        if (localStorage.getItem('playlistItems')) {
                            playlistItems = JSON.parse(localStorage.getItem('playlistItems'));
                            updatePlaylist();
                        }

                        function togglePlaylist() {
                            var playlistItemsContainer = document.getElementById('playlistItems');
                            if (playlistItemsContainer.style.display === 'none') {
                                playlistItemsContainer.style.display = 'block';
                            } else {
                                playlistItemsContainer.style.display = 'none';
                            }
                        }

                        function addToPlaylist(button) {
                            var videoUrl = button.getAttribute('data-video-url');
                            var videoName = button.getAttribute('data-video-name');

                            var playlistItem = {
                                url: videoUrl,
                                name: videoName
                            };

                            playlistItems.push(playlistItem);
                            updatePlaylist();
                        }

                        function removeFromPlaylist(index) {
                            playlistItems.splice(index, 1);
                            updatePlaylist();
                        }

                        function updatePlaylist() {
                            var playlistItemsContainer = document.getElementById('playlistItems');
                            playlistItemsContainer.innerHTML = '';

                            for (var i = 0; i < playlistItems.length; i++) {
                                var playlistItem = playlistItems[i];
                                var listItem = document.createElement('li');
                                listItem.textContent = playlistItem.name;

                                var removeButton = document.createElement('button');
                                removeButton.textContent = 'Remove';
                                removeButton.setAttribute('onclick', 'removeFromPlaylist(' + i + ')');

                                listItem.appendChild(removeButton);
                                playlistItemsContainer.appendChild(listItem);
                            }

                            // Menyimpan playlist ke localStorage
                            localStorage.setItem('playlistItems', JSON.stringify(playlistItems));
                        }
                    </script>
                </div>
            </div>
        </nav>
    </div>
    </header>
    <div class="main">
        <div class="head">
            <div class="container">
                <div class="logo">
                </div>
                <div class="social-media">
                    <h1>iMusik</h1>
                    <div class="signup-button">
                        <a href="<?php echo e(route('register')); ?>">
                            <h2>Sign Up</h2>
                        </a>
                    </div>
                    &nbsp;
                    <a href="https://www.facebook.com"><i><img src="images/facebook.png" alt="Logo"></i></a>
                    <a href="https://www.twitter.com"><i><img src="images/twiter.png" alt="Logo"></i></a>
                    <a href="https://www.instagram.com"><i><img src="images/ig.png" alt="Logo"></i></a>
                </div>
            </div>
        </div><br><br>
        <div class="video-container">
            <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(isset($search) && stripos($video['nama'], $search) !== false): ?>
            <div class="video"></div>
            <?php else: ?>
            <div class="video-wrapper">
                <video class="video-player" controls>
                    <source src="<?php echo e(asset('upload')); ?>/<?php echo e($video['video']); ?>" type="video/mp4">
                </video>
                <div class="video-title"><?php echo e($video['nama']); ?></div>
                <p>Artist: <?php echo e($video['artist']); ?></p>
                <p>Deskripsi: <span class="video-deskripsi"><?php echo e($video['deskripsi']); ?></span></p>
                <p>Jumlah Pemutar: <span class="video-jumlah-pemutaran"><?php echo e($video['jumlah pemutaran']); ?></span></p>
            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div><br><br><br><br>
        <!-- resources/views/videos.blade.php -->
        <div class="comment-section">
            <h2>Daftar komentar</h2>
            <form action="<?php echo e(route('comments.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <label for="name">Nama:</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="comment">Komentar:</label>
                    <textarea name="comment" id="comment" class="form-control" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Komentar</button>
            </form>
        </div>
        <footer>
            <div class="footer-container">
                <div class="contact-info">
                    <h4>Kontak</h4>
                    <p>Email: paianmanalu@.com</p>
                    <p>Telepon: 081373026328</p>
                    <p>Alamat: Institut Teknologi Del</p>
                </div>
                <div class="logo-section">
                    <img src="images/1.png" alt="Logo 1">
                    <img src="images/2.png" alt="Logo 2">
                    <img src="images/3.jpg" alt="Logo 3">
                    <!-- Tambahkan logo keren lainnya di sini -->
                </div>
            </div>
            <p class="copyright">
                &copy; 2023 Your Website. All rights reserved.
            </p>
        </footer>

        </body>

</html>

</div><?php /**PATH C:\iMusik\iMusik_Kelompok09\resources\views/search_result.blade.php ENDPATH**/ ?>