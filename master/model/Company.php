<?php
@session_start();

/**
 * Created by PhpStorm.
 * User: BOND
 * Date: 1/19/2020
 * Time: 3:35 PM
 */
class Company implements IteratorAggregate
{
    private $id;
    private $companyID;
    private $companyName;
    private $shippingAddress;
    private $telephoneNo;
    private $faxNo;
    private $mcNo;
    private $usDotNo;
    private $mailingAddress;
    private $factoringCompany;
    private $factoringCompanyAddress;
    protected $column;

    /**
     * @return mixed
     */
    public function getCompanyID()
    {
        return $this->companyID;
    }

    /**
     * @param mixed $CompanyID
     */
    public function setCompanyID($companyID): void
    {
        $this->companyID = $companyID;
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
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * @param mixed $companyName
     */
    public function setCompanyName($companyName): void
    {
        $this->companyName = $companyName;
    }

    /**
     * @return mixed
     */
    public function getShippingAddress()
    {
        return $this->shippingAddress;
    }

    /**
     * @param mixed $shippingAddress
     */
    public function setShippingAddress($shippingAddress): void
    {
        $this->shippingAddress = $shippingAddress;
    }

    /**
     * @return mixed
     */
    public function getTelephoneNo()
    {
        return $this->telephoneNo;
    }

    /**
     * @param mixed $telephoneNo
     */
    public function setTelephoneNo($telephoneNo): void
    {
        $this->telephoneNo = $telephoneNo;
    }

    /**
     * @return mixed
     */
    public function getFaxNo()
    {
        return $this->faxNo;
    }

    /**
     * @param mixed $faxNo
     */
    public function setFaxNo($faxNo): void
    {
        $this->faxNo = $faxNo;
    }

    /**
     * @return mixed
     */
    public function getMcNo()
    {
        return $this->mcNo;
    }

    /**
     * @param mixed $mcNo
     */
    public function setMcNo($mcNo): void
    {
        $this->mcNo = $mcNo;
    }

    /**
     * @return mixed
     */
    public function getUsDotNo()
    {
        return $this->usDotNo;
    }

    /**
     * @param mixed $usDotNo
     */
    public function setUsDotNo($usDotNo): void
    {
        $this->usDotNo = $usDotNo;
    }

    /**
     * @return mixed
     */
    public function getMailingAddress()
    {
        return $this->mailingAddress;
    }

    /**
     * @param mixed $mailingAddress
     */
    public function setMailingAddress($mailingAddress): void
    {
        $this->mailingAddress = $mailingAddress;
    }

    /**
     * @return mixed
     */
    public function getFactoringCompany()
    {
        return $this->factoringCompany;
    }

    /**
     * @param mixed $factoringCompany
     */
    public function setFactoringCompany($factoringCompany): void
    {
        $this->factoringCompany = $factoringCompany;
    }

    /**
     * @return mixed
     */
    public function getFactoringCompanyAddress()
    {
        return $this->factoringCompanyAddress;
    }

    /**
     * @param mixed $factoringCompanyAddress
     */
    public function setFactoringCompanyAddress($factoringCompanyAddress): void
    {
        $this->factoringCompanyAddress = $factoringCompanyAddress;
    }

    public function getIterator()
    {
        // TODO: Implement getIterator() method.
        return new ArrayIterator(
            array(
                '_id' => $this->id,
                'companyID' => (int)$this->companyID,
                'counter' => 0,
                'company' => array([
                    '_id' => 0,
                    'companyName' => $this->companyName,
                    'shippingAddress' => $this->shippingAddress,
                    'telephoneNo' => $this->telephoneNo,
                    'faxNo' => $this->faxNo,
                    'mcNo' => $this->mcNo,
                    'usDotNo' => $this->usDotNo,
                    'mailingAddress' => $this->mailingAddress,
                    'factoringCompany' => $this->factoringCompany,
//                    'factoringCompanyAddress' => $this->factoringCompanyAddress
                ])
            )
        );
    }

    public function insert($Company, $db, $helper)
    {
        $c_id = $db->company->find(['companyID' => (int)$Company->getCompanyID()]);
        $count = 0;
        foreach ($c_id as $c) {
            $count++;
        }
        if ($count > 0) {
            $db->company->updateOne(['companyID' => (int)$this->companyID], ['$push' => ['company' => [
                '_id' => $helper->getDocumentSequence((int)$this->companyID, $db->company),
                'companyName' => $this->companyName,
                'shippingAddress' => $this->shippingAddress,
                'telephoneNo' => $this->telephoneNo,
                'faxNo' => $this->faxNo,
                'mcNo' => $this->mcNo,
                'usDotNo' => $this->usDotNo,
                'mailingAddress' => $this->mailingAddress,
                'factoringCompany' => $this->factoringCompany,
//                'factoringCompanyAddress' => $this->factoringCompanyAddress
            ]]]);
        } else {
            $company = iterator_to_array($Company);
            $db->company->insertOne($company);
        }
    }

    public function delete($Company, $db)
    {
//        $db->company->deleteOne(['_id' => (int)$Company->getId()]);
        $db->company->updateOne(['companyID' => (int)$_SESSION['companyId']], [
                '$pull' => ['company' => ['_id' => (int)$Company->getId()]]]
        );
    }

    public function update($Company, $db)
    {
//        $db->company->updateOne(
//            ['_id' => (int)$Company->getId()],
//            ['$set' => [$Company->getColumn() => $Company->getcompanyName()]
//            ]);
        $db->company->updateOne(['companyID' => (int)$_SESSION['companyId'], 'company._id' => (int)$this->getId()],
            ['$set' => ['company.$.' . $Company->getColumn() => $Company->getcompanyName()]]
        );
    }

    public function export($db)
    {
        $company = $db->company->find(['companyID' => $_SESSION['companyId']]);
        foreach ($company as $s) {
            $show = $s['company'];
            foreach ($show as $c) {
                $p[] = array($c['companyName'], $c['shippingAddress'], $c['telephoneNo'], $c['faxNo'], $c['mcNo'], $c['usDotNo'], $c['mailingAddress'], $c['factoringCompany'], $c['factoringCompanyAddress']);
            }
        }
        echo json_encode($p);
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
                $this->setId($helper->getNextSequence("company", $db));
                $this->companyID = $_SESSION['companyId'];
                if (isset($Row[0])) {
                    $this->companyName = $Row[0];
                }
                if (isset($Row[1])) {
                    $this->shippingAddress = $Row[1];
                }
                if (isset($Row[2])) {
                    $this->telephoneNo = $Row[2];
                }
                if (isset($Row[3])) {
                    $this->faxNo = $Row[3];
                }
                if (isset($Row[4])) {
                    $this->mcNo = $Row[4];
                }
                if (isset($Row[5])) {
                    $this->usDotNo = $Row[5];
                }
                if (isset($Row[6])) {
                    $this->mailingAddress = $Row[6];
                }
                if (isset($Row[7])) {
                    $this->factoringCompany = $Row[7];
                }
//                if (isset($Row[8])) {
//                    $this->factoringCompanyAddress = $Row[8];
//                }

                $this->insert($this, $db,$helper);
            }
        }
    }
}