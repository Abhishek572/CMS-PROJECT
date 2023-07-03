<?php session_start(); ?>


<?php 

$_SESSION['username']  = null;
$_SESSION['fname']     = null;
$_SESSION['lname']     = null;
$_SESSION['role']      = null;

echo "<script>window.location.href='../index.php'</script>";;

?>