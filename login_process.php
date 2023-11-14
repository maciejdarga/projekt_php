<?php
session_start();



if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "wpr";

    // Utworzenie połączenia z bazą danych
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    // Sprawdzenie połączenia z bazą danych
    if ($conn->connect_error) {
        die("Błąd połączenia z bazą danych: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['logged_in'] = true;
            header("Location: index.php");
        } else {
            echo "<p>Błędne hasło.</p>";
        }
    } else {
        echo "<p>Nie znaleziono użytkownika o podanym loginie.</p>";
    }

    $conn->close();
}
?>
