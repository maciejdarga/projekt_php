<footer>
    <p>&copy; <?php echo date("Y"); ?> Budowlanka.pl. Wszelkie prawa zastrzeżone.</p>

    <?php
    session_start();

    if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
        echo "<p>Zalogowany jako: " . $_SESSION['username'] . "</p>";
        echo '<a href="logout.php">Wyloguj</a>';
    } else {
        echo '<a href="login.php">Zaloguj</a>';
    }
    ?>
</footer>
