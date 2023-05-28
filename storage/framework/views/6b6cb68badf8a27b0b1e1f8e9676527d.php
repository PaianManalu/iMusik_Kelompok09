<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Theme Made By www.w3schools.com - No Copyright -->
    <title>ADMINy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <style>

    </style>
</head>

<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="navigasi">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#about">ABOUT</a></li>
                <li><a href="#services">UPLOAD</a></li>
                <li><a href="#portfolio">MUSIK</a></li>
                <li><a href="#pricing">PARA ADMIN</a></li>
                <li><a href="#contact">CONTACT</a></li>
            </ul>
        </div>
        </div>
    </nav>

    <div class="jumbotron text-center">
        <h1>ADMIN</h1>
        <p>We specialize in blablabla</p>
    </div>

    <!-- Container (About Section) -->
    <div id="about" class="container-fluid">
        <div class="row">
            <div class="col-sm-8">
                <h2>iMusic</h2>
                <h4>Empowering Administrators for Efficient Management</h4>
                <p>Welcome to our admin website, a comprehensive platform designed to empower administrators and streamline their management tasks. We understand the challenges administrators face in maintaining smooth operations, and our goal is to provide them with the tools and resources they need to excel in their roles.</p>

                <button><a class="btn btn-danger" href="<?php echo e(route('fetch')); ?>">Get in Touch</a></button>
            </div>
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-signal logo"></span>
            </div>
        </div>
    </div>

    <div class="container-fluid bg-grey">
        <div class="row">
            <div class="col-sm-4">
                <span class="glyphicon glyphicon-globe logo"></span>
            </div>
            <div class="col-sm-8">
                <h2>Our Values</h2>
                <h4><strong>MISSION:</strong> Empowering people through innovative technology</h4>
                <p><strong>VISION:</strong> Building a better future by connecting the world</p>
            </div>
        </div>
    </div>

    <div id="services" class="upload">
        <form method="post" action="<?php echo e(route('insert.file')); ?>" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <h1><b>Tambahkan Musik</b></h1><br>
            <label for="video">Video:</label>
            <input type="file" name="video" id="video" />
            <br>

            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" />
            <br>

            <label for="artist">Artist:</label>
            <input type="text" name="artist" id="artist" />
            <br>

            <label for="album">Album:</label>
            <input type="text" name="album" id="album" />
            <br>

            <label for="deskripsi">Deskripsi:</label>
            <textarea name="deskripsi" id="deskripsi"></textarea>

            <br>


            <p>
                <?php if($errors->has('video')): ?>
                <?php echo e($errors->first('video')); ?>

                <?php endif; ?>
            </p>

            <input type="submit" name="click" value="Upload" class="btn-upload" />
        </form>
    </div>


    <!-- Container (Pricing Section) -->
    <div id="pricing" class="container-fluid">
        <div class="right-div">
            <h1><b>Daftar Musik</b></h1><br>
            <div class="video-list">
                <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="video-wrapper">
                    <div class="video-item">
                        <div class="video-info">
                            <h3><?php echo e($video->nama); ?></h3>
                            <p><?php echo e($video->deskripsi); ?></p>
                            <p>Album: <?php echo e($video->album); ?></p>
                            <p>Artist: <?php echo e($video->artist); ?></p>
                        </div>
                    </div>
                    <div class="video-actions">
                        <form method="GET" action="<?php echo e(route('edit.file', ['file_id' => $video->id])); ?>">
                            <button type="submit" class="btn-edit">Edit</button>
                        </form>
                        <form method="POST" action="<?php echo e(route('delete.file', ['file_id' => $video->id])); ?>">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn-delete">Delete</button>
                        </form>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>




    <!-- Container (Portfolio Section) -->
    <div id="portfolio" class="container-fluid text-center bg-grey">
        <h1>FOTO ADMIN</h1><br>
        <h4>What we have created</h4>
        <div class="row">
            <div class="col-md-3">
                <div class="foto">
                    <img src="images/juma.jpg" alt="Paris" width="400" height="300">
                    <p><strong>Elisabeth Panjaitan</strong></p>
                    <p>ratu bawel</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="foto">
                    <img src="images/paian.jpg" alt="New York" width="400" height="300">
                    <p><strong>Paian Manalu</strong></p>
                    <p>Sipangalo</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="foto">
                    <img src="images/timbul.jpg" alt="San Francisco" width="400" height="300">
                    <p><strong>Timbul Nainggolan</strong></p>
                    <p>Sipaling Bucin</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="foto">
                    <img src="images/ryka.jpg" alt="San Francisco" width="400" height="300">
                    <p><strong>Ryka Siadari</strong></p>
                    <p>Sipaling cantik diantara yg</p>
                </div>
            </div>
        </div>
    </div>

    <h2>Warning!!</h2>
    <h2> Kata BIjak untuk Mu</h2>
    <div id="myCarousel" class="carousel slide text-center" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <h4>"Ketika kita melihat ke belakang, kita menyadari bahwa semua perjuangan dan pengorbanan adalah investasi yang berharga untuk masa depan."<br><span>Michael Roe, Wakil Presiden, Comment Box</span></h4>
            </div>
            <div class="item">
                <h4>"Terkadang, dalam kehidupan, kejutan terbesar terletak pada perjalanan yang penuh liku dan bukan pada tujuan akhirnya."<br><span>John Doe, Salesman, Rep Inc</span></h4>
            </div>
            <div class="item">
                <h4>"Ketika kita berbagi kebahagiaan, kita menggandakannya. Tetapi ketika kita berbagi kesedihan, kita membaginya menjadi setengahnya saja."<br><span>Chandler Bing, Aktor, FriendsAlot</span></h4>
            </div>

            <div class="item">
                <h4>"Bisakah aku... semakin bahagia dengan perusahaan ini?"<br><span>Chandler Bing, Aktor, FriendsAlot</span></h4>
            </div>
        </div>


        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    </div>
    <!-- Container (Contact Section) -->
    <footer class="admin-footer">
        <h2>Social Media</h2>
        <a href="#" class="fa fa-facebook"></a>
        <a href="#" class="fa fa-twitter"></a>
        <a href="#" class="fa fa-google"></a>
        <a href="#" class="fa fa-linkedin"></a>
        <a href="#" class="fa fa-youtube"></a>
        <a href="#" class="fa fa-instagram"></a>
        <a href="#" class="fa fa-pinterest"></a>
        <a href="#" class="fa fa-snapchat-ghost"></a>
        <a href="#" class="fa fa-skype"></a>
        <a href="#" class="fa fa-android"></a>
        <a href="#" class="fa fa-dribbble"></a>
        <a href="#" class="fa fa-vimeo"></a>
        <a href="#" class="fa fa-tumblr"></a>
        <a href="#" class="fa fa-vine"></a>
        <a href="#" class="fa fa-foursquare"></a>
        <a href="#" class="fa fa-stumbleupon"></a>
        <a href="#" class="fa fa-flickr"></a>
        <a href="#" class="fa fa-yahoo"></a>
        <a href="#" class="fa fa-reddit"></a>
        <a href="#" class="fa fa-rss"></a>


    </footer>



    <footer class="container-fluid text-center">
        <a href="#myPage" title="To Top">
            <span class="glyphicon glyphicon-chevron-up"></span>
        </a>
        <p>Back <a href="#"></a></p>
    </footer>

</body>

</html><?php /**PATH C:\adminweb\admin\resources\views/index.blade.php ENDPATH**/ ?>