<?php
session_start();
include('XMLToArrayFlat.php');
include('verify_session.php');
?>

<?php
$verification = discount30_verify_session($_SESSION['user_session']);
echo '<br> verification: '.$verification;
echo '<br>'.$_SESSION['user_session'];
?>
