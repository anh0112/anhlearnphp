<!--Bài tập Abstract-->
<!--Câu 1.Tạo một class trừu tượng "Shape" (Hình dạng) có một phương thức trừu tượng là "calculateArea". Tạo các lớp con "Circle" (Hình tròn) và "Rectangle" (Hình chữ nhật) kế thừa từ lớp Shape và triển khai phương thức calculateArea cho từng hình.-->
<?php
abstract class Shape {
    abstract public function calculateArea();
}


class Circle extends Shape {
    private $radius;


    public function __construct($radius) {
        $this->radius = $radius;
    }


    public function calculateArea() {
        return pi() * pow($this->radius, 2);
    }
}


class Rectangle extends Shape {
    private $width;
    private $height;


    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }


    public function calculateArea() {
        return $this->width * $this->height;
    }
}


// Sử dụng các lớp con để tính diện tích của hình tròn và hình chữ nhật


$circle = new Circle(5);
echo "Circle Area: " . $circle->calculateArea() . "\n";


$rectangle = new Rectangle(4, 6);
echo "Rectangle Area: " . $rectangle->calculateArea() . "\n";
?>

	
<!-- Câu 2.Tạo một abstract class "Animal" (Động vật) với một phương thức trừu tượng là "makeSound". Tạo các lớp con "Dog" (Chó) và "Cat" (Mèo) kế thừa từ lớp Animal và triển khai phương thức makeSound theo cách riêng của từng loại động vật.-->
<?php
abstract class Animal {
    abstract public function makeSound();
}
class Dog extends Animal {
    public function makeSound() {
        echo "woof woof!";
    }
}
class Cat extends Animal {
    public function makeSound() {
        echo "Meo meo!";
    }
}
// Sử dụng các lớp con để gọi phương thức makeSound()
$dog = new Dog();
$dog->makeSound(); // Output: Gâu gâu!
$cat = new Cat();
$cat->makeSound(); // Output: Meo meo!
?>

<!-- Câu 3.Tạo một abstract class "Employee" (Nhân viên) với các thuộc tính trừu tượng như "name" (tên) và "salary" (mức lương). Tạo các lớp con "Manager" (Quản lý) và "Staff" (Nhân viên) kế thừa từ lớp Employee và triển khai các thuộc tính và phương thức theo cách riêng của từng lớp.-->
<?php
abstract class Employee {
    protected $name;
    protected $salary;
    public function __construct($name, $salary) {
        $this->name = $name;
        $this->salary = $salary;
    }
    abstract public function calculateBonus();
    public function getName() {
        return $this->name;
    }
    public function getSalary() {
        return $this->salary;
    }
}
class Manager extends Employee {
    private $bonusPercentage;
    public function __construct($name, $salary, $bonusPercentage) {
        parent::__construct($name, $salary);
        $this->bonusPercentage = $bonusPercentage;
    }
    public function calculateBonus() {
        return $this->salary * ($this->bonusPercentage / 100);
    }
}
class Staff extends Employee {
    private $overtimeHours;
    private $hourlyRate;
    public function __construct($name, $salary, $overtimeHours, $hourlyRate) {
        parent::__construct($name, $salary);
        $this->overtimeHours = $overtimeHours;
        $this->hourlyRate = $hourlyRate;
    }
    public function calculateBonus() {
        return 0; // Staff không có tiền thưởng
    }
    public function calculateOvertimePay() {
        return $this->overtimeHours * $this->hourlyRate;
    }
}
// Sử dụng các lớp con để tạo đối tượng và truy cập các thuộc tính và phương thức
$manager = new Manager("John Doe", 5000, 20);
echo "Manager Name: " . $manager->getName() . "\n";
echo "Manager Salary: " . $manager->getSalary() . "\n";
echo "Manager Bonus: " . $manager->calculateBonus() . "\n";
$staff = new Staff("Jane Smith", 2000, 10, 15);
echo "Staff Name: " . $staff->getName() . "\n";
echo "Staff Salary: " . $staff->getSalary() . "\n";
echo "Staff Bonus: " . $staff->calculateBonus() . "\n";
echo "Staff Overtime Pay: " . $staff->calculateOvertimePay() . "\n";
?>

<!--Câu 4.Tạo một abstract class "Vehicle" (Phương tiện) với một phương thức trừu tượng là "start". Tạo các lớp con "Car" (Xe hơi) và "Motorcycle" (Xe máy) kế thừa từ lớp Vehicle và triển khai phương thức start theo cách riêng của từng loại phương tiện.-->
<?php
abstract class Vehicle {
    abstract public function start();
}
class Car extends Vehicle {
    public function start() {
        echo "Car is starting the engine.\n";
    }
}
class Motorcycle extends Vehicle {
    public function start() {
        echo "Motorcycle is kick-starting.\n";
    }
}


// Sử dụng các lớp con để gọi phương thức start()
$car = new Car();
$car->start(); // Output: Car is starting the engine.
$motorcycle = new Motorcycle();
$motorcycle->start(); // Output: Motorcycle is kick-starting.
?>

<!--Câu 5.Tạo một abstract class "Database" (Cơ sở dữ liệu) với các phương thức trừu tượng như "connect", "query" và "disconnect". Tạo các lớp con "MySQLDatabase" và "PostgreSQLDatabase" kế thừa từ lớp Database và triển khai các phương thức theo cách riêng của từng loại cơ sở dữ liệu.-->
<?php
abstract class Database {
    abstract public function connect();
    abstract public function query($sql);
    abstract public function disconnect();
}


class MySQLDatabase extends Database {
    public function connect() {
        echo "Connecting to MySQL database.\n";
        // Code kết nối đến cơ sở dữ liệu MySQL
    }


    public function query($sql) {
        echo "Running MySQL query: $sql\n";
        // Code thực thi câu truy vấn trên cơ sở dữ liệu MySQL
    }


    public function disconnect() {
        echo "Disconnecting from MySQL database.\n";
        // Code ngắt kết nối cơ sở dữ liệu MySQL
    }
}


class PostgreSQLDatabase extends Database {
    public function connect() {
        echo "Connecting to PostgreSQL database.\n";
        // Code kết nối đến cơ sở dữ liệu PostgreSQL
    }


    public function query($sql) {
        echo "Running PostgreSQL query: $sql\n";
        // Code thực thi câu truy vấn trên cơ sở dữ liệu PostgreSQL
    }


    public function disconnect() {
        echo "Disconnecting from PostgreSQL database.\n";
        // Code ngắt kết nối cơ sở dữ liệu PostgreSQL
    }
}


// Sử dụng các lớp con để gọi phương thức connect, query và disconnect


$mysql = new MySQLDatabase();
$mysql->connect(); // Output: Connecting to MySQL database.
$mysql->query("SELECT * FROM users"); // Output: Running MySQL query: SELECT * FROM users
$mysql->disconnect(); // Output: Disconnecting from MySQL database.


$postgres = new PostgreSQLDatabase();
$postgres->connect(); // Output: Connecting to PostgreSQL database.
$postgres->query("SELECT * FROM employees"); // Output: Running PostgreSQL query: SELECT * FROM employees
$postgres->disconnect(); // Output: Disconnecting from PostgreSQL database.
?>



<!--Bài tập Interface:-->
<!--Câu 1.Tạo một interface "Resizable" (Có thể điều chỉnh kích thước) với một phương thức là "resize". Tạo một lớp "Rectangle" (Hình chữ nhật) và triển khai interface Resizable để thay đổi kích thước của hình chữ nhật.-->
<?php
interface Resizable {
    public function resize($percentage);
}


class Rectangle implements Resizable {
    private $width;
    private $height;


    public function __construct($width, $height) {
        $this->width = $width;
        $this->height = $height;
    }


    public function resize($percentage) {
        $this->width *= (1 + ($percentage / 100));
        $this->height *= (1 + ($percentage / 100));
    }


    public function getWidth() {
        return $this->width;
    }


    public function getHeight() {
        return $this->height;
    }
}


// Sử dụng lớp Rectangle để thay đổi kích thước của hình chữ nhật


$rectangle = new Rectangle(10, 5);
echo "Original Width: " . $rectangle->getWidth() . "\n"; // Output: Original Width: 10
echo "Original Height: " . $rectangle->getHeight() . "\n"; // Output: Original Height: 5


$rectangle->resize(50);
echo "Resized Width: " . $rectangle->getWidth() . "\n"; // Output: Resized Width: 15
echo "Resized Height: " . $rectangle->getHeight() . "\n"; // Output: Resized Height: 7.5
?>


<!--Câu 2.Tạo một interface "Logger" với các phương thức "logInfo", "logWarning" và "logError". Tạo một lớp "FileLogger" (Ghi log vào file) và một lớp "DatabaseLogger" (Ghi log vào cơ sở dữ liệu) và triển khai interface Logger cho cả hai lớp.-->
<?php
interface Logger {
  public function logInfo();
  public function logWarning();
  public function logError();
}
class FileLogger implements Logger {
  public function logInfo() {

  }
  public function logWarning() {
      
  }
  public function logError() {
      
  }
  protected $log;
  public function __construct($log) {
      $this->log = $log;
      $this->logInfo();
      $this->logWarning();
      $this->logError();
  }
  public function getLog() {
      return $this->log;
  }
}
class DatabaseLogger implements Logger {
  public function logInfo() {

  }
  public function logWarning() {
      
  }
  public function logError() {
      
  }
  protected $log;
  public function __construct($log) {
      $this->log = $log;
      $this->logInfo();
      $this->logWarning();
      $this->logError();
  }
  public function getLog() {
      return $this->log;
  }
}
$FileLogger = new FileLogger("bug...1");
$DatabaseLogger = new DatabaseLogger("bug...2");
echo $FileLogger->getLog(). "<br>";
echo $DatabaseLogger->getLog(). "<br>";
?>


<!--Câu 3.Tạo một interface "Drawable" (Có thể vẽ) với phương thức "draw". Tạo một lớp "Circle" (Hình tròn) và một lớp "Square" (Hình vuông) kế thừa từ interface Drawable và triển khai phương thức draw cho mỗi hình.-->
<?php
interface Drawable {
    public function draw();
}


class Circle implements Drawable {
    private $radius;


    public function __construct($radius) {
        $this->radius = $radius;
    }


    public function draw() {
        echo "Drawing a circle with radius $this->radius.\n";
    }
}


class Square implements Drawable {
    private $sideLength;


    public function __construct($sideLength) {
        $this->sideLength = $sideLength;
    }


    public function draw() {
        echo "Drawing a square with side length $this->sideLength.\n";
    }
}


// Sử dụng lớp Circle và Square để vẽ hình


$circle = new Circle(5);
$circle->draw(); // Output: Drawing a circle with radius 5.


$square = new Square(10);
$square->draw(); // Output: Drawing a square with side length 10.
?>


<!--Câu 4.Tạo một interface "Sortable" với phương thức "sort". Tạo một lớp "ArraySorter" (Sắp xếp mảng) và một lớp "LinkedListSorter" (Sắp xếp danh sách liên kết) và triển khai interface Sortable cho cả hai lớp.-->
<?php
interface Sortable {
    public function sort();
}

class ArraySorter implements Sortable {
    protected $data;

    public function __construct($data) {
        $this->data = $data;
    }

    public function sort() {
        sort($this->data);
        return $this->data;
    }
}
$arraySorter = new ArraySorter([1,6,2,4,9]);
$sortedArray = $arraySorter->sort();
echo "Mảng sau khi sắp xếp: " . implode(", ", $sortedArray);
?>


<!--Câu 5.Tạo một interface "Encryptable" (Có thể mã hóa) với phương thức "encrypt" và "decrypt". Tạo một lớp "AES" và một lớp "DES" kế thừa từ interface Encryptable và triển khai các phương thức theo thuật toán mã hóa tương ứng.-->

<?php
interface Encryptable {
    public function encrypt($data);
    public function decrypt($encryptedData);
}

class AES implements Encryptable {
    public function encrypt($data) {
        echo "Encrypting data using AES...";
    }

    public function decrypt($encryptedData) {
        echo "Decrypting AES encrypted data...";
    }
}

class DES implements Encryptable {
    public function encrypt($data) {
        echo "Encrypting data using DES...";
    }

    public function decrypt($encryptedData) {
        echo "Decrypting DES encrypted data...";
    }
}

$aes = new AES();
$aes->encrypt("Data to encrypt"); 
$aes->decrypt("Encrypted data"); 
echo "<br>";
$des = new DES();
$des->encrypt("Data to encrypt"); 
$des->decrypt("Encrypted data");
?>