<?php
require '../class.php';

$type = $_POST['utype'];
$email = $_POST['email'];
$user = $_POST['user'];

$obj = new student();
$id = $obj->verify_user($type,$email,$user);
// print_r($id);

if($id == "No Found"){
    echo '<span class="text-danger">Check Usernmae and Email</span>';
}
else{
    $id = $id[0]['id'];
    $num1 = rand(1,9999999999);
    $token = "SGD_{$num1}";
    echo "<a class='btn btn-success' href='../acc/reset.php?token={$token}'>Click To Here To Reset The Password Now.</a>";
    $obj->reser_link($token,$type,$id);
}
?>

