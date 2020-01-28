<?php
@session_start();

/**
 * Created by PhpStorm.
 * User: BOND
 * Date: 1/22/2020
 * Time: 11:22 PM
 */
class User implements IteratorAggregate
{
    private $id;
    private $companyID;
    private $userEmail;
    private $userName;
    private $userPass;
    private $userFirstName;
    private $userLastName;
    private $userAddress;
    private $userLocation;
    private $userZip;
    private $userTelephone;
    private $userExt;
    private $TollFree;
    private $userFax;
    private $addBank;
    private $addCustomer;
    private $addCompany;
    private $addShipper;
    private $currency;
    private $addConsignee;
    private $paymentTerms;
    private $addDriver;
    private $office;
    private $addTruck;
    private $equipmentType;
    private $addTrailer;
    private $truckType;
    private $addExternalCarrier;
    private $trailerType;
    private $factoringCompany;
    private $statusType;
    private $customsBroker;
    private $loadType;
    private $ownerOperator;
    private $fixPayCategory;
    private $insertTime;
    private $insertUserName;
    private $deleteStatus;
    private $deleteUserName;
    private $Column;

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
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * @param mixed $userEmail
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        return $this->userName;
    }

    /**
     * @param mixed $userName
     */
    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    /**
     * @return mixed
     */
    public function getUserPass()
    {
        return $this->userPass;
    }

    /**
     * @param mixed $userPass
     */
    public function setUserPass($userPass)
    {
        $this->userPass = $userPass;
    }

    /**
     * @return mixed
     */
    public function getUserFirstName()
    {
        return $this->userFirstName;
    }

    /**
     * @param mixed $userFirstName
     */
    public function setUserFirstName($userFirstName)
    {
        $this->userFirstName = $userFirstName;
    }

    /**
     * @return mixed
     */
    public function getUserLastName()
    {
        return $this->userLastName;
    }

    /**
     * @param mixed $userLastName
     */
    public function setUserLastName($userLastName)
    {
        $this->userLastName = $userLastName;
    }

    /**
     * @return mixed
     */
    public function getUserAddress()
    {
        return $this->userAddress;
    }

    /**
     * @param mixed $userAddress
     */
    public function setUserAddress($userAddress)
    {
        $this->userAddress = $userAddress;
    }

    /**
     * @return mixed
     */
    public function getUserLocation()
    {
        return $this->userLocation;
    }

    /**
     * @param mixed $userLocation
     */
    public function setUserLocation($userLocation)
    {
        $this->userLocation = $userLocation;
    }

    /**
     * @return mixed
     */
    public function getUserZip()
    {
        return $this->userZip;
    }

    /**
     * @param mixed $userZip
     */
    public function setUserZip($userZip)
    {
        $this->userZip = $userZip;
    }

    /**
     * @return mixed
     */
    public function getUserTelephone()
    {
        return $this->userTelephone;
    }

    /**
     * @param mixed $userTelephone
     */
    public function setUserTelephone($userTelephone)
    {
        $this->userTelephone = $userTelephone;
    }

    /**
     * @return mixed
     */
    public function getUserExt()
    {
        return $this->userExt;
    }

    /**
     * @param mixed $userExt
     */
    public function setUserExt($userExt)
    {
        $this->userExt = $userExt;
    }

    /**
     * @return mixed
     */
    public function getUerTollFree()
    {
        return $this->TollFree;
    }

    /**
     * @param mixed $uerTollFree
     */
    public function setUerTollFree($TollFree)
    {
        $this->uerTollFree = $TollFree;
    }

    /**
     * @return mixed
     */
    public function getUserFax()
    {
        return $this->userFax;
    }

    /**
     * @param mixed $userFax
     */
    public function setUserFax($userFax)
    {
        $this->userFax = $userFax;
    }

    /**
     * @return mixed
     */
    public function getAddBank()
    {
        return $this->addBank;
    }

    /**
     * @param mixed $addBank
     */
    public function setAddBank($addBank)
    {
        $this->addBank = $addBank;
    }

    /**
     * @return mixed
     */
    public function getAddCustomer()
    {
        return $this->addCustomer;
    }

    /**
     * @param mixed $addCustomer
     */
    public function setAddCustomer($addCustomer)
    {
        $this->addCustomer = $addCustomer;
    }

    /**
     * @return mixed
     */
    public function getAddCompany()
    {
        return $this->addCompany;
    }

    /**
     * @param mixed $addCompany
     */
    public function setAddCompany($addCompany)
    {
        $this->addCompany = $addCompany;
    }

    /**
     * @return mixed
     */
    public function getAddShipper()
    {
        return $this->addShipper;
    }

    /**
     * @param mixed $addShipper
     */
    public function setAddShipper($addShipper)
    {
        $this->addShipper = $addShipper;
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
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getAddConsignee()
    {
        return $this->addConsignee;
    }

    /**
     * @param mixed $addConsignee
     */
    public function setAddConsignee($addConsignee)
    {
        $this->addConsignee = $addConsignee;
    }

    /**
     * @return mixed
     */
    public function getPaymentTerms()
    {
        return $this->paymentTerms;
    }

    /**
     * @param mixed $paymentTerms
     */
    public function setPaymentTerms($paymentTerms)
    {
        $this->paymentTerms = $paymentTerms;
    }

    /**
     * @return mixed
     */
    public function getAddDriver()
    {
        return $this->addDriver;
    }

    /**
     * @param mixed $addDriver
     */
    public function setAddDriver($addDriver)
    {
        $this->addDriver = $addDriver;
    }

    /**
     * @return mixed
     */
    public function getOffice()
    {
        return $this->office;
    }

    /**
     * @param mixed $office
     */
    public function setOffice($office)
    {
        $this->office = $office;
    }

    /**
     * @return mixed
     */
    public function getAddTruck()
    {
        return $this->addTruck;
    }

    /**
     * @param mixed $addTruck
     */
    public function setAddTruck($addTruck)
    {
        $this->addTruck = $addTruck;
    }

    /**
     * @return mixed
     */
    public function getEquipmentType()
    {
        return $this->equipmentType;
    }

    /**
     * @param mixed $equipmentType
     */
    public function setEquipmentType($equipmentType)
    {
        $this->equipmentType = $equipmentType;
    }

    /**
     * @return mixed
     */
    public function getAddTrailer()
    {
        return $this->addTrailer;
    }

    /**
     * @param mixed $addTrailer
     */
    public function setAddTrailer($addTrailer)
    {
        $this->addTrailer = $addTrailer;
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
    public function getAddExternalCarrier()
    {
        return $this->addExternalCarrier;
    }

    /**
     * @param mixed $addExternalCarrier
     */
    public function setAddExternalCarrier($addExternalCarrier)
    {
        $this->addExternalCarrier = $addExternalCarrier;
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
    public function getFactoringCompany()
    {
        return $this->factoringCompany;
    }

    /**
     * @param mixed $factoringCompany
     */
    public function setFactoringCompany($factoringCompany)
    {
        $this->factoringCompany = $factoringCompany;
    }

    /**
     * @return mixed
     */
    public function getStatusType()
    {
        return $this->statusType;
    }

    /**
     * @param mixed $statusType
     */
    public function setStatusType($statusType)
    {
        $this->statusType = $statusType;
    }

    /**
     * @return mixed
     */
    public function getCustomsBroker()
    {
        return $this->customsBroker;
    }

    /**
     * @param mixed $customsBroker
     */
    public function setCustomsBroker($customsBroker)
    {
        $this->customsBroker = $customsBroker;
    }

    /**
     * @return mixed
     */
    public function getLoadType()
    {
        return $this->loadType;
    }

    /**
     * @param mixed $loadType
     */
    public function setLoadType($loadType)
    {
        $this->loadType = $loadType;
    }

    /**
     * @return mixed
     */
    public function getOwnerOperator()
    {
        return $this->ownerOperator;
    }

    /**
     * @param mixed $ownerOperator
     */
    public function setOwnerOperator($ownerOperator)
    {
        $this->ownerOperator = $ownerOperator;
    }

    /**
     * @return mixed
     */
    public function getFixPayCategory()
    {
        return $this->fixPayCategory;
    }

    /**
     * @param mixed $fixPayCategory
     */
    public function setFixPayCategory($fixPayCategory)
    {
        $this->fixPayCategory = $fixPayCategory;
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
                'companyID' => (int)$this->companyID,
                'counter' => 0,
                'user' => array([
                    '_id' => 0,
                    'userEmail' => $this->userEmail,
                    'userName' => $this->userName,
                    'userPass' => $this->userPass,
                    'userFirstName' => $this->userFirstName,
                    'userLastName' => $this->userLastName,
                    'userAddress' => $this->userAddress,
                    'userLocation' => $this->userLocation,
                    'userZip' => $this->userZip,
                    'userTelephone' => $this->userTelephone,
                    'userExt' => $this->userExt,
                    'TollFree' => $this->TollFree,
                    'userFax' => $this->userFax,
                    'addBank' => $this->addBank,
                    'addCustomer' => $this->addCustomer,
                    'addCompany' => $this->addCompany,
                    'addShipper' => $this->addShipper,
                    'currency' => $this->currency,
                    'addConsignee' => $this->addConsignee,
                    'paymentTerms' => $this->paymentTerms,
                    'addDriver' => $this->addDriver,
                    'office' => $this->office,
                    'addTruck' => $this->addTruck,
                    'equipmentType' => $this->equipmentType,
                    'addTrailer' => $this->addTrailer,
                    'truckType' => $this->truckType,
                    'addExternalCarrier' => $this->addExternalCarrier,
                    'trailerType' => $this->trailerType,
                    'factoringCompany' => $this->factoringCompany,
                    'statusType' => $this->statusType,
                    'customsBroker' => $this->customsBroker,
                    'loadType' => $this->loadType,
                    'ownerOperator' => $this->ownerOperator,
                    'fixPayCategory' => $this->fixPayCategory,
                    'insertedTime' => time(),
                    'insertedUserId' => $_SESSION['companyName'],
                    'deleteStatus' => 0
                ])
            )
        );
    }

    public function insert($user, $db, $helper)
    {
        $c_id = $db->user->find(['companyID' => (int)$user->getCompanyID()]);
        $count = 0;
        foreach ($c_id as $c) {
            $count++;
        }
        if ($count > 0) {
            $db->user->updateOne(['companyID' => (int)$this->companyID], ['$push' => ['user' => [
                '_id' => $helper->getDocumentSequence((int)$this->companyID, $db->user),
                'userEmail' => $this->userEmail,
                'userName' => $this->userName,
                'userPass' => $this->userPass,
                'userFirstName' => $this->userFirstName,
                'userLastName' => $this->userLastName,
                'userAddress' => $this->userAddress,
                'userLocation' => $this->userLocation,
                'userZip' => $this->userZip,
                'userTelephone' => $this->userTelephone,
                'userExt' => $this->userExt,
                'TollFree' => $this->TollFree,
                'userFax' => $this->userFax,
                'addBank' => $this->addBank,
                'addCustomer' => $this->addCustomer,
                'addCompany' => $this->addCompany,
                'addShipper' => $this->addShipper,
                'currency' => $this->currency,
                'addConsignee' => $this->addConsignee,
                'paymentTerms' => $this->paymentTerms,
                'addDriver' => $this->addDriver,
                'office' => $this->office,
                'addTruck' => $this->addTruck,
                'equipmentType' => $this->equipmentType,
                'addTrailer' => $this->addTrailer,
                'truckType' => $this->truckType,
                'addExternalCarrier' => $this->addExternalCarrier,
                'trailerType' => $this->trailerType,
                'factoringCompany' => $this->factoringCompany,
                'statusType' => $this->statusType,
                'customsBroker' => $this->customsBroker,
                'loadType' => $this->loadType,
                'ownerOperator' => $this->ownerOperator,
                'fixPayCategory' => $this->fixPayCategory,
                'insertedTime' => time(),
                'insertedUserId' => $_SESSION['companyName'],
                'deleteStatus' => 0
            ]]]);
        } else {
            $ship = iterator_to_array($user);
            $db->user->insertOne($ship);
        }
    }

    // import user
    public function importExcel($targetPath, $helper)
    {
        require_once('../excel/excel_reader2.php');
        require_once('../excel/SpreadsheetReader.php');
        include '../database/connection.php';   // connection

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());

        for ($i = 0; $i < $sheetCount; $i++) {

            $Reader->ChangeSheet($i);

            $this->setId($helper->getNextSequence("user", $db));
            $this->companyID = $_SESSION['companyId'];

            foreach ($Reader as $Row) {
                if (isset($Row[0])) {
                    $this->userEmail = $Row[0];
                }
                if (isset($Row[1])) {
                    $this->userName = $Row[1];
                }
                if (isset($Row[2])) {
                    $this->userPass = $Row[2];
                }
                if (isset($Row[3])) {
                    $this->userFirstName = $Row[3];
                }
                if (isset($Row[4])) {
                    $this->userLastName = $Row[4];
                }
                if (isset($Row[5])) {
                    $this->userAddress = $Row[5];
                }
                if (isset($Row[6])) {
                    $this->userLocation = $Row[6];
                }
                if (isset($Row[7])) {
                    $this->userZip = $Row[7];
                }
                if (isset($Row[8])) {
                    $this->userTelephone = $Row[8];
                }
                if (isset($Row[9])) {
                    $this->userExt = $Row[9];
                }
                if (isset($Row[10])) {
                    $this->TollFree = $Row[10];
                }
                if (isset($Row[11])) {
                    $this->userFax = $Row[11];
                }
                $this->insert($this, $db,$helper);
            }
        }
    }

    //export user
    public function exportUser($db)
    {
        $user = $db->user->find(['companyID' => $_SESSION['companyId']]);
        foreach ($user as $ship) {
            $show = $ship['user'];
            foreach ($show as $s) {
                $p[] = array($s['userEmail'],$s['userName'],$s['userPass'],$s['userFirstName'],
                    $s['userLastName'],$s['userAddress'],$s['userLocation'],$s['userZip'],
                    $s['userTelephone'],$s['userExt'],$s['TollFree'],$s['userFax']
                );
            }
        }
        echo json_encode($p);
    }

    // update function
    public function updateUser($user, $db)
    {
        $db->user->updateOne(['companyID' => (int)$_SESSION['companyId'], 'user._id' => (int)$this->getId()],
            ['$set' => ['user.$.' . $user->getColumn() => $user->getUserEmail()]]
        );
    }

    // delete fucntion
    public function deleteUser($user, $db)
    {
        $db->user->updateOne(['companyID' => (int)$_SESSION['companyId'], 'user._id' => (int)$this->getId()],
            ['$set' => ['user.$.deleteStatus' => 1]]
        );
    }

    // update Privilege
    public function updatePrivilege($user, $db)
    {
        $db->user->updateOne(['companyID' => (int)$_SESSION['companyId'], 'user._id' => (int)$this->getId()],
            ['$set' => [
                'user.$.addBank' => $this->addBank,
                'user.$.addCustomer' => $this->addCustomer,
                'user.$.addCompany' => $this->addCompany,
                'user.$.addShipper' => $this->addShipper,
                'user.$.currency' => $this->currency,
                'user.$.addConsignee' => $this->addConsignee,
                'user.$.paymentTerms' => $this->paymentTerms,
                'user.$.addDriver' => $this->addDriver,
                'user.$.office' => $this->office,
                'user.$.addTruck' => $this->addTruck,
                'user.$.equipmentType' => $this->equipmentType,
                'user.$.addTrailer' => $this->addTrailer,
                'user.$.truckType' => $this->truckType,
                'user.$.addExternalCarrier' => $this->addExternalCarrier,
                'user.$.trailerType' => $this->trailerType,
                'user.$.factoringCompany' => $this->factoringCompany,
                'user.$.statusType' => $this->statusType,
                'user.$.customsBroker' => $this->customsBroker,
                'user.$.loadType' => $this->loadType,
                'user.$.ownerOperator' => $this->ownerOperator,
                'user.$.fixPayCategory' => $this->fixPayCategory
            ]]
        );
    }

}