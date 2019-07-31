<?php
require ('C:\xampp\htdocs\project\connect_data.php');
if(isset($_FILES['file']['name'])&&isset($_POST['rename']))
{ $name=$_FILES['file']['name'];$rename=$_POST['rename'];
   if(!empty($name)&&!empty($rename))
    { $offset=0; 
        while($count=strpos($name,'.',$offset))
         { $offset=$count+1;}
          $ext= strtoupper(substr($name,$offset));
           if(($ext=='PDF')||($ext=='TXT')||($ext=='DOC')||($ext=='HTML')||($ext=='HTM')||($ext=='ZIP')||($ext=='JPEG')||($ext=='JPG'))
              {$offset=0; 
        while($count=strpos($rename,'.',$offset))
         { $offset=$count+1;}
          $ext= strtoupper(substr($rename,$offset));
           if(($ext=='PDF')||($ext=='TXT')||($ext=='DOC')||($ext=='HTML')||($ext=='HTM')||($ext=='ZIP')||($ext=='JPEG')||($ext=='JPG'))
		   {$from=$_FILES['file']['tmp_name'];
                  $to='c:\xampp\htdocs\project\uploaded/';
              if(move_uploaded_file($from,$to.$rename))
                {echo 'file has been uploaded';
			$query="INSERT INTO `upload`(`file_name`) VALUES('$rename')";
            $query_run=mysqli_query($link,$query);
             if($query_run==true)
{ echo 'data has been entered succesfully';}
else
{echo 'error'.mysqli_error($link);}

			
				}
			
			
		   else{ echo 'uploading failed';}
		   }else{echo 'rename file has not allowed or valid extension';}
              }   
            else
              {echo  'plz put the valid extension';}
      }else{echo 'plz fill all the field';}
}
?><html>

<form action="uploads.php" method="POST" enctype="multipart/form-data">
 <strong>Upload option:</strong><br><br>
  Choose a file to upload:<br>
<input type="file" name="file">
<br><br>Rename the file with extension:<br>
<input type ="text" name="rename" >
<br><br>
<input type="submit" value="Submit"><br><br>

 <a href="uploaded/"><strong>VIEW UPLOADED FILE</strong></a><br><br>
 <a  href="faculty.php"><strong>BACK</strong></a>

</form>
</html>
       