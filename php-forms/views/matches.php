<?php
if (count($matches) != 0) {
?>
<h1>Possible Matches</h1>
<ul>
<?php 
    foreach($matches as $match):
    ?>
    <li>
        <?= htmlentities($match['primary_city']) ?>,
        <?= htmlentities($match['state']) ?>
        <?= htmlentities($match['zip']) ?>
        <?= htmlentities($match['country']) ?>
    </li>
</ul>
    <?php
    endforeach; 
} else {
?>
<p>No matches. Check your zip code.</p>
<?php
}
?>