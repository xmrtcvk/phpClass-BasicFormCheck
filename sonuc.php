<?php

    class formChecker{

       protected $durum = false;
       protected $mesaj= "Lütfen eksiksiz doldurunuz !";

       protected $values = [];
       protected $variables = [];
       protected $lastVal = [];

       function getValues(){

         foreach ($_POST as $key => $value) {
           array_push($this->variables, $value);
           array_push($this->values, $key);
        }

         array_pop($this->variables);
         array_pop($this->values);

         $this->lastVal = array_combine($this->values,$this->variables);
       }

       function checkForm(){

         foreach ($this->lastVal as $key => $value) {
           if($value == ""){
             return $this->mesaj;
           }else {
             $this->durum = true;
           }
         }
       }

       function getDurum(){
         return $this->durum;
       }

       function addDb(){
         if(self::getDurum() == true) {
           echo "Her şey yolunda! <br>";
            
           foreach ($this->lastVal as $key => $value) {  // Verileri yazdırdık
             echo $key." = ".$value."<br>";
           }
           
             // Veritabanı ekleme işlemlerini gerçekleştirebilirsiniz
         }
       }
    }

    $kontrol = new formChecker;
    $kontrol->getValues();
    echo $kontrol->checkForm();
    echo $kontrol->getDurum();
    $kontrol->addDb();



 ?>
