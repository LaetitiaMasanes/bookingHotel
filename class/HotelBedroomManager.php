<?php
class HotelBedroomManager
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

    public function getHotelBedroom()
    {
        $sql = 'SELECT hotel_bedroom.id FROM hotel_bedroom
        INNER JOIN hotels ON hotel_bedroom.id_hotel=hotels.id WHERE hotels.name="'.$_POST['hotel'].'"
        AND hotel_bedroom.id NOT IN (SELECT booking.id_hotel_bedroom FROM booking
        WHERE booking.arrived_customer <=  "' .$_POST['arrived_customer']. '"
        AND booking.departure_customer >= "'.$_POST['departure_customer'].'")';

        $stmnt = $this->_db->prepare($sql);
        $stmnt->execute();
        while ($row = $stmnt->fetch(PDO::FETCH_ASSOC))
        {
            $result[] = $row['id'];
        }
        return $result[0];
    }
}
