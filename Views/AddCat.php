<body>
    <h1 style="margin-top:75px; margin-left:50px;">Add cat image to upload</h1>
    <?= static::$message; ?>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name ="picture">
        <input type="submit" value="upload">    
    </form>    
</body>
</html>