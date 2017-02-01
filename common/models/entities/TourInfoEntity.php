<?php   

class TourInfoEntity extends Entity
{
    private $id;
    private $day1;
    private $day2;
    private $day3;
    private $day4;
    private $day5;
    private $day6;
    private $price;
    private $toursId;
    private $priceIncludes;
    private $priceExcludes;
    private $additionalInfo;

    /**
     * @return mixed
     */
    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }

    /**
     * @param mixed $additionalInfo
     */
    public function setAdditionalInfo($additionalInfo)
    {
        $this->additionalInfo = $additionalInfo;
    }

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
    public function getDay1()
    {
        return $this->day1;
    }

    /**
     * @param mixed $day1
     */
    public function setDay1($day1)
    {
        $this->day1 = $day1;
    }

    /**
     * @return mixed
     */
    public function getDay2()
    {
        return $this->day2;
    }

    /**
     * @param mixed $day2
     */
    public function setDay2($day2)
    {
        $this->day2 = $day2;
    }

    /**
     * @return mixed
     */
    public function getDay3()
    {
        return $this->day3;
    }

    /**
     * @param mixed $day3
     */
    public function setDay3($day3)
    {
        $this->day3 = $day3;
    }

    /**
     * @return mixed
     */
    public function getDay4()
    {
        return $this->day4;
    }

    /**
     * @param mixed $day4
     */
    public function setDay4($day4)
    {
        $this->day4 = $day4;
    }

    /**
     * @return mixed
     */
    public function getDay5()
    {
        return $this->day5;
    }

    /**
     * @param mixed $day5
     */
    public function setDay5($day5)
    {
        $this->day5 = $day5;
    }

    /**
     * @return mixed
     */
    public function getDay6()
    {
        return $this->day6;
    }

    /**
     * @param mixed $day6
     */
    public function setDay6($day6)
    {
        $this->day6 = $day6;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getToursId()
    {
        return $this->toursId;
    }

    /**
     * @param mixed $toursId
     */
    public function setToursId($toursId)
    {
        $this->toursId = $toursId;
    }

    /**
     * @return mixed
     */
    public function getPriceIncludes()
    {
        return $this->priceIncludes;
    }

    /**
     * @param mixed $priceIncludes
     */
    public function setPriceIncludes($priceIncludes)
    {
        $this->priceIncludes = $priceIncludes;
    }

    /**
     * @return mixed
     */
    public function getPriceExcludes()
    {
        return $this->priceExcludes;
    }

    /**
     * @param mixed $priceExcludes
     */
    public function setPriceExcludes($priceExcludes)
    {
        $this->priceExcludes = $priceExcludes;
    }
    

  
    

    
    
}