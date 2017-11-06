
	<!DOCTYPE html>
	<html lang="en">
	<head>
	  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	  <title>Library</title>

	  <!-- CSS  -->
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
	  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
 
	</head>
	<body>
		<nav>
			<div class="nav-wrapper">
			  <a href="#!" class="brand-logo white-text">College Library</a>
			  <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
			  <ul class="right hide-on-med-and-down">
				<li><a class="white-text" href="document.php">Document</a></li>
				<li><a class="white-text" href="add_reader.php">Reader</a></li>
				<li><a class="white-text" href="borrow_document.php">Issue Document</a></li>
				<li><a class="white-text" href="return_book.php">Return Document</a></li>
			  </ul>
			  <ul class="side-nav" id="mobile-demo">
				<li><a href="document.php">Document</a></li>
				<li><a href="add_reader.php">Reader</a></li>
				<li><a href="borrow_document.php">Issue Document</a></li>
				<li><a href="return_book.php">Mobile</a></li>
			  </ul>
			</div>
		</nav>
<?php

			$hostname = "localhost";
			$username = "root";
			$password = "";
			$dbname = "library";
	
$conn = mysqli_connect($hostname, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
else{
	echo "connection OK";
}

$rid=$_GET['reader_id'];

$sql="SELECT * FROM reader WHERE reader_id='$rid'";
$result=mysqli_query($conn,$sql);
if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
         $rid = $row['reader_id']; 
		 $rname=$row['reader_name'];
		 $rnum=$row['ph_num'];
		 $raddress=$row['address'];
		 $rtype=$row['type'];
		 $rbrbook=$row['num_br_books'];
		 $rresbook=$row['num_res_books'];
		}
}
?>
<div class="card blue-grey darken-1">
<div class="card-content white-text">
<span class="card-title">Reader Details</span>
<table>
<thead>
		<tr>
		<th>Name</th>
		<th>Ph No</th>
		<th>Address</th>
		<th>Type</th>
		<th>Borrowed Books</th>
		<th>Reserved Books</th>
		</tr>
  </thead>
	<tbody> 
		<tr><td><?php echo $rname; ?></td>
		<td><?php echo $rnum; ?></td>
		<td><?php echo $raddress; ?></td>
		<td><?php echo $rtype; ?></td>
		<td><?php echo $rbrbook; ?></td>
		<td><?php echo $rresbook; ?></td></tr>
	</tbody>
</table>
</div>
</div>

<?php mysqli_close($conn); ?>

<div class="fixed-action-btn horizontal click-to-toggle">
    <a class="btn-floating btn-large red lighten-2">
      <i class="material-icons">menu</i>
    </a>
    <ul>
      <li><a class="btn-floating red lighten-2" href="document.php"><i class="material-icons">description</i></a></li>
      <li><a class="btn-floating blue-grey darken-1" href="add_reader.php"><i class="material-icons">android</i></a></li>
    </ul>
  </div>
  
<footer class="page-footer ">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="white-text text-lighten-1">“I declare after all there is no enjoyment like reading! How much sooner one tires of any thing than of a book! -- When I have a house of my own, I shall be miserable if I have not an excellent library.” 
― Jane Austen, Pride and Prejudice</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Developers</h5>
          <ul>
            <li><a class="white-text">Jay Mistry</a></li>
            <li><a class="white-text">Pratik Kharadi</a></li>
          </ul>
        </div>
		<div class="col l3 s12">
          <h5 class="white-text">Library Databse Systems</h5>
          <ul>
            <li><a class="white-text">CS 631 DMSD</a></li>
            <li><a class="white-text">Prof. Arwa Wali</a></li>
          </ul>
        </div>
    </div>
	</div>
    <div class="footer-copyright">
      <div class="container">
      What in the world would we do without our libraries?</a>
      </div>
    </div>
  </footer>
		<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	  <script src="js/materialize.js"></script>
	  <script src="js/init.js"></script>
		<script>
	  $('.datepicker').pickadate({
		selectMonths: true, 
		selectYears: 15 
	  });
	</script>
	  
	<script>
	  $(document).ready(function() {
		$('input#input_text, textarea#textarea1').characterCounter();
	  });
	   $(".button-collapse").sideNav();
	   
	   $(document).ready(function() {
		$('select').material_select();
	  });
	</script>
</body>
</html>