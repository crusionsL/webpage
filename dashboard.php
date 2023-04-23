<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<style>
		body {
			background-color: blue;
			background-image: linear-gradient(purple, blue);
			display: flex;
			justify-content: center;
			align-items: center;
			height: 100vh;
			margin: 0;
			color: white;
			font-family: Arial, sans-serif;
		}

		h1 {
			margin-top: 0;
			text-align: center;
		}

		table {
			border-collapse: collapse;
			width: 80%;
			margin: auto;
			background-color: white;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
		}

		th, td {
			padding: 10px;
			text-align: left;
			border-bottom: 1px solid #ddd;
		}

		tr:hover {
			background-color: #f5f5f5;
		}
	</style>
</head>
<body>
	<h1>All Users</h1>
	<table>
		<tr>
			<th>ID</th>
			<th>Username</th>
			<th>Email</th>
		</tr>
		<?php
			// Connect to database
			$servername = "localhost";
			$username = "username";
			$password = "password";
			$dbname = "database";
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}

			// Query database for all users
			$sql = "SELECT id, username, email FROM users";
			$result = $conn->query($sql);

			// Output each user as a table row
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>" . $row["id"] . "</td><td>" . $row["username"] . "</td><td>" . $row["email"] . "</td></tr>";
				}
			} else {
				echo "<tr><td colspan