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
    <link rel="stylesheet" href="./styles/style.css">
</head>

<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src=https://upload.wikimedia.org/wikipedia/commons/thumb/b/be/Booking.com_logo.svg/2560px-Booking.com_logo.svg.png
                    alt="Logo" width="357" height="60" class="d-inline-block align-text-top"></a>
        </div>
    </nav>
    <main class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form method="GET" class="mb-3">
                        <div class="mb-3">
                            <label for="parking" class="form-label text-white">Cerca hotel con parcheggio:</label>
                            <select name="parking" id="parking" class="form-select">
                                <option value="0">Tutti</option>
                                <option value="1">Si</option>
                                <option value="2">No</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="vote" class="form-label text-white">Cerca hotel per voto:</label>
                            <select name="vote" id="vote" class="form-select">
                                <option value="0">Tutti</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary btn btn-outline-warning">Cerca</button>
                    </form>
                </div>
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr> <?php
                                    foreach (array_keys($hotels[0]) as $key) {
                                        $title = str_replace("_", " ", ucfirst($key));
                                        echo "<th scope='col'> {$title} </th>";
                                    }
                                    ?> </tr>
                        </thead>
                        <tbody>
                            <tr> <?php
                                    $selectedHotel = $hotels;
                                    if (isset($_GET['parking'])) {
                                        if ($_GET['parking'] === '1' || $_GET['parking'] === '2') {
                                            $parkingToCheck = ($_GET['parking'] === '1') ? true : false;
                                            $selectedHotel = array_filter($selectedHotel, fn ($hotel) => $hotel['parking'] === $parkingToCheck);
                                        }
                                    }

                                    if (
                                        isset($_GET['vote']) &&
                                        (intval($_GET['vote'] >= 1) && intval($_GET['vote'] <= 5))
                                    ) {
                                        $selectedHotel = array_filter($selectedHotel, fn ($hotel) => $hotel['vote'] >= intval($_GET['vote']));
                                    }


                                    foreach ($selectedHotel as $hotel) {
                                        echo "<td> {$hotel['name']} </td>";
                                        echo "<td> {$hotel['description']} </td>";
                                        echo "<td>" . ($hotel['parking'] ? "S??" : "No") . "</td>";
                                        echo "<td> {$hotel['vote']} </td>";
                                        echo "<td> {$hotel['distance_to_center']} </td></tr>";
                                    }

                                    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
<!-- Un array ordinario di array associativi 
foreach (lista as elemento){
    //Nel nostro caso elemento sar?? acnora un array quindi sar?? impossibile stamparlo con echo.

    In questo caso ho 2 soluzioni

    O ciclo su ogni key (che conosco gi??)
    oppure creo un forEach interno.
    foreach (elemnto as key -> value)
}
-->
<!-- POer ogni hoel se il voto che abbiamo preso -->