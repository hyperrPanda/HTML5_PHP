<!DOCTYPE html>
<!-- Below are the Contents for About Page -->
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Demonstrates Home Page Content" />
  <meta name="keywords" content="Home, index" />
  <meta name="author" content="Student"  />
 <link href="styles/styles.css" rel="stylesheet" />
  <title>About Us@Profound Technologies</title>

</head>
<body>
  <div class="homesite">
   <header>
     <h1 id="aboutheader">About Us</h1>
     <?php $var = 3;
     include_once "header.inc";
     ?>

   </header>
<div class="pagecontent">
   <article>
   <h2>Our Team is Happy to help y☺u Anytime!!</h2>
   <dl>
<dt>Name</dt>
<dd>Rahul Sinha</dd>
<dt>Student id</dt>
<dd>102019464</dd>
<dt>Tutor Name</dt>
<dd>Mr. Guangming Cui</dd>
<dt>Course Name</dt>
<dd>Master of IT</dd>
</dl>
<p><img id="devphoto" src="images/myimage.jpg" alt="Student Photo" /></p>
<br>
<hr>
<div class="timetable">
  <!-- week timetable for assignment 1-->

  <table >
    <caption>Timetable</caption>
    <tr>
      <th></th>
      <th scope="col">Monday</th>
      <th scope="col">Tuesday</th>
      <th scope="col">Wednesday</th>
      <th scope="col">Thursday</th>
      <th scope="col">Friday</th>
    </tr>
    <tr>
      <td>9:00 AM TO 10:00 AM</td>
      <td >COS6000T</td>
      <td></td>
      <td></td>
      <td></td>
      <td >BI877723</td>
    </tr>
    <tr>
      <td>10:00 AM TO 11:00 AM</td>
      <td >JHE33TY</td>
      <td></td>
      <td >COS6000T LAB</td>
      <td></td>
      <td></td>
    </tr>

    <tr>
      <td>11:00 AM TO 12:00 PM</td>
      <td></td>
      <td></td>
      <td></td>
      <td >SQT789</td>
      <td></td>
    </tr>

    <tr>
      <td>12:00 PM TO 1:00 PM</td>
      <td >TY65554</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>

    <tr>
      <td>1:00 PM TO 2:00 PM</td>
      <td></td>
      <td></td>
      <td></td>
      <td>ITY345 Lecture</td>
      <td></td>
    </tr>

    <tr>
      <td>2:00 PM TO 3:00 PM</td>
      <td></td>
      <td></td>
      <td></td>
      <td >GTYU34 WORKSHOP</td>
      <td>IT meet</td>
    </tr>

    <tr>
      <td>3:00 PM TO 4:00 PM</td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td>BI877723 Workshop</td>
    </tr>

    <tr>
      <td>4:00 PM TO 5:00 PM</td>
      <td></td>
      <td >BI877723 LAB</td>
      <td></td>
      <td >SQT789 LAB</td>
      <td></td>
    </tr>

  </table>




</div>
<p id="maillink"><a href="mailto:102019464@student.swin.edu.au">Mail Us</a></p>
      <hr />
   </article>
 </div>
 </div>

 </div>
 <?php
 include_once "footer.inc";
 ?>
</body>

</html>
