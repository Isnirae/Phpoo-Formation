<?php 

require "Vehicule.php";
require "Voiture.php";
require "Moto.php";
require "Camion.php";

$test = new Vehicule(10000, "peugeot", "206");
var_dump($test);



$voiture1= new Voiture(5000, "peugeot", "208");
var_dump($voiture1);
echo $voiture1->arreter();
echo $voiture1->demarre();
echo $voiture1->demarre();
echo $voiture1->arreter();
echo $voiture1->accelerer();
echo $voiture1->demarre();
echo $voiture1->accelerer();
echo $voiture1->accelerer();
echo $voiture1->accelerer();
echo $voiture1->accelerer();
echo $voiture1->accelerer();
echo $voiture1->accelerer();
echo $voiture1->accelerer();
echo $voiture1->accelerer();
echo $voiture1->accelerer();
echo $voiture1->accelerer();
echo $voiture1->accelerer();
echo $voiture1->accelerer();
echo $voiture1->accelerer();
echo $voiture1->accelerer();
echo $voiture1->accelerer();
echo $voiture1->accelerer();
echo $voiture1->accelerer();
var_dump($voiture1);


$moto1= new Moto(7000, "yamaha", "mt07");
echo $moto1->demarre();
echo $moto1->accelerer();
echo $moto1->accelerer();
echo $moto1->accelerer();
echo $moto1->accelerer();
echo $moto1->accelerer();
echo $moto1->accelerer();
echo $moto1->weehling();
echo $moto1->accelerer();
echo $moto1->accelerer();
echo $moto1->accelerer();
echo $moto1->accelerer();
echo $moto1->weehling();
echo $moto1->weehling();
echo $moto1->weehling();
echo $moto1->accelerer();
echo $moto1->accelerer();
echo $moto1->accelerer();
echo $moto1->accelerer();
echo $moto1->accelerer();
echo $moto1->accelerer();
echo $moto1->weehling();
echo $moto1->accelerer();
echo $moto1->accelerer();
echo $moto1->accelerer();
echo $moto1->accelerer();
echo $moto1->accelerer();

$camion1 = new Camion(50000, "Renault", "camion", 5);
var_dump($camion1);
echo $camion1->arreter();
echo $camion1->demarre();
echo $camion1->demarre();
echo $camion1->arreter();
echo $camion1->accelerer();
echo $camion1->demarre();
echo $camion1->accelerer();
echo $camion1->accelerer();
echo $camion1->accelerer();
echo $camion1->accelerer();
echo $camion1->accelerer();
echo $camion1->accelerer();
echo $camion1->accelerer();
echo $camion1->accelerer();
echo $camion1->addItem('tomate');
echo $camion1->addItem('ps5');
echo $camion1->addItem('vscode');
echo $camion1->addItem('jetbrain');
echo $camion1->addItem('php');
echo $camion1->addItem('php');
echo $camion1->addRemorque();
echo $camion1->addItem('symfony');
echo $camion1->addItem('laravel');
echo $camion1->liste();
echo $camion1->outRemorque();
echo $camion1->liste();
var_dump($camion1);
?>
