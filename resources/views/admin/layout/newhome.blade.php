<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            background-image: url("{{ asset('images/WhatsApp Image 2023-12-07 at 1.14.57 PM.jpeg') }}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            height: 100vh;
            background-attachment: fixed;
        }

        .number-container,
        .video-container,
        .table-container {
            margin: 15px; /* Adjust margin as needed */
        }

        .number-container {
            background-color: #000000;
            padding: 10px;
            border-radius: 10px;
            font-size: 1.5em;
            color: white;
        }

        .shadow-dark {
            color: white;
            border: 1px solid rgb(9, 175, 244);
            box-shadow: 0 0 1px rgb(2, 213, 255);
        }

        iframe {
            width: 100%;
            height: 300px; /* Adjust height as needed */
        }

        .text {
            font-size: 2rem;
        }
        User
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        body {
            /* background-image: url("https://designerapp.officeapps.live.com/designerapp/document.ashx?path=/fd37c62f99e15728/UserAssets/dalle-e2d02ac2-9126-41a9-8ddb-c8ab492d90480251700369109662118100.jpg&dcHint=IndiaCentral&fileToken=c8ba0579-377b-4fa1-950e-ed845c7c4678"); */
            background-image: url("{{ asset('images/WhatsApp Image 2023-12-07 at 1.14.57 PM.jpeg') }}");
            background-repeat: no-repeat;
            background-size: 100% 100%;
            background-position: center;
            margin: 0;
            padding: 0;
            height: 100vh;

            background-attachment: fixed;
            font-family: Montserrat, sans-serif;

        }

        /* Dark Gold Background */
        body {}

        /* Text Color */
        code {
            color: #FFFFFF;
            /* or #CCCCCC for a lighter gray */
        }





        a {
            display: inline-block;
            background-color: #000000;
            margin: 5px;

            /* Adjust margin as needed */
            position: relative;
            padding: 5px;
 box-shadow: 0 0 10px 5px rgba(0, 0, 0, 0.4);
            color: #CCCCCC;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 4px;
            font: 100 30px consolas;
            overflow: hidden;
   background-color: rgb(0, 0, 0); 
        }

     

        iframe {
            width: 100%;
            height: 491px;
        }


        td {
            border: 2px solid rgb(9, 175, 244);
            font-family: Montserrat, sans-serif;
            font-size: 1.2rem;
        }
        th {
            border: 2px solid rgb(9, 175, 244);
            font-family: Montserrat, sans-serif;
            font-size: 1.5rem;
        }

        .number-container {
            background-color: #000000;
            /* Darker container background color */
            padding: 10px;
            border-radius: 10px;
          
            /* Box shadow for a subtle lift */
            font-size: 1.5em;
            /* Adjust the font size as needed */
            color: white;
            margin-bottom: 15px;

        }

        .shadow-dark {
            color: white;
            border: 1px solid rgb(9, 175, 244);
            box-shadow: 0 0 5px  rgb(2, 213, 255);
        }

        /* .text {
            background-color: #333333;
            /* font-size: 2em; */
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 2em;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            color: white;
        /* } */ */
        body {
    background-color: #c4c4c4;
  
}
.fm {
    text-align: center;
    font-family: Montserrat, sans-serif;
}
.text {
    background-color: #333333;
    /* padding: 8px;
    padding-left: 4px;
    padding-right: 4px; */
    margin: 5px;
    border-radius: 20px;
    /* border: 1px solid rgb(9, 175, 244); */
    font-family: Montserrat, sans-serif;
    position: relative;
    margin-bottom: 0.75rem;
    font-size: 1rem;
    font-weight: 700;
    text-transform: capitalize;
    letter-spacing: 1.5px;
    line-height: 1.3;
    display: inline-block;
    z-index: 0;

}
.texts{
    /* box-shadow: 0 0 20px  #4b4663; */
    font-family: Montserrat, sans-serif;
    color: goldenrod;
    margin-bottom: 0.75rem;
    /* font-size: 1.5rem; */
    /* font-weight: 500; */
    text-transform: capitalize;
    /* letter-spacing: 1.5px; */
    /* line-height: 1.3; */
    /* display: inline-block; */
    /* color: #1e1e1e; */
    margin: 0;
    padding: 0px 0px 30px 0px;
    font-size: 26px;
    text-align: justify;
    font-family: Montserrat, sans-serif;
    font-weight: 700;
    /* background-color: #4b4663; */
    
}


        .heading-t{
            background-color: #525173;;
            opacity: 0.8;
            border-bottom: 2px solid rgb(9, 175, 244);
            
        }
        .heading {
            background-color: #1a1a1a;
            opacity: 0.9;
            border-bottom: 2px solid rgb(9, 175, 244);
        }

        body {
        overflow: hidden; /* Hide scroll bars caused by the video */
        margin: 0; /* Remove default margin */
    }

    #video-background {
        position: fixed;
        top: 0;
        left: 0;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        z-index: -1; /* Place the video behind other elements */
    }
    </style>
</head>

<body>
    <video id="video-background" autoplay muted loop>
        <!-- Update the source with the correct path to your video -->
        <source src="/stock-footage-zodiac-horoscope-astrological-sun-signs-on-a-spinning-wheel-or-chakra-seamless-looping-animated.webm" type="video/webm">
        <!-- Add more source elements for different video formats if needed -->
        Your browser does not support the video tag.
    </video>

    <div class="heading-t p-4">

        <div class="container text-center">
            <span class="texts p-3">Your Lucky Number Prediction Slip Will be Eligible For Lucky Draw</span>
        </div>
        <div class="table-responsive">

        </div>
    </div>

    <div class="container">
        <div class="shadow-lg pt-0 mt-5">

            <div class="d-md-flex justify-content-between fm">
                <div class="number-container shadow-dark">
                    <span id="currentTime" style="text-align: center">Time:</span>
                </div>
                <div class="number-container shadow-dark">
                    <span>Date : 6/12/2023</span>
                </div>
                <div class="number-container shadow-dark">
                    <span id="currentTime">Next Draw : 08:40:PM</span>
                </div>
            </div>

          

            <div class="heading py-4 mb-5 shadow-dark">
                <div class="container text-center">
                    <span class="text shadow-lg p-3">Today Lucky Draw</span>
                </div>
                <div class="table-container table-responsive">
                    <table class="table text-center  border-dark">
                        <thead class="table-dark">
                            <tr>
                                <th></th>
                                @for ($i = 10; $i <= 61; $i++)
                                    <th style="padding: 5px;">
                                        {{ $i }}:{{ $i }}
                                    </th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="background-color: black; color:white; font-size:1.5rem;">60</td>
                                @for ($i = 10; $i <= 61; $i++)
                                 
                                
                                    <td>{{ $i }}</td>
                                @endfor
                            </tr>
                            <tr>
                                <td style="background-color: black; color:white;font-size:1.5rem;">70</td>
                                @for ($i = 10; $i <= 61; $i++)
                              
                                    <td style="">{{ $i }}</td>

                                @endfor
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="shadow-dark">
                <iframe src="https://g2.ipcamlive.com/player/player.php?alias=5e5a05863bb0b" allowfullscreen></iframe>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        function updateDateTime() {
            var currentTime = new Date();
            document.getElementById('currentTime').innerText = ' Time : ' + currentTime.toLocaleTimeString();
        }

        setInterval(updateDateTime, 1000);
        updateDateTime();
    </script>
</body>

</html>
