<?php 
@session_start();

class FuelCard implements IteratorAggregate
{
    private $id;
    private $companyID;
    private $fuelCardType;
    private $openingfuelBal;
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
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getOpeningfuelBal()
    {
        return $this->openingfuelBal;
    }

    /**
     * @param mixed $openingfuelBal
     */
    public function setOpeningfuelBal($openingfuelBal): void
    {
        $this->openingfuelBal = $openingfuelBal;
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
    public function getFuelCardType()
    {
        return $this->fuelCardType;
    }

    /**
     * @param mixed $fuelCardType
     */
    public function setFuelCardType($fuelCardType): void
    {
        $this->fuelCardType = $fuelCardType;
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
    public function setColumn($column): void
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
                'fuelCard' => array(['_id' => 0,'fuelCardType' => $this->fuelCardType,'openingfuelBal'=>$this->openingfuelBal,'counter' => 0])
            )
        );
    }

    public function insert($category,$db,$helper)
    {
        $c_id = $db->fuel_Card_Type->find(['companyID' =>(int)$category->getCompanyID()]);
        $count = 0;
        foreach ($c_id as $c) {
            $count++;
        }
        if ($count > 0) {
            $db->fuel_Card_Type->updateOne(['companyID' => (int)$this->companyID],['$push'=>['fuelCard'=>[
                '_id'=>$helper->getDocumentSequence((int)$this->companyID,$db->fuel_Card_Type),
                'fuelCardType'=>$this->fuelCardType,
                'openingfuelBal'=>$this->openingfuelBal,
                'counter'=>0
            ]]]);
        } else {
            $credit = iterator_to_array($category);
            $db->fuel_Card_Type->insertOne($credit);
        }

        echo "Data Insert Successfully";
    }

    public function updateFuelCard($fuel,$db) {
        $db->fuel_Card_Type->updateOne(['companyID' => (int)$_SESSION['companyId'], 'fuelCard._id' => (int)$this->getId()],
            ['$set' => ['fuelCard.$.' . $fuel->getColumn() => $fuel->getFuelCardType()]]
        );
    }

    public function deleteFuelCard($fuel,$db) {
        $db->fuel_Card_Type->updateOne(['companyID' => (int)$_SESSION['companyId']], [
            '$pull' => ['fuelCard' => ['_id' => (int)$fuel->getId()]]]
        );
    }
    
    public function exportExcelfuel($db) {
        $fuel = $db->fuel_Card_Type->find(['companyID' => $_SESSION['companyId']]);
        foreach ($fuel as $c_credit) {
            $fuelCard = $c_credit['fuelCard'];
            foreach ($fuelCard as $test) {
                $p[] = array($test['fuelCardType']);
            }
        }
        echo json_encode($p);
    }
    
    public function importFuel($targetPath, $helper, $db) 
    {
        require_once('../excel/excel_reader2.php');
        require_once('../excel/SpreadsheetReader.php');
        
        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());
        
        for ($i = 0; $i < $sheetCount; $i++ )
        {
            $Reader->ChangeSheet($i);
            $count = 0;
            foreach ($Reader as $Row)
            {
                $count++;
                if($count > 1000){
                    echo "Your file should contain atmost 1000 entries. First 1000 entries added successfully"; 
                    break;
                } else {
                    if(isset($Row[0])) {
                        $this->fuelCardType = $Row[0];
                        $this->companyID =$_SESSION['companyId'];
                        $this->setId($helper->getNextSequence("fuel_Card_Type",$db));
                    }
                    $this->Insert($this,$db,$helper);
                }
            }
        }
        unlink($targetPath);
    }
    
}

?>