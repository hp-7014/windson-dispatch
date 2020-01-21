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
//        require '../database/connection.php';   // connection
        // TODO: Implement getIterator() method.
//        $c_id = $db->payment_terms->find(['companyID' => (int)$this->companyID]);
//        $count = 0;
//        foreach ($c_id as $c) {
//            $id1 = $c['companyID'];
//            $id2 = $c['_id'];
//            $count++;
//        }
//        if ($count > 0) {
////            echo "get found";
//            return new ArrayIterator(
//                array(
//                    '_id' => (int)$this->id,
//                    'companyID' => (int)$id1,
//                    ['payment' => array('paymentTerm' => $this->payment_term)]
//                )
//            );
////            exit();
//        } else {
////            echo "get not found";
//            return new ArrayIterator(
//                array(
//                    '_id' => $this->id,
//                    'companyID' => (int)$this->companyID,
//                    'paymentTerm' => $this->payment_term
//                )
//            );
////            exit();
//        }
        return new ArrayIterator(
            array(
                '_id' => $this->id,
                'companyID' => (int)$this->companyID,
                'paymentTerm' => $this->payment_term
            )
        );
    }

    public function insert($payment_term, $db)
    {
//        echo $payment_term->getCompanyID();
//        $c_id = $db->payment_terms->find(['companyID' => (int)$payment_term->getCompanyID()]);
//        $count = 0;
//        foreach ($c_id as $c) {
//            $id = $c['_id'];
//            $count++;
//        }
//        if ($count > 0) {
////            echo 'found';
//            $payment = iterator_to_array($payment_term);
//            $db->payment_terms->insertOne($payment);
//
//        } else {
//            echo "not found";
            $payment = iterator_to_array($payment_term);
            $db->payment_terms->insertOne($payment);
//        }
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
                if (isset($Row[0])) {
                    $this->setId($helper->getNextSequence("payment_term", $db));
                    $this->companyID = $_SESSION['companyId'];
                    $this->payment_term = $Row[0];
                }

                $this->Insert($this, $db);
            }
        }
    }

    public function updatePayment($payment_term, $db)
    {
        $db->payment_terms->updateOne(
            ['_id' => (int)$payment_term->getId()],
            ['$set' => [$payment_term->getColumn() => $payment_term->getPaymentTerm()]
            ]);
    }

    public function deletePayment($payment_term, $db)
    {

        $db->payment_terms->deleteOne(['_id' => (int)$payment_term->getId()]);
    }

    public function exportPayment($db)
    {
        $payment = $db->payment_terms->find(['companyID' => $_SESSION['companyId']]);
        foreach ($payment as $pay) {
            $p[] = array($pay['paymentTerm']);
        }
        echo json_encode($p);
    }
}