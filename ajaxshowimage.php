<?php 

	$childDirectory = $_POST['directory'];

	$directory = "uploads/$childDirectory/";

//get all image files
	$images = glob($directory . "*");
 echo "<table>";
//print each file name
foreach($images as $image)
{
	echo "<tr><td><img src=\"$image\" height=\"70px\" class=\"image\" /></td><td><p>Width: <input name=\"width\" type=\"text\" value=\"300\" class=\"width\" style=\"width: 50px;\" />px</p><p>Height: <input name=\"height\" type=\"text\" value=\"300\" class=\"height\" style=\"width: 50px;\" />px</p></td><td><p>ALT: <input name=\"text\" type=\"text\" class=\"alt\" value=\"\" placeholder=\"Add Alt Text\"  /></p> <p>Style: <input name=\"text\" type=\"text\" class=\"style\" value=\"float:left; margin-right: 10px;\"  /></p></td><td><input name=\"directory\" type=\"hidden\" class=\"directory\" value=\"$childDirectory\"  /></td><td><img src=\"images/file-delete-icon.png\" class=\"delete\" alt=\"$image\" /></td><tr>";
}
echo "</table>";

?>