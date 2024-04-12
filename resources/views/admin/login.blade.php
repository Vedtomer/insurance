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

    <title>Login Form</title>
    <style>
      * {
  margin:0;
  padding:0;
  font-family: 'Source Sans Pro', sans-serif;
}

body {
  background:#2c3e50; /*From http://flatuicolors.com/ */
}

form {
    position: absolute;
  width:556px;
  height:350px;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align:center;
  background:#ecf0f1;
  padding:40px;
  -webkit-border-radius:20px 0 0 0;
     -moz-border-radius:20px 0 0 0;
          border-radius:20px 0 0 0;
  -webkit-box-shadow: 0px 1px 0px #ad392d, inset 0px 1px 0px white;
     -moz-box-shadow: 0px 1px 0px #ad392d, inset 0px 1px 0px white;
          box-shadow: 0px 1px 0px #ad392d, inset 0px 1px 0px white;
  box-shadow: 20px 20px 20px;
}


h4 {
  font-family: 'Source Sans Pro', sans-serif;
  font-size:2em;
  font-weight:300;
  margin-bottom:25px;
  color:#7f8c8d;
  text-shadow:1px 1px 0px white;
}

input {
  display:block;
  width:415px;
  padding:14px;
  -webkit-border-radius:6px;
     -moz-border-radius:6px;
          border-radius:6px;
  border:0;
  margin-bottom:12px;
  color:#7f8c8d;
  font-weight:600;
  font-size:19px;
}

input:focus {
  background:#fafafa;
}


li {
  position:absolute;
  right:40px;
  bottom:62px;
  list-style:none;
}

a, a:visited {
  text-decoration:none;
  color:#7f8c8d;
  font-weight:400;
  text-shadow:1px 1px 0px white;
  -webkit-transition: all .3s ease-in-out;
     -moz-transition: all .3s ease-in-out;
          transition: all .3s ease-in-out;
}
.cont{
    margin-top: 50px;
}

.button {
  position:relative;
  float:left;
  width:145px;
  margin-top:10px;
  background:#3498db;
  color:#fff;
  font-weight:400;
  text-shadow:1px 1px 0px #2d7baf;
  box-shadow:0px 3px 0px #2d7baf;
  -webkit-transition: all .3s ease-in-out;
     -moz-transition: all .3s ease-in-out;
          transition: all .3s ease-in-out;
}
.logo {
            position: absolute;
            top: 40px;
            left: 40px;
            width: 280px;
            height:185px;
            border-radius: 0px;
            padding: 10px;
        }

    </style>
</head>

<body>

    <img class="logo" src="{{ asset('logos.png') }}" alt="Logo">

 <div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <form action="" method="POST" class="form">
                @csrf
                <h4>Login Information</h4>
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <div class="text-end mb-3 mt-5">
                    <a href="#" class="text-decoration-none">Forgot your password?</a>
                    <input class="button" type="submit" value="Log in"/>
                </div>
              
            </form>
        </div>
    </div>
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