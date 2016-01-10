<?php
//weather icon URLs
// http://openweathermap.org/img/w/{iconName}.png

//appID (this is their demo app ID from their web site)
$appId = '2de143494c0b295cca9337e1e96b00e0';

$zip = '98195';
if (isset($_GET['zip'])) {
    $zip = $_GET['zip'];
}

$weatherUrl = "http://api.openweathermap.org/data/2.5/weather?zip={$zip},us&units=imperial&appid=$appId";
$weatherData = json_decode(file_get_contents($weatherUrl));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta charset="UTF-8">
    <title>Weather in <?= $zip ?></title>
    
    <!-- bootstrap css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

</head>
<body class="container">
    <?php if(property_exists($weatherData, 'main')): ?>

    <h1>Current Weather in <?= htmlentities($zip) ?></h1>
    <p>
        <img src="http://openweathermap.org/img/w/<?= urlencode($weatherData->weather[0]->icon) ?>.png" alt="weather icon"> 
        <?= htmlentities(round($weatherData->main->temp)) ?>&#8457;
        , <?= htmlentities($weatherData->weather[0]->description) ?> 
    </p>

    <?php else: ?>

    <h1>Error</h1>
    <p class="alert alert-danger">Sorry, that is not a valid zip code.</p>

    <?php endif; ?>
    
    <form action="" method="GET">
        <div class="form-group">
            <label for="zipInput">Zip Code</label>
            <input type="text" 
                id="zipInput" 
                name="zip"
                class="form-control" 
                value="<?= htmlentities($zip) ?>"
                placeholder="enter a zip code"
                required
                >
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Get Weather</button>
        </div>
    </form>
    
</body>
</html>