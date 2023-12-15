<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-L7Zt9Baklt8Fg/gEhX0u8YH4Bg65E4xH6o1QjjKCeUoNpv2gdUHp/3iTuLoefT5ZCaeYdJLQdCImwYeXMzY+mA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
       

        .w3-container.w3-teal h1 {
            display: block;
        }
        .card-body{
            height: 200px;
            width: 400px;
        }
        .log{
            margin-bottom: 2px;
            padding-bottom: 2px;
        }
         
    </style>
  </head>
  <body>
    <div class="w3-sidebar w3-light-grey w3-bar-block" style="width:14%">
        <h3 class="w3-bar-item">Dashboard</h3>
        <a href="userdata" class="w3-bar-item w3-button">Users <i class='fas fa-user' style='font-size:24px'></i></a>
        {{-- <i class='fas fa-user' style='font-size:24px'></i> --}}
        {{-- <i class='fas fa-user-tag'>fegfs</i> --}}
        {{-- <i class="fa fa-upload">tujr</i> --}}
        {{-- <i class='fas fa-user-graduate' style='font-size:24px'>greg</i> --}}
        <a href="header" class="w3-bar-item w3-button">Add Number</a>
        <a href="#" class="w3-bar-item w3-button">Result</a>
    </div>

    <div style="margin-left:14%">
        <div class="w3-container w3-teal">
            <h1>My Page</h1>
            <div class="log">
                <a href="{{ URL::to('admin/logout') }}" style="float: right; color: #fff; text-decoration: none; margin-right: 10px;">Logout</a>
               </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    
        <!-- Include Toastr JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
