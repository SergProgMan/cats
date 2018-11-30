
<body>
    <h1 style="margin-top:75px; margin-left:50px;">Login</h1>
    <?= static::$message ?>
    <form method="POST">
        <input type="text" name="name" placeholder="Name"> 
        <input type="text" name="password"  placeholder="Password">
        <input type="submit" value="Login">
    </form>
</body>
</html>