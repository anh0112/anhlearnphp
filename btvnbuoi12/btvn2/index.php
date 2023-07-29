<!DOCTYPE html>
<html>
<head>
    <title>Upload File PHP</title>
</head>
<body>
    <h1>Upload Image</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="image" id="image">
        <br>
        <input type="submit" name="submit" value="upload">
    </form>

    <div id="uploaded-image">
    </div>
</body>
</html>