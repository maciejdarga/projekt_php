<!DOCTYPE html>
<html>
<head>
    <title>Remonty TB-TeamBudowlanka</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="cookies.js"></script>
    <style>
        .login-bar {
            position: fixed;
            top: 0;
            right: 0;
            background-color: #f2f2f2;
            padding: 10px;
            width: 200px;
            transition: transform 0.3s ease-in-out;
            transform: translateY(-100%);
        }

        .login-bar.open {
            transform: translateY(0);
        }
    </style>
    <script>
        function toggleLoginBar() {
            var loginBar = document.getElementById("login-bar");
            loginBar.classList.toggle("open");
        }
    </script>
</head>
<body>
<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wpr";

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}

// Definicja podstron
$pages = [
    'Strona główna' => 'index.php',
    'O nas' => 'about.php',
    'Cennik' => 'pricing.php',
    'Galeria' => 'gallery.php',
    'Opinie' => 'reviews.php'
];


function renderPage($pageName, $pages)
{
    // Ustawianie plików cookies
    setCookies();

    echo '<header>';
    echo '<h1>Remonty TB-TeamBudowlanka</h1>';
    echo '</header>';

    // Sprawdzenie, czy baner powinien być wyświetlany
    $showBanner = !isset($_COOKIE['cookies_accepted']);

    if ($showBanner) {
        echo '<div id="cookies-banner" class="container">';
        echo 'Ta strona wykorzystuje pliki cookies. Kliknij tutaj, aby dowiedzieć się więcej.';
        echo '<button id="cookies-accept-btn">Zamknij</button>';
        echo '</div>';
    }

    echo '<nav>';
    echo '<div class="container">';

    foreach ($pages as $title => $url) {
        if ($url === $pageName) {
            echo '<a href="' . $url . '" class="active">' . $title . '</a>';
        } else {
            echo '<a href="' . $url . '">' . $title . '</a>';
        }
    }

    echo '</div>';
    echo '</nav>';

    echo '<section>';
    echo '<div class="container">';

    if ($pageName === 'index.php') {
        echo '<div class="row">';
        echo '<div class="col-md-6">';
        echo '<img src="ekipa.jpg" width="100%" height="100%" >';
        echo '</div>';
        echo '<div class="col-md-6">';
        echo '<h2>O nas</h2>';
        echo '<p>Firma TB-TeamBudowlanka działa na rynku od 8 lat. Posiadamy szerokie doświadczenie w branży remontowej i budowlanej. Nasza firma zrealizowała setki, jeśli nie tysiące zadowolonych projektów dla naszych klientów.</p>';
        echo '<br><br><br>';
        echo '<h2>Kontakt</h2>';
        echo '<p> Telefon: 123-456-789</p>';
        echo '<p>Email: kontakt@tbteambudowlanka.pl</p>';
        echo '</div>';
        echo '</div>';
    } else {
        echo '<h2>' . getPageTitle($pageName) . '</h2>';
        echo getPageContent($pageName);
    }

    echo '</div>';
    echo '</section>';

    echo '<footer>';
    echo '<p>&copy; ' . date("Y") . ' Budowlanka.pl. Wszelkie prawa zastrzeżone.</p>';
    echo '</footer>';

    echo '<div id="login-bar" class="login-bar">';
    echo '<h2>Rejestracja</h2>';
    echo '<form method="post" action="' . $_SERVER['PHP_SELF'] . '">';
    echo 'Nazwa użytkownika: <input type="text" name="username" required><br>';
    echo 'Hasło: <input type="password" name="password" required><br>';
    echo 'Email: <input type="email" name="email" required><br>';
    echo '<input type="submit" name="register" value="Zarejestruj">';
    echo '</form>';

    echo '<h2>Logowanie</h2>';
    echo '<form method="post" action="' . $_SERVER['PHP_SELF'] . '">';
    echo 'Nazwa użytkownika: <input type="text" name="username" required><br>';
    echo 'Hasło: <input type="password" name="password" required><br>';
    echo '<input type="submit" name="login" value="Zaloguj">';
    echo '</form>';
    echo '</div>';

    echo '<button onclick="toggleLoginBar()">Pokaż/ukryj logowanie</button>';
}

// Pobieranie tytułu strony
function getPageTitle($pageName)
{
    switch ($pageName) {
        case 'index.php':
            return 'Strona główna';
        case 'about.php':
            return 'O nas';
        case 'pricing.php':
            return 'Cennik';
        case 'gallery.php':
            return 'Galeria';
        case 'reviews.php':
            return 'Opinie';
        default:
            return 'Nieznana strona';
    }
}

// Pobieranie zawartości strony
function getPageContent($pageName)
{
    switch ($pageName) {
        case 'index.php':
            return '';
        case 'about.php':
            return '<p>Tu znajduje się treść strony "O nas".</p>';
        case 'pricing.php':
            return '<p>Tu znajduje się treść strony "Cennik".</p>';
        case 'gallery.php':
            return '<p>Tu znajduje się treść strony "Galeria".</p>';
        case 'reviews.php':
            return '<p>Tu znajduje się treść strony "Opinie".</p>';
        default:
            return '<p>Strona nie została znaleziona.</p>';
    }
}

// Funkcja ustawiająca plik cookie
function setCookies()
{
    $cookieName = 'example_cookie';
    $cookieValue = 'example_value';
    $expiry = time() + (60 * 60 * 24 * 365);
    $path = '/';

    setcookie($cookieName, $cookieValue, $expiry, $path);
}

// Rejestracja użytkownika
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $registrationDate = date('Y-m-d H:i:s');

    $sql = "INSERT INTO users (username, password, email, registration_date) VALUES ('$username', '$hashedPassword', '$email', '$registrationDate')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Rejestracja zakończona sukcesem.</p>";
    } else {
        echo "Błąd rejestracji: " . $conn->error;
    }
}

// Logowanie użytkownika
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['logged_in'] = true;
            echo "<p>Logowanie zakończone sukcesem.</p>";
        } else {
            echo "<p>Błędne hasło.</p>";
        }
    } else {
        echo "<p>Nie znaleziono użytkownika o podanym loginie.</p>";
    }
}

// Wylogowanie użytkownika
if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    echo "<p>Wylogowano.</p>";
}

// Sprawdzenie, czy użytkownik jest zalogowany
$loggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;

if ($loggedIn) {
    echo "<p>Zalogowany jako: " . $_SESSION['username'] . "</p>";
    echo '<a href="?logout">Wyloguj</a>';
} else {
    echo '<script src="login-bar.js"></script>';
}

// Pobranie aktualnej strony
$currentPage = basename($_SERVER['PHP_SELF']);

// Renderowanie aktualnej strony
renderPage($currentPage, $pages);

// Zamknięcie połączenia z bazą danych
$conn->close();
?>
</body>
</html>


