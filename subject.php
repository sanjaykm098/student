<?php
require 'sidebar.php';
require 'class.php';
$obj = new student();
$data = $obj->selectall('subject');
// print_r($data);
?>
<div class="row justify-content-center align-items-center g-2">
    <div class="col"><h2>Subject:</h2></div>
    <div class="col"></div>
    <div class="col"><a href="add_subject.php"><button class="btn btn-success">Add Subject To Class</button></a></div>
    <hr>
</div>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Subject Name</th>
                <th scope="col">No. of Student</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $data){?>
            <tr class="">
                <td scope="row"><?php echo $data['id']?></td>
                <td><?php echo $data['subject']?></td>
                <td><?php echo $data['id']?></td>
                <td><a href="student_by_subject.php?id=<?php echo $data['id']?>">
                    <button class="btn btn-success">See Class</button>
                </a></td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<?php
require 'footer.php';
?>