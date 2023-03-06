<?php
  include 'conn.php';
  
  if (!empty($_GET)) {
    $id = $_GET["station"];
    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = 'SELECT status FROM led_stat WHERE station = ?';
    
    $q = $pdo->prepare($sql);
    $q->execute(array($id));
    
    Database::disconnect();
    while($data = $q->fetch(PDO::FETCH_ASSOC)) {
        echo $data['status'];
    }
  }
?>