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


    public function getIterator()
    {
        // TODO: Implement getIterator() method.
        return new ArrayIterator(
            array(
                '_id' => $this->id,
                'companyID' => (int) $this->companyID,
                'counter' => 0,
                'trailer' => array(['_id' => 0,
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
                    'internalNotes' => $this->internalNotes]
                )
            )
        );
    }

    //Insert Trailer Function
    public function insert($trailer,$db,$helper)
    {
        $c_id = $db->trailer_admin_add->find(['companyID' =>(int)$trailer->getCompanyID()]);
        $count = 0;
        foreach ($c_id as $c) {
            $count++;
        }
        if ($count > 0) {
            $db->trailer_admin_add->updateOne(['companyID' => (int)$this->companyID],['$push'=>['trailer'=>[
                '_id'=>$helper->getDocumentSequence((int)$this->companyID,$db->trailer_admin_add),
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
                'internalNotes' => $this->internalNotes
            ]]]);
        } else {
            $trailer = iterator_to_array($trailer);
            $db->trailer_admin_add->insertOne($trailer);
        }
    }

    //import Excel
    public function importExceltrailer($targetPath, $helper)
    {
        require_once('../excel/excel_reader2.php');
        require_once('../excel/SpreadsheetReader.php');
        include '../database/connection.php';   // connection

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());

        for ($i = 0; $i < $sheetCount; $i++) {

            $Reader->ChangeSheet($i);

            $this->setId($helper->getNextSequence("traileraddcount", $db));
            $this->companyID = $_SESSION['companyId'];

            foreach ($Reader as $Row) {
                if (isset($Row[0])) {
                    $this->trailerNumber = $Row[0];
                }
                if (isset($Row[1])) {
                    $this->trailerType = $Row[1];
                }
                if (isset($Row[2])) {
                    $this->licenseType = $Row[2];
                }
                if (isset($Row[3])) {
                    $this->plateExpiry = $Row[3];
                }
                if (isset($Row[4])) {
                    $this->inspectionExpiration = $Row[4];
                }
                if (isset($Row[5])) {
                    $this->status = $Row[5];
                }
                if (isset($Row[6])) {
                    $this->model = $Row[6];
                }
                if (isset($Row[7])) {
                    $this->year = $Row[7];
                }
                if (isset($Row[8])) {
                    $this->axies = $Row[8];
                }
                if (isset($Row[9])) {
                    $this->registeredState = $Row[9];
                }
                if (isset($Row[10])) {
                    $this->vin = $Row[10];
                }
                if (isset($Row[11])) {
                    $this->dot = $Row[11];
                }
                if (isset($Row[12])) {
                    $this->activationDate = $Row[12];
                }
                if (isset($Row[13])) {
                    $this->internalNotes = $Row[13];
                }
                $this->insert($this,$db,$helper);
            }
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
    public function deleteTrailer($trailer,$db){
        $db->trailer_admin_add->updateOne(['companyID' => (int)$_SESSION['companyId']],
            ['$pull' => ['trailer' => ['_id' => (int)$trailer->getId()]]]
        );
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