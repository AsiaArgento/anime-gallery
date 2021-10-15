<?php require_once("includes/header-admin.php"); ?>

<?php 
// if($session->is_signed_in()) {
//     redirect("index.php");
// }

// checking for submissions
if(isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Method to check database user
    $user_found = User::verify_user($username, $password);

    if($user_found) {
        $session->login($user_found);
        redirect("index.php");
    } else {
        $message = "Your password or username are incorrect";
    }

} else {
    $message = "";
    $username = "";
    $password = "";
}
?>

<div class="login">
	<h1>Login</h1>
    <h4><?php echo $message; ?></h4>
    <form action="" method="post">
    	<input type="text" name="username" value="<?php echo htmlentities($username); ?>" placeholder="Username" required="required" />
        <input type="password" name="password" value="<?php echo htmlentities($password); ?>" placeholder="Password" required="required" />
        <button type="submit" name="submit" value="Submit">Let me in.</button>
    </form>
</div>