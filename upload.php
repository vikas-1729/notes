<?php
if(isset($_FILES['file']['name'])&&isset($_POST['rename'])&&($_POST['year']))
{ $name=$_FILES['file']['name'];$rename=$_POST['rename'];$year=$_POST['year'];
   if(!empty($name)&&!empty($rename)&&!empty($year))
    { $offset=0; 
        while($count=strpos($name,'.',$offset))
         { $offset=$count+1;}
          $ext= strtoupper(substr($name,$offset));
           if(($ext=='PDF')||($ext=='TXT')||($ext=='DOC')||($ext=='HTML')||($ext=='HTM')||($ext=='ZIP')||($ext=='JPEG')||($ext=='JPG'))
              {  $from=$_FILES['file']['tmp_name'];
                  $to='c:\xampp\htdocs\project\uploaded/';
              if(move_uploaded_file($from,$to.$rename))
                {echo 'file has been uploaded';}
                 else{ echo 'uploading failed';}
              
              }   
            else
              {echo  'plz put the valid extension';}
      }else{echo 'plz fill all the field';}
}
?><html>

<form action="upload.php" method="POST" enctype="multipart/form-data">
 <strong>Upload option:</strong><br><br>
  Choose a file to upload:<br>
<input type="file" name="file">
<br><br>Rename the file with extension:<br>
<input type ="text" name="rename" >
<br><br>Select the year<select name="year"><br>
     <option value="1st">first</option>
     <option value="2nd">second</option>
     <option value="3rd">third</option>
     <option value="4th">forth</option>
  </select>
<input type="submit" value="Submit"><br><br>

 <a href="uploaded/"><strong>VIEW UPLOADED FILE</strong></a><br><br>
 <a  href="faculty.php"><strong>BACK</strong></a>

</form>
</html>
       