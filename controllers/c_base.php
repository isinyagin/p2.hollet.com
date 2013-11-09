<?php

class base_controller {
	
	public $user;
	public $userObj;
	public $template;
	public $email_template;

	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
		# Instantiate User obj
        $this->userObj = new User();
			
		# Authenticate / load user
        $this->user = $this->userObj->authenticate();					
                    
		# Set up templates
        $this->template 	  = View::instance('_v_template');
        $this->email_template = View::instance('_v_email');			
								
		# So we can use $user in views			
        $this->template->set_global('user', $this->user);

        $client_files_head = ['/css/bootstrap.css'];
        $this->template->client_files_head = Utils::load_client_files($client_files_head);
        $client_files_body = ['/js/bootstrap.js'];
        $this->template->client_files_body = Utils::load_client_files($client_files_body);
    }
	
    protected function template_setup($view, $title, $msg = NULL) {
        $this->template->title = $title;
        $this->template->content = View::instance($view);
        $this->template->content->msg = $msg;
    }
    
} # eoc
