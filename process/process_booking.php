<?php
include('../class/Booking.php');
include('../class/BookingManager.php');
include('../config.php');

if(isset($_POST['validate']))
{
    if( (empty($_POST['name_customer'])) OR (empty($_POST['mail_customer'])) )
    {
        $error_msg = 'une des informations est manquante. <a href="booking_hotel/form_booking.php?error">retour</a>';
    }
    else
    {
        $data_booking = array('id'=> 6, 'name_customer'=>$_POST['name_customer'], 'mail_customer'=>$_POST['mail_customer'],
        'name_hotel'=>$_POST['hotel'], 'id_hotel_bedroom'=>$_POST['id_hotel_bedroom'],'arrived_customer'=>$_POST['arrived_customer'],
        'departure_customer'=>$_POST['departure_customer'], 'date_booking'=>$_POST['date_booking']);
        try
        {
            $booking = new Booking($data_booking);
        }
        catch (Exception $e)
        {
            echo $e->getMessage();
        }
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
            $bookingManager = new BookingManager($db);
            $bookingManager->addBooking($booking);
            echo '<p>Votre réservation à bien été effectué. Vous allez recevoir un mail récapitulatif dans votre boite mail.</p>';
            echo '<a href="../index.php">Retour à la page d\'accueil</a>';
        }
    }
}

?>
