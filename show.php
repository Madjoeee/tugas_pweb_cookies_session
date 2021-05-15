<?php require "header.php"?>
<?php
session_start();

if (isset($_POST['logout'])){
    session_destroy();
    header('Location: index.php');
}
?>
<div class="container">
    <div class="card">
        <div class="card-header text-white bg-primary mb-3 text-center ">
            <h2>WELCOME</h2>
        </div>
        <div class="card-body">
            <div>
                <?= $_SESSION['email'];?>
            </div>
            <form method="post">
            <button type="submit" name="logout" class="btn btn-primary">Log Out</button>
            </form>
        </div>
    </div>
</div>
<?php require "footer.php"?>
