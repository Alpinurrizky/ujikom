<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>laundry login</title>
</head>
<body>
  <form action="cek_login.php" method="post">
                    <?php if (isset($_GET['message'])) : ?>
                                <?= $_GET['message']; ?>
                            
                    <?php endif ?>
                    <div class="container">
                    <div class="logo"></div>
<div class="login-block">
    <h1>aplikasi laundry</h1>
    <input type="text"  placeholder="Username" name="username" />
    <input type="password"  placeholder="Password" name="password" />
    <button class="button" type="submit">LOGIN</button>
</div>
</body>
</html>