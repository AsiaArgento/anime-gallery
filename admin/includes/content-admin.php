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

            $sql = "SELECT * FROM users WHERE id=1";
            $result = $database->query($sql);
            $user_found = mysqli_fetch_array($result);
            
            echo $user_found['username'];
            
            ?>
        </div>
    </section>
</div>