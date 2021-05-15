<?php
try {
    $con = new PDO('mysql:host=localhost;dbname=hello','root','');
}catch (PDOException $e){
    var_dump("Database mengalami kesalahan dengan kode : " . $e->getMessage());
}
?>
