<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Job apply Page" />
  <meta name="keywords" content="HTML5, Job Applcation" />
  <meta name="author" content="Student"  />
  <link href="styles/styles.css" rel="stylesheet" />
  <script src="scripts/apply.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <title>ApplyJobs@Profound Technologies</title>

</head>

<body>
  <div class="homesite">
  <header>
    <div id="applypage">
    <h1>Apply For Job</h1>
    <h2>֎Skype Interview Avialable!</h2>
  </div>
  <?php $var = 4;
  include_once "header.inc";
  ?>

  </header>
<div class="pagecontent">
   <form id="applyform" method="post" action="processEOI.php" novalidate="novalidate">
   	<!--Form data -->

   	<p><label for="jnumber">Job reference number</label>
   		<input type="text" name= "jnumber" id="jnumber" required="required"  />
   	</p>


    <p><label for="fname">First Name</label>
      <input type="text" name= "fname" id="fname" required="required"/>
    </p>


    <p><label for="lname">Last Name</label>
      <input type="text" name= "lname" id="lname" required="required"/>
    </p>


    <p><label for="dob">Date of birth</label>
      <input type="text" name= "dob" id="dob" placeholder="dd/mm/yyyy" required="required" /><span id="error-date"></span>

    </p>


<div id="buttons">
   <fieldset>
<legend>Gender</legend>
<p><label for="male">Male</label>
				<input type="radio" id="male" name="gender" value="male" required="required" checked="checked"/>
				<label for="female">Female</label>
				<input type="radio" id="female" name="gender" value="female" required="required" />

			</p>

   </fieldset>


     <p><label for="address">Street Address</label>
      <input type="text" name= "address" id="address"  required="required"/>
    </p>

    <p><label for="town">Suburb/Town</label>
	<input type="text" name= "town" id="town"  required="required"/>
    </p>

   		<p><label for="state">State</label>
			<select name="state" id="state" required="required">
				<option value="">Please select</option>
				<option value="2" id="vic">VIC</option>
				<option value="3" id="nsw">NSW</option>
				<option value="4" id="qld">QLD</option>
				<option value="5" id="nt">NT</option>
				<option value="6" id="wa">WA</option>
				<option value="7" id="sa">SA</option>
				<option value="8" id="tac">TAS</option>
				<option value="9" id="act">ACT</option>

<!--one state value necessary -->
</select> <span id="error-state"></span>
		</p>


   <p><label for="pcode">Post Code</label>
      <input type="text" name= "pcode" id="pcode"   required="required"/> <span id="error-code"></span>
    </p>


   <p><label for="email">Email Address</label>
      <input type="text" name= "email" id="email"   required="required"/>
    </p>


    <p><label for="pnumber">Phone Number</label>
      <input type="text" name= "pnumber" id="pnumber" required="required"/>
    </p>


   <fieldset>
   <legend>Skills</legend>

<p id=category><label for="ht">HTML</label>
				<input type="checkbox" id="html" name="html" value="html" />
				<label for="ph">PHP</label>
				<input type="checkbox" id="php" name="php" value="php" />
        <label for="os">Other Skills</label>
        <input type="checkbox" id="os" name="otherSkill" value="os" />
			</p>

      <p>Other Skills<br><textarea id="otherskillsarea" name="otherskillsarea" rows="5" cols="40">

    </textarea></p><span id="error-skill"></span>

   </fieldset>
<!-- align center -->
<p>	<input type= "submit" value="Apply" /> <input id="resetbutton" type= "reset" value="Reset Form" /><span id="error-msg"></span></p>
</div>
  </form>
  </div>
</div>
 <?php
 include_once "footer.inc";
 ?>
</body>

</html>
