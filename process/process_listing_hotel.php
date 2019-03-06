<?php
require('../class/HotelManager.php');

if(isset($_POST['validate']))
{
    if( (empty($_POST['arrived_customer'])) OR (empty($_POST['departure_customer'])) )
    {
        $error_msg = 'une des informations est manquante. <a href="booking_hotel/listing-hotel.php">retour</a>';
    }
    else
    {
        $arrived_customer = $_POST['arrived_customer'];
        $departure_customer = $_POST['departure_customer'];
        header('Location: http://localhost/booking_hotel/listing-hotel.php?arrived_customer=' .$arrived_customer. '&departure_customer=' .$departure_customer);
    }
}

?>
