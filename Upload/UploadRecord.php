<?php
include '../shared/header.php';
include '../shared/navbar.php';
include '../general/env.php';
include '../general/functions.php';



if(isset($_POST['submit'])){
    $record_title = $_POST['record_title'];
    $record_author = $_POST['record_author'];
    $record_file = $_FILES['record_file']['name'];
    $record_temp = $_FILES['record_file']['tmp_name'];
    $record_folder = "../Record/".$record_file; 

    move_uploaded_file($record_temp, $record_folder);
    $sql = "INSERT INTO `record_info` VALUES (null,'$record_title', '$record_author', '$record_file')";
    mysqli_query($conn, $sql);
}
auth(1);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload Record Here</title>
</head>
<body>
		<h1 class="t1">Upload Your Record Here</h1>
	<form class="uploadForm"  method="post" enctype="multipart/form-data">
		<label for="record_title">Record Title:</label>
		<input type="text" name="record_title" id="record_title" required><br><br>
		
		<label for="record_author">Author Name:</label>
		<input type="text" name="record_author" id="record_author" required><br><br>
		
		<label for="book_file">Record File:</label>
		<input type="file" name="record_file" id="record_file" required><br><br>
		
		<button  name="submit" value="UploadRecord">Upload Record</button>
	</form>
</body>
</html>
