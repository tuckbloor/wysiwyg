<div id="media">

	<div class="form_container">
<div class="formWrapper">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<label>Create Directory:</label><input type="text" name="directory" />
<input type="submit" name="submit" value="New Directory" />
</form>
<br />
<form id="imageform" method="post" enctype="multipart/form-data" action='ajaximage.php'>
<label>Upload your image:</label><input type="file" name="photoimg" id="photoimg" />
<input type="hidden" name="directory" value="" id="directory" />
</form>
</div>

<div id="preview"></div>

</div>

<?php

$directory = "uploads/";
 
//get all files in specified directory
$files = glob($directory . "*");
 
//print each file name
$i=1;
foreach($files as $file)
{
 //check to see if the file is a folder/directory
 if(is_dir($file))
 {
  $file = str_replace("uploads/", "", $file);
  echo "<div class=\"media_images\">";
  echo "<div class=\"folders\">";
  echo "<img src=\"images/folder.png\" alt=\"folder\" width=\"100\"/>";
  echo "<p style=\"text-align:center;\" id=\"dir-$i\">$file</p>";
  echo"</div>";
  echo "</div>";
  $i++;
 }
}
?>
<img src="images/icons/close.png" alt="close" id="closemedia" width="60" style="float: right" />
</div>