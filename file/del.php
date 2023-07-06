<?php include '../class.php';
ob_start();
session_start();
if(!isset($_SESSION['user'])){
    header('location:../login.php');
  }

  $obj = new student();


  if(isset($_GET['id']) == "" && isset($_GET['user']) == ""){
    echo 'he';
  }
  else{
    $id = $_GET['id'];
    // echo 'heb';
    $obj->delete('student',$id);
    header('location:../all_student.php');

  }
?>