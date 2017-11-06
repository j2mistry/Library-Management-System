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

	$readerid=$_POST['reader_id'];
	$readername=$_POST['reader_name'];
	$phno=$_POST['ph_num'];
	$readertype=$_POST['reader_type'];
	$address=$_POST['address'];

	
	$sql="INSERT INTO reader (reader_id,reader_name,ph_num,address,type,num_br_books,num_res_books) VALUES ('$readerid','$readername','$phno','$address','$readertype',0,0)";
	if (mysqli_query($conn, $sql)) {
    echo "Table : reader ->New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>