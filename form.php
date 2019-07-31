<?php
require('connect_data.php');
if((isset($_POST['f_id_no']))&&(isset($_POST['f_username']))&&(isset($_POST['f_password']))&&!empty($_POST['f_id_no'])&&!empty($_POST['f_username'])
&&!empty($_POST['f_password']))
{$f_id_no=$_POST['f_id_no'];
$f_username=$_POST['f_username'];
$f_password1=$_POST['f_password'];$f_password=md5($f_password1);
   $query="SELECT `f_id_no`,`password` FROM `faculty` WHERE `username`='".mysqli_real_escape_string($link,$f_username)."' ";
  $query_run=mysqli_query($link,$query);
    if($query==TRUE)
      {$row=mysqli_fetch_assoc($query_run);
        if(mysqli_num_rows($query_run)==1)
         {  $password=$row['password'];
          if($password==$f_password)  
            {if($f_id_no==$row['f_id_no'])
                   {$_SESSION['f_id_no']=$row['f_id_no'];$_SESSION['f_username']=$f_username;
                   header('Location:faculty.php');
                   } 
                   else
                   { echo '<strong><em>'.'incorrect user_code'.'</em></strong>';}
            }else
            {echo 'PASWORD IS INCORRECT';  
            }
 
        }     
        else
        { echo 'invalid login plzz check your entry again';}
       
      } 
      else 
      { echo 'error:mysqli_error($link)'; }
     
}

 if((isset($_POST['student_no']))&&(isset($_POST['username']))&&(isset($_POST['password'])))
{$student_no=$_POST['student_no'];
$username=$_POST['username'];
$password1=($_POST['password']);$password=md5($password1);
  if(!empty($student_no)&&!empty($username)&&!empty($password1))
 { $query="SELECT `student_no`,`password` FROM `student` WHERE `username`='".mysqli_real_escape_string($link,$username)."' ";
  $query_run=mysqli_query($link,$query);
    if($query==TRUE)
      {$row=mysqli_fetch_assoc($query_run);echo 'query is true';
        if(mysqli_num_rows($query_run)==1)
        {  $s_password=$row['password'];
          if($password==$s_password)  
            {if($student_no==$row['student_no'])
               { $_SESSION['student_no']=$row['student_no'];$_SESSION['s_username']=$username;
                 header('Location:student.php');
                 }else
                  { echo '<strong><em>'.'incorrect user_code'.'</em></strong>';}
            }else
            {echo 'PAASWORD IS INCORRECT';  
            }
 
        }     
        else
        {echo '<em>'.'you aren\'t register'.'<br>'.'Plzz register first'.'<em>';
        }
      }    
      else
      { echo 'ERROR:'.mysqli_error($link);
      }  
 }
 else 
{echo 'plzz fill all field';}


}
?>


<html>
<head>
<link type ="text/css" rel="stylesheet" href="stylesheet1.css"/>
<body>
<p style ="margin:auto;text-align:center;width:200px;height:50px;border-radius:2px;border:5px solid green;font-size:30px;margin-top:10px;background-color:red;font-familt:Italic;">NOTES.COM</p>
<form action ="form.php" method ="POST">
<fieldset id ="fieldset1">
<div id="log"> LOG IN</div><a href ="sign_in_faculty.php"> <div id ="sign_in" >SIGN UP AS A FACULTY</div></a>
<br><strong> <em> FACULTY ID NO</em </strong><br>
<input type ="password" name ="f_id_no" class = "a" maxlength= "25" >
<br><br><strong> <em> USER NAME</em </strong><br>
<input type ="text" name ="f_username" class = "a" maxlength= "25">
<br><br><strong> <em> PASSSWORD</em </strong><br>
<input type ="password" name ="f_password" class ="a"><br>
<br><input type ="submit"  class="submit" value="LOGIN">
</fieldset>

<fieldset id ="fieldset2">
<div id="log"> LOG IN</div><a href ="sign_in_student.php"> <div id ="sign_in" >SIGN UP AS A STUDENT</div></a>
<br><strong> <em> STUDENT NO</em </strong><br>
<input type ="text" name ="student_no" class = "b" maxlength= "25">
<br><br><strong> <em> USER NAME</em </strong><br>
<input type ="text" name ="username" class = "b" maxlength= "25" >
<br><br><strong> <em> PASSSWORD</em </strong><br>
<input type ="password" name ="password" class ="b"><br><br>
<input type ="submit" class="submit" value ="LOGIN">
</fieldset> </form></body>
</html>