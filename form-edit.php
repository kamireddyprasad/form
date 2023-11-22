<?php
 session_start();

 if(!isset($_SESSION['user_id'])) header("location:login.php");
 
require 'dbconfig.php';

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student Edit</title>
</head>
<body>

<div class="container mt-5">

    <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Student Edit
                        <a href="index.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                   <?php 
                       $efr_record_qry ="SELECT * FROM ".TABLE_FORM." where id=".$_GET['id'];
                       $efr_row = $obj_db->fetchRow($efr_record_qry);
                          ?>
                            <form action="code.php" method="POST">
                                <input type="hidden" name="student_id" value="<?php if(isset($efr_row['id'])) echo $efr_row['id'];?>">

                                <div class="mb-3">
                                    <label>Student Name</label>
                                    <input type="text" name="name" value="<?php if(isset($efr_row['name'])) echo $efr_row['name'];?>"
                                           class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Student Email</label>
                                    <input type="email" name="email" value="<?php if(isset($efr_row['email'])) echo $efr_row['email'];?>"
                                           class="form-control">
                                </div>

                                <div class="mb-3">
                                    <button type="submit" name="update_student" class="btn btn-primary">
                                        Update Student
                                    </button>
                                </div>

                            </form>
                           
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
