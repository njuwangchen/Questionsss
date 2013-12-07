<?php  

class Mdetail extends Model {
	function __construct() {
		parent::Model();
		
	}
	
	function get_detail($ques_id) {
		$query = $this->db->query("select q.id as qid, q.title as qtitle, q.content as qcontent, u.id as uid, u.name as uname, q.date as qdate, q.score as qscore, q.picture, q.determinedanswer as qda from questions q, users u where q.id=$ques_id and q.userid=u.id");
		return $query->result();
	}
	
	function get_answers($ques_id) {
		$query = $this->db->query("select q.id as qid, a.id as aid, u.id as uid, u.name as uname, a.content as acontent, a.date as adate, a.picture from questions q, answers a, users u where q.id=a.questionid and q.id=$ques_id and u.id=a.userid");
		return $query->result();
	}
	
	function get_favor_count($ans_id) {
		$query = $this->db->query("select * from answers a, favortoanswer fta where fta.answerid=a.id and a.id=$ans_id");
		return $query->num_rows();
	}
	
	function get_whether_favor($ans_id, $user_id) {
		$query = $this->db->query("select * from favortoanswer where answerid = $ans_id and userid = $user_id");
		return $query->num_rows()>0?true:false;
	}
	
	function add_favor($user_id,$ans_id) {
		$query = $this->db->query("insert into favortoanswer(userid, answerid) values('$user_id','$ans_id')");
		return $this->db->affected_rows();	
	}
	
	function delete_favor($user_id,$ans_id) {
		$query = $this->db->query("delete from favortoanswer where userid=$user_id and answerid=$ans_id");
		return $this->db->affected_rows();		
	}
	
	function determine_ans($ques_id,$ans_id) {
		$query = $this->db->query("update questions set determinedanswer=$ans_id where id=$ques_id");
		return $this->db->affected_rows();
	}
	
	function add_score($user_id,$score) {
		$query = $this->db->query("update users set score=score+$score where id=$user_id");
		return $this->db->affected_rows();
	}
}