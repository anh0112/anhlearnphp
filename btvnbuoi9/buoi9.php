//bài 2
<?php
class Point2D {
    private $x;
    private $y;

    public function __construct($x, $y) {
        $this->x = $x;
        $this->y = $y;
    }

    public function calculateDistance($pointD) {
        $distanceX = $this->x - $pointD->x;
        $distanceY = $this->y - $pointD->y;
        $distance = sqrt(pow($distanceX, 2) + pow($distanceY, 2));
        return $distance;
    }
}

$point1 = new point2D(4, 3);
$point2 = new point2D(8, 6);

$distance = $point1->calculateDistance($point2);
echo "Distance between two points: " . $distance;
?>
//bài 3
<?php
class IntegerArray{
    private $array;


    public function __construct($array) {
        $this->array = $array;
    }


    public function sum() {
        return array_sum($this->array);
    }


    public function average() {
        $sum = $this->sum();
        $element = count($this->array);
        return $sum / $element;
    }


    public function elementMax() {
        return max($this->array);
    }
}

$array = new IntegerArray([1, 5, 3, 9, 7]);
echo "sum of array: " . $array->sum() . "<br>";
echo "Average of array: " . $array->average() . "<br>";
echo "The largest element of the array: " . $array->elementMax();
?>
//bài 4
<?php
class Clock {
    private $hour;
    private $minute;
    private $second;


    public function __construct($hour,$minute,$second) {
        $this->hour = $hour;
        $this->minute = $minute;
        $this->second = $second;
    }


    public function showTime() {
       $hourFormatted = str_pad($this->hour, 2, "0", STR_PAD_LEFT);
       $minuteFormatted = str_pad($this->minute, 2, "0", STR_PAD_LEFT);
       $secondFormatted = str_pad($this->second, 2, "0", STR_PAD_LEFT);
        echo "$hourFormatted:$minuteFormatted:$secondFormatted";
    }


    public function increaseSeconds() {
        $this->second++;
        if ($this->second >= 60) {
            $this->second = 0;
            $this->minute++;
            if ($this->minute >= 60) {
                $this->minute = 0;
                $this->hour;
                if ($this->hour >= 24) {
                    $this->hour= 0;
                }
            }
        }
    }
}


// Sử dụng lớp DongHo
$Clock = new Clock(10, 30, 45);
echo "The present time: ";
$Clock->showTime();
echo "<br>";
$Clock->increaseSeconds();
echo "Time after incrementing seconds: ";
$Clock->showTime();
?>
//bài5
<?php
class Student {
    private $code;
    private $name;
    public function __construct($code, $name) {
        $this->code = $code;
        $this->name = $name;
    }

    public function getCode() {
        return $this->code;
    }

    public function getName() {
        return $this->name;
    }
}
class studentList {
    private $list;
    public function __construct() {
        $this->list = array();
    }
    public function moreStudent($student) {
        $this->list[] = $student;
    }
    public function showList() {
        foreach ($this->list as $student) {
            echo "code: " . $student->getCode() . ", name: " . $student->getName() . "<br>";
        }
    }
}
$studentList = new studentList();
$student1 = new student("SV001", "Nguyễn Văn A");
$student2 = new student("SV002", "Trần Thị B");
$studentList->moreStudent($student1);
$studentList->moreStudent($student2);
echo "studentList: <br>";
$studentList->showList();
?>
//bài6
<?php
class Car {
    private $carCompany;
    private $color;
    private $yearManufacture;


    public function __construct($carCompany, $color, $yearManufacture) {
        $this->carCompany = $carCompany;
        $this->color = $color;
        $this->yearManufacture = $yearManufacture;
    }
    public function displayInformation() {
        echo "CarCompany: " . $this->carCompany . "<br>";
        echo "color: " . $this->color . "<br>";
        echo "year of manufacture: " . $this->yearManufacture . "<br>";
    }
}

$car = new Car("Toyota", "pink", 2002);
$car->displayInformation();
?>
//bài 7 
<?php
class fraction {
    private $numerator;
    private $denominator;

    public function __construct($numerator, $denominator) {
        $this->numerator = $numerator;
        $this->denominator = $denominator;
    }

    public function getNumerator() {
        return $this->numerator;
    }

    public function getDenominator() {
        return $this->denominator;
    }

    public function addFraction($fraction) {
        $newNumerator = $this->numerator * $fraction->getDenominator() + $this->denominator * $fraction->getNumerator();
        $newDenominator = $this->denominator * $fraction->getDenominator();
        return new fraction($newNumerator, $newDenominator);
    }

    public function subtractFraction($fraction) {
        $newNumerator = $this->numerator * $fraction->getDenominator() - $this->denominator * $fraction->getNumerator();
        $newDenominator = $this->denominator * $fraction->getDenominator();
        return new fraction($newNumerator, $newDenominator);
    }

    public function multiplyFraction($fraction) {
        $newNumerator = $this->numerator * $fraction->getNumerator();
        $newDenominator = $this->denominator * $fraction->getDenominator();
        return new fraction($newNumerator, $newDenominator);
    }

    public function divideFraction($fraction) {
        $newNumerator = $this->numerator * $fraction->getNumerator();
        $newDenominator = $this->denominator * $fraction->getDenominator();
        return new fraction($newNumerator, $newDenominator);
    }

    public function reduceFraction() {
        $ucln = $this->timUCLN($this->tuSo, $this->mauSo);
        $tuSoMoi = $this->numerator / $ucln;
        $mauSoMoi = $this->denominator / $ucln;
        return new fraction($newNumerator, $newDenominator);
    }
    private function timUCLN($a, $b) {
        while ($b != 0) {
            $temp = $a % $b;
            $a = $b;
            $b = $temp;
        }
        return abs($a);
    }
}

$fraction1 = new fraction(3, 4);
$fraction2 = new fraction(1, 2);

$add = $fraction1->addFraction($fraction2);
$subtract = $fraction1->subtractFraction($fraction2);
$multiply = $fraction1->multiplyFraction($fraction2);
$divide = $fraction1->divideFraction($fraction2);

echo "add: " . $add->getNumerator() . "/" . $add->getDenominator() . "<br>";
echo "subtract: " . $subtract->getNumerator() . "/" . $subtract->getDenominator() . "<br>";
echo "multiply: " . $multiply->getNumerator() . "/" . $multiply->getDenominator() . "<br>";
echo "divide: " . $divide->getNumerator() . "/" . $divide->getDenominator() . "<br>";
?>
//bài8
<?php
class People {
    private $name;
    private $age;
    private $address;

    public function __construct($name, $age, $address) {
        $this->name = $name;
        $this->age = $age;
        $this->address = $address;
    }

    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }

    public function getAddress() {
        return $this->address;
    }

    public function displayInformation() {
        echo "name: " . $this->name . "<br>";
        echo "age: " . $this->age . "<br>";
        echo "address: " . $this->address . "<br>";
    }
}

$people = new people("Nguyễn Văn A", 30, "Hà Nội");
$people->displayInformation();
?>
//bài 9
<?php
class product {
    private $name;
    private $price;
    private $describe;
    public function __construct($name, $price, $describe) {
        $this->name = $name;
        $this->price = $price;
        $this->describe = $describe;
    }
    public function getName() {
        return $this->name;
    }
    public function getPrice() {
        return $this->price;
    }
    public function getDescribe() {
        return $this->describe;
    }
    public function displayInformation() {
        echo "Product's name: " . $this->name . "<br>";
        echo "Price: " . $this->price . " usd<br>";
        echo "Describe: " . $this->describe . "<br>";
    }
}

$product = new product("smart phone", 5000000, "best high end phone");
$product->displayInformation();
?>
//bài10
<?php
class bookRoom {
    private $name;
    private $arrivalDate;
    private $numberOfNights;

    public function __construct($name, $arrivalDate, $numberOfNights) {
        $this->name = $name;
        $this->arrivalDate = $arrivalDate;
        $this->numberOfNights = $numberOfNights;
    }

    public function getName() {
        return $this->name;
    }

    public function getArrivalDate() {
        return $this->arrivalDate;
    }

    public function getNumberOfNights() {
        return $this->numberOfNights;
    }

    public function calculateTotalAmount($roomRates) {
        return $roomRates * $this->numberOfNights;
    }
}

$bookRoom = new bookRoom("Nguyễn Văn A", "2023-07-10", 5);
$roomRates = 1000000;

$totalMoney = $bookRoom->calculateTotalAmount($roomRates);
echo "customer name: " . $bookRoom->getName() . "<br>";
echo "Arrival date: " . $bookRoom->getArrivalDate() . "<br>";
echo "Number of nights stay: " . $bookRoom->getNumberOfNights() . "<br>";
echo "Total amount to pay: " . $totalMoney . " usd<br>";
?>



