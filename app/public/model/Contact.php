<?php
    class Contact{
        private $contactID;
        private $username;
        private $email;

        public function load($row){
            $this->setContactID($row['fName']);
            $this->setUsername($row['lName']);
            $this->setEmail($row["comment"]);
        }

        public function setContactID($contactID){
            $this->contactID=$contactID;
        }

        public function getContactID(){
            return $this->contactID;
        }

        public function setUsername($username){
            $this->username=$username;
        }

        public function getUsername(){
            return $this->username;
        }

        public function setEmail($email){
            $this->email=$email;
        }

        public function getEmail(){
            return $this->email;
        }
    }
?>
