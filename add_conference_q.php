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

	$cname=$_POST['cspeaker'];
	$clocation=$_POST['clocation'];
	$cdate=$_POST['cdate'];
	$docid=$_POST['document_id'];
	$title=$_POST['doc_title'];
	$copies="0";
	$pubid="xxxxx";
	$pubdate=$_POST['publication_date'];
	$dept=$_POST['branch_id'];
	$position=$_POST['position'];
	$type="Proceeding";
	$branchno=$_POST['branch_id'];
	
		$sqlz="Select lib_id from branch where no='$branchno'";
$result=mysqli_query($conn,$sqlz);
if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
         $libid = $row['lib_id']; 
		}
}	

$sql="INSERT INTO document (num_copy,document_id,title,publisher_id,publication_date,type,lib_id) Values('$copies','$docid','$title','$pubid','$pubdate','$type','$libid')";
if (mysqli_query($conn, $sql)) {
    echo "Table : document ->New record created successfully"."<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<br>";
}

	$sqla="INSERT INTO proceedings (cdate,clocation,cspeaker,document_id) Values('$cdate','$clocation','$cname','$docid')";
if (mysqli_query($conn, $sqla)) {
    echo "Table : proceedings ->New record created successfully"."<br>";
} else {
    echo "Error: " . $sqla . "<br>" . mysqli_error($conn)."<br>";
}
	

?>