<?php
class MainClass {
    public function greeting() {
        echo 'Good Day From MainClass'."\n";
    }
}

trait DesiredClass {
    public function welcome() {
        //parent::greeting();
        echo 'Welcome To Traits';
    }
}

class NewClass extends Mainclass {
    use DesiredClass;
}

$myObject = new NewClass();
$myObject ->greeting();
$myObject->welcome();
/* You can uncomment line 10 while commenting out 
*line 20 and the result remains the same.
*/
?>