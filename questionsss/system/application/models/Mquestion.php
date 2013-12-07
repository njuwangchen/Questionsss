<?php 
class Mquestion extends Model {
	function __construct() {
		parent::Model();
		
	}
	
	function get_questions_by_tag($tagid) {
		$query = $this->db->query("select q.id as qid, q.title as qtitle, q.content as qcontent, u.id as uid, u.name as uname, q.date as qdate, q.score as qscore from questions q, users u, tagtoquestion ttq where ttq.tagid='$tagid' and q.id=ttq.questionid and q.userid=u.id order by q.id desc");
		return $query->result();
	}
	
	function get_quescount_by_tag($tagid) {
		$query = $this->db->query("select * from tagtoquestion where tagid='$tagid'");
		return $query->num_rows();
	}
	
	function search_questions($key) {
		$query = $this->db->query("select q.id as qid, q.title as qtitle, q.content as qcontent, u.id as uid, u.name as uname, q.date as qdate, q.score as qscore from questions q, users u where (q.title like '%$key%' or q.content like '%$key%') and q.userid = u.id order by q.id desc");
		return $query->result();	
	}
	
}