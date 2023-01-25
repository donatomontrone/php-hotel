<!-- Descrizione
Partendo da questo array di hotel: https://www.codepile.net/pile/OEWY7Q1G
Stampare tutti i nostri hotel con tutti i dati disponibili.
Consigli:
Iniziate in modo graduale. Prima stampate in pagina i dati, senza preoccuparvi dello stile.
Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
Bonus:
1 - Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
2 - Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
NOTA sui bonus: deve essere possibile utilizzare entrambi i filtri contemporaneamente (es. ottenere una lista con hotel che dispongono di parcheggio e che hanno un voto di tre stelle o superiore)
Se non viene specificato nessun filtro, visualizzare come in precedenza tutti gli hotel.
:baby-yoda-soup: :baby-yoda-soup: :baby-yoda-soup: :baby-yoda-soup: :baby-yoda-soup: Buon lavoro! --> <?php

                                                                                                        $hotels = [

                                                                                                            [
                                                                                                                'name' => 'Hotel Belvedere',
                                                                                                                'description' => 'Hotel Belvedere Descrizione',
                                                                                                                'parking' => true,
                                                                                                                'vote' => 4,
                                                                                                                'distance_to_center' => 10.4
                                                                                                            ],
                                                                                                            [
                                                                                                                'name' => 'Hotel Futuro',
                                                                                                                'description' => 'Hotel Futuro Descrizione',
                                                                                                                'parking' => true,
                                                                                                                'vote' => 2,
                                                                                                                'distance_to_center' => 2
                                                                                                            ],
                                                                                                            [
                                                                                                                'name' => 'Hotel Rivamare',
                                                                                                                'description' => 'Hotel Rivamare Descrizione',
                                                                                                                'parking' => false,
                                                                                                                'vote' => 1,
                                                                                                                'distance_to_center' => 1
                                                                                                            ],
                                                                                                            [
                                                                                                                'name' => 'Hotel Bellavista',
                                                                                                                'description' => 'Hotel Bellavista Descrizione',
                                                                                                                'parking' => false,
                                                                                                                'vote' => 5,
                                                                                                                'distance_to_center' => 5.5
                                                                                                            ],
                                                                                                            [
                                                                                                                'name' => 'Hotel Milano',
                                                                                                                'description' => 'Hotel Milano Descrizione',
                                                                                                                'parking' => true,
                                                                                                                'vote' => 2,
                                                                                                                'distance_to_center' => 50
                                                                                                            ],

                                                                                                        ];

                                                                                                        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <!-- Bootstrap v5.3-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
    <p> <?php
        foreach ($hotels as $hotel) {
            echo "{$hotel['name']} <br>";
            echo "{$hotel['description']} <br>";
            echo "{$hotel['parking']} <br>";
            echo "{$hotel['vote']} <br>";
            echo "{$hotel['distance_to_center']}<br>";
        }

        ?> </p>
</body>

</html>