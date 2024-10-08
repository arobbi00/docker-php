<?php
    require_once 'Contact.php';

    class ContactDAO {

        public function getConnection(){
            $mysqli = new mysqli("docker-php-db-1", "root", "secret", "comments");
            if ($mysqli->connect_errno) {
                $mysqli=null;
            }
            return $mysqli;
        }

        public function buildTable(){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("CREATE TABLE comments ( id int NOT NULL AUTO_INCREMENT,
  fName varchar(32) NOT NULL,
  lName varchar(32) NOT NULL,
  comment varchar(50) NOT NULL,
  PRIMARY KEY (`id`));");
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function addContact($contact){
            $connection=$this->getConnection();
            $stmt = $connection->prepare("INSERT INTO comments (fName,lName,comment) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $contact->getContactID(), $contact->getUsername(), $contact->getEmail());
            $stmt->execute();
            $stmt->close();
            $connection->close();
        }

        public function getContacts(){
            $connection=$this->getConnection();
            try {
            $connection->query("select 1 from comments");
            }
            catch(Exception $e) {
            $this->buildTable();
            }
            $stmt = $connection->prepare("SELECT * FROM comments;");
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                $contact = new Contact();
                $contact->load($row);
                $contacts[]=$contact;
            }    
            $stmt->close();
            $connection->close();
            return $contacts;
        }



    }
?>
