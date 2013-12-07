<?php 
class Questioning extends Controller {

	function __construct() {
		parent::Controller();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
	}
	
	function check_score() {
		$this->load->model('Muser');
		$user_id=$this->session->userdata('uid');
		$user=$this->Muser->get_user($user_id);
		$inteval=$user->score-$this->input->post('score');
		if ($inteval>=0) {
			echo "√ 您还剩".$inteval."积分可用";
		}else{
			echo "× 您的剩余积分不足哦";
		}		
	}
	
	function add_question($user_id) {
			$this->load->model('Mhome');
			
			$pic="";
	
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png';	
			$this->load->library('upload',$config);		
			if (!$this->upload->do_upload())
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
			$result = $this->Mhome->insert_question($user_id, $pic);
			if($result>0){
			redirect('home/detailquestion/'.$result);
			}else{
			echo 'fail';
			}		
		}
	
	
}