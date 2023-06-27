<?php
include '../shared/header.php';
include '../shared/navbar.php';
include '../general/env.php';
include '../general/functions.php';



if(isset($_POST['submit'])){
    $book_title = $_POST['book_title'];
    $book_author = $_POST['book_author'];
    $book_file = $_FILES['book_file']['name'];
    $book_temp = $_FILES['book_file']['tmp_name'];
    $book_folder = "../Book/".$book_file; 

    move_uploaded_file($book_temp, $book_folder);
    $sql = "INSERT INTO `book_info` VALUES (null,'$book_title', '$book_author', '$book_file')";
    mysqli_query($conn, $sql);
}
auth(2);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Upload Book</title>
</head>

<body>
    <h1 class="t1">Upload Your Book Here</h1>
    <form class="uploadForm" method="post" enctype="multipart/form-data">
        <label for="book_title">Book Title:</label>
        <input type="text" name="book_title" id="book_title" required><br><br>

        <label for="author_name">Author Name:</label>
        <input type="text" name="book_author" id="book_author" required><br><br>

        <label for="book_file">Book File:</label>
        <input type="file" name="book_file" id="book_file" required><br><br>

        <button name="submit" value="Upload">Upload</button>
    </form>
</body>

</html>