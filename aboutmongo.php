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
							<h2>What is NoSQL?</h2>
							<p>In Scalable SQL and NoSQL Data Stores Cattell (2010) identifies 
								some key features of all <a href="http://nosql-database.org/">NoSQL systems</a>, these are: horizontal
								scalability of operations over several servers, the ability to
								partition data over many servers without affecting the performance,
								 simple call level protocol in contrast to a SQL binding, 
								 a more efficient use of distributed indexes and RAM for data
								  storage and the ability to dynamically add new attributes 
								  to data records.  
								<p>A good example of these features, as well as a good "concept proof" 
								is <a href= "http://research.google.com/archive/bigtable.html">Google's Big Table</a>
								 or <a href ="http://aws.amazon.com/dynamodb/">Amazon's DynamoDB</a> which supports highly 
								scalable partition tables. Google's Big Table data model is based 
								on rows and columns while the scalability model is splitting both 
								columns and rows over multiple nodes. However most NoSQL systems 
								seem to work based on Eric Brewer's CAP theorem which states that 
								a system can have only two out of the following three properties:
								availability, partition - tolerance and consistency. In order to 
								improve the first two properties most non-relational databases give 
								up consistency. </p>
</p>						<h2>What is MongoDB?</h2>
							<p>MongoDB is a document database that provides high performance, high availability, and easy scalability.</p>
							<h3>Document Database</h3>
							<li type="square">Documents (objects) map nicely to programming language data types.</li>
							<li type="square">Embedded documents and arrays reduce need for joins.</li>
							<li type="square">Dynamic schema makes polymorphism easier.</li>
							<h3>High Performance</h3>
							<li type="square">Embedding makes reads and writes fast. </li>
							<li type="square">Indexes can include keys from embedded documents and arrays. </li>
							<li type="square">Optional streaming writes (no acknowledgments). </li>
							<h3>High Availability</h3>
							<li type="square">Replicated servers with automatic master failover.</li>
							<h3>Easy Scalability</h3>
							<li type="square">Automatic <a href="http://docs.mongodb.org/manual/core/sharding/">sharding</a> distributes collection data across machines.</li>
							<li type="square">Eventually-consistent reads can be distributed over replicated servers.</li>
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