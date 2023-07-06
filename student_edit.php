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
            $classid = $data[0]['classid'];
            $sub = $obj->getrow('student_subject', '*', 'studentid', $id, 1);
            if ($sub == "No Found") {
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $subject = $_POST['subject'];
                    foreach ($_POST['subject'] as $subject) {
                        $obj->student_subject($id, $subject);
                    }
                    echo "
                    <script type='text/javascript'> 
                        window.location.href='student_edit.php?id{$id}' 
                    </script>
                ";
                }
            } else {
                $id = $_GET['id'];
                // $subj = $sub[0]['subject'];
                $subj = $obj->getrow('student_subject', 'subject', 'studentid', $id, 3);
                // $subj_id = $obj->get_data('')
                $a = [];
                // print_r($subj);
                foreach ($subj as $subjj) {
                    $subject = $obj->getrow('subject', 'subject', 'id', $subjj['subject'], 1);
                    if ($subject == "No Found") {
                        echo "";
                    } else {
                        foreach ($subject as $subject_name) {
                            $subject_name['subject'];
                            array_push($a, $subject_name['subject']);
                            // print_r($a);
                            $subj = implode(" ", $a);
                        }
                    }
                }
                $filled = "disabled";
                $mess = "You filled Subject {$subj}";
            }
            // print_r($data);
            # Insering the Update
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $id = $_GET['id'];
                $fname = $_POST['fname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                // print_r($_POST);
                $obj->student_update($id, $fname, $lname, $email);
                echo "
                    <script type='text/javascript'> 
                        window.location.href='student_edit.php?id={$id}' 
                    </script>
                ";
            }
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
<form action="" method="post">
    <h2>Update Profile</h2>
    <div class="row pt-3">
        <div class="col-sm-2">
            <label for="Name">Full Name</label>
        </div>
        <div class="col-sm-10">
            <div class="row g-3 ">
                <div class="col-md">
                    <input type="text" name="fname" value="<?php echo $data[0]['fname'] ?>" id="fname" class="form-control name" placeholder="First Name e.g. Sanjay">
                </div>
                <div class="col-md">
                    <input type="text" name="lname" value="<?php echo $data[0]['lname'] ?>" id="lname" class="form-control name" placeholder="Last Name e.g. Kumar">
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-sm-2">
            <label for="email">Email ID:</label>
        </div>
        <div class="col-sm-10">
            <input type="text" name="email" id="email" value="<?php echo $data[0]['email'] ?>" class="form-control" placeholder="e.g. abc@xyz.com">
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-sm-2">
            <label for="subject">Choose Subject</label>
        </div>
        <div class="col-sm-10">
            <select multiple <?php if (isset($filled)) {
                                    print($filled);
                                } ?> name="subject[]" id="" class="form-control">
                <option selected value="">
                    <?php if (isset($filled)) {
                        print($mess);
                    } else {
                        echo "Choose One of the Subject";
                    } ?>
                </option>
                <option value="11">Computer</option>
                <option value="9">Home_Science</option>
                <option value="10">Physical</option>
            </select>
        </div>
    </div>
    <div class="mt-4 text-center">
        <input type="submit" class="btn btn-primary" value="Update">
    </div>
</form>

<?php
require 'footer.php';
?>