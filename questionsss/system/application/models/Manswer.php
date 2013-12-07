<?php 
class Manswer extends Model{
	function __construct() {
		parent::Model();
		
	}
	
	function insert_answer($ques_id, $pic) {
		$content = addslashes($this->input->post('answer'));
		$userid = $this->session->userdata('uid');
		
		$query = "insert into answers(questionid, userid, content, date, picture) values('$ques_id','$userid','$content',now(),'$pic')";
		$excution = $this->db->query($query);
		return $this->db->insert_id();
	}
}