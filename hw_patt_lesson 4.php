<?php
//////////////////////////////////////////////////////////////////
//                                                              //
// Паттерн Абстрактная фабрика                                  //
//                                                              //    
// предоставляет интерфейс создания семейства взаимосвязанных   //
// или взаимозависимых объектов без указания их конкретных      //
// классов.                                                     //
//                                                              //
//////////////////////////////////////////////////////////////////


abstract class WindowCreater {

    abstract function createButton ();
    abstract function createModalForm ();
    abstract function createLabel (); 
}

abstract class ViewModalForm {
    abstract function view ();
}

class WindowsFactory extends WindowCreater {
    function createButton () {
        return "Windows Button";
    }
    function createModalForm () {
        return "Windows ModalForm";
    }
    function createLabel () {
        return "Windows Label";
    }
}

class MacOSFactory extends WindowCreater {
    function createButton () {
        return "MacOS Button";
    }
    function createModalForm () {
        return "MacOS ModalForm";
    }
    function createLabel () {
        return "MacOS Label";
    }
}

class BrowserFactory extends WindowCreater {
    function createButton () {
        return "Browser Button";
    }
    function createModalForm () {
        return "Browser ModalForm";
    }
    function createLabel () {
        return "Browser Label";
    }
}

class ViewWindow extends ViewModalForm{
    function view () {
        return "Windows ModalForm, Button, Label";
    }
}

class ViewMacOS extends ViewModalForm{
    function view () {
        return "MacOS ModalForm, Button, Label";
    }
}

class ViewBrowserWebkit extends ViewModalForm{
    function view () {
        return "Browser WebKit ModalForm, Button, Label";
    }
}

class ViewBrowserIExplorer extends ViewModalForm{
    function view () {
        return "Browser IExplorer ModalForm, Button, Label";
    }
}

?>