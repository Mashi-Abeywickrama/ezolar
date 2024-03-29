<?php
  class EmployeeModel {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }


    public function getuser($id){
        $this->db->query('SELECT * FROM user WHERE userID = :id AND type = "engineer" OR type = "salesperson" OR type = "storekeeper" OR type = "contractor"');
        $row = $this->db->single(['id' => $id]);
        return $row;
    }
    public function getUserRole($email){
      $this->db->query('SELECT type FROM user where email = :email');
      $row = $this->db->single(['email' => $email]);
      return ($row->type);
    }

    public function addEmployee($data){

        $this->db->query('INSERT INTO user(`email`, `password`,`type`) VALUES (:email,:password,:type)');
        $this->db->execute(['email' => $data[3], 'password' => $data[8], 'type' => $data[6]]);


        $this->db->query('SELECT `userID` FROM user WHERE email = :email');
        $userid  =($this->db->single(['email'=> $data[3]]));

        // TODO -> add default profile photo
        $this->db->query('INSERT INTO employee(`empID`,`name`, `nic`,`gender`,`profilePhoto`,`bio`,`type`) VALUES (:userid,:name,:nic,:gender,:profilePhoto,:bio,:type)');
        $this->db->execute(['userid' => $userid->userID, 'name' => $data[2], 'nic' => $data[5], 'gender' => $data[7], 'profilePhoto' => '', 'bio' => '','type' => $data[6]]);

        $this->db->query('INSERT INTO employee_telno(`Employee_empID`,`telno`) VALUES (:userid,:contact)');

        if ($this->db->execute(['userid' => $userid->userID, 'contact' => $data[4]])){
            $userRole = $data[6];
            if ($userRole == 'Salesperson'){
                $this->db->query('INSERT INTO salesperson(`Employee_empID`) VALUES (:userid)');
                $this->db->execute(['userid' => $userid->userID]);
            }else if($userRole == 'Engineer'){
                $this->db->query('INSERT INTO engineer(`engineerID`) VALUES (:userid)');
                $this->db->execute(['userid' => $userid->userID]);
            }else if ($userRole == "Storekeeper"){
                $this->db->query('INSERT INTO storekeeper(`Employee_empID`) VALUES (:userid)');
                $this->db->execute(['userid' => $userid->userID]);
            }else if ($userRole == 'Contractor'){
                $this->db->query('INSERT INTO contractor(`contractorID`,`name`,`nic`,`profilePhoto`,`bio`) VALUES (:userid,:name,:nic,:profilePhoto,:bio)');
                $this->db->execute(['userid' => $userid->userID, 'name' => $data[2], 'nic' => $data[5], 'profilePhoto' => '', 'bio' => '']);
            }
            header('Location:/ezolar/employee/newEmployee');
            return true;
        }else{
            return false;
        }
        }




    public function getAllEmployees(){
      
        $this->db->query('SELECT * FROM employee');
        $row = $this->db->resultSet([]);
        return $row;
      }

      public function getAllEngineers(){
        $this->db->query('SELECT employee_telno.telno,employee.empID,employee.name,user.isDeactivated
                        FROM employee_telno 
                        INNER JOIN employee ON employee.empID = employee_telno.Employee_empID 
                        INNER JOIN user ON employee.empID = user.userID
                        WHERE employee.type="engineer" AND isDeactivated = 0
                        ORDER BY empID;');
        $row = $this->db->resultSet([]);
        return $row;
      }

      public function getAllStorekeepers(){
        $this->db->query('SELECT employee_telno.telno,employee.empID,employee.name FROM employee_telno INNER JOIN employee ON employee.empID = employee_telno.Employee_empID WHERE employee.type="storekeeper" ORDER BY empID');
        $row = $this->db->resultSet([]);
        return $row;
      }

      public function getAllSalespersons(){
        $this->db->query('SELECT employee_telno.telno,employee.empID,employee.name FROM employee_telno INNER JOIN employee ON employee.empID = employee_telno.Employee_empID WHERE employee.type="salesperson" ORDER BY empID');
        $row = $this->db->resultSet([]);
        return $row;
      }

      public function getAllContractors(){
        $this->db->query('SELECT employee_telno.telno,employee.empID,employee.name FROM employee_telno INNER JOIN employee ON employee.empID = employee_telno.Employee_empID WHERE employee.type="contractor" ORDER BY empID');
        $row = $this->db->resultSet([]);
        return $row;
      }

      // Get employees as List according to the employee type
      public function getEmployees($empType){
          $this->db->query('SELECT employee_telno.telno,employee.empID,employee.name,user.type,user.isDeactivated
                        FROM employee_telno 
                        INNER JOIN employee ON employee.empID = employee_telno.Employee_empID 
                        INNER JOIN user ON employee.empID = user.userID
                        WHERE employee.type=:empType AND isDeactivated = 0
                        ORDER BY empID;');
          $row = $this->db->resultSet(['empType' => $empType]);
          return $row;
      }

      public function getEmployeeDetails($empID){
          $this->db->query('SELECT * FROM employee INNER JOIN employee_telno ON employee.empID = employee_telno.Employee_empID INNER JOIN user ON employee.empID = user.userID WHERE empID = :empID');
          $row = $this->db->resultSet(['empID' => $empID]);
          //print_r($row);die;
          return $row;
      }

      // Edit employee accounts
      public function editEmployee($empID,$data){
        $this->db->query('UPDATE employee,employee_telno,user
                        SET employee_telno.telno = :telno ,employee.name = :name,employee.bio = :bio,user.email = :email
                        WHERE employee.empID = user.userID
                        AND employee.empID = employee_telno.Employee_empID 
                        AND employee.empID = :userid;');
        $this->db->execute(['userid' => $empID,'name' => $data[0],'bio' => $data[1],'telno' => $data[2],'email' => $data[3]]);
      }

      // Deactivate Employee accounts
      public function deleteEmployee($empID){
        $this->db->query('UPDATE user SET isDeactivated = 1 WHERE userID = :empID');
        $this->db->execute(['empID' => $empID]);
      }



  }