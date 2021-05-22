<?php
$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true

if (!$fileTmpLoc) { // if file not chosen
    echo "<p style='color:red'>ERROR: Please browse for a file before clicking the upload button.</p>";
    exit();
}
if(file_exists('uploads/'.$fileName))
{
	function get_ext($fname){ return substr($fname, strrpos($fname, ".") + 1); }
	$ext =get_ext($fileName);
	$actual_name = $fileName;
	$original_name = $actual_name;
	$na=pathinfo($fileName,PATHINFO_FILENAME);

	$i = 1;
	while(file_exists('uploads/'.$fileName))
	{           
    	$actual_name = $na." (".$i.")";
    	$name = $actual_name.".".$ext;
    	$fileName=$name;
    	$i++;
	}
	if(move_uploaded_file($fileTmpLoc, "uploads/".$fileName)){
    	echo "<p style='color:green;'>$name upload is complete with new name</p>";
	} 
	else
	{
    echo "<p style='color:red'>$name move_uploaded_file function failed</p>";
	}
}
else
{
	if(move_uploaded_file($fileTmpLoc, "uploads/$fileName")){
    	echo "<p style='color:green'>$fileName upload is complete</p>";
	} 
	else
	{
    echo "<p style='color:red'>move_uploaded_file function failed</p>";
	}
}
?>