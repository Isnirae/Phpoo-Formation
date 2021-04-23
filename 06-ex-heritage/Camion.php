<?php

class Camion extends Vehicule{
    protected $maxspeed = 90;
    protected $chargement = [];
    protected $capacite;
    protected $remorque = false;

    public function __construct($prix, $marque, $modele, $capacite){
        parent::__construct($prix, $marque, $modele);
        $this->capacite = $capacite;
    }

    public function addItem($item){
        if (count($this->chargement) >= $this->capacite){
            return 'Chargement impossible vous êtes plein</br>';
        }

        $this->chargement[] = $item;

        return 'Vous avez ajouté : '.$item.'</br>';
    }

    public function liste(){
        echo "Vous avez dans votre chargement : <br/>";
        foreach ($this->chargement as $item) {
            echo $item.'<br/>';
        }
    }

    public function addRemorque (){
        if ($this->remorque){
            return 'Vous avez deja une remorque <br/>';
        }

        $this->remorque = true;
        $this->capacite *= 2; 
        return 'Votre capacite est passé à '.$this->capacite.'<br/>';
    }

    public function outRemorque(){
        if (!$this->remorque) {
            return 'Vous n\'avez pas de remorque <br/>';
        }

        $this->capacite /= 2;
        $pertes = array_slice($this->chargement, $this->capacite);
        $this->chargement = array_slice($this->chargement, 0, $this->capacite, true);
        echo 'Votre capacité est passé à '.$this->capacite.'<br/>';

        if (count($pertes) > 0) {
            echo 'vous avez perdu : <br/>';
            foreach ($pertes as $perte) {
                echo "-".$perte.'<br/>';
            }
        }
    }
}