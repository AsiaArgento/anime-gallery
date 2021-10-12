<?php 

class User {

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    
    public static function find_all_users() {
        // global $database;
        // $result_set = $database->query("SELECT * FROM users");
        // return $result_set;
        return self::find_this_query("SELECT * FROM users");
    }

    public static function find_user_by_id($user_id) {
        global $database;
        // $result_set = $database->query("SELECT * FROM users WHERE id= $user_id LIMIT 1");
        $result_set = self::find_this_query("SELECT * FROM users WHERE id= $user_id LIMIT 1");
        $found_user = mysqli_fetch_array($result_set);
        return $found_user;
    }

    public static function find_this_query($sql) {
        global $database;
        $result_set = $database->query($sql);
        $user_object_array = array();
        while($row = mysqli_fetch_array($result_set)) {
            $user_object_array[] = self::instantiation($row);
        }
        return $user_object_array;
    }

    public static function instantiation($found_user) {
        $user_object = new self;
        // $user_object->id = $found_user['id'];
        // $user_object->username = $found_user['username'];
        // $user_object->password = $found_user['password'];
        // $user_object->first_name = $found_user['first_name'];
        // $user_object->last_name = $found_user['last_name'];
        foreach($found_user as $the_attribute => $value) {
            if($user_object->has_the_attribute($the_attribute)) {
                $user_object->$the_attribute = $value;
            }
        }
        return $user_object;
    }

    private function has_the_attribute($the_attribute) {
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);
    }

}

?>