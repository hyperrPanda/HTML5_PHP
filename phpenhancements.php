<?PHP


$sortit=trim($_POST["sortit"]);

if($sortit!==""){

  $query="SELECT * FROM EOI ORDER BY $sortit";
  echo "<p>Hello Manager, Below Records Sorted By $sortit>>></p>";}
  $sortit="";


  require_once "settings.php";	// Load MySQL log in credentials
	$conn = mysqli_connect ($host,$user,$pwd,$sql_db);	// Log in and use database
	if ($conn) { // check is database is available for use

		$result = mysqli_query ($conn, $query);

		if ($result) {								// check if query was successfully executed

			$record = mysqli_fetch_assoc ($result);
			if ($record) {							// check if any record exists

				echo "<table border='1'>";
				echo "<tr><th>ID</th><th>Job Ref</th><th>First Name</th><th>Last Name</th><th>Gender</th><th>DOB</th><th>Address</th><th>State</th><th>Town</th><th>Postcode</th><th>PhoneNumber</th><th>Email</th><th>Skill1</th><th>Skill2</th><th>Skill3</th><th>Status</th><th></th></tr>";
				while ($record) {
					echo "<tr><td>{$record['id']}</td>";
					echo "<td>{$record['jobref']}</td>";
					echo "<td>{$record['fname']}</td>";
					echo "<td>{$record['lname']}</td>";
					echo "<td>{$record['gender']}</td>";
					echo "<td>{$record['dob']}</td>";

echo "<td>{$record['address']}</td>";
echo "<td>{$record['state']}</td>";
echo "<td>{$record['town']}</td>";
echo "<td>{$record['postcode']}</td>";
echo "<td>{$record['phonenumber']}</td>";
echo "<td>{$record['email']}</td>";



					echo "<td>{$record['skill1']}</td>";
					echo "<td>{$record['skill2']}</td>";
					echo "<td>{$record['skill3']}</td>";

					echo "<td>{$record['status']}</td>";
					echo "<td><a href='status.php?id=" . $record['id']
					            . "'>Change Status</a></td></tr>";
					$record = mysqli_fetch_assoc($result);
				}
				echo "</table>";
				mysqli_free_result ($result);	// Free up resources
			} else {
				echo "<p>No records retrieved.</p>";
			}
		} else {
			echo "<p>Job application table doesn't exist or select operation unsuccessful.</p>";
		}
		mysqli_close ($conn);					// Close the database connect
	} else {
		echo "<p>Unable to connect to the database.</p>";
	}

?>
