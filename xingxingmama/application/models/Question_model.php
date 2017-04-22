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



  public function save_answer($question_id, $text, $anonymous,$answerer_uid)
  {
    $data = array(
      /*'answer_id' => 2,*/
      'question_id'=>$question_id,
      'answer_content'=>$text,
      'add_time'=>time(),
      'answer_uid'=>$answerer_uid,
      'anonymous'=>$anonymous
    );
    // add_integrations($answerer_uid,2);//回答加2分
    return $this->db->insert('answer', $data);
  }

  public function  get_answers($question_id)
  {
    $this->db->join('user', 'answer.answer_uid = user.id' , 'left');
    $data = array('answer.question_id' => $question_id);
    $query = $this->db->select('answer.answer_uid, answer.agree_count, answer.answer_content, answer.add_time, user.name, user.signature, user.icon');
    return $this->db->get_where('answer', $data)->result_array();
  }

  public function save_agreements($agree_count,$answer_id,$uid)
  {
    $data1 = array(
      'answer_id'=>$answer_id,
      'uid'=>$uid
    );
    $query = $this->db->get_where('agree',$data1)->row(0);

    if (empty($query))
    {
      $this->db->insert('agree', $data1);
      $agree_count = $agree_count + 1;
    }
    else
    {
      $this->db->delete('agree', $data1);
      $agree_count = $agree_count - 1;
    }
    $data = array('agree_count'=>$agree_count);
    return $this->db->update('answer',$data,array('answer_id'=>$answer_id));
 }

 public function get_agreements($answer_id)
  {
    $data = array('answer_id' => $answer_id);
    return $this->db->get_where('answer', $data)->row_array();
  }

  public function collect_status($uid,$answer_id)
  {
    $data1 = array(
      'answer_id'=>$answer_id,
      'uid'=>$uid
    );
    $query = $this->db->get_where('collect',$data1)->row(0);

    if (empty($query))//返回一代表收藏
    {
      $this->db->insert('collect', $data1);
      return 1;
    }
    else//返回0代表取消收藏
    {
      $this->db->delete('collect', $data1);
      return 0;
    }
  }

    public function get_collections($uid , $answer_id)//用户自己看到收藏
    {
      $data = array('uid'=>$uid);
      $query = $this->db->select('collect.answer_id');//连接answer表显示 问题和答案。
      return $this->db->get_where('collect', $data)->row_array();//返回多条问题
    }

    public function add_integrations($uid,$integration)
    {
      
      $this->db->query("UPDATE `user` SET integration = integration + $integration WHERE id = $uid");
      //邀请新的用户 则 邀请者与被邀者都+10
      // 举报用户+1分
      // 办活动+15分
      //提问+2分 此提问有人回答则+1分
      //回答+2分 此回答有点赞则按10个赞+1分
      //充值则1元=10分
    }

}
