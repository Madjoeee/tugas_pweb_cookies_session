<?php
require "config.php";
require "header.php";
if (isset($_POST["simpan"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $statement = $con->prepare("INSERT INTO emails (email,password) VALUES (:email,:password)");
    if (!empty($email) && !empty($password)) {
        $statement->bindValue(":email", $email);
        $statement->bindValue(":password", $password);
        $statement->execute();
        $success = "Succesfully !";
    } else {
        $failed = "Data tidak boleh kosong !";
    }
}
if (isset($_POST["login_page"])){
    header('Location: index.php');}
?>

<div class="container">
    <div class="card">
        <div class="card-header text-white bg-secondary mb-3 text-center ">
            <h2>Register</h2>
        </div>

        <div class="card-body">
            <form method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" >

                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" >
                </div>
                <?php if (!empty($success)): ?>
                    <div class="alert alert-success">
                        <?= $success; ?>
                    </div>
                <?php endif; ?>
                <?php if (!empty($failed)): ?>
                    <div class="alert alert-danger">
                        <?= $failed; ?>
                    </div>
                <?php endif; ?>
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                <button type="submit" name="login_page" class="btn btn-warning">Login</button>
            </form>
        </div>
    </div>
</div>
<?php require "footer.php"?>