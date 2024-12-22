<?php
session_start();
include 'connectdb.php';

if (isset($_POST['update_profile'])){
    $acc_no = $_POST['acc_no'];
    $fname = mysqli_real_escape_string($connection, $_POST['fname']);
    $lname = mysqli_real_escape_string($connection, $_POST['lname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $dob = mysqli_real_escape_string($connection, $_POST['dob']);
    

   // if (!empty($fullname) && !empty($username) && !empty($email) && !empty($gender)){
        $query = mysqli_query($connection, "UPDATE account SET firstname = '$fname', lastname = '$lname', email = '$email', phone = '$phone', dob = '$dob' WHERE acc_no='$acc_no' ");
        if($query){
            
            $_SESSION['msg'] = "<div class='alert'>
			<span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
			<strong>Success!</strong> Profile Updated Successfully
			</div>";
            header("Location: edit_profile");
        }
   // }

}


if (isset($_POST['update_image'])){
    $acc_no = $_POST['acc_no'];
    $status = 1;
    if (isset($_FILES['image'])){
        //$dir = "images/";
        $filename = $_FILES['image']['name'];
        $filesize = $_FILES['image']['size'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $allowed = array('png', 'jpg', 'jpeg', 'gif');
        $fileext = explode('.', $filename);
        $fileactext = strtolower(end($fileext));
        //$newFileName = md5(time() . $fileName) . '.' . $fileExtension; 
        $newfile = time(). '_'. $_FILES['image']['name'];
        if($filesize > 2000000){
            $_SESSION['success'] = "File is too large";
            echo ("<script>location.href = 'edit_profile' ;</script>");
            exit();
        }else if(in_array($fileactext, $allowed)){
           $target = basename($newfile);
        if (move_uploaded_file($_FILES['image']['tmp_name'], "img/" .$target)){
            $query = "UPDATE account SET image='$target', image_status='$status' WHERE acc_no='$acc_no' ";
    $resi = mysqli_query($connection, $query);
    if($resi){
        $_SESSION['image'] = $target;
        $_SESSION['msg'] = "<div class='alert'>
        <span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
        <strong>Success!</strong> Profile Updated Successfully, you can now make transfers  
        </div>";
        header("Location: edit_profile");
        exit();
        }else{
            $_SESSION['msg'] = "<div class='alert'>
			<span class='closebtn' onclick='this.parentElement.style.display='none';'>&times;</span> 
			<strong>Error!</strong> Something went wrong
			</div>";
            header("Location: edit_profile");
            exit();
        } 
        }
        
    }
            

    
    }
}