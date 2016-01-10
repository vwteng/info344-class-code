<h1>Current Weather in <?= htmlentities($q) ?></h1>
<p>
    <img src="http://openweathermap.org/img/w/<?= urlencode($weatherData->weather[0]->icon) ?>.png" alt="weather icon"> 
    <?= htmlentities(round($weatherData->main->temp)) ?>&deg;F,
    <?= htmlentities($weatherData->weather[0]->description) ?> 
</p>
