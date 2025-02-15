<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dress-Code</title>
    <link href="style.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="static/css/chat.css">
    <link rel="stylesheet" href="static/css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Include Chart.js -->
    <style>
        html, body {
            height: 100%; /* Ensure the body takes full height */
            margin: 0; /* Remove default margin */
        }

        body {
            position: relative; /* Enable positioning for the pseudo-element */
            overflow: hidden; /* Prevent scrolling if the pseudo-element extends beyond the viewport */
        }

        body::before {
            content: ""; /* Necessary for the pseudo-element to render */
            position: absolute; /* Position it absolutely */
            top: 0; /* Align to the top */
            left: 0; /* Align to the left */
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            background-image: url('fit Photos/kb.jpg'); /* Use the background image */
            background-size: cover; /* Cover the entire viewport */
            background-position: center; /* Center the image */
            background-repeat: no-repeat; /* Prevent image from repeating */
            opacity: 0.5; /* Adjust the opacity here (0.0 to 1.0) */
            z-index: -1; /* Send it behind the content */
        }

        body {
            font-family: 'Poppins', sans-serif; /* Set the font */
            color: white; /* Set text color */
        }

        /* Styles for background text */
        .background-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            z-index: 1; /* Ensure it's above the background */
            color: white; /* Text color */
        }

        .background-text h1 {
            font-size: 5rem; /* Increased size */
            margin: 0;
        }

        .background-text p {
            font-size: 1.2rem; /* Decreased size */
            margin: 10px 0;
        }

        /* Home Button Styles */
.home-button {
    position: fixed; /* Change to fixed positioning */
    bottom: 20px; /* Position from the bottom */
    left: 20px; /* Position from the left */
    padding: 10px 20px; /* Padding for the button */
    border: 2px solid white; /* White border */
    background-color: transparent; /* Transparent background */
    color: white; /* Text color */
    font-size: 1.2rem; /* Font size */
    cursor: pointer; /* Change cursor on hover */
    transition: background-color 0.3s ease; /* Smooth transition for background */
}

.home-button:hover, .home-button:focus {
    background-color: blue; /* Change to blue on hover */
    outline: none; /* Remove outline */
}

.home-button:active {
    background-color: darkblue; /* Darker blue when clicked */
}


    </style>
</head>

<body>

    <!-- Background Text -->
    <div class="background-text">
        <h1>FIT-BOT</h1>
        <p>Our fitness web application helps users track workouts, set goals, and stay motivated on their journey to better health.</p>
    </div>

    

    <!-- CHAT BAR BLOCK -->
    <div class="chat-bar-collapsible">
        <button id="chat-button" type="button" class="collapsible">Chat with Fit-Bot!
            <i id="chat-icon" style="color: #fff;" class="fa fa-fw fa-comments-o"></i>
            <img src="fit Photos/smiley3.png" alt="image" class="small-icon">
        </button>

        <div class="content">
            <div class="full-chat-block">
                <div class="outer-container">
                    <div class="chat-container">
                        <div id="chatbox">
                            <h5 id="chat-timestamp"></h5>
                            <p id="botStarterMessage" class="botText"><span>Loading...</span></p>
                        </div>

                        <div class="chat-bar-input-block">
                            <div id="userInput">
                                <input id="textInput" class="input-box" type="text" name="msg"
                                    placeholder="Tap 'Enter' to send a message">
                                <p></p>
                            </div>

                            <div class="chat-bar-icons">
                                <i id="chat-icon" style="color: crimson;" class="fa fa-fw fa-heart"
                                    onclick="heartButton()"></i>
                                <i id="chat-icon" style="color: #333;" class="fa fa-fw fa-send"
                                    onclick="sendButton()"></i>
                            </div>
                        </div>

                        <div id="chat-bar-bottom">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Output div -->
    <div id="output"></div>

    <!-- Chart Container -->
    <canvas id="myChart" style="display: none;"></canvas>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="static/scripts/responses.js"></script>
    <script src="static/scripts/chat.js"></script>

</body>

</html>
