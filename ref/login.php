<?php

include '../lib/mysql.php';

session_start();
//session_register('logged_in_ref');
//session_register('ref');
//session_register('refname');

$error = dbinit();
if ($error !== '') {
    echo "***ERROR*** dbinit: $error\n";
    exit;
}

//$user=dbescape($_POST['uname']);
//$pass=dbescape($_POST['pw']);
$user = preg_replace('/[^a-zA-Z0-9]/', '', $_POST['uname']);
$pass = preg_replace('/[^a-zA-Z0-9]/', '', $_POST['pw']);

$sql = <<<EOF
SELECT uname, id FROM refs WHERE uname='$user' AND password ='$pass'
EOF;

if ($result = dbquery($sql)) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['uname'] != '') {
            $_SESSION['logged_in_ref'] = true;
            $_SESSION['ref'] = $row['id'];
            $_SESSION['refname'] = $user;
            header('Location: index.php');
        } else {
            $_SESSION['logged_in_ref'] = false;
        }
    }

    mysqli_free_result($result);
} else {
    $error = dberror();
    echo "***ERROR*** dbquery: Failed query<br />$error\n";
    exit;
}

if ($_POST['logout']) {
    $_SESSION['logged_in_ref'] = false;
    $_SESSION['ref'] = '';
}

dbclose();

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
  <link rel="stylesheet" type="text/css" href="ref.css">
  <script language="javascript">
    function loadMe() {
      document.forms[0].uname.focus();
    }
  </script>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-82904877-1', 'auto');
    ga('send', 'pageview');

  </script>
</head>
<body onLoad="javascript:loadMe();">
<?php

if ($_SESSION['logged_in_ref'] == false) {
    ?>
  <form action="login.php" method="post" class="eventForm" cellpadding="6">
  <table>
    <tr>
      <td>Login:</td>
      <td><input type="text" name="uname"></td>
    </tr>
    <tr>
      <td>Password:</td>
      <td><input type="password" name="pw"></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" value="submit"></td>
    </tr>
  </table>
  </form>
<?php

} else {
    ?>
  <form action="login.php" method="post" class="eventForm" cellpadding="6">
  <table>
    <tr>
    <?php
    $msg = '<td>Logged in as '.$_SESSION['refname'].'.</td>';
    echo $msg; ?>
    <td><input type="submit" name="logout" value="logout"></td>
    </tr>
  </form>
<?php

}

?>
</body>
</html>
