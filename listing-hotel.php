<style>
    .float
    {
        float: left;
    }
    .margin
    {
        margin-top: 25px;
        margin-bottom: 57px;
        margin-left: 3px;
    }
    .display
    {
        display: inline;
    }
    .clear
    {
        clear: both;
    }
</style>

<?php
    require('class/Hotel.php');
    require('class/HotelManager.php');
    include('header.php');
    include('navigation.php');
    require('config.php');

    echo'<h2>Entrez votre date d\'arrivées et de départ</h2>';
    echo'<form method="post" action="process/process_listing_hotel.php">';
        echo'<p>Votre date d\'arrivée <input type="date" name="arrived_customer"></p>';
        echo'<p>Votre date de départ <input type="date" name="departure_customer"></p>';
        echo'<input type="submit" value="Rechercher un hotel" name="validate"></p>';
    echo '</form>';


    if((isset($_GET['departure_customer'])) AND (isset($_GET['arrived_customer'])) )
    {
        $db = new PDO('mysql:host=localhost;dbname=booking_hotel', 'root', '');
        if(!isset($db))
        {
            try
            {
                throw new Exception('Erreur de connexion à la B.D.D. !');
            }
            catch(Exception $e)
            {
                echo $e->getMessage();
            }
        }
    else
    {
        $managerHotel = new HotelManager($db);
        $hotel_filter = $managerHotel->getHotelFilter();

        echo '<div class="float">';
            foreach($hotel_filter['name'] as $hotel_name)
            {
                echo '<h2>'.$hotel_name .'</h2>
                <form method="post" action="form_booking.php">
                    <input type="hidden" name="hotel" value="'.$hotel_name.'">
                    <input type="hidden" name="arrived_customer" value="'.$_GET['arrived_customer'].'">
                    <input type="hidden" name="departure_customer" value="'.$_GET['departure_customer'].'">
                    <input class="display" type="submit" value="Réservez">
                </form> <br><hr>';
            }
        echo '</div>';
        echo '<div class="float" >';
            foreach($hotel_filter['address'] as $hotel_address)
            {
                echo '<div class="margin">' .$hotel_address .'</div> <br><hr>';
            }
        echo'</div>';
        echo'<div class="clear"></clear>';
    }
}
include('footer.php');
?>
