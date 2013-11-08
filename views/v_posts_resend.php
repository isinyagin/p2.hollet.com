<form method='post' action='/posts/p_resend'>
    To: <input type='text' name='name'><br>
    Email: <input type='email' name='email'><br>
    <input type='hidden' name='letter' value=<?=$letter?> >
    <input type='submit' value='Send'>
</form>
