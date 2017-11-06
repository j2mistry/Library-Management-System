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
	$rid=$_POST['reader_id'];
	$docid=$_POST['document_id'];
	$cnum=$_POST['copy_num'];
	$sq="select status from copy where document_id='$docid' and copy_no='$cnum'";
	$res=mysqli_query($conn,$sq);
	if(mysqli_num_rows($res)>0){
	while($row = mysqli_fetch_assoc($res)) {
		 $status = $row['status']; 
		}
	}
	if($status=="available"){
	$sqll="select lib_id from document where document_id='$docid'";
	$resulta=mysqli_query($conn,$sqll);
	if (mysqli_num_rows($resulta) > 0) {
		while($row = mysqli_fetch_assoc($resulta)) {
		 $libid = $row['lib_id']; 
		}
	}
	$sqlc="select count(bor_number) as count from bor_transaction where reader_id='$rid'";
		$result=mysqli_query($conn,$sqlc);
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
		 $no = $row['count']; 
	}}
	if($no >= 10){
	?><h3 class="header red"><?php echo "Reader ".$rid." cannot isuue a new book. Readers are only authorised to borrow 10 documents"; ?></h3>
	<?php
	}
	else{
	$startdate=date("y/m/d");
	$enddate=date("y/m/d",strtotime($startdate.'+20 days'));
	$sqlcopy="update copy set status='borrowed' where document_id='$docid' and copy_no='$cnum'";
	if (mysqli_query($conn, $sqlcopy)) {
			?>
	<h3 class="header"><?php echo "Table : copy updated ->updated successfully"; ?></h3>
	<?php } else { ?>
	<p><?php echo "Error: " . $sqlcopy . "<br>" . mysqli_error($conn); ?></p>
	<?php }

	$sqla="insert into bor_transaction(reader_id,document_id,lib_id,bor_date_time,due_date,copy_num) values('$rid','$docid','cs8','$startdate','$enddate','$cnum')";
	if (mysqli_query($conn, $sqla)) {
	echo "Table : bor_transaction -> New record created successfully";
	} else {
	echo "Error: " . $sqla . "<br>" . mysqli_error($conn);
	}
	echo $startdate;
	echo $enddate;
	}
	}
	else {
	?> <h5 class="header"><?php echo "This Book Copy is not availlable: other available copies are"; ?> </h5>
	<?php
	$s="select copy_no from copy where document_id='$docid' and status='available' ";
	$resu=mysqli_query($conn,$s);
	$url="reserve_book.php?num='$cnum'&did='$docid'";
	?>
	<table>
	<thead>
	<tr>
		<th>copy numbers</th>
		<th>Document ID</th>
		<th>Status</th>
		</tr>
	</thead>
	<tbody>
			<tr>
				<td><?php if (mysqli_num_rows($resu) > 0) {
									while($row = mysqli_fetch_assoc($resu)){ 
									echo $row['copy_no'].","; }
	}?></td>
	<td><?php echo $docid; ?></td>
				<td>Available</td>
				</tr>
	</tbody>
	</table>
	<h5>Reserve Book : Click Reserve</h5>
	 <form action="reserve_book.php" method="GET">
	<?php } ?>
		<div class="input-field col s2">
          <input value="<?php echo $docid; ?>" type="text" class="validate" name="did">
     
        </div>
		<div class="input-field col s2">
          <input value="<?php echo $cnum ?>" id="disabled" type="text" class="validate" name="num">
       
        </div>
				<button class="btn waves-effect blue-grey darken-2" name="add" id="add" type="submit" value="submit">Reserve<i class="material-icons right">send</i>
				</button>
			</div>
	</form>
	
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
		
	</body>
	</html>