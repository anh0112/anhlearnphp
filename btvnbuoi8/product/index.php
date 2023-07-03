<?php
    require_once "pdo.php";
    require_once "../category/pdo.php";
    $prod = getProdData();
    $categories = all();
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
            <a href="create.php" class="btn btn-primary" style="margin-right: 5px;">Create</a>
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
                    <form id="delete_<?= $value['prodId']?>" action="./delete.php" method="POST" style="display:flex">
                     <input type="hidden" value="<?= $value['prodId'] ?>" name="id">
                        <a href="./edit.php?id=<?= $value['prodId']?>" class="btn btn-dark" style="margin-right: 10px">Edit</a>
                           <button type="button" class="btn btn-danger" onclick="confirmDelete(<?= $value['prodId'] ?>)">Delete</button>
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