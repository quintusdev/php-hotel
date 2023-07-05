<?php
    /* Importo e collego il file array.php */
    include __DIR__.'/partials/array.php';

    /* Filtro gli hotel in base alla selezione del parcheggio oppure no */
    if(isset($_GET['park'])) {
        /* Creo un array vuoto per contenere gli hotel con parcheggio */
        $parkHotel = [];
        foreach($hotels as $hotelp){
            if($hotelp['parking'] == filter_var($_GET['park'], FILTER_VALIDATE_BOOLEAN)){
                $parkHotel [] = $hotelp;
            }else if ($_GET['park'] == 'all'){
                $parkHotel = $hotels;
            }
        }
        $hotels = $parkHotel;
    }

    /* Filtro gli hotel in base alla selezione del parcheggio oppure no */
    if(isset($_GET['rate'])) {
        /* Creo un array vuoto per contenere gli hotel con parcheggio */
        $rateHotel = [];
        foreach($hotels as $hotelRate){
            if($hotelRate['vote'] == $_GET['rate']){
                $rateHotel [] = $hotelRate;
            }else if ($_GET['rate'] == 'all'){
                $rateHotel = $hotels;
            }
        } 
                $hotels = $rateHotel;
    }
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- link Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <!-- link CSS -->

        <link rel="stylesheet" href="./css/style.css">
        <!-- titolo scheda browser -->
        <title>Hotel PHP</title>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="index.php" method="GET">
                        <select class="form-select w-25 mt-3" name="park" id="park" aria-label="Hotel con Parcheggio">
                            <option value="all" selected>Hotel con parcheggio?</option>
                            <option value="1">Si</option>
                            <option value="2">No</option>
                        </select>
                        <select class="form-select w-25 mt-3" name="rate" id="rate" aria-label="Voto Hotel">
                            <option value="all" selected>Valutazione</option>
                            <option value="1">1 Stella</option>
                            <option value="2">2 Stelle</option>
                            <option value="3">3 Stelle</option>
                            <option value="4">4 Stelle</option>
                            <option value="5">5 Stelle</option>
                        </select>
                        <button type="submit" class="btn btn-success mt-2">Filtra</button>
                    </form>
                </div>
                <div class="col-12">
                <!-- Inserisco la tabella dove visualizzo i dati completi -->
                <table class="table table-hover mt-3 border border-light rounded-2">
                    <thead class="text-center">
                        <tr class="table-dark">
                            <th scope="col">NAME</th>
                            <th scope="col">DESCRIPTION</th>
                            <th scope="col">PARKING</th>
                            <th scope="col">VOTE</th>
                            <th scope="col">DISTANCE TO CENTER</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($hotels as $hotel) { ?>
                            <tr class="text-center table-warning">
                                <th scope="row">
                                    <?php echo $hotel['name']; ?>
                                </th>
                                <td> 
                                    <?php echo $hotel['description']; ?>
                                </td>
                                <td>
                                    <?php echo $hotel['parking'] ? 'Sì' : 'No'; ?>
                                </td>
                                <td>
                                    <?php echo $hotel['vote']; ?>
                                </td>
                                <td>
                                    <!-- Aggiunta dicitura KM dopo la distanza -->
                                    <?php echo $hotel['distance_to_center']." km";?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </body>
</html>