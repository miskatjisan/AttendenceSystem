<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/Session.php');
    include_once ($filepath.'/../lib/Database.php');
    include_once ($filepath.'/../helpers/Format.php');

    class Student{
        private $db;
        private $fm;
        public function __construct(){
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function getAllStudent(){
            $query = "SELECT * FROM tbl_student";
            $result = $this->db->select($query);
            return $result;
        }
        public function insertStudentData($name,$roll){
            $name = $this->fm->validation($name);
            $roll = $this->fm->validation($roll);
            $name = mysqli_real_escape_string($this->db->link, $name);
            $roll = mysqli_real_escape_string($this->db->link, $roll);
            if (empty($name)||empty($roll)) {
                $msg = "<div class='alert alert-danger'><strong>Error!</strong> Field Must Not Be Empty.</div>";
                return $msg;
            }else{
                $stuQuery = "INSERT INTO tbl_student(name,roll) VALUES('$name','$roll')";
                $stu_insert = $this->db->insert($stuQuery);
                $attQuery = "INSERT INTO tbl_attend(roll) VALUES('$roll')";
                $att_insert = $this->db->insert($attQuery); 
                if (isset($stu_insert)) {
                    $msg = "<div class='alert alert-success'><strong>Success!</strong> New Student Added Successfully.</div>";
                    return $msg;
                }else{
                    $msg = "<div class='alert alert-danger'><strong>Error!</strong> New Student Not Added.</div>";
                    return $msg;
                }
            }

        }
        public function insertStudentAttend($cur_date,$attend = array()){
            if (empty($attend)) {
               $msg = "<div class='alert alert-danger'><strong>Error!</strong> Attendance Field Must Not Be Empty.</div>";
                    return $msg;
            }else{
            $query = "SELECT DISTINCT attend_time FROM tbl_attend";
            $getData = $this->db->select($query);
            while ( $result = $getData->fetch_assoc()) {
               $db_date = $result['attend_time'];
               if ($cur_date == $db_date) {
                   $msg = "<div class='alert alert-danger'><strong>Error!</strong> Attendance AllReady Taken Today.</div>";
                    return $msg;
               }
            }
            foreach ($attend as $att_key => $att_value) {
                if ($att_value == "present") {
                    $stu_query = "INSERT INTO tbl_attend(roll,attend,attend_time)VALUES('$att_key','present',now())";
                    $data_insert = $this->db->insert($stu_query);
                }elseif ($att_value == "absent") {
                    $stu_query = "INSERT INTO tbl_attend(roll,attend,attend_time)VALUES('$att_key','absent',now())";
                    $data_insert = $this->db->insert($stu_query);
                }
            }
             if ($data_insert) {
                   $msg = "<div class='alert alert-success'><strong>Success!</strong> Attendance Taken Successfully.</div>";
                    return $msg;
               }else{
                    $msg = "<div class='alert alert-danger'><strong>Error!</strong> Attendance Not Taken.</div>";
                    return $msg;
               }
            }

        }
        public function getAllAttendence(){
            $query = "SELECT DISTINCT attend_time FROM tbl_attend";
            $result = $this->db->select($query);
            return  $result;
        }
        public function getAllStudentAttend($dt){
            $query = "SELECT tbl_student.name, tbl_attend.*
                        FROM tbl_student
                        INNER JOIN tbl_attend
                        ON tbl_student.roll = tbl_attend.roll
                        WHERE attend_time = '$dt' ";
                        $result = $this->db->select($query);
                        return  $result;
        }
        public function updateStudentAttend($dt, $attend){
              foreach ($attend as $att_key => $att_value) {
                if ($att_value == "present") {
                    $query = "UPDATE tbl_attend
                                SET attend = 'present'
                                WHERE roll = '".$att_key."' AND attend_time = '".$dt."' ";
                    $data_update = $this->db->insert($query);
                    
                }elseif ($att_value == "absent") {
                    $query = "UPDATE tbl_attend
                                SET attend = 'absent'
                                WHERE roll = '".$att_key."' AND attend_time = '".$dt."' ";
                    $data_update = $this->db->insert($query);
                }
            }
             if ($data_update) {
                   $msg = "<div class='alert alert-success'><strong>Success!</strong> Attendance Updated Successfully.</div>";
                    return $msg;
               }else{
                    $msg = "<div class='alert alert-danger'><strong>Error!</strong> Attendance Not Updated.</div>";
                    return $msg;
               }
        }
        public function deleteStudent($rmv){
            $delStu = "DELETE FROM tbl_student WHERE roll = '$rmv'";
            $data_delete = $this->db->insert($delStu);
            $delAtt = "DELETE FROM tbl_attend WHERE roll = '$rmv'";
            $data_delete = $this->db->insert($delAtt);
            if (isset($data_delete) ) {
                $msg = "<div class='alert alert-success'><strong>Success!</strong> Student Deleted Successfully.</div>";
                    return $msg;
            }else{
                $msg = "<div class='alert alert-success'><strong>Success!</strong> Student Not Deleted .</div>";
                    return $msg;
            }
        }
    }

?>