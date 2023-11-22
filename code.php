<?php
session_start();
if(isset($_SESSION['user_id']) && $_SESSION['user_id']>0) header("location:index.php");
require 'dbconfig.php';

if(isset($_POST['btn_login']))
   {
      $uemail=$_POST['email'];
      $password=$_POST['password'];

      $sql ="SELECT * FROM ".TABLE_LOGIN." WHERE email='".$uemail."' AND password='".$password."'";
      $user_exists = $obj_db->fetchNum($sql);

    if($user_exists>0)
        {
        $row =$obj_db->fetchRow($sql);
        if($row['email']===$uemail && $row['password']=== $password)
        {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['status'] = "Registed/inserted successfully";
            $_SESSION['status_code'] = "success";
            header("location:index.php");
        }
        }
        else
        {
            $_SESSION['status'] = " Data Not Register/inserted ";
            $_SESSION['status_code'] = "error";
        }
}

if(isset($_POST['delete_student']))
{
    // $student_id = $_POST['delete_student'];

    $delete_emp_qry = "Delete from ".TABLE_FORM." where id=".$_POST['delete_student'];
    $delete_emp_exe = $obj_db->get_qresult($delete_emp_qry);

    if($delete_emp_exe)
    {
        $_SESSION['message'] = "Student Deleted Successfully";
        header("Location: index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Deleted";
        header("Location: index.php");
        exit(0);
    }
}

if(isset($_POST['update_student']))
{
    // $student_id = $_POST['student_id'];

    // $name = $_POST['name'];
    // $email = $_POST['email'];
    

    $efr = "UPDATE ".TABLE_FORM." SET name='".$_POST['name']."', email='".$_POST['email']."' where id=".$_POST['student_id'];
    $user_exe = $obj_db->get_qresult($efr);

    if($user_exe)
    {
        $_SESSION['message'] = "Student Updated Successfully";
        header("Location: index.php");
        exit(0);
      
    }
    else
    {
        $_SESSION['message'] = "Student Not Updated";
        header("Location: index.php");
        exit(0);
    }

}


if(isset($_POST['save_student']))
{
    // $name = $_POST['name'];
    // $email = $_POST['email'];
  

    $efr = "INSERT INTO ".TABLE_FORM." SET id='".$_POST['id']."',name='".$_POST['name']."', email='".$_POST['email']."'";

    $user_exe = $obj_db->get_qresult($efr);
    if($user_exe)
    {
        $_SESSION['message'] = "Student Created Successfully";
        header("Location:index.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Student Not Created";
        header("Location: index.php");
        exit(0);
    }
}

?>