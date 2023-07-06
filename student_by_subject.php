<?php
require 'sidebar.php';
require 'class.php';
$obj = new student();

if ($_GET['id'] == "") {
    echo "
                    <script type='text/javascript'> 
                        window.location.href='acc_den.php' 
                    </script>
                ";
} else {
    $subjectid = $_GET['id'];
    if ($subjectid >= 8) {
        $subjectid = $_GET['id'];
        $data = $obj->customsql("SELECT studentid FROM student_subject where `subject` = '$subjectid' ;");
        // print_r($data);
        $std = [];
        foreach ($data as $data) {
            $classid = $data['studentid'];
            $a = $obj->getrow('student', '*', 'id', $classid, 1);
            foreach ($a as $a) {
                array_push($std,$a['id']);
            }
        }
    } else {
        $data = $obj->customsql("SELECT classid FROM class_subject where subjectid = '$subjectid' ;");
        // print_r($data);
        $std = [];
        foreach ($data as $data) {
            $classid = $data['classid'];
            $a = $obj->getrow('student', '*', 'classid', $classid, 1);
            foreach ($a as $a) {
                array_push($std,$a['id']);
            }
        }
    }
    if($subjectid >=12){
        header('location:acc_den.php');
    }
}
?>
<div class="row">
    <div class="col-sm-9">
        <h2>
            Student By Subject:
        </h2>
    </div>
    <div class="col-sm-3">
        <a href="subject.php">
            <button class="btn btn-success">Back To Subject</button>
        </a>
    </div>
</div>
<span>
    <?php

    ?>
</span>
<table class="mt-3 table-hover table">
    <thead>
        <th>Sr.</th>
        <th>Student Name</th>
        <th>User Name</th>
        <th>Email</th>
        <th>Class</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php foreach ($std as $key => $data) {
            $data = $obj->getrow('student','*','id',$data,1);
            $name = $data[0]['fname']." ".$data[0]['lname'];
            $user = $data[0]['uname'];
            $id = $data[0]['id'];
            $email = $data[0]['email'];
            $classid = $data[0]['classid'];
            $class = $obj->getrow('class','*','id',$classid,1);
            $class = $class[0]['class'];
        ?>
            <tr>
                <td><?php echo $key+1; ?></td>
                <td><?php echo $name ?></td>
                <td><?php echo $user ?></td>
                <td><?php echo $email ?></td>
                <td><?php echo $class ?></td>
                <?php
                echo "
                <td class='d-grid g-5'><a class='mx-1' href='student_edit.php?id={$id}'><i class='bi text-success bi-pencil-square'></i></a>
                <a class='mx-1' href='file/del.php?id={$id}'><i class='bi bi-trash3-fill'></i></a>
                <a class='mx-1' href='single_student.php?id={$id}'><i class='bi bi-eye'></i></a></td>
                ";
                ?>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php require 'footer.php' ?>