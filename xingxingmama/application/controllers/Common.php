<?php

class Common extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Question_model');
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

        $data['asker_uid'] = '10193';//虚拟用户id

        $this->Question_model->create_question($data);
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
        $this->load->view('question', $data);
    }

}
	