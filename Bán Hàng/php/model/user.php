<?php
    class User{
        private $conn;
        public $user_id;
        public $username;
        public $email;
        public $gender;
        public $phone;
        public $password;
        public $note;

        public function __construct($db){
            $this->conn = $db;
        }
        public function user(){
            $query = "INSERT INTO user SET username=:username,email=:email,gender=:gender,phone=:phone,password=:password,note=:note";
            $stmt = $this->conn->prepare($query);
           
            $this->username = htmlspecialchars((strip_tags($this->username)));
            $this->email = htmlspecialchars((strip_tags($this->email)));
            $this->gender = htmlspecialchars((strip_tags($this->gender)));
            $this->phone = htmlspecialchars((strip_tags($this->phone)));
            $this->password = htmlspecialchars((strip_tags($this->password)));
            $this->note = htmlspecialchars((strip_tags($this->note)));

            $stmt->bindParam(':username',$this->username);
            $stmt->bindParam(':email',$this->email);
            $stmt->bindParam(':gender',$this->gender);
            $stmt->bindParam(':phone',$this->phone);
            $stmt->bindParam(':password',$this->password);
            $stmt->bindParam(':note',$this->note);

            if($stmt->execute()){
                return true;
            }
            printf("Error %s.\n" ,$stmt->error);
            return false;
        }
    } 
?>