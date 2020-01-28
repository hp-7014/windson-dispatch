<?php
@session_start();
/**
 * Created by PhpStorm.
 * User: BOND
 * Date: 1/22/2020
 * Time: 11:22 PM
 */

class Shipper implements IteratorAggregate
{
    private $id;
    private $companyID;
    private $shipperName;
    private $shipperAddress;
    private $shipperLocation;
    private $shipperPostal;
    private $shipperContact;
    private $shipperEmail;
    private $shipperTelephone;
    private $shipperExt;
    private $shipperTollFree;
    private $shipperFax;
    private $shipperShippingHours;
    private $shipperAppointments;
    private $shipperIntersaction;
    private $shipperStatus;
    private $shippingNotes;
    private $internalNotes;
    private $shipperASconsignee;
    private $insertTime;
    private $insertUserName;
    private $deleteStatus;
    private $deleteUserName;
    private $Column;

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
    public function getShipperName()
    {
        return $this->shipperName;
    }

    /**
     * @param mixed $shipperName
     */
    public function setShipperName($shipperName)
    {
        $this->shipperName = $shipperName;
    }

    /**
     * @return mixed
     */
    public function getShipperAddress()
    {
        return $this->shipperAddress;
    }

    /**
     * @param mixed $shipperAddress
     */
    public function setShipperAddress($shipperAddress)
    {
        $this->shipperAddress = $shipperAddress;
    }

    /**
     * @return mixed
     */
    public function getShipperLocation()
    {
        return $this->shipperLocation;
    }

    /**
     * @param mixed $shipperLocation
     */
    public function setShipperLocation($shipperLocation)
    {
        $this->shipperLocation = $shipperLocation;
    }

    /**
     * @return mixed
     */
    public function getShipperPostal()
    {
        return $this->shipperPostal;
    }

    /**
     * @param mixed $shipperPostal
     */
    public function setShipperPostal($shipperPostal)
    {
        $this->shipperPostal = $shipperPostal;
    }

    /**
     * @return mixed
     */
    public function getShipperContact()
    {
        return $this->shipperContact;
    }

    /**
     * @param mixed $shipperContact
     */
    public function setShipperContact($shipperContact)
    {
        $this->shipperContact = $shipperContact;
    }

    /**
     * @return mixed
     */
    public function getShipperEmail()
    {
        return $this->shipperEmail;
    }

    /**
     * @param mixed $shipperEmail
     */
    public function setShipperEmail($shipperEmail)
    {
        $this->shipperEmail = $shipperEmail;
    }

    /**
     * @return mixed
     */
    public function getShipperTelephone()
    {
        return $this->shipperTelephone;
    }

    /**
     * @param mixed $shipperTelephone
     */
    public function setShipperTelephone($shipperTelephone)
    {
        $this->shipperTelephone = $shipperTelephone;
    }

    /**
     * @return mixed
     */
    public function getShipperExt()
    {
        return $this->shipperExt;
    }

    /**
     * @param mixed $shipperExt
     */
    public function setShipperExt($shipperExt)
    {
        $this->shipperExt = $shipperExt;
    }

    /**
     * @return mixed
     */
    public function getShipperTollFree()
    {
        return $this->shipperTollFree;
    }

    /**
     * @param mixed $shipperTollFree
     */
    public function setShipperTollFree($shipperTollFree)
    {
        $this->shipperTollFree = $shipperTollFree;
    }

    /**
     * @return mixed
     */
    public function getShipperFax()
    {
        return $this->shipperFax;
    }

    /**
     * @param mixed $shipperFax
     */
    public function setShipperFax($shipperFax)
    {
        $this->shipperFax = $shipperFax;
    }

    /**
     * @return mixed
     */
    public function getShipperShippingHours()
    {
        return $this->shipperShippingHours;
    }

    /**
     * @param mixed $shipperShippingHours
     */
    public function setShipperShippingHours($shipperShippingHours)
    {
        $this->shipperShippingHours = $shipperShippingHours;
    }

    /**
     * @return mixed
     */
    public function getShipperAppointments()
    {
        return $this->shipperAppointments;
    }

    /**
     * @param mixed $shipperAppointments
     */
    public function setShipperAppointments($shipperAppointments)
    {
        $this->shipperAppointments = $shipperAppointments;
    }

    /**
     * @return mixed
     */
    public function getShipperIntersaction()
    {
        return $this->shipperIntersaction;
    }

    /**
     * @param mixed $shipperIntersaction
     */
    public function setShipperIntersaction($shipperIntersaction)
    {
        $this->shipperIntersaction = $shipperIntersaction;
    }

    /**
     * @return mixed
     */
    public function getShipperStatus()
    {
        return $this->shipperStatus;
    }

    /**
     * @param mixed $shipperStatus
     */
    public function setShipperStatus($shipperStatus)
    {
        $this->shipperStatus = $shipperStatus;
    }

    /**
     * @return mixed
     */
    public function getShippingNotes()
    {
        return $this->shippingNotes;
    }

    /**
     * @param mixed $shippingNotes
     */
    public function setShippingNotes($shippingNotes)
    {
        $this->shippingNotes = $shippingNotes;
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
    public function getShipperASconsignee()
    {
        return $this->shipperASconsignee;
    }

    /**
     * @param mixed $shipperASconsignee
     */
    public function setShipperASconsignee($shipperASconsignee)
    {
        $this->shipperASconsignee = $shipperASconsignee;
    }

    public function getIterator()
    {
        // TODO: Implement getIterator() method.
        return new ArrayIterator(
            array(
                '_id' => $this->id,
                'companyID' => (int)$this->companyID,
                'counter' => 0,
                'shipper' => array([
                    '_id' => 0,
                    'shipperName' => $this->shipperName,
                    'shipperAddress' => $this->shipperAddress,
                    'shipperLocation' => $this->shipperLocation,
                    'shipperPostal' => $this->shipperPostal,
                    'shipperContact' => $this->shipperContact,
                    'shipperEmail' => $this->shipperEmail,
                    'shipperTelephone' => $this->shipperTelephone,
                    'shipperExt' => $this->shipperExt,
                    'shipperTollFree' => $this->shipperTollFree,
                    'shipperFax' => $this->shipperFax,
                    'shipperShippingHours' => $this->shipperShippingHours,
                    'shipperAppointments' => $this->shipperAppointments,
                    'shipperIntersaction' => $this->shipperIntersaction,
                    'shipperStatus' => $this->shipperStatus,
                    'shippingNotes' => $this->shippingNotes,
                    'internalNotes' => $this->internalNotes,
                    'insertedTime' => time(),
                    'insertedUserId' => $_SESSION['companyName'],
                    'deleteStatus' => 0
                ])
            )
        );
    }

    public function insert($shipper, $db,$helper)
    {
        $c_id = $db->shipper->find(['companyID' => (int)$shipper->getCompanyID()]);
        $count = 0;
        foreach ($c_id as $c) {
            $count++;
        }
        if ($count > 0) {
            $db->shipper->updateOne(['companyID' => (int)$this->companyID], ['$push' => ['shipper' => [
                '_id' => $helper->getDocumentSequence((int)$this->companyID, $db->shipper),
                'shipperName' => $this->shipperName,
                'shipperAddress' => $this->shipperAddress,
                'shipperLocation' => $this->shipperLocation,
                'shipperPostal' => $this->shipperPostal,
                'shipperContact' => $this->shipperContact,
                'shipperEmail' => $this->shipperEmail,
                'shipperTelephone' => $this->shipperTelephone,
                'shipperExt' => $this->shipperExt,
                'shipperTollFree' => $this->shipperTollFree,
                'shipperFax' => $this->shipperFax,
                'shipperShippingHours' => $this->shipperShippingHours,
                'shipperAppointments' => $this->shipperAppointments,
                'shipperIntersaction' => $this->shipperIntersaction,
                'shipperStatus' => $this->shipperStatus,
                'shippingNotes' => $this->shippingNotes,
                'internalNotes' => $this->internalNotes,
                'insertedTime' => time(),
                'insertedUserId' => $_SESSION['companyName'],
                'deleteStatus' => 0
            ]]]);
        } else {
            $ship = iterator_to_array($shipper);
            $db->shipper->insertOne($ship);
        }
    }

    public function importExcel($targetPath, $helper)
    {
        require_once('../excel/excel_reader2.php');
        require_once('../excel/SpreadsheetReader.php');
        include '../database/connection.php';   // connection

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());

        for ($i = 0; $i < $sheetCount; $i++) {

            $Reader->ChangeSheet($i);

            $this->setId($helper->getNextSequence("shipper", $db));
            $this->companyID = $_SESSION['companyId'];

            foreach ($Reader as $Row) {
                if (isset($Row[0])) {
                    $this->shipperName = $Row[0];
                }
                if (isset($Row[1])) {
                    $this->shipperAddress = $Row[1];
                }
                if (isset($Row[2])) {
                    $this->shipperLocation = $Row[2];
                }
                if (isset($Row[3])) {
                    $this->shipperPostal = $Row[3];
                }
                if (isset($Row[4])) {
                    $this->shipperContact = $Row[4];
                }
                if (isset($Row[5])) {
                    $this->shipperEmail = $Row[5];
                }
                if (isset($Row[6])) {
                    $this->shipperTelephone = $Row[6];
                }
                if (isset($Row[7])) {
                    $this->shipperExt = $Row[7];
                }
                if (isset($Row[8])) {
                    $this->shipperTollFree = $Row[8];
                }
                if (isset($Row[9])) {
                    $this->shipperFax = $Row[9];
                }
                if (isset($Row[10])) {
                    $this->shipperShippingHours = $Row[10];
                }
                if (isset($Row[11])) {
                    $this->shipperAppointments = $Row[11];
                }
                if (isset($Row[12])) {
                    $this->shipperIntersaction = $Row[12];
                }
                if (isset($Row[13])) {
                    $this->shipperStatus = $Row[13];
                }
                if (isset($Row[14])) {
                    $this->shippingNotes = $Row[14];
                }
                if (isset($Row[15])) {
                    $this->internalNotes = $Row[15];
                }
                $this->insert($this, $db,$helper);
            }
        }
    }

    public function exportShipper($db)
    {
        $shipper = $db->shipper->find(['companyID' => $_SESSION['companyId']]);
        foreach ($shipper as $ship) {
            $show = $ship['shipper'];
            foreach ($show as $s) {
                $p[] = array($s['shipperName'],$s['shipperAddress'],$s['shipperLocation'],$s['shipperPostal'],
                            $s['shipperContact'],$s['shipperEmail'],$s['shipperTelephone'],$s['shipperExt'],
                            $s['shipperTollFree'],$s['shipperFax'],$s['shipperShippingHours'],$s['shipperAppointments'],
                            $s['shipperIntersaction'],$s['shipperStatus'],$s['shippingNotes'],$s['internalNotes']
                );
            }
        }
        echo json_encode($p);
    }

    // update function
    public function updateShipper($shipper, $db)
    {
        $db->shipper->updateOne(['companyID' => (int)$_SESSION['companyId'], 'shipper._id' => (int)$this->getId()],
            ['$set' => ['shipper.$.' . $shipper->getColumn() => $shipper->getShipperName()]]
        );
    }

    // delete fucntion
    public function deleteShipper($shipper, $db)
    {
        $db->shipper->updateOne(['companyID' => (int)$_SESSION['companyId'], 'shipper._id' => (int)$this->getId()],
            ['$set' => ['shipper.$.deleteStatus' => 1]]
        );
    }

}