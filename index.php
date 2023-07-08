<?php
require_once 'sidebar.php';
require_once 'class.php';
$obj = new student();

?>
    <h2>Welcome</h2>
<div class="row mt-4">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">
                <h5>Total Subjects</h5>
            </div>
            <div class="card-body">
                <div class='row'>
                    <?php
                    $subj = $obj->selectall('subject');
                    foreach ($subj as $subj) {
                        $name = $subj['subject'];
                        $id = $subj['id'];
                        echo "<b class='col-sm-6'><a class='text-decoration-none text-info' href='student_by_subject.php?id={$id}'>$name</a>" . "</b>";
                    }
                    ?>
                </div>
            </div>
            <div class="card-footer">
                <a href='subject.php'><button type="button" class="btn btn-danger">See More</button></a>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">
                <h5>All Class</h5>
            </div>
            <div class="card-body">
                <div class='row'>
                    <?php
                    $subj = $obj->selectall('class');
                    foreach ($subj as $subj) {
                        $name = $subj['class'];
                        $id = $subj['id'];
                        echo "<b class='col-sm-6'><a class='text-decoration-none text-info' href='#'>$name</a>" . "</b>";
                    }
                    ?>
                </div>
            </div>
            <div class="card-footer">
                <a href='student_by_class.php'><button type="button" class="btn btn-danger">See More</button></a>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-header">
                <h5>Quick View</h5>
            </div>
            <div class="card-body">
                <div class='row'>
                    <h6>
                    <?php
                    $student = $obj->get_numrow('student');
                    $teacher = $obj->get_numrow('teacher');
                    echo "Number of Students: <b class='text-success'>{$student}</b><br><br>";
                    echo "Number of Teacher: <b class='text-danger'>{$teacher}</b>";
                    ?>
                    </h6>
                </div>
            </div>
            <div class="card-footer">
                <a href='student.php'><button type="button" class="btn btn-danger">Add Student</button></a>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'footer.php';
?>