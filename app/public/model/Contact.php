 
<?php
    class Contact{
        private $fName;
        private $lName;
        private $comment;

        public function load($row){
            $this->setFName($row['fName']);
            $this->setLName($row['lName']);
            $this->setComment($row["comment"]);
        }

        public function setFName($fname){
            $this->fname=$fname;
        }

        public function getFName(){
            return $this->fname;
        }

        public function setLname($username){
            $this->username=$username;
        }

        public function getLname(){
            return $this->username;
        }

        public function setComment($comment){
            $this->comment=$comment;
        }

        public function getComment(){
            return $this->comment;
        }
    }
?>
