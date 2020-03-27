<?php
@session_start();
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Factoring
 *
 * @author Chetan
 */
class Factoring implements IteratorAggregate {
    
    private $id;
    private $companyID;
    private $Column;
    private $factoringCompanyname;
    private $address;
    private $location;
    private $zip;
    private $primaryContact;
    private $telephone;
    private $extFactoring;
    private $fax;
    private $tollFree;
    private $email;
    private $secondaryContact;
    private $factoringtelephone;
    private $ext;
    private $currencySetting;
    private $paymentTerms;
    private $taxID;
    private $internalNote;
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
    public function getFactoringCompanyname()
    {
        return $this->factoringCompanyname;
    }

    /**
     * @param mixed $factoringCompanyname
     */
    public function setFactoringCompanyname($factoringCompanyname)
    {
        $this->factoringCompanyname = $factoringCompanyname;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @param mixed $zip
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    }

    /**
     * @return mixed
     */
    public function getPrimaryContact()
    {
        return $this->primaryContact;
    }

    /**
     * @param mixed $primaryContact
     */
    public function setPrimaryContact($primaryContact)
    {
        $this->primaryContact = $primaryContact;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getExtFactoring()
    {
        return $this->extFactoring;
    }

    /**
     * @param mixed $extFactoring
     */
    public function setExtFactoring($extFactoring)
    {
        $this->extFactoring = $extFactoring;
    }

    /**
     * @return mixed
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param mixed $fax
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    }

    /**
     * @return mixed
     */
    public function getTollFree()
    {
        return $this->tollFree;
    }

    /**
     * @param mixed $tollFree
     */
    public function setTollFree($tollFree)
    {
        $this->tollFree = $tollFree;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getSecondaryContact()
    {
        return $this->secondaryContact;
    }

    /**
     * @param mixed $secondaryContact
     */
    public function setSecondaryContact($secondaryContact)
    {
        $this->secondaryContact = $secondaryContact;
    }

    /**
     * @return mixed
     */
    public function getFactoringtelephone()
    {
        return $this->factoringtelephone;
    }

    /**
     * @param mixed $factoringtelephone
     */
    public function setFactoringtelephone($factoringtelephone)
    {
        $this->factoringtelephone = $factoringtelephone;
    }

    /**
     * @return mixed
     */
    public function getExt()
    {
        return $this->ext;
    }

    /**
     * @param mixed $ext
     */
    public function setExt($ext)
    {
        $this->ext = $ext;
    }

    /**
     * @return mixed
     */
    public function getCurrencySetting()
    {
        return $this->currencySetting;
    }

    /**
     * @param mixed $currencySetting
     */
    public function setCurrencySetting($currencySetting)
    {
        $this->currencySetting = $currencySetting;
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
    public function getTaxID()
    {
        return $this->taxID;
    }

    /**
     * @param mixed $taxID
     */
    public function setTaxID($taxID)
    {
        $this->taxID = $taxID;
    }

    /**
     * @return mixed
     */
    public function getInternalNote()
    {
        return $this->internalNote;
    }

    /**
     * @param mixed $internalNote
     */
    public function setInternalNote($internalNote)
    {
        $this->internalNote = $internalNote;
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


    function getIterator() {
        return new ArrayIterator(
            array(
                '_id' => $this->id,
                'companyID' => (int) $this->companyID,
                'counter' => 0,
                'factoring' => array([
                    '_id' => 0,
                    'counter' => 0,
                    'factoringCompanyname' => $this->factoringCompanyname,
                    'address' => $this->address,
                    'location' => $this->location,
                    'zip' => $this->zip,
                    'primaryContact' => $this->primaryContact,
                    'telephone' => $this->telephone,
                    'extFactoring' => $this->extFactoring,
                    'fax' => $this->fax,
                    'tollFree' => $this->tollFree,
                    'email' => $this->email,
                    'secondaryContact' => $this->secondaryContact,
                    'factoringtelephone' => $this->factoringtelephone,
                    'ext' => $this->ext,
                    'currencySetting' => $this->currencySetting,
                    'paymentTerms' => $this->paymentTerms,
                    'taxID' => $this->taxID,
                    'internalNote' => $this->internalNote,
                    'insertedTime' => time(),
                    'insertedUserId' => $_SESSION['companyName'],
                    'deleteStatus' => 0
                    ]
                )
            )
        );
    }


    //Insert Factoring Function
    public function insert($factoring,$db,$helper)
    {
        $collection = $db->factoring_company_add;
            $criteria = array(
                'companyID' => (int)$factoring->getCompanyID(),
        );
        $doc = $collection->findOne($criteria);

        if (!empty($doc)) {
            $db->factoring_company_add->updateOne(['companyID' => (int)$this->companyID],['$push'=>['factoring'=>[
                '_id'=>$helper->getDocumentSequence((int)$this->companyID,$db->factoring_company_add),
                'counter' => 0,
                'factoringCompanyname' => $this->factoringCompanyname,
                'address' => $this->address,
                'location' => $this->location,
                'zip' => $this->zip,
                'primaryContact' => $this->primaryContact,
                'telephone' => $this->telephone,
                'extFactoring' => $this->extFactoring,
                'fax' => $this->fax,
                'tollFree' => $this->tollFree,
                'email' => $this->email,
                'secondaryContact' => $this->secondaryContact,
                'factoringtelephone' => $this->factoringtelephone,
                'ext' => $this->ext,
                'currencySetting' => $this->currencySetting,
                'paymentTerms' => $this->paymentTerms,
                'taxID' => $this->taxID,
                'internalNote' => $this->internalNote,
                'insertedTime' => time(),
                'insertedUserId' => $_SESSION['companyName'],
                'deleteStatus' => 0
            ]]]);

            $db->currency_add->updateOne(['companyID' => (int)$_SESSION['companyId'], 'currency._id' => (int)$this->currencySetting],
            ['$set' => ['currency.$.counter' => $helper->getDocumentSequenceId((int)$this->currencySetting,$db->currency_add,"currency",(int)$_SESSION['companyId'])]]);
            
            $db->payment_terms->updateOne(['companyID' => (int)$_SESSION['companyId'], 'payment._id' => (int)$this->paymentTerms],
            ['$set' => ['payment.$.counter' => $helper->getDocumentSequenceId($this->paymentTerms,$db->payment_terms,"payment",(int)$_SESSION['companyId'])]]);

        } else {
            $factoring = iterator_to_array($factoring);
            $db->factoring_company_add->insertOne($factoring);

            $db->currency_add->updateOne(['companyID' => (int)$_SESSION['companyId'], 'currency._id' => (int)$this->currencySetting],
            ['$set' => ['currency.$.counter' => $helper->getDocumentSequenceId($this->currencySetting,$db->currency_add,"currency",(int)$_SESSION['companyId'])]]);
            
            $db->payment_terms->updateOne(['companyID' => (int)$_SESSION['companyId'], 'payment._id' => (int)$this->paymentTerms],
            ['$set' => ['payment.$.counter' => $helper->getDocumentSequenceId($this->paymentTerms,$db->payment_terms,"payment",(int)$_SESSION['companyId'])]]);

        }
    }

    //update
    public function updateFactoring($factoring,$db){
        $db->factoring_company_add->updateOne(
            ['companyID' => (int)$_SESSION['companyId'],'factoring._id' => (int)$this->getId()],
            ['$set' => ['factoring.$.'.$factoring->getColumn() => $factoring->getFactoringCompanyname()]
        ]);
    }

    //Delete
    public function deleteFactoring($factoring,$db,$helper){
        $db->factoring_company_add->updateOne(['companyID' => (int)$_SESSION['companyId']], [
            '$pull' => ['factoring' => ['_id' => (int)$factoring->getId()]]]
        );

        $db->currency_add->updateOne(['companyID' => (int)$_SESSION['companyId'], 'currency._id' => (int)$this->currencySetting],
            ['$set' => ['currency.$.counter' => $helper->getDocumentDecrementId($this->currencySetting,$db->currency_add,"currency",(int)$_SESSION['companyId'])]]);
    
        $db->payment_terms->updateOne(['companyID' => (int)$_SESSION['companyId'], 'payment._id' => (int)$this->paymentTerms],
            ['$set' => ['payment.$.counter' => $helper->getDocumentDecrementId($this->paymentTerms,$db->payment_terms,"payment",(int)$_SESSION['companyId'])]]);
    }

    //Export
    public function exportFactoring($db)
    {
        $factoring = $db->factoring_company_add->find(['companyID' => $_SESSION['companyId']]);
        foreach ($factoring as $fshow) {
            $show = $fshow['factoring'];
            foreach ($show as $s) {
                $p[] = array($s['factoringCompanyname'],$s['address'],$s['location'],$s['zip'],
                    $s['primaryContact'],$s['telephone'],$s['extFactoring'],$s['fax'],
                    $s['tollFree'],$s['email'],$s['secondaryContact'],$s['factoringtelephone'],
                    $s['ext'],$s['currencySetting'],$s['paymentTerms'],$s['taxID'],
                    $s['internalNote']
                );
            }
        }
        echo json_encode($p);
    }
}
