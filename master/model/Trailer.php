<?php
@session_start();
/**
 * Created by PhpStorm.
 * User: Chetan
 * Date: 1/17/2020
 * Time: 7:13 PM
 */

class Trailer implements IteratorAggregate
{
    private $id;
    private $companyID;
    private $trailerType;
    private $column;

    /**
     * Trailer constructor.
     * @param $id
     * @param $companyID
     * @param $trailerType
     *      */
//    public function __construct($id, $companyID, $trailerType)
//    {
//        $this->id = $id;
//        $this->companyID = $companyID;
//        $this->trailerType = $trailerType;
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
    public function getTrailerType()
    {
        return $this->trailerType;
    }

    /**
     * @param mixed $trailerType
     */
    public function setTrailerType($trailerType)
    {
        $this->trailerType = $trailerType;
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
                'trailer' => array(['_id' => 0,'trailerType' => $this->trailerType,'counter' => 0])
            )
        );
    }

    public function insert($trailer,$db,$helper)
    {
        $c_id = $db->trailer_add->find(['companyID' =>(int)$trailer->getCompanyID()]);
        $count = 0;
        foreach ($c_id as $c) {
            $count++;
        }
        if ($count > 0) {
            $db->trailer_add->updateOne(['companyID' => (int)$this->companyID],['$push'=>['trailer'=>[
                '_id'=>$helper->getDocumentSequence((int)$this->companyID,$db->trailer_add),
                'trailerType' => $this->trailerType,
                'counter' => 0
            ]]]);
        } else {
            $trailer = iterator_to_array($trailer);
            $db->trailer_add->insertOne($trailer);
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
                    $this->trailerType = $Row[0];
                    $this->companyID = $_SESSION['companyId'];
                    $this->setId($helper->getNextSequence("trailercount",$db));
                }
                $this->Insert($this,$db,$helper);
            }
        }

    }

    //update
    public function updateTrailer($trailer,$db){
//        $db->trailer_add->updateOne(
//            ['_id' => (int)$trailer->getID()],
//            ['$set' => [$trailer->getColumn()=> $trailer->getTrailerType()]
//            ]);
        $db->trailer_add->updateOne(
            ['companyID' => (int)$_SESSION['companyId'],'trailer._id' => (int)$this->getId()],
            ['$set' => ['trailer.$.'.$trailer->getColumn() => $trailer->getTrailerType()]
        ]);
    }

    //Delete
    public function deleteTrailer($trailer,$db){
//        $db->trailer_add->deleteOne(['_id' => (int)$trailer->getId()]);
        $db->trailer_add->updateOne(['companyID' => (int)$_SESSION['companyId']],
            ['$pull' => ['trailer' => ['_id' => (int)$trailer->getId()]]]
        );
    }
    

    //Export
    public function exportTrailer($db){
        $trailer = $db->trailer_add->find(['companyID' => $_SESSION['companyId']]);
        foreach ($trailer as $type) {
            $trailer1 = $type['trailer'];
            foreach ($trailer1 as $type1) {
                $p[] = array($type1['trailerType']);
            }
        }
        echo json_encode($p);
    }

}