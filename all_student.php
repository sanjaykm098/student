<?php
include 'class.php';
include 'sidebar.php';
$obj = new student();
$data = $obj->selectall('student');
if ($_SESSION['user_type'] == 'teacher') {
    // echo '';
} else {
    // header('location:acc_den.php');
    echo "
                    <script type='text/javascript'> 
                        window.location.href='acc_den.php' 
                    </script>
                ";
}
//print_r($data);
?>

<div class="row pb-4">
    <div class="col-9">
        <h2>Students Profile</h2>
    </div>
    <div class="col-3">
        <a href="student.php"><button type="button" class="btn btn-success">Add Student</button></a>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-sm table-hover" id="myTable">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>UserName</th>
                <th>Father</th>
                <th>Email</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Class</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            foreach ($data as $view) {
                $classid = $view['classid'];
                $class = $obj->getrow('class', 'class', 'id', $classid, 1);
                $class = $class[0]['class'];
                echo "
                <tr>
                    <td>{$view['fname']} {$view['lname']}</td>
                    <td>{$view['uname']}</td>
                    <td>{$view['fathername']}</td>
                    <td>{$view['email']}</td>
                    <td>{$view['dob']}</td>
                    <td>{$view['gender']}</td>
                    <td>{$class}</td>
                    <td class='d-grid g-5'><a class='mx-1' href='student_edit.php?id={$view['id']}'><i class='bi text-success bi-pencil-square'></i></a>
                    <a class='mx-1' href='file/del.php?id={$view['id']}'><i class='bi bi-trash3-fill'></i></a>
                    <a class='mx-1' href='single_student.php?id={$view['id']}'><i class='bi bi-eye'></i></a></td>
                </tr>
            ";
            }




            ?>
        </tbody>
    </table>
</div>
<?php
include 'footer.php';
?>