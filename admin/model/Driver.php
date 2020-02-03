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
    private $driverMile;
    private $driverFlat;
    private $driverStop;
    private $driverTrap;
    private $driverPercentage;
    private $terminationDate;
    private $InternalNote;
    private $insertedTime;
    private $insertedUserID;
    private $deleteStatus;
    private $deleteUserID;

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
    public function getDriverMile()
    {
        return $this->driverMile;
    }

    /**
     * @param mixed $driverMile
     */
    public function setDriverMile($driverMile)
    {
        $this->driverMile = $driverMile;
    }

    /**
     * @return mixed
     */
    public function getDriverFlat()
    {
        return $this->driverFlat;
    }

    /**
     * @param mixed $driverFlat
     */
    public function setDriverFlat($driverFlat)
    {
        $this->driverFlat = $driverFlat;
    }

    /**
     * @return mixed
     */
    public function getDriverStop()
    {
        return $this->driverStop;
    }

    /**
     * @param mixed $driverStop
     */
    public function setDriverStop($driverStop)
    {
        $this->driverStop = $driverStop;
    }

    /**
     * @return mixed
     */
    public function getDriverTrap()
    {
        return $this->driverTrap;
    }

    /**
     * @param mixed $driverTrap
     */
    public function setDriverTrap($driverTrap)
    {
        $this->driverTrap = $driverTrap;
    }

    /**
     * @return mixed
     */
    public function getDriverPercentage()
    {
        return $this->driverPercentage;
    }

    /**
     * @param mixed $driverPercentage
     */
    public function setDriverPercentage($driverPercentage)
    {
        $this->driverPercentage = $driverPercentage;
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
                    'driverMile' => $this->driverMile,
                    'driverFlat' => $this->driverFlat,
                    'driverStop' => $this->driverStop,
                    'driverTrap' => $this->driverTrap,
                    'InternalNote' => $this->InternalNote,
                    'driverPercentage' => $this->driverPercentage,
                    'insertedTime' => time(),
                    'insertedUserId' => $_SESSION['companyName'],
                    'deleteStatus' => 0
                ])
            )
        );
    }

    // insert function
    public function insert($driver, $db,$helper)
    {
        $c_id = $db->driver->find(['companyID' => (int)$driver->getCompanyId()]);
        $count = 0;
        foreach ($c_id as $c) {
            $count++;
        }
        if ($count > 0) {
            $db->driver->updateOne(['companyID' => (int)$this->companyId], ['$push' => ['driver' => [
                '_id' => $helper->getDocumentSequence((int)$this->companyId, $db->driver),
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
                'driverMile' => $this->driverMile,
                'driverFlat' => $this->driverFlat,
                'driverStop' => $this->driverStop,
                'driverTrap' => $this->driverTrap,
                'InternalNote' => $this->InternalNote,
                'driverPercentage' => $this->driverPercentage,
                'insertedTime' => time(),
                'insertedUserId' => $_SESSION['companyName'],
                'deleteStatus' => 0
            ]]]);
        } else {
            $ship = iterator_to_array($driver);
            $db->driver->insertOne($ship);
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

                $this->insert($this, $db,$helper);
            }
        }
    }

    // update function
    public function updateDriver($driver, $db)
    {
        $db->driver->updateOne(['companyID' => (int)$_SESSION['companyId'], 'driver._id' => (int)$this->getId()],
            ['$set' => ['driver.$.' . $driver->getColumn() => $driver->getDriverName()]]
        );
    }

    // delete fucntion
    public function deleteDrivers($driver, $db)
    {
        $db->driver->updateOne(['companyID' => (int)$_SESSION['companyId'], 'driver._id' => (int)$this->getId()],
            ['$set' => ['driver.$.deleteStatus' => 1]]
        );
    }

    // export function
    public function exportDriver($db)
    {
        $driver = $db->driver->find(['companyID' => $_SESSION['companyId']]);
        foreach ($driver as $driv) {
            $show = $driv['driver'];
            foreach ($show as $s) {
                $p[] = array($s['driverName'],$s['driverUsername'],$s['driverTelephone'], $s['driverAlt'],
                        $s['driverEmail'],$s['driverAddress'],$s['driverLocation'],$s['driverZip'],
                        $s['driverStatus'],$s['driverSocial'],$s['dateOfbirth'],$s['dateOfhire'],
                        $s['driverLicenseNo'],$s['driverLicenseIssue'],$s['driverLicenseExp'],$s['driverLastMedical'],
                        $s['driverNextMedical'],$s['driverLastDrugTest'],$s['driverNextDrugTest'],$s['passportExpiry'],
                        $s['fastCardExpiry'],$s['hazmatExpiry'],$s['driverMile'],$s['driverFlat'],
                        $s['driverStop'],$s['driverTrap'],$s['InternalNote'],$s['driverPercentage']
                );
            }
        }

        echo json_encode($p);
    }


}