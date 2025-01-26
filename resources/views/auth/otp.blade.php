<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Verify</title>
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
    <form action="{{route('otppost',$remainingTime)}}" method="post">
        <h3>Verify</h3>
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
        <label for="">Otp</label>
        <input type="text" name="otp" placeholder="Enter your otp">
        <button type="submit" class="btn btn-outline-primary">Sign up</button>
        <p id="timer"></p>
        <a href="" id="Resend" style="display:none;">Resend link</a>
    </form>
    <script>
        var remainingTime = {{remainingTime}};

        function startOtpCountdown(){
            var timer =document.getElementById('timer');
            var resend =document.getElementById('Resend');
            var interval =setInterval(function () {
                var minutes = Math.floor(remainingTime / 60);
                var seconds = Math.floor(remainingTime % 60);  
                timer.innerHTML ='Otp expires in ' + minutes + ':' + seconds;
                if(remainingTime<0){
                    clearInterval(interval);
                    timer.innerHTML='Otp has expired';
                    resend.style.display='block';
                }
                else{
                    remainingTime--;
                }
            },1000)
        }
        window.onload =function(){
            if(remainingTime>0){
                startOtpCountdown();
            }
            else{
                document.getElementById('timer').innerHTML='Otp has expired';
                document.getElementById('resend').style.display='block';
            }
        }

    </script>
 
</body>
</html>