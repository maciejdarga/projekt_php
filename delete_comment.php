<?php
session_start();

if (isset($_SESSION['user_id']) && isset($_POST['comment_id'])) {
    $user_id = $_SESSION['user_id'];
    $comment_id = $_POST['comment_id'];

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'wpr';

    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sprawdź, czy komentarz należy do zalogowanego użytkownika
    $check_sql = "SELECT id FROM opinions WHERE id = $comment_id AND user_id = $user_id";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        // Jeśli tak, usuń komentarz
        $delete_sql = "DELETE FROM opinions WHERE id = $comment_id";
        if ($conn->query($delete_sql) === TRUE) {
            echo "Komentarz został usunięty.";
        } else {
            echo "Błąd podczas usuwania komentarza: " . $conn->error;
        }
    } else {
        echo "Błąd: Nie masz uprawnień do usunięcia tego komentarza.";
    }

    $conn->close();
} else {
    echo "Błąd: Niezalogowany użytkownik lub brak identyfikatora komentarza.";
}
?>
