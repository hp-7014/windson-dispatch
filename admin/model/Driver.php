<?php
@session_start();

/**
 * Created by PhpStorm.
 * User: BOND
 * Date: 1/28/2020
 * Time: 6:20 PM
 */
class Driver implements IteratorAggregate
{
    private $id;
    private $companyId;
    private $driverName;
    private $driverUsername;
    private $driverPassword;
    private $driverTelephone;
    private $driverAlt;
    private $driverEmail;
    private $driverAddress;
    private $driverLocation;
    private $driverZip;
    private $driverStatus;
    private $driverSocial;
    private $dateOfbirth;
    private $dateOfhire;
    private $driverLicenseNo;
    private $driverLicenseIssue;
    private $driverLicenseExp;
    private $driverLastMedical;
    private $driverNextMedical;
    private $driverLastDrugTest;
    private $driverNextDrugTest;
    private $passportExpiry;
    private $fastCardExpiry;
    private $hazmatExpiry;

    // new data
    private $rate;
    private $currency;
    private $driverLoadedMile;
    private $driverEmptyMile;
    private $pickupRate;
    private $pickputAfter;
    private $dropRate;
    private $dropAfter;
    private $tarp;
    private $terminationDate;
    private $InternalNote;

    // array detail
    private $recurrenceAdd;
    private $recurrenceSubtract;

    // user detail
    private $lastUpdateID;
    private $insertedTime;
    private $insertedUserID;
    private $deleteStatus;
    private $deleteUserID;
    private $ownerOperatorStatus;

    public function getRecurrenceAdd()
    {
        return $this->recurrenceAdd;
    }

    /**
     * @param mixed $recurrenceAdd
     */
    public function setRecurrenceAdd($installmentCategoryStore, $installmentTypeStore, $amountStore, $installmentStore, $startNoStore, $startDateStore, $internalNoteStore): void
    {
        $this->recurrenceAdd = array();
        for ($i = 0; $i < count($installmentCategoryStore); $i++) {
            $this->recurrenceAdd[] = array(
                "installmentCategoryStore" => $installmentCategoryStore[$i],
                "installmentTypeStore" => $installmentTypeStore[$i],
                "amountStore" => $amountStore[$i],
                "installmentStore" => $installmentStore[$i],
                "startNoStore" => $startNoStore[$i],
                "startDateStore" => $startDateStore[$i],
                "internalNoteStore" => $internalNoteStore[$i],
            );
        }
    }

    /**
     * @return mixed
     */
    public function getRecurrenceSubtract()
    {
        return $this->recurrenceSubtract;
    }

    /**
     * @param mixed $recurrenceSubtract
     */
    public function setRecurrenceSubtract($installmentCategory_Store, $installmentType_Store, $amount_Store, $installment_Store, $startNo_Store, $startDate_Store, $internalNote_Store): void
    {
        $this->recurrenceSubtract = array();
        for ($i = 0; $i < count($installmentCategory_Store); $i++) {
            $this->recurrenceSubtract[] = array(
                "installmentCategoryStore" => $installmentCategory_Store[$i],
                "installmentTypeStore" => $installmentType_Store[$i],
                "amountStore" => $amount_Store[$i],
                "installmentStore" => $installment_Store[$i],
                "startNoStore" => $startNo_Store[$i],
                "startDateStore" => $startDate_Store[$i],
                "internalNoteStore" => $internalNote_Store[$i],
            );
        }
    }

    /**
     * @return mixed
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param mixed $rate
     */
    public function setRate($rate): void
    {
        $this->rate = $rate;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getDriverLoadedMile()
    {
        return $this->driverLoadedMile;
    }

    /**
     * @param mixed $driverLoadedMile
     */
    public function setDriverLoadedMile($driverLoadedMile): void
    {
        $this->driverLoadedMile = $driverLoadedMile;
    }

    /**
     * @return mixed
     */
    public function getDriverEmptyMile()
    {
        return $this->driverEmptyMile;
    }

    /**
     * @param mixed $driverEmptyMile
     */
    public function setDriverEmptyMile($driverEmptyMile): void
    {
        $this->driverEmptyMile = $driverEmptyMile;
    }

    /**
     * @return mixed
     */
    public function getPickupRate()
    {
        return $this->pickupRate;
    }

    /**
     * @param mixed $pickupRate
     */
    public function setPickupRate($pickupRate): void
    {
        $this->pickupRate = $pickupRate;
    }

    /**
     * @return mixed
     */
    public function getPickputAfter()
    {
        return $this->pickputAfter;
    }

    /**
     * @param mixed $pickputAfter
     */
    public function setPickputAfter($pickputAfter): void
    {
        $this->pickputAfter = $pickputAfter;
    }

    /**
     * @return mixed
     */
    public function getDropRate()
    {
        return $this->dropRate;
    }

    /**
     * @param mixed $dropRate
     */
    public function setDropRate($dropRate): void
    {
        $this->dropRate = $dropRate;
    }

    /**
     * @return mixed
     */
    public function getDropAfter()
    {
        return $this->dropAfter;
    }

    /**
     * @param mixed $dropAfter
     */
    public function setDropAfter($dropAfter): void
    {
        $this->dropAfter = $dropAfter;
    }

    /**
     * @return mixed
     */
    public function getTarp()
    {
        return $this->tarp;
    }

    /**
     * @param mixed $tarp
     */
    public function setTarp($tarp): void
    {
        $this->tarp = $tarp;
    }

    /**
     * @return mixed
     */
    public function getLastUpdateID()
    {
        return $this->lastUpdateID;
    }

    /**
     * @param mixed $lastUpdateID
     */
    public function setLastUpdateID($lastUpdateID): void
    {
        $this->lastUpdateID = $lastUpdateID;
    }

    /**
     * @return mixed
     */
    public function getOwnerOperatorStatus()
    {
        return $this->ownerOperatorStatus;
    }

    /**
     * @param mixed $ownerOperatorStatus
     */
    public function setOwnerOperatorStatus($ownerOperatorStatus): void
    {
        $this->ownerOperatorStatus = $ownerOperatorStatus;
    }

    /**
     * @return mixed
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param mixed $companyId
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;
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
    public function getDriverEmail()
    {
        return $this->driverEmail;
    }

    /**
     * @param mixed $driverEmail
     */
    public function setDriverEmail($driverEmail)
    {
        $this->driverEmail = $driverEmail;
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
    public function getDriverUsername()
    {
        return $this->driverUsername;
    }

    /**
     * @param mixed $driverUsername
     */
    public function setDriverUsername($driverUsername)
    {
        $this->driverUsername = $driverUsername;
    }

    /**
     * @return mixed
     */
    public function getDriverPassword()
    {
        return $this->driverPassword;
    }

    /**
     * @param mixed $driverPassword
     */
    public function setDriverPassword($driverPassword)
    {
        $this->driverPassword = $driverPassword;
    }

    /**
     * @return mixed
     */
    public function getDriverTelephone()
    {
        return $this->driverTelephone;
    }

    /**
     * @param mixed $driverTelephone
     */
    public function setDriverTelephone($driverTelephone)
    {
        $this->driverTelephone = $driverTelephone;
    }

    /**
     * @return mixed
     */
    public function getDriverAlt()
    {
        return $this->driverAlt;
    }

    /**
     * @param mixed $driverAlt
     */
    public function setDriverAlt($driverAlt)
    {
        $this->driverAlt = $driverAlt;
    }

    /**
     * @return mixed
     */
    public function getDriverAddress()
    {
        return $this->driverAddress;
    }

    /**
     * @param mixed $driverAddress
     */
    public function setDriverAddress($driverAddress)
    {
        $this->driverAddress = $driverAddress;
    }

    /**
     * @return mixed
     */
    public function getDriverLocation()
    {
        return $this->driverLocation;
    }

    /**
     * @param mixed $driverLocation
     */
    public function setDriverLocation($driverLocation)
    {
        $this->driverLocation = $driverLocation;
    }

    /**
     * @return mixed
     */
    public function getDriverZip()
    {
        return $this->driverZip;
    }

    /**
     * @param mixed $driverZip
     */
    public function setDriverZip($driverZip)
    {
        $this->driverZip = $driverZip;
    }

    /**
     * @return mixed
     */
    public function getDriverStatus()
    {
        return $this->driverStatus;
    }

    /**
     * @param mixed $driverStatus
     */
    public function setDriverStatus($driverStatus)
    {
        $this->driverStatus = $driverStatus;
    }

    /**
     * @return mixed
     */
    public function getDriverSocial()
    {
        return $this->driverSocial;
    }

    /**
     * @param mixed $driverSocial
     */
    public function setDriverSocial($driverSocial)
    {
        $this->driverSocial = $driverSocial;
    }

    /**
     * @return mixed
     */
    public function getDateOfbirth()
    {
        return $this->dateOfbirth;
    }

    /**
     * @param mixed $dateOfbirth
     */
    public function setDateOfbirth($dateOfbirth)
    {
        $this->dateOfbirth = $dateOfbirth;
    }

    /**
     * @return mixed
     */
    public function getDateOfhire()
    {
        return $this->dateOfhire;
    }

    /**
     * @param mixed $dateOfhire
     */
    public function setDateOfhire($dateOfhire)
    {
        $this->dateOfhire = $dateOfhire;
    }

    /**
     * @return mixed
     */
    public function getDriverLicenseNo()
    {
        return $this->driverLicenseNo;
    }

    /**
     * @param mixed $driverLicenseNo
     */
    public function setDriverLicenseNo($driverLicenseNo)
    {
        $this->driverLicenseNo = $driverLicenseNo;
    }

    /**
     * @return mixed
     */
    public function getDriverLicenseIssue()
    {
        return $this->driverLicenseIssue;
    }

    /**
     * @param mixed $driverLicenseIssue
     */
    public function setDriverLicenseIssue($driverLicenseIssue)
    {
        $this->driverLicenseIssue = $driverLicenseIssue;
    }

    /**
     * @return mixed
     */
    public function getDriverLicenseExp()
    {
        return $this->driverLicenseExp;
    }

    /**
     * @param mixed $driverLicenseExp
     */
    public function setDriverLicenseExp($driverLicenseExp)
    {
        $this->driverLicenseExp = $driverLicenseExp;
    }

    /**
     * @return mixed
     */
    public function getDriverLastMedical()
    {
        return $this->driverLastMedical;
    }

    /**
     * @param mixed $driverLastMedical
     */
    public function setDriverLastMedical($driverLastMedical)
    {
        $this->driverLastMedical = $driverLastMedical;
    }

    /**
     * @return mixed
     */
    public function getDriverNextMedical()
    {
        return $this->driverNextMedical;
    }

    /**
     * @param mixed $driverNextMedical
     */
    public function setDriverNextMedical($driverNextMedical)
    {
        $this->driverNextMedical = $driverNextMedical;
    }

    /**
     * @return mixed
     */
    public function getDriverLastDrugTest()
    {
        return $this->driverLastDrugTest;
    }

    /**
     * @param mixed $driverLastDrugTest
     */
    public function setDriverLastDrugTest($driverLastDrugTest)
    {
        $this->driverLastDrugTest = $driverLastDrugTest;
    }

    /**
     * @return mixed
     */
    public function getDriverNextDrugTest()
    {
        return $this->driverNextDrugTest;
    }

    /**
     * @param mixed $driverNestDrugTest
     */
    public function setDriverNextDrugTest($driverNextDrugTest)
    {
        $this->driverNextDrugTest = $driverNextDrugTest;
    }

    /**
     * @return mixed
     */
    public function getPassportExpiry()
    {
        return $this->passportExpiry;
    }

    /**
     * @param mixed $passportExpiry
     */
    public function setPassportExpiry($passportExpiry)
    {
        $this->passportExpiry = $passportExpiry;
    }

    /**
     * @return mixed
     */
    public function getFastCardExpiry()
    {
        return $this->fastCardExpiry;
    }

    /**
     * @param mixed $fastCardExpiry
     */
    public function setFastCardExpiry($fastCardExpiry)
    {
        $this->fastCardExpiry = $fastCardExpiry;
    }

    /**
     * @return mixed
     */
    public function getHazmatExpiry()
    {
        return $this->hazmatExpiry;
    }

    /**
     * @param mixed $hazmatExpiry
     */
    public function setHazmatExpiry($hazmatExpiry)
    {
        $this->hazmatExpiry = $hazmatExpiry;
    }

    /**
     * @return mixed
     */
    public function getTerminationDate()
    {
        return $this->terminationDate;
    }

    /**
     * @param mixed $terminationDate
     */
    public function setTerminationDate($terminationDate)
    {
        $this->terminationDate = $terminationDate;
    }

    /**
     * @return mixed
     */
    public function getInternalNote()
    {
        return $this->InternalNote;
    }

    /**
     * @param mixed $InternalNote
     */
    public function setInternalNote($InternalNote)
    {
        $this->InternalNote = $InternalNote;
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
    public function setInsertedTime($insertedTime)
    {
        $this->insertedTime = $insertedTime;
    }

    /**
     * @return mixed
     */
    public function getInsertedUserID()
    {
        return $this->insertedUserID;
    }

    /**
     * @param mixed $insertedUserID
     */
    public function setInsertedUserID($insertedUserID)
    {
        $this->insertedUserID = $insertedUserID;
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
    public function getDeleteUserID()
    {
        return $this->deleteUserID;
    }

    /**
     * @param mixed $deleteUserID
     */
    public function setDeleteUserID($deleteUserID)
    {
        $this->deleteUserID = $deleteUserID;
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

    public function getIterator()
    {
        // TODO: Implement getIterator() method.
        return new ArrayIterator(
            array(
                '_id' => $this->id,
                'companyID' => (int)$this->companyId,
                'counter' => 0,
                'driver' => array([
                    '_id' => 0,
                    'counter' => 0,
                    'driverName' => $this->driverName,
                    'driverUsername' => $this->driverUsername,
                    'driverPassword' => $this->driverPassword,
                    'driverTelephone' => $this->driverTelephone,
                    'driverAlt' => $this->driverAlt,
                    'driverEmail' => $this->driverEmail,
                    'driverAddress' => $this->driverAddress,
                    'driverLocation' => $this->driverLocation,
                    'driverZip' => $this->driverZip,
                    'driverStatus' => $this->driverStatus,
                    'driverSocial' => $this->driverSocial,
                    'dateOfbirth' => $this->dateOfbirth,
                    'dateOfhire' => $this->dateOfhire,
                    'driverLicenseNo' => $this->driverLicenseNo,
                    'driverLicenseIssue' => $this->driverLicenseIssue,
                    'driverLicenseExp' => $this->driverLicenseExp,
                    'driverLastMedical' => $this->driverLastMedical,
                    'driverNextMedical' => $this->driverNextMedical,
                    'driverLastDrugTest' => $this->driverLastDrugTest,
                    'driverNextDrugTest' => $this->driverNextDrugTest,
                    'passportExpiry' => $this->passportExpiry,
                    'fastCardExpiry' => $this->fastCardExpiry,
                    'hazmatExpiry' => $this->hazmatExpiry,
                    'rate' => $this->rate,
                    'currency' => (int)$this->currency,
                    'driverLoadedMile' => $this->driverLoadedMile,
                    'driverEmptyMile' => $this->driverEmptyMile,
                    'pickupRate' => $this->pickupRate,
                    'pickupAfter' => $this->pickputAfter,
                    'dropRate' => $this->dropRate,
                    'dropAfter' => $this->dropAfter,
                    'tarp' => $this->tarp,
                    'terminationDate' => $this->terminationDate,
                    'internalNote' => $this->InternalNote,
                    'recurrenceAdd' => $this->recurrenceAdd,
                    'recurrenceSubtract' => $this->recurrenceSubtract,

                    'insertedTime' => time(),
                    'insertedUserId' => $_SESSION['companyName'],
                    'deleteStatus' => 0,
                    'deletedUserId' => 0,
                    'LastUpdateId' => $_SESSION['companyName'],
                    'ownerOperatorStatus' => 0,
                ])
            )
        );
    }

    // insert function
    public function insert($driver, $db, $helper)
    {
        $c_id = $db->driver->find(['companyID' => (int)$driver->getCompanyId()]);
        $count = 0;
        foreach ($c_id as $c) {
            $count++;
        }
        if ($count > 0) {
            $db->driver->updateOne(['companyID' => (int)$this->companyId], ['$push' => ['driver' => [
                '_id' => $helper->getDocumentSequence((int)$this->companyId, $db->driver),
                'counter' => 0,
                'driverName' => $this->driverName,
                'driverUsername' => $this->driverUsername,
                'driverPassword' => $this->driverPassword,
                'driverTelephone' => $this->driverTelephone,
                'driverAlt' => $this->driverAlt,
                'driverEmail' => $this->driverEmail,
                'driverAddress' => $this->driverAddress,
                'driverLocation' => $this->driverLocation,
                'driverZip' => $this->driverZip,
                'driverStatus' => $this->driverStatus,
                'driverSocial' => $this->driverSocial,
                'dateOfbirth' => $this->dateOfbirth,
                'dateOfhire' => $this->dateOfhire,
                'driverLicenseNo' => $this->driverLicenseNo,
                'driverLicenseIssue' => $this->driverLicenseIssue,
                'driverLicenseExp' => $this->driverLicenseExp,
                'driverLastMedical' => $this->driverLastMedical,
                'driverNextMedical' => $this->driverNextMedical,
                'driverLastDrugTest' => $this->driverLastDrugTest,
                'driverNextDrugTest' => $this->driverNextDrugTest,
                'passportExpiry' => $this->passportExpiry,
                'fastCardExpiry' => $this->fastCardExpiry,
                'hazmatExpiry' => $this->hazmatExpiry,
                'rate' => $this->rate,
                'currency' => (int)$this->currency,
                'driverLoadedMile' => $this->driverLoadedMile,
                'driverEmptyMile' => $this->driverEmptyMile,
                'pickupRate' => $this->pickupRate,
                'pickupAfter' => $this->pickputAfter,
                'dropRate' => $this->dropRate,
                'dropAfter' => $this->dropAfter,
                'tarp' => $this->tarp,
                'terminationDate' => $this->terminationDate,
                'internalNote' => $this->InternalNote,
                'recurrenceAdd' => $this->recurrenceAdd,
                'recurrenceSubtract' => $this->recurrenceSubtract,
                'terminationDate' => $this->terminationDate,
                'insertedTime' => time(),
                'insertedUserId' => $_SESSION['companyName'],
                'deleteStatus' => 0,
                'deletedUserId' => 0,
                'LastUpdateId' => $_SESSION['companyName'],
                'ownerOperatorStatus' => 0,
            ]]]);

            $db->currency_add->updateOne(['companyID' => (int)$_SESSION['companyId'], 'currency._id' => (int)$this->currency],
                ['$set' => ['currency.$.counter' => $helper->getDocumentSequenceId((int)$this->currency,$db->currency_add,"currency",(int)$_SESSION['companyId'])]]);

        } else {
            $ship = iterator_to_array($driver);
            $db->driver->insertOne($ship);

            $db->currency_add->updateOne(['companyID' => (int)$_SESSION['companyId'], 'currency._id' => (int)$this->currency],
                ['$set' => ['currency.$.counter' => $helper->getDocumentSequenceId((int)$this->currency,$db->currency_add,"currency",(int)$_SESSION['companyId'])]]);
        }
    }

    //import driver
    public function importExcel($targetPath, $helper)
    {
        require_once('../excel/excel_reader2.php');
        require_once('../excel/SpreadsheetReader.php');
        include '../database/connection.php';   // connection

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());

        for ($i = 0; $i < $sheetCount; $i++) {

            $Reader->ChangeSheet($i);

            $this->setId($helper->getNextSequence("driver", $db));
            $this->companyId = $_SESSION['companyId'];

            foreach ($Reader as $Row) {
                if (isset($Row[0])) {
                    $this->driverName = $Row[0];
                }
                if (isset($Row[1])) {
                    $this->driverUsername = $Row[1];
                }
                if (isset($Row[2])) {
                    $this->driverPassword = $Row[2];
                }
                if (isset($Row[3])) {
                    $this->driverTelephone = $Row[3];
                }
                if (isset($Row[4])) {
                    $this->driverEmail = $Row[4];
                }
                if (isset($Row[5])) {
                    $this->driverAddress = $Row[5];
                }
                if (isset($Row[6])) {
                    $this->driverLocation = $Row[6];
                }
                if (isset($Row[7])) {
                    $this->driverZip = $Row[7];
                }
                if (isset($Row[8])) {
                    $this->driverStatus = $Row[8];
                }
                if (isset($Row[9])) {
                    $this->driverSocial = $Row[9];
                }
                if (isset($Row[10])) {
                    $this->dateOfbirth = $Row[10];
                }
                if (isset($Row[11])) {
                    $this->dateOfhire = $Row[11];
                }
                if (isset($Row[12])) {
                    $this->driverLicenseNo = $Row[12];
                }
                if (isset($Row[13])) {
                    $this->driverLicenseIssue = $Row[13];
                }
                if (isset($Row[14])) {
                    $this->driverLicenseExp = $Row[14];
                }
                if (isset($Row[15])) {
                    $this->driverLastMedical = $Row[15];
                }
                if (isset($Row[16])) {
                    $this->driverNextMedical = $Row[16];
                }
                if (isset($Row[17])) {
                    $this->driverLastDrugTest = $Row[17];
                }
                if (isset($Row[18])) {
                    $this->driverNextDrugTest = $Row[18];
                }
                if (isset($Row[19])) {
                    $this->passportExpiry = $Row[19];
                }
                if (isset($Row[20])) {
                    $this->fastCardExpiry = $Row[20];
                }
                if (isset($Row[21])) {
                    $this->hazmatExpiry = $Row[21];
                }
                if (isset($Row[22])) {
                    $this->driverMile = $Row[22];
                }
                if (isset($Row[23])) {
                    $this->driverFlat = $Row[23];
                }
                if (isset($Row[24])) {
                    $this->driverStop = $Row[24];
                }
                if (isset($Row[25])) {
                    $this->driverTrap = $Row[25];
                }
                if (isset($Row[26])) {
                    $this->driverPercentage = $Row[26];
                }
                if (isset($Row[27])) {
                    $this->terminationDate = $Row[27];
                }
                if (isset($Row[28])) {
                    $this->InternalNote = $Row[28];
                }

                $this->insert($this, $db, $helper);
            }
        }
    }

    // update function
    public function updateDriver($driver, $db)
    {
        $db->driver->updateOne(['companyID' => (int)$_SESSION['companyId'], 'driver._id' => (int)$this->getId()],
            ['$set' => ['driver.$.' . $driver->getColumn() => $driver->getDriverName(),'driver.$.LastUpdateId' => $_SESSION['companyName']]]
        );
    }

    // delete fucntion
    public function deleteDrivers($driver, $db)
    {
        $db->driver->updateOne(['companyID' => (int)$_SESSION['companyId'], 'driver._id' => (int)$this->getId()],
            ['$set' => ['driver.$.deleteStatus' => 1,'driver.$.deletedUserId' => $_SESSION['companyName'],'driver.$.LastUpdateId' => $_SESSION['companyName']]]
        );
    }

    // export function
    public function exportDriver($db)
    {
        $driver = $db->driver->find(['companyID' => $_SESSION['companyId']]);
        foreach ($driver as $driv) {
            $show = $driv['driver'];
            foreach ($show as $s) {
                $p[] = array($s['driverName'], $s['driverUsername'], $s['driverTelephone'], $s['driverAlt'],
                    $s['driverEmail'], $s['driverAddress'], $s['driverLocation'], $s['driverZip'],
                    $s['driverStatus'], $s['driverSocial'], $s['dateOfbirth'], $s['dateOfhire'],
                    $s['driverLicenseNo'], $s['driverLicenseIssue'], $s['driverLicenseExp'], $s['driverLastMedical'],
                    $s['driverNextMedical'], $s['driverLastDrugTest'], $s['driverNextDrugTest'], $s['passportExpiry'],
                    $s['fastCardExpiry'], $s['hazmatExpiry'], $s['driverMile'], $s['driverFlat'],
                    $s['driverStop'], $s['driverTrap'], $s['InternalNote'], $s['driverPercentage']
                );
            }
        }
        echo json_encode($p);
    }

    // driver all update
    public function driverAllUpdate($driver, $db, $helper)
    {
        $db->driver->updateOne(['companyID' => (int)$_SESSION['companyId'], 'driver._id' => (int)$this->getId()],
            ['$set' => ['driver.$.driverName' => $this->driverName,
                        'driver.$.driverUsername' => $this->driverUsername,
                        'driver.$.driverPassword' => $this->driverPassword,
                        'driver.$.driverTelephone' => $this->driverTelephone,
                        'driver.$.driverAlt' => $this->driverAlt,
                        'driver.$.driverEmail' => $this->driverEmail,
                        'driver.$.driverAddress' => $this->driverAddress,
                        'driver.$.driverLocation' => $this->driverLocation,
                        'driver.$.driverZip' => $this->driverZip,
                        'driver.$.driverStatus' => $this->driverStatus,
                        'driver.$.driverSocial' => $this->driverSocial,
                        'driver.$.dateOfbirth' => $this->dateOfbirth,
                        'driver.$.dateOfhire' => $this->dateOfhire,
                        'driver.$.driverLicenseNo' => $this->driverLicenseNo,
                        'driver.$.driverLicenseIssue' => $this->driverLicenseIssue,
                        'driver.$.driverLicenseExp' => $this->driverLicenseExp,
                        'driver.$.driverLastMedical' => $this->driverLastMedical,
                        'driver.$.driverNextMedical' => $this->driverNextMedical,
                        'driver.$.driverLastDrugTest' => $this->driverLastDrugTest,
                        'driver.$.driverNextDrugTest' => $this->driverNextDrugTest,
                        'driver.$.passportExpiry' => $this->passportExpiry,
                        'driver.$.fastCardExpiry' => $this->fastCardExpiry,
                        'driver.$.hazmatExpiry' => $this->hazmatExpiry,
                        'driver.$.rate' => $this->rate,
                        'driver.$.currency' => (int)$this->currency,
                        'driver.$.driverLoadedMile' => $this->driverLoadedMile,
                        'driver.$.driverEmptyMile' => $this->driverEmptyMile,
                        'driver.$.pickupRate' => $this->pickupRate,
                        'driver.$.pickupAfter' => $this->pickputAfter,
                        'driver.$.dropRate' => $this->dropRate,
                        'driver.$.dropAfter' => $this->dropAfter,
                        'driver.$.tarp' => $this->tarp,
                        'driver.$.terminationDate' => $this->terminationDate,
                        'driver.$.internalNote' => $this->InternalNote,
                        'driver.$.recurrenceAdd' => $this->recurrenceAdd,
                        'driver.$.recurrenceSubtract' => $this->recurrenceSubtract,
                        'driver.$.LastUpdateId' => $_SESSION['companyName'],
                ]]
        );
    }
}