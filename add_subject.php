<?php
require 'sidebar.php';
require 'class.php';
$obj = new student();
if($_SESSION['user_type']=='teacher'){
    // echo '';
}
else{
    // header('location:acc_den.php');
    echo "
                    <script type='text/javascript'> 
                        window.location.href='acc_den.php' 
                    </script>
                ";
}
?>

<form action="" method="post">
    <h2>Class:</h2>
    <?php
    echo "<select class='form-control' name='classid'>";
    // echo "<option>Select Option:</option>";
    $data = $obj->selectall('class');
    foreach ($data as $res) {
        $id = $res['id'];
        $class = $res['class'];
        echo "
                <option value='$id'>$class</option>
            ";
    }
    echo "</select>";
    ?>
    <br>
    <h2>Subject:</h2>
    <?php
    echo "<select class='form-control' name='subjectid'>";
    // echo "<option>Select Option:</option>";
    $data = $obj->selectall('subject');
    foreach ($data as $res) {
        $id = $res['id'];
        $subject = $res['subject'];
        echo "
                <option value='$id'>$subject</option>
            ";
        if($id >= 8){
            break;
        }
    }
    echo "</select>";
    ?>
    <input type="submit" class=" mt-3 btn btn-danger" value="Add Subject To Class">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $a = $_POST;
    if ($a == "") {
        echo 'Error';
    } else {
        $obj->insert('class_subject', $a);
    }
}
?>
<?php
require 'footer.php';
?>