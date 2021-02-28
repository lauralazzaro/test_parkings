<?php 
class Parking {
    private $id;
    private $name;
    private $status;
    private $tarifsStr; // concat all fees as string
    private $tarifHour;
    private $latitude;
    private $longitude;
    private $address;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getTarifsStr()
    {
        return $this->tarifsStr;
    }

    /**
     * @param mixed $tarifsStr
     */
    public function setTarifsStr($tarifsStr)
    {
        $this->tarifsStr = $tarifsStr;
    }

    /**
     * @return mixed
     */
    public function getTarifHour()
    {
        return $this->tarifHour;
    }

    /**
     * @param mixed $tarifHour
     */
    public function setTarifHour($tarifHour)
    {
        $this->tarifHour = $tarifHour;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }


}
