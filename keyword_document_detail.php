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

$keyword=$_GET['keyword'];
$sql="select distinct d.document_id,b.name,dd.title,a.author_name from descriptor d,branch b,document dd,author a,writes w where d.descriptor='$keyword' and dd.document_id=d.document_id and dd.lib_id=b.lib_id and dd.document_id=w.document_id and w.author_id=a.author_id";
$result=mysqli_query($conn,$sql);
?>
<h3 class="header"> Book Details</h3>
<div class="card blue-grey darken-1">
<div class="card-content white-text">
<span class="card-title">Books</span>
<table>
<thead>
<tr>
		<th>Document ID</th>
		<th>Branch</th>
		<th>Title</th>
		<th>Author</th>
		</tr>
</thead>
<tbody>
<?php
if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			?>
			<tr>
				<td><?php echo $row['document_id']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['title']; ?></td>
				<td><?php echo $row['author_name']; ?></td>
			
				</tr>
<?php
		}
}
?>
</tbody>
</table>
</div>
</div>

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
