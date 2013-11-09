<?php

class posts_controller extends base_controller {

    private static function redirect($destination) {
        Router::redirect("http://".$_SERVER['HTTP_HOST'].$destination);
    }

    public function __construct() {
        parent::__construct();
        if(!$this->user)
            self::redirect("/");
    }

    public function add($msg = NULL) {
        self::template_setup('v_posts_add', "Send a letter", $msg);
        echo $this->template;
    }

    public function p_add() {
        if(!isset($_POST['content']) || empty(trim($_POST['content']))) {
            $error = "A letter can't be empty";
            self::redirect('/posts/add/'.$error);
        }

        $array = ['user_id'  => $this->user->user_id,
                  'created'  => Time::now(),
                  'modified' => Time::now(),
                  'content'  => $_POST['content'] ];
        DB::instance(DB_NAME)->insert('posts', $array);
        $msg = "A letter has been added";
        self::redirect('/posts/index/'.$msg);
    }

    public function p_modify($created) {
        if (isset($_POST['delete'])) {
            DB::instance(DB_NAME)->delete('posts', 'WHERE created = "'.$created.'" AND user_id = "'.$this->user->user_id.'" ');
            $msg = "Post deleted";
            self::redirect('/posts/index/'.$msg);
        } 

        if (isset($_POST['edit'])) {
            self::template_setup('v_posts_edit', 'Edit the letter', NULL);
            $this->template->content->textarea_value = $_POST['content'];
            $this->template->content->created = $created;
            $this->template->content->user_id = $this->user->user_id;
            echo $this->template;
        }

        if (isset($_POST['resend'])) {
            self::template_setup('v_posts_resend', "Resend a letter");
            $this->template->content->letter = $_POST['content'];
            echo $this->template;
        }
    }

    public function p_resend($msg = NULL) {
        if (!isset($_POST) || empty(trim($_POST['name'])) || empty(trim($_POST['email']))) {
            $error = "All fields are required";
            self::redirect('/posts/p_resend/'.$error);
        }
        self::send_email($_POST['letter'], $_POST['name'], $_POST['email']);
        $msg = "You letter has been resent";
        self::redirect('/posts/index/'.$msg);
    }

    private function send_email($letter, $name, $email) {
        $to[] = Array("name" => $name, "email" => $email);
        $from = Array("name" => APP_NAME, "email" => APP_EMAIL);

        $subject = 
            'You\'ve got a letter from ' . $this->user->first_name . ' '. $this->user->last_name;

        $body = View::instance('e_letter_send');
        $body->bind('letter', $letter);

        $cc  = "";
        $bcc = "";

        $email = Email::send($to, $from, $subject, $body, true, $cc, $bcc);
    }

    public function p_edit($msg = NULL) {
        if(!isset($_POST['content']) || empty(trim($_POST['content']))) {
            $error = "Post can't be empty";
            self::redirect('/posts/p_edit/'.$error);
        }

        $data = ['content' => $_POST['content'], 
                 'modified' => Time::now() ];
        $where_condition = 'WHERE user_id = "'.$_POST['user_id'].'" 
                            AND created = "'.$_POST['created'].'" ';
        DB::instance(DB_NAME)->update('posts', $data, $where_condition);                        
        $msg = "You've edited the post";
        self::redirect('/posts/index/'.$msg);
    }   

    public function index($msg = NULL) {
        self::template_setup('v_posts_index', 'Letters', $msg);
        $this->template->content->posts = Post::get_posts($this->user->user_id);
        echo $this->template;
    }

    public function users($msg = NULL) {
        self::template_setup('v_posts_users', 'Users', $msg);

        $this->template->content->users = Post::get_users();
        $this->template->content->connections = Post::get_connections($this->user->user_id);

        echo $this->template;
    }
    
} #eoc
