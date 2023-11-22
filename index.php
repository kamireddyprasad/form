<?php
 session_start();
require 'dbconfig.php';
if(!isset($_SESSION['user_id'])) header("location:login.php");
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Student CRUD</title>
</head>
<body>

<div class="container mt-4">

    <?php include('message.php'); ?>
     <div class="row  ">
        
     </div>
    <div class="row">
    <div class="col-md-12">
          <a href="login.php" class="btn btn-danger btn-sm mb-2 float-end">LOGOUT</a>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Student Details
                        <a href="form-create.php" class="btn btn-primary float-end">Add Students</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                         <?php
                                $agent_qry = "SELECT * FROM ".TABLE_FORM." order by id desc"; 
                                $agent_count =$obj_db->fetchNum( $agent_qry);
                                $i=0;
                                if($agent_count>0){
                                $agent_res =$obj_db->get_qresult( $agent_qry);
                                while( $agent_row = $obj_db->fetchArray( $agent_res))
                                {
                                $i++;
                             ?> 
                                <tr>
                                    <td> <?php echo $i; ?></td>
                                    <td> <?php if(isset($agent_row['name'])) echo $agent_row['name']; ?></td>
                                    <td> <?php if(isset($agent_row['email'])) echo $agent_row['email']; ?></td>
                                    <td>
                                        <a href="form-view.php?id=<?php echo $agent_row['id']; ?>"
                                           class="btn btn-info btn-sm">View</a>
                                        <a href="form-edit.php?id=<?php echo $agent_row['id']; ?>"
                                           class="btn btn-success btn-sm">Edit</a>
                                        <form action="code.php" method="POST" class="d-inline">
                                            <button type="submit" name="delete_student"
                                                    value="<?php echo $agent_row['id']; ?>" class="btn btn-danger btn-sm">Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            echo "<h5> No Record Found </h5>";
                        }
                        ?>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
