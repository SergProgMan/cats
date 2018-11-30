<body>
    <h1 style="margin-top:75px; margin-left:50px;">Registration</h1>
    <?= static::$message."<br>" ?>
    <form method = 'POST'>
        <input type="text" name="name" placeholder="Name">
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="password" placeholder="Password">
        <input type="submit" value="Submit">
    </form>
</body>
</html>