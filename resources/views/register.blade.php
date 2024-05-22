<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <link rel="stylesheet" type="text/css" href="login.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/minty/bootstrap.min.css"
        integrity="sha384-H4X+4tKc7b8s4GoMrylmy2ssQYpDHoqzPa9aKXbDwPoPUA3Ra8PA5dGzijN+ePnH" crossorigin="anonymous"> --}}
    <style>
        /* Importing fonts from Google */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

        /* Reseting */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background: #ecf0f3;
        }

        .wrapper {
            max-width: 700px;
            min-height: 500px;
            margin: 80px auto;
            padding: 40px 30px 30px 30px;
            background-color: #71B533;
            border-radius: 15px;
            box-shadow: 13px 13px 20px #cbced1, -13px -13px 20px #fff;
        }

        .logo {
            width: 80px;
            margin: auto;
        }

        .logo img {
            width: 100%;
            height: 80px;
            object-fit: cover;
            border-radius: 50%;
            box-shadow: 0px 0px 3px #5f5f5f,
                0px 0px 0px 5px #ecf0f3,
                8px 8px 15px #a7aaa7,
                -8px -8px 15px #fff;
        }

        .wrapper .name {
            font-weight: 600;
            font-size: 1.4rem;
            letter-spacing: 1.3px;
            padding-left: 10px;
            color: #555;
        }

        .wrapper .form-field input {
            width: 100%;
            display: block;
            border: none;
            outline: none;
            background: none;
            font-size: 1.2rem;
            color: #666;
            padding: 10px 15px 10px 10px;
            /* border: 1px solid red; */
        }

        .wrapper .form-field {
            padding-left: 10px;
            margin-bottom: 20px;
            border-radius: 20px;
            box-shadow: inset 8px 8px 8px #cbced1, inset -8px -8px 8px #fff;
        }

        .wrapper .form-field .fas {
            color: #555;
        }

        .wrapper .btn {
            box-shadow: none;
            width: 100%;
            height: 40px;
            background-color: #556B2F;
            color: #fff;
            border-radius: 25px;
            box-shadow: 3px 3px 3px #b1b1b1,
                -3px -3px 3px #fff;
            letter-spacing: 1.3px;
        }

        .wrapper .btn:hover {
            background-color: #A9A9A9;
        }

        .wrapper a {
            text-decoration: none;
            font-size: 0.8rem;
            color: #556B2F;
        }

        .wrapper a:hover {
            color: #F8F8FF;
        }

        .wrapper .form-select {
            text-align: center;
            background-color: transparent;
            border: none;
            border-radius: 20px;
            padding-bottom: 10px;
            outline: none;
        }

        @media(max-width: 380px) {
            .wrapper {
                margin: 30px 20px;
                padding: 40px 15px 15px 15px;
            }
        }
        .wrapper .form-select option{
            text-align: center;
            
        }
        textarea{
            background-color: transparent;
            border: none; 
            text-align: center;
        }
        textarea:focus,
        textarea:active{
            border: none;
        }

    </style>
</head>

<body>
    <div class="wrapper">
        <div class="logo">
            <img src="../lp/images/greenmarket.png" alt="">
        </div>
        <div class="text-center mt-4 name">
            Register
        </div>
        <form class="p-3 mt-3" action="{{route('register-proses')}}" method="post">
            @csrf
            <div class="d-flex flex-row gap-3">
                <div>
                    <div class="form-field d-flex align-items-center">
                        <span class="fas fa-user"></span>
                        <input type="text" name="name" id="name" placeholder="Nama Lengkap" required>
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <span class="fas fa-envelope"></span>
                        <input type="email" name="email" id="email" placeholder="Email" required>
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <span class="fas fa-key"></span>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <span class="fas fa-phone" aria-hidden="true" style="transform: rotateY(180deg)"></span>
                        <input type="number" name="phone" id="phone" placeholder="Nomor Telpon" required>
                    </div>
                </div>
                <div>
                    <div class="form-field d-flex align-items-center">
                        <span class="fas fa-home"></span>
                        <textarea name="address1" id="address1" cols="30" rowcs="3" placeholder="Alamat 1"></textarea>
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <span class="fas fa-home"></span>
                        <textarea name="address2" id="address2" cols="30" rows="3" placeholder="Alamat 2"></textarea>
                    </div>
                    <div class="form-field d-flex align-items-center">
                        <span class="fas fa-home"></span>
                        <textarea name="address3" id="address3" cols="30" rows="3" placeholder="Alamat 3"></textarea>
                    </div>
                </div>
            </div>
            <button class="btn mt-3" type="submit" value="register"><h5>Register</h5></button>
        </form>
        <div class="text-center fs-6">
            <a>Sudah punya akun?</a>
            <a href="/login">Login</a>
        </div>
    </div>

</body>

</html>