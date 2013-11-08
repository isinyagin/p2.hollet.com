<?php

class image_controller extends base_controller {
    public function testdb() {
        $q = 'insert into users 
                set first_name = "Albert",
                    last_name = "Einstein"';

        $q1 = 'update users
                set email = "albert@me.com"
                where first_name = "Albert"';

        $_POST['first_name'] = 'Albert';
        $_POST = DB::instance(DB_NAME)->sanitize($_POST); 
        $q2 = 'select email
                from users
                where first_name = "'.$_POST['first_name'].'"';
        echo DB::instance(DB_NAME)->select_field($q2);
    }

    public function test1() {
        //require(APP_PATH.'/libraries/Image.php');
        $imgObj = new Image('http://placekitten.com/1000/1000');
        $imgObj->resize(200,200);
        $imgObj->display();
    }
} # eoc
