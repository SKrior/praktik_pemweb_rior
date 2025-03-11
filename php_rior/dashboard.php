<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}
include 'html/header.html';
?>
<h2 class="text-lg font-semibold">Selamat Datang, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
<p><a href="logout.php" class="text-red-500">Logout</a></p>
<?php include 'html/footer.html'; ?>
