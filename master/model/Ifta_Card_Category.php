<?php
    @session_start();

class Ifta_Card_Category implements IteratorAggregate
{
    private $id;
    private $companyID;
    private $cardHolderName;
    private $employeeNo;
    private $iftaCardNo;
    private $cardType;

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
    public function getIftaCardNo()
    {
        return $this->iftaCardNo;
    }

    /**
     * @param mixed $iftaCardNo
     */
    public function setIftaCardNo($iftaCardNo)
    {
        $this->iftaCardNo = $iftaCardNo;
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
     * @inheritDoc
     */
    public function getIterator()
    {
        return new ArrayIterator(
            array('_id'=> $this->id,
                'companyID'=>(int) $this->companyID,
                'counter' => 0,
                'ifta_card' => array([
                        '_id' => 0,
                        'cardHolderName'=>$this->cardHolderName,
                        'employeeNo'=>$this->employeeNo,
                        'iftaCardNo'=>$this->iftaCardNo,
                        'cardType'=>$this->cardType,
                ])
            )
        );
    }

    public function insert($category,$db,$helper)
    {
        $c_id = $db->ifta_card_category->find(['companyID' =>(int)$category->getCompanyID()]);
        $count = 0;
        foreach ($c_id as $c) {
            $count++;
        }
        if ($count > 0) {
            $db->ifta_card_category->updateOne(['companyID' => (int)$this->companyID],['$push'=>['ifta_card'=>[
                '_id'=>$helper->getDocumentSequence((int)$this->companyID,$db->ifta_card_category),
                'cardHolderName'=>$this->cardHolderName,
                'employeeNo'=>$this->employeeNo,
                'iftaCardNo'=>$this->iftaCardNo,
                'cardType'=>$this->cardType
            ]]]);
        } else {
            $ifta_card = iterator_to_array($category);
            $db->ifta_card_category->insertOne($ifta_card);
        }

        echo "Data Insert Successfully";
    }

    public function updateIftaCard($debit,$db){
        $db->ifta_card_category->updateOne(['companyID' => (int)$_SESSION['companyId'], 'ifta_card._id' => (int)$this->getId()],
            ['$set' => ['ifta_card.$.' . $debit->getColumn() => $debit->getCardHolderName()]]
        );

        echo "Data Update Successfully.";
    }

    public function deleteIftaCard($i_card,$db) {
        $db->ifta_card_category->updateOne(['companyID' => (int)$_SESSION['companyId']], [
                '$pull' => ['ifta_card' => ['_id' => (int)$i_card->getId()]]]
        );
    }

    public function importIftaCard($targetPath, $helper)
    {

        require_once('../excel/excel_reader2.php');
        require_once('../excel/SpreadsheetReader.php');
        include '../database/connection.php';   // connection

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());

        for ($i = 0; $i < $sheetCount; $i++) {

            $Reader->ChangeSheet($i);

            foreach ($Reader as $Row) {
                $this->setId($helper->getNextSequence("ifta_card_cat", $db));
                $this->companyID = $_SESSION['companyId'];
                if (isset($Row[0])) {
                    $this->cardHolderName = $Row[0];
                }
                if (isset($Row[1])) {
                    $this->employeeNo = $Row[1];
                }
                if (isset($Row[2])) {
                    $this->iftaCardNo = $Row[2];
                }
                if (isset($Row[3])) {
                    $this->cardType = $Row[3];
                }

                $this->insert($this, $db,$helper);
            }
        }
    }

    public function exportIftaCard($db)
    {
        $ifta_card = $db->ifta_card_category->find(['companyID' => $_SESSION['companyId']]);
        foreach ($ifta_card as $bdebit) {
            $i_card = $bdebit['ifta_card'];
            foreach ($i_card as $test) {
                $p[] = array(
                    $test['cardHolderName'],
                    $test['employeeNo'],
                    $test['iftaCardNo'],
                    $test['cardType'],
                );
            }
        }
        echo json_encode($p);
    }

}