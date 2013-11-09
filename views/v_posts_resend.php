<?php if($msg): ?>
    <div class="alert alert-danger"> <?=$msg?> </div>
<?php endif; ?>

<form role="form" method='POST' action='/posts/p_resend'>
    <div class="group-form">
        <label>To: </label>
        <input type='text' name='name' class="form-control" required placeholder="Enter recipient">
    </div>

    <div class="group-form">
        <label>Email: </label>
        <input type='email' name='email' class="form-control" required placeholder="Enter email">
    </div>

    <input type='hidden' name='letter' value=<?=$letter?> >
    <p class="help-block"></p>
    <button type='submit'class="btn btn-primary btn-xs" > Send to Email </button>
</form>
