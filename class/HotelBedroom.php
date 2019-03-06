<?php
class HotelBedroom
{
    protected $id;
    protected $id_hotel;
    protected $id_bedroom;

    const MSG_ERROR_ID = 'ID doit être un entier.';
    const MSG_ERROR_ID_HOTEL = 'ID HOTEL doit être un entier.';
    const MSG_ERROR_ID_BEDROOM = 'ID BEDROOM doit être un entier.';

    public function __construct(array $data)
    {
        $this->setId($data['id']);
        $this->setIdHotel($data['id_hotel']);
        $this->setIdBedroom($data['id_bedroom']);
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
    public function setIdHotel($id_hotel)
    {
        if((is_int($id_hotel)) AND ($id_hotel>0))
        {
        $this->id_hotel = $id_hotel;
        }
        else
        {
            $this->setError(self::MSG_ERROR_ID_HOTEL);
        }
    }
    public function setIdBedroom($id_bedroom)
    {
        if((is_int($id_bedroom)) AND ($id_bedroom>0))
        {
        $this->id_bedroom = $id_bedroom;
        }
        else
        {
            $this->setError(self::MSG_ERROR_ID_BEDROOM);
        }
    }
    public function getId()
    {
        return $this->id;
    }
    public function getIdHotel()
    {
        return $this->id_hotel;
    }
    public function getIdBedroom()
    {
        return $this->id_bedroom;
    }
    public function getError()
    {
        return self::$error;
    }
}
?>
