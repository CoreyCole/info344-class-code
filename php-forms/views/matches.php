<<<<<<< HEAD
<?php
if (count($matches) != 0) {
?>
<h1>Possible Matches</h1>
<ul>
<?php 
    foreach($matches as $match):
    ?>
=======
<h1>Possible Matches</h1>
<ul>
    <?php foreach($matches as $match): ?>
>>>>>>> 30714306d6f904ab140d2204ca886eed7ea0a5ed
    <li>
        <?= htmlentities($match['primary_city']) ?>,
        <?= htmlentities($match['state']) ?>
        <?= htmlentities($match['zip']) ?>
        <?= htmlentities($match['country']) ?>
    </li>
<<<<<<< HEAD
</ul>
    <?php
    endforeach; 
} else {
?>
<p>No matches. Check your zip code.</p>
<?php
}
?>
=======
    <?php endforeach; ?>
</ul>
>>>>>>> 30714306d6f904ab140d2204ca886eed7ea0a5ed
