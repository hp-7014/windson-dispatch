<?php
@session_start();


/**
 * Created by PhpStorm.
 * User: BOND
 * Date: 1/16/2020
 * Time: 9:35 PM
 */
class PaymentTerms implements IteratorAggregate
{
    protected $id;
    protected $companyID;
    protected $payment_term;
    protected $column;

    /**
     * PaymentTerms constructor.
     * @param $id
     * @param $companyID
     * @param $payment_term
     */

//    public function __construct($id,$companyID,$payment_term)
//    {
//        $this->id = $id;
//        $this->companyID = $companyID;
//        $this->payment_term = $payment_term;
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
    public function getPaymentTerm()
    {
        return $this->payment_term;
    }

    /**
     * @param mixed $payment_term
     */
    public function setPaymentTerm($payment_term)
    {
        $this->payment_term = $payment_term;
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
                '_id' => $this->id,
                'companyID' => (int)$this->companyID,
                'counter' => 0,
                'payment' => array(['_id' => 0, 'paymentTerm' => $this->payment_term,'counter' => 0])
            )
        );
    }

    public function insert($payment_term, $db, $helper)
    {
        $c_id = $db->payment_terms->find(['companyID' => (int)$payment_term->getCompanyID()]);
        $count = 0;
        foreach ($c_id as $c) {
            $count++;
        }
        if ($count > 0) {
            $db->payment_terms->updateOne(['companyID' => (int)$this->companyID], ['$push' => ['payment' => [
                '_id' => $helper->getDocumentSequence((int)$this->companyID, $db->payment_terms),
                'paymentTerm' => $this->payment_term,
                'counter' => 0,
            ]]]);

        } else {
            $payment = iterator_to_array($payment_term);
            $db->payment_terms->insertOne($payment);
        }
    }

    public function importExcel($targetPath, $helper, $db)
    {
        require_once('../excel/excel_reader2.php');
        require_once('../excel/SpreadsheetReader.php');

        $Reader = new SpreadsheetReader($targetPath);

        $sheetCount = count($Reader->sheets());

        for ($i = 0; $i < $sheetCount; $i++) {

            $Reader->ChangeSheet($i);
            $count = 0;
            foreach ($Reader as $Row) {
                $count++;
                if($count > 1000){
                    echo "Your file should contain atmost 1000 entries. First 1000 entries added successfully"; 
                    break;
                } else {
                    if (isset($Row[0])) {
                        $this->setId($helper->getNextSequence("payment_term", $db));
                        $this->companyID = $_SESSION['companyId'];
                        $this->payment_term = $Row[0];
                    }

                    $this->Insert($this, $db,$helper);
                }
            }
        }
        unlink($targetPath);
    }

    public function updatePayment($payment_term, $db)
    {
//        $db->payment_terms->updateOne(
//            ['_id' => (int)$payment_term->getId()],
//            ['$set' => [$payment_term->getColumn() => $payment_term->getPaymentTerm()]
//            ]);
        $db->payment_terms->updateOne(['companyID' => (int)$_SESSION['companyId'], 'payment._id' => (int)$this->getId()],
            ['$set' => ['payment.$.' . $payment_term->getColumn() => $payment_term->getPaymentTerm()]]
        );
    }

    public function deletePayment($payment_term, $db)
    {
//        $db->payment_terms->deleteOne(['_id' => (int)$payment_term->getId()]);
        $db->payment_terms->updateOne(['companyID' => (int)$_SESSION['companyId']], [
                '$pull' => ['payment' => ['_id' => (int)$payment_term->getId()]]]
        );
    }

    public function exportPayment($db)
    {
        $payment = $db->payment_terms->find(['companyID' => $_SESSION['companyId']]);
        foreach ($payment as $pay) {
            $show = $pay['payment'];
            foreach ($show as $s) {
                $p[] = array($s['paymentTerm']);
            }
        }
//        print_r($p);
        echo json_encode($p);
    }
}