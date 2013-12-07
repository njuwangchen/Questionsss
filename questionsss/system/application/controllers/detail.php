<?php 
class Detail extends Controller {

	function __construct() {
		parent::Controller();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->model('Mdetail');
	}
	
	function add_answer($ques_id) {
		$this->load->model('Manswer');
		
		$pic="";
		
		$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';	
			$this->load->library('upload',$config);		
			if ( ! $this->upload->do_upload("answerfile"))
			{
			$error = $this->upload->display_errors();
			}
			else
			{
			$data = $this->upload->data();
			$pic = $data['file_name'];
			echo $pic;
			echo '<br />';
			}
			$result = $this->Manswer->insert_answer($ques_id, $pic);
			if($result>0){
			echo 'success';
			redirect('/home/detailquestion/'.$ques_id."#$result");
			}else{
			echo 'fail';
			}		
	}
		
	function add_favor($user_id, $ans_id, $ques_id) {
		$result = $this->Mdetail->add_favor($user_id, $ans_id);
		if($result){
			echo 'success';
			redirect('/home/detailquestion/'.$ques_id."#$ans_id");
		}else{
			echo 'fail';
		}		
	}
	
	function delete_favor($user_id, $ans_id, $ques_id) {
		$result = $this->Mdetail->delete_favor($user_id, $ans_id);
		if($result){
			echo 'success';
			redirect('/home/detailquestion/'.$ques_id."#$ans_id");
		}else{
			echo 'fail';
		}	
	}
	
	function determine_ans($ques_id, $ans_id, $user_id, $score) {
		$result1 = $this->Mdetail->determine_ans($ques_id, $ans_id);
		$result2 = $this->Mdetail->add_score($user_id, $score);
		redirect('/home/detailquestion/'.$ques_id."#$ans_id");
	}
		
	}