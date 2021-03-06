<?php

namespace App;

class Validation {
    private $form;
    private $field;
    public $errors = [];

    public function __construct(Form $form) {
        $this->form = $form;
    }

    /**
     * Définir un champ "temporaire".
     */
    public function add($name) {
        $this->field = $name;

        return $this;
    }

    /**
     * Rend obligatoire le champ.
     */
    public function required() {
        // On s'assure que les données dans le champ sont bien VIDE ('') et non null.
        if ($this->form->get($this->field) === '') {
            $this->errors[$this->field] = 'Le champ '.$this->field.' est requis';
        }

        return $this;
    }

    /**
     * Vérifie qu'un email est valide (mais pas forcément obligatoire)
     */
    public function email() {
        if (empty($this->form->get($this->field))) {
            // return arrête le code et $this permet de chainer les méthodes
            return $this;
        }

        // revient à faire !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
        if (!filter_var($this->form->get($this->field), FILTER_VALIDATE_EMAIL)) {
            $this->errors[$this->field] = 'Le champ '.$this->field.' est invalide';
        }

        return $this;
    }

    /**
     *  Vérifie qu'une chaine a une longueur minimum 
     */
    Public function min($lenght) {
        $field = $this->form->get($this->field);

        // On fait la  verif uniquement si le champ n'est pas NULL et n'est pas ''
        if ($field !== null && strlen($field) < $lenght){
            $this->errors[$this->field] = 'Le champ '.$this->field.' doit faire '.$lenght.' caractères minimum.';
        }
    }

    /**
     *  Verifie qu'une chain est un nombre.
     */
    Public function number(){
        $field = $this->form->get($this->field);

        if (!empty($field) && !ctype_digit($field)){
            $this->errors[$this->field] = 'Le champ '.$this->field.' est un nombre invalide';
        }

        return $this;
    }

    /**
     *  Verifie qu'une chaine fait partie d'une liste de valeurs.
     */
    public function in($values=[]){
        $field = $this->form->get($this->field);

        if(!empty($field) && !in_array($field, $values)){
            $this->errors[$this->field] = 'Le champ '.$this->field.' est invalide: '.implode(', ', $values);
            // Implode(', ', ['A', 'B']) => ['A', 'B'] devient 'A, B'
        }
    }

    /** 
     *  Permet d'afficher une erreur si elle existe dans $this->errors
     */
    public function error($field){
        return $this->errors[$field] ?? null;
    }

    public function isValid(){
        return empty($this->errors);
    }
}   