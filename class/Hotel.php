<?php
class Hotel
{
    protected $id;
    protected $name;
    protected $address;

    const MSG_ERROR_ID = 'ID doit être un entier.';
    const MSG_ERROR_NAME = 'NAME doit être une chaine de caractère.';
    const MSG_ERROR_ADDRESS = 'ADDRESS doit être une chaine de caractère.';

    public function __construct(array $data)
    {
        $this->setId($data['id']);
        $this->setNameHotel($data['name']);
        $this->setAddress($data['address']);
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
    public function setName($name)
    {
        if(is_string($name))
        {
            $this->name = $name;
        }
        else
        {
            $this->setError(self::MSG_ERROR_NAME);
        }
    }
    public function setAddress($address)
    {
        if(is_string($address))
        {
            $this->address = $address;
        }
        else
        {
            $this->setError(self::MSG_ERROR_ADDRESS);
        }
    }

    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getAddress()
    {
        return $this->address;
    }
    public function getError()
    {
        return self::$error;
    }
}
?>
