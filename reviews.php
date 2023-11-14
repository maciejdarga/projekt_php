<!DOCTYPE html>
<html>
<head>
    <title>Remonty TB-TeamBudowlanka</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="cookies.js"></script>
    <style>
    </style>
    <script>
        function toggleLoginBar() {
            let loginBar = document.getElementById("login-bar");
            loginBar.classList.toggle("open");
        }
    </script>
</head>
<body>
<?php
include 'header.php';

// Sprawdzenie, czy istnieje parametr URL "message" i wyświetlenie komunikatu
if (isset($_GET['message'])) {
    $message = $_GET['message'];
    echo '<div class="message">' . $message . '</div>';
}
?>

<section>
    <div class="container">
        <h2>Aby móc wystawić komentarz, musisz być zalogowany.</h2>
        <?php
        // Sprawdź, czy użytkownik jest zalogowany
        session_start();
        if (isset($_SESSION['user_id'])) {
            ?>
            <form action="process_comment.php" method="POST">
                <textarea name="comment" placeholder="Wprowadź swój komentarz" required></textarea>
                <input type="submit" value="Wyślij">
            </form>
            <?php
        } else {
            echo "<p>Prosimy się zalogować, aby móc dodać komentarz.</p>";
        }
        ?>

        <?php
        // Wyświetl istniejące komentarze
        // Pobierz dane z bazy danych
        $host = 'localhost';
        $username = 'root';
        $password = '';
        $dbname = 'wpr';

        $conn = new mysqli($host, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT opinions.id, opinions.comment, users.username, opinions.date_posted, opinions.user_id FROM opinions INNER JOIN users ON opinions.user_id = users.id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h3>Opinie naszych klientów:</h3>";
            while ($row = $result->fetch_assoc()) {
                echo "<p><strong>Autor:</strong> " . $row['username'] . "</p>";
                echo "<p><strong>Data:</strong> " . $row['date_posted'] . "</p>";
                echo "<p>" . $row['comment'] . "</p>";

                // Dodaj przycisk do usuwania komentarza tylko dla zalogowanych użytkowników, których komentarz
                if (isset($_SESSION['user_id']) && $_SESSION['user_id'] == $row['user_id']) {
                    echo '<form action="delete_comment.php" method="POST">';
                    echo '<input type="hidden" name="comment_id" value="' . $row['id'] . '">';
                    echo '<input type="submit" value="Usuń komentarz">';
                    echo '</form>';
                }

                echo "<hr>";
            }
        } else {
            echo "<p>Brak komentarzy.</p>";
        }

        $conn->close();
        ?>
    </div>
</section>


<?php
include 'footer.php';
?>
</body>
</html>


