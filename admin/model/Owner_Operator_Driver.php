<?php
@session_start();

/**
 * Created by PhpStorm.
 * User: BOND
 * Date: 1/29/2020
 * Time: 5:57 PM
 */
class Owner_Operator_Driver implements IteratorAggregate
{
    private $id;
    private $driverName;
    private $percentage;
    private $truckNo;
    private $installment;
    private $driverId;
    private $insertId;
    private $insertedTime;

    /**
     * @return mixed
     */
    public function getDriverId()
    {
        return $this->driverId;
    }

    /**
     * @param mixed $driverId
     */
    public function setDriverId($driverId): void
    {
        $this->driverId = $driverId;
    }

    /**
     * @return mixed
     */
    public function getInsertId()
    {
        return $this->insertId;
    }

    /**
     * @param mixed $insertId
     */
    public function setInsertId($insertId): void
    {
        $this->insertId = $insertId;
    }

    /**
     * @return mixed
     */
    public function getInsertedTime()
    {
        return $this->insertedTime;
    }

    /**
     * @param mixed $insertedTime
     */
    public function setInsertedTime($insertedTime): void
    {
        $this->insertedTime = $insertedTime;
    }

    /**
     * @return mixed
     */
    public function getDeleteStatus()
    {
        return $this->deleteStatus;
    }

    /**
     * @param mixed $deleteStatus
     */
    public function setDeleteStatus($deleteStatus): void
    {
        $this->deleteStatus = $deleteStatus;
    }

    /**
     * @return mixed
     */
    public function getDeleteedId()
    {
        return $this->deleteedId;
    }

    /**
     * @param mixed $deleteedId
     */
    public function setDeleteedId($deleteedId): void
    {
        $this->deleteedId = $deleteedId;
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
    public function getDriverName()
    {
        return $this->driverName;
    }

    /**
     * @param mixed $driverName
     */
    public function setDriverName($driverName)
    {
        $this->driverName = $driverName;
    }

    /**
     * @return mixed
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * @param mixed $percentage
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;
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
    public function getInstallment()
    {
        return $this->installment;
    }

    /**
     * @param mixed $installment
     */
    public function setInstallment($installmentCategory, $installmentType, $amount, $installment, $startNo, $startDate, $internalNote)
    {
        $this->installment = array();
        for ($i = 0; $i < count($installmentCategory); $i++) {
            $this->installment[] = array(
                "installmentCategory" => $installmentCategory[$i],
                "installmentType" => $installmentType[$i],
                "amount" => $amount[$i],
                "installment" => $installment[$i],
                "startNo" => $startNo[$i],
                "startDate" => $startDate[$i],
                "internalNote" => $internalNote[$i],
            );
        }
    }

    public function getIterator()
    {
        return new ArrayIterator(
            array(
                '_id' => $this->id,
                'companyID' => $_SESSION['companyId'],
                'counter' => 0,
                'ownerOperator' => array([
                    '_id' => 0,
                    'driverId' => (int)$this->driverName,
                    'percentage' => $this->percentage,
                    'truckNo' => $this->truckNo,
                    'installment' => $this->installment
                ])
            )
        );
    }

    public function insert($owner, $db, $helper)
    {

        $collection = $db->owner_operator_driver;
        $criteria = array(
            'companyID' => $_SESSION['companyId'],
        );

        $doc = $collection->findOne($criteria);

        if (!empty($doc)) {

            $db->owner_operator_driver->updateOne(['companyID' => $_SESSION['companyId']], ['$push' => ['ownerOperator' => array(
                '_id' => $helper->getDocumentSequence($_SESSION['companyId'], $db->owner_operator_driver),
                'driverId' => (int)$this->driverName,
                'percentage' => $this->percentage,
                'truckNo' => $this->truckNo,
                'installment' => $this->installment,
            )]]);
        } else {
            $ship = iterator_to_array($owner);
            $db->owner_operator_driver->insertOne($ship);
        }
    }

    public function addOwner($id, $db, $helper) {
        $collection = $db->owner_operator_driver;
        $criteria = array(
            'companyID' => $_SESSION['companyId'],
        );

        $doc = $collection->findOne($criteria);

        if (!empty($doc)) {

            $db->owner_operator_driver->updateOne(['companyID' => $_SESSION['companyId']], ['$push' => ['ownerOperator' => array(
                '_id' => $helper->getDocumentSequence($_SESSION['companyId'], $db->owner_operator_driver),
                'driverId' => (int)$id
            )]]);
        } else {
            $db->owner_operator_driver->insertOne(['driver_id' => (int)$id]);
        }
    }

}