<?php
require_once('registration-script.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="form">
                <h4>Register user</h4>
                <p class="text-success text-center"><?php echo $register; ?></p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                    <div class="form-group">
                        <label for="first_name">First name:</label>
                        <input type="text" class="form-control" name="first_name" value="<?php echo $set_firstName;?>">
                        <p class="error-message">
                            <?php if($fnameErr!=1){ echo $fnameErr; }?>
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="last_name">Last name:</label>
                        <input type="text" class="form-control" name="last_name" value="<?php echo $set_lastName;?>">
                        <p class="error-message">
                            <?php if($lnameErr!=1){ echo $lnameErr; }?>
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $set_email;?>">
                        <p class="error-message">
                            <?php if($emailErr!=1){ echo $emailErr; }?>
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="pswd">Password:</label>
                        <input type="password" class="form-control" name="password">
                        <p class="error-message">
                            <?php if($passErr!=1){ echo $passErr; }?>
                        </p>
                    </div>

                    <div class="form-group">
                        <label for="pswd">Confirm password:</label>
                        <input type="password" class="form-control" name="confirm_pass">
                        <p class="error-message">
                            <?php if($cpassErr!=1){ echo $cpassErr; }?>
                        </p>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit">Register</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>