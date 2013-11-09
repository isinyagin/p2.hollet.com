<?php if($msg): ?>
    <div class="alert alert-danger"> <?=$msg?> </div>
<?php endif; ?>

<h2>Sign up</h2>
<form role="form" method = 'POST' action = '/users/p_signup'>
    <div class="group-form">
        <label>First name </label>
        <input type='text' class="form-control" name='first_name' required>
    </div>

    <div class="group-form">
        <label>Last name </label>
        <input type='text' class="form-control" name='last_name' required>
    </div>

    <div class="group-form">
        <label>Email </label>
        <input type='email' class="form-control" name='email' required>
    </div>

    <div class="group-form">
        <label>Password </label>
        <input type='password' class="form-control" name='password' required>
    </div>

    <p class="help-block"></p>
    <button type='submit'class="btn btn-primary btn-xs" > Sign up </button>
</form>
