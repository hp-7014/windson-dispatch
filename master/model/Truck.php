<?php
@session_start();
/**
 * Created by PhpStorm.
 * User: Chetan
 * Date: 1/17/2020
 * Time: 6:58 PM
 */

class Truck implements IteratorAggregate
{
    private $id;
    private $companyID;
    private $truckType;
    private $column;

    /**
     * Truck constructor.
     * @param $id
     * @param $companyID
     * @param $truckType
     */
//    public function __construct($id, $companyID, $truckType)
//    {
//        $this->id = $id;
//        $this->companyID = $companyID;
//        $this->truckType = $truckType;
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
                'truck' => array(['_id' => 0,'truckType' => $this->truckType,'counter' => 0])
            )
        );
    }

    public function insert($truck,$db,$helper)
    {
        $c_id = $db->truck_add->find(['companyID' =>(int)$truck->getCompanyID()]);
        $count = 0;
        foreach ($c_id as $c) {
            $count++;
        }
        if ($count > 0) {
            $db->truck_add->updateOne(['companyID' => (int)$this->companyID],['$push'=>['truck'=>[
                '_id'=>$helper->getDocumentSequence((int)$this->companyID,$db->truck_add),
                'truckType'=>$this->truckType,
                'counter' => 0,
            ]]]);
        } else {
            $truck = iterator_to_array($truck);
            $db->truck_add->insertOne($truck);
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

            $Reader->ChangeSheet($i);

            foreach ($Reader as $Row)
            {
                if(isset($Row[0])) {
                    $this->truckType = $Row[0];
                    $this->companyID = $_SESSION['companyId'];
                    $this->setId($helper->getNextSequence("trucktypecount",$db));
                }
                $this->Insert($this,$db,$helper);
            }
        }

    }
    //update
    public function updateTruck($truck,$db){
//        $db->truck_add->updateOne(
//            ['_id' => (int)$truck->getID()],
//            ['$set' => [$truck->getColumn()=> $truck->getTruckType()]
//            ]);
        $db->truck_add->updateOne(
            ['companyID' => (int)$_SESSION['companyId'],'truck._id' => (int)$this->getId()],
            ['$set' => ['truck.$.'.$truck->getColumn() => $truck->getTruckType()]
            ]);
    }

    //Delete
    public function deleteTruck($truck,$db){
//        $db->truck_add->deleteOne(['_id' => (int)$truck->getId()]);
        $db->truck_add->updateOne(['companyID' => (int)$_SESSION['companyId']],
            ['$pull' => ['truck' => ['_id' => (int)$truck->getId()]]]
        );
    }

    //Export
    public function exportTruck($db){
        $truck = $db->truck_add->find(['companyID' => $_SESSION['companyId']]);
        foreach ($truck as $type) {
            $truck1 = $type['truck'];
            foreach ($truck1 as $type1) {
                $p[] = array($type1['truckType']);
            }
        }
        echo json_encode($p);
    }

}