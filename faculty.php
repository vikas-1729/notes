<html>
<head>
<link type ="text/css" rel="stylesheet" href="stylesheet1.css"/>

 <div id="faculty"<?php
include('connect_data.php'); 
if(isset($_SESSION['f_id_no'])&&(!empty($_SESSION['f_id_no'])))
{ echo '<strong>Welcome! MR'.$_SESSION['f_username'].' '.'USERCODE:'.$_SESSION['f_id_no'].'</strong>'.'<br>hlo  you have logged in sucessfully'.'</br>';
   
}
else
{header('Location:form.php');
}?></div>
<html>
<body>
<div style ="background-color:#FFFFFF;border-radius:2px;float:right;margin-top:5px ;border:3px solid black"><a href="logout_faculty.php">
<strong>LOGOUT</strong></div>
<a href="upload.php"<strong>Upload OPTION</strong></a><br><br>
 <a href="uploaded/"<strong>VIEW UPLOADED FILE</strong></a>
</html>


<!--<head>
<link type="text/css" rel="stylesheet" href="facultystylesheet.css">
<body>
<div id="a">VIEW UPLOADED FILE</div>
<div id="b" >UPLOAD FILES</div>
<div id="c">LOG OUT</div>
</body>
</html>*//-->