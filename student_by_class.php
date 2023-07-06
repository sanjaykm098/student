<?php
require 'class.php';
require 'sidebar.php';
?>
<div class="row">
    <div class="col-sm-9">
        <h2>Student By Class</h2>
    </div>
    <div class="col-sm-3">
        <a href="student.php"><button type="button" class="btn btn-success">Add Student</button></a>
    </div>
</div>
<div class="row mt-4">
    <div class="col-sm-2">Select Class:</div>
    <div class="col-sm-8">
        <select name="sclass" id="sclass" class="form-control">
            <option value="">Select Class</option>
            <option value="1" id="class1">1st</option>
            <option value="2" id="class2">2nd</option>
            <option value="3" id="class3">3rd</option>
            <option value="4" id="class4">4th</option>
            <option value="5" id="class5">5th</option>
            <option value="6" id="class6">6th</option>
            <option value="7" id="class7">7th</option>
            <option value="8" id="class8">8th</option>
            <option value="9" id="class9">9th</option>
            <option value="10" id="class10">10th</option>
        </select>
    </div>
</div>
<div class="text-center table-responsive mt-4" id="student"></div>
<?php require 'footer.php'; ?>

<script>
    $(document).ready(function() {
        $('#sclass').on('change',function(){
            var sclass = $(this).val()
            $.ajax({
                url: 'file/student_class_view.php',
                type: 'POST',
                data: {
                    sclass :sclass,
                },
                success: function(data){
                    $('#student').html(data)
                }
            })
        })
    })
</script>