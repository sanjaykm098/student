<?php
$sclass = $_POST['sclass'];
require '../class.php';
$obj = new student();
$view = $obj->get_row('student',"*",'classid',$sclass);
if($view == "No Found"){
    Echo "<span>No Student Found in this Class, Please Add Some Student in this class.</span>";
}
else{
    echo "
    <table class='table' id='qTable'>
        <thead>
            <th>Sr</th>
            <th>Name</th>
            <th>User Name</th>
            <th>Email</th>
            <th>DOB</th>
            <th>GEnder</th>
            <th>Class</th>
            <th>Action</th>
        </thead>
        <tbody>
    ";
    foreach($view as $key=>$view){
        $classid = $view['classid'];
        $key = $key+1;
                $class = $obj->getrow('class', 'class', 'id', $classid, 1);
                $class = $class[0]['class'];
                echo "
                <tr>
                    <td>{$key}</td>
                    <td>{$view['fname']} {$view['lname']}</td>
                    <td>{$view['uname']}</td>
                    <td>{$view['email']}</td>
                    <td>{$view['dob']}</td>
                    <td>{$view['gender']}</td>
                    <td>{$class}</td>
                    <td class='d-grid g-5'><a class='mx-1' href='student_edit.php?id={$view['id']}'><i class='bi text-success bi-pencil-square'></i></a>
                    <a class='mx-1' href='file/del.php?id={$view['id']}'><i class='bi bi-trash3-fill'></i></a>
                    <a class='mx-1' href='single_student.php?id={$view['id']}'><i class='bi bi-eye'></i></a></td>
                </tr>";
    }
    echo "</tbody></table>";
}
