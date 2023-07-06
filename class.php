<?php
// 
class DB
{
    private $dbhost = "localhost";
    private $dbuser = "root";
    private $dbpass = "root";
    private $dbname = "portal";

    public $db;

    public function __construct()
    {
        if (!isset($this->db)) {
            try { 
                $conn = new PDO("mysql:host=" . $this->dbhost . ";dbname=" . $this->dbname, $this->dbuser, $this->dbpass);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db = $conn;
            } catch (PDOException $e) {
                die("Somethink Went wrong, Please Try later!!  " . $e->getMessage());
            }
        }
    }
    public function insert($table, $data)
    {
        try{
            if (!empty($data) && is_array($data)) {
                $columns = '';
                $values = '';
                $i = 0;
                $columnString = implode(',', array_keys($data));
                $valueString = ":" . implode(',:', array_keys($data));
                $sql = "INSERT INTO " . $table . " (" . $columnString . ") VALUES (" . $valueString . ")";
                $query = $this->db->prepare($sql);
                foreach ($data as $key => $val) {
                    $query->bindValue(':' . $key, $val);
                }
                $insert = $query->execute();
                return $insert ? $this->db->lastInsertId() : false;
            } else {
                return false;
            }
        }
        catch (PDOException $e) {
            die("Somethink Went wrong, Please Try later!!  " . $e->getMessage());
        }
    }
    public function customsql($sql){
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchall(PDO::FETCH_ASSOC);
        return $data;
    }
    public function delete($table, $id)
    {
        if ($id == "" || $table == "") {
            die("Delete not worked");
        } else {
            $sql = "DELETE FROM `$table` WHERE id = '$id'";
            $query = $this->db->prepare($sql);
            $insert = $query->execute();
        }
    }
    public function selectall($table)
    {
        $sql = "SELECT * FROM $table";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->fetchall(PDO::FETCH_BOTH);
        return $data;
    }
    public function getrow($table, $return, $tablecol, $con, $limit)
    {
        $sql = "SELECT $return FROM $table where $tablecol = '$con' LIMIT $limit;";
        $query = $this->db->prepare($sql);
        $query->execute();
        if ($query->rowCount() == 0) {
            return $data = "No Found";
        } else {
            $data = $query->fetchall(PDO::FETCH_ASSOC);
            return $data;
        }
    }
    public function get_data($table1,$table2, $return, $con1, $con2, $con3, $con4)
    {
        $sql = "SELECT $return FROM $table1 INNER JOIN $table2 ON $con1 = $con2 and $con3 = $con4;";
        $query = $this->db->prepare($sql);
        $query->execute();
        if ($query->rowCount() == 0) {
            return $data = "No Found";
        } else {
            $data = $query->fetchall(PDO::FETCH_ASSOC);
            return $data;
        }
    }
    public function get_numrow($table1)
    {
        $sql = "SELECT * FROM $table1";
        $query = $this->db->prepare($sql);
        $query->execute();
        $data = $query->rowCount();
        return $data;
    }
    public function student_update($id,$fname,$lname,$email){
        $sql = "UPDATE `student` SET `fname`='$fname',`lname`='$lname',`email`='$email' WHERE id = '$id'";
        $query = $this->db->prepare($sql);
        $query->execute();
    }
    public function student_subject($id,$subject){
        $sql = "INSERT INTO `student_subject`(`studentid`, `subject`) VALUES ('$id','$subject')";
        $query = $this->db->prepare($sql);
        $query->execute();
    }
}


class student extends DB{
    public function get_row($table, $return, $tablecol, $con)
    {
        $sql = "SELECT $return FROM $table where $tablecol = '$con';";
        $query = $this->db->prepare($sql);
        $query->execute();
        if ($query->rowCount() == 0) {
            return $data = "No Found";
        } else {
            $data = $query->fetchall(PDO::FETCH_ASSOC);
            return $data;
        }
    }
    function verify_user($type,$email,$user){
        $sql = "SELECT id FROM $type WHERE uname = '$user' and email = '$email'";
        $query = $this->db->prepare($sql);
        $query->execute();
        if ($query->rowCount() == 0) {
            return $data = "No Found";
        } else {
            $data = $query->fetchall(PDO::FETCH_ASSOC);
            return $data;
        }
    }
    function reser_link($token,$type,$id){
        $sql = "INSERT INTO `reset_link`(`token`, `type`, `user_id`) VALUES ('$token','$type','$id')";
        $query = $this->db->prepare($sql);
        $query->execute();
    }
    function verify_token($token){
        $sql = "SELECT * from reset_link where `token` = '$token'";
        $query = $this->db->prepare($sql);
        $query->execute();
        if ($query->rowCount() == 0) {
            return $data = "error";
        } else {
            $data = $query->fetchall(PDO::FETCH_ASSOC);
            return $data;
        }
    }
    function update_pass($type,$id,$pass){
        try{
        $sql = "UPDATE `$type` SET `cpass`='$pass' WHERE `id` = '$id'";
        $query = $this->db->prepare($sql);
        $query->execute();
        return "Update Done";
        }
        catch(PDOException $e){
            return "error";
        }
    }
}
