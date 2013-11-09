<?php if($msg): ?>
    <div class="alert alert-danger"> <?=$msg?> </div>
<?php endif; ?>

<?php foreach($posts as $post): ?>
    <article class="panel panel_default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <?=$post['first_name']?>
                <?=$post['last_name'].' ('.Time::time_ago($post['created']).') : '?>
            </h4>
        </div>

        <div class="panel-body">
            <?=$post['content']?>
        </div>

        <?php if($post['post_user_id'] === $user->user_id): ?>
            <div class="panel-footer">
                <form role="form" method = 'POST' action = '/posts/p_modify/<?=$post['created']?>'>
                    <input type='hidden' name='content' value="<?=$post['content']?>"> 
                    <button type='submit'class="btn btn-danger btn-xs" name='delete'> 
                        Delete Post
                    </button>
                    <button type='submit'class="btn btn-info btn-xs" name='edit'> 
                        Edit Post
                    </button>
                    <button type='submit'class="btn btn-primary btn-xs" name='resend'>
                        Send to Email
                    </button>
                </form>
            </div>
        <?php endif; ?>
    </article>
<?php endforeach;?> 
