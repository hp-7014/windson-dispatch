<?php
@session_start();
/**
 * Created by PhpStorm.
 * User: Chetan
 * Date: 1/22/2020
 * Time: 11:30 PM
 */

class TruckAdd implements IteratorAggregate
{
    private $id;
    private $companyID;
    private $Column;
    private $truckNumber;
    private $truckType;
    private $licensePlate;
    private $plateExpiry;
    private $inspectionExpiry;
    private $status;
    private $ownership;
    private $mileage;
    private $axies;
    private $year;
    private $fuelType;
    private $startDate;
    private $deactivationDate;
    private $ifta;
    private $registeredState;
    private $insurancePolicy;
    private $grossWeight;
    private $vin;
    private $dotexpiryDate;
    private $transponder;
    private $internalNotes;
    private $uploadDocument = array();
    private $insertTime;
    private $insertUserName;
    private $deleteStatus;
    private $deleteUserName;

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
    public function getColumn()
    {
        return $this->Column;
    }

    /**
     * @param mixed $Column
     */
    public function setColumn($Column)
    {
        $this->Column = $Column;
    }

    /**
     * @return mixed
     */
    public function getTruckNumber()
    {
        return $this->truckNumber;
    }

    /**
     * @param mixed $truckNumber
     */
    public function setTruckNumber($truckNumber)
    {
        $this->truckNumber = $truckNumber;
    }

    /**
     * @return mixed
     */
    public function getTruckType()
    {
        return $this->truckType;
    }

    /**
     * @param mixed $truckType
     */
    public function setTruckType($truckType)
    {
        $this->truckType = $truckType;
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
    public function getPlateExpiry() {
        return $this->plateExpiry;
    }

    public function setPlateExpiry($plateExpiry) {
        $this->plateExpiry = $plateExpiry;
    }

    public function getInspectionExpiry()
    {
        return $this->inspectionExpiry;
    }

    /**
     * @param mixed $inspectionExpiry
     */
    public function setInspectionExpiry($inspectionExpiry)
    {
        $this->inspectionExpiry = $inspectionExpiry;
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
    public function getOwnership()
    {
        return $this->ownership;
    }

    /**
     * @param mixed $ownership
     */
    public function setOwnership($ownership)
    {
        $this->ownership = $ownership;
    }

    /**
     * @return mixed
     */
    public function getMileage()
    {
        return $this->mileage;
    }

    /**
     * @param mixed $mileage
     */
    public function setMileage($mileage)
    {
        $this->mileage = $mileage;
    }

    /**
     * @return mixed
     */
    public function getAxies()
    {
        return $this->axies;
    }

    /**
     * @param mixed $axies
     */
    public function setAxies($axies)
    {
        $this->axies = $axies;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getFuelType()
    {
        return $this->fuelType;
    }

    /**
     * @param mixed $fuelType
     */
    public function setFuelType($fuelType)
    {
        $this->fuelType = $fuelType;
    }

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getDeactivationDate()
    {
        return $this->deactivationDate;
    }

    /**
     * @param mixed $deactivationDate
     */
    public function setDeactivationDate($deactivationDate)
    {
        $this->deactivationDate = $deactivationDate;
    }

    /**
     * @return mixed
     */
    public function getIfta()
    {
        return $this->ifta;
    }

    /**
     * @param mixed $ifta
     */
    public function setIfta($ifta)
    {
        $this->ifta = $ifta;
    }

    /**
     * @return mixed
     */
    public function getRegisteredState()
    {
        return $this->registeredState;
    }

    /**
     * @param mixed $registeredState
     */
    public function setRegisteredState($registeredState)
    {
        $this->registeredState = $registeredState;
    }

    /**
     * @return mixed
     */
    public function getInsurancePolicy()
    {
        return $this->insurancePolicy;
    }

    /**
     * @param mixed $insurancePolicy
     */
    public function setInsurancePolicy($insurancePolicy)
    {
        $this->insurancePolicy = $insurancePolicy;
    }

    /**
     * @return mixed
     */
    public function getGrossWeight()
    {
        return $this->grossWeight;
    }

    /**
     * @param mixed $grossWeight
     */
    public function setGrossWeight($grossWeight)
    {
        $this->grossWeight = $grossWeight;
    }

    /**
     * @return mixed
     */
    public function getVin()
    {
        return $this->vin;
    }

    /**
     * @param mixed $vin
     */
    public function setVin($vin)
    {
        $this->vin = $vin;
    }

    /**
     * @return mixed
     */
    public function getDotexpiryDate()
    {
        return $this->dotexpiryDate;
    }

    /**
     * @param mixed $dotexpiryDate
     */
    public function setDotexpiryDate($dotexpiryDate)
    {
        $this->dotexpiryDate = $dotexpiryDate;
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
    public function getInternalNotes()
    {
        return $this->internalNotes;
    }

    /**
     * @param mixed $internalNotes
     */
    public function setInternalNotes($internalNotes)
    {
        $this->internalNotes = $internalNotes;
    }

    /**
     * @return mixed
     */
    public function getInsertTime()
    {
        return $this->insertTime;
    }

    /**
     * @param mixed $insertTime
     */
    public function setInsertTime($insertTime)
    {
        $this->insertTime = $insertTime;
    }

    /**
     * @return mixed
     */
    public function getInsertUserName()
    {
        return $this->insertUserName;
    }

    /**
     * @param mixed $insertUserName
     */
    public function setInsertUserName($insertUserName)
    {
        $this->insertUserName = $insertUserName;
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
    public function setDeleteStatus($deleteStatus)
    {
        $this->deleteStatus = $deleteStatus;
    }

    /**
     * @return mixed
     */
    public function getDeleteUserName()
    {
        return $this->deleteUserName;
    }

    /**
     * @param mixed $deleteUserName
     */
    public function setDeleteUserName($deleteUserName)
    {
        $this->deleteUserName = $deleteUserName;
    }

    /**
     * @return mixed
     */
    public function getUploadDocument()
    {
        return $this->uploadDocument;
    }

    /**
     * @param mixed $uploadDocument
     */
    public function setUploadDocument($uploadDocument,$i)
    {
        $this->uploadDocument[$i] = array("uploadDocument" => $uploadDocument);

    }

    public function getIterator()
    {
        // TODO: Implement getIterator() method.
                return new ArrayIterator(
                    array(
                    '_id' => $this->id,
                    'counter' => 0,
                    'companyID' => (int) $this->companyID,
                    'truck' => array(['_id' => 0, 
                    'counter' => 0,
                    'truckNumber' => $this->truckNumber,
                    'truckType' => $this->truckType,
                    'licensePlate' => $this->licensePlate,
                    'plateExpiry' => $this->plateExpiry,        
                    'inspectionExpiry' => $this->inspectionExpiry,
                    'status' => $this->status,    
                    'ownership' => $this->ownership,        
                    'mileage' => $this->mileage,
                    'axies' => $this->axies,
                    'year' => $this->year,
                    'fuelType' => $this->fuelType,        
                    'startDate' => $this->startDate,
                    'deactivationDate' => $this->deactivationDate,    
                    'ifta' => $this->ifta,          
                    'registeredState' => $this->registeredState,
                    'insurancePolicy' => $this->insurancePolicy,
                    'grossWeight' => $this->grossWeight,
                    'vin' => $this->vin,        
                    'dotexpiryDate' => $this->dotexpiryDate,
                    'transponder' => $this->transponder,    
                    'internalNotes' => $this->internalNotes,
                    'trucDoc' => $this->uploadDocument,
                    'insertedTime' => time(),
                    'insertedUserId' => $_SESSION['companyName'],
                    'deleteStatus' => 0
                    ]
                )
            )
        );
    }

    //Insert Truck Function

    public function insert($truck,$db,$helper)
    {
        $collection = $db->truckadd;
        $criteria = array(
            'companyID' => (int)$truck->getCompanyID(),
        );
        $doc = $collection->findOne($criteria);

        if (!empty($doc)) {
            $db->truckadd->updateOne(['companyID' => (int)$this->companyID],['$push'=>['truck'=>[
                '_id'=>$helper->getDocumentSequence((int)$this->companyID,$db->truckadd),
                'counter' => 0,
                'truckNumber' => $this->truckNumber,
                'truckType' => $this->truckType,
                'licensePlate' => $this->licensePlate,
                'plateExpiry' => $this->plateExpiry,        
                'inspectionExpiry' => $this->inspectionExpiry,
                'status' => $this->status,    
                'ownership' => $this->ownership,        
                'mileage' => $this->mileage,
                'axies' => $this->axies,
                'year' => $this->year,
                'fuelType' => $this->fuelType,        
                'startDate' => $this->startDate,
                'deactivationDate' => $this->deactivationDate,    
                'ifta' => $this->ifta,          
                'registeredState' => $this->registeredState,
                'insurancePolicy' => $this->insurancePolicy,
                'grossWeight' => $this->grossWeight,
                'vin' => $this->vin,        
                'dotexpiryDate' => $this->dotexpiryDate,
                'transponder' => $this->transponder,    
                'internalNotes' => $this->internalNotes,
                'trucDoc' => $this->uploadDocument,
                'insertedTime' => time(),
                'insertedUserId' => $_SESSION['companyName'],
                'deleteStatus' => 0
            ]]]);

            $db->truck_add->updateOne(['companyID' => (int)$_SESSION['companyId'], 'truck._id' => (int)$this->truckType],
            ['$set' => ['truck.$.counter' => $helper->getDocumentSequenceId((int)$this->truckType,$db->truck_add,"truck",(int)$_SESSION['companyId'])]]);
        
        } else {
            $truck = iterator_to_array($truck);
            $db->truckadd->insertOne($truck);
            
            $db->truck_add->updateOne(['companyID' => (int)$_SESSION['companyId'], 'truck._id' => (int)$this->truckType],
            ['$set' => ['truck.$.counter' => $helper->getDocumentSequenceId((int)$this->truckType,$db->truck_add,"truck",(int)$_SESSION['companyId'])]]);
        
        }
    }

    //update
    public function updateTruckAdd($truck,$db){
        $db->truckadd->updateOne(
            ['companyID' => (int)$_SESSION['companyId'],'truck._id' => (int)$this->getId()],
            ['$set' => ['truck.$.'.$truck->getColumn() => $truck->getTruckNumber()]
            ]);
    }

    //Delete
    public function deleteTruckAdd($truck,$db,$helper){
        // $db->truckadd->updateOne(['companyID' => (int)$_SESSION['companyId'], 'truck._id' => (int)$this->getId()],
        //     ['$set' => ['truck.$.deleteStatus' => 1]]
        // );
        $db->truckadd->updateOne(['companyID' => (int)$_SESSION['companyId']], [
            '$pull' => ['truck' => ['_id' => (int)$truck->getId()]]]
        );

        $db->truck_add->updateOne(['companyID' => (int)$_SESSION['companyId'], 'truck._id' => (int)$this->truckType],
            ['$set' => ['truck.$.counter' => $helper->getDocumentDecrementId((int)$this->truckType,$db->truck_add,"truck",(int)$_SESSION['companyId'])]]);
        
    }

    //Export
    public function exportTruck($db)
    {
        $truck = $db->truckadd->find(['companyID' => $_SESSION['companyId']]);
        foreach ($truck as $addtruck) {
            $show = $addtruck['truck'];
            foreach ($show as $s) {
                $p[] = array($s['truckNumber'],$s['truckType'],$s['licensePlate'],$s['plateExpiry'],
                    $s['inspectionExpiry'],$s['status'],$s['ownership'],$s['mileage'],
                    $s['axies'],$s['year'],$s['fuelType'],$s['startDate'],
                    $s['deactivationDate'],$s['ifta'],$s['registeredState'],$s['insurancePolicy'],
                    $s['grossWeight'],$s['vin'],$s['dotexpiryDate'],$s['transponder'],$s['internalNotes']
                );
            }
        }
        echo json_encode($p);
    }

}