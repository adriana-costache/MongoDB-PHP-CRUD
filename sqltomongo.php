<!DOCTYPE HTML>
<!--
	Minimaxing 3.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>About</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<link href='http://fonts.googleapis.com/css?family=Ubuntu+Condensed' rel='stylesheet' type='text/css'>
		<script src="js/jquery.min.js"></script>
		<script src="js/config.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-desktop.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->

<style>
table,th,td
{
border:1px solid black;
border-collapse:collapse;
}
th,td
{
padding:5px;
}
th
{
text-align:center text:bold;
}
</style>

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
								<a href="register.php">Register New Book</a>
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
					<div class="12u">
						
						<section>
							<h2>SQL to Mongo Mapping Chart</h2>
							<a href="sqltomongo.php"><img src="images/crud.jpg" align="top"/></a>
							<table style="width:1100px">
<tr>
  <th><h3>SQL Statement</h3></th>
  <th><h3>Mongo Query Language Statement</h3></th>		
 
  </tr>
<tr>
<tr>
  <td>CREATE TABLE users (
    id MEDIUMINT NOT NULL
        AUTO_INCREMENT,
    user_id Varchar(30),
    age Number,
    status char(1),
    PRIMARY KEY (id))</td>
  <td>Implicitly created on first insert() operation. The primary key _id is automatically
   added if _id field is not specified.

  <p>db.users.insert( {
    user_id: "abc123",
    age: 55,
    status: "A"
 } )</p>
<p>db.createCollection("users") </p>
</td>		

  </tr>
<tr>
  <td>INSERT INTO USERS VALUES(1,1)</td>
  <td>$db->users->insert(array("a" => 1, "b" => 1));</td>		
 
</tr>
<tr>
  <td>SELECT a,b FROM users</td>
  <td>$db->users->find(array(), array("a" => 1, "b" => 1));</td>		

</tr>
<tr>
  <td>SELECT * FROM users WHERE age=33</td>
  <td>$db->users->find(array("age" => 33));</td>		

</tr>
<tr>
  <td>SELECT a,b FROM users WHERE age=33</td>
  <td>$db->users->find(array("age" => 33), array("a" => 1, "b" => 1));</td>		

</tr>
<tr>
  <td>SELECT a,b FROM users WHERE age=33 ORDER BY name</td>
  <td>$db->users->find(array("age" => 33), array("a" => 1, "b" => 1))->sort(array("name" => 1));</td>		

</tr>
<tr>
  <td>SELECT * FROM users WHERE age>33</td>
  <td>$db->users->find(array("age" => array('$gt' => 33)));</td>		

</tr>
<tr>
  <td>SELECT * FROM users WHERE age<33</td>
  <td>$db->users->find(array("age" => array('$lt' => 33)));</td>		

</tr>
<tr>
  <td>SELECT * FROM users WHERE name LIKE "%Joe%"</td>
  <td>$db->users->find(array("name" => new MongoRegex("/Joe/")));</td>		

</tr>
<tr>
  <td>SELECT * FROM users WHERE name LIKE "Joe%"</td>
  <td>$db->users->find(array("name" => new MongoRegex("/^Joe/")));</td>		

</tr>
<tr>
  <td>SELECT * FROM users WHERE age>33 AND age<=40</td>
  <td>$db->users->find(array("age" => array('$gt' => 33, '$lte' => 40)));</td>		

</tr>
<tr>
  <td>SELECT * FROM users ORDER BY name DESC</td>
  <td>$db->users->find()->sort(array("name" => -1));</td>		

</tr>
<tr>
  <td>CREATE INDEX myindexname ON users(name)</td>
  <td>$db->users->ensureIndex(array("name" => 1));</td>		

</tr>
<tr>
  <td>CREATE INDEX myindexname ON users(name,ts DESC)</td>
  <td>$db->users->ensureIndex(array("name" => 1, "ts" => -1));</td>		

</tr>
<tr>
  <td>SELECT * FROM users WHERE a=1 and b='q'</td>
  <td>$db->users->find(array("a" => 1, "b" => "q"));</td>		

</tr>
<tr>
  <td>SELECT * FROM users LIMIT 20, 10</td>
  <td>$db->users->find()->limit(10)->skip(20);</td>		

</tr>
<tr>
  <td>SELECT * FROM users WHERE a=1 or b=2</td>
  <td>$db->users->find(array('$or' => array(array("a" => 1), array("b" => 2))));</td>		

</tr>
<tr>
  <td>SELECT * FROM users LIMIT 1</td>
  <td>$db->users->find()->limit(1);</td>		
</tr>
<tr>
  <td>EXPLAIN SELECT * FROM users WHERE z=3</td>
  <td>$db->users->find(array("z" => 3))->explain()</td>		

</tr>
<tr>
  <td>SELECT DISTINCT last_name FROM users</td>
  <td>$db->command(array("distinct" => "users", "key" => "last_name"));</td>		

</tr>
<tr>
  <td>SELECT COUNT(*y) FROM users</td>
  <td>$db->users->count();</td>		

</tr>
<tr>
  <td>SELECT COUNT(*y) FROM users where AGE > 30</td>
  <td>$db->users->find(array("age" => array('$gt' => 30)))->count();</td>		

</tr>
<tr>
  <td>SELECT COUNT(AGE) from users</td>
  <td>$db->users->find(array("age" => array('$exists' => true)))->count();</td>		

</tr>
<tr>
  <td>UPDATE users SET a=1 WHERE b='q'</td>
  <td>$db->users->update(array("b" => "q"), array('$set' => array("a" => 1)));</td>		

</tr>
<tr>
  <td>UPDATE users SET a=a+2 WHERE b='q'</td>
  <td>$db->users->update(array("b" => "q"), array('$inc' => array("a" => 2)));</td>		

</tr>
<tr>
  <td>DELETE FROM users WHERE z="abc"</td>
  <td>$db->users->remove(array("z" => "abc"));</td>		

</tr>
</table>

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