<?php
	session_start();
	if (!$_SESSION['logged_in']) {
 		header("Location: /admin/login.php");
 	}
?>
<!DOCTYPE HTML PUBLIC \"-//W3C//DTD HTML 4.0 Transitional//EN\">

<html>
<head>
	<link rel="stylesheet" type="text/css" href="/admin/admin.css">
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-82904877-1', 'auto');
    ga('send', 'pageview');

  </script>
</head>

<body>
<div class="header">PVA Administration</div>
<span class="button"><a href="/index.php">PVA site</a></span>
<span class="button"><a href="/admin/index.php">Menu</a></span>
<span class="button"><a href="/admin/homepage_add.php">Home Page Articles</a></span>
<span class="button"><a href="/admin/team_add.php">Teams</a></span>
<span class="button"><a href="/admin/league_add.php">Leagues</a></span>
<span class="button"><a href="/admin/gyms_add.php">Gyms</a></span>
<span class="button"><a href="/admin/games_add.php">Games</a></span>
<span class="button"><a href="/admin/links_add.php">Links</a></span>
<span class="button"><a href="/admin/registrations.php">Registrations</a></span>
<span class="button"><a href="/admin/ref_add.php">Referees</a></span>
<span class="button"><a href="/admin/admins.php">Admins</a></span>
<span class="button"><a href="/admin/login.php">Logout</a></span>