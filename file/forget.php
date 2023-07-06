<?php
require '../class.php';
session_start();
if(isset($_SESSION['user'])){
    session_destroy();
  }
  ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGD Public School</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <style>
        .box {
            max-width: 500px;
            margin: auto;
        }

        .gradient-custom {
            background: #f6d365;

            background: -webkit-linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1));

            background: linear-gradient(to right bottom, rgba(246, 211, 101, 1), rgba(253, 160, 133, 1))
        }

        body {
            overflow-x: hidden;
        }

        .d-fl {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            padding: 90px 0 0;
            box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
            z-index: 99;
        }

        main span {
            color: red;
        }

        @media (max-width: 767.98px) {
            .sidebar {
                top: 11.5rem;
                padding: 0;
            }
        }

        .navbar {
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, .1);
        }

        @media (min-width: 767.98px) {
            .navbar {
                top: 0;
                position: sticky;
                z-index: 999;
            }
        }

        .sidebar .nav-link {
            color: #333;
        }

        .sidebar .nav-link.active {
            color: #0d6efd;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="box p-4 bg-light rounded">
            <h4 class='text-success text-center'>
                Forget Password (Reset Now) !
            </h4>

            <form action="" method="post">
                <div class="p-3">
                    <label class="text-primary" for="email">Email: **</label>
                    <input type="email" name="email" required class="form-control " id="email">
                </div>
                <div class="p-3">
                    <label class="text-primary" for="user">User: **</label>
                    <input type="text" name="user" required class="form-control " id="user">
                </div>
                <div class="p-3">
                    <select name="utype" id="type" class="form-control">
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                    </select>
                </div>

                <button class="mx-3 mt-3 btn btn-success" id="submit" type='button'>Reset Password</button>

                <div class="mt-3 mx-3" id="message"></div>
            </form>
        </div>
        <script>
            $(document).ready(function() {
                $("#submit").click(function() {
                    var email = $('#email').val()
                    var user = $('#user').val()
                    var utype = $('#type').val()

                    if (email == "" || user == "" || utype == "") {
                        alert("Please Fill The all Options!!!")
                    } else {
                        $.ajax({
                            url: 'user_verify.php',
                            type: 'POST',
                            data: {
                                email:email,
                                utype:utype,
                                user: user,
                            },
                            success: function(data){
                                $('#message').html(data);
                            }
                        })
                    }
                })
            })
        </script>
    </div>
</body>