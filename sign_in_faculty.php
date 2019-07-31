<?php
require ('connect_data.php');
if(isset($_POST['username'])&&($_POST['firstname'])&&($_POST['surname'])&&($_POST['usercode'])&&($_POST['password'])&&($_POST['password1'])&&($_POST['email_id']))
{$username=($_POST['username']);$firstname=($_POST['firstname']);$surname=($_POST['surname']);$usercode=($_POST['usercode']);$password=($_POST['password']);
$password1=$_POST['password1'];$email_id=$_POST['email_id'];echo 'the password is'.$usercode;
  if(!empty($username)&&!empty($firstname)&&!empty($surname)&&!empty($usercode)&&!empty($password)&&!empty($email_id)&&!empty($password1))
    { if($password==$password1)
        {$password=md5($password1);
           $query="SELECT `username` FROM `faculty` WHERE `f_id_no`= '$usercode' ";
           $query_run=mysqli_query($link,$query); 
          if($query_run==TRUE)
           {  $l=mysqli_num_rows($query_run);echo 'ojj'.$l;if($l==1)
             {$query="UPDATE `faculty` SET `firstname`='$firstname',`surname`='$surname',`email_id`='$email_id',`password`='$password'  WHERE `f_id_no`='".@mysqli_real_escape_string($link,$usercode)."'";
                $query_run=mysqli_query($link,$query);
                   if(@$query_run==TRUE)
                    {echo 'you have register sucessfully';mysqli_close($link);echo 'ok';
                      header('Location:form.php');
                    }else
                      {echo 'error'.mysqli_error($link);}
             }
             else
             {echo 'INVALID USERNAME OR PASSWORD';}   
           }
           else
           { echo 'Error:'.'mysqli_error()';}
        
        }else
        { echo 'password not match';}
      }else
      {echo 'plz fill all the field';}
        
}
?>
<html>
<link type="text/css" rel ="stylesheet" href="stylesheet1.css">
</head>

<form action ="sign_in_faculty.php" class="a" method ="POST">
<br><strong> <em> User name</em></strong><br>
<input type ="text" name ="username" maxlength= "25" class ="a" value ="<?php if(!empty($username)) echo $username;?>">
<br><br><strong> <em> FIRST NAME</em </strong><br>
<input type ="text" name ="firstname"  maxlength= "25" class="a" value ="<?php if(!empty($firstname)) echo $username;?>">
<br><br><strong><em>SURNAME</em></strong><br>
<input type ="text" name ="surname"class ="a" ><br>
<br><br><strong><em><color :red>USER CODE</em></strong><br>
<input type ="text" name="usercode" class="a"><br>
<br><br><strong> <em> PASSSWORD</em </strong><br>
<input type ="password" name ="password"class="a" ><br>
<br><br><strong> <em> PASSSWORD</em </strong><br>
<input type ="password" name ="password1" class="a" ><br>
<br><br><strong><em>EMAIL ID</em></strong><br><br>
<input type ="text" name ="email_id" maxlength="30" class="a" value="<?php if(!empty($email_id)) echo $email_id;?>"> 
<br><br><input type ="submit" value ="REGISTER">
 </form>
</html>