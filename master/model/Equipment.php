<?php
@session_start();
/**
 * Created by PhpStorm.
 * User: Chetan
 * Date: 1/17/2020
 * Time: 6:01 PM
 */

class Equipment implements IteratorAggregate
{
    private $id;
    private $companyID;
    private $equipment;
    private $column;

    /**
     * Equipment constructor.
     * @param $id
     * @param $companyID
     * @param $equipment
     */
//    public function __construct($id, $companyID, $equipment)
//    {
//        $this->id = $id;
//        $this->companyID = $companyID;
//        $this->equipment = $equipment;
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
    public function getEquipment()
    {
        return $this->equipment;
    }

    /**
     * @param mixed $equipment
     */
    public function setEquipment($equipment)
    {
        $this->equipment = $equipment;
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
            array(
                '_id'=> $this->id,
                'companyID'=>(int)$this->companyID,
                'counter' => 0,
                'equipment' => array(['_id' => 0,'equipmentType' => $this->equipment,'counter' => 0])
            )
        );
    }

    public function insert($equipment,$db,$helper)
    {

        $c_id = $db->equipment_add->find(['companyID' =>(int)$equipment->getCompanyID()]);
        $count = 0;
        foreach ($c_id as $c) {
            $count++;
        }
        if ($count > 0) {
            $db->equipment_add->updateOne(['companyID' => (int)$this->companyID],['$push'=>['equipment'=>[
                '_id'=>$helper->getDocumentSequence((int)$this->companyID,$db->equipment_add),
                'equipmentType' => $this->equipment,
                'counter' => 0
            ]]]);
        } else {
            $equipment = iterator_to_array($equipment);
            $db->equipment_add->insertOne($equipment);
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
                    $this->equipment = $Row[0];
                    $this->companyID = $_SESSION['companyId'];
                    $this->setId($helper->getNextSequence("equipmentcount",$db));
                }
                $this->Insert($this,$db,$helper);
            }
        }

    }

    //update
    public function updateEquipment($equipment,$db){
//        $db->equipment_add->updateOne(
//            ['_id' => (int)$equipment->getID()],
//            ['$set' => [$equipment->getColumn()=> $equipment->getEquipment()]
//            ]);
          $db->equipment_add->updateOne(
              ['companyID' => (int)$_SESSION['companyId'],'equipment._id' => (int)$this->getId()],
              ['$set' => ['equipment.$.'.$equipment->getColumn() => $equipment->getEquipment()]
              ]);
    }

    //Delete
    public function deleteEquipment($equipment,$db){
//        $db->equipment_add->deleteOne(['_id' => (int)$equipment->getId()]);
        $db->equipment_add->updateOne(['companyID' => (int)$_SESSION['companyId']], 
          ['$pull' => ['equipment' => ['_id' => (int)$equipment->getId()]]]
        );
    }

    //Export
    public function exportCurrency($db){
        $equipment = $db->equipment_add->find(['companyID' => $_SESSION['companyId']]);
        foreach ($equipment as $type) {
            $equipment1 = $type['equipment'];
            foreach ($equipment1 as $type1) {
                $p[] = array($type1['equipmentType']);
            }
        }
        echo json_encode($p);
    }
}