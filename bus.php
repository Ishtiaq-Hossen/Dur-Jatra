<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Durjatra</title>
    <link rel="stylesheet" href="styles/bus.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
    <link rel="icon" type="logo.png" href="img/logo/logo.png">
</head>

<body>
    <header style="background-image: url('img/bus_bg.jpg'); background-size: cover; background-position: center ">
        <div class="nav-container">
            <nav>
                <ul>
                    <li><a href="index.html"><img src="img/logo/nav_logo/home.png" alt="Logo"> Home</a></li>
                    <li><a href="bus.html"><img src="img/logo/nav_logo/bus.png" alt="Logo"> Bus</a></li>
                    <li><a href="air.html"><img src="img/logo/nav_logo/air.png" alt="Logo"> Air</a></li>
                    <li><a href="trains.html"><img src="img/logo/nav_logo/train.png" alt="Logo"> Trains</a></li>
                    <li><a href="offer.html"><img src="img/logo/nav_logo/offer.png" alt="Logo"> Offer & Promotion</a></li>
                    <li><a href="contact_us.html"><img src="img/logo/nav_logo/contact.png" alt="Logo"> Contact Us</a></li>
                </ul>
            </nav>
        </div>
        <div class="header-content">
            <img src="img/logo/logo_white.png" alt="">
        </div>
        <div class="header-text">
            <h1>Explore New Places with Durjatra</h1>
            <p>Find the perfect bus ticket for your next adventure</p>
        </div>
    </header>
    
    <main>
    <h2 style="text-align: center;">Search for Bus Tickets </h2>
        <section id="search-bar">
                           
            <form id="search-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                <label for="from"></label>
                <input type="text" id="from" name="from" placeholder="Enter Departure City"> <br>
                <label for="to"></label>
                <input type="text" id="to" name="to" placeholder="Enter Arrival City"> <br>
                <label for="date"></label>
                <input type="date" id="date" name="date"> <br>
                <button type="submit">Search</button>
            </form>
        </section>


        <!-- php code -->
        <section id="search-results">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Handle form submission

                // Retrieve form data
                $fromCity = $_POST['from'];
                $toCity = $_POST['to'];
                $travelDate = $_POST['date'];

                echo "<h2>Search Results</h2>\n";
                $searchResults = "<p>Searching for buses from $fromCity to $toCity on $travelDate</p>";

                // Output the search results
                echo $searchResults;
            }
            ?>
        </section>

    </main>

    <footer>
        <p>Copyright © 2024 Durjatra. All rights reserved.</p>
    </footer>
</body>

</html>
