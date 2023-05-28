<!DOCTYPE html>
<html>

<head>
    <title>Welcome to My Music Website</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url("{{ asset('images/background awal.png') }}");
            background-repeat: no-repeat;
            background-size: cover;
            color: #333;
        }

        .card1 {
            background-color: rgba(255, 255, 255, 0.1);
            /* Nilai 0.5 menunjukkan tingkat transparansi, semakin kecil semakin transparan */
            backdrop-filter: blur(10px);
            padding: 20px;
            text-align: center;
            transition: border-color 0.3s;
            margin: auto;
            color: aliceblue;
        }


        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-primary {
            background-color: #428bca;
            color: white;
        }

        .btn-primary:hover {
            background-color: #3071a9;
        }

        .btn-danger {
            background-color: #d9534f;
            color: white;
        }

        .btn-danger:hover {
            background-color: #c9302c;
        }

        h2 {
            font-size: 24px;
            font-family: 'Arial', sans-serif;
            font-style: italic;
            transform: skew(-10deg);
        }

        h2 b {
            font-weight: bold;
        }

        p {
            font-size: 20px;
            color: whitesmoke
        }

        .quote {
            font-style: italic;
            color: wheat;
            margin-top: 40px;
            font-size: 30px;
        }

        .icon {
            display: inline-block;
            margin: 0 10px;
            font-size: 30px;
            color: #666;
            transition: color 0.3s;
        }

        .icon:hover {
            color: #428bca;
        }

        .btn.btn-info {
            color: white;
        }

        .btn.btn-info:hover {
            color: white;
        }
    </style>
</head>

<body>
    <div class="card1">
        <div class="card-body">
            <!-- Your content here -->
            @extends('app')
            @section('content')
            @auth
            <h2>Welcome <b>{{ Auth::user()->name }}</b></h2><br><br>
            <p>Discover the endless possibilities!</p>
            <a class="btn btn-danger" href="{{ route('fetch') }}">Let's dive into music</a>
            @endauth

            @guest
            @include('welcome_guest')
            @endguest

            <div class="icons">
                <i class="icon fas fa-music"></i>
                <i class="icon fas fa-video"></i>
            </div>

            <p class="quote">Music, once admitted to the soul, becomes a sort of spirit and never dies. – Edward Bulwer-Lytton</p>
        </div>
    </div>
</body>

</html>