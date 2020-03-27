<?php
@session_start();
/**
 * Created by PhpStorm.
 * User: Chetan
 * Date: 1/23/2020
 * Time: 7:25 PM
 */

class TrailerAdd implements IteratorAggregate
{
    private $id;
    private $companyID;
    private $Column;
    private $trailerNumber;
    private $trailerType;
    private $licenseType;
    private $plateExpiry;
    private $inspectionExpiration;
    private $status;
    private $model;
    private $year;
    private $axies;
    private $registeredState;
    private $vin;
    private $dot;
    private $activationDate;
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
    public function getTrailerNumber()
    {
        return $this->trailerNumber;
    }

    /**
     * @param mixed $trailerNumber
     */
    public function setTrailerNumber($trailerNumber)
    {
        $this->trailerNumber = $trailerNumber;
    }

    /**
     * @return mixed
     */
    public function getTrailerType()
    {
        return $this->trailerType;
    }

    /**
     * @param mixed $trailerType
     */
    public function setTrailerType($trailerType)
    {
        $this->trailerType = $trailerType;
    }

    /**
     * @return mixed
     */
    public function getLicenseType()
    {
        return $this->licenseType;
    }

    /**
     * @param mixed $licenseType
     */
    public function setLicenseType($licenseType)
    {
        $this->licenseType = $licenseType;
    }

    /**
     * @return mixed
     */
    public function getPlateExpiry()
    {
        return $this->plateExpiry;
    }

    /**
     * @param mixed $plateExpiry
     */
    public function setPlateExpiry($plateExpiry)
    {
        $this->plateExpiry = $plateExpiry;
    }

    /**
     * @return mixed
     */
    public function getInspectionExpiration()
    {
        return $this->inspectionExpiration;
    }

    /**
     * @param mixed $inspectionExpiration
     */
    public function setInspectionExpiration($inspectionExpiration)
    {
        $this->inspectionExpiration = $inspectionExpiration;
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
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model)
    {
        $this->model = $model;
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
    public function getDot()
    {
        return $this->dot;
    }

    /**
     * @param mixed $dot
     */
    public function setDot($dot)
    {
        $this->dot = $dot;
    }

    /**
     * @return mixed
     */
    public function getActivationDate()
    {
        return $this->activationDate;
    }

    /**
     * @param mixed $activationDate
     */
    public function setActivationDate($activationDate)
    {
        $this->activationDate = $activationDate;
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
                'companyID' => (int) $this->companyID,
                'counter' => 0,
                'trailer' => array([
                    '_id' => 0,
                    'counter' => 0,
                    'trailerNumber' => $this->trailerNumber,
                    'trailerType' => $this->trailerType,
                    'licenseType' => $this->licenseType,
                    'plateExpiry' => $this->plateExpiry,
                    'inspectionExpiration' => $this->inspectionExpiration,
                    'status' => $this->status,
                    'model' => $this->model,
                    'year' => $this->year,
                    'axies' => $this->axies,
                    'registeredState' => $this->registeredState,
                    'vin' => $this->vin,
                    'dot' => $this->dot,
                    'activationDate' => $this->activationDate,
                    'internalNotes' => $this->internalNotes,
                    'trailerDoc' => $this->uploadDocument,
                    'insertedTime' => time(),
                    'insertedUserId' => $_SESSION['companyName'],
                    'deleteStatus' => 0,
                    ]
                )
            )
        );
    }


    //Insert Trailer Function
    public function insert($trailer,$db,$helper)
       {
           $collection = $db->trailer_admin_add;
                $criteria = array(
                   'companyID' => (int)$trailer->getCompanyID(),
                );
                $doc = $collection->findOne($criteria);

            if (!empty($doc)) {
            $db->trailer_admin_add->updateOne(['companyID' => (int)$this->companyID],['$push'=>['trailer'=>[
                '_id'=>$helper->getDocumentSequence((int)$this->companyID,$db->trailer_admin_add),
                'counter' => 0,
                'trailerNumber' => $this->trailerNumber,
                'trailerType' => $this->trailerType,
                'licenseType' => $this->licenseType,
                'plateExpiry' => $this->plateExpiry,
                'inspectionExpiration' => $this->inspectionExpiration,
                'status' => $this->status,
                'model' => $this->model,
                'year' => $this->year,
                'axies' => $this->axies,
                'registeredState' => $this->registeredState,
                'vin' => $this->vin,
                'dot' => $this->dot,
                'activationDate' => $this->activationDate,
                'internalNotes' => $this->internalNotes,
                'trailerDoc' => $this->uploadDocument,
                'insertedTime' => time(),
                'insertedUserId' => $_SESSION['companyName'],
                'deleteStatus' => 0
            ]]]);

            $db->trailer_add->updateOne(['companyID' => (int)$_SESSION['companyId'], 'trailer._id' => (int)$this->trailerType],
            ['$set' => ['trailer.$.counter' => $helper->getDocumentSequenceId((int)$this->trailerType,$db->trailer_add,"trailer",(int)$_SESSION['companyId'])]]);
    
        } else {
            $trailer = iterator_to_array($trailer);
            $db->trailer_admin_add->insertOne($trailer);

            $db->trailer_add->updateOne(['companyID' => (int)$_SESSION['companyId'], 'trailer._id' => (int)$this->trailerType],
            ['$set' => ['trailer.$.counter' => $helper->getDocumentSequenceId((int)$this->trailerType,$db->trailer_add,"trailer",(int)$_SESSION['companyId'])]]);
        
        }
    }

    //update
    public function updateTrailer($trailer,$db){
        $db->trailer_admin_add->updateOne(
            ['companyID' => (int)$_SESSION['companyId'],'trailer._id' => (int)$this->getId()],
            ['$set' => ['trailer.$.'.$trailer->getColumn() => $trailer->getTrailerNumber()]
            ]);
    }

    //Delete
    public function deleteTrailer($trailer,$db,$helper){
        $db->trailer_admin_add->updateOne(['companyID' => (int)$_SESSION['companyId']], [
            '$pull' => ['trailer' => ['_id' => (int)$trailer->getId()]]]
        );

        $db->trailer_add->updateOne(['companyID' => (int)$_SESSION['companyId'], 'trailer._id' => (int)$this->trailerType],
        ['$set' => ['trailer.$.counter' => $helper->getDocumentDecrementId((int)$this->trailerType,$db->trailer_add,"trailer",(int)$_SESSION['companyId'])]]);

    }

    //Export
    public function exportTrailer($db)
    {
        $trailer = $db->trailer_admin_add->find(['companyID' => $_SESSION['companyId']]);
        foreach ($trailer as $addtrailer) {
            $show = $addtrailer['trailer'];
            foreach ($show as $s) {
                $p[] = array($s['trailerNumber'],$s['trailerType'],$s['licenseType'],date('d/m/Y',$s['plateExpiry']),
                    date('d/m/Y',$s['inspectionExpiration']),$s['status'],$s['model'],$s['year'],
                    $s['axies'],$s['registeredState'],$s['vin'],date('d/m/Y',$s['dot']),
                    date('d/m/Y',$s['activationDate']),$s['internalNotes']
                );
            }
        }
        echo json_encode($p);
    }

}