<?php 
include 'html/header.html'; 
include 'config/database.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if (mysqli_query($conn, $query)) {
        echo "<p class='text-green-500'>Registrasi berhasil. <a href='login.php' class='text-blue-500'>Login di sini</a></p>";
    } else {
        echo "<p class='text-red-500'>Registrasi gagal: " . mysqli_error($conn) . "</p>";
    }
}
?>
<h2 class="text-lg font-semibold">Register</h2>
<form method="POST" class="space-y-4">
    <input type="text" name="username" placeholder="Nama Lengkap" required class="w-full p-2 border rounded">
    <input type="password" name="password" placeholder="NPM" required class="w-full p-2 border rounded">
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Register</button>
</form>
<?php include 'html/footer.html'; ?>
