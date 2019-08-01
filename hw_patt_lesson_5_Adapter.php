<?php
interface Billiards {

    public function shoot (); 
    public function win ();
    public function loos ();
}

class PoolParty implements Billiards{
    private $ballArea;
    
    public function shoot () {
        echo "Удар!<br>";
    }
    public function win () {
        echo "Шар!<br>";
    }
    public function loos () {
        echo "Проиграл!<br>";
    }
    public function getBallArea () {
        return $this -> ballArea;
    }
    public function setBallArea ($area) {
        return $this -> ballArea = $area;
    }
}

class RussianBilliard {
    private $sqArea = 8;

    public function udarit () {
        echo "Udarit tak podarit!<br>";
    }
    public function pobeda () {
        echo "Pobeda - eto takaia mashina<br>";
    }
    public function proigrish () {
        echo "Glavnoe - uchastie.<br>";
    }
    public function getSqArea () {
        return $this -> sqArea;
    }
}

class RussianBilliardAdapter {
    private $russianBilliard;
    
    public function __construct(RussianBilliard $russianBilliard) {
        $this -> russianBilliard = $russianBilliard;
    }
    
    public function shoot () {
        $this -> russianBilliard -> udarit ();
    }
    
    public function win () {
        $this -> russianBilliard -> pobeda ();
    }
    
    public function loos () {
        $this -> russianBilliard -> proigrish();
    }

    public function getBallArea () {
        $ballArea = $this -> russianBilliard -> getSqArea();
        $ballArea = 2 * pi() * pow(($ballArea / 4 / 2), 2);
        return $ballArea;
    }
}

$poolParty = new PoolParty ();
print "Американка: ...<br>";
$poolParty -> shoot ();
$poolParty -> win ();
$poolParty -> loos ();
$poolParty -> setBallArea(8);
print "Площадь шара: {$poolParty -> getBallArea()}.";

print "<br><hr>";

$russianBilliard = new RussianBilliardAdapter (new RussianBilliard());
print "Русский бильярд: ...<br>";
$russianBilliard -> shoot ();
$russianBilliard -> win ();
$russianBilliard -> loos ();
print "Площадь шара: {$russianBilliard -> getBallArea()}.";

?>