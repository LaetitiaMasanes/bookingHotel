<style>
    .margin
    {
        margin-bottom: 10px;
    }
    h2
    {
        font-family: 'PT Sans', sans-serif;
        color: #0e2b56;
    }
</style>
<?php
    include('header.php');
    include('navigation.php');
    require('config.php');
    echo '<body>';
        echo '<div>';
            echo '<h2>Nos promotions</h2>';
            echo '<article class="margin">';
                echo '<h3><a href="#">Hotel de la Pinède - 50 %</a></h3>';
                echo ' <img src="img/hotel-pinede.jpg" alt="photo hotel de la pinède" height="270" width="480">';
            echo '</article>';
            echo '<article class="margin">';
                echo '<h3><a href="#">Hotel de la Continentale, vous offre les repas </a></h3>';
                echo ' <img src="img/hotel-continental.jpg" alt="photo hotel de la pinède" height="270" width="480">';
            echo '</article>';
            echo '<article class="margin">';
                echo '<h3><a href="#">Hotel le Terminus,vous offre un soin spa</a></h3>';
                echo ' <img src="img/hotel-terminus.jpg" alt="photo hotel de la pinède" height="270" width="480">';
            echo '</article>';
        echo '<div>';
    echo '<body>';
include('footer.php');
?>
