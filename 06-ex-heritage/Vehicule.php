<?php 

class Vehicule{
    protected $imatriculation;
    protected $prix;
    protected $marque;
    protected $modele;
    protected $roues;
    protected $on = false;
    protected $vitesse = 0;
    protected $maxspeed;

    protected function plaque(){
        $first = $this->letter();
        $second = $this->number();
        $last = $this->letter();

        $combin = $first.'-'.$second.'-'.$last; 

        return $combin;
    }
    
    protected function letter(){
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $string = '';
        for($i=0; $i<2; $i++){
            $string .= $chars[rand(0, strlen($chars)-1)];
        }
        return $string;
    }

    protected function number(){
        $chars = '0123456789';
        $number = '';
        for($i=0; $i<3; $i++){
            $number .= $chars[rand(0, strlen($chars)-1)];
        }
        return $number;
    }
    
    public function __construct($prix, $marque, $modele){
        $this->prix = $prix.'€';
        $this->marque = $marque;
        $this->modele = $modele;

        $this->imatriculation = $this->plaque();
    }

    
    public function demarre(){
        if ($this->on){
            return 'Le moteur est déjà en route.</br>';
        }

        $this->on = true;
        return 'Le moteur s\'allume.<br/>'; 
    }

    public function arreter(){
        if (!$this->on){
            return 'Le moteur est déjà coupé. <br/>';
        }

        $this->on = false;
        return 'Le moteur s\'arrete.<br/>';
    }

    public function accelerer(){
        if (!$this->on){
            return 'Pour accélérais il faut allumer le moteur <br/>';
        }
        if ($this->maxspeed == $this->vitesse){
            return 'La vehicule est au maximum <br/>';
        }

        $this->vitesse += 10;
        return 'Votre vitesse est de '.$this->vitesse.'km/h. <br/> ';
    }
}


?>