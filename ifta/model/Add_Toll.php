<?php
@session_start();

class Add_Toll implements IteratorAggregate
{
    private $id;
    private $companyID;
    private $invoiceNumber;
    private $tollDate;
    private $transType;
    private $location;
    private $transponder;
    private $amount;
    private $licensePlate;
    private $truckNo;

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
    public function getCompanyID()
    {
        return $this->companyID;
    }

    /**
     * @param mixed $companyID
     */
    public function setCompanyID($companyID)
    {
        $this->companyID = $companyID;
    }

    /**
     * @return mixed
     */
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * @param mixed $invoiceNumber
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;
    }

    /**
     * @return mixed
     */
    public function getTollDate()
    {
        return $this->tollDate;
    }

    /**
     * @param mixed $tollDate
     */
    public function setTollDate($tollDate)
    {
        $this->tollDate = $tollDate;
    }

    /**
     * @return mixed
     */
    public function getTransType()
    {
        return $this->transType;
    }

    /**
     * @param mixed $transType
     */
    public function setTransType($transType)
    {
        $this->transType = $transType;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getTransponder()
    {
        return $this->transponder;
    }

    /**
     * @param mixed $transponder
     */
    public function setTransponder($transponder)
    {
        $this->transponder = $transponder;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getLicensePlate()
    {
        return $this->licensePlate;
    }

    /**
     * @param mixed $licensePlate
     */
    public function setLicensePlate($licensePlate)
    {
        $this->licensePlate = $licensePlate;
    }

    /**
     * @return mixed
     */
    public function getTruckNo()
    {
        return $this->truckNo;
    }

    /**
     * @param mixed $truckNo
     */
    public function setTruckNo($truckNo)
    {
        $this->truckNo = $truckNo;
    }

    /**
     * @return mixed
     */
    public function getColumn()
    {
        return $this->column;
    }

    /**
     * @param mixed $column
     */
    public function setColumn($column)
    {
        $this->column = $column;
    }

    public function getIterator()
    {
        return new ArrayIterator(
            array('_id'=> $this->id,
                'companyID'=>(int) $this->companyID,
                'counter' => 0,
                'tolls' => array([
                    '_id' => 0,
                    'invoiceNumber'=>$this->invoiceNumber,
                    'tollDate'=>$this->tollDate,
                    'transType'=>$this->transType,
                    'location'=>$this->location,
                    'transponder'=>$this->transponder,
                    'amount'=>$this->amount,
                    'licensePlate'=>$this->licensePlate,
                    'truckNo'=>$this->truckNo,
                    'delete_status'=>'0',
                    'insertedUser' => $_SESSION['companyName'],
                ])
            )
        );
    }

    public function insert($category,$db,$helper)
    {
        $c_id = $db->ifta_toll->find(['companyID' =>(int)$category->getCompanyID()]);
        $count = 0;
        foreach ($c_id as $c) {
            $count++;
        }
        if ($count > 0) {
            $db->ifta_toll->updateOne(['companyID' => (int) $this->companyID],['$push'=>['tolls'=>[
                '_id'=>$helper->getDocumentSequence((int) $this->companyID,$db->ifta_toll),
                'invoiceNumber'=>$this->invoiceNumber,
                'tollDate'=>$this->tollDate,
                'transType'=>$this->transType,
                'location'=>$this->location,
                'transponder'=>$this->transponder,
                'amount'=>$this->amount,
                'licensePlate'=>$this->licensePlate,
                'truckNo'=>$this->truckNo,
                'delete_status'=>'0',
                'insertedUser' => $_SESSION['companyName'],
            ]]]);
        } else {
            $toll_A = iterator_to_array($category);
            $db->ifta_toll->insertOne($toll_A);
        }

        echo "Data Insert Successfully";
    }
}