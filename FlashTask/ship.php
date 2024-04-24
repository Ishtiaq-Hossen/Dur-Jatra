<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flash Deals - Durjatra</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        
        .flash-deal02{
    margin: 20px;
    border: 1px solid red;
    border-radius: 10px; 
    overflow: hidden;
    width: 70%; 
    max-width: 900px; 
    box-shadow: 0 0 15px rgba(0, 0, 0, 0.3); 
}
.flash-deal02 img {
    width: 100%;
    height: 200px;
    display: block;
}
        .container {
            display: flex;
            justify-content: center;
            align-items: start;
            height: 50vh;
        }

        /* Form styling */
        .form {
            width: 500px;
            background-color: #f4f4f4;
            padding: 5px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form h2 {
            text-align: center;
        }

        .form-row {
            margin-bottom: 15px;
        }

        .form-row label {
            display: block;
            font-weight: bold;
        }

        .form-row input[type="text"] {
            width: 95%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-row button {
            width: 95%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-row button:hover {
            background-color: #0056b3;
        }
    </style>
    </style>
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
            <li><a href="air.php"><img src="plane_icon.png" alt="Air"> Air </a></li>
            <li><a href="ship.php"><img src="ship_icon.png" alt="Ship"><b> Ship</b></a></li>
            <li><a href="stylesheet.php"><img src="thunder.png" alt="flashdeals"> Offers</a></li>
        </ul>
    </nav>
    </header>

    <div class="container">
        <div class="form">
            <h2>Ticket Booking</h2>
            <form class="form" action="search_tickets.php" method="GET">
                <div class="form-row">
                    <label for="from">From:</label>
                    <input type="text" id="from" name="from" required>
                </div>
                <div class="form-row">
                    <label for="to">To:</label>
                    <input type="text" id="to" name="to" required>
                </div>
                <div class="form-row">
                    <button type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>

    <center>
        



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
$sql = "SELECT * FROM ship";
$result = $conn->query($sql);
$numRows = $result->num_rows;
if ($result->num_rows > 0) {
    echo '<h2> Total Ticket available: ' . $numRows . '</h2>';
    // Output data of each row
    while($row = $result->fetch_assoc()) {

        // Convert BLOB data to base64 encoding for image display
        $imageData = base64_encode($row["image"]);
        $imageSrc = 'data:image/jpeg;base64,' . $imageData;

        echo '<div class="flash-deal02" id="flash-deal-1">
            <img src="' . $imageSrc . '" alt="Train Ticket">
            <div class="deal-info">
                <h2>'.$row["fr_om"].' to '.$row["t_o"].'</h2>
                <p>Train Name: '.$row["shipName"].'</p>
                <p class="discounted-price">Price ৳'.$row["price"].'</p>
                <button class="bookNow">Book Now</button>
            </div>
        </div>';

    }
} else {
    echo "0 results";
}
$conn->close();
?>


        
        

    </center>
    <footer>
        <p>&copy; 2024 Durjatra. All rights reserved.</p>
    </footer>



</body>
</html>