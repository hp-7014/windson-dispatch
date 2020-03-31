<?php
/**
 * Created by PhpStorm.
 * User: BOND
 * Date: 3/31/2020
 * Time: 2:18 PM
 */

class Bank implements IteratorAggregate{
    private $Id;
    private $companyID;
    private $paymentFrom;
    private $companySelect;

    // bank driver
    private $bankName;
    private $driverName;
    private $selectDebit;
    private $invoice;
    private $amount;
    private $advance;
    private $finalAmount;
    private $checkDate;
    private $cheque;
    private $ach;
    private $memo;
    private $payto;

    // security field's
    private $created_at;
    private $created_id;
    private $last_update_id;
    private $deleted_id;
    private $deleted_at;

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
    public function getPayto()
    {
        return $this->payto;
    }

    /**
     * @param mixed $payto
     */
    public function setPayto($payto): void
    {
        $this->payto = $payto;
    }

    /**
     * @return mixed
     */
    public function getPaymentFrom()
    {
        return $this->paymentFrom;
    }

    /**
     * @param mixed $paymentFrom
     */
    public function setPaymentFrom($paymentFrom): void
    {
        $this->paymentFrom = $paymentFrom;
    }

    /**
     * @return mixed
     */
    public function getCompanySelect()
    {
        return $this->companySelect;
    }

    /**
     * @param mixed $companySelect
     */
    public function setCompanySelect($companySelect): void
    {
        $this->companySelect = $companySelect;
    }

    /**
     * @return mixed
     */
    public function getBankName()
    {
        return $this->bankName;
    }

    /**
     * @param mixed $bankName
     */
    public function setBankName($bankName): void
    {
        $this->bankName = $bankName;
    }

    /**
     * @return mixed
     */
    public function getDriverName()
    {
        return $this->driverName;
    }

    /**
     * @param mixed $driverName
     */
    public function setDriverName($driverName): void
    {
        $this->driverName = $driverName;
    }

    /**
     * @return mixed
     */
    public function getSelectDebit()
    {
        return $this->selectDebit;
    }

    /**
     * @param mixed $selectDebit
     */
    public function setSelectDebit($selectDebit): void
    {
        $this->selectDebit = $selectDebit;
    }

    /**
     * @return mixed
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param mixed $invoice
     */
    public function setInvoice($invoice): void
    {
        $this->invoice = $invoice;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getAdvance()
    {
        return $this->advance;
    }

    /**
     * @param mixed $advance
     */
    public function setAdvance($advance): void
    {
        $this->advance = $advance;
    }

    /**
     * @return mixed
     */
    public function getFinalAmount()
    {
        return $this->finalAmount;
    }

    /**
     * @param mixed $finalAmount
     */
    public function setFinalAmount($finalAmount): void
    {
        $this->finalAmount = $finalAmount;
    }

    /**
     * @return mixed
     */
    public function getCheckDate()
    {
        return $this->checkDate;
    }

    /**
     * @param mixed $checkDate
     */
    public function setCheckDate($checkDate): void
    {
        $this->checkDate = $checkDate;
    }

    /**
     * @return mixed
     */
    public function getCheque()
    {
        return $this->cheque;
    }

    /**
     * @param mixed $cheque
     */
    public function setCheque($cheque): void
    {
        $this->cheque = $cheque;
    }

    /**
     * @return mixed
     */
    public function getAch()
    {
        return $this->ach;
    }

    /**
     * @param mixed $ach
     */
    public function setAch($ach): void
    {
        $this->ach = $ach;
    }

    /**
     * @return mixed
     */
    public function getMemo()
    {
        return $this->memo;
    }

    /**
     * @param mixed $memo
     */
    public function setMemo($memo): void
    {
        $this->memo = $memo;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getCreatedId()
    {
        return $this->created_id;
    }

    /**
     * @param mixed $created_id
     */
    public function setCreatedId($created_id): void
    {
        $this->created_id = $created_id;
    }

    /**
     * @return mixed
     */
    public function getLastUpdateId()
    {
        return $this->last_update_id;
    }

    /**
     * @param mixed $last_update_id
     */
    public function setLastUpdateId($last_update_id): void
    {
        $this->last_update_id = $last_update_id;
    }

    /**
     * @return mixed
     */
    public function getDeletedId()
    {
        return $this->deleted_id;
    }

    /**
     * @param mixed $deleted_id
     */
    public function setDeletedId($deleted_id): void
    {
        $this->deleted_id = $deleted_id;
    }

    /**
     * @return mixed
     */
    public function getDeletedAt()
    {
        return $this->deleted_at;
    }

    /**
     * @param mixed $deleted_at
     */
    public function setDeletedAt($deleted_at): void
    {
        $this->deleted_at = $deleted_at;
    }

    function getIterator() {
        return new ArrayIterator(
            array(
                '_id' => $this->id,
                'companyID' => (int) $this->companyID,
                'counter' => 0,
                'bankpayment' => array([
                    '_id' => 0,
                    'counter' => 0,
                    'paymentfrom' => $this->paymentFrom,
                    'companyselect' => $this->companySelect,
                    'bankname' => $this->bankName,
                    'payto' => $this->payto,
                    'drivername' => $this->driverName,
                    'selectdebite' => $this->selectDebit,
                    'invoice' => $this->invoice,
                    'amount' => $this->amount,
                    'advance' => $this->advance,
                    'finalamount' => $this->finalAmount,
                    'checkdate' => $this->checkDate,
                    'cheque' => $this->cheque,
                    'ach' => $this->ach,
                    'memo' => $this->memo
                    ])));
    } 

    //Insert Factoring Function
    public function insert($bank,$db,$helper)
    {
        $collection = $db->payment_bank;
            $criteria = array(
                'companyID' => (int)$bank->getCompanyID(),
        );
        $doc = $collection->findOne($criteria);

        if (!empty($doc)) {
            $db->payment_bank->updateOne(['companyID' => (int)$this->companyID],['$push'=>['bankpayment'=>[
                '_id'=>$helper->getDocumentSequence((int)$this->companyID,$db->payment_bank),
                'counter' => 0,
                'counter' => 0,
                    'paymentfrom' => $this->paymentFrom,
                    'companyselect' => $this->companySelect,
                    'bankname' => $this->bankName,
                    'payto' => $this->payto,
                    'drivername' => $this->driverName,
                    'selectdebite' => $this->selectDebit,
                    'invoice' => $this->invoice,
                    'amount' => $this->amount,
                    'advance' => $this->advance,
                    'finalamount' => $this->finalAmount,
                    'checkdate' => $this->checkDate,
                    'cheque' => $this->cheque,
                    'ach' => $this->ach,
                    'memo' => $this->memo
            ]]]);

        } else {
            $bank = iterator_to_array($bank);
            $db->payment_bank->insertOne($bank);
        }
    }

}