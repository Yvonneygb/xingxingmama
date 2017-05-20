<?php

class Common extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Question_model');
        $this->load->library('session');
    }

    public function ask_questions()
    {
        $this->load->view('ask_questions');
    }

    public function ask_questions_submit()
    {
        $data['problem_title'] = $this->input->post('problem_title');
        $data['topic'] = $this->input->post('topic');
        $data['problem_description'] = $this->input->post('problem_description');
        $data['anonymous'] = $this->input->post('anonymous') === 'on' ? ANONYMOUS : REAL_NAME;

        if (!$data['problem_title'] || !$data['topic'] || mb_strlen($data['problem_title'], 'utf8') >= 256 || mb_strlen($data['topic'], 'utf8') >= 128 ||  0 == preg_match('/^[\-+]?[0-9]*\.?[0-9]+$/', $data['topic']))
        {
            $this->ask_questions();
            return;
        }

        $data['asker_uid'] = $this->session->USER_ID;//虚拟用户id

        $this->Question_model->create_question($data);
        $this->Question_model->add_integrations($this->session->USER_ID, 2);//提问+2分
        print_r('<script>alert("成功")</script>');
        print_r($data);
    }

    public function question($id)
    {
        $data = $this->Question_model->question($id);
        if (!$data)
         {
            show_404();
            return;
        }
        $data['id'] = $id;

        // answer
        $answer_item['name'] = 'zhangshan2';
        $answer_item['signature'] = 'hello2';
        $answer_item['content'] = '012352';
        $answer_item['agree_count'] = '1112';
        $answer_item['add_time'] = '2017-5-22';

        $arr = array(
          'name'=>$answer_item['name'],
          'signature'=>$answer_item['signature'],
          'content'=>$answer_item['content'],
          'agree_count'=>$answer_item['agree_count'],
          'add_time'=>$answer_item['add_time']
        );
		
		$data['answer_item'] = array();
		array_push($data['answer_item'], $arr, $arr);
		
		
         //print_r($data);
        // print_r($answer_item['name']);
        $this->load->view('question', $data);
    }

    public function answer_submit()
    {
      $question_id = $this->input->post('id');
      $text = $this->input->post('text');
      $anonymous = 1; // 1. 匿名 0. 实名
      $answerer_uid = $this->session->USER_ID;
      $this->Question_model->save_answer($question_id, $text, $anonymous,$answerer_uid);
      print_r($answerer_uid);
      $this->Question_model->add_integrations($answerer_uid, 2);//回答加2分
    }


     public function agree_submit()
     {
       $answer_id = 1;
       $agree_count = 3;
       $uid = $this->session->USER_ID;
       $this->Question_model->save_agreements($agree_count,$answer_id,$uid);
     }

    public function agree_count()
     {
       $answer_id = 1;
       $data = $this->Question_model->get_agreements($answer_id);
       print_r($data);
     }

     public function collect()
     {
       $uid = $this->session->USER_ID;
       $answer_id = 33;
       $this->Question_model->collect_status($uid,$answer_id);
     }

     public function collections()
     {
       $uid = $this->session->USER_ID;
       $answer_id = 33;
       $data = $this->Question_model->get_collections($uid,$answer_id);
       print_r($data);
     }

     public function integration()
     {
       $uid = $this->session->USER_ID;
       $integration = 2;
       $data = $this->Question_model->add_integrations($uid,$integration);
       print_r($data);
     }

     public function set_user($user_id)
     {
       //存入session属性
       $this->session->set_userdata('USER_ID', $user_id);

       echo $this->session->USER_ID;
     }

     public function answer()
     {
       $question_id = '8';
       $data = $this->Question_model->get_answers($question_id);
       print_r($data);
     }
//显示某个问题所有回答
     public function show_answers(){
       $this->load->view('show_answers');
     }
//评论接口
     public function set_comment()
     {
       //获取session的属性
       $comment_uid=$this->session->USER_ID;
       $cotent=$this->input->post('comment');
       $answer_id=$this->input->post('answersid');
       $this->Question_model->save_comment($comment_uid,$answer_id,$cotent);
     }
     //创建个人信息
     //判断是否重复数据，例如用户名
    public function set_information(){
     $username=$this->input->post('username');
     if($this->Question_model->judge_username($username)){
      //报错处理
           print_r('<script>alert("用户名重复")</script>');
           return;
     }
    $infordata = array('name' =>username ,
                   'signature'=>$this->input->post('signature'),
                   'platform_id'=>$this->input->post('platform_id'),
                  'icon'=>$this->input->post('icon'),
                  'integration'=>$this->input->post('integration'),
                  'city'=>$this->input->post('city'),
                  'sex'=>$this->input->post('sex'),
                  'balance'=>$this->input->post('balance'),
                  'child_age'=>$this->input->post('child_age'),
                  'child_situation'=>$this->input->post('child_situation'),
                  'autism_degree'=>$this->input->post('autism_degree')
                );
                $this->Question_model->create_information($infordata);
     }
     public function get_user($username){
       $infordata=$this->Question_model->get_user($username);
       return $infordata;
     }
}
