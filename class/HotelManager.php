<?php
class HotelManager
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

    public function getHotelFilter()
    {
        $sql = 'SELECT DISTINCT hotels.name, hotels.address FROM hotels INNER JOIN hotel_bedroom ON hotels.id=hotel_bedroom.id_hotel
        WHERE hotel_bedroom.id NOT IN (SELECT booking.id_hotel_bedroom FROM booking
        WHERE booking.arrived_customer <= "' .$_GET['arrived_customer']. '"
        AND booking.departure_customer >= "'.$_GET['departure_customer'].'")';

        $stmnt = $this->_db->prepare($sql);
        $stmnt->execute();
        while ($row = $stmnt->fetch(PDO::FETCH_ASSOC))
        {
            $result['name'][] = $row['name'];
            $result['address'][] = $row['address'];
        }
        return $result;
    }
}
?>
