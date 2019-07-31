<?php
include('connect_data.php'); 
if(isset($_SESSION['student_no'])&&(!empty($_SESSION['student_no'])))
{ echo '<strong>'.'Welcome!'.$_SESSION['s_username'].' '.'<br>'.'STUDENT NO:'.$_SESSION['student_no'].
'</strong><br>you have logged in sucessfully';
   }
else
{header('Location:form.php');

}?>
<html>
<div style ="background-color:#dbe8c1;margin-radius:2px;float:right;margin-left:0px;margin-top:5px ;border:3px solid black;"><a href="logout_student.php"><strong>LOGOUT</strong></div>
 <br><br><a href="uploaded/"<strong>VIEW UPLOADED FILE</strong></a>
</html>

