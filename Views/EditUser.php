<body>
<h1 style="margin-top:75px; margin-left:50px;">Change email and password <?= static::$curUser->name ?></h1>
<?= static::$message ?>
    <form method="POST">
       <p>New email      </p> <input type="text" name="email" placeholder="<?= static::$curUser->email ?>"> 
       <p>New password  </p> <input type="text" name="password"  placeholder="Password">
        <input type="submit" value="Change">
    </form>

</body>
</html>