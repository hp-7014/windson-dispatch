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

    public function getIterator()
    {
        // TODO: Implement getIterator() method.
                return new ArrayIterator(
                    array(
                    '_id' => $this->id,
                    'companyID' => (int) $this->companyID,
                    'counter' => 0,
                    'truck' => array(['_id' => 0, 
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
                    'internalNotes' => $this->internalNotes]
                )
            )
        );
    }
    
    //Insert Truck Function
    public function insert($truck,$db,$helper)
    {
        $c_id = $db->truckadd->find(['companyID' =>(int)$truck->getCompanyID()]);
        $count = 0;
        foreach ($c_id as $c) {
            $count++;
        }
        if ($count > 0) {
            $db->truckadd->updateOne(['companyID' => (int)$this->companyID],['$push'=>['truck'=>[
                '_id'=>$helper->getDocumentSequence((int)$this->companyID,$db->truckadd),
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
                    'internalNotes' => $this->internalNotes
            ]]]);
        } else {
            $truck = iterator_to_array($truck);
            $db->truckadd->insertOne($truck);
        }
    }

    //import Excel
    public function importExceltruck($targetPath, $helper)
    {
        require_once('../excel/excel_reader2.php');
        require_once('../excel/SpreadsheetReader.php');
        include '../database/connection.php';   // connection

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());

        for ($i = 0; $i < $sheetCount; $i++) {

            $Reader->ChangeSheet($i);

            $this->setId($helper->getNextSequence("truckcount", $db));
            $this->companyID = $_SESSION['companyId'];

            foreach ($Reader as $Row) {
                if (isset($Row[0])) {
                    $this->truckNumber = $Row[0];
                }
                if (isset($Row[1])) {
                    $this->truckType = $Row[1];
                }
                if (isset($Row[2])) {
                    $this->licensePlate = $Row[2];
                }
                if (isset($Row[3])) {
                    $this->plateExpiry = $Row[3];
                }
                if (isset($Row[4])) {
                    $this->inspectionExpiry = $Row[4];
                }
                if (isset($Row[5])) {
                    $this->status = $Row[5];
                }
                if (isset($Row[6])) {
                    $this->ownership = $Row[6];
                }
                if (isset($Row[7])) {
                    $this->mileage = $Row[7];
                }
                if (isset($Row[8])) {
                    $this->axies = $Row[8];
                }
                if (isset($Row[9])) {
                    $this->year = $Row[9];
                }
                if (isset($Row[10])) {
                    $this->fuelType = $Row[10];
                }
                if (isset($Row[11])) {
                    $this->startDate = $Row[11];
                }
                if (isset($Row[12])) {
                    $this->deactivationDate = $Row[12];
                }
                if (isset($Row[13])) {
                    $this->ifta = $Row[13];
                }
                if (isset($Row[14])) {
                    $this->registeredState = $Row[14];
                }
                if (isset($Row[15])) {
                    $this->insurancePolicy = $Row[15];
                }
                if (isset($Row[16])) {
                    $this->grossWeight = $Row[16];
                }
                if (isset($Row[17])) {
                    $this->vin = $Row[17];
                }
                if (isset($Row[18])) {
                    $this->dotexpiryDate = $Row[18];
                }
                if (isset($Row[19])) {
                    $this->transponder = $Row[19];
                }
                if (isset($Row[20])) {
                    $this->internalNotes = $Row[20];
                }
                $this->insert($this,$db,$helper);
            }
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
    public function deleteTruckAdd($truck,$db){
        $db->truckadd->updateOne(['companyID' => (int)$_SESSION['companyId']],
            ['$pull' => ['truck' => ['_id' => (int)$truck->getId()]]]
        );
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