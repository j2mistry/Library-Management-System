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
	$issueno=$_POST['issue_no'];
	$volumeno=$_POST['volume_no'];
	$docid=$_POST['document_id'];
	$scope=$_POST['scope'];
	$ename=$_POST['editor_name'];
	$eid=$_POST['editor_id'];
	$title=$_POST['doc_title'];
	$copies=$_POST['num_copies'];
	$pubid=$_POST['publisher_id'];
	$pubdate=$_POST['publication_date'];
	$dept=$_POST['branch_id'];
	$position=$_POST['position'];
	$type="Journal";
	$branchno=$_POST['branch_id'];
	$address="NJIT, 323 martin luther king blvd., Newark";
	$sqlz="Select lib_id from branch where no='$branchno'";
$result=mysqli_query($conn,$sqlz);
if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
         $libid = $row['lib_id']; 
		}
}		

$sql="INSERT INTO document (num_copy,document_id,title,publisher_id,publication_date,type,lib_id) Values('$copies','$docid','$title','$pubid','$pubdate','$type','cs8')";
if (mysqli_query($conn, $sql)) {
    echo "Table : document ->New record created successfully"."<br>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn)."<br>";
}

$sqla="INSERT INTO journal_volume(document_id,volume_no,editor_id) Values('$docid','$volumeno','$eid')";
if (mysqli_query($conn, $sqla)) {
    echo "Table : journal_volume ->New record created successfully"."<br>";
} else {
    echo "Error: " . $sqla . "<br>" . mysqli_error($conn)."<br>";
}

$sqlb="INSERT INTO journal_issue (issue_no,volume_no,document_id,scope) Values('$issueno','$volumeno','$docid','$scope')";
if (mysqli_query($conn, $sqlb)) {
    echo "Table : journal_issue ->New record created successfully"."<br>";
} else {
    echo "Error: " . $sqlb . "<br>" . mysqli_error($conn)."<br>";
}

$sqlc="INSERT INTO chief_editor (editor_id,editor_name) Values('$eid','$ename')";
if (mysqli_query($conn, $sqlc)) {
    echo "Table : chief_editor ->New record created successfully"."<br>";
} else {
    echo "Error: " . $sqlc . "<br>" . mysqli_error($conn)."<br>";
}

$sqld="INSERT INTO copy (copy_no,document_id,lib_id,c_position) Values('$copies','$docid','cs8','$position')";
if (mysqli_query($conn, $sqld)) {
    echo "Table : copy ->New record created successfully"."<br>";
} else {
    echo "Error: " . $sqld . "<br>" . mysqli_error($conn)."<br>";
}
mysqli_close($conn);
?>