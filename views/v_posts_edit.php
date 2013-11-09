<?php if($msg): ?>
    <div class="alert alert-danger"> <?=$msg?> </div>
<?php endif; ?>

<form role="form" method='post' action='/posts/p_edit'>
    <div class="form-group">
        <label>Edit your letter</label>
        <textarea name='content'><?=$textarea_value?></textarea>
    </div>

    <input type='hidden' name='created' value='<?=$created ?>' >
    <input type='hidden' name='user_id' value='<?=$user_id ?>' >

    <p class="help-block"></p>
    <button type="submit" class="btn btn-primary">Update</button>
</form>
