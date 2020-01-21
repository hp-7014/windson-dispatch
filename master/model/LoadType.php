<?php
@session_start();

class LoadType implements IteratorAggregate
{
    protected $id;
    protected $companyID;
    protected $LoadName;
    protected $LoadType;
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
    public function getLoadName()
    {
        return $this->LoadName;
    }

    /**
     * @param mixed $LoadName
     */
    public function setLoadName($LoadName): void
    {
        $this->LoadName = $LoadName;
    }

    /**
     * @return mixed
     */
    public function getLoadType()
    {
        return $this->LoadType;
    }

    /**
     * @param mixed $LoadType
     */
    public function setLoadType($LoadType): void
    {
        $this->LoadType = $LoadType;
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
        // TODO: Implement getIterator() method.
        return new ArrayIterator(
            array(
                '_id' => $this->id,
                'companyID' => (int)$this->companyID,
                'loadName' => $this->LoadName,
                'loadType' => $this->LoadType
            )
        );
    }

    public function insert($load_type, $db)
    {
        $load = iterator_to_array($load_type);
        $db->load_type->insertOne($load);
    }

    public function update($load_type, $db)
    {
        $db->load_type->updateOne(
            ['_id' => (int)$load_type->getId()],
            ['$set' => [$load_type->getColumn() => $load_type->getLoadName()]
            ]);
    }

    public function delete($load_type, $db)
    {
        $db->load_type->deleteOne(['_id' => (int)$load_type->getId()]);
    }

    public function export($db)
    {
        $load = $db->load_type->find(['companyID' => $_SESSION['companyId']]);
        foreach ($load as $l) {
            $lo[] = array($l['loadName'],$l['loadType']);
        }
        echo json_encode($lo);
    }

    public function importExcel($targetPath, $helper)
    {

        require_once('../excel/excel_reader2.php');
        require_once('../excel/SpreadsheetReader.php');
        include '../database/connection.php';   // connection

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());

        for ($i = 0; $i < $sheetCount; $i++) {

            $Reader->ChangeSheet($i);

            foreach ($Reader as $Row) {
                $this->setId($helper->getNextSequence("loadType", $db));
                $this->companyID = $_SESSION['companyId'];
                if (isset($Row[0])) {
                    $this->LoadName = $Row[0];
                }
                if (isset($Row[1])) {
                    $this->LoadType = $Row[1];
                }

                $this->Insert($this, $db);
            }
        }
    }

}