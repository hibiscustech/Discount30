<?php
session_start();
include('XMLToArrayFlat.php');
include('create_session.php');
?>

<?php
$_SESSION['user_session'] = discount30_session();
?>
