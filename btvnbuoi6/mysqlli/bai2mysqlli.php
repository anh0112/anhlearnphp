<?php
    $servername = "localhost";
    $database = "bai2mysqlli";
    $username = "root";
    $password = "";
//connect
    $connection = mysqli_connect($servername, $username, $password);

    if(!$connection)
        die("Not connect". mysqli_error());
    if(!mysqli_select_db( $connection, $database))  
        die("Not found database". mysqli_error());  
        
//tạo bảng lichsugiaodich
$sql_stmt = "CREATE table lichsugiaodich(
    maGD nvarchar(10) not null PRIMARY key,
    ngayGD datetime,
    loaiGD nvarchar(20),
    soTien int,
    moTa nvarchar(50)
    );";
$result = mysqli_query($connection, $sql_stmt);
if(!$result)
    die ("Create failed".mysqli_error());
else {
    echo "Create success";
}

// Thêm mới
$sql_stmt = "INSERT INTO lichsugiaodich VALUES
    ('GD001','2023-06-20', N'Rút tiền',500, N'rút tiền ATM'),
    ('GD002','2023-07-21', N'Rút tiền',400, N'rút tiền ATM'),
    ('GD003','2023-08-22', N'Chuyển tiền',200, N'Chuyển tiền ATM'),
    ('GD004','2023-09-23', N'Rút tiền',1600, N'rút tiền ATM'),
    ('GD005','2023-10-24', N'Rút tiền',1200, N'rút tiền ATM')"; 
$result = mysqli_query($connection, $sql_stmt);
    if (!$result) {
        die("Thêm thất bại"); 
        // Thông báo lỗi nếu thực thi câu lệnh thất bại
    } else {
        echo "Thêm thành công";
    }

// Update
$sql_update = "UPDATE lichsugiaodich SET soTien = 1000 WHERE maGD = 'GD003'";
$result = mysqli_query($connection,$sql_update);
    if (!$result) {
        die("Thất bại: " . mysqli_error($connection)); 
        // Thông báo lỗi nếu thực thi câu lệnh thất bại
    } else {
        echo "<br> Cập nhật thành công";
    }
   
// Xoá
$sql_stmt = "DELETE FROM lichsugiaodich WHERE maGD = 'GD005'"; 
$result = mysqli_query($connection,$sql_stmt ); 
    if (!$result) {
        die("Xoá thất bại: " . mysqli_error($connection)); 
        // Thông báo lỗi nếu thực thi câu lệnh thất bại
    } else {
        echo "<br> Xoá thành công";
    }

//Hiển  thị: 
$sql_stmt = "SELECT * FROM lichsugiaodich";

$result = mysqli_query($connection, $sql_stmt);
if(!$result)
die("select failed:");
$rows = mysqli_num_rows($result); 

if ($rows) {
    while ($row = mysqli_fetch_array($result)) {         
        echo 'Mã GD: ' . $row['maGD'] . '<br>';                
        echo 'Ngày GD: ' . $row['ngayGD'] . '<br>';         
        echo 'Loại GD: ' . $row['loaiGD'] . '<br>';         
        echo 'Số tiền: ' . $row['soTien'] . '<br>';
        echo 'Mô tả: ' . $row['moTa'] . '<br>';                
    } 
} 

//create table Sản phẩm
$sql_stmt = "CREATE table SANPHAM (
    MaSP varchar (10) not null PRIMARY KEY,
    TenSP nvarchar (50),
    Giaban int,
    SLTK int
    );";
$result = mysqli_query ($connection, $sql_stmt); //thuc hien
    if(!$result){ 
    die ("Create failed".mysqli_error());}
    else {
    echo "Create success";
    }
    
//thêm mới sản phẩm 
 $sql_stmt = "INSERT INTO SANPHAM VALUES('SP006', N'Điện thoại Samsung Galaxy A52', 6500000, 20)"; 
$result = mysqli_query($connection, $sql_stmt);
    if (!$result) {
        die("Thêm thất bại"); 
        // Thông báo lỗi nếu thực thi câu lệnh thất bại
    } else {
        echo "Thêm thành công";
    }

    mysqli_close($connection);
?>