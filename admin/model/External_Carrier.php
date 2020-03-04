<?php

@session_start();
class External_Carrier implements IteratorAggregate
{
    private $id;
    private $companyID;
    private $name;
    private $address;
    private $location;
    private $zip;
    private $contactName;
    private $email;
    private $telephone;
    private $ext;
    private $tollfree;
    private $fax;
    private $paymentTerms;
    private $taxID;
    private $mc;
    private $dot;
    private $factoringCompany;
    private $carrierNotes;
    private $blacklisted;
    private $corporation;
    private $insuranceLiabilityCompany;
    private $insurancePolicyNo;
    private $expiryDate;
    private $insuranceTelephone;
    private $insuranceExt;
    private $insuranceContactName;
    private $insuranceLiabilityAmount;
    private $insuranceNotes;
    private $autoInsuranceCompany;
    private $autoInsPolicyNo;
    private $autoInsExpiryDate;
    private $autoInsTelephone;
    private $autoInsExt;
    private $autoInsContactName;
    private $autoInsLiabilityAmount;
    private $autoInsuranceNotes;
    private $cargoCompany;
    private $cargoPolicyNo;
    private $cargoExpiryDate;
    private $cargoTelephone;
    private $cargoExt;
    private $cargoContactName;
    private $cargoInsuranceAmt;
    private $WSIBNo;
    private $cargoNotes;
    private $primaryName;
    private $primaryTelephone;
    private $primaryEmail;
    private $secondaryName;
    private $secondaryTelephone;
    private $secondaryEmail;
    private $accountingNotes;
    private $sizeOfFleet;
    private $equipmentNotes;
    private $equipment;
    private $column;

    /**
     * @return mixed
     */
    public function getColumn()
    {
        return $this->column;
    }

    /**
     * @param mixed $column
     */
    public function setColumn($column): void
    {
        $this->column = $column;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
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
    public function setCompanyID($companyID): void
    {
        $this->companyID = $companyID;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
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
    public function setAddress($address): void
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
    public function setLocation($location): void
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
    public function setZip($zip): void
    {
        $this->zip = $zip;
    }

    /**
     * @return mixed
     */
    public function getContactName()
    {
        return $this->contactName;
    }

    /**
     * @param mixed $contactName
     */
    public function setContactName($contactName): void
    {
        $this->contactName = $contactName;
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
    public function setEmail($email): void
    {
        $this->email = $email;
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
    public function setTelephone($telephone): void
    {
        $this->telephone = $telephone;
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
    public function setExt($ext): void
    {
        $this->ext = $ext;
    }

    /**
     * @return mixed
     */
    public function getTollfree()
    {
        return $this->tollfree;
    }

    /**
     * @param mixed $tollfree
     */
    public function setTollfree($tollfree): void
    {
        $this->tollfree = $tollfree;
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
    public function setFax($fax): void
    {
        $this->fax = $fax;
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
    public function setPaymentTerms($paymentTerms): void
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
    public function setTaxID($taxID): void
    {
        $this->taxID = $taxID;
    }

    /**
     * @return mixed
     */
    public function getMc()
    {
        return $this->mc;
    }

    /**
     * @param mixed $mc
     */
    public function setMc($mc): void
    {
        $this->mc = $mc;
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
    public function setDot($dot): void
    {
        $this->dot = $dot;
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
    public function setFactoringCompany($factoringCompany): void
    {
        $this->factoringCompany = $factoringCompany;
    }

    /**
     * @return mixed
     */
    public function getCarrierNotes()
    {
        return $this->carrierNotes;
    }

    /**
     * @param mixed $carrierNotes
     */
    public function setCarrierNotes($carrierNotes): void
    {
        $this->carrierNotes = $carrierNotes;
    }

    /**
     * @return mixed
     */
    public function getBlacklisted()
    {
        return $this->blacklisted;
    }

    /**
     * @param mixed $blacklisted
     */
    public function setBlacklisted($blacklisted): void
    {
        $this->blacklisted = $blacklisted;
    }

    /**
     * @return mixed
     */
    public function getCorporation()
    {
        return $this->corporation;
    }

    /**
     * @param mixed $corporation
     */
    public function setCorporation($corporation): void
    {
        $this->corporation = $corporation;
    }

    /**
     * @return mixed
     */
    public function getInsuranceLiabilityCompany()
    {
        return $this->insuranceLiabilityCompany;
    }

    /**
     * @param mixed $insuranceLiabilityCompany
     */
    public function setInsuranceLiabilityCompany($insuranceLiabilityCompany): void
    {
        $this->insuranceLiabilityCompany = $insuranceLiabilityCompany;
    }

    /**
     * @return mixed
     */
    public function getInsurancePolicyNo()
    {
        return $this->insurancePolicyNo;
    }

    /**
     * @param mixed $insurancePolicyNo
     */
    public function setInsurancePolicyNo($insurancePolicyNo): void
    {
        $this->insurancePolicyNo = $insurancePolicyNo;
    }

    /**
     * @return mixed
     */
    public function getExpiryDate()
    {
        return $this->expiryDate;
    }

    /**
     * @param mixed $expiryDate
     */
    public function setExpiryDate($expiryDate): void
    {
        $this->expiryDate = $expiryDate;
    }

    /**
     * @return mixed
     */
    public function getInsuranceTelephone()
    {
        return $this->insuranceTelephone;
    }

    /**
     * @param mixed $insuranceTelephone
     */
    public function setInsuranceTelephone($insuranceTelephone): void
    {
        $this->insuranceTelephone = $insuranceTelephone;
    }

    /**
     * @return mixed
     */
    public function getInsuranceExt()
    {
        return $this->insuranceExt;
    }

    /**
     * @param mixed $insuranceExt
     */
    public function setInsuranceExt($insuranceExt): void
    {
        $this->insuranceExt = $insuranceExt;
    }

    /**
     * @return mixed
     */
    public function getInsuranceContactName()
    {
        return $this->insuranceContactName;
    }

    /**
     * @param mixed $insuranceContactName
     */
    public function setInsuranceContactName($insuranceContactName): void
    {
        $this->insuranceContactName = $insuranceContactName;
    }

    /**
     * @return mixed
     */
    public function getInsuranceLiabilityAmount()
    {
        return $this->insuranceLiabilityAmount;
    }

    /**
     * @param mixed $insuranceLiabilityAmount
     */
    public function setInsuranceLiabilityAmount($insuranceLiabilityAmount): void
    {
        $this->insuranceLiabilityAmount = $insuranceLiabilityAmount;
    }

    /**
     * @return mixed
     */
    public function getInsuranceNotes()
    {
        return $this->insuranceNotes;
    }

    /**
     * @param mixed $insuranceNotes
     */
    public function setInsuranceNotes($insuranceNotes): void
    {
        $this->insuranceNotes = $insuranceNotes;
    }

    /**
     * @return mixed
     */
    public function getAutoInsuranceCompany()
    {
        return $this->autoInsuranceCompany;
    }

    /**
     * @param mixed $autoInsuranceCompany
     */
    public function setAutoInsuranceCompany($autoInsuranceCompany): void
    {
        $this->autoInsuranceCompany = $autoInsuranceCompany;
    }

    /**
     * @return mixed
     */
    public function getAutoInsPolicyNo()
    {
        return $this->autoInsPolicyNo;
    }

    /**
     * @param mixed $autoInsPolicyNo
     */
    public function setAutoInsPolicyNo($autoInsPolicyNo): void
    {
        $this->autoInsPolicyNo = $autoInsPolicyNo;
    }

    /**
     * @return mixed
     */
    public function getAutoInsExpiryDate()
    {
        return $this->autoInsExpiryDate;
    }

    /**
     * @param mixed $autoInsExpiryDate
     */
    public function setAutoInsExpiryDate($autoInsExpiryDate): void
    {
        $this->autoInsExpiryDate = $autoInsExpiryDate;
    }

    /**
     * @return mixed
     */
    public function getAutoInsTelephone()
    {
        return $this->autoInsTelephone;
    }

    /**
     * @param mixed $autoInsTelephone
     */
    public function setAutoInsTelephone($autoInsTelephone): void
    {
        $this->autoInsTelephone = $autoInsTelephone;
    }

    /**
     * @return mixed
     */
    public function getAutoInsExt()
    {
        return $this->autoInsExt;
    }

    /**
     * @param mixed $autoInsExt
     */
    public function setAutoInsExt($autoInsExt): void
    {
        $this->autoInsExt = $autoInsExt;
    }

    /**
     * @return mixed
     */
    public function getAutoInsContactName()
    {
        return $this->autoInsContactName;
    }

    /**
     * @param mixed $autoInsContactName
     */
    public function setAutoInsContactName($autoInsContactName): void
    {
        $this->autoInsContactName = $autoInsContactName;
    }

    /**
     * @return mixed
     */
    public function getAutoInsLiabilityAmount()
    {
        return $this->autoInsLiabilityAmount;
    }

    /**
     * @param mixed $autoInsLiabilityAmount
     */
    public function setAutoInsLiabilityAmount($autoInsLiabilityAmount): void
    {
        $this->autoInsLiabilityAmount = $autoInsLiabilityAmount;
    }

    /**
     * @return mixed
     */
    public function getAutoInsuranceNotes()
    {
        return $this->autoInsuranceNotes;
    }

    /**
     * @param mixed $autoInsuranceNotes
     */
    public function setAutoInsuranceNotes($autoInsuranceNotes): void
    {
        $this->autoInsuranceNotes = $autoInsuranceNotes;
    }

    /**
     * @return mixed
     */
    public function getCargoCompany()
    {
        return $this->cargoCompany;
    }

    /**
     * @param mixed $cargoCompany
     */
    public function setCargoCompany($cargoCompany): void
    {
        $this->cargoCompany = $cargoCompany;
    }

    /**
     * @return mixed
     */
    public function getCargoPolicyNo()
    {
        return $this->cargoPolicyNo;
    }

    /**
     * @param mixed $cargoPolicyNo
     */
    public function setCargoPolicyNo($cargoPolicyNo): void
    {
        $this->cargoPolicyNo = $cargoPolicyNo;
    }

    /**
     * @return mixed
     */
    public function getCargoExpiryDate()
    {
        return $this->cargoExpiryDate;
    }

    /**
     * @param mixed $cargoExpiryDate
     */
    public function setCargoExpiryDate($cargoExpiryDate): void
    {
        $this->cargoExpiryDate = $cargoExpiryDate;
    }

    /**
     * @return mixed
     */
    public function getCargoTelephone()
    {
        return $this->cargoTelephone;
    }

    /**
     * @param mixed $cargoTelephone
     */
    public function setCargoTelephone($cargoTelephone): void
    {
        $this->cargoTelephone = $cargoTelephone;
    }

    /**
     * @return mixed
     */
    public function getCargoExt()
    {
        return $this->cargoExt;
    }

    /**
     * @param mixed $cargoExt
     */
    public function setCargoExt($cargoExt): void
    {
        $this->cargoExt = $cargoExt;
    }

    /**
     * @return mixed
     */
    public function getCargoContactName()
    {
        return $this->cargoContactName;
    }

    /**
     * @param mixed $cargoContactName
     */
    public function setCargoContactName($cargoContactName): void
    {
        $this->cargoContactName = $cargoContactName;
    }

    /**
     * @return mixed
     */
    public function getCargoInsuranceAmt()
    {
        return $this->cargoInsuranceAmt;
    }

    /**
     * @param mixed $cargoInsuranceAmt
     */
    public function setCargoInsuranceAmt($cargoInsuranceAmt): void
    {
        $this->cargoInsuranceAmt = $cargoInsuranceAmt;
    }

    /**
     * @return mixed
     */
    public function getWSIBNo()
    {
        return $this->WSIBNo;
    }

    /**
     * @param mixed $WSIBNo
     */
    public function setWSIBNo($WSIBNo): void
    {
        $this->WSIBNo = $WSIBNo;
    }

    /**
     * @return mixed
     */
    public function getCargoNotes()
    {
        return $this->cargoNotes;
    }

    /**
     * @param mixed $cargoNotes
     */
    public function setCargoNotes($cargoNotes): void
    {
        $this->cargoNotes = $cargoNotes;
    }

    /**
     * @return mixed
     */
    public function getPrimaryName()
    {
        return $this->primaryName;
    }

    /**
     * @param mixed $primaryName
     */
    public function setPrimaryName($primaryName): void
    {
        $this->primaryName = $primaryName;
    }

    /**
     * @return mixed
     */
    public function getPrimaryTelephone()
    {
        return $this->primaryTelephone;
    }

    /**
     * @param mixed $primaryTelephone
     */
    public function setPrimaryTelephone($primaryTelephone): void
    {
        $this->primaryTelephone = $primaryTelephone;
    }

    /**
     * @return mixed
     */
    public function getPrimaryEmail()
    {
        return $this->primaryEmail;
    }

    /**
     * @param mixed $primaryEmail
     */
    public function setPrimaryEmail($primaryEmail): void
    {
        $this->primaryEmail = $primaryEmail;
    }

    /**
     * @return mixed
     */
    public function getSecondaryName()
    {
        return $this->secondaryName;
    }

    /**
     * @param mixed $secondaryName
     */
    public function setSecondaryName($secondaryName): void
    {
        $this->secondaryName = $secondaryName;
    }

    /**
     * @return mixed
     */
    public function getSecondaryTelephone()
    {
        return $this->secondaryTelephone;
    }

    /**
     * @param mixed $secondaryTelephone
     */
    public function setSecondaryTelephone($secondaryTelephone): void
    {
        $this->secondaryTelephone = $secondaryTelephone;
    }

    /**
     * @return mixed
     */
    public function getSecondaryEmail()
    {
        return $this->secondaryEmail;
    }

    /**
     * @param mixed $secondaryEmail
     */
    public function setSecondaryEmail($secondaryEmail): void
    {
        $this->secondaryEmail = $secondaryEmail;
    }

    /**
     * @return mixed
     */
    public function getAccountingNotes()
    {
        return $this->accountingNotes;
    }

    /**
     * @param mixed $accountingNotes
     */
    public function setAccountingNotes($accountingNotes): void
    {
        $this->accountingNotes = $accountingNotes;
    }

    /**
     * @return mixed
     */
    public function getSizeOfFleet()
    {
        return $this->sizeOfFleet;
    }

    /**
     * @param mixed $sizeOfFleet
     */
    public function setSizeOfFleet($sizeOfFleet): void
    {
        $this->sizeOfFleet = $sizeOfFleet;
    }

    /**
     * @return mixed
     */
    public function getEquipmentNotes()
    {
        return $this->equipmentNotes;
    }

    /**
     * @param mixed $equipmentNotes
     */
    public function setEquipmentNotes($equipmentNotes): void
    {
        $this->equipmentNotes = $equipmentNotes;
    }

    /**
     * @return mixed
     */
    public function getEquipment()
    {
        return $this->equipment;
    }

    /**
     * @param mixed $equipment
     */
    public function setEquipment($equipment,$amount): void
    {
        $this->equipment = array();
        for($i = 0; $i < count($equipment); $i++){
            $this->equipment[] = array("equipment"=>$equipment[$i],"amount"=>$amount[$i]);
        }

    }


    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new ArrayIterator(
            array(
                '_id' => $this->id,
                'companyID' => (int)$this->companyID,
                'counter' => 0,
                'carrier' => array([
                    '_id' => 0,
                    'name' => $this->name,
                    'address' => $this->address,
                    'location' => $this->location,
                    'zip' => $this->zip,
                    'contactName' => $this->contactName,
                    'email' => $this->email,
                    'telephone' => $this->telephone,
                    'ext' => $this->ext,
                    'tollfree' => $this->tollfree,
                    'fax' => $this->fax,
                    'paymentTerms' => $this->paymentTerms,
                    'taxID' => $this->taxID,
                    'mc' => $this->mc,
                    'dot' => $this->dot,
                    'factoringCompany' => $this->factoringCompany,
                    'carrierNotes' => $this->carrierNotes,
                    'blacklisted' => $this->blacklisted,
                    'corporation' => $this->corporation,
                    'insuranceLiabilityCompany' => $this->insuranceLiabilityCompany,
                    'insurancePolicyNo' => $this->insurancePolicyNo,
                    'expiryDate' => $this->expiryDate,
                    'insuranceTelephone' => $this->insuranceTelephone,
                    'insuranceExt' => $this->insuranceExt,
                    'insuranceContactName' => $this->insuranceContactName,
                    'insuranceLiabilityAmount' => $this->insuranceLiabilityAmount,
                    'insuranceNotes' => $this->insuranceNotes,
                    'autoInsuranceCompany' => $this->autoInsuranceCompany,
                    'autoInsPolicyNo' => $this->autoInsPolicyNo,
                    'autoInsExpiryDate' => $this->autoInsExpiryDate,
                    'autoInsTelephone' => $this->autoInsTelephone,
                    'autoInsExt' => $this->autoInsExt,
                    'autoInsContactName' => $this->autoInsContactName,
                    'autoInsLiabilityAmount' => $this->autoInsLiabilityAmount,
                    'autoInsuranceNotes' => $this->autoInsuranceNotes,
                    'cargoCompany' => $this->cargoCompany,
                    'cargoPolicyNo' => $this->cargoPolicyNo,
                    'cargoExpiryDate' => $this->cargoExpiryDate,
                    'cargoTelephone' => $this->cargoTelephone,
                    'cargoExt' => $this->cargoExt,
                    'cargoContactName' => $this->cargoContactName,
                    'cargoInsuranceAmt' => $this->cargoInsuranceAmt,
                    'WSIBNo' => $this->WSIBNo,
                    'cargoNotes' => $this->cargoNotes,
                    'primaryName' => $this->primaryName,
                    'primaryTelephone' => $this->primaryTelephone,
                    'primaryEmail' => $this->primaryEmail,
                    'secondaryName' => $this->secondaryName,
                    'secondaryTelephone' => $this->secondaryTelephone,
                    'secondaryEmail' => $this->secondaryEmail,
                    'accountingNotes' => $this->accountingNotes,
                    'sizeOfFleet' => $this->sizeOfFleet,
                    'equipmentNotes' => $this->equipmentNotes,
                    'insertedUserId' => $_SESSION['companyName'],
                    'deleteStatus' => 0,
                    'equipment'=>$this->equipment,
                ])
            )
        );
    }


    public function insert($carrier,$db,$helper)
    {
        $collection = $db->carrier;
        $criteria = array(
            'companyID' => (int)$carrier->getCompanyID(),
        );
        $doc = $collection->findOne($criteria);

        if (!empty($doc)) {
            $db->carrier->updateOne(['companyID' => (int)$this->companyID], ['$push' => ['carrier' => [
                '_id' => $helper->getDocumentSequence((int)$this->companyID, $db->carrier),
                'name' => $this->name,
                'address' => $this->address,
                'location' => $this->location,
                'zip' => $this->zip,
                'contactName' => $this->contactName,
                'email' => $this->email,
                'telephone' => $this->telephone,
                'ext' => $this->ext,
                'tollfree' => $this->tollfree,
                'fax' => $this->fax,
                'paymentTerms' => $this->paymentTerms,
                'taxID' => $this->taxID,
                'mc' => $this->mc,
                'dot' => $this->dot,
                'factoringCompany' => $this->factoringCompany,
                'carrierNotes' => $this->carrierNotes,
                'blacklisted' => $this->blacklisted,
                'corporation' => $this->corporation,
                'insuranceLiabilityCompany' => $this->insuranceLiabilityCompany,
                'insurancePolicyNo' => $this->insurancePolicyNo,
                'expiryDate' => $this->expiryDate,
                'insuranceTelephone' => $this->insuranceTelephone,
                'insuranceExt' => $this->insuranceExt,
                'insuranceContactName' => $this->insuranceContactName,
                'insuranceLiabilityAmount' => $this->insuranceLiabilityAmount,
                'insuranceNotes' => $this->insuranceNotes,
                'autoInsuranceCompany' => $this->autoInsuranceCompany,
                'autoInsPolicyNo' => $this->autoInsPolicyNo,
                'autoInsExpiryDate' => $this->autoInsExpiryDate,
                'autoInsTelephone' => $this->autoInsTelephone,
                'autoInsExt' => $this->autoInsExt,
                'autoInsContactName' => $this->autoInsContactName,
                'autoInsLiabilityAmount' => $this->autoInsLiabilityAmount,
                'autoInsuranceNotes' => $this->autoInsuranceNotes,
                'cargoCompany' => $this->cargoCompany,
                'cargoPolicyNo' => $this->cargoPolicyNo,
                'cargoExpiryDate' => $this->cargoExpiryDate,
                'cargoTelephone' => $this->cargoTelephone,
                'cargoExt' => $this->cargoExt,
                'cargoContactName' => $this->cargoContactName,
                'cargoInsuranceAmt' => $this->cargoInsuranceAmt,
                'WSIBNo' => $this->WSIBNo,
                'cargoNotes' => $this->cargoNotes,
                'primaryName' => $this->primaryName,
                'primaryTelephone' => $this->primaryTelephone,
                'primaryEmail' => $this->primaryEmail,
                'secondaryName' => $this->secondaryName,
                'secondaryTelephone' => $this->secondaryTelephone,
                'secondaryEmail' => $this->secondaryEmail,
                'accountingNotes' => $this->accountingNotes,
                'sizeOfFleet' => $this->sizeOfFleet,
                'equipmentNotes' => $this->equipmentNotes,
                'insertedUserId' => $_SESSION['companyName'],
                'deleteStatus' => 0,
                'equipment'=>$this->equipment,
            ]]]);
        } else {
            $cons = iterator_to_array($carrier);
            $db->carrier->insertOne($cons);
        }
    }

    public function updateExternal($external, $db) {
        $db->carrier->updateOne(['companyID' => (int)$_SESSION['companyId'], 'carrier._id' => (int)$this->getId()],
            ['$set' => ['carrier.$.' . $external->getColumn() => $external->getName()]]
        );
    }
}