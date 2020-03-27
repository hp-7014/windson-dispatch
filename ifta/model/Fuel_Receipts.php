<?php
@session_start();

class Fuel_Receipts implements IteratorAggregate
{
    private $id;
    private $companyID;
    private $cardHolderName;
    private $employeeNo;
    private $cardNo;
    private $cardType;
    private $unit_number;
    private $fuelDate;
    private $transacTime;
    private $merchantName;
    private $merchantCity;
    private $statePurch;
    private $dGallons;
    private $dGrossCost;
    private $cashAdvanced;
    private $discountAmt;
    private $totalAmt;
    private $invoiceNo;

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
    public function getCardHolderName()
    {
        return $this->cardHolderName;
    }

    /**
     * @param mixed $cardHolderName
     */
    public function setCardHolderName($cardHolderName)
    {
        $this->cardHolderName = $cardHolderName;
    }

    /**
     * @return mixed
     */
    public function getEmployeeNo()
    {
        return $this->employeeNo;
    }

    /**
     * @param mixed $employeeNo
     */
    public function setEmployeeNo($employeeNo)
    {
        $this->employeeNo = $employeeNo;
    }

    /**
     * @return mixed
     */
    public function getCardNo()
    {
        return $this->cardNo;
    }

    /**
     * @param mixed $cardNo
     */
    public function setCardNo($cardNo)
    {
        $this->cardNo = $cardNo;
    }

    /**
     * @return mixed
     */
    public function getCardType()
    {
        return $this->cardType;
    }

    /**
     * @param mixed $cardType
     */
    public function setCardType($cardType)
    {
            $this->cardType = $cardType;
    }

    /**
     * @return mixed
     */
    public function getUnitNumber()
    {
        return $this->unit_number;
    }

    /**
     * @param mixed $unit_number
     */
    public function setUnitNumber($unit_number)
    {
        $this->unit_number = $unit_number;
    }

    /**
     * @return mixed
     */
    public function getFuelDate()
    {
        return $this->fuelDate;
    }

    /**
     * @param mixed $fuelDate
     */
    public function setFuelDate($fuelDate)
    {
        $this->fuelDate = $fuelDate;
    }

    /**
     * @return mixed
     */
    public function getTransacTime()
    {
        return $this->transacTime;
    }

    /**
     * @param mixed $transacTime
     */
    public function setTransacTime($transacTime)
    {
        $this->transacTime = $transacTime;
    }

    /**
     * @return mixed
     */
    public function getMerchantName()
    {
        return $this->merchantName;
    }

    /**
     * @param mixed $merchantName
     */
    public function setMerchantName($merchantName)
    {
        $this->merchantName = $merchantName;
    }

    /**
     * @return mixed
     */
    public function getMerchantCity()
    {
        return $this->merchantCity;
    }

    /**
     * @param mixed $merchantCity
     */
    public function setMerchantCity($merchantCity)
    {
        $this->merchantCity = $merchantCity;
    }


    /**
     * @return mixed
     */
    public function getStatePurch()
    {
        return $this->statePurch;
    }

    /**
     * @param mixed $statePurch
     */
    public function setStatePurch($statePurch)
    {
        $this->statePurch = $statePurch;
    }

    /**
     * @return mixed
     */
    public function getDGallons()
    {
        return $this->dGallons;
    }

    /**
     * @param mixed $dGallons
     */
    public function setDGallons($dGallons)
    {
        $this->dGallons = $dGallons;
    }

    /**
     * @return mixed
     */
    public function getDGrossCost()
    {
        return $this->dGrossCost;
    }

    /**
     * @param mixed $dGrossCost
     */
    public function setDGrossCost($dGrossCost)
    {
        $this->dGrossCost = $dGrossCost;
    }

    /**
     * @return mixed
     */
    public function getCashAdvanced()
    {
        return $this->cashAdvanced;
    }

    /**
     * @param mixed $cashAdvanced
     */
    public function setCashAdvanced($cashAdvanced)
    {
        $this->cashAdvanced = $cashAdvanced;
    }

    /**
     * @return mixed
     */
    public function getDiscountAmt()
    {
        return $this->discountAmt;
    }

    /**
     * @param mixed $discountAmt
     */
    public function setDiscountAmt($discountAmt)
    {
        $this->discountAmt = $discountAmt;
    }

    /**
     * @return mixed
     */
    public function getTotalAmt()
    {
        return $this->totalAmt;
    }

    /**
     * @param mixed $totalAmt
     */
    public function setTotalAmt($totalAmt)
    {
        $this->totalAmt = $totalAmt;
    }

    /**
     * @return mixed
     */
    public function getInvoiceNo()
    {
        return $this->invoiceNo;
    }

    /**
     * @param mixed $invoiceNo
     */
    public function setInvoiceNo($invoiceNo)
    {
        $this->invoiceNo = $invoiceNo;
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


    public function getIterator()
    {
        return new ArrayIterator(
            array('_id'=> $this->id,
                'companyID'=>(int) $this->companyID,
                'counter' => 0,
                'fuel_receipt' => array([
                    '_id' => 0,
                    'counter' => 0,
                    'cardHolderName'=>$this->cardHolderName,
                    'employeeNo'=>$this->employeeNo,
                    'cardNo'=>$this->cardNo,
                    'cardType'=>$this->cardType,
                    'unit_number'=>$this->unit_number,
                    'fuelDate'=>$this->fuelDate,
                    'transacTime'=>$this->transacTime,
                    'merchantName'=>$this->merchantName,
                    'merchantCity'=>$this->merchantCity,
                    'statePurch'=>$this->statePurch,
                    'dGallons'=>$this->dGallons,
                    'dGrossCost'=>$this->dGrossCost,
                    'cashAdvanced'=>$this->cashAdvanced,
                    'discountAmt'=>$this->discountAmt,
                    'totalAmt'=>$this->totalAmt,
                    'invoiceNo'=>$this->invoiceNo,
                    'delete_status'=>'0',
                    'insertedUser' => $_SESSION['companyName'],
                ])
            )
        );
    }

    public function insert($category,$db,$helper)
    {
        $c_id = $db->ifta_fuel_receipts->find(['companyID' =>(int)$category->getCompanyID()]);
        $count = 0;
        foreach ($c_id as $c) {
            $count++;
        }
        if ($count > 0) {
            $db->ifta_fuel_receipts->updateOne(['companyID' => (int) $this->companyID],['$push'=>['fuel_receipt'=>[
                '_id'=>$helper->getDocumentSequence((int) $this->companyID,$db->ifta_fuel_receipts),
                'counter'=>0,
                'cardHolderName'=>$this->cardHolderName,
                'employeeNo'=>$this->employeeNo,
                'cardNo'=>$this->cardNo,
                'cardType'=>$this->cardType,
                'unit_number'=>$this->unit_number,
                'fuelDate'=>$this->fuelDate,
                'transacTime'=>$this->transacTime,
                'merchantName'=>$this->merchantName,
                'merchantCity'=>$this->merchantCity,
                'statePurch'=>$this->statePurch,
                'dGallons'=>$this->dGallons,
                'dGrossCost'=>$this->dGrossCost,
                'cashAdvanced'=>$this->cashAdvanced,
                'discountAmt'=>$this->discountAmt,
                'totalAmt'=>$this->totalAmt,
                'invoiceNo'=>$this->invoiceNo,
                'delete_status'=>'0',
                'insertedUser' => $_SESSION['companyName'],
            ]]]);

            $db->ifta_card_category->updateOne(['companyID' => (int)$_SESSION['companyId'], 'ifta_card._id' => (int)$this->cardHolderName],
                ['$set' => ['ifta_card.$.counter' => $helper->getDocumentSequenceId((int)$this->cardHolderName,$db->ifta_card_category,"ifta_card",(int)$_SESSION['companyId'])]]);
       
        } else {
            $fuel_R = iterator_to_array($category);
            $db->ifta_fuel_receipts->insertOne($fuel_R);

            $db->ifta_card_category->updateOne(['companyID' => (int)$_SESSION['companyId'], 'ifta_card._id' => (int)$this->cardHolderName],
                ['$set' => ['ifta_card.$.counter' => $helper->getDocumentSequenceId((int)$this->cardHolderName,$db->ifta_card_category,"ifta_card",(int)$_SESSION['companyId'])]]);
       
        }

        echo "Data Insert Successfully";
    }

    public function update_FuelReceipt($f_receipt,$db){
        $db->ifta_fuel_receipts->updateOne(['companyID' => (int) $_SESSION['companyId'], 'fuel_receipt._id' => (int)$this->getId()],
            ['$set' => ['fuel_receipt.$.' . $f_receipt->getColumn() => $f_receipt->getCardHolderName()]]
        );

        echo "Data Update Successfully.";
    }

    public function delete_FuelReceipts($acc,$db,$helper) {
        $db->ifta_fuel_receipts->updateOne(['companyID' => (int)$_SESSION['companyId']], [
            '$pull' => ['fuel_receipt' => ['_id' => (int)$acc->getId()]]]
        );

        $db->ifta_card_category->updateOne(['companyID' => (int)$_SESSION['companyId'], 'ifta_card._id' => (int)$this->cardHolderName],
            ['$set' => ['ifta_card.$.counter' => $helper->getDocumentDecrementId((int)$this->cardHolderName,$db->ifta_card_category,"ifta_card",(int)$_SESSION['companyId'])]]);
       
    }

    public function export_FuelReceipts($db){
        $i_fuel = $db->ifta_fuel_receipts->find(['companyID' => $_SESSION['companyId']]);
        foreach ($i_fuel as $bdebit) {
            $fuel_R = $bdebit['fuel_receipt'];
            foreach ($fuel_R as $test) {
                $p[] = array(
                    $test['cardHolderName'],
                    $test['employeeNo'],
                    $test['cardNo'],
                    $test['cardType'],
                    $test['unit_number'],
                    $test['fuelDate'],
                    $test['transacTime'],
                    $test['merchantName'],
                    $test['merchantCity'],
                    $test['statePurch'],
                    $test['dGallons'],
                    $test['dGrossCost'],
                    $test['cashAdvanced'],
                    $test['discountAmt'],
                    $test['totalAmt'],
                    $test['invoiceNo'],
                );
            }
        }
        echo json_encode($p);
    }

    public function import_FuelReceipts($targetPath, $helper)
    {
        require_once('../excel/excel_reader2.php');
        require_once('../excel/SpreadsheetReader.php');
        include '../database/connection.php';   // connection

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());

        for ($i = 0; $i < $sheetCount; $i++) {

            $Reader->ChangeSheet($i);

            foreach ($Reader as $Row) {
                $this->companyID = $_SESSION['companyId'];
                $this->setId($helper->getNextSequence("fuel_receipts_ifta",$db));
                if(isset($Row[0])) {
                    $this->cardHolderName = $Row[0];
                }
                if(isset($Row[1])) {
                    $this->employeeNo = $Row[1];
                }
                if(isset($Row[2])) {
                    $this->cardNo = $Row[2];
                }
                if(isset($Row[3])) {
                    $this->cardType = $Row[3];
                }
                if(isset($Row[4])) {
                    $this->unit_number = $Row[4];
                }
                if(isset($Row[5])) {
                    $this->fuelDate = $Row[5];
                }
                if(isset($Row[6])) {
                    $this->transacTime = $Row[6];
                }
                if(isset($Row[7])) {
                    $this->merchantName = $Row[7];
                }
                if(isset($Row[8])) {
                    $this->merchantCity = $Row[8];
                }
                if(isset($Row[9])) {
                    $this->statePurch = $Row[9];
                }
                if(isset($Row[10])) {
                    $this->dGallons = $Row[10];
                }
                if(isset($Row[11])) {
                    $this->dGrossCost = $Row[11];
                }
                if(isset($Row[12])) {
                    $this->cashAdvanced = $Row[12];
                }
                if(isset($Row[13])) {
                    $this->discountAmt = $Row[13];
                }
                if(isset($Row[14])) {
                    $this->totalAmt = $Row[14];
                }
                if(isset($Row[15])) {
                    $this->invoiceNo = $Row[15];
                }

                $this->Insert($this,$db,$helper);
            }
        }
    }


}