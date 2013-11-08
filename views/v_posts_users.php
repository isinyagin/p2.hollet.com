<?php foreach($users as $cur_user): ?>
    
    <!-- Don't print yourself, you are following yourself by default -->
    <?php if($user->email === $cur_user['email']) continue; ?>

    <!-- Print this user's name -->
    <?=$cur_user['first_name']?> <?=$cur_user['last_name']?>

    <!-- If there exists a connection with this user, show a unfollow link -->
    <?php if(isset($connections[$cur_user['user_id']])): ?>
        <a href='/users/unfollow/<?=$cur_user['user_id']?>'>Unfollow</a>
    <?php else: ?>
        <a href='/users/follow/<?=$cur_user['user_id']?>'>Follow</a>
    <?php endif; ?>
    
    <br><br>

<?php endforeach; ?>
