<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flash Deals - Durjatra</title>
    <link rel="stylesheet" href="styles.css">
    <style>

    </style>
</head>
<body>
    <header>
        <h1><img src="durjatra_logo.png" alt="Durjatra logo" width="170" height="40"></h1>
        <button class="logout-btn"><a href=../index.php>Logout</a></button>
    <nav>
        <ul class="navbar">
            <li><a href="train.php"><img src="train_icon.png" alt="Train"> Train</a></li>
            <li><a href="bus.php"><img src="bus_icon.png" alt="Bus"> Bus</a></li>
            <li><a href="air.php"><img src="plane_icon.png" alt="Air"> Air</a></li>
            <li><a href="ship.php"><img src="ship_icon.png" alt="Ship"> Ship</a></li>
            <li><a href="stylesheet.php"><img src="thunder.png" alt="flashdeals"> <b>Offers</b></a></li>
        </ul>
    </nav>

    </header>
        <div class="flash-deals-container">
            <h1>Flash Deals</h1>
    <main>
        <?php
        // Database connection details
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "flashdeals";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        // SQL query to fetch data from the database
        $sql = "SELECT * FROM flashdetails";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {

             
        
        // Convert BLOB data to base64 encoding for image display
        $imageData = base64_encode($row["image"]);
        $imageSrc = 'data:image/jpeg;base64,' . $imageData;
        echo '<div class="flash-deal" id="flash-deal-'.'">';
        echo '<img src="' . $imageSrc . '" alt="' . $row["flashTitle"] . '">';
        echo '<div class="deal-info">';
        echo '<h2>' . $row["flashTitle"] . '</h2>';
        echo '<p>Offer valid for: ' . $row["days"] . ' days</p>';
        echo '<p class="original-price">Price <del>' . $row["price"] . '</del></p>';
        echo '<p class="discounted-price">Offer price ' . $row["price02"] . '</p>';
        echo '</div></div>';

                /*
                echo '<div class="flash-deal" id="flash-deal-' . $row["id"] . '">
                <img src="' . $row["image"] . '" alt="' . $row["flashTitle"] . '">
                <div class="deal-info">
                <h2>' . $row["flashTitle"] . '</h2>
               <p>Offer valid for: ' . $row["days"] . ' days</p>
                <p class="original-price"><del>' . $row["price"] . '</del></p>
                <p class="discounted-price">' . $row["price02"] . '</p>
                </div></div>';*/
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
        
    </main>

    <footer>
        <p>&copy; 2024 Durjatra. All rights reserved.</p>
    </footer>

</body>
</html>
