<?php
@session_start();
/**
 * Created by PhpStorm.
 * User: Chetan
 * Date: 1/16/2020
 * Time: 9:25 PM
 */

class Currency implements IteratorAggregate
{
    private $id;
    private $companyID;
    private $currencyType;
    private $column;

    /**
     * Currency constructor.
     * @param $id
     * @param $companyID
     * @param $currencyType
     */
//    public function __construct($id, $companyID, $currencyType)
//    {
//        $this->id = $id;
//        $this->companyID = $companyID;
//        $this->currencyType = $currencyType;
//    }

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
    public function getCurrencyType()
    {
        return $this->currencyType;
    }

    /**
     * @param mixed $currencyType
     */
    public function setCurrencyType($currencyType)
    {
        $this->currencyType = $currencyType;
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
            array(
             '_id'=> $this->id,
            'companyID'=>(int)$this->companyID,
            'counter' => 0,
            'currency' => array(['_id' => 0,'currencyType' => $this->currencyType,'counter' => 0])
        )
      );
    }

    public function insert($currency,$db,$helper)
    {

        $c_id = $db->currency_add->find(['companyID' =>(int)$currency->getCompanyID()]);
        $count = 0;
        foreach ($c_id as $c) {
            $count++;
        }
        if ($count > 0) {
            $db->currency_add->updateOne(['companyID' => (int)$this->companyID],['$push'=>['currency'=>[
                '_id'=>$helper->getDocumentSequence((int)$this->companyID,$db->currency_add),
                'currencyType'=>$this->currencyType,
                'counter' => 0,
            ]]]);
        } else {
            $currency = iterator_to_array($currency);
            $db->currency_add->insertOne($currency);
        }
    }


    //import Excel
    public function importExcel($targetPath, $helper) {

        require_once('../excel/excel_reader2.php');
        require_once('../excel/SpreadsheetReader.php');
        include '../database/connection.php';   // connection

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());

        for ($i = 0; $i < $sheetCount; $i++ )
        {

            $Reader->ChangeSheet($i);

            foreach ($Reader as $Row)
            {
                if(isset($Row[0])) {
                    $this->currencyType = $Row[0];
                    $this->companyID = $_SESSION['companyId'];
                    $this->setId($helper->getNextSequence("currencycount",$db));
                }
                $this->Insert($this,$db,$helper);
            }
        }

    }
    

    //update
    public function updateCurrency($currency,$db){
//            $db->currency_add->updateOne(
//            ['companyID' => $_SESSION['companyId'] ,'currency._id'=> $currency->getId()],
//            ['$set' => ['currency.$.currencyType'=>'testchetan']
//            ]);
        
              $db->currency_add->updateOne(
              ['companyID' => (int)$_SESSION['companyId'],'currency._id' => (int)$this->getId()],
              ['$set' => ['currency.$.'.$currency->getColumn() => $currency->getCurrencyType()]
              ]);
    }

    //Delete
    public function deleteCurrency($currency,$db){
//        $db->currency_add->deleteOne(['_id' => (int)$currency->getId()]);
          $db->currency_add->updateOne(['companyID' => (int)$_SESSION['companyId']], 
          ['$pull' => ['currency' => ['_id' => (int)$currency->getId()]]]
        );
    }

    //Export
    public function exportCurrency($db){
        $currency = $db->currency_add->find(['companyID' => $_SESSION['companyId']]);
        foreach ($currency as $type) {
            $currency1 = $type['currency'];
            foreach ($currency1 as $type1) {
                $p[] = array($type1['currencyType']);
            }
        }
        echo json_encode($p);
    }
}