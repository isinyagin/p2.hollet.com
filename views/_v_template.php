<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">			

	<!-- Controller Specific JS/CSS -->
	<?php if(isset($client_files_head)) echo $client_files_head; ?>
</head>

<body id="hollet">
    <div class="container">
        <div class="col-lg-6">

            <header class="row">
                <nav class="navbar"> 
                    <a class="navbar-brand" href="/">Hollet</a>
                    <ul class="nav navbar-nav">
                    <?php if($user): ?>
                        <li><a href='/posts/index'>Letters</a></li>
                        <li><a href='/posts/add'>Add a letter</a></li>
                        <li><a href='/users/profile'>Profile</a></li>
                        <li><a href='/posts/users'>Users</a></li>
                        <li><a href='/users/logout'>Logout</a></li>
                    <?php else: ?>
                        <li><a href='/users/signup'>Sign Up</a></li>
                        <li><a href='/users/login'>Login</a></li>
                    <?php endif; ?>
                    </ul> 
                </nav>
            </header>

            <section class="row">
                <?php if(isset($content)) echo $content; ?>
            </section>

            <?php if(isset($client_files_body)) echo $client_files_body; ?>
        </div>
    </div>
</body>
</html>
