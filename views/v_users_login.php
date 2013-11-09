<?php if($msg): ?>
    <div class="alert alert-danger"> <?=$msg?> </div>
<?php endif; ?>

<form role="form" method = 'POST' action = '/users/p_login'>
    <div class="group-form">
        <label>Email </label> 
        <input type='email' name='email' class="form-control" required placeholder="Enter email">
    </div>

    <div class="group-form">
        <label>Password</label> 
        <input type='password' class="form-control" name='password' required  placeholder="Enter password">
    </div>

    <p class="help-block"></p>
    <button type='submit'class="btn btn-primary btn-xs" > Log in </button>
</form>
