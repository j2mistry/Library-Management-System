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
	  <form class="col s8 offset-s2" method="get" action="add_reader_s.php">
			<div class="card blue-grey darken-1">
			<div class="card-content white-text">
			<span class="card-title">Member Lookup</span>
				<div class="row">
					<div class="input-field col s8">
						<input placeholder="Member ID" name="reader_id" type="text" class="validate" length="3">
					</div>
					<div class="input-field col s4">
						<button class="btn waves-effect waves-light red lighten-2" class="submit" name="submit" value="subbmit">GO<i class="material-icons right">search</i>
					</div>
				</div>
			</div>
			</div>
			
	</form>
	  </div>
	  <div class="row">
	  
		<form class="col s8 offset-s2" method="POST" action="add_reader_q.php">
		<div class="card blue-grey darken-1">
			<div class="card-content white-text">
			<span class="card-title">Add New Reader Details</span>
				<div class="row">
					<div class="input-field col s5">
						<input placeholder="Reader ID" name="reader_id" type="text" class="validate" length="3">
					</div>
					<div class="input-field col s7">
						<input placeholder="Reader Name" name="reader_name" type="text" class="validate" length="50">
					</div>
					<div class="input-field col s5">
						<input placeholder="Phone Number" name="ph_num" type="text" class="validate" length="11">
					</div>
				 <div class="input-field col s7">
						<select name="reader_type"> 
						<option value="" disabled selected>Reader Type</option>
						<option value="student">Student</option>
						<option value="lecturer">Lecturer</option>
						<option value="staff">Staff</option>
						<option value="senior citizen">Senior Citizen</option>
						<label>Reader Type</label>
						</select>
					</div>
					<div class="input-field col s12">
			  <textarea id="textarea1" name="address" class="materialize-textarea " length="250"></textarea>
			  <label for="textarea1">Address</label>
			
					<button class="btn waves-effect waves-light red lighten-2" name="add" id="add" type="submit" value="submit">Submit<i class="material-icons right">send</i>
					</button>
					</div>
				</div>
			</div>
			</div>
		</form>
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