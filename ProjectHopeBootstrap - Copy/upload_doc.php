<?php
$user = getuserfield('username');
echo $user;
$name = $_FILES['choose_file']['name'];
$tmp = $_FILES['choose_file']['tmp_name'];
$type = $_FILES['choose_file']['type'];
$ext = strtolower(substr(($name),strpos($name,'.')+1));
if(isset($name)){
	if(!empty($name)){
	echo 'OK'.'<br>';
	$location_doc = 'user_folders/'.$user.'/Documents/';
	//echo $location;
		if(($ext=='pdf'|| $ext=='txt') && move_uploaded_file($tmp,$location_doc.$name)){
		echo 'successfully uploaded';
		echo $user;
		}else{
		echo 'Error occurred while uploading '.$name;
		}
	}else{
	echo 'No File was chosen';
	}
}
?>
