<?php 

class Mhome extends Model{
	function __construct() {
		parent::Model();
		
	}
	
	function get_questions() {
		$query = $this->db->query("select q.id as qid, q.title as qtitle, q.content as qcontent, u.id as uid, u.name as uname, q.date as qdate, q.score as qscore from questions q, users u where q.userid=u.id order by q.id desc");
		return $query->result();
	}
	
	function get_questions_limit($num,$offset) {
		if(!$offset) $offset=0;
		$query = $this->db->query("select q.id as qid, q.title as qtitle, q.content as qcontent, u.id as uid, u.name as uname, q.date as qdate, q.score as qscore from questions q, users u where q.userid=u.id order by q.id desc limit $offset,$num");
		return $query->result();
	}
	
	function get_answer_count($ques_id) {
		$query = $this->db->query("select * from answers where questionid=$ques_id");
		return $query->num_rows();
	}
	
	function get_question_tags($ques_id) {
		$query = $this->db->query("select t.id as tid, t.name as tname from tags t, tagtoquestion ttq, questions q where t.id=ttq.tagid and ttq.questionid=q.id and q.id=$ques_id");
		return $query->result();
	}
	
	function get_alltags() {
		$query = $this->db->query('select * from tags');
		return $query->result();
	}
	
	function get_tag_id($tagname) {
		$query = "select id from tags where name = '$tagname'";
		$excution = $this->db->query($query);
		$result = $excution->result();
		return $result[0]->id;	
	}
	
	function insert_question($user_id, $pic) {
		$title=addslashes($this->input->post('qtitle'));
		$content=addslashes($this->input->post('qdetail'));
		$score=addslashes($this->input->post('qscore'));
		
		$query = $this->db->query("insert into questions(title,content,userid,date,score,picture) values('$title','$content','$user_id',now(),'$score','$pic')");
		
		$ques_id=$this->db->insert_id();
		
		$taglist=trim($this->input->post('taglist'));
		if($taglist){
		$tags=explode(' ', $taglist);
		foreach ($tags as $tag_name) {
			$tag_id = $this->get_tag_id($tag_name);
			$this->db->query("insert into tagtoquestion(tagid,questionid) values('$tag_id','$ques_id')");
			}
		}
		
		$this->db->query("update users set score=score-'$score' where id='$user_id'");
		
		return $ques_id;
	}
		
	function checklogin() {
		if($this->session->userdata('uid')){
		return true;
		}else {
		return false;
		}
	}
	
}