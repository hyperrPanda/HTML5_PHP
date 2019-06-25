<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8 " />
	<title>assignment 3</title>
	<!-- other meta here -->

</head>
<body>


<?php

function sanitiseit($data){
$data = trim($data," ");
$data = stripslashes($data );
$data  = htmlspecialchars($data );
return $data;
}



function checkstatepostcode($state,$pcode){
	$tmpflag = true;
$firstDigit = substr($pcode, 0, 1);





switch($state)
{
case "2":
if (!($firstDigit== 3 || $firstDigit== 8) ){$tmpflag= false; }
break;
case "3":
if (!($firstDigit== 1|| $firstDigit== 2) ){$tmpflag= false; }
break;
case "4":
if (!($firstDigit== 4 || $firstDigit== 9) ){$tmpflag= false; }
break;
case "5":
if (!($firstDigit== 0) ){$tmpflag= false; }
break;
case "6":
if (!($firstDigit== 6) ){$tmpflag= false; }
break;
case "7":
if (!($firstDigit== 5) ){$tmpflag= false; }
break;
case "8":
if (!($firstDigit== 7) ){$tmpflag= false; }
break;
case "9":
if (!($firstDigit== 0) ){$tmpflag= false; }
break;
default:
$tmpflag= true;
}
return $tmpflag;
}

function assignstatename($state)
{
$result = "";

switch($state)
{
case "2":
$result = "VIC";
break;
case "3":
$result = "NSW";
break;
case "4":
$result = "QLD";
break;
case "5":
$result = "NT";
break;
case "6":
$result = "WA";
break;
case "7":
$result = "SA";
break;
case "8":
$result = "TAS";
break;
case "9":
$result = "ACT";
break;
default:
$result= "";
}

	return $result;
}

	// validate form data, echo message
	if (!isset($_POST["jnumber"])) {
		header("location:apply.php");
		exit();
	}
	$err_msg = "";
	// get value.      validate and sanitise the values
	$jnumber= sanitiseit($_POST["jnumber"]);
	if (($jnumber=="") || (!preg_match("/^[A-Za-z0-9]{5}$/", $jnumber)))
		$err_msg .= "<p>Please enter correct Job Ref.</p>";

		$fname=sanitiseit($_POST["fname"]);
		if (($fname=="") || (!preg_match("/[A-Za-z0-9]{1,20}$/", $fname)))
			$err_msg .= "<p>Please enter correct first name.</p>";

		$lname=sanitiseit($_POST["lname"]);
		if (	($lname=="") || (!preg_match("/[A-Za-z0-9]{1,20}$/", $lname)))
			$err_msg .= "<p>Please enter correct last name.</p>";

			if (isset($_POST["gender"]))    // radio button
				$gender=$_POST["gender"];
			else
				$gender="";



			$address=sanitiseit($_POST["address"]);
			if (	($address=="") || (!preg_match("/[A-Za-z0-9]{1,40}$/", $address)))
				$err_msg .= "<p>Please correct Address.</p>";


				$email=trim($_POST["email"]);
				if (	($email=="") || (!preg_match("/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/", $email)))
					$err_msg .= "<p>Please enter correct email.</p>";


						$town=sanitiseit($_POST["town"]);
						if (	($town=="") || (!preg_match("/[A-Za-z0-9]{1,40}/", $town)))
							$err_msg .= "<p>Please enter correct town.</p>";

							$pnumber=sanitiseit($_POST["pnumber"]);
							if (	($pnumber=="") || (!preg_match("/[0-9 ]{8,12}/", $pnumber)))
								$err_msg .= "<p>Please enter correct phone number.</p>";


								$state=sanitiseit($_POST["state"]);
								if (	($state=="") )
									$err_msg .= "<p>Please select a state.</p>";

									$pcode=sanitiseit($_POST["pcode"]);
									if (	($pcode=="") || (!preg_match("/^[0-9]{4}$/", $pcode)))
									{
										$err_msg .= "<p>Please enter correct post code.</p>";
									}
									else{
										$flag = false;
										$flag=checkstatepostcode($state,$pcode);
										if(!$flag)
										$err_msg .= "<p>State and post code do not match.</p>";
									}



										$html="";
										$php="";
										$textvalue="";
										$os="";
										if (isset($_POST["html"]))
										$html = "HTML";

										if (isset($_POST["php"]))
										$php = "PHP";


										if (isset($_POST["otherSkill"]))    // check box
									{
										$os = $_POST["otherSkill"];
										$textvalue= trim($_POST ["otherskillsarea"]);
										if($textvalue=="")
												$err_msg .= "<p>Please enter text in other skill.</p>";
									}


									if( $html=="" && $php=="" && $os=="" )
									{
										$err_msg .= "<p>Please select one skill.</p>";

									}



									$dob=trim($_POST["dob"]);	// dob
									if (!preg_match("/^\d{2}\/\d{2}\/\d{4}$/", $dob)){
										$err_msg .= "<p>Please enter your date of birth follow the dd/mm/yyyy format.</p>";
									}
									else {
										$dob=explode("/", $dob);
										$dob=$dob[2] . "-" . $dob[1] . "-" . $dob[0];

										$dateDob = date_create($dob);
										$dateNow = date_create();
										$age = date_diff($dateDob, $dateNow);
										$age = date_interval_format($age, "%Y");

										if ($age<15 || $age>80)
											$err_msg .= "<p>You age is NOT between 15 and 80.</p>";

									}





		if ($err_msg!="")
		{
			echo $err_msg;
		}
		else {
		// connect to db, create table, insert record
		require_once "settings.php";	// Load MySQL log in credentials
		$conn = mysqli_connect ($host,$user,$pwd,$sql_db);	// Log in and use database

		if ($conn) { // check is database is available for use
			$query = "CREATE TABLE IF NOT EXISTS EOI (
						id INT AUTO_INCREMENT PRIMARY KEY,
						jobref VARCHAR(6),
						fname VARCHAR(25),
						lname VARCHAR(25),
						gender VARCHAR(10),
						dob DATE,
						state VARCHAR(50),
						address VARCHAR(50),
						email VARCHAR(50),
						town VARCHAR(50),
						postcode VARCHAR(50),
						phonenumber VARCHAR(50),
						skill1 VARCHAR(50),
						skill2 VARCHAR(50),
						skill3 VARCHAR(100),
						status VARCHAR(20),
						FOREIGN KEY (`jobref`) REFERENCES job_description (`jobref`)
						);";

			$result = mysqli_query ($conn, $query);
			if ($result) {								// check if query was successfully executed

					$statename = assignstatename($state);
				$query = "INSERT INTO EOI (jobref, fname, lname, gender, dob,state,address,email,town,postcode,phonenumber, skill1, skill2, skill3, status)
						VALUES ('$jnumber', '$fname','$lname', '$gender', '$dob', '$statename', '$address', '$email', '$town', '$pcode', '$pnumber', '$html', '$php', '$textvalue', 'new');";

				$insert_result = mysqli_query ($conn, $query);

				if ($insert_result) {			// check if insert successfully
					echo "<p>Congrats! Your EOI number is AGT6S100" . mysqli_insert_id($conn) . ".</p>";
				} else {
					echo "<p>Error occured.</p>";
				}
			} else {
				echo "<p>Create table operation unsuccessful.</p>";
			}
			mysqli_close ($conn);					// Close the database connect
		} else {
			echo "<p>Unable to connect to the database.</p>";
		}
		}
		?>


</body>
</html>
