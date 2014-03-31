<?php
$action = (!empty($_POST['btn_submit']) &&
($_POST['btn_submit'] === 'Save')) ? 'save_info'
: 'show_form';
switch($action){
case 'save_info':
try {
// When the user clicks the Save button after writing, the following portion of the code gets
//executed, which connects to MongoDB and selects a database and a collection where the
//data will be stored
$connection = new MongoClient();

$database = $connection->selectDB('fyp');
$collection = $database->selectCollection('books');
$books = array(
'book_id'=>$_POST['book_id'],
'title'=>$_POST['title'],
'author'=>$_POST['author'],
'edition'=>$_POST['edition'],
'year' => $_POST['year'],
'pages' => $_POST['pages'],
'language' => $_POST['language'],
'publisher' => $_POST['publisher'],
'isbn' => $_POST['isbn'],
'description' =>$_POST['description'],
'cover'=>$_POST['cover']
);
//We construct an array with the user-submitted data, and pass this array as an argument to
//the insert() method of the MongoCollection object:
$collection->insert($books);
} catch(MongoConnectionException $e) {
die("Failed to connect to database ".
$e->getMessage());
}
catch(MongoException $e) {
die('Failed to insert data '.$e->getMessage());
}
break;
case 'show_form':
default:
}
?>

<!DOCTYPE HTML>
<!--
	Minimaxing 3.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Book Registration</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
		<script src="js/jquery.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
	
        <!-- registration form style and js
        <link rel="stylesheet" type="text/css" href="js/view.css" media="all">
        <script type="text/javascript" src="js/view.js"></script>
        <script type="text/javascript" src="js/calendar.js"></script>-->

		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		 <!--Validation script for registration form-->		

				<script>
		function validateForm()
		{	
   if( document.myForm.book_id.value == "" )
   {
     alert( "Please provide non-null Book Id!" );
     document.myForm.book_id.focus() ;
     return false;
   }

   if( document.myForm.title.value == "" )
   {
     alert( "Please provide book title!" );
     document.myForm.title.focus() ;
     return false;
   }


}
		</script>

	</head>
	<body>
	<!-- ********************************************************* -->
		<div id="header-wrapper">
			<div class="container">
				<div class="row">
					<div class="12u">
						
						<header id="header">
							<h1><img src="images/logofyp.png" width="179" height="88"></h1>
							<nav id="nav">
								<a href="index.php">Homepage</a>
								<a href="register.php" class="current-page-item">Register New Book</a>
								<a href="search.php">Search Books</a>
								<a href="about.php">About This Project</a>
									<!--<a href="threecolumn.html">Three Column</a> -->
							</nav>
						</header>
					
					</div>
				</div>
			</div>
		</div>
		<div id="main">
			<div class="container">
				<div class="row main-row">
					<div class="8u">
						
						<section class="left-content">
							<h2></h2>
							<p>
                            
                            <h1></h1>
<?php if ($action === 'show_form'): ?>

<form name="myForm" action="<?php echo $_SERVER['PHP_SELF'];?>" onsubmit="return validateForm()" method="post">
					<div class="form_description">
			<h2>Book Registration Demonstration</h2>
			<p>Please add a new book to the database by filling the form below. </p> 
		</br>
		</div>						
			<ul >
			
					<li id="field1 " >
		<label class="description" for="book_id">Book ID </label>
		<div>
			<input id="book_id" name="book_id" class="element text small" type="number" maxlength="255" value=""/> 
		</div><h1 class="guidelines" id="guide_1"><small>Please type in the book's ID. This value must be an integer. </small></h1> 


		</li>		<li id="field2" >
		<label class="description" for="title">Book Title </label>
		<div>
			<input id="title" name="title" class="element text large" type="text" maxlength="255" value=""/> 
		</div><h1 class="guidelines" id="guide_2"><small>Please type in book's title. </small></h1> 


		</li>		<li id="field3" >
		<label class="description" for="author">Book Author(s) </label>
		<div>
			<input id="author" name="author" class="element text large" type="text" maxlength="255" value=""/> 
		</div><h1 class="guidelines" id="guide_3"><small>Please insert books author(s) in the order specified on the book cover, separated by comma. </small></h1> 



		</li>		<li id="field4" >
		<label class="description" for="edition">Edition Number </label>
		<div>
			<input id="edition" name="edition" class="element text small" type="text" maxlength="255" value=""/> 
		</div><h1 class="guidelines" id="guide_10"><small>Please type in edition number. </small></h1> 



		</li>		<li id="field5" >
		<label class="description" for="year">Year Published  </label>
		<div>
			<input id="year" name="year" class="element text small" type="text" maxlength="255" value=""/> 
		</div><h1 class="guidelines" id="guide_4"><small>Please type in year published. </small></h1> 



		</li>		<li id="field6" >
		<label class="description" for="pages">Number of pages </label>
		<div>
			<input id="pages" name="pages" class="element text small" type="text" maxlength="255" value=""/> 
		</div><h1 class="guidelines" id="guide_5"><small>Please type in number of pages. </small></h1> 



		</li>		<li id="field7" >
		<label class="description" for="language">Language </label>
		<div>
			<input id="language" name="language" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><h1 class="guidelines" id="guide_6"><small>Please type in first language the book was published in. </small></h1> 



		</li>		<li id="field8" >
		<label class="description" for="publisher">Publisher ID  </label>
		<div>
			<input id="publisher" name="publisher" class="element text medium" type="text" maxlength="255" value=""/> 
		</div><h1 class="guidelines" id="guide_7"><small>Please type in publisher name. </small></h1> 



		</li>		<li id="field9" >
		<label class="description" for="isbn">ISBN </label>
		<div>
			<input id="isbn" name="isbn" class="element text large" type="text" maxlength="255" value=""/> 
		</div><h1 class="guidelines" id="guide_8"><small>Please type in book's ISBN. For multiple values please insert all separated by comma. </small></h1> 


		</li>		<li id="field10" >
		<label class="description" for="description">Description/Abstract </label>
		<div>
			<textarea id="description" name="description" class="element textarea medium"></textarea> 
		</div><h1 class="guidelines" id="guide_9"><small>Please add a descriptive paragraph or abstract of the book. </small></h1> 
		</li>

		</li>		<li id="field11" >
		<label class="description" for="cover">Book Cover Link </label>
		<div>
			<textarea id="cover" name="cover" class="element textarea medium"></textarea> 
		</div><h1 class="guidelines" id="guide_10"><small>Please add link of the book's cover (if available). </small></h1> 
		</li>
			

					<input type="submit" name="btn_submit" value="Save"/>
		</li>
			</ul>
		</form>	





<!--
<form action="<?php echo $_SERVER['PHP_SELF'];?>"
method="post">
<h4>Book ID</h4>
<p>
<input type="id" name="_id" id="_id">
</p>
<h4>Book Title</h4>
<p>
<input type="text" name="title" id="title">
</p>

<h4>Book Authors </h4>
<p>
<input type="text" name="author" id="author">
</p>
</br>
<h4>Year Published </h4>
<p>
<input type="year" name="published_year" id="published_year">
</p>
</br>
<h4>Number of pages</h4>
<p>
<input type="text" name="pages" id="pages">
</p>
<h4>Language</h4>
<p>
<input type="text" name="language">
</p>
<h4>Publisher Id</h4>
<p>
<input type="text" name="publisher_id">
</p>
<h4>ISBN</h4>
<p>
<input type="text" name="ISBN">
</p>

<input type="submit" name="btn_submit"
value="Save"/>
</p>
</form>
-->
<?php else: ?>
<p>
Congratulations you have sucessfully registered a new book <?php echo $books['title'];?> !
<a href="register.php">
Register a new book?</a>
</p>
<?php endif;?>
                            
                            </p>
							<p></p>
							<p></p>
						</section>
					
					</div>
					<div class="4u">

						<section>
							<h2>Who are you guys?</h2>
							<ul class="small-image-list">
								<li>
									<a href="#"><img src="images/pic2.jpg" alt="" class="left" /></a>
									<h4>Jane Anderson</h4>
									<p>Varius nibh. Suspendisse vitae magna eget et amet mollis justo facilisis amet quis.</p>
								</li>
								<li>
									<a href="#"><img src="images/pic1.jpg" alt="" class="left" /></a>
									<h4>James Doe</h4>
									<p>Vitae magna eget odio amet mollis justo facilisis amet quis. Sed sagittis consequat.</p>
								</li>
							</ul>
						</section>
					
						<section>
							<h2>How about some links?</h2>
							<div>
								<div class="row">
									<div class="6u">
										<ul class="link-list">
											<li><a href="#">Sed neque nisi consequat</a></li>
											<li><a href="#">Dapibus sed mattis blandit</a></li>
											<li><a href="#">Quis accumsan lorem</a></li>
											<li><a href="#">Suspendisse varius ipsum</a></li>
											<li><a href="#">Eget et amet consequat</a></li>
										</ul>
									</div>
									<div class="6u">
										<ul class="link-list">
											<li><a href="#">Quis accumsan lorem</a></li>
											<li><a href="#">Sed neque nisi consequat</a></li>
											<li><a href="#">Eget et amet consequat</a></li>
											<li><a href="#">Dapibus sed mattis blandit</a></li>
											<li><a href="#">Vitae magna sed dolore</a></li>
										</ul>
									</div>
								</div>
							</div>
						</section>

					</div>
				</div>
			</div>
		</div>
		<div id="footer-wrapper">
			<div class="container">
				<div class="row">
					<div class="8u">
						
						<section>
							<h2>How about a truckload of links?</h2>
							<div>
								<div class="row">
									<div class="3u">
										<ul class="link-list">
											<li><a href="#">Sed neque nisi consequat</a></li>
											<li><a href="#">Dapibus sed mattis blandit</a></li>
											<li><a href="#">Quis accumsan lorem</a></li>
											<li><a href="#">Suspendisse varius ipsum</a></li>
											<li><a href="#">Eget et amet consequat</a></li>
										</ul>
									</div>
									<div class="3u">
										<ul class="link-list">
											<li><a href="#">Quis accumsan lorem</a></li>
											<li><a href="#">Sed neque nisi consequat</a></li>
											<li><a href="#">Eget et amet consequat</a></li>
											<li><a href="#">Dapibus sed mattis blandit</a></li>
											<li><a href="#">Vitae magna sed dolore</a></li>
										</ul>
									</div>
									<div class="3u">
										<ul class="link-list">
											<li><a href="#">Sed neque nisi consequat</a></li>
											<li><a href="#">Dapibus sed mattis blandit</a></li>
											<li><a href="#">Quis accumsan lorem</a></li>
											<li><a href="#">Suspendisse varius ipsum</a></li>
											<li><a href="#">Eget et amet consequat</a></li>
										</ul>
									</div>
									<div class="3u">
										<ul class="link-list">
											<li><a href="#">Quis accumsan lorem</a></li>
											<li><a href="#">Sed neque nisi consequat</a></li>
											<li><a href="#">Eget et amet consequat</a></li>
											<li><a href="#">Dapibus sed mattis blandit</a></li>
											<li><a href="#">Vitae magna sed dolore</a></li>
										</ul>
									</div>
								</div>
							</div>
						</section>
					
					</div>
					<div class="4u">

						<section>
							<h2>Something of interest</h2>
							<p>Duis neque nisi, dapibus sed mattis quis, rutrum accumsan sed. 
							Suspendisse eu varius nibh. Suspendisse vitae magna eget odio amet 
							mollis justo facilisis quis. Sed sagittis mauris amet tellus gravida
							lorem ipsum dolor sit amet consequat blandit.</p>
							<footer class="controls">
								<a href="#" class="button">Oh, please continue ....</a>
							</footer>
						</section>

					</div>
				</div>
				<div class="row">
					<div class="12u">

						<div id="copyright">
							&copy; Untitled. All rights reserved. | Design: <a href="http://html5up.net">HTML5 UP</a> | Images: <a href="http://fotogrph.com">fotogrph</a>
						</div>

					</div>
				</div>
			</div>
		</div>
	<!-- ********************************************************* -->
	</body>
</html>