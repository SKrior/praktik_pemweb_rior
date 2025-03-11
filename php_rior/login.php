<?php
session_start();
include 'html/header.html';
include 'config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
    } else {
        echo "<p class='text-red-500'>Login gagal. Cek kembali username/NPM Anda.</p>";
    }
}
?>
<h2 class="text-lg font-semibold">Login</h2>
<form method="POST" class="space-y-4">
    <input type="text" name="username" placeholder="Nama Lengkap" required class="w-full p-2 border rounded">
    <input type="password" name="password" placeholder="NPM" required class="w-full p-2 border rounded">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Login</button>
</form>
<?php include 'html/footer.html'; ?>
