<?php
require "config.php";
require "header.php";?>
    <div class="container">
        <div class="card">
            <div class="card-header text-white bg-primary mb-3 text-center ">
                <h2>Halaman Login</h2>
            </div>

            <div class="card-body">
                <form method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email_login" value="<?php
                        if(isset($_COOKIE['email'])){echo $_COOKIE['email'];} ?>" id="email" placeholder="Enter email" required>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" name="password_login" value="<?php
                        if(isset($_COOKIE['password'])){echo $_COOKIE['password'];} ?>" id="password" placeholder="Password" required >
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="rm" id="rm">
                        <label class="form-check-label" for="exampleCheck1">Remember me</label>
                    </div>
                    <br>
                    <button type="submit" name="login" class="btn btn-primary">Login</button>
                    <button type="submit" name="register" class="btn btn-warning">Register</button>

                </form>
            </div>
        </div>
    </div>
<?php
if (isset($_POST["register"])){
    header('Location: register.php');}
if (isset($_POST["login"])){
    $email_log = $_POST["email_login"];
    $password_log = $_POST["password_login"];
    $data = "SELECT password FROM emails where email=:email";
    $statement = $con->prepare($data);
    $statement->bindValue(":email",$email_log);
    $statement->execute();
    $result = $statement->fetch();
    if ($password_log === $result['password']){
        session_start();
        $_SESSION['email'] = $email_log;
        $_SESSION['password'] = $result['password'];
        if (isset($_POST['rm'])){
            setcookie('email', $email_log, time() + (60 * 60), '/');
            setcookie('password',$result['password'] , time() + (60 * 60), '/');
        }else{
            setcookie('email', "", time() + (0), '/');
            setcookie('password',"" , time() + (0), '/');
        }
        header('Location: show.php');
    }
}


?>
<?php require "footer.php"?>