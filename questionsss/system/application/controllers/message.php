<?php 
class Message extends Controller {

	function __construct() {
		parent::Controller();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('MMessage');
	}
	
	function submit_message($fromid,$toid) {
		$content = $this->input->post('message');
		$result = $this->MMessage->insert_message($fromid,$toid,$content);
		if($result){
			echo 'success';
			redirect("home/about/$toid#board");
			}else{
			echo 'fail';
			}
	}
	
}