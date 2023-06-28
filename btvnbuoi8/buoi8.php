Action-create.php

<?php
require_once 'pdo.php';
$data = [
'prodId' => '',
'prodName' => $_POST['name'],
'prodPrice' => $_POST['price'],
'cateId' => $_POST['cateId']
];

createNewProdData($data);
header("Location: http://localhost/learn_php/product/index.php");
?>


update.php

<?php

require_once "pdo.php";
$data = [
'prodName' => $_POST['name'],
'prodPrice' => $_POST['price'],
'cateId' => $_POST['cateId'],
'id' => $_GET['id']
];


updateProdData($data);
header("Location: http://localhost/learn_php/product/index.php");
?>


create.php
<?php
require_once "pdo.php";
require_once "../category/pdo.php";
$cate = getData();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<title>Thêm mới sản phẩm</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>


<body>
<div class="container mt-3">
<a href="index.php" class="btn" style="margin-right: 5px"> < Back</a>
<h3>Create New Product</h3>
<form action="action-create.php" method="POST">
<div class="mb-3">
<label class="form-label">Name</label>
<input required type="text" class="form-control" name="name" placeholder="Enter name...">
</div>

<div class="mb-3">
<label class="form-label">Price</label>
<input required type="text" class="form-control" name="price" placeholder="Enter price...">
</div>

<div class="mb-3">
<label class="form-label">Category</label>
<select class="form-select" aria-label="Default select example" name="cateId">

<?php
foreach($cate as $value):
?>


<option value="<?=$value['id']?>"><?= $value['name'] ?></option>

<?php
endforeach;
?>


</select>
</div>
<button type="submit" class="btn btn-success">Create</button>
</form>
</div>
</body>
</html>
delete.php
<?php
    require_once 'pdo.php';
    $id = ['id' => $_POST['id']];
    deleteProdData($id);
    header("Location: http://localhost/learn_php/product/index.php");
?>
edit.php
<?php
    require_once "pdo.php";
    $cateArrs = getData();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Chỉnh sửa sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
        <a href="index.php" class="btn" style="margin-right: 5px"> < Back</a>
        <h3>Update Product</h3>
        <?php 
            $prodId = [
                'id' => $_GET['id']
            ];
            $prodArr = getOneProdData($prodId)[0];
            $cateId = [
                'id' => $prodArr['cateId']
            ];
            $cateArr = getOneData($cateId);
        ?>
        <form action="action-update.php?id=<?=$prodArr['prodId'] ?>" method="POST">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input required type="text" class="form-control" name="name" value="<?= $prodArr['prodName']?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Price</label>
            <input required type="text" class="form-control" name="price" value="<?= $prodArr['prodPrice']?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Category</label>
            <select class="form-select" aria-label="Default select example" name="cateId">
                <option selected value="<?= $cateArr[0]['id']?>"><?= $cateArr[0]['name']?></option>
                <?php 
                    foreach($cateArrs as $dataCate)
                        if($dataCate['id'] == $cateArr['id'])
                            continue;                             
                        else{?>
                            <option value="<?= $dataCate['id']?>"><?= $dataCate['name']?></option>
                <?php } ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        </form>
    </div>
</body>
</html>
index.php
<?php
    require_once "pdo.php";
    require_once "../category/pdo.php";
    $prod = getProdData();
    $cate = getData();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
        <div>
            <h3>List Products</h3>
            <a href="create.php" class="btn btn-success" style="margin-right: 5px;">Create</a>
        </div>
        <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">STT</th>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Caterory</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $stt = 1;
                foreach($prod as $value):
            ?>
            <tr>
                <td><?= $stt++; ?></td>
                <td><?= $value['prodId'] ?></td>
                <td><?= $value['prodName'] ?></td>
                <td><?= $value['prodPrice'] ?></td>
                <td><?= $value['name'] ?> </td>
                <td>
                    <form id="delete_<?= $value['prodId']?>" action="delete.php" method="POST" style="display:flex">
                        <a href="./edit.php?id=<?= $value['prodId']?>" class="btn btn-dark" style="margin-right: 5px">Edit</a>
                        <input type="hidden" value="<?= $value['prodId'] ?>" name="id">
                        <a class="btn btn-dark" onclick="confirmDelete(<?= $value['prodId'] ?>)">Delete</a>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>  
    </div>
<script>
    function confirmDelete(id) {
        let result = confirm('Are you sure?');
        if (result === true) {
            console.log(id);
            document.getElementById(`delete_${id}`).submit();
        }
    }
</script>
</body>
</html>
pdo.php
<?php
    require_once "../category/pdo.php";

    // Lấy dữ liệu ra nè
    function getProdData(){
        $sql = "SELECT * FROM product INNER JOIN category ON product.cateId = category.id";
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
        $sql = "INSERT INTO product VALUES (:prodId, :prodName, :prodPrice, :cateId)";
        $create = prepareSQL($sql);
        $create->execute($data);
    }

    function updateProdData($data){
        $sql = "UPDATE product SET prodName = :prodName, prodPrice = :prodPrice, cateId = :cateId  WHERE prodId = :id";
        $update = prepareSQL($sql);
        $update->execute($data);
    }
    function deleteProdData($data){
        $sql = "DELETE FROM product WHERE prodId = :id";
        $update = prepareSQL($sql);
        $update->execute($data);
    }
?>




