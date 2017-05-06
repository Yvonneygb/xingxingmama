

<table border="1">
<?php
//得到某个问题的答案
$data=$this->Question_model->get_answers(8);
foreach ($data as $test1) {
  ?>
  <tr>
     <td>
     <?php
     echo  "answeruid: ".$test1["answer_uid"].'</br>'." answercomtent: ".$test1["answer_content"].'</br>'." addtime: ".$test1["add_time"].'</br>';
//得到问题的评论
     $AllComment=$this->Question_model->get_comment($test1["answer_id"]);
    foreach ($AllComment as $tempcomment) {
    echo " 用户名id: ".$tempcomment["comment_uid"]. " 评论： ".$tempcomment["comment_content"]." 添加时间: ".$tempcomment["comment_content"].'</br>';
    }
      ?>
      <div class="comment">
<form action="set_comment" method="post">
      <input type="hidden" name="answerid" value=<?php echo $test1["answer_id"]; ?> />
      评论：<input type="text" name="comment"  />
      <input type="submit" />
  </form>

      </div>
    </td>
  </tr>
  <?php
}
?>

</table>
