<?php
ini_set("display_errors",0);error_reporting(0);

require('process/process_booking.php');
require('class/HotelBedroom.php');
require('class/HotelBedroomManager.php');
include('header.php');
require('config.php');

$db = new PDO('mysql:host=localhost;dbname=booking_hotel', 'root', '');
if(!isset($db))
{
    try {
        throw new Exception('Erreur de connexion à la B.D.D. !');
        }
    catch(Exception $e)
        {
        echo $e->getMessage();
        }
}
else
{
    $managerHotelBedroom = new HotelBedroomManager($db);
    $idHotelBedroom = $managerHotelBedroom->getHotelBedroom();
    $date_booking = date('Y-m-d');

    echo '<h1>Formulaire de réservation</h1>';
    echo '<form method="post" action="process/process_booking.php">';
        echo '<fieldset>';
            echo '<legend>Récapitulatif</legend>';
            echo '<p>Nom de l\'hotel <input type="text" name="hotel" value="'.$_POST['hotel'].'"disabled="disabled" /></p>';
            echo '<input type="hidden" name="hotel" value="'.$_POST['hotel'].'">';
            echo '<p>Votre date d\'arrivée <input type="text" name="arrived_customer" value="'.$_POST['arrived_customer'].'"disabled="disabled" /></p>';
            echo '<input type="hidden" name="arrived_customer" value="'.$_POST['arrived_customer'].'">';
            echo '<p>Votre date de départ <input type="text" name="departure_customer" value="'.$_POST['departure_customer'].'"disabled="disabled" /></p>';
            echo '<input type="hidden" name="departure_customer" value="'.$_POST['departure_customer'].'">';
            echo '<p><a href="listing-hotel.php">Retour pour modifier vos informations</a></p>';
            echo '<input type="hidden" name="date_booking" value="'.$date_booking.'">';
        echo '</fieldset>';
        echo '<fieldset>';
            echo '<legend>Vos coordonnées</legend>';
            echo '<p>Votre nom : <input type="text" name="name_customer"/></p>';
            echo '<p>Votre e-mail : <input type="email" name="mail_customer"/></p>';
            echo '<input type="hidden" name="id_hotel_bedroom" value="'.$idHotelBedroom.'">';
            echo '<input type="submit" value="validez la réservation" name="validate"/>';
        echo '</fieldset>';
    echo '</form>';
}
include('footer.php');
?>
