<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Page Design</title>
    <style>
     body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    background-image: url('{{ asset('images/newbody.jpeg') }}');
    height: 500px; 
    background-repeat: no-repeat;
}




        header {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }

        nav {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
        }

        section {
            padding: 20px;
            text-align: center;
        }

        footer {
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

    <header>
        <h1>WelCome To Sosial Engineer</h1>
    </header>

    <nav>
        <a href="admin/login" class="btn tn-secondary" onclick="loadContent('home')">Home</a>
        {{-- <a href="#" onclick="loadContent('about')">About</a>
        <a href="#" onclick="loadContent('contact')">Contact</a> --}}
    </nav>

    <section id="content">
        <!-- Content will be dynamically loaded here -->
    </section>

    <footer>
        &copy; 2023 Single Page Design
    </footer>

    <script>
        // Simple function to load content based on the link clicked
        function loadContent(page) {
            // You can fetch content from the server using AJAX or load it from a JavaScript object
            var content;
            if (page === 'home') {
                content = 'Welcome to the Home Page!';
            } else if (page === 'about') {
                content = 'Learn more about us.';
            } else if (page === 'contact') {
                content = 'Contact us for more information.';
            } else {
                content = 'Page not found.';
            }

            // Update the content section
            document.getElementById('content').innerHTML = content;
        }
    </script>

</body>
</html>
