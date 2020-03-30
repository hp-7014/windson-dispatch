<?php
@session_start();

class Add_Toll implements IteratorAggregate
{
    private $id;
    private $companyID;
    private $invoiceNumber;
    private $tollDate;
    private $transType;
    private $location;
    private $transponder;
    private $amount;
    private $licensePlate;
    private $truckNo;

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
    public function getInvoiceNumber()
    {
        return $this->invoiceNumber;
    }

    /**
     * @param mixed $invoiceNumber
     */
    public function setInvoiceNumber($invoiceNumber)
    {
        $this->invoiceNumber = $invoiceNumber;
    }

    /**
     * @return mixed
     */
    public function getTollDate()
    {
        return $this->tollDate;
    }

    /**
     * @param mixed $tollDate
     */
    public function setTollDate($tollDate)
    {
        $this->tollDate = $tollDate;
    }

    /**
     * @return mixed
     */
    public function getTransType()
    {
        return $this->transType;
    }

    /**
     * @param mixed $transType
     */
    public function setTransType($transType)
    {
        $this->transType = $transType;
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
    public function getTransponder()
    {
        return $this->transponder;
    }

    /**
     * @param mixed $transponder
     */
    public function setTransponder($transponder)
    {
        $this->transponder = $transponder;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getLicensePlate()
    {
        return $this->licensePlate;
    }

    /**
     * @param mixed $licensePlate
     */
    public function setLicensePlate($licensePlate)
    {
        $this->licensePlate = $licensePlate;
    }

    /**
     * @return mixed
     */
    public function getTruckNo()
    {
        return $this->truckNo;
    }

    /**
     * @param mixed $truckNo
     */
    public function setTruckNo($truckNo)
    {
        $this->truckNo = $truckNo;
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
                'tolls' => array([
                    '_id' => 0,
                    'counter'=>0,
                    'invoiceNumber'=>$this->invoiceNumber,
                    'tollDate'=>$this->tollDate,
                    'transType'=>$this->transType,
                    'location'=>$this->location,
                    'transponder'=>$this->transponder,
                    'amount'=>$this->amount,
                    'licensePlate'=>$this->licensePlate,
                    'truckNo'=>$this->truckNo,
                    'delete_status'=>'0',
                    'insertedUser' => $_SESSION['companyName'],
                ])
            )
        );
    }

    public function insert($category,$db,$helper)
    {
        $c_id = $db->ifta_toll->find(['companyID' =>(int)$category->getCompanyID()]);
        $count = 0;
        foreach ($c_id as $c) {
            $count++;
        }
        if ($count > 0) {
            $db->ifta_toll->updateOne(['companyID' => (int) $this->companyID],['$push'=>['tolls'=>[
                '_id'=>$helper->getDocumentSequence((int) $this->companyID,$db->ifta_toll),
                'counter'=>0,
                'invoiceNumber'=>$this->invoiceNumber,
                'tollDate'=>$this->tollDate,
                'transType'=>$this->transType,
                'location'=>$this->location,
                'transponder'=>$this->transponder,
                'amount'=>$this->amount,
                'licensePlate'=>$this->licensePlate,
                'truckNo'=>$this->truckNo,
                'delete_status'=>'0',
                'insertedUser' => $_SESSION['companyName'],
            ]]]);

            $db->truckadd->updateOne(['companyID' => (int)$_SESSION['companyId'], 'truck._id' => (int)$this->truckNo],
            ['$set' => ['truck.$.counter' => $helper->getDocumentSequenceId((int)$this->truckNo,$db->truckadd,"truck",(int)$_SESSION['companyId'])]]);
   
        } else {
            $toll_A = iterator_to_array($category);
            $db->ifta_toll->insertOne($toll_A);

            $db->truckadd->updateOne(['companyID' => (int)$_SESSION['companyId'], 'truck._id' => (int)$this->truckNo],
            ['$set' => ['truck.$.counter' => $helper->getDocumentSequenceId((int)$this->truckNo,$db->truckadd,"truck",(int)$_SESSION['companyId'])]]);
   
        }

        echo "Data Insert Successfully";
    }

    public function update_Tolls($toll_A, $db) {
        $db->ifta_toll->updateOne(['companyID' => (int) $_SESSION['companyId'], 'tolls._id' => (int)$this->getId()],
            ['$set' => ['tolls.$.' . $toll_A->getColumn() => $toll_A->getInvoiceNumber()]]
        );

        echo "Data Update Successfully.";
    }

    public function delete_Tolls($toll_A,$db,$helper) {
        // $db->ifta_toll->updateOne(['companyID' => (int)$_SESSION['companyId'], 'tolls._id' => (int)$this->getId()],
        //     ['$set' => ['tolls.$.delete_status' => "1"]]
        // );
        $db->ifta_toll->updateOne(['companyID' => (int)$_SESSION['companyId']], [
            '$pull' => ['tolls' => ['_id' => (int)$toll_A->getId()]]]
        );

        $db->truckadd->updateOne(['companyID' => (int)$_SESSION['companyId'], 'truck._id' => (int)$this->truckNo],
        ['$set' => ['truck.$.counter' => $helper->getDocumentDecrementId((int)$this->truckNo,$db->truckadd,"truck",(int)$_SESSION['companyId'])]]);        
    }

    public function export_Tolls($db) {
        $i_fuel = $db->ifta_toll->find(['companyID' => $_SESSION['companyId']]);
        foreach ($i_fuel as $bdebit) {
            $fuel_R = $bdebit['tolls'];
            foreach ($fuel_R as $test) {
                if ($test['delete_status'] == '0') {
                    $p[] = array(
                        $test['invoiceNumber'],
                        $test['tollDate'],
                        $test['transType'],
                        $test['location'],
                        $test['transponder'],
                        $test['amount'],
                        $test['licensePlate'],
                        $test['truckNo'],
                    );
                }
            }
        }
        echo json_encode($p);
    }

    public function import_Tolls($targetPath, $helper, $db)
    {
        require_once('../excel/excel_reader2.php');
        require_once('../excel/SpreadsheetReader.php');

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());

        for ($i = 0; $i < $sheetCount; $i++) {

            $Reader->ChangeSheet($i);

            foreach ($Reader as $Row) {
                $this->companyID = $_SESSION['companyId'];
                $this->setId($helper->getNextSequence("toll_data",$db));
                if(isset($Row[0])) {
                    $this->invoiceNumber = $Row[0];
                }
                if(isset($Row[1])) {
                    $this->tollDate = $Row[1];
                }
                if(isset($Row[2])) {
                    $this->transType = $Row[2];
                }
                if(isset($Row[3])) {
                    $this->location = $Row[3];
                }
                if(isset($Row[4])) {
                    $this->transponder = $Row[4];
                }
                if(isset($Row[5])) {
                    $this->amount = $Row[5];
                }
                if(isset($Row[6])) {
                    $this->licensePlate = $Row[6];
                }
                if(isset($Row[7])) {
                    $this->truckNo = $Row[7];
                }

                $this->Insert($this,$db,$helper);
            }
        }
    }
}