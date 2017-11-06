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

			$isbn = $_POST['book_isbn'];
			$docid=$_POST['document_id'];
			$title=$_POST['doc_title'];
			$copies="1";
			$pubid=$_POST['publisher_id'];
			$pubdate=$_POST['publication_date'];
			$type="Book";
			$authorname=$_POST['author_name'];
			$authorid=$_POST['author_id'];
			$branchno=$_POST['branch_id'];
			$position=$_POST['position'];
			$status="available";
			$desc=explode(" ",$_POST['descriptor']);
			
			foreach($desc as $value)
			{
				$sqly="insert into descriptor(document_id,descriptor) values ('$docid','$value')";
				if (mysqli_query($conn, $sqly)) {
					echo "Table : description ->New record created successfully";
					}
			}
//echo $_POST['book_isbn'];
//echo $pubdate;
//$libid=0;

$sqlz="Select lib_id from branch where no='$branchno'";
$result=mysqli_query($conn,$sqlz);
if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
         $libid = $row['lib_id']; 
		}
}		

	
		
$sql="INSERT INTO book (isbm,document_id) Values('$isbn','$docid')";
if (mysqli_query($conn, $sql)) {
    echo "Table : book ->New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sqli="INSERT INTO document (document_id,title,lib_id,num_copy,publisher_id,publication_date,type) Values ('$docid','$title','me8','$copies','$pubid','$pubdate','$type')";
if (mysqli_query($conn, $sqli)) {
    echo "Table : document -> New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sqla="INSERT INTO author (author_id,author_name) Values ('$authorid','$authorname')";
if (mysqli_query($conn, $sqla)) {
    echo "Table : author -> New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sqlb="INSERT INTO copy(copy_no,document_id,c_position,status) VALUES ('$copies','$docid','$position','$status')";
if(mysqli_query($conn,$sqlb)){
	echo"Table : copy ->New Record Created Successfully";
}else{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

$sqlc="INSERT INTO writes(author_id,document_id) VALUES ('$authorid','$docid')";
if(mysqli_query($conn,$sqlc)){
	echo"Table : writes ->New Record Created Successfully";
}else{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
?>