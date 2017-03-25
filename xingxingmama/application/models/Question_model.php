<?php 
class Question_model extends CI_Model{


    public function __construct()
    {
        parent::__construct();
        
    }

	public function create_question($data)
	{
		$arr = array(
			'title' => $data['problem_title'],
			'content' =>$data['problem_description'],
			 'tag' => $data['topic'],
			'anonymous' => $data['anonymous'],
			'asker_uid' => $data['asker_uid']
			);
		$this->db->insert('question', $arr);
	}

	public function question($id)
	{
		return $this->db->get_where('question',array('id' => $id))->row_array();
	}
}