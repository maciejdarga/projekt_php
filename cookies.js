// Pobranie referencji do elementów banera i przycisku zamykającego
let cookiesBanner = document.getElementById('cookies-banner');
let cookiesAcceptBtn = document.getElementById('cookies-accept-btn');

// Funkcja ukrywająca baner po kliknięciu przycisku "Zamknij"
function closeCookiesBanner() {
    cookiesBanner.style.display = 'none';
}

// Dodanie obsługi zdarzenia kliknięcia przycisku "Zamknij"
cookiesAcceptBtn.addEventListener('click', closeCookiesBanner);

// Funkcja inicjalizująca baner (wyświetlanie lub ukrywanie)
function initializeCookiesBanner() {
    let cookiesAccepted = getCookie('cookies_accepted');

    if (!cookiesAccepted) {
        cookiesBanner.style.display = 'block';
    }
}

// Funkcja pobierająca wartość ciasteczka o podanej nazwie
function getCookie(cookieName) {
    let name = cookieName + '=';
    let decodedCookie = decodeURIComponent(document.cookie);
    let cookieArray = decodedCookie.split(';');

    for (let i = 0; i < cookieArray.length; i++) {
        let cookie = cookieArray[i];

        while (cookie.charAt(0) === ' ') {
            cookie = cookie.substring(1);
        }

        if (cookie.indexOf(name) === 0) {
            return cookie.substring(name.length, cookie.length);
        }
    }

    return '';
}

// Wywołanie funkcji inicjalizującej baner
initializeCookiesBanner();


