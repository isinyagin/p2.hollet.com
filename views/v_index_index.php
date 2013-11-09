<h2>Welcome to <?=APP_NAME?><?php if($user) echo ', '.$user->first_name; ?></h2>

<p>Hollet microblog has the following main features: <p>

<ul>
    <li>Sign up</li>
    <li>Log in</li>
    <li>Log out</li>
    <li>Add posts(lettes)</li>
    <li>See a list of all other users</li>
    <li>Follow and unfollow other users</li>
    <li>View a stream of posts(letters) from the users they follow</li>
</ul>

<p>and some extra:</p>

<ul>
    <li>Delete a post(letter)</li>
    <li>Edit a post(letter)</li>
    <li>Reset password feature (from profile)</li>
    <li>Email confirmation upon signup</li>
    <li>"Send to a friend" feature where posts(letters) can be emailed to friends</li>
</ul>
