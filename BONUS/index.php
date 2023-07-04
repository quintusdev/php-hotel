<?php
    /* Importo e collego il file array.php */
    include __DIR__.'/partials/array.php';

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
                    <!-- Inserisco la tabella dove visualizzo i dati completi -->
                <table class="table table-hover mt-5 border border-light rounded-2">
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
                                    <?php echo $hotel['parking']; ?>
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