<!DOCTYPE html>
<html lang='en'>
    <!-- 
    Pj Ellis - 9/3/2023 - CSD440 - Module 6
    Write a program that defines a class titled MyInteger. The class is to hold 
    a single integer that is set in the constructor by a parameter. The class is 
    to have methods isEven(int) and isOdd(int).
    In addition, the class will have an isPrime() method.
    Lastly, you are to have a getter and setter method.
    Create two instances and test all methods.
    -->

    <head>
        <title>Module 6 - PJs Table</title>
</head>
<body>
    <h1>Module 6</h1>
    <h3>MyInteger Class - With methods to test for Even, Odd, and Prime</h3>
    
    <?php
    class PjMyInteger {
    private $value;

    public function __construct($value) {
        $this->value = $value;
    }

    public function isEven() {
        return $this->value % 2 == 0;
    }

    public function isOdd() {
        return $this->value % 2 != 0;
    }

    public function isPrime() {
        if ($this->value <= 1) {
            return false;
        }
        if ($this->value <= 3) {
            return true;
        }
        if ($this->value % 2 == 0 || $this->value % 3 == 0) {
            return false;
        }
        $i = 5;
        while ($i * $i <= $this->value) {
            if ($this->value % $i == 0 || $this->value % ($i + 2) == 0) {
                return false;
            }
            $i += 6;
        }
        return true;
    }

    public function getValue() {
        return $this->value;
    }

    public function setValue($new_value) {
        $this->value = $new_value;
    }
}

$num = new PjMyInteger(7);

echo "<h4>First Instance</h4>";
echo "Value: " . $num->getValue() . "<br>";
echo "Is even? " . ($num->isEven() ? "Yes" : "No") . "<br>";
echo "Is odd? " . ($num->isOdd() ? "Yes" : "No") . "<br>";
echo "Is prime? " . ($num->isPrime() ? "Yes" : "No") . "<br>";

// Instance Two
echo "<h4>Second Instance</h4>";

$num->setValue(12);
echo "Updated Value: " . $num->getValue() . "<br>";
echo "Is even? " . ($num->isEven() ? "Yes" : "No") . "<br>";
echo "Is odd? " . ($num->isOdd() ? "Yes" : "No") . "<br>";
echo "Is prime? " . ($num->isPrime() ? "Yes" : "No") . "<br>";
?>
</body>
</html>