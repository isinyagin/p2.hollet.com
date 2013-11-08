<?php

class users_controller extends base_controller {

    private static function redirect($destination) {
        Router::redirect("http://".$_SERVER['HTTP_HOST'].$destination);
    }

    public function __construct() {
        parent::__construct();
    } 

    public function index() {
        if($this->user)
            Router::redirect('/users/profile');
    }

    public function signup($msg = NULL) {
        if($this->user)
            self::redirect('/posts/index');

        self::template_setup('v_users_signup', "Sign up", $msg);
        echo $this->template;
    }

    public function p_signup() {
        if(!$_POST['first_name'] || !$_POST['last_name'] || 
           !$_POST['email'] || !$_POST['password']) {
            $error = "All fields are required";
            self::redirect('/users/signup/'.$error);
        }

        $user = $this->userObj->signup($_POST);
        if($user) {
            Post::follow($user['user_id'], $user['user_id']); /* follow yourself by default */
            $this->userObj->create_initial_avatar($user['user_id']);
            $this->userObj->send_signup_email($_POST, $subject = "Welcome to Hollet!");
            $msg = 'You\'re signed up. Please log in';
            self::redirect('/users/login/'.$msg);
        } else {
            $error = 'Something went wrong, try again'; 
            self::redirect('/users/signup/'.$error);
        }
    }

    public function login() {
        if ($this->user)
            self::redirect('/posts/index');

        self::template_setup('v_users_login', "Log in", NULL);
        echo $this->template;
    }

    public function p_login() {
        $token = $this->userObj->login($_POST['email'], $_POST['password']);
        $this->userObj->login_redirect($token, $_POST['email'], '/posts/index');
    }

    public function logout() {
        $this->userObj->logout($this->user->email);
        self::redirect('/users/login');
    }

    public function profile($msg = NULL) {
        if (!$this->user)
            self::redirect('/users/login');

        //$client_files_head = ['/css/profile.css/', '/css/master.css'];
        //$this->template->client_files_head = Utils::load_client_files($client_files_head);

        self::template_setup('v_users_profile', 'Profile', $msg);
        //$client_files_body = ['/js/profile.js/', '/js/master.js'];
        //$this->template->client_files_body = Utils::load_client_files($client_files_body);

        echo $this->template;
    }

    public function reset_pass($email) {
        $password = $this->userObj->reset_password($email);
        $name = $this->user->first_name.' '.$this->user->last_name;
        $post = ['name' => $name, 'email' => $email];
        $this->userObj->send_new_password($password, $post);
        $msg = "Your password has been reset";
        self::redirect('/users/profile/'.$msg);
    }

    public function follow($user_id_followed) {
        Post::follow($this->user->user_id, $user_id_followed);
        self::redirect("/posts/users");
    }

    public function unfollow($user_id_followed) {
        Post::unfollow($this->user->user_id, $user_id_followed);
        self::redirect("/posts/users");
    } 
} # end of the class