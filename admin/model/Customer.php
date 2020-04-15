<?php
@session_start();
/**
 * Created by PhpStorm.
 * User: BOND
 * Date: 1/24/2020
 * Time: 5:15 PM
 */

class Customer implements IteratorAggregate
{
    private $id;
    private $masterID;
    private $companyId;
    private $custName;
    private $custAddress;
    private $custLocation;
    private $custZip;
    private $billingAddress;
    private $billingLocation;
    private $billingZip;
    private $primaryContact;
    private $custTelephone;
    private $custExt;
    private $custEmail;
    private $custFax;
    private $billingContact;
    private $billingEmail;
    private $billingTelephone;
    private $billingExt;
    private $URS;
    private $currencySetting;
    private $paymentTerms;
    private $creditLimit;
    private $salesRep;
    private $factoringCompany;
    private $federalID;
    private $workerComp;
    private $websiteURL;
    private $internalNotes;
    private $MC;

    private $blacklisted;
    private $AsShipper;
    private $AsConsignee;
    private $numberOninvoice;
    private $customerRate;

    private $insertedTime;
    private $insertedUserId;
    private $deleteStatus;
    private $deletedUserId;
    private $column;

    /**
     * @return mixed
     */
    public function getMasterID()
    {
        return $this->masterID;
    }

    /**
     * @param mixed $masterID
     */
    public function setMasterID($masterID): void
    {
        $this->masterID = $masterID;
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
    public function getAsShipper()
    {
        return $this->AsShipper;
    }

    /**
     * @param mixed $AsShipper
     */
    public function setAsShipper($AsShipper): void
    {
        $this->AsShipper = $AsShipper;
    }

    /**
     * @return mixed
     */
    public function getAsConsignee()
    {
        return $this->AsConsignee;
    }

    /**
     * @param mixed $AsConsignee
     */
    public function setAsConsignee($AsConsignee): void
    {
        $this->AsConsignee = $AsConsignee;
    }

    /**
     * @return mixed
     */
    public function getNumberOninvoice()
    {
        return $this->numberOninvoice;
    }

    /**
     * @param mixed $numberOninvoice
     */
    public function setNumberOninvoice($numberOninvoice): void
    {
        $this->numberOninvoice = $numberOninvoice;
    }

    /**
     * @return mixed
     */
    public function getCustomerRate()
    {
        return $this->customerRate;
    }

    /**
     * @param mixed $customerRate
     */
    public function setCustomerRate($customerRate): void
    {
        $this->customerRate = $customerRate;
    }

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
    public function setColumn($column)
    {
        $this->column = $column;
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
    public function getMC()
    {
        return $this->MC;
    }

    /**
     * @param mixed $MC
     */
    public function setMC($MC)
    {
        $this->MC = $MC;
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
    public function getCustName()
    {
        return $this->custName;
    }

    /**
     * @param mixed $custName
     */
    public function setCustName($custName)
    {
        $this->custName = $custName;
    }

    /**
     * @return mixed
     */
    public function getCustAddress()
    {
        return $this->custAddress;
    }

    /**
     * @param mixed $custAddress
     */
    public function setCustAddress($custAddress)
    {
        $this->custAddress = $custAddress;
    }

    /**
     * @return mixed
     */
    public function getCustLocation()
    {
        return $this->custLocation;
    }

    /**
     * @param mixed $custLocation
     */
    public function setCustLocation($custLocation)
    {
        $this->custLocation = $custLocation;
    }

    /**
     * @return mixed
     */
    public function getCustZip()
    {
        return $this->custZip;
    }

    /**
     * @param mixed $custZip
     */
    public function setCustZip($custZip)
    {
        $this->custZip = $custZip;
    }

    /**
     * @return mixed
     */
    public function getBillingAddress()
    {
        return $this->billingAddress;
    }

    /**
     * @param mixed $billingAddress
     */
    public function setBillingAddress($billingAddress)
    {
        $this->billingAddress = $billingAddress;
    }

    /**
     * @return mixed
     */
    public function getBillingLocation()
    {
        return $this->billingLocation;
    }

    /**
     * @param mixed $billingLocation
     */
    public function setBillingLocation($billingLocation)
    {
        $this->billingLocation = $billingLocation;
    }

    /**
     * @return mixed
     */
    public function getBillingZip()
    {
        return $this->billingZip;
    }

    /**
     * @param mixed $billingZip
     */
    public function setBillingZip($billingZip)
    {
        $this->billingZip = $billingZip;
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
    public function getCustTelephone()
    {
        return $this->custTelephone;
    }

    /**
     * @param mixed $custTelephone
     */
    public function setCustTelephone($custTelephone)
    {
        $this->custTelephone = $custTelephone;
    }

    /**
     * @return mixed
     */
    public function getCustExt()
    {
        return $this->custExt;
    }

    /**
     * @param mixed $custExt
     */
    public function setCustExt($custExt)
    {
        $this->custExt = $custExt;
    }

    /**
     * @return mixed
     */
    public function getCustEmail()
    {
        return $this->custEmail;
    }

    /**
     * @param mixed $custEmail
     */
    public function setCustEmail($custEmail)
    {
        $this->custEmail = $custEmail;
    }

    /**
     * @return mixed
     */
    public function getCustFax()
    {
        return $this->custFax;
    }

    /**
     * @param mixed $custFax
     */
    public function setCustFax($custFax)
    {
        $this->custFax = $custFax;
    }

    /**
     * @return mixed
     */
    public function getBillingContact()
    {
        return $this->billingContact;
    }

    /**
     * @param mixed $billingContact
     */
    public function setBillingContact($billingContact)
    {
        $this->billingContact = $billingContact;
    }

    /**
     * @return mixed
     */
    public function getBillingEmail()
    {
        return $this->billingEmail;
    }

    /**
     * @param mixed $billingEmail
     */
    public function setBillingEmail($billingEmail)
    {
        $this->billingEmail = $billingEmail;
    }

    /**
     * @return mixed
     */
    public function getBillingTelephone()
    {
        return $this->billingTelephone;
    }

    /**
     * @param mixed $billingTelephone
     */
    public function setBillingTelephone($billingTelephone)
    {
        $this->billingTelephone = $billingTelephone;
    }

    /**
     * @return mixed
     */
    public function getBillingExt()
    {
        return $this->billingExt;
    }

    /**
     * @param mixed $billingExt
     */
    public function setBillingExt($billingExt)
    {
        $this->billingExt = $billingExt;
    }

    /**
     * @return mixed
     */
    public function getURS()
    {
        return $this->URS;
    }

    /**
     * @param mixed $URS
     */
    public function setURS($URS)
    {
        $this->URS = $URS;
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
    public function getCreditLimit()
    {
        return $this->creditLimit;
    }

    /**
     * @param mixed $creditLimit
     */
    public function setCreditLimit($creditLimit)
    {
        $this->creditLimit = $creditLimit;
    }

    /**
     * @return mixed
     */
    public function getSalesRep()
    {
        return $this->salesRep;
    }

    /**
     * @param mixed $salesRep
     */
    public function setSalesRep($salesRep)
    {
        $this->salesRep = $salesRep;
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
    public function getFederalID()
    {
        return $this->federalID;
    }

    /**
     * @param mixed $federalID
     */
    public function setFederalID($federalID)
    {
        $this->federalID = $federalID;
    }

    /**
     * @return mixed
     */
    public function getWorkerComp()
    {
        return $this->workerComp;
    }

    /**
     * @param mixed $workerComp
     */
    public function setWorkerComp($workerComp)
    {
        $this->workerComp = $workerComp;
    }

    /**
     * @return mixed
     */
    public function getWebsiteURL()
    {
        return $this->websiteURL;
    }

    /**
     * @param mixed $websiteURL
     */
    public function setWebsiteURL($websiteURL)
    {
        $this->websiteURL = $websiteURL;
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
                'companyID' => (int)$this->companyId,
                'counter' => 0,
                'customer' => array([
                    '_id' => 0,
                    'counter' => 0,
                    'custName' => $this->custName,
                    'custAddress' => $this->custAddress,
                    'custLocation' => $this->custLocation,
                    'custZip' => $this->custZip,
                    'billingAddress' => $this->billingAddress,
                    'billingLocation' => $this->billingLocation,
                    'billingZip' => $this->billingZip,
                    'primaryContact' => $this->primaryContact,
                    'custTelephone' => $this->custTelephone,
                    'custExt' => $this->custExt,
                    'custEmail' => $this->custEmail,
                    'custFax' => $this->custFax,
                    'billingContact' => $this->billingContact,
                    'billingEmail' => $this->billingEmail,
                    'billingTelephone' => $this->billingTelephone,
                    'billingExt' => $this->billingExt,
                    'URS' => $this->URS,
                    'currencySetting' => $this->currencySetting,
                    'paymentTerms' => $this->paymentTerms,
                    'creditLimit' => $this->creditLimit,
                    'salesRep' => $this->salesRep,
                    'factoringCompany' => $this->factoringCompany,
                    'federalID' => $this->federalID,
                    'workerComp' => $this->workerComp,
                    'websiteURL' => $this->websiteURL,
                    'internalNotes' => $this->internalNotes,
                    'MC' => $this->MC,
                    'blacklisted' => $this->blacklisted,
                    'numberOninvoice' => $this->numberOninvoice,
                    'customerRate' => $this->customerRate,

                    'insertedTime' => time(),
                    'insertedUserId' => $_SESSION['companyName'],
                    'deleteStatus' => 0
                ])
            )
        );
    }

    // insert function
    public function insert($customer, $db,$helper)
    {
        $c_id = $db->customer->find(['companyID' => (int)$customer->getCompanyID()]);
        $count = 0;
        foreach ($c_id as $c) {
            $count++;
        }
        if ($count > 0) {
            $db->customer->updateOne(['companyID' => (int)$this->companyId], ['$push' => ['customer' => [
                '_id' => $helper->getDocumentSequence((int)$this->companyId, $db->customer),
                'counter' => 0,
                'custName' => $this->custName,
                'custAddress' => $this->custAddress,
                'custLocation' => $this->custLocation,
                'custZip' => $this->custZip,
                'billingAddress' => $this->billingAddress,
                'billingLocation' => $this->billingLocation,
                'billingZip' => $this->billingZip,
                'primaryContact' => $this->primaryContact,
                'custTelephone' => $this->custTelephone,
                'custExt' => $this->custExt,
                'custEmail' => $this->custEmail,
                'custFax' => $this->custFax,
                'billingContact' => $this->billingContact,
                'billingEmail' => $this->billingEmail,
                'billingTelephone' => $this->billingTelephone,
                'billingExt' => $this->billingExt,
                'URS' => $this->URS,
                'currencySetting' => $this->currencySetting,
                'paymentTerms' => $this->paymentTerms,
                'creditLimit' => $this->creditLimit,
                'salesRep' => $this->salesRep,
                'factoringCompany' => $this->factoringCompany,
                'federalID' => $this->federalID,
                'workerComp' => $this->workerComp,
                'websiteURL' => $this->websiteURL,
                'internalNotes' => $this->internalNotes,
                'MC' => $this->MC,
                'blacklisted' => $this->blacklisted,
                'numberOninvoice' => $this->numberOninvoice,
                'customerRate' => $this->customerRate,
                'insertedTime' => time(),
                'insertedUserId' => $_SESSION['companyName'],
                'deleteStatus' => 0
            ]]]);

            $db->currency_add->updateOne(['companyID' => (int)$_SESSION['companyId'], 'currency._id' => (int)$this->currencySetting],
                ['$set' => ['currency.$.counter' => $helper->getDocumentSequenceId((int)$this->currencySetting,$db->currency_add,"currency",(int)$_SESSION['companyId'])]]);
            
            $db->factoring_company_add->updateOne(['companyID' => (int)$_SESSION['companyId'], 'factoring._id' => (int)$this->factoringCompany],
                ['$set' => ['factoring.$.counter' => $helper->getDocumentSequenceId((int)$this->factoringCompany,$db->factoring_company_add,"factoring",(int)$_SESSION['companyId'])]]);
       
            $db->payment_terms->updateOne(['companyID' => (int)$_SESSION['companyId'], 'payment._id' => (int)$this->paymentTerms],
                ['$set' => ['payment.$.counter' => $helper->getDocumentSequenceId((int)$this->paymentTerms,$db->payment_terms,"payment",(int)$_SESSION['companyId'])]]);
       
        } else {
            $cust = iterator_to_array($customer);
            $db->customer->insertOne($cust);

            $db->currency_add->updateOne(['companyID' => (int)$_SESSION['companyId'], 'currency._id' => (int)$this->currencySetting],
                ['$set' => ['currency.$.counter' => $helper->getDocumentSequenceId((int)$this->currencySetting,$db->currency_add,"currency",(int)$_SESSION['companyId'])]]);

            $db->factoring_company_add->updateOne(['companyID' => (int)$_SESSION['companyId'], 'factoring._id' => (int)$this->factoringCompany],
                ['$set' => ['factoring.$.counter' => $helper->getDocumentSequenceId((int)$this->factoringCompany,$db->factoring_company_add,"factoring",(int)$_SESSION['companyId'])]]);
       
            $db->payment_terms->updateOne(['companyID' => (int)$_SESSION['companyId'], 'payment._id' => (int)$this->paymentTerms],
                ['$set' => ['payment.$.counter' => $helper->getDocumentSequenceId((int)$this->paymentTerms,$db->payment_terms,"payment",(int)$_SESSION['companyId'])]]);
       
        }
    }

    // import Excel
    public function importExcel($targetPath, $helper, $db)
    {
        require_once('../excel/excel_reader2.php');
        require_once('../excel/SpreadsheetReader.php');

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());

        for ($i = 0; $i < $sheetCount; $i++) {

            $Reader->ChangeSheet($i);

            $this->setId($helper->getNextSequence("customer", $db));
            $this->companyId = $_SESSION['companyId'];
           
            $count = 0;
            foreach ($Reader as $Row)
            {
                $count++;
                if($count > 1000){
                    echo "Your file should contain atmost 1000 entries. First 1000 entries added successfully"; 
                    break;
                } else {
                    if (isset($Row[0])) {
                        $this->custName = $Row[0];
                    }
                    if (isset($Row[1])) {
                        $this->custAddress = $Row[1];
                    }
                    if (isset($Row[2])) {
                        $this->custLocation = $Row[2];
                    }
                    if (isset($Row[3])) {
                        $this->custZip = $Row[3];
                    }
                    if (isset($Row[4])) {
                        $this->billingAddress = $Row[4];
                    }
                    if (isset($Row[5])) {
                        $this->billingLocation = $Row[5];
                    }
                    if (isset($Row[6])) {
                        $this->billingZip = $Row[6];
                    }
                    if (isset($Row[7])) {
                        $this->primaryContact = $Row[7];
                    }
                    if (isset($Row[8])) {
                        $this->custTelephone = $Row[8];
                    }
                    if (isset($Row[9])) {
                        $this->custExt = $Row[9];
                    }
                    if (isset($Row[10])) {
                        $this->custEmail = $Row[10];
                    }
                    if (isset($Row[11])) {
                        $this->custFax = $Row[11];
                    }
                    if (isset($Row[12])) {
                        $this->billingContact = $Row[12];
                    }
                    if (isset($Row[13])) {
                        $this->billingEmail = $Row[13];
                    }
                    if (isset($Row[14])) {
                        $this->billingTelephone = $Row[14];
                    }
                    if (isset($Row[15])) {
                        $this->billingExt = $Row[15];
                    }
                    if (isset($Row[16])) {
                        $this->URS = $Row[16];
                    }
                    if (isset($Row[17])) {
                        $this->currencySetting = $Row[17];
                    }
                    if (isset($Row[18])) {
                        $this->paymentTerms = $Row[18];
                    }
                    if (isset($Row[19])) {
                        $this->creditLimit = $Row[19];
                    }
                    if (isset($Row[20])) {
                        $this->salesRep = $Row[20];
                    }
                    if (isset($Row[21])) {
                        $this->factoringCompany = $Row[21];
                    }
                    if (isset($Row[22])) {
                        $this->federalID = $Row[22];
                    }
                    if (isset($Row[23])) {
                        $this->workerComp = $Row[23];
                    }
                    if (isset($Row[24])) {
                        $this->websiteURL = $Row[24];
                    }
                    if (isset($Row[25])) {
                        $this->internalNotes = $Row[25];
                    }
                    if (isset($Row[26])) {
                        $this->MC = $Row[26];
                    }

                    $this->insert($this, $db,$helper);
                }
            }
        }
        unlink($targetPath);
    }

    // export customer
    public function exportCustomer($db)
    {
        $customer = $db->customer->find(['companyID' => $_SESSION['companyId']]);
        foreach ($customer as $cust) {
            $show = $cust['customer'];
            foreach ($show as $s) {
                $p[] = array($s['custName'],$s['custAddress'],$s['custLocation'],$s['custZip'],
                    $s['billingAddress'],$s['billingLocation'],$s['billingZip'],$s['primaryContact'],
                    $s['custTelephone'],$s['custExt'],$s['custEmail'],$s['custFax'],
                    $s['billingContact'],$s['billingEmail'],$s['billingTelephone'],$s['billingExt'],
                    $s['URS'],$s['currencySetting'],$s['paymentTerms'],$s['creditLimit'],
                    $s['salesRep'],$s['factoringCompany'],$s['federalID'],$s['workerComp'],
                    $s['websiteURL'],$s['internalNotes'],$s['MC']
                );
            }
        }
        echo json_encode($p);
    }

    // update function
    public function updateCustomer($customer, $db)
    {
        $db->customer->updateOne(['companyID' => (int)$_SESSION['companyId'], 'customer._id' => (int)$this->getId()],
            ['$set' => ['customer.$.' . $customer->getColumn() => $customer->getCustName()]]
        );
    }

    // delete fucntion
    public function deleteCustomer($customer, $db, $helper)
    {
        $db->customer->updateOne(['companyID' => (int)$_SESSION['companyId'],'_id' => (int)$this->masterID], [
            '$pull' => ['customer' => ['_id' => (int)$customer->getId()]]]
        );

        $db->currency_add->updateOne(['companyID' => (int)$_SESSION['companyId'], 'currency._id' => (int)$this->currencySetting],
                ['$set' => ['currency.$.counter' => $helper->getDocumentDecrementId((int)$this->currencySetting,$db->currency_add,"currency",(int)$_SESSION['companyId'])]]);

        $db->factoring_company_add->updateOne(['companyID' => (int)$_SESSION['companyId'], 'factoring._id' => (int)$this->factoringCompany],
            ['$set' => ['factoring.$.counter' => $helper->getDocumentDecrementId((int)$this->factoringCompany,$db->factoring_company_add,"factoring",(int)$_SESSION['companyId'])]]);
    
        $db->payment_terms->updateOne(['companyID' => (int)$_SESSION['companyId'], 'payment._id' => (int)$this->paymentTerms],
            ['$set' => ['payment.$.counter' => $helper->getDocumentDecrementId((int)$this->paymentTerms,$db->payment_terms,"payment",(int)$_SESSION['companyId'])]]);
    
    }
    
    // edit customer function
    public function EditCustomerDetail($customer, $db,$helper)
    {
        $db->customer->updateOne(['companyID' => (int)$_SESSION['companyId'],'_id' => (int)$this->masterID, 'customer._id' => (int)$this->getId()],
            ['$set' => [
                'customer.$.custName' => $this->custName,
                'customer.$.custAddress' => $this->custAddress,
                'customer.$.custLocation' => $this->custLocation,
                'customer.$.custZip' => $this->custZip,
                'customer.$.billingAddress' => $this->billingAddress,
                'customer.$.billingLocation' => $this->billingLocation,
                'customer.$.billingZip' => $this->billingZip,
                'customer.$.primaryContact' => $this->primaryContact,
                'customer.$.custTelephone' => $this->custTelephone,
                'customer.$.custExt' => $this->custExt,
                'customer.$.custEmail' => $this->custEmail,
                'customer.$.custFax' => $this->custFax,
                'customer.$.billingContact' => $this->billingContact,
                'customer.$.billingEmail' => $this->billingEmail,
                'customer.$.billingTelephone' => $this->billingTelephone,
                'customer.$.billingExt' => $this->billingExt,
                'customer.$.URS' => $this->URS,
                'customer.$.currencySetting' => $this->currencySetting,
                'customer.$.paymentTerms' => $this->paymentTerms,
                'customer.$.creditLimit' => $this->creditLimit,
                'customer.$.salesRep' => $this->salesRep,
                'customer.$.factoringCompany' => $this->factoringCompany,
                'customer.$.federalID' => $this->federalID,
                'customer.$.workerComp' => $this->workerComp,
                'customer.$.websiteURL' => $this->websiteURL,
                'customer.$.internalNotes' => $this->internalNotes,
                'customer.$.MC' => $this->MC,
                'customer.$.blacklisted' => $this->blacklisted,
                'customer.$.numberOninvoice' => $this->numberOninvoice,
                'customer.$.customerRate' => $this->customerRate,
                ]]
        );
    }

}