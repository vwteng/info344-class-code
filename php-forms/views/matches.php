<h1>Possible Matches</h1>
<ul>
    <?php foreach($matches as $match): ?>
    <li>
        <a href="/?q=<?= urlencode($match['zip']) ?>">
            <?= htmlentities($match['primary_city']) ?>,
            <?= htmlentities($match['state']) ?>
            <?= htmlentities($match['zip']) ?>
            (<?= htmlentities($match['country']) ?>)
        </a>
    </li>
    <?php endforeach ?>
</ul>
