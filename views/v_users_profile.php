<p><?=$msg?></p>
<h2>This is profile of <?=$user->first_name?></h2>
<form method='post' action='/users/reset_pass/<?=$user->email?>'>
    <input type='submit' name='reset' value='Reset Passowrd'>
</form>
