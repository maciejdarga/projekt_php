<!DOCTYPE html>
<html>
<head>
    <title>Remonty TB-TeamBudowlanka</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .card {
            height: 100%;
        }

        .card-body {
            height: 100%;
        }

        .card-text {
            overflow: auto;
        }

        body {
            margin-bottom: 200px;
        }

        .footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #f8f9fa;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>
<?php include 'header.php'; ?>

<section>
    <div class="container">
        <h2 class="text-center mb-4">Nasza wyspecjalizowana kadra:</h2>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <img src="elektryk_jacek.jpg" class="card-img-top" alt="Zdjęcie 1">
                    <div class="card-body">
                        <h5 class="card-title">Elektryk Jacek lat 33</h5>
                        <p class="card-text">Urodzony 10 września 1990 roku w Chojnicach elektryk z powołania. Posiada komplet uprawnien elektryka. Ukończył technikum w specjalizacji elektryk.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <img src="hydraulik_krzysiu.jpg" class="card-img-top" alt="Zdjęcie 2">
                    <div class="card-body">
                        <h5 class="card-title">Hydraulik Krzysztof lat 43</h5>
                        <p class="card-text">Urodzony 6 czerwca 1980 roku hudraulik z powołania. Juz w trakcie wczesnych lat 90 uciekał z lekcji, aby pomóc ojcu w pracy, który to nauczył go zawodu.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <img src="malarz_marcin.jpeg" class="card-img-top" alt="Zdjęcie 3">
                    <div class="card-body">
                        <h5 class="card-title">Malarz Marcin lat 23</h5>
                        <p class="card-text">Urodzony 24 marca 2000 roku w Świdnicy Marcin jest profesjonalistą w swojej dziedzinie.Ukończyl technikum w kierunku ogólnobudowlanym.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <img src="kafelkarz_robert.jpg" class="card-img-top" alt="Zdjęcie 4">
                    <div class="card-body">
                        <h5 class="card-title">Glazurnik Robert lat 37</h5>
                        <p class="card-text">Urodzony 5 sierpnia 1986 roku w Gdyni Robert jest fachowcem w swojej branży.Jest już od 19 lat w branży i ma za sobą tysiące wykonanych zleceń.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="footer">
    <?php include 'footer.php'; ?>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
