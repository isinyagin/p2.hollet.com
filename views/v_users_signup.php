<h2>Sign up</h2>
<p><?=$msg?></p>
<form method = 'POST' action = '/users/p_signup'>
    First name <input type='text' name='first_name'><br>
    Last name <input type='text' name='last_name'><br>
    Email <input type='email' name='email' required><br>
    Password <input type='password' name='password'><br>

    <input type='submit' value='Sign Up'>
</form>
