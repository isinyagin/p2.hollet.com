<?php if($msg): ?>
    <div class="alert alert-danger"> <?=$msg?> </div>
<?php endif; ?>

<form role="form" method='post' action='/posts/p_add'>
    <div class="form-group">
        <label>Your letter</label>
        <textarea name='content' placeholder="Enter letter" required></textarea>
    </div>
    <p class="help-block"></p>
    <button type="submit" class="btn btn-primary">Add a letter</button>
</form>
