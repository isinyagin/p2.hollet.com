<?php if($msg): ?>
    <div class="alert alert-danger"> <?=$msg?> </div>
<?php endif; ?>

<h2>This is profile of <?=$user->first_name?> <?=$user->last_name?></h2>
<form role="form" method='post' action='/users/reset_pass/<?=$user->email?>'>
    <button type='submit'class="btn btn-primary btn-xs" name="reset">
        Reset Password
    </button>
</form>
