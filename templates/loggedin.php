<?php

require_once('../ti.php');



?>


<html>
<title>&iquest;Que? - Ask some questions</title>

<head>
<link rel="stylesheet" href="css/que.css" type="text/css"></link>
<?php startblock('head') ?>

<?php endblock() ?>
</head>



<body>
<div>
<div id="header">
	<div id="logoHolder">
	<span id="logoText"><a href="/que/index.php">&iquest;Que?</a></span>
		<div id="navBar">

			<ul>
				<li><a href="/que/ask.php">Ask a Question</a></li>
				<li><a href="/que/answer.php">Answer a Question</a></li>
				<li><a href="/que/history.php">My Questions</a></li>
				<li><a href="/que/logout.php">Logout</a></li>
			</ul>
			
		</div>
	</div>
</div>
<div id="mainContent">
<?php startblock('mainContent') ?>

<?php endblock() ?>
</div>
</div>
</body>

</html>