<?php

// Thực hành sử dụng các hàm vừa học, tạo một file data.txt trong thư mục learn_php
// Kiểm tra thư mục tồn tại chưa có thì tạo mới
$dir = 'learn_php';
$file = 'data.txt';
$content = 'xin chào';

if (!file_exists($dir)) {
    mkdir($dir);
    echo " Đã tạo mới thư mục $dir";
}
else {
    echo"Thư mục $dir đã được tạo";
}

// Kiểm tra file có cho phép ghi không
if (is_writable($file)) {
    echo  " File $file cho phép ghi";
}
else {
    echo"File $file không cho phép ghi";
}
 
// Ghi file với nội dung: xin chào
$fp = fopen($dir . '/' . $file, 'w');
if (!$fp)
    echo "Không thể ghi vào file $file";
else {
    $data = 'xin chào';
    fwrite($fp, $data);
    echo " Đã ghi $data vào file $file";
}

// Đóng file
fclose($fp);

// Xóa file
unlink($dir . '/' . $file);

?>
