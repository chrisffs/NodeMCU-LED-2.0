<?php     
  require 'conn.php';
  
  if (!empty($_POST)) {
    $Stat = $_POST['status'];
    $ID = $_POST['id'];
    // insert data
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE led_stat SET status = ? WHERE id = ?";
    $q = $pdo->prepare($sql);
    $q->execute(array($Stat, $ID));
    Database::disconnect();
    header("Location: index.php");
  }
?>