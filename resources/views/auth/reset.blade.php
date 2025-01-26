<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Reset</title>
    <style>
        form{
            width: 500px;
            margin: 50px auto;
            border-radius: 15px;
            padding: 15px;
            background-color: white;
            height: auto;
            border: 1px solid;
        }
        label{
            color: lightseagreen;
            font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
        }
        input{
            width: 100%;
            border-radius: 10px;
            border-color: black;
            margin-bottom: 20px;
        }
        h3{
            text-align: center;
            color: red;
            background-color: white;
            padding: 10px;
            border: 1px solid;
        }
    </style>
</head>
<body>
    <form action="{{route('resetpost',$token)}}" method="post">
        <h3>Reset</h3>
        @csrf
        @if ($errors->any())
        @foreach ($errors->all() as $error )
        <p style="color:red;">{{$error}}</p>
        @endforeach
        @endif
        @if (session('error'))
        <p style="color:red;">{{session('error')}}</p>
        @endif
        @if (session('success'))
        <p style="color:green;">{{session('success')}}</p>
        @endif
        <label for="">Password</label>
        <input type="password" name="password" placeholder="Enter your password" id="password">
        <label for="">Confirm Password</label>
        <input type="password" name="password_confirmation" placeholder="Confirm password" id="passwords">
        <div class="check">
            <input type="checkbox" id="ShowPassword" class="form-check-input">
            <label for="" class="form-check-label">Show password</label>
        </div>
        <button type="submit" class="btn btn-outline-primary">Change</button>
    </form>
    <script>
        const ShowPasswordCheckbox =document.getElementById('ShowPassword');
        const passwordInput =document.getElementById('password');
        const passwordsInput =document.getElementById('passwords');

        ShowPasswordCheckbox.addEventListener('change',function(){
            if(ShowPasswordCheckbox.checked){
                passwordInput.type = 'text';
                passwordsInput.type = 'text';
            }
            else{
                passwordInput.type ='password';
                passwordsInput.type = 'password';
            }
        });
    </script>
</body>
</html>