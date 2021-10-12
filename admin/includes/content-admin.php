<!-- Main Content -->
<div class="content-wrap">
    <section class="content">
        <div class="content__box left">
            <li><a href="index.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="users.php"><i class="fas fa-users"></i> Users</a></li>
            <li><a href="upload.php"><i class="fas fa-upload"></i> Upload</a></li>
            <li><a href="photos.php"><i class="fas fa-upload"></i> Photos</a></li>
            <li><a href="comments.php"><i class="fas fa-comments"></i> Comments</a></li>
        </div>
        <div class="content__box right">
            <h1>Welcome to the Admin!</h1>
            <h2>Home</h2>
            <?php 

            // Returns all users by username
            // $result_set = User::find_all_users();

            // while($row = mysqli_fetch_array($result_set)) {
            //     echo $row['username'] . "<br>";
            // }

            // Returns 1 user by id
            // $found_user = User::find_user_by_id(3);
            // $user = User::instantiation($found_user);

            // echo $user->first_name;
            // echo "<br>";

            // OOP Version
            // $users = User::find_all_users();
            // foreach($users as $user) {
            //     echo $user->id . "<br>";
            // }

            // Itinerary Syntax Version
            $found_user = User::find_user_by_id(2);
            echo $found_user->username;

            // $pictures = new Picture();
            
            ?>
        </div>
    </section>
</div>