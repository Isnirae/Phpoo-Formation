<?php

namespace App;

class Contact {
    public $id;
    public $fields = [];
    /*public $civility;
    public $email;
    public $phone;
    public $message;*/

    /**
     *  La methode magique __set() permet de dire : 
     *  Quand j'écris $contact->email = 'aaaaa@gmail.com'
     *  email est $property et aaaaa@gmail.com est $value
     */
    public function __set($property, $value){
        // $this->fields['civility] = 'Mr';
        $this->fields[$property] = $value;
    }

    /**
     *  Enregistre un contact dans la BDD
     */
    public function save(){
        // App\Contact -> App\Contact -> Contact
        $table = str_replace('\\', '/', get_class($this));
        // App/Contact -> Contact -> contact
        $table = strtolower(basename($table)); // /home/machin/truc -> truc
        // Ici on doit fair un INSERT... 
        $sql = "INSERT INTO $table (civility, email, phone, message)
                VALUES (:civility; :email, :phone, :message)";

        // dd est un dump et un die
        dd($sql);
        
        DB::postQuery($sql,$this->fields);
    }
}

