<!doctype html>
<?php 
function connect_to_db()
{
	$servername = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "users";
	
	// Create a new mysqli instance
	$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);
	
	// Check connection
	if ($conn->connect_error)
		die("Connection failed: " . $conn->connect_error);
		
	return $conn;
}

?>

<html lang="en">
  <head>

  	<title>Sign In Page</title>
    
	<link rel="stylesheet" href="style.css">
	
	</head>
	<body>
	<header>
    <h1><img src="img/durjatra_logo.png" alt="Durjatra logo" width="170" height="40"></h1>
</header>
	
			<form action="#" method="POST" class="signin-form" >
			<h1 >Sign In to Durjatra</h1>
			    <div>
			      	<label class="label" for="name">Username</label>
			      	<input type="text" class="user-name" name="TFusername" placeholder="Username" required>
			    </div>
				<div>
					<label for="password">Password</label>
					<input type="password" class="password" name="TFpassword" placeholder="Password" required>
				</div>

				<div >
					<button type="submit" class ="btn" target="_self">Sign In</button>
				</div>
		    	<div >
				<div >
					<label >Remember Me
					<input class="checkbox" type="checkbox" checked>
					</label>
				</div>
				<div>
					<a href="#">Forgot Password</a>
				</div>
				</div>

						<?php
								if (isset($_POST['TFusername']))
								{
									if (isset($_POST['TFpassword']))
									{
										// start checking here, and move to webpage
										$username = $_POST['TFusername'];
										$userpw = $_POST['TFpassword'];

										$conn = connect_to_db();
							
										$stmt = $conn->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
										$stmt->bind_param("ss", $username, $userpw);
										$stmt->execute();  // execute the query
										$result = $stmt->get_result();   // get results and store into $result

										if ($result->num_rows > 0)   // a valid result returns only if username and password both match
										{
											/*
											// User account found, get usertype
											$row = $result->fetch_assoc();   
											
											switch ($row['usertype'])   // password matches
											{
												/// NOTE: THE DATABASE'S LOGIN TABLE HAS A CONSTRAINT (chk_usertype) THAT ENSURES A USER MUST BE ONLY ONE OF THE FOUR TYPES BELOW.
												case "Admin": 
													echo "<script> window.location.href = \"./HTML/adminDash/examples/dashboard.html\"; </script>";
													break;
												case "Customer":
													echo "<script> window.location.href = \"./HTML/Customer Dashboard/examples/dashboard.html\"; </script>";
													break;
												case "RelManager":
													echo "<script> window.location.href = \"./HTML/RelationShipManager/examples/dashboard.html\"; </script>";
													break;
												case "Head":
													echo "<script> window.location.href = \"./HTML/HedOfSettlement/examples/dashboard.html\"; </script>";
													break;
											}
											*/
											echo "<script> window.location.href = \"Flashtask/stylesheet.php\"; </script>";
													
										}
										else
											echo "<script> alert(\"Enter a valid password!\");</script>";
									}
									else
									{
										echo "<script> alert(\"Enter a valid password!\");</script>";
									}
								}
							?>
							 <p>Not a member? <a data-toggle="tab" href="signup.php">Sign Up</a></p>
		          </form>
		         
	

	</body>
</html>

