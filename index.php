<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login smartclass</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="styles.css">
</head>
<body style="display:flex; align-items:center; justify-content:center;">
<div class="login-page">
    <div class="form">
        <form class="register-form" action="proses_login.php" method="POST">
            <h2><i class="fas fa-lock"></i> Login For Admin</h2>
            <input type="text" class="form-control" id="username" placeholder="username" name="username" required>
    <input type="password" class="form-control" id="password" placeholder="password" name="password" required>
            <button type="submit" class="btn btn-primary">Login</button>
            <p class="message">Login To Be User? <a href="javascript:void(0)">tap here</a></p>
        </form>
        <form class="login-form" action="proses_login.php" method="post">
            <h2><i class="fas fa-lock"></i> Login</h2>
            <input type="text" class="form-control" id="username" placeholder="username" name="username" required>
    <input type="password" class="form-control" id="password" placeholder="password" name="password" required>
            <button type="submit" class="btn btn-primary">Login</button>
            <p class="message">Login To Be Admin? <a href="javascript:void(0)">tap here</a></p>
        </form>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });
</script>
</body>
</html>
