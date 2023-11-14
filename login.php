<!DOCTYPE html>
<html>
<head>
    <title>Logowanie - Remonty TB-TeamBudowlanka</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
include 'header.php';
?>

<section>
    <div class="container">
        <h2>Logowanie</h2>
        <form method="post" action="login_process.php">
            <label for="username">Nazwa użytkownika:</label>
            <input type="text" id="username" name="username" required><br>
            <label for="password">Hasło:</label>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" name="login" value="Zaloguj">
        </form>
    </div>
</section>

<?php
include 'footer.php';
?>
</body>
</html>
