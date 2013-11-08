<p><?=$msg?></p>
<?php foreach($posts as $post): ?>
    <strong>
        <?=$post['first_name']?>
        <?=$post['last_name'].': '?>
    </strong>
    <?=$post['content']?> (<?=Time::time_ago($post['created'])?>)<br>
    <?php if($post['post_user_id'] === $user->user_id): ?>
        <form method = 'POST' action = '/posts/p_modify/<?=$post['created']?>'>
            <input type='hidden' name='content' value="<?=$post['content']?>"> 
            <input type='submit' name='delete' value='Delete Post'>
            <input type='submit' name='edit' value='Edit Post'>
            <input type='submit' name='resend' value='Send to Email'>
        </form>
    <?php endif; ?>
<?php endforeach;?> 
