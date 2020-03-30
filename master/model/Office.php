<?php
@session_start();

/**
 * Created by PhpStorm.
 * User: BOND
 * Date: 1/16/2020
 * Time: 9:35 PM
 */
class Office implements IteratorAggregate
{
    protected $id;
    protected $companyID;
    protected $officeName;
    protected $officeLocation;
    protected $column;

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
    public function getOfficeName()
    {
        return $this->officeName;
    }

    /**
     * @param mixed $officeName
     */
    public function setOfficeName($officeName): void
    {
        $this->officeName = $officeName;
    }

    /**
     * @return mixed
     */
    public function getOfficeLocation()
    {
        return $this->officeLocation;
    }

    /**
     * @param mixed $officeLocation
     */
    public function setOfficeLocation($officeLocation): void
    {
        $this->officeLocation = $officeLocation;
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

    /**
     * PaymentTerms constructor.
     * @param $id
     * @param $companyID
     * @param $payment_term
     */

    public function getIterator()
    {
        // TODO: Implement getIterator() method.
        return new ArrayIterator(
            array(
                '_id' => $this->id,
                'companyID' => (int)$this->companyID,
                'counter' => 0,
                'office' => array([
                    '_id' => 0,
                    'officeName' => $this->officeName,
                    'officeLocation' => $this->officeLocation,
                    'counter' => 0
                ])
            )
        );
    }

    public function insert($office, $db, $helper)
    {

        $c_id = $db->office->find(['companyID' => (int)$office->getCompanyID()]);
        $count = 0;
        foreach ($c_id as $c) {
            $count++;
        }
        if ($count > 0) {
            $db->office->updateOne(['companyID' => (int)$this->companyID], ['$push' => ['office' => [
                '_id' => $helper->getDocumentSequence((int)$this->companyID, $db->office),
                'officeName' => $this->officeName,
                'officeLocation' => $this->officeLocation,
                'counter' => 0
            ]]]);
        } else {
            $office = iterator_to_array($office);
            $db->office->insertOne($office);
        }
    }

    public function update($office, $db)
    {
//        $db->office->updateOne(
//            ['_id' => (int)$office->getId()],
//            ['$set' => [$office->getColumn()=> $office->getOfficeName()]
//            ]);
        $db->office->updateOne(['companyID' => (int)$_SESSION['companyId'], 'office._id' => (int)$this->getId()],
            ['$set' => ['office.$.' . $office->getColumn() => $office->getOfficeName()]]
        );
    }

    public function delete($office, $db)
    {
//        $db->office->deleteOne(['_id' => (int)$office->getId()]);
        $db->office->updateOne(['companyID' => (int)$_SESSION['companyId']], [
                '$pull' => ['office' => ['_id' => (int)$office->getId()]]]
        );
    }

    public function importExcel($targetPath, $helper, $db)
    {
        require_once('../excel/excel_reader2.php');
        require_once('../excel/SpreadsheetReader.php');

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());

        for ($i = 0; $i < $sheetCount; $i++) {

            $Reader->ChangeSheet($i);

            foreach ($Reader as $Row) {
                $this->setId($helper->getNextSequence("office", $db));
                $this->companyID = $_SESSION['companyId'];
                if (isset($Row[0])) {
                    $this->officeName = $Row[0];
                }
                if (isset($Row[1])) {
                    $this->officeLocation = $Row[1];
                }

                $this->insert($this, $db,$helper);
            }
        }
    }

    public function export($db)
    {
        $office = $db->office->find(['companyID' => $_SESSION['companyId']]);
        foreach ($office as $o) {
            $show = $o['office'];
            foreach ($show as $s) {
                $p[] = array($s['officeName'], $s['officeLocation']);
            }
        }
        echo json_encode($p);
    }

}