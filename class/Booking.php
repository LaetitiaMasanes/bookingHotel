<?php
class Booking
{
    protected $id;
    protected $name_customer;
    protected $mail_customer;
    protected $name_hotel;
    protected $id_hotel_bedroom;
    protected $arrived_customer;
    protected $departure_customer;
    protected $date_booking;

    const MSG_ERROR_ID = 'ID doit être un entier.';
    const MSG_ERROR_NAME_CUSTOMER = 'NOM CLIENT doit être une chaine de caractère.';
    const MSG_ERROR_MAIL_CUSTOMER = 'E-MAIL CLIENT doit être une chaine de caractère.';
    const MSG_ERROR_HOTEL_NAME = 'NOM HOTEL doit être une chaine de caractère.';
    const MSG_ERROR_ID_HOTEL_BEDROOM = 'HOTEL CHAMBRE ID doit être un entier.';
    const MSG_ERROR_ARRIVED_CUSTOMER = 'DATE ARRIVEE doit être une date.';
    const MSG_ERROR_DEPARTURE_CUSTOMER = 'DATE DEPART doit être une date.';
    const MSG_ERROR_DATE_BOOKING = 'DATE RESERVATION doit être une date.';

    public function __construct(array $data)
    {
        $this->setId($data['id']);
        $this->setNameCustomer($data['name_customer']);
        $this->setMailCustomer($data['mail_customer']);
        $this->setNameHotel($data['name_hotel']);
        $this->setHotelBedroom($data['id_hotel_bedroom']);
        $this->setArrivedCustomer($data['arrived_customer']);
        $this->setDepartureCustomer($data['departure_customer']);
        $this->setDateBooking($data['date_booking']);
    }

    public function setError($msg)
    {
        self::$error = $msg;
    }
    public function setId($id)
    {
        if((is_int($id)) AND ($id>0))
        {
        $this->_id = $id;
        }
        else
        {
            $this->setError(self::MSG_ERROR_ID);
        }
    }
    public function setNameCustomer($name_customer)
    {
        if(is_string($name_customer))
        {
            $this->name_customer = $name_customer;
        }
        else
        {
            $this->setError(self::MSG_ERROR_NAME_CUSTOMER);
        }
    }
    public function setMailCustomer($mail_customer)
    {
        if(is_string($mail_customer))
        {
            $this->mail_customer = $mail_customer;
        }
        else
        {
            $this->setError(self::MSG_ERROR_MAIL_CUSTOMER);
        }
    }
    public function setNameHotel($name_hotel)
    {
        if(is_string($name_hotel))
        {
            $this->name_hotel = $name_hotel;
        }
        else
        {
            $this->setError(self::MSG_ERROR_HOTEL_NAME);
        }
    }
    public function setHotelBedroom($id_hotel_bedroom)
    {
        if(is_string($id_hotel_bedroom))
        {
        $this->id_hotel_bedroom = $id_hotel_bedroom;
        }
        else
        {
            $this->setError(self::MSG_ERROR_ID_HOTEL_BEDROOM);
        }
    }
    public function setArrivedCustomer($arrived_customer)
    {
        list($y, $m, $d) = explode("-", $arrived_customer);

        if(checkdate($m, $d, $y))
        {
            $this->arrived_customer = $arrived_customer;
        }
        else
        {
            $this->setError(self::MSG_ERROR_ARRIVED_CUSTOMER);
        }
    }
    public function setDepartureCustomer($departure_customer)
    {
        list($y, $m, $d) = explode("-", $departure_customer);

        if(checkdate($m, $d, $y))
        {
            $this->departure_customer = $departure_customer;
        }
        else
        {
            $this->setError(self::MSG_ERROR_DEPARTURE_CUSTOMER);
        }
    }
    public function setDateBooking($date_booking)
    {
        list($y, $m, $d) = explode("-", $date_booking);

        if(checkdate($m, $d, $y))
        {
            $this->date_booking = $date_booking;
        }
        else
        {
            $this->setError(self::MSG_ERROR_DATE_BOOKING);
        }
    }


    public function getId()
    {
        return $this->id;
    }
    public function getNameCustomer()
    {
        return $this->name_customer;
    }
    public function getMailCustomer()
    {
        return $this->mail_customer;
    }
    public function getNameHotel()
    {
        return $this->name_hotel;
    }
    public function getHotelBedroom()
    {
        return $this->id_hotel_bedroom;
    }
    public function getArrivedCustomer()
    {
        return $this->arrived_customer;
    }
    public function getDepartureCustomer()
    {
        return $this->departure_customer;
    }
    public function getDateBooking()
    {
        return $this->date_booking;
    }
    public function getError()
    {
        return self::$error;
    }
}
?>
