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

	  <div class="row">
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
$bid=$_GET['branch_id'];
$sqlz="Select lib_id,name from branch where no='$bid'";
$result=mysqli_query($conn,$sqlz);
if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
         $libid = $row['lib_id'];
$name=$row['name'];		 
		}
}	
echo $libid;

$sqlb="select distinct d.document_id,d.title,d.num_copy,a.author_name,b.isbm from document d,writes w, author a,book b where d.lib_id='$libid' and d.type='Book' and d.document_id=w.document_id and w.author_id=a.author_id and b.document_id=d.document_id";
$resultb=mysqli_query($conn,$sqlb);

$sqlc="select distinct d.document_id,d.title,p.cspeaker,p.cdate,p.clocation from document d,proceedings p where d.lib_id='$libid' and d.type='Proceeding' and d.document_id=p.document_id";
$resultc=mysqli_query($conn,$sqlc);
?>
	  <h3 class="header"> <?php echo $name; ?></h3>
<div class="card blue-grey darken-1">
<div class="card-content white-text">
<span class="card-title">Books</span>
<table>
<thead>
<tr>
		<th>Document ID</th>
		<th>Title</th>
		<th>No of copies</th>
		<th>Author Name</th>
		<th>ISBN</th>
		</tr>
</thead>
<tbody>
<?php
if (mysqli_num_rows($resultb) > 0) {
		while($row = mysqli_fetch_assoc($resultb)) {
			?>
			<tr>
				<td><?php echo $row['document_id']; ?></td>
				<td><?php echo $row['title']; ?></td>
				<td><?php echo $row['num_copy']; ?></td>
				<td><?php echo $row['author_name']; ?></td>
				<td><?php echo $row['isbm']; ?></td>
				</tr>
<?php
		}
}
?>
</tbody>
</table>
</div>
</div>

<div class="card blue-grey darken-1">
<div class="card-content white-text">
<span class="card-title">Conference</span>
<table>
<thead>
<tr>
		<th>Document ID</th>
		<th>Title</th>
		<th>Speaker</th>
		<th>Date</th>
		<th>Location</th>
		</tr>
</thead>
<tbody>
<?php
if (mysqli_num_rows($resultc) > 0) {
		while($rowc = mysqli_fetch_assoc($resultc)) {
			?>
			<tr>
				<td><?php echo $rowc['document_id']; ?></td>
				<td><?php echo $rowc['title']; ?></td>
				<td><?php echo $rowc['cspeaker']; ?></td>
				<td><?php echo $rowc['cdate']; ?></td>
				<td><?php echo $rowc['clocation']; ?></td>
				</tr>
<?php
		}
}
?>
</tbody>
</table>
</div>
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
	</body>
	</html>

	