<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-image: url("{{ asset('images/login.png') }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            height: 140vh;
            margin: 0;
            padding: 0;
        }

        h2 {
            text-align: center;
            padding: 40px;
            font-size: 35px;
            color: black !important;
            font-weight: bold;

        }

        form {
            background-color: rgba(255, 255, 255, 0.5);
            /* Nilai 0.5 menunjukkan tingkat transparansi, semakin kecil semakin transparan */
            backdrop-filter: blur(10px);
            border-radius: 25px;
            box-shadow: 10px 10px 5px #ccc;
            padding: 20px;
            width: 100%;
            height: 420px;
            max-width: 400px;
            margin: 0 auto;
            border: 1px solid #ccc;
            /* Menghapus height */
        }

        label {
            display: block;
            /* Mengubah display ke block */
            font-weight: bold;
            margin-bottom: 5px;
            /* Mengurangi margin-bottom */
        }

        input[type="text"],
        input[name="username"] {
            border-radius: 5px;
            border: 1px solid #ccc;
            /* Mengurangi border menjadi 1px */
            padding: 10px;
            width: 90%;
            /* Mengubah width menjadi 100% */
            margin-bottom: 20px;
        }

        input[type="password"] {
            border-radius: 5px;
            border: 1px solid #ccc;
            /* Mengurangi border menjadi 1px */
            padding: 10px;
            width: 85%;
            /* Mengubah width menjadi 100% */
            margin-bottom: 20px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .btn-danger {
            background-color: gray;
            color: #fff;
            border-radius: 30px;
            padding: 10px 20px;
            margin-left: 10px;
            /* Mengganti margin menjadi margin-left */
        }

        .btn-danger:hover,
        .btn-primary:hover {
            opacity: 0.8;
            /* Mengubah nilai opacity menjadi 0.8 */
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
            width: 100%;
            border-radius: 30px;
            padding: 10px 20px;
            margin-bottom: 20px;
        }

        .btn-danger {
            background-color: gray;
            color: #fff;
            border-radius: 30px;
            padding: 10px 20px;
            margin-right: 10px;
            float: right;
            /* Menambahkan float ke kiri */
        }


        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
            padding: .75rem 1.25rem;
            margin-bottom: 1rem;
            border-radius: .25rem;
        }
    </style>


</head>

<body>
    @extends('app')
    @section('content')
    <div class="row">
        <div class="col-md-6">
            @if($errors->any())
            @foreach($errors->all() as $err)
            <p class="alert alert-danger">{{ $err }}</p>
            @endforeach
            @endif
            <form action="{{ route('register.action') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Name <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="name" value="{{ old('name') }}" />
                </div>
                <div class="mb-3">
                    <label>Username <span class="text-danger">*</span></label>
                    <input class="form-control" type="username" name="username" value="{{ old('username') }}" />
                </div>
                <div class="mb-3">
                    <label>Password <span class="text-danger">*</span></label>
                    <input class="form-control" type="password" name="password" />
                </div>
                <div class="mb-3">
                    <label>Password Confirmation<span class="text-danger">*</span></label>
                    <input class="form-control" type="password" name="password_confirm" />
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Register</button>
                    <a class="btn btn-danger" href="{{ route('home') }}">Back</a>
                </div>
            </form>
        </div>
    </div>
    @endsection