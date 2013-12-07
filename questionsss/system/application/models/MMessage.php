<?php 

class MMessage extends Model{
	function __construct() {
		parent::Model();
		
	}
	
	function get_messages($user_id,$num,$offset) {
		$query = "select *, u.name from messages m, users u where u.id=m.fromid and m.toid=$user_id order by date desc limit $offset,$num";
		$excution = $this->db->query($query);
		$result = $excution->result();
		
		return $result;	
	}
	
	function get_messages_count($user_id) {
		$query = "select *, u.name from messages m, users u where u.id=m.fromid and m.toid=$user_id";
		$excution = $this->db->query($query);
		
		return $excution->num_rows();
	}
	
	function insert_message($fromid,$toid,$content) {
		$content=addslashes($content);
		$query = "insert into messages(fromid,toid,content,date) values('$fromid','$toid','$content',now())";
		$excution = $this->db->query($query);
		
		return $this->db->insert_id();
	}
	
}
	