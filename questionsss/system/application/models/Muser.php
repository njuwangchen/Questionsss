<?php 

class Muser extends Model{
	function __construct() {
		parent::Model();
		
	}
	
	function get_all_users($num,$offset) {
		$query = "select * from users limit $offset,$num";
		$excution = $this->db->query($query);
		$result = $excution->result();
		return $result;
	}
	
	function search_users($key,$num,$offset) {
		$query = "select * from users where name like '%$key%' limit $offset,$num";
		$excution = $this->db->query($query);
		$result = $excution->result();
		return $result;
	}
	
	function search_count($key) {
		$query = "select * from users where name like '%$key%'";
		$excution = $this->db->query($query);
		return $excution->num_rows();
	}
	
	function get_user_id($name) {
		$name=addslashes($name);
		$query = "select id from users where name = '$name'";
		$excution = $this->db->query($query);
		$result = $excution->result();
		if($excution->num_rows()>0)
			return $result[0]->id;
		else {
			return false;
		}
	}
	
	function get_user_password($id) {
		$query = "select password from users where id = '$id'";
		$excution = $this->db->query($query);
		$result = $excution->result();
		return $result[0]->password;
	}
	
	function get_user($id) {
		$query = "select * from users where id = '$id'";
		$excution = $this->db->query($query);
		$result = $excution->result();
		return $result[0];
	}
	
	function get_user_answers($id, $num, $offset) {
		$query = "select * from answers where userid = '$id' limit $offset,$num";
		$excution = $this->db->query($query);
		$result = $excution->result();
		return $result;
	}
	
	function get_user_answers_count($id) {
		$query = $this->db->query("select * from answers where userid = $id");
		return $query->num_rows();
	}
	
	function get_user_questions_count($id) {
		$query = $this->db->query("select * from questions where userid = $id");
		return $query->num_rows();
	}
	
	function get_user_questions($id, $num, $offset) {
		$query = "select * from questions where userid = '$id' limit $offset,$num";
		$excution = $this->db->query($query);
		$result = $excution->result();
		return $result;
	}
	
	function insert_user($pic) {
		$username = addslashes($this->input->post('rname'));
		$password = addslashes($this->input->post('rpass'));
		$job = addslashes($this->input->post('ujob'));
		
		$query = $this->db->query("insert into users(name,password,job,registerdate,picture) values('$username','$password','$job',now(),'$pic')");
		
		$user_id=$this->db->insert_id();
						
		return $user_id;
	}
	
	function get_today_ques_count($user_id) {
		$query = "select count(*) as count from questions where userid=$user_id and year(now())=year(date) and month(now())=month(now()) and day(now())=day(date)";
		$excution = $this->db->query($query);
		$result = $excution->result();
		
		return $result[0]->count;
	}
	
	function get_user_authority($user_id) {
		$query = "select score from users where id=$user_id";
		$excution = $this->db->query($query);
		$result = $excution->result();
		
		$score = $result[0]->score;
		if($score >= 100){
			return 5;
		}else{
			return 2;
		}		
	}
	
	function whether_can_ask($user_id) {
		return $this->get_today_ques_count($user_id)<$this->get_user_authority($user_id);
	}
	
}