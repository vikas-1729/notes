<?php
require ('connect_data.php');
if(isset($_POST['username'])&&($_POST['firstname'])&&($_POST['surname'])&&($_POST['student_no'])&&($_POST['password'])&&($_POST['password1'])&&($_POST['email_id']))
{$username=($_POST['username']);$firstname=($_POST['firstname']);$surname=($_POST['surname']);$student_no=($_POST['student_no']);$password=($_POST['password']);
$password1=$_POST['password1'];$email_id=$_POST['email_id'];
  if(!empty($username)&&!empty($firstname)&&!empty($surname)&&!empty($student_no)&&!empty($password)&&!empty($email_id)&&!empty($password1))
    { if($password==$password1)
        {$password=md5($password1);
           $query=" INSERT INTO `student` VALUES ('$username','$student_no','$firstname','$surname','$email_id','$password') ";
           $query_run=mysqli_query($link,$query); 
          if($query_run==TRUE)
                    {  echo 'you have register sucessfully';mysqli_close($link);echo 'ok';
                      header('Location:form.php');
                    }else
                      {echo 'error'.mysqli_error($link);}
             
            
        
        }else
        { echo 'password not match';}
      }else
      {echo 'plz fill all the field';}
        
}
?>
<html>
<link type="text/css" rel ="stylesheet" href="stylesheet1.css">
</head>
<form action ="sign_in_student.php" method ="POST">
<br><strong> <em> User name</em></strong><br>
<input type ="text" name ="username"  maxlength= "25" class="a" value ="<?php if(!empty($username)) echo $username;?>">
<br><br><strong><em> STUDENT NO</em></strong><br>
<input type ="text" name ="student_no" maxlength="12" class="a" value="<?php if(!empty($student_no)) echo $student_no;?>">
<br><br><strong> <em> FIRST NAME</em </strong><br>
<input type ="text" name ="firstname"  maxlength= "25" class="a" value ="<?php if(!empty($firstname)) echo $firstname;?>">
<br><br><strong><em>SURNAME</em></strong><br>
<input type ="text" name ="surname" maxlength="25" class="a" value ="<?php if(!empty($firstname)) echo $firstname;?>">
<br><br><strong> <em> PASSSWORD</em </strong><br>
<input type ="password" name ="password" class="a" ><br>
<br><br><strong> <em> PASSSWORD</em </strong><br>
<input type ="password" name ="password1" class="a"><br>
<br><br><strong><em>EMAIL ID</em></strong><br><br>
<input type ="text" name ="email_id" maxlength="30" class="a"value="<?php if(!empty($email_id)) echo $email_id;?>"> 
<br><br><input type ="submit" value ="REGISTER">
 </form>
