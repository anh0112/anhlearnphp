<?php
$DB_TYPE = "mysql";
$DB_HOST = "localhost";
$DB_NAME = "bai1pdo";
$USER_NAME = "root";
$USER_PASSWORD = "";

$conn = new PDO("$DB_TYPE:host=$DB_HOST;dbname=$DB_NAME", $USER_NAME, $USER_PASSWORD);
// Connect to database

// Create table
$stsm = $conn->prepare('CREATE TABLE IF NOT EXISTS `sinhvien` (
  `MaSV` varchar(10) NOT NULL,
  `Ho_ten` varchar(50) NOT NULL,
  `Ngay_sinh` date NOT NULL,
  `Lop_hoc` varchar(20) NOT NULL,
  `Diem_TB` float NOT NULL,
  PRIMARY KEY (`MaSV`)
)');
$result=$stsm-> execute();
if (!$result) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Table has been add in your data";
};

// Insert data
$stsm = $conn->prepare('INSERT INTO `sinhvien`(`MaSV`, `Ho_ten`, `Ngay_sinh`, `Lop_hoc`, `Diem_TB`) 
VALUE (?, ?, ?, ?, ?)');
$data = array('SV001','Nguyen Van A', '2002-01-10', 'K56SD1', '9.5');
$data2 = array('SV002','Nguyen Van B', '2002-02-10', 'K56SD1', '9.5');
$data3 = array('SV003','Nguyen Van C', '2002-03-10', 'K56SD1', '9.5');
$data4 = array('SV004','Nguyen Van D', '2002-04-10', 'K56SD1', '9.5');
$data5 = array('SV005','Nguyen Van E', '2002-05-10', 'K56SD1', '9.5');

$result=$stsm-> execute($data);
if (!$result) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "History transaction has been add in your data";
}
$result2=$stsm-> execute($data2);
if (!$result2) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "History transaction has been add in your data";
}
$result3=$stsm-> execute($data3);
if (!$result3) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "History transaction has been add in your data";
}
$result4=$stsm-> execute($data4);
if (!$result4) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "History transaction has been add in your data";
}
$result5=$stsm-> execute($data5);
if (!$result5) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "History transaction has been add in your data";
};

//Update data
$stsm = $conn->prepare("UPDATE sinhvien SET Diem_TB = ?  WHERE MaSV=?");
$data = [8.5,'SV001'];

$result=$stsm-> execute($data);
if (!$result) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Student's information has been update in your data";
};


//Delete data
$stsm = $conn->prepare("DELETE FROM sinhvien WHERE MaSV=?");
$data = ['SV003'];

$result=$stsm-> execute($data);
if (!$result) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Student's infor has been delete in your data";
};

?>