<?php
class BookingManager
{
    private $_db;
    public function __construct($db)
    {
        $this->setDb($db);
    }
    public function setDb(PDO $dbh)
    {
        $this->_db = $dbh;
    }
    public function addBooking (Booking $booking)
    {
        $sql = 'INSERT INTO booking (id, name_customer, mail_customer, hotel_name, id_hotel_bedroom, arrived_customer, departure_customer, date_booking)
        VALUES (:id, :name_customer, :mail_customer, :name_hotel, :hotel_bedroom, :arrived_customer, :departure_customer, :date_booking)';
        $stmnt=$this->_db->prepare($sql);
        $stmnt->bindValue(':id', $booking->getId());
        $stmnt->bindValue(':name_customer', htmlspecialchars($booking->getNameCustomer()));
        $stmnt->bindValue(':mail_customer', htmlspecialchars($booking->getMailCustomer()));
        $stmnt->bindValue(':name_hotel', htmlspecialchars($booking->getNameHotel()));
        $stmnt->bindValue(':hotel_bedroom', $booking->getHotelBedroom());
        $stmnt->bindValue(':arrived_customer', $booking->getArrivedCustomer());
        $stmnt->bindValue(':departure_customer', $booking->getDepartureCustomer());
        $stmnt->bindValue(':date_booking', $booking->getDateBooking());
        $stmnt->execute();
    }
}
?>
