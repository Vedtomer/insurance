<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Include Font Awesome using a different CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- Include Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

    <title>Social Engineer Insurance</title>
    <style>
body {
    margin: 0;
    padding: 0;
    font-family: sans-serif;
    background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url("/img/background_cleanup.jpg");

    background-size: cover;
    background-repeat: no-repeat;
    background-position: top;
    background-attachment: fixed; /* Keep the background fixed */
}

.box{
    box-shadow: 10px 10px lightblue;;
  width: 300px;
  padding: 10px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  background: #191919;
  text-align: center;
      box-shadow: -1px 92px 99px -62px rgba(3, 107, 255, 0.27), 0 1px 6px 0 rgba(10, 48, 255, 0.48);
    border-radius: 5px;
}
.box h2{
  color: white;
  text-transform: uppercase;
  font-weight: 500;
}
.box input[type = "text"],.box input[type = "password"]{
  border:0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid #3498db;
  padding: 14px 10px;
  width: 200px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
  
}

.box a
{
  border:0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid #3498db;
  padding: 14px 10px;
  width: 200px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
  width:10%;
}
.box input[type = "text"]:focus,.box input[type = "password"]:focus{
  width: 280px;
   -webkit-animation: 9s colorChange alternate;
  transition height 0.3s, width 0.3s 0.1s
  input:focus ~ .border
  
}
.box input[type = "submit"]{
  border:0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid #2ecc71;
  padding: 14px 40px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
  cursor: pointer;
}

.box a[type = "submit"]{
  border:0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid #2ecc71;
  padding: 14px 40px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
  cursor: pointer;
}
.box input[type = "submit"]:hover{
  background: #2ecc71;
}

.box a[type = "submit"]:hover{
  background: #2ecc71;
}

h2 {
    display: block;
    font-size: 2em;
    margin-block-start: 0.67em;
    margin-block-end: 0.67em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    font-weight: bold;
}


@-webkit-keyframes colorChange {
  0%   { border-color: #007bff;  }
  5%  { border-color: #6610f2; }
  10%  { border-color: #6f42c1;}
  15%  { border-color: #e83e8c; }
  20% { border-color: #dc3545;}
   25%   { border-color: #fd7e14;  }
  30%  { border-color: #ffc107; }
  35%  { border-color: #28a745;}
  40%  { border-color: #20c997; }
  45%  { border-color: #17a2b8;}
  50%  { border-color: #6c757d;  }
  55%  { border-color: #343a40; }
  60%  { border-color: #007bff;}
  65%  { border-color: #6c757d; }
  70% { border-color: #28a745;}
  75% { border-color: #17a2b8;}
  80% { border-color: #ffc107;}
  85% { border-color: #dc3545;}
  90% { border-color: #343a40;}
  95% { border-color: #28a745;}
  100% { border-color: #20c997;}
}



/**************line*************/

.lines{position:absolute;top:0;left:0;right:0;height:100%;margin:auto;width:100vw;z-index:-1}.lines .line{position:absolute;width:1px;height:100%;top:0;left:50%;background:rgba(255,255,255,.06);overflow:hidden}.lines .line::after{content:"";display:block;position:absolute;height:15vh;width:100%;top:-50%;left:0;background:-webkit-gradient(linear,left top,left bottom,from(rgba(255,255,255,0)),color-stop(75%,#fff),to(#fff));background:linear-gradient(to bottom,rgba(255,255,255,0) 0%,#fff 75%,#fff 100%);-webkit-animation:run 7s 0s infinite;animation:run 7s 0s infinite;-webkit-animation-fill-mode:forwards;animation-fill-mode:forwards;-webkit-animation-timing-function:cubic-bezier(.4,.26,0,.97);animation-timing-function:cubic-bezier(.4,.26,0,.97)}.lines .line:nth-child(1){margin-left:-45%}.lines .line:nth-child(1)::after{-webkit-animation-delay:.5s;animation-delay:.5s}.lines .line:nth-child(3){margin-left:45%}.lines .line:nth-child(3)::after{-webkit-animation-delay:1s;animation-delay:1s}.lines .line:nth-child(4){margin-left:40%}.lines .line:nth-child(4)::after{-webkit-animation-delay:1.5s;animation-delay:1.5s}.lines .line:nth-child(5){margin-left:-40%}.lines .line:nth-child(5)::after{-webkit-animation-delay:2s;animation-delay:2s}.lines .line:nth-child(6){margin-left:35%}.lines .line:nth-child(6)::after{-webkit-animation-delay:2.5s;animation-delay:2.5s}.lines .line:nth-child(7){margin-left:-35%}.lines .line:nth-child(7)::after{-webkit-animation-delay:3s;animation-delay:3s}.lines .line:nth-child(8){margin-left:30%}.lines .line:nth-child(8)::after{-webkit-animation-delay:3.5s;animation-delay:3.5s}.lines .line:nth-child(9){margin-left:-30%}.lines .line:nth-child(9)::after{-webkit-animation-delay:4s;animation-delay:4s}.lines .line:nth-child(10){margin-left:25%}.lines .line:nth-child(10)::after{-webkit-animation-delay:4.5s;animation-delay:4.5s}.lines .line:nth-child(11){margin-left:-25%}.lines .line:nth-child(11)::after{-webkit-animation-delay:5s;animation-delay:5s}.lines .line:nth-child(12){margin-left:20%}.lines .line:nth-child(12)::after{-webkit-animation-delay:5.5s;animation-delay:5.5s}.lines .line:nth-child(13){margin-left:-20%}.lines .line:nth-child(13)::after{-webkit-animation-delay:6s;animation-delay:6s}.lines .line:nth-child(14){margin-left:15%}.lines .line:nth-child(14)::after{-webkit-animation-delay:6.5s;animation-delay:6.5s}.lines .line:nth-child(15){margin-left:-15%}.lines .line:nth-child(15)::after{-webkit-animation-delay:7s;animation-delay:7s}.lines .line:nth-child(16){margin-left:10%}.lines .line:nth-child(16)::after{-webkit-animation-delay:7.5s;animation-delay:7.5s}.lines .line:nth-child(17){margin-left:-10%}.lines .line:nth-child(17)::after{-webkit-animation-delay:8s;animation-delay:8s}.lines .line:nth-child(18){margin-left:5%}.lines .line:nth-child(18)::after{-webkit-animation-delay:8.5s;animation-delay:8.5s}.lines .line:nth-child(19){margin-left:-5%}.lines .line:nth-child(19)::after{-webkit-animation-delay:9s;animation-delay:9s}@-webkit-keyframes run{0%{top:-50%}100%{top:110%}}@keyframes run{0%{top:-50%}100%{top:110%}}.section-title-bg{color:#f0f0f0;font-size:85px;line-height:0;position:absolute;top:50%;left:0;z-index:-1;opacity:.8;font-family:Monoton,cursive;text-transform:uppercase;right:0;transform:translateY(-50%)}


.logo {
  width: 175px; /* Set the width and height of the circular container */
  height: 175px;
  border-radius: 50%; /* This will create a circular shape */
  overflow: hidden; /* Hide any overflow */
  margin: 0 auto 20px;
  background-color: aliceblue;

}

.logo img {
  width: 100%; /* Make sure the image fills the circular container */
  height: auto;
  display: block;
}
    </style>
</head>

<body>
    {{-- <form class="box" action="index.html" method="post">
        <div class="logo">
          <img src="./bg.png" alt="Logo">
        </div>
        <h1>Login</h1> 
        <input type="text" name="" placeholder="Username">
        <input type="password" name="" placeholder="Password">
        <a href="http://www.cakecounter.com/" target="_blank" type="submit">Login</a>
      </form> --}}
    {{-- <img class="logo" src="{{ asset('logos.png') }}" alt="Logo"> --}}

    <form class="box" action="" method="POST">
        @csrf
        <h2>Social Engineer Insurance</h2> 
        <div class="logo">
            <img src="{{ asset('socialengineerinsurance-logo.png') }}" alt="Logo">
          </div>
     
        <input type="text" name="email" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <input type="submit" value="Login">
    </form>
      
      
      
      <div class="lines">
                      <div class="line"></div>
                      <div class="line"></div>
                      <div class="line"></div>
                      <div class="line"></div>
                      <div class="line"></div>
                      <div class="line"></div>
                      <div class="line"></div>
                      <div class="line"></div>
                      <div class="line"></div>
                      <div class="line"></div>
                      <div class="line"></div>
                      <div class="line"></div>
                      <div class="line"></div>
                      <div class="line"></div>
                      <div class="line"></div>
                      <div class="line"></div>
                      <div class="line"></div>
                      <div class="line"></div>
                      <div class="line"></div>
                  </div>
      


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- Include Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        function togglePassword() {
                const passwordInput = document.getElementById("password");
                const passwordToggle = document.getElementById("password-toggle");
    
                if (passwordInput.type === "password") {
                    passwordInput.type = "text";
                    passwordToggle.innerHTML = '<i class="fas fa-eye-slash"></i>'; // Font Awesome icon for hiding the password
                } else {
                    passwordInput.type = "password";
                    passwordToggle.innerHTML = '<i class="fas fa-eye"></i>'; // Font Awesome icon for showing the password
                }
            }
    
        @if(session('error'))
            toastr.error("{{ session('error') }}");
            @endif
    

    <!-- Initialize Toastr -->
    
        $(document).ready(function() {
                toastr.options = {
                    "positionClass": "toast-top-right", // Adjust the position as needed
                    "closeButton": true,
                    "progressBar": true
                };
            });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- Include Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</body>

</html>