<?php
require 'class.php';
require 'sidebar.php';
$obj = new student();
?>
<span>
    <?php
    if (isset($_GET['id'])) {
        if ($_GET['id'] == "") {
            echo "
                    <script type='text/javascript'> 
                        window.location.href='acc_den.php' 
                    </script>
                ";
        } else {
            $id = $_GET['id'];
            $data = $obj->getrow('student', '*', 'id', $id, 1);
            // print_r($data);  
            $data = $data[0];
            $classid = $data['classid'];
            # Getting class using Id;
            $class = $obj->getrow('class', 'class', 'id', $classid, 1);
            $class = $class[0]['class'];
            #getting subject using szubject Id aznd save in array;
            $subject = [];
            #class subject
            $class_subject = $obj->getrow('class_subject', '*', 'classid', $classid, 100);
            // print_r($class_subject);
            foreach ($class_subject as $qwe) {
                $sun = $obj->getrow('subject', 'subject', 'id', $qwe['subjectid'], 1);
                $ress = $sun[0]['subject'];
                array_push($subject, $ress);
            }
            $class_subject = implode(", ", $subject);
            # Extra Subjects
            $subject = [];
            $extra_subject = $obj->getrow('student_subject', '*', 'studentid', $id, 3);
            foreach ($extra_subject as $res) {
                $resss = $obj->getrow('subject', 'subject', 'id', $res['subject'], 1);
                $ress = $resss[0]['subject'];
                array_push($subject, $ress);
            }
            $extra_subject = implode(", ", $subject);
            // print_r($subject);
        }
    } else {
        echo "
                    <script type='text/javascript'> 
                        window.location.href='acc_den.php' 
                    </script>
                ";
    }

    ?>
</span>
<div class="row mt-3">
    <div class="col-12">
        <div class="row mb-3">
            <div class="col-sm-9">
                <h2>Student Profile</h2>
            </div>
            <div class="col-sm-3">
                <a href="all_student.php">
                    <button type="button" class="btn btn-danger">Back to All Student</button>
                </a>
            </div>
        </div>
    </div>
</div>
<table class="table table-bordered">
    <tr>
        <td class="p-4">
            <h5 class="text-success">Student Name:</h5>
        </td>
        <td class="p-4">
            <h5 class="">
                <?php echo $data['fname'] . " " . $data['lname'] ?>
            </h5>
        </td>
    </tr>
    <tr>
        <td class="p-4">
            <h5 class="text-success">User Name:</h5>
        </td>
        <td class="p-4">
            <h5 class="">
                <?php echo $data['uname'] ?>
            </h5>
        </td>
    </tr>
    <tr>
        <td class="p-4">
            <h5 class="text-success">Father Name:</h5>
        </td>
        <td class="p-4">
            <h5 class="">
                <?php echo ucfirst($data['fathername']) ?>
            </h5>
        </td>
    </tr>
    <tr>
        <td class="p-4">
            <h5 class="text-success">Email</h5>
        </td>
        <td class="p-4">
            <h5 class="">
                <?php echo $data['email'] ?>
            </h5>
        </td>
    </tr>
    <tr>
        <td class="p-4">
            <h5 class="text-success">Gender</h5>
        </td>
        <td class="p-4">
            <h5 class="">
                <?php echo ucfirst($data['gender']) ?>
            </h5>
        </td>
    </tr>
    <tr>
        <td class="p-4">
            <h5 class="text-success">DOB</h5>
        </td>
        <td class="p-4">
            <h5 class="">
                <?php echo ucfirst($data['dob']) ?>
            </h5>
        </td>
    </tr>
    <tr>
        <td class="p-4">
            <h5 class="text-success">Class</h5>
        </td>
        <td class="p-4">
            <h5 class="">
                <?php echo $class; ?>
            </h5>
        </td>
    </tr>
    <tr>
        <td class="p-4">
            <h5 class="text-success">Class Subject</h5>
        </td>
        <td class="p-4">
            <h5 class="">
                <?php echo $class_subject; ?>
            </h5>
        </td>
    </tr>
    <tr>
        <td class="p-4">
            <h5 class="text-success">Extra Subject</h5>
        </td>
        <td class="p-4">
            <h5 class="">
                <?php echo $extra_subject; ?>
            </h5>
        </td>
    </tr>
    <tr>
        <td class="p-4">
            <h5 class="text-success">Action</h5>
        </td>
        <td class="p-4">
            <div class="row">
                <a class='col-sm-2' href='file/del.php?id=<?php echo $data['id'] ?>'><button
                        class="btn btn-danger">Delete</button></a>
                <a class='col-sm-2' href='student_edit.php?id=<?php echo $data['id'] ?>'><button
                        class="btn btn-primary">Update</button></a>
            </div>
        </td>
    </tr>
</table>
<?php
require 'footer.php';
?>