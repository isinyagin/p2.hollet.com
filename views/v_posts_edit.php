<p><?=$msg?></p>
<p>Edit the post and submit</p>
<form method='post' action='/posts/p_edit'>
    <textarea name='content'><?=$textarea_value?></textarea>
    <input type='hidden' name='created' value='<?=$created ?>' >
    <input type='hidden' name='user_id' value='<?=$user_id ?>' >
    <input type='submit' name='update' value='Update'>
</form>
