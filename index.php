<?php
    include("php/dbc.php");

    // generate make list
    $makes = $dbc->query("SELECT DISTINCT make FROM cars");
    $makesList = "";
    foreach( $makes as $make ) {
        $makeName = $make["make"];
        $makesList .= "<li data-make='$makeName'>$makeName</li>";
    }
    
    // generate models list
    $rows = $dbc->query("SELECT * FROM cars");
    $modelsList = "";
    foreach( $rows as $row ) {
        $make = $row["make"];
        $model = $row["model"];
        $about = $row["about"];
        $image = $row["image"];
        $modelsList .= "<li data-make='$make' data-text='$about' data-image='$image'>$model</li>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Techolution Assignment - Jarolin Vargas</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta name="author" content="Jarolin Vargas" />
        <link rel="stylesheet" type="text/css" href="css/main.css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    </head>
    <body class="content-hidden">
        <main class="container">
            <div class="general-aligner">
                <div class="aligner-columns-2 aligner-bottom-devider">
                    <div class="aligner-col col-1">
                        <!-- custom dropdown menu -->
                        <div id="makes" class="custom-dropdown-menu">
                            <span class="cdm-active-label"><span id="make-label-text">Select Car Make</span><i class="fa fa-chevron-down"></i></span>
                            <ul>
                                <?= $makesList ?>
                            </ul>
                        </div>
                    </div>
                    <div class="aligner-col col-2">
                        <!-- custom dropdown menu -->
                        <div id="models" class="custom-dropdown-menu disabled">
                            <span class="cdm-active-label"><span id="model-label-text">Select Car Model</span><i class="fa fa-chevron-down"></i></span>
                            <ul>
                                <?= $modelsList ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- content -->
            <div class="general-aligner">
                <!-- initial -->
                <div class="intro">
                    <h2>Select your make and model to see details</h2>
                </div>
                <div class="content-container">
                    <!-- text-image-element -->
                    <div class="text-image-element">
                        <img id="model-image" src="#" alt="Car" />
                        <p id="model-text"></p>
                    </div>
                </div>
            </div>
        </main>
        <script type="text/javascript" src="js/main.js"></script>
    </body>
</html>