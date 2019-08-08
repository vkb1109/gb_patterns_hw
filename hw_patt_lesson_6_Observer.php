<?php
//////////////////////////////////////////////////////////////////
//                                                              //
// Паттерн Наблюдатель                                          //
//                                                              //    
// определяет отношение "один-ко-многим" между объектами        //
// таким образом, что при изменении состояния одного объекта    //
// происходит автоматическое оповещение и обновление всех       //
// зависимых объектов.                                          //
//                                                              //
//////////////////////////////////////////////////////////////////

interface Observable {
    function attach (Observer $observer);
    function detach (Observer $observer);
    function notify ();
}

interface Observer {
    function update (Observable $observable);
}

abstract class HRAgencyObserver implements Observer {
    private $hragency;

    function __construct (HRAgency $hragency) {
        $this -> hragency = $hragency;
        $hragency -> attach ($this);
    }

    function update (Observable $observable) {
        print "<br>Принял. Проверяю...";
        if ($observable === $this -> hragency) {
            print "<br>Объёкт идентичен. передаю в doUpdate.";
            $this -> doUpdate ($observable);
        }
    }

    abstract function doUpdate (HRAgency $hragency);
}

class HRAgency implements Observable {
    private $vacancy;

    public function setVacancy ($vacancy) {
        $this -> vacancy =$vacancy;
        print $this -> vacancy;
        $this -> vacancyChanged ();
    }

    public function vacancyChanged () {
        print "<br>передаю...";
        $this -> notify ();
    }

    public function getVacancy () {
        return $this -> vacancy;
    }

    function attach (Observer $observer) {
        $this -> observers [] = $observer;
    }

    function detach (Observer $observer) {
        $newobservers = array ();
        foreach ($this -> observers as $obs) {
            if (($obs !== $observer)) {
                $newobservers [] = $obs;
            }
        }
        $this -> observers [] = $newobservers;
    }

    function notify () {
        print "<br>Забираю и передаю дальше...";
        foreach ($this -> observers as $obs) {
            $obs -> update ($this);
        }
    }
}

class Applicant extends HRAgencyObserver {
    private $vacancy;
    
    function doUpdate (HRAgency $hragency) {
       print "<br>Объект у наблюдателя.";
        $this -> vacancy = $hragency;
        print "<hr>Это - ... ";        
        $this -> vacancy -> getVacancy ();
    }
}

$hragency = new HRAgency ();
new Applicant ($hragency);
$hragency -> setVacancy("Токарь");
print $hragency -> getVacancy();


?>