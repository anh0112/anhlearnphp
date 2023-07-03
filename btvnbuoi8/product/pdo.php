<?php
    require_once "../category/pdo.php";


    function getProdData(){
        $sql = "SELECT * FROM product INNER JOIN categories ON product.cateId = categories.id";
        $select = prepareSQL($sql);
        $select->execute();
        return $select->fetchAll();
    }


    function getOneProdData($data){
        $sql = "SELECT * FROM product WHERE prodId = :id";
        $select = prepareSQL($sql);
        $select->execute($data);
        return $select->fetchAll();
    }


    function createNewProdData($data){
        $sql = "INSERT INTO product (prodId,prodName,prodPrice,cateId)VALUES (:prodId, :prodName, :prodPrice, :cateId)";
        $create = prepareSQL($sql);
        $create->execute($data);
    }


    function updateProdData($data){
        $sql = "UPDATE product SET  prodName = :prodName, prodPrice = :prodPrice, cateId = :cateId  WHERE prodId = :id";
        $update = prepareSQL($sql);
        $update->execute($data);
    }
    function deleteProdData($data){
        $sql = "DELETE FROM product WHERE prodId = :id";
        $update = prepareSQL($sql);
        $update->execute($data);
    }
    
function findByprodId($data) {
    $sql = "SELECT * FROM product where prodId=:id";
    $stmt = prepareSQL($sql);
    $stmt->execute($data);
    return $stmt->fetch();
}

?>

