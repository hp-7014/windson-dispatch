<?php
@session_start();
/**
 * Created by PhpStorm.
 * User: Chetan
 * Date: 1/20/2020
 * Time: 10:49 PM
 */

class Fixpay implements IteratorAggregate
{
    private $id;
    private $companyID;
    private $fixpay;
    private $column;

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
    public function getFixpay()
    {
        return $this->fixpay;
    }

    /**
     * @param mixed $fixpay
     */
    public function setFixpay($fixpay)
    {
        $this->fixpay = $fixpay;
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
        // TODO: Implement getIterator() method.
        return new ArrayIterator(
            array
            (
                '_id'=> $this->id,
                'companyID'=>(int)$this->companyID,
                'counter' => 0,
                'fixPay' => array(['_id' => 0,'fixPayType' => $this->fixpay, 'counter' => 0])
            )
        );
    }

    public function insert($fixpay,$db,$helper)
    {
        $c_id = $db->fixpay_add->find(['companyID' =>(int)$fixpay->getCompanyID()]);
        $count = 0;
        foreach ($c_id as $c) {
            $count++;
        }
        if ($count > 0) {
            $db->fixpay_add->updateOne(['companyID' => (int)$this->companyID],['$push'=>['fixPay'=>[
                '_id'=>$helper->getDocumentSequence((int)$this->companyID,$db->fixpay_add),
                'fixPayType' => $this->fixpay,
                'counter' => 0
            ]]]);
        } else {
            $fixpay = iterator_to_array($fixpay);
            $db->fixpay_add->insertOne($fixpay);
        }
    }

    //import Excel
    public function importExcel($targetPath, $helper, $db) {

        require_once('../excel/excel_reader2.php');
        require_once('../excel/SpreadsheetReader.php');

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());

        for ($i = 0; $i < $sheetCount; $i++ )
        {
            $count = 0;
            foreach ($Reader as $Row) {
                $count++;
                if($count > 1000){
                    echo "Your file should contain atmost 1000 entries. First 1000 entries added successfully"; 
                    break;
                } else {
                    if(isset($Row[0])) {
                        $this->fixpay = $Row[0];
                        $this->companyID = $_SESSION['companyId'];
                        $this->setId($helper->getNextSequence("fixpaycount",$db));
                    }
                    $this->Insert($this,$db,$helper);
                }
            }
        }
        unlink($targetPath);
    }

    //update
    public function updatefixpay($fixpay,$db){
//        $db->fixpay_add->updateOne(
//            ['_id' => (int)$fixpay->getID()],
//            ['$set' => [$fixpay->getColumn()=> $fixpay->getFixpay()]
//            ]);
        
          $db->fixpay_add->updateOne(
              ['companyID' => (int)$_SESSION['companyId'],'fixPay._id' => (int)$this->getId()],
              ['$set' => ['fixPay.$.'.$fixpay->getColumn() => $fixpay->getFixpay()]
              ]);
    }

    //Delete
    public function deletefixpay($fixpay,$db){
//        $db->fixpay_add->deleteOne(['_id' => (int)$fixpay->getId()]);
         $db->fixpay_add->updateOne(['companyID' => (int)$_SESSION['companyId']], 
          ['$pull' => ['fixPay' => ['_id' => (int)$fixpay->getId()]]]
        );
    }

    //Export
    public function exportfixpay($db){
        $fixpay = $db->fixpay_add->find(['companyID' => $_SESSION['companyId']]);
        foreach ($fixpay as $type) {
            $fixpay1 = $type['fixPay'];
            foreach ($fixpay1 as $type1) {
                $p[] = array($type1['fixPayType']);
            }
        }
        echo json_encode($p);
    }

}