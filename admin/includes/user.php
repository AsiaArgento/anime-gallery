<?php 

class User {

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    
    public static function find_all_users() {
        return self::find_this_query("SELECT * FROM users");
    }

    public static function find_user_by_id($user_id) {
        global $database;
        $result_set_q = self::find_this_query("SELECT * FROM users WHERE id= $user_id LIMIT 1");
        // if not empty, else return false, itinerary syntax
        return !empty($result_set_q) ? array_shift($result_set_q) : false;
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

    public static function verify_user($username, $password) {
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM users WHERE ";
        $sql .= "username = '{$username}' ";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";

        $result_array = self::find_this_query($sql);
        // if not empty, else return false, itinerary syntax
        return !empty($result_array) ? array_shift($result_array) : false;
    }

    public static function instantiation($found_user) {
        $user_object = new self;
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

$user = new User();

?>