<?php

class Post {
    public static function follow($cur_user_id, $user_id_followed) {
        # Prepare the data array to be inserted
        $data = [ 
            "created" => Time::now(),
            "user_id" => $cur_user_id,
            "user_id_followed" => $user_id_followed ];
        
        # Do the insert
        DB::instance(DB_NAME)->insert('users_users', $data);
    }

    public static function unfollow($cur_user_id, $user_id_followed) {
        # Delete this connection
        $where_condition = 'WHERE user_id = '.$cur_user_id.' AND user_id_followed = '.$user_id_followed;
        DB::instance(DB_NAME)->delete('users_users', $where_condition);
    }

    public static function get_posts($user_id) {
        $q = '
            SELECT 
                posts.content,
                posts.created,
                posts.user_id AS post_user_id,
                users_users.user_id AS follower_id,
                users.first_name,
                users.last_name
            FROM posts
            INNER JOIN users_users 
                ON posts.user_id = users_users.user_id_followed
            INNER JOIN users 
                ON posts.user_id = users.user_id
            WHERE users_users.user_id = "'.$user_id.'" 
            ORDER BY posts.created DESC';

        return DB::instance(DB_NAME)->select_rows($q);
    }

    public static function get_users() {
        # Build the query to get all the users
        $q = "SELECT 
              user_id, first_name, last_name, email
            FROM users";

        # Execute the query to get all the users. 
        # Store the result array in the variable $users
        return DB::instance(DB_NAME)->select_rows($q);
    }

    public static function get_connections($user_id) {
        $q = "SELECT *
            FROM users_users
            WHERE user_id = ".$user_id;

        # Execute this query with the select_array method
        # select_array will return our results in an array and use the "users_id_followed" field as the index.
        # This will come in handy when we get to the view
        # Store our results (an array) in the variable $connections
        return DB::instance(DB_NAME)->select_array($q, 'user_id_followed');
    }
}
