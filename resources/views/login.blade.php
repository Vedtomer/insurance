<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>User Login Form</title>
    <style>
          :root {
            --primary-color: #387f97;
        }

        body {
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            min-width: 500px;
            padding: 40px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            border-radius: 0;
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            font-size: 20px !important;
            /* Increase button font size */
        }

        .btn-primary:hover {
            background-color: rgba(56, 127, 151, 0.9);
            border-color: rgba(56, 127, 151, 0.9);
        }

        .center-btn {
            text-align: center;
        }

        /* Increase font size for labels and form inputs */
        .form-label {
            font-size: 20px !important;
        }

        .form-control {
            font-size: 20px !important;
        }

        /* Increase font size for the Login heading */
        h2 {
            font-size: 24px;
        }

        /* Increase font size for the password toggle button */
        .password-toggle {
            position: absolute;
            top: 50%;
            right: 4px;
            transform: translateY(4%);
            cursor: pointer;
            font-size: 24px;
            /* Increase font size */
        }

        /* Increase font size for the logo */
      
    </style>
</head>
<body>
    <div class="login-container">
        <h2 class="text-center">Login</h2>
        <form action="" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3 position-relative">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                <span class="password-toggle" id="password-toggle" onclick="togglePassword()">
                    <i class="fas fa-eye"></i> <!-- Font Awesome icon for showing the password -->
                </span>
            </div>
            <div class="center-btn">
                <button type="submit" class=" btn btn-primary">Login</button>
            </div>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- Include Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
</body>
</html>
