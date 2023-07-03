<?php
require_once 'pdo.php';
$data = [
'prodId' => $_POST['prodID'],
'prodName' => $_POST['prodName'],
'prodPrice' => $_POST['prodPrice'],
'cateId' => $_POST['cateId']
];
createNewProdData($data);
header("Location: http://localhost/learn_php/btvn8/product/index.php");
?>