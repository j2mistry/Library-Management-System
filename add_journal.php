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
		<form class="col s8 offset-s2" method="post" action="add_journal_q.php">
		<div class="card blue-grey darken-1">
		<div class="card-content white-text">
		<span class="card-title">Journal Details</span>
			<div class="row">
				<div class="input-field col s4">
					<input placeholder="Issue Number" name="issue_no" type="number" class="validate" length="2">
				</div>
				<div class="input-field col s4">
					<input placeholder="Volume Number" name="volume_no" type="number" class="validate" length="2">
				</div>
				<div class="input-field col s4">
					<input placeholder="Document ID" name="document_id" type="text" class="validate" length="5">
				</div>
				<div class="input-field col s12">
					<input placeholder="Scope" name="scope" type="text" class="validate" length="20">
				</div>
			</div>
		</div>
		</div>
		
		<div class="card blue-grey darken-1">
		<div class="card-content white-text">
		<span class="card-title">Editor Detail</span>
			<div class="row">
				<div class="input-field col s6">
					<input placeholder="Editor Name" name="editor_name" type="text" class="validate" length="30">
				</div>
				<div class="input-field col s6">
					<input placeholder="Editor ID" name="editor_id" type="text" class="validate" length="5">
				</div>
			</div>
		</div>
		</div>
		
		<div class="card blue-grey darken-1">
		<div class="card-content white-text">
		<span class="card-title">Document Details</span>
			<div class="row">
				<div class="input-field col s8">
					<input placeholder="Title" name="doc_title" type="text" class="validate" length="50">
				</div>
				<div class="input-field col s4">
					<input placeholder="Number of Copies" name="num_copies" type="number" class="validate" length="2">
				</div>
				<div class='input-field col s6'>
					<input placeholder="Publisher ID" name="publisher_id" type="text" class="validate">
				</div>
				<div class='input-field col s6'>
					<input placeholder="Publication Date" name="publication_date" type="date" class="datepicker" >
				</div>
				
			</div>
		</div>
		</div>
		
		<div class="card blue-grey darken-1">
		<div class="card-content white-text">
		<span class="card-title">Branch Details</span>
			<div class="row">
				<div class="input-field col s6">
					<select name="branch_id"> 
					<option value="" disabled selected>Select Branch</option>
					<option value="1">Computer Science</option>
					<option value="2">MechenicalEngineering</option>
					<option value="3">Bio Medical</option>
					<option value="4">Civil Engineering</option>
					<option value="5">Industrial Engineering</option>
					<option value="6">Architecture</option>
					<label>Branch</label>
					</select>
				</div>
				<div class="input-field col s6">
					<input placeholder="Position" name="position" type="text" class="validate" length="6">
				</div>
				<button class="btn waves-effect waves-light red lighten-2" name="add" id="add" type="submit" value="submit">Submit<i class="material-icons right">send</i>
				</button>
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