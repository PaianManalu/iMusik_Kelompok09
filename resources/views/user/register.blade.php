<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-image: url("{{ asset('images/login.jpeg') }}");
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
            height: 450px;
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
    @extends('app')
    @section('content')
    <div class="row">
        <div class="col-md-6">
            @if($errors->any())
            @foreach($errors->all() as $err)
            <p class="alert alert-danger">{{ $err }}</p>
            @endforeach
            @endif
            <h1>Register</h1>
            <form action="{{ route('register.action') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Name <span class="text-danger"></span></label>
                    <input class="form-control" type="text" name="name" placeholder="Masukkan Nama Anda" value="{{ old('name') }}" />
                </div>
                <div class="mb-3">
                    <label>Username <span class="text-danger"></span></label>
                    <input class="form-control" type="username" name="username" placeholder="Masukkan Username Anda" value="{{ old('username') }}" />
                </div>
                <div class="mb-3">
                    <label>Password <span class="text-danger"></span></label>
                    <input class="form-control" type="password" name="password" placeholder="Masukkan Password Anda" />
                </div>
                <div class="mb-3">
                    <label>Password Confirmation<span class="text-danger"></span></label>
                    <input class="form-control" type="password" name="password_confirm" placeholder="Confirmasi Password Anda" />
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary">Register</button>
                    <a class="btn btn-danger" href="{{ route('home') }}">Back</a>
                </div>
            </form>
        </div>
    </div>
    @endsection