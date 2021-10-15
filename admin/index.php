<!-- Header -->
<?php include("includes/header-admin.php"); ?>

<?php 
if(!$session->is_signed_in()) {
    redirect("login.php");
    // header("Location: login.php");
}
?>

<!-- Navigation -->
<?php include("includes/navigation-admin.php"); ?>

<!-- Main Content -->
<?php include("includes/content-admin.php"); ?>

<!-- Footer -->
<?php include("includes/footer-admin.php"); ?>