<?php
include 'conn.php';

Class Functions
{
	private $db;
	public function __construct(){
		$this->db = new conn(); 
}


//Create User
public function addUser($data){		

	$sql ="INSERT INTO tbl_users (name, position, date) VALUES (:name, :position, :date)";
		$stmt = $this->db->conn->prepare($sql);
		$r = $stmt->execute([ ':name' => $data['name'],
							  ':position' => $data['position'],
							  ':date' => $data['date']]);
														
		if($r){
			// success!!!
			return 1;
			
		}else{
			// somthing wrong with queries
			return 0;
		}
							
	}


//Read All Users
	public function GetAllUsers(){
		$sql = 'SELECT * FROM tbl_users ORDER BY id DESC';
		$stmt = $this->db->conn->prepare($sql);
		$stmt->execute();
		$data = $stmt->fetchAll();
		return $data;
	}

//Read Only User
	public function GetUserInfo($id){
		$sql = 'SELECT * FROM tbl_users WHERE id=:id';
		$stmt = $this->db->conn->prepare($sql);
		$stmt->execute([':id' => $id]);
		$data = $stmt->fetch(PDO::FETCH_OBJ);
		return $data;
	}

	//Update User
	public function UpdateUser($data, $id){
		$sql = 'UPDATE tbl_users SET name=:name, position=:position, date=:date WHERE id = :id';
		$stmt = $this->db->conn->prepare($sql);
		$r = $stmt->execute([ ':name' => $data['name'],
							  ':position' => $data['position'],
							  ':date' => $data['date'],
							  ':id' => $id]);
		if($r){
			return 1;
		}else{
			return 0;
		}
	}

	//Delete User
	public function DeleteUser($id){
		$sql = 'DELETE FROM tbl_users WHERE id=:id';
		$stmt = $this->db->conn->prepare($sql);
		$r = $stmt->execute([':id' => $id]);
		if($r){
			return 1;
		}else{
			return 0;
		}
	}
}

?>