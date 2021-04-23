<?php 

class Moto extends Vehicule{
    protected $maxspeed = 250;
    protected $roues = 2;
    
    

    
    public function weehling(){
        $return = parent::accelerer();

        if ($this->vitesse < 100){
            return 'Vous roulez pas assez vite pour faire du wheel <br/>'.$return; 
        }

        if ($this->vitesse > 140){
            return 'Vous roulez trop vite pour faire du wheel <br/>'.$return;
        }

        return 'Vous faite du wheel</br>'.$return;

    }

}
