<?php
@session_start();
/**
 * Created by PhpStorm.
 * User: BOND
 * Date: 1/23/2020
 * Time: 5:10 PM
 */

class Consignee implements IteratorAggregate
{
    private $id;
    private $companyID;
    private $consigneeName;
    private $consigneeAddress;
    private $consigneeLocation;
    private $consigneePostal;
    private $consigneeContact;
    private $consigneeEmail;
    private $consigneeTelephone;
    private $consigneeExt;
    private $consigneeTollFree;
    private $consigneeFax;
    private $consigneeReceiving;
    private $consigneeAppointments;
    private $consigneeIntersaction;
    private $consigneeStatus;
    private $consigneeRecivingNote;
    private $consigneeInternalNote;
    private $insertedTime;
    private $insertedUserId;
    private $deleteStatus;
    private $deletedUserId;
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
    public function getInsertedUserId()
    {
        return $this->insertedUserId;
    }

    /**
     * @param mixed $insertedUserId
     */
    public function setInsertedUserId($insertedUserId)
    {
        $this->insertedUserId = $insertedUserId;
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
    public function getDeletedUserId()
    {
        return $this->deletedUserId;
    }

    /**
     * @param mixed $deletedUserId
     */
    public function setDeletedUserId($deletedUserId)
    {
        $this->deletedUserId = $deletedUserId;
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
    public function getConsigneeName()
    {
        return $this->consigneeName;
    }

    /**
     * @param mixed $consigneeName
     */
    public function setConsigneeName($consigneeName)
    {
        $this->consigneeName = $consigneeName;
    }

    /**
     * @return mixed
     */
    public function getConsigneeAddress()
    {
        return $this->consigneeAddress;
    }

    /**
     * @param mixed $consigneeAddress
     */
    public function setConsigneeAddress($consigneeAddress)
    {
        $this->consigneeAddress = $consigneeAddress;
    }

    /**
     * @return mixed
     */
    public function getConsigneeLocation()
    {
        return $this->consigneeLocation;
    }

    /**
     * @param mixed $consigneeLocation
     */
    public function setConsigneeLocation($consigneeLocation)
    {
        $this->consigneeLocation = $consigneeLocation;
    }

    /**
     * @return mixed
     */
    public function getConsigneePostal()
    {
        return $this->consigneePostal;
    }

    /**
     * @param mixed $consigneePostal
     */
    public function setConsigneePostal($consigneePostal)
    {
        $this->consigneePostal = $consigneePostal;
    }

    /**
     * @return mixed
     */
    public function getConsigneeContact()
    {
        return $this->consigneeContact;
    }

    /**
     * @param mixed $consigneeContact
     */
    public function setConsigneeContact($consigneeContact)
    {
        $this->consigneeContact = $consigneeContact;
    }

    /**
     * @return mixed
     */
    public function getConsigneeEmail()
    {
        return $this->consigneeEmail;
    }

    /**
     * @param mixed $consigneeEmail
     */
    public function setConsigneeEmail($consigneeEmail)
    {
        $this->consigneeEmail = $consigneeEmail;
    }

    /**
     * @return mixed
     */
    public function getConsigneeTelephone()
    {
        return $this->consigneeTelephone;
    }

    /**
     * @param mixed $consigneeTelephone
     */
    public function setConsigneeTelephone($consigneeTelephone)
    {
        $this->consigneeTelephone = $consigneeTelephone;
    }

    /**
     * @return mixed
     */
    public function getConsigneeExt()
    {
        return $this->consigneeExt;
    }

    /**
     * @param mixed $consigneeExt
     */
    public function setConsigneeExt($consigneeExt)
    {
        $this->consigneeExt = $consigneeExt;
    }

    /**
     * @return mixed
     */
    public function getConsigneeTollFree()
    {
        return $this->consigneeTollFree;
    }

    /**
     * @param mixed $consigneeTollFree
     */
    public function setConsigneeTollFree($consigneeTollFree)
    {
        $this->consigneeTollFree = $consigneeTollFree;
    }

    /**
     * @return mixed
     */
    public function getConsigneeFax()
    {
        return $this->consigneeFax;
    }

    /**
     * @param mixed $consigneeFax
     */
    public function setConsigneeFax($consigneeFax)
    {
        $this->consigneeFax = $consigneeFax;
    }

    /**
     * @return mixed
     */
    public function getConsigneeReceiving()
    {
        return $this->consigneeReceiving;
    }

    /**
     * @param mixed $consigneeReceiving
     */
    public function setConsigneeReceiving($consigneeReceiving)
    {
        $this->consigneeReceiving = $consigneeReceiving;
    }

    /**
     * @return mixed
     */
    public function getConsigneeAppointments()
    {
        return $this->consigneeAppointments;
    }

    /**
     * @param mixed $consigneeAppointments
     */
    public function setConsigneeAppointments($consigneeAppointments)
    {
        $this->consigneeAppointments = $consigneeAppointments;
    }

    /**
     * @return mixed
     */
    public function getConsigneeIntersaction()
    {
        return $this->consigneeIntersaction;
    }

    /**
     * @param mixed $consigneeIntersaction
     */
    public function setConsigneeIntersaction($consigneeIntersaction)
    {
        $this->consigneeIntersaction = $consigneeIntersaction;
    }

    /**
     * @return mixed
     */
    public function getConsigneeStatus()
    {
        return $this->consigneeStatus;
    }

    /**
     * @param mixed $consigneeStatus
     */
    public function setConsigneeStatus($consigneeStatus)
    {
        $this->consigneeStatus = $consigneeStatus;
    }

    /**
     * @return mixed
     */
    public function getConsigneeRecivingNote()
    {
        return $this->consigneeRecivingNote;
    }

    /**
     * @param mixed $consigneeRecivingNote
     */
    public function setConsigneeRecivingNote($consigneeRecivingNote)
    {
        $this->consigneeRecivingNote = $consigneeRecivingNote;
    }

    /**
     * @return mixed
     */
    public function getConsigneeInternalNote()
    {
        return $this->consigneeInternalNote;
    }

    /**
     * @param mixed $consigneeInternalNote
     */
    public function setConsigneeInternalNote($consigneeInternalNote)
    {
        $this->consigneeInternalNote = $consigneeInternalNote;
    }

    public function getIterator()
    {
        // TODO: Implement getIterator() method.
        return new ArrayIterator(
            array(
                '_id' => $this->id,
                'companyID' => (int)$this->companyID,
                'counter' => 0,
                'consignee' => array([
                    '_id' => 0,
                    'counter' => 0,
                    'consigneeName' => $this->consigneeName,
                    'consigneeAddress' => $this->consigneeAddress,
                    'consigneeLocation' => $this->consigneeLocation,
                    'consigneePostal' => $this->consigneePostal,
                    'consigneeContact' => $this->consigneeContact,
                    'consigneeEmail' => $this->consigneeEmail,
                    'consigneeTelephone' => $this->consigneeTelephone,
                    'consigneeExt' => $this->consigneeExt,
                    'consigneeTollFree' => $this->consigneeTollFree,
                    'consigneeFax' => $this->consigneeFax,
                    'consigneeReceiving' => $this->consigneeReceiving,
                    'consigneeAppointments' => $this->consigneeAppointments,
                    'consigneeIntersaction' => $this->consigneeIntersaction,
                    'consigneeStatus' => $this->consigneeStatus,
                    'consigneeRecivingNote' => $this->consigneeRecivingNote,
                    'consigneeInternalNote' => $this->consigneeInternalNote,
                    'insertedTime' => time(),
                    'insertedUserId' => $_SESSION['companyName'],
                    'deleteStatus' => 0
                ])
            )
        );
    }

    public function insert($consignee,$db,$helper) {
        $c_id = $db->consignee->find(['companyID' => (int)$consignee->getCompanyID()]);
        $count = 0;
        foreach ($c_id as $c) {
            $count++;
        }
        if ($count > 0) {
            $db->consignee->updateOne(['companyID' => (int)$this->companyID], ['$push' => ['consignee' => [
                '_id' => $helper->getDocumentSequence((int)$this->companyID, $db->consignee),
                'counter' => 0,
                'consigneeName' => $this->consigneeName,
                'consigneeAddress' => $this->consigneeAddress,
                'consigneeLocation' => $this->consigneeLocation,
                'consigneePostal' => $this->consigneePostal,
                'consigneeContact' => $this->consigneeContact,
                'consigneeEmail' => $this->consigneeEmail,
                'consigneeTelephone' => $this->consigneeTelephone,
                'consigneeExt' => $this->consigneeExt,
                'consigneeTollFree' => $this->consigneeTollFree,
                'consigneeFax' => $this->consigneeFax,
                'consigneeReceiving' => $this->consigneeReceiving,
                'consigneeAppointments' => $this->consigneeAppointments,
                'consigneeIntersaction' => $this->consigneeIntersaction,
                'consigneeStatus' => $this->consigneeStatus,
                'consigneeRecivingNote' => $this->consigneeRecivingNote,
                'consigneeInternalNote' => $this->consigneeInternalNote,
                'insertedTime' => time(),
                'insertedUserId' => $_SESSION['companyName'],
                'deleteStatus' => 0
            ]]]);
        } else {
            $cons = iterator_to_array($consignee);
            $db->consignee->insertOne($cons);
        }
    }

    public function importExcel_Consignee($targetPath, $helper, $db)
    {
        require_once('../excel/excel_reader2.php');
        require_once('../excel/SpreadsheetReader.php');

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());

        for ($i = 0; $i < $sheetCount; $i++) {

            $Reader->ChangeSheet($i);

            $this->setId($helper->getNextSequence("consignee", $db));
            $this->companyID = $_SESSION['companyId'];

            $count = 0;
            foreach ($Reader as $Row)
            {
                $count++;
                if($count > 1000){
                    echo "Your file should contain atmost 1000 entries. First 1000 entries added successfully"; 
                    break;
                } else {
                    if (isset($Row[0])) {
                        $this->consigneeName = $Row[0];
                    }
                    if (isset($Row[1])) {
                        $this->consigneeAddress = $Row[1];
                    }
                    if (isset($Row[2])) {
                        $this->consigneeLocation = $Row[2];
                    }
                    if (isset($Row[3])) {
                        $this->consigneePostal = $Row[3];
                    }
                    if (isset($Row[4])) {
                        $this->consigneeContact = $Row[4];
                    }
                    if (isset($Row[5])) {
                        $this->consigneeEmail = $Row[5];
                    }
                    if (isset($Row[6])) {
                        $this->consigneeTelephone = $Row[6];
                    }
                    if (isset($Row[7])) {
                        $this->consigneeExt = $Row[7];
                    }
                    if (isset($Row[8])) {
                        $this->consigneeTollFree = $Row[8];
                    }
                    if (isset($Row[9])) {
                        $this->consigneeFax = $Row[9];
                    }
                    if (isset($Row[10])) {
                        $this->consigneeReceiving = $Row[10];
                    }
                    if (isset($Row[11])) {
                        $this->consigneeAppointments = $Row[11];
                    }
                    if (isset($Row[12])) {
                        $this->consigneeIntersaction = $Row[12];
                    }
                    if (isset($Row[13])) {
                        $this->consigneeStatus = $Row[13];
                    }
                    if (isset($Row[14])) {
                        $this->consigneeRecivingNote = $Row[14];
                    }
                    if (isset($Row[15])) {
                        $this->consigneeInternalNote = $Row[15];
                    }
                    $this->insert($this, $db,$helper);
                }
            }
        }
        unlink($targetPath);
    }

    public function exportConsignee($db)
    {
        $consignee = $db->consignee->find(['companyID' => $_SESSION['companyId']]);
        foreach ($consignee as $ship) {
            $show = $ship['consignee'];
            foreach ($show as $s) {
                $p[] = array($s['consigneeName'],$s['consigneeAddress'],$s['consigneeLocation'],$s['consigneePostal'],
                    $s['consigneeContact'],$s['consigneeEmail'],$s['consigneeTelephone'],$s['consigneeExt'],
                    $s['consigneeTollFree'],$s['consigneeFax'],$s['consigneeReceiving'],$s['consigneeAppointments'],
                    $s['consigneeIntersaction'],$s['consigneeStatus'],$s['consigneeRecivingNote'],$s['consigneeInternalNote']
                );
            }
        }
        echo json_encode($p);
    }

    // update function
    public function updateConsignee($consignee, $db)
    {
        $db->consignee->updateOne(['companyID' => (int)$_SESSION['companyId'], 'consignee._id' => (int)$this->getId()],
            ['$set' => ['consignee.$.' . $consignee->getColumn() => $consignee->getConsigneeName()]]
        );
    }

    // delete fucntion
    public function deleteConsignee($consignee, $db)
    {
        $db->consignee->updateOne(['companyID' => (int)$_SESSION['companyId']], [
            '$pull' => ['consignee' => ['_id' => (int)$consignee->getId()]]]
        );

        // $db->consignee->updateOne(['companyID' => (int)$_SESSION['companyId'], 'consignee._id' => (int)$this->getId()],
        //     ['$set' => ['consignee.$.deleteStatus' => 1]]
        // );
    }

}