<?php
function sortByAnswers($a, $b) {
	if($a->answercount < $b->answercount){
	return 1;
	}else{
	return -1;
	}
}
class Home extends Controller {
	
	function __construct() {
		parent::Controller();
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('pagination');
		$this->load->model('Mhome');
	}
		
	function index() {
		$data['page_title']='Questionsss 首页';
		$data['isLogin']=$this->Mhome->checklogin();
		
		$questions=$this->Mhome->get_questions();
		if($questions){		
			foreach ($questions as $row) {
			$tagtoquestion[$row->qid]=$this->Mhome->get_question_tags($row->qid);
			$row->answercount = $this->Mhome->get_answer_count($row->qid);
			}
			usort($questions, "sortByAnswers");
			$data['tagtoquestion']=$tagtoquestion;
		}
		$data['questions']=array_chunk($questions, 5)[0];
		
		$this->load->view('header',$data);
		$this->load->view('index',$data);
		$this->load->view('footer');
		
	}
	
	function questioning() {
		$this->load->model('Muser');
		
		$data['page_title']='提出问题';
		$data['isLogin']=$this->Mhome->checklogin();
		$data['tags']=$this->Mhome->get_alltags();
		if(!$data['isLogin']) redirect('home/login');
		else if($this->Muser->whether_can_ask($this->session->userdata('uid'))){
		$this->load->view('header',$data);
		$this->load->view('questioning',$data);
		$this->load->view('footer');
		}else{
		$n=$this->Muser->get_user_authority($this->session->userdata('uid'));
		echo "<script>
			  alert('sorry, you can not ask more than $n questions one day! Please come tomorrow~ =.=');
			  window.location='http://localhost/~ClarkWong/questionsss/index.php/home/index';		
			  </script>";
		}
	}
	
	//pattern:1.所有问题（不同排列）2.某一个tag下的问题 3.按关键字搜索问题
	function questionlist($pattern, $value, $order) {
		$this->load->model('Mquestion');
		
		$data['page_title']='问题列表';
		$data['isLogin']=$this->Mhome->checklogin();
		
		$config['base_url']=base_url()."index.php/home/questionlist/$pattern/$value/$order/";
		$config['per_page']=5;
		$config['uri_segment']=6;
		
		$config['full_tag_open'] = '<div class="span10"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div>';
		
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="current"><a>';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
						
		if($pattern == 1){
				$questions=$this->Mhome->get_questions();
		}else if($pattern == 2){
				$questions=$this->Mquestion->get_questions_by_tag($value);		
		}else if($pattern == 3){
				$key = trim($this->input->post('searchques'));
				$key = addslashes($key);
				$questions=$this->Mquestion->search_questions($key);		
		}
		
		if($questions){		
		foreach ($questions as $row) {
			$tagtoquestion[$row->qid]=$this->Mhome->get_question_tags($row->qid);
			$row->answercount = $this->Mhome->get_answer_count($row->qid);
		}
		if($order == 2){
		usort($questions, "sortByAnswers");
		}else if($order == 3){
		$noans = array();
		foreach ($questions as $row) {
			if($row->answercount == 0)
				$noans[$row->qid] = $row;
		}
		$questions = $noans;
		}
		$data['tagtoquestion']=$tagtoquestion;
		}
		
		if(!$this->uri->segment(6)) $offset=0;
		else $offset=$this->uri->segment(6);
		
		$config['total_rows']=count($questions);
		$data['questions']=array_slice($questions, $offset, $config['per_page']);
		
		$data['tags']=$this->Mhome->get_alltags();
		//加载分页类的初始化
		$this->pagination->initialize($config);
		
		$this->load->view('header',$data);
		$this->load->view('questionlist',$data);
		$this->load->view('footer');
	}
	
	function detailquestion($ques_id) {
		$this->load->model('Mdetail');
		
		$data['page_title']='问题详情';
		$data['isLogin']=$this->Mhome->checklogin();
		
		$data['detail']=$this->Mdetail->get_detail($ques_id);
		$data['answercount']=$this->Mhome->get_answer_count($ques_id);
		$data['tags']=$this->Mhome->get_question_tags($ques_id);
		$data['answers']=$this->Mdetail->get_answers($ques_id);
		
		if($data['answercount']>0){
		foreach ($data['answers'] as $row) {
			if($data['isLogin']){
			$user_id=$this->session->userdata('uid');
			$whether[$row->aid]=$this->Mdetail->get_whether_favor($row->aid,$user_id);
			}
			$favortoanswer[$row->aid]=$this->Mdetail->get_favor_count($row->aid);
		}
		if($data['isLogin'])
		$data['whether']=$whether;
		$data['favortoanswer']=$favortoanswer;
		}
		
		$this->load->view('header',$data);
		$this->load->view('detailquestion',$data);
		$this->load->view('footer');
	}
	
	function login() {
		$data['page_title']='登录/注册';
		$data['isLogin']=$this->Mhome->checklogin();
		
		$this->load->view('header',$data);
		$this->load->view('login');
		$this->load->view('footer');
	}
	
	function about($user_id) {
		$this->load->model('Muser');
		$data['page_title']='个人中心';
		$data['isLogin']=$this->Mhome->checklogin();
		
		$data['user_info']=$this->Muser->get_user($user_id);
		
		$this->load->view('header',$data);
		$this->load->view('about',$data);
		
		$ans_off=$this->about_answers($user_id);
		$ques_off=$this->about_questions($user_id,$ans_off);
		$this->about_board($user_id,$ans_off,$ques_off);
		
	}
	
	function about_answers($user_id) {
		$config['base_url']=base_url()."/index.php/home/about/$user_id";
		$config['total_rows']=$this->Muser->get_user_answers_count($user_id);
		$config['per_page']=3;
		$config['uri_segment']=4;
		$config['page_link_to']='#answers';
		$this->pagination->initialize($config);
		
		$num=$config['per_page'];
		$offset=0;
		if($this->uri->segment(4)) $offset=$this->uri->segment(4);
		
		$data['answers']=$this->Muser->get_user_answers($user_id, $num, $offset);
		$this->load->view('about_answers',$data);
		return $offset;
	}
	
	function about_questions($user_id,$ans_off) {
		$config['base_url']=base_url()."/index.php/home/about/$user_id/$ans_off";
		$config['total_rows']=$this->Muser->get_user_questions_count($user_id);
		$config['per_page']=3;
		$config['uri_segment']=5;
		$config['page_link_to']='#questions';
		$this->pagination->initialize($config);
	
		$num=$config['per_page'];
		$offset=0;
		if($this->uri->segment(5)) $offset=$this->uri->segment(5);
		
		$data['questions']=$this->Muser->get_user_questions($user_id,$num,$offset);
		$this->load->view('about_questions',$data);
		return $offset;
	}
	
	function about_board($user_id,$ans_off,$ques_off) {
		$this->load->model('MMessage');
		
		$config['base_url']=base_url()."/index.php/home/about/$user_id/$ans_off/$ques_off";
		$config['total_rows']=$this->MMessage->get_messages_count($user_id);
		$config['per_page']=3;
		$config['uri_segment']=6;
		$config['page_link_to']='#board';
		$this->pagination->initialize($config);
		
		$num=$config['per_page'];
		$offset=0;
		if($this->uri->segment(6)) $offset=$this->uri->segment(6);
		
		$data['messages']=$this->MMessage->get_messages($user_id,$num,$offset);
		$data['user_id']=$user_id;
		$this->load->view('about_board',$data);
		$this->load->view('footer');
	}
	
	//1是全部用户 2是搜索
	function users($pattern) {
		$this->load->model('Muser');
		
		$data['page_title']='用户';
		$data['isLogin']=$this->Mhome->checklogin();
		
		$config['base_url']=base_url()."index.php/home/users/$pattern/";
		$config['per_page']=8;
		$config['uri_segment']=4;
		
		$config['full_tag_open'] = '<div class="span10"><ul class="pagination">';
		$config['full_tag_close'] = '</ul></div>';
		
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		
		$config['cur_tag_open'] = '<li class="current"><a>';
		$config['cur_tag_close'] = '</a></li>';
		
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		
		if($pattern == 1){
		$config['total_rows'] = $this->db->count_all('users');
		$num=$config['per_page'];
		$offset=0;
		if($this->uri->segment(4)) $offset=$this->uri->segment(4);
		$data['users']=$this->Muser->get_all_users($num,$offset);
		}
		else if($pattern == 2){		
		$num=$config['per_page'];
		$offset=0;
		if($this->uri->segment(4)) $offset=$this->uri->segment(4);
		$key=$this->input->post('search_user');
		$key=addslashes($key);
		$config['total_rows'] = $this->Muser->search_count($key);
		$data['users']=$this->Muser->search_users($key,$num,$offset);
		}
		$this->pagination->initialize($config);				
		foreach ($data['users'] as $row) {
			$row->anscount=$this->Muser->get_user_answers_count($row->id);
			$row->quescount=$this->Muser->get_user_questions_count($row->id);
		}
		
		$this->load->view('header',$data);
		$this->load->view('users',$data);
		$this->load->view('footer');		
	}
	
}

