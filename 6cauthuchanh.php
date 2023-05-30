<!--1.Viết chương trình PHP, sử dụng câu lệnh điều kiện if else để kiểm tra 1 số là số chẵn hay lẻ?-->

<?php
function checkEvenOdd($number)
{
    if($number % 2 == 0){
         return "$number là số chẵn"; 
    } else {
         return "$number là số lẻ"; 
    }
}

$number = 1;
echo checkEvenOdd($number);
?>


<!--2.Viết chương trình PHP, sử dụng câu lệnh if else để xếp hạng học lực của học sinh dựa trên điểm điểm thi giữa kỳ, điểm thi cuối kỳ.
Công thức tính điểm trung bình = (điểm giữa kỳ * 30%) + (điểm cuối kỳ * 70%)
Điểm trung bình >= 9.0 in ra là hạng "Xuất sắc".
Điểm trung bình >= 7.0 và < 9.0 in ra là hạng "Giỏi"
Điểm trung bình >= 5.0 và < 7.0 in ra là hạng "Khá"
Điểm trung bình < 5.0 in ra là hạng "Trung bình - Yếu"-->

<?php
function calculateAverage($midtermscore, $endtermscore)
{   
    $averagescore = ($midtermscore * 0.3) + ($endtermscore * 0.7);
    return $averagescore;
}

function academicrank($averagescore)
{
    if ($averagescore >= 9.0) {
        return "Xuất sắc";   
    } elseif ($averagescore >= 7.0 && $averagescore < 9.0) {
        return "Giỏi";     
    } elseif ($averagescore >= 5.0 && $averagescore < 7.0) {
        return "Khá";      
    } else {
        return "Trung bình - Yếu";    
    }
}

$midtermscore = 7.8;
$endtermscore = 9.7;

$averagescore = calculateAverage($midtermscore, $endtermscore);
$rank = academicrank($averagescore);
echo "Điểm trung bình: $averagescore\n";
echo "Xếp hạng học lực: $rank";
?>



<!--3.Kiểm tra năm nay là năm chẵn hay năm lẻ, in ra màn hình kết quả chẵn hay lẻ.-->

<?php
function checkEvenOddYear()
{
    $year = date('Y');
    
    if ($year % 2 == 0) {
        return "Năm $year là năm chẵn";  
    } else {
       return "Năm $year là năm lẻ";    
    }
}

echo checkEvenOddYear();
?>



<!--4.Viết chương trình PHP, sử dụng câu lệnh vòng lặp For để in ra số từ 1 đến 100.-->

<?php
function printNumbers()
{
    for ($i = 1; $i <= 100; $i++) {
        echo $i . " ";
    }
}

printNumbers();
?>



<!--5.Viết trang PHP hiển thị dãy số từ 1 đến 100 sao cho số chẵn là chữ in đậm, số lẻ là chữ in thường.Kết quả: 1 2 3 4….., 100 .Hướng dẫn: Sử dụng vòng lặp for, 1 biến đếm i, toán tử %.-->

<?php
function printNumbers()
{
    for ($i = 1; $i <= 100; $i++) {
        if ($i % 2 == 0) {
            echo "<b>$i</b> ";
        } else {
            echo "$i ";
        }
    }
}

printNumbers();
?>


<!--6.Viết chương trình PHP, sử dụng vòng lặp For each in ra các năm trong mảng có sẵn dưới đây:
$nam = array(1990, 1991, 1992, 1993, 1994, 1995);-->

<?php
function printYears($years)
{
    foreach ($years as $year) {
        echo $year . " ";
    }
}

$nam = array(1990, 1991, 1992, 1993, 1994, 1995);

printYears($nam);
?>