<?php
    class crud{
        private $db;

        function __construct($conn){
            $this->db = $conn;
        }

        public function insertResidents($fname,$lname,$email,$gender,$mstatus,$members,$contact,$address1,$destination){
            try {
                $sql ="INSERT INTO resident (firstname,lastname,emailaddress,gender,mstatus,members,contactnumber,address_id) VALUES(:fname,:lname,:email,:gender,:mstatus,:members,:contact,:address1)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':gender',$gender);
                $stmt->bindparam(':mstatus',$mstatus);
                $stmt->bindparam(':members',$members);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':address1',$address1);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function editResidents($fname,$lname,$email,$gender,$mstatus,$members,$contact,$address1,$destination){
            try {
                $sql = "UPDATE `resident` SET `firstname`=:fname,`lastname`=:lname,`emailaddress`=:email,`gender`=:gender, `mstatus`=:mstatus, `members`=:members, `contactnumber`=:contact,`address_id`=:address1 WHERE resident_id=:id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->bindparam(':fname',$fname);
                $stmt->bindparam(':lname',$lname);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':gender',$gender);
                $stmt->bindparam(':mstatus',$mstatus);
                $stmt->bindparam(':members',$members);
                $stmt->bindparam(':contact',$contact);
                $stmt->bindparam(':address1',$address1);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getResidents(){
            try{
                $sql = "SELECT * FROM `resident` r inner join address1 a on r.address_id = a.address_id";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getResidentDetails($id){
            try{
                $sql = "SELECT * FROM resident r inner join address1 s on r.address_id = a.address_id where resident_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteResident($id){
            try {
                $sql ="DELETE FROM `resident` WHERE resident_id =:id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function getAddresses(){
            try{
                $sql = "SELECT * FROM `address`";
                $result = $this->db->query($sql);
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
       
        public function getAddressByID($id){
            try{
                $sql = "SELECT * FROM `address` WHERE address_id = :id";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':id',$id);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
       
    }
?>