<?php 

include("sidebar.php");
if($_SESSION['user_type']=="student"){
    echo "
                    <script type='text/javascript'> 
                        window.location.href='acc_den.php' 
                    </script>
                ";
}
?>
    <form action="" name="form" class="container pt-3" method="post" onsubmit="return validation()" id="sign_up">
        <h2>Add Student</h2>
        <!-- Name  -->
        <div class="row mt-4">
            <div class="col-sm-2">
                <label for="Name">Full Name</label>
            </div>
            <div class="col-sm-10">
                <div class="row g-3 ">
                    <div class="col-md">
                        <input type="text" name="fname" id="fname" class="form-control name"
                            placeholder="First Name e.g. Sanjay">
                    </div>
                    <div class="col-md">
                        <input type="text" name="lname" id="lname" class="form-control name"
                            placeholder="Last Name e.g. Kumar">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <span id="nameErr"></span>
                    </div>
                    <div class="col-6">
                        <span id="lnameErr"></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Username  -->
        <div class="row mt-3">
            <div class="col-sm-2">
                <label for="uname">UserName</label>
            </div>
            <div class="col-sm-10">
                <input type="text" name="uname" id="uname" class="form-control" placeholder="e.g. @sanjay">
                <div class="col-12">
                    <span id="userErr"></span>
                </div>
            </div>
        </div>
        <!-- Father Name  -->
        <div class="row mt-3">
            <div class="col-sm-2">
                <label for="fathername">Father Name</label>
            </div>
            <div class="col-sm-10">
                <input type="text" name="fathername" id="fathername" class="form-control" placeholder="Father Name">
                <div class="col-12">
                    <span id="fatherErr"></span>
                </div>
            </div>
        </div>
        <!-- email  -->
        <div class="row mt-3">
            <div class="col-sm-2">
                <label for="email">Email ID:</label>
            </div>
            <div class="col-sm-10">
                <input type="text" name="email" id="email" class="form-control" placeholder="e.g. abc@xyz.com">
                <div class="col-12">
                    <span id="emailErr"></span>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-2">
                <label for="email">DOB</label>
            </div>
            <div class="col-sm-10">
                <input type="date" name="dob" id="dob" class="form-control">
                <div class="col-12">
                    <span id="dateErr"></span>
                </div>
            </div>
        </div>
        <!-- Gender  -->
        <div class="row mt-3">
            <div class="col-sm-2">
                <label for="Gender">Gender</label>
            </div>
            <div class="col-sm-10 d-flex">
                <div>
                    <input type="radio" name="gender" value="male" id="male">
                    <label for="male" class="mx-2">Male</label>
                </div>
                <div>
                    <input type="radio" name="gender" value="female" id="female">
                    <label for="female" class="mx-2x">Female</label>
                </div>
                <span id="genderErr"></span>
            </div>
        </div>
        <!-- class  -->
        <div class="row mt-3">
            <div class="col-sm-2">
                <label for="class">Class</label>
            </div>
            <div class="col-sm-10">
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
                <span id="classErr"></span>
            </div>
            <div class="col-12">
                <div id="subject"></div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-2">
                <label for="password">Password</label>
            </div>
            <div class="col-sm-10">
                <div class="row g-3">
                    <div class="col-md">
                        <input type="password" name="pass" placeholder="Enter Password" id="password"
                            class="form-control">
                    </div>
                    <div class="col-md">
                        <input type="password" name="cpass" placeholder="Confirm Password" id="cpassword"
                            class="form-control">
                    </div>
                </div>
                <span id="passErr"></span>
            </div>
        </div>
        <div class="text-center mt-3">
            <button type="submit" class="btn btn-outline-success" id="submit">Sign Up</button>
        </div>
    </form> 

    <script>
        var apattern = /^[A-Za-z]+$/;
        var epattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        function validation() {
            var fname = document.form.fname.value;
            var lname = document.form.lname.value;
            var user = document.form.uname.value;
            var fathername = document.form.fathername.value;
            var email = document.form.email.value;
            var gender = document.form.gender.value;
            var sclass = document.form.sclass.value;
            var pass = document.form.pass.value;
            var cpass = document.form.cpass.value;
            var date = document.form.dob.value;

            if (fname == "" || lname == "" || user == "" || fathername == "" || email == "" || gender == "" || sclass == "" || pass == "" || date == "" || cpass == "") {
                if (fname == "") {
                    document.getElementById("nameErr").innerText = "First Name Must be Filled !";
                }
                else {
                    if (!fname.match(apattern)) {
                        document.getElementById("nameErr").innerText = "First Name Must be alphabets!";
                    }
                    else {
                        document.getElementById("nameErr").innerText = "";
                    }
                }
                if (lname == "") {
                    document.getElementById("lnameErr").innerText = "Last Name Must be Filled !";
                }
                else {
                    if (!lname.match(apattern)) {
                        document.getElementById("lnameErr").innerText = "Last Name Must be alphabets!";
                    }
                    else {
                        document.getElementById("lnameErr").innerText = "";
                    }
                }
                if (user == "") {
                    document.getElementById("userErr").innerText = "User Name Must be Filled !";
                    // return false;
                }
                else {
                    if (!user.match(apattern)) {
                        document.getElementById("userErr").innerText = "User Name Must be alphabets!";
                    }
                    else {
                        document.getElementById("userErr").innerText = "";
                    }
                }
                if (fathername == "") {
                    document.getElementById("fatherErr").innerText = "Father Name Must be Filled !";
                }
                else {
                    if (!fathername.match(apattern)) {
                        document.getElementById("fatherErr").innerText = "Father Name Must be in alphabets!";
                    }
                    else {
                        document.getElementById("fatherErr").innerText = "";
                    }
                }
                if (email == "") {
                    document.getElementById("emailErr").innerText = "Email Must be Filled !";
                } else {
                    if (!email.match(epattern)) {
                        document.getElementById("emailErr").innerText = "Email Must be Correct way or wrong email !";
                    }
                    else {
                        document.getElementById("emailErr").innerText = "";
                    }
                }
                if (gender == "") {
                    document.getElementById("genderErr").innerText = "Gender Must be checked !";
                }
                else {
                    document.getElementById("genderErr").innerText = "";
                }
                if (date == "") {
                    document.getElementById("dateErr").innerText = "DOB Must be Filled !";
                }
                else {
                    document.getElementById("dateErr").innerText = "";
                }
                if (sclass == "") {
                    document.getElementById("classErr").innerText = "Class Must be Selected !";
                }
                else {
                    document.getElementById("classErr").innerText = "";
                }
                // if (check == 0) {
                //     document.getElementById("subjectErr").innerText = "Subject is required field!";
                //     // return false
                // }
                // else {
                //     document.getElementById("subjectErr").innerText = "";
                //     // return false
                // }
                if (pass == "") {
                    document.getElementById("passErr").innerText = "Password is required field!";
                }
                else {
                    if (cpass == "") {
                        document.getElementById("passErr").innerText = "Repeat Password is required field!";
                    }
                    else {
                        if (cpass == pass) {
                            document.getElementById("passErr").innerText = "";
                        }
                        else {
                            document.getElementById("passErr").innerText = "Password must be same !";
                        }
                    }
                }
                return false;
            }
            else {
                alert("done");
            }
        };
    </script>
    <!-- <script>
        $(document).ready(function () {
            $('#sclass').on('click', function () {
                var sclass = $('#sclass').val();
                $.ajax({
                    url: "file/sub_class.php",
                    type: "POST",
                    data: {
                        sclass: sclass,
                    },
                    success: function (data) {
                        $("#subject").html(data);
                    }
                });
            });
        });
    </script> -->

<?php
include 'footer.php';
?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>


<?php
    include("class.php");
    if($_SERVER['REQUEST_METHOD']=="POST"){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $uname = $_POST['uname'];
        $ffname = $_POST['fathername'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $dob = $_POST['dob'];
        $sclass = $_POST['sclass'];
        $pass = $_POST['cpass'];
        $pass = password_hash($pass,PASSWORD_DEFAULT);
        $val = array($fname,$lname,$uname,$ffname,$email,$dob,$gender,$sclass,$pass);
        #keys of Table
        $key = array("fname","lname","uname","fathername","email","dob","gender","classid","cpass");
        $data = array_combine($key,$val);
        $insert = new DB();
        $id = $insert->insert('student',$data);
        // echo $id;
        // die(header("Location:all_student.php")); 
        echo "
        <script type='text/javascript'> 
            window.location.href='all_student.php' 
        </script>
    ";

    }
?>