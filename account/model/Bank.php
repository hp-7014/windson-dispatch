<?php
/**
 * Created by PhpStorm.
 * User: BOND
 * Date: 3/31/2020
 * Time: 2:18 PM
 */
@session_start();

class Bank implements IteratorAggregate
{
    private $Id;
    private $companyID;
    private $paymentFrom;
    private $companySelect;
    private $category;
    private $year;
    private $month;
    private $baseamount;
    private $file = array();
    // bank driver / carrier
    private $bankName;
    private $fieldName;
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
    private $invoiceAmount;

    // bank carrier
    private $carrierInvoice;

    //bank factoring
    private $factoringInvoice;
    //bank expense
    private $expensesbill;
    private $expensesname;
    //bank Maintenance
    private $truckno;
    private $trailerno;
    //bank insurance
    private $insurancecom;
    //bank credit card
    private $card;
    private $cardcategory;
    private $subcard;
    //bank fuel card
    private $fuellist;
    //bank other
    private $pobox;
    private $other;

    // security field's
    private $created_at;
    private $created_id;
    private $last_update_id;
    private $deleted_id;
    private $deleted_at;

    /**
     * @return mixed
     */
    public function getInvoiceAmount()
    {
        return $this->invoiceAmount;
    }

    /**
     * @param mixed $invoiceAmount
     */
    public function setInvoiceAmount($invoiceAmount): void
    {
        $this->invoiceAmount = $invoiceAmount;
    }

    /**
     * @return mixed
     */
    public function getCarrierInvoice()
    {
        return $this->carrierInvoice;
    }

    /**
     * @param mixed $carrierInvoice
     */
    public function setCarrierInvoice($carrierInvoice): void
    {
        $this->carrierInvoice = $carrierInvoice;
    }

    /**
     * @return mixed
     */
    public function getFactoringInvoice()
    {
        return $this->factoringInvoice;
    }

    /**
     * @param mixed $factoringInvoice
     */
    public function setFactoringInvoice($factoringInvoice): void
    {
        $this->factoringInvoice = $factoringInvoice;
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
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getBaseamount()
    {
        return $this->baseamount;
    }

    /**
     * @param mixed $baseamount
     */
    public function setBaseamount($baseamount)
    {
        $this->baseamount = $baseamount;
    }

    /**
     * @return mixed
     */
    public function getOther()
    {
        return $this->other;
    }

    /**
     * @param mixed $other
     */
    public function setOther($other)
    {
        $this->other = $other;
    }

    /**
     * @return mixed
     */
    public function getPobox()
    {
        return $this->pobox;
    }

    /**
     * @param mixed $pobox
     */
    public function setPobox($pobox)
    {
        $this->pobox = $pobox;
    }

    /**
     * @return mixed
     */
    public function getFuellist()
    {
        return $this->fuellist;
    }

    /**
     * @param mixed $fuellist
     */
    public function setFuellist($fuellist)
    {
        $this->fuellist = $fuellist;
    }

    /**
     * @return mixed
     */
    public function getSubcard()
    {
        return $this->subcard;
    }

    /**
     * @param mixed $subcard
     */
    public function setSubcard($subcard)
    {
        $this->subcard = $subcard;
    }

    /**
     * @return mixed
     */
    public function getCardcategory()
    {
        return $this->cardcategory;
    }

    /**
     * @param mixed $cardcategory
     */
    public function setCardcategory($cardcategory)
    {
        $this->cardcategory = $cardcategory;
    }

    /**
     * @return mixed
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * @param mixed $card
     */
    public function setCard($card)
    {
        $this->card = $card;
    }

    /**
     * @return mixed
     */
    public function getInsurancecom()
    {
        return $this->insurancecom;
    }

    /**
     * @param mixed $insurancecom
     */
    public function setInsurancecom($insurancecom)
    {
        $this->insurancecom = $insurancecom;
    }

    /**
     * @return mixed
     */
    public function getTruckno()
    {
        return $this->truckno;
    }

    /**
     * @param mixed $truckno
     */
    public function setTruckno($truckno)
    {
        $this->truckno = $truckno;
    }

    /**
     * @return mixed
     */
    public function getTrailerno()
    {
        return $this->trailerno;
    }

    /**
     * @param mixed $trailerno
     */
    public function setTrailerno($trailerno)
    {
        $this->trailerno = $trailerno;
    }

    /**
     * @return mixed
     */
    public function getExpensesname()
    {
        return $this->expensesname;
    }

    /**
     * @param mixed $expensesname
     */
    public function setExpensesname($expensesname)
    {
        $this->expensesname = $expensesname;
    }

    /**
     * @return mixed
     */
    public function getExpensesbill()
    {
        return $this->expensesbill;
    }

    /**
     * @param mixed $expensesbill
     */
    public function setExpensesbill($expensesbill)
    {
        $this->expensesbill = $expensesbill;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * @param mixed $month
     */
    public function setMonth($month)
    {
        $this->month = $month;
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
     * @return mixed
     */
    public function getDriverInvoice()
    {
        return $this->DriverInvoice;
    }

    /**
     * @param mixed $DriverInvoice
     */
    public function setDriverInvoice($DriverInvoice): void
    {
        $this->DriverInvoice = $DriverInvoice;
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
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
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
    public function getFieldName()
    {
        return $this->fieldName;
    }

    /**
     * @param mixed $fieldName
     */
    public function setFieldName($fieldName): void
    {
        $this->fieldName = $fieldName;
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
    public function setInvoice($invoice, $invoiceAmount): void
    {
        $this->invoice = array();
        for ($i = 0; $i < count($invoice); $i++) {
            $this->invoice[] = array(
                'invoiceNo' => $invoice[$i],
                'invoiceAmount' => $invoiceAmount[$i],
            );
        }
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

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file, $originalname, $fileSize, $targetFilePath, $i)
    {
        $this->file[$i] = array("filename" => $file, "Originalname" => $originalname, "filesize" => $fileSize, "filepath" => $targetFilePath);
    }

    function getIterator()
    {
        $bankcategory = $this->category;

        switch ($bankcategory) {
            case "driver":
                return new ArrayIterator(
                    array(
                        '_id' => $this->id,
                        'companyID' => (int)$this->companyID,
                        'bankID' => (int)$this->bankName,
                        'year' => (int)$this->year,
                        'counter' => 0,
                        (int)$this->year => array([
                            'year' => (int)$this->year,
                            'month' => $this->month,
                            'balance' => $this->baseamount
                        ]),
                        $this->month => array([
                            '_id' => 0,
                            'counter' => 0,
                            'paymentfrom' => $this->paymentFrom,
                            'companyselect' => $this->companySelect,
                            'bankname' => $this->bankName,
                            'payto' => $this->payto,
                            $this->category => $this->fieldName,
                            'debitcategory' => $this->selectDebit,
                            'invoice' => $this->invoice,
                            'amount' => $this->amount,
                            'advance' => $this->advance,
                            'finalamount' => $this->finalAmount,
                            'checkdate' => $this->checkDate,
                            'cheque' => $this->cheque,
                            'ach' => $this->ach,
                            'memo' => $this->memo,
                            'file' => $this->file,
                        ])
                    ));
                break;
            case "carrier":
                return new ArrayIterator(
                    array(
                        '_id' => $this->id,
                        'companyID' => (int)$this->companyID,
                        'bankID' => (int)$this->bankName,
                        'year' => (int)$this->year,
                        'counter' => 0,
                        (int)$this->year => array([
                            'year' => (int)$this->year,
                            'month' => $this->month,
                            'balance' => (int)$this->baseamount
                        ]),
                        $this->month => array([
                            '_id' => 0,
                            'counter' => 0,
                            'paymentfrom' => $this->paymentFrom,
                            'companyselect' => $this->companySelect,
                            'bankname' => $this->bankName,
                            'payto' => $this->payto,
                            $this->category => $this->fieldName,
                            'debitcategory' => $this->selectDebit,
                            'invoice' => $this->invoice,
                            'amount' => (int)$this->amount,
                            'checkdate' => $this->checkDate,
                            'cheque' => $this->cheque,
                            'ach' => $this->ach,
                            'memo' => $this->memo,
                            'file' => $this->file
                        ])
                    ));
                break;
            case "factoringcompany":
                return new ArrayIterator(
                    array(
                        '_id' => $this->id,
                        'companyID' => (int)$this->companyID,
                        'bankID' => (int)$this->bankName,
                        'year' => $this->year,
                        'counter' => 0,
                        (int)$this->year => array([
                            'year' => (int)$this->year,
                            'month' => $this->month,
                            'balance' => $this->baseamount
                        ]),
                        $this->month => array([
                            '_id' => 0,
                            'counter' => 0,
                            'paymentfrom' => $this->paymentFrom,
                            'companyselect' => $this->companySelect,
                            'bankname' => $this->bankName,
                            'payto' => $this->payto,
                            $this->category => $this->fieldName,
                            'debitcategory' => $this->selectDebit,
                            'invoice' => $this->invoice,
                            'amount' => $this->amount,
                            'checkdate' => $this->checkDate,
                            'cheque' => $this->cheque,
                            'ach' => $this->ach,
                            'memo' => $this->memo,
                            'file' => $this->file
                        ])
                    ));
                break;
            case "Expense":
                return new ArrayIterator(
                    array(
                        '_id' => $this->id,
                        'companyID' => (int)$this->companyID,
                        'bankID' => (int)$this->bankName,
                        'year' => (int)$this->year,
                        'counter' => 0,
                        (int)$this->year => array([
                            'year' => (int)$this->year,
                            'month' => $this->month,
                            'balance' => $this->baseamount
                        ]),
                        $this->month => array([
                            '_id' => 0,
                            'counter' => 0,
                            'paymentfrom' => $this->paymentFrom,
                            'companyselect' => $this->companySelect,
                            'bankname' => $this->bankName,
                            'payto' => $this->payto,
                            'billno' => $this->expensesbill,
                            'expensesname' => $this->expensesname,
                            'debitcategory' => $this->selectDebit,
                            'amount' => $this->amount,
                            'memo' => $this->memo,
                            'file' => $this->file
                        ])
                    ));
                break;
            case "Maintenance":
                return new ArrayIterator(
                    array(
                        '_id' => $this->id,
                        'companyID' => (int)$this->companyID,
                        'bankID' => (int)$this->bankName,
                        'year' => (int)$this->year,
                        'counter' => 0,
                        (int)$this->year => array([
                            'year' => (int)$this->year,
                            'month' => $this->month,
                            'balance' => $this->baseamount
                        ]),
                        $this->month => array([
                            '_id' => 0,
                            'counter' => 0,
                            'paymentfrom' => $this->paymentFrom,
                            'companyselect' => $this->companySelect,
                            'bankname' => $this->bankName,
                            'payto' => $this->payto,
                            'debitcategory' => $this->selectDebit,
                            'amount' => $this->amount,
                            'ach' => $this->ach,
                            'truckno' => $this->truckno,
                            'trailerno' => $this->trailerno,
                            'memo' => $this->memo,
                            'file' => $this->file
                        ])
                    ));
                break;
            case "Insurance":
                return new ArrayIterator(
                    array(
                        '_id' => $this->id,
                        'companyID' => (int)$this->companyID,
                        'bankID' => (int)$this->bankName,
                        'year' => (int)$this->year,
                        'counter' => 0,
                        (int)$this->year => array([
                            'year' => (int)$this->year,
                            'month' => $this->month,
                            'balance' => $this->baseamount
                        ]),
                        $this->month => array([
                            '_id' => 0,
                            'counter' => 0,
                            'paymentfrom' => $this->paymentFrom,
                            'companyselect' => $this->companySelect,
                            'bankname' => $this->bankName,
                            'payto' => $this->payto,
                            'insurancecompany' => $this->insurancecom,
                            'debitcategory' => $this->selectDebit,
                            'amount' => $this->amount,
                            'memo' => $this->memo,
                            'file' => $this->file
                        ])
                    ));
                break;
            case "creditcard":
                return new ArrayIterator(
                    array(
                        '_id' => $this->id,
                        'companyID' => (int)$this->companyID,
                        'bankID' => (int)$this->bankName,
                        'year' => (int)$this->year,
                        'counter' => 0,
                        (int)$this->year => array([
                            'year' => (int)$this->year,
                            'month' => $this->month,
                            'balance' => $this->baseamount
                        ]),
                        $this->month => array([
                            '_id' => 0,
                            'counter' => 0,
                            'paymentfrom' => $this->paymentFrom,
                            'companyselect' => $this->companySelect,
                            'bankname' => $this->bankName,
                            'payto' => $this->payto,
                            'card' => $this->card,
                            $this->card => $this->cardcategory,
                            'amount' => $this->amount,
                            'memo' => $this->memo,
                            'file' => $this->file
                        ])
                    ));
                break;
            case "fuelcard":
                return new ArrayIterator(
                    array(
                        '_id' => $this->id,
                        'companyID' => (int)$this->companyID,
                        'bankID' => (int)$this->bankName,
                        'year' => (int)$this->year,
                        'counter' => 0,
                        (int)$this->year => array([
                            'year' => (int)$this->year,
                            'month' => $this->month,
                            'balance' => $this->baseamount
                        ]),
                        $this->month => array([
                            '_id' => 0,
                            'counter' => 0,
                            'paymentfrom' => $this->paymentFrom,
                            'companyselect' => $this->companySelect,
                            'bankname' => $this->bankName,
                            'payto' => $this->payto,
                            'fuellist' => $this->fuellist,
                            'amount' => $this->amount,
                            'memo' => $this->memo,
                            'file' => $this->file
                        ])
                    ));
                break;
            default:
                return new ArrayIterator(
                    array(
                        '_id' => $this->id,
                        'companyID' => (int)$this->companyID,
                        'bankID' => (int)$this->bankName,
                        'year' => (int)$this->year,
                        'counter' => 0,
                        (int)$this->year => array([
                            'year' => (int)$this->year,
                            'month' => $this->month,
                            'balance' => $this->baseamount
                        ]),
                        $this->month => array([
                            '_id' => 0,
                            'counter' => 0,
                            'paymentfrom' => $this->paymentFrom,
                            'companyselect' => $this->companySelect,
                            'bankname' => $this->bankName,
                            'payto' => $this->payto,
                            'other' => $this->other,
                            'debitcategory' => $this->selectDebit,
                            'pobox' => $this->pobox,
                            'amount' => $this->amount,
                            'checkdate' => $this->checkDate,
                            'cheque' => $this->cheque,
                            'ach' => $this->ach,
                            'memo' => $this->memo,
                            'file' => $this->file
                        ])
                    ));
        }
    }

    //Insert Driver Function
    public function insertdriver($bank, $db, $helper)
    {

        $show = $db->payment_bank->find(['companyID' => (int)$this->companyID, 'bankID' => (int)$this->bankName, 'year' => (int)$this->year]);
        $counter = [];
        $id = [];
        $bankid = [];
        $yearID = [];

        $mainID = null;
        $incrementNumber = null;
        $bankn = null;
        $years = null;
        $companyID = null;
        $i = 0;
        foreach ($show as $s) {
            $id[] = $s['_id'];
            $counter[] = $s['counter'];
            $bankid[] = $s['bankID'];
            $yearID[] = $s['year'];
            $companyID = $s['companyID'];
            if ($counter[$i] < 5000 && $bankid[$i] == $this->bankName && $yearID[$i] == $this->year) {
                $mainID = $id[$i];
                $incrementNumber = $counter[$i];
                $bankn = $bankid[$i];
                $years = $this->year;
            }
            $i++;
        }

        if (!empty($mainID)) {
            $db->payment_bank->updateOne(['companyID' => (int)$this->companyID, '_id' => $mainID],
                ['$set' => ['counter' => $incrementNumber + 1]]);
            $id = $incrementNumber + 1;

            $db->payment_bank->updateOne(['companyID' => (int)$this->companyID, '_id' => $mainID],
                ['$push' => [
                    $this->month => [
                        '_id' => $id,
                        'counter' => 0,
                        'paymentfrom' => $this->paymentFrom,
                        'companyselect' => $this->companySelect,
                        'bankname' => $this->bankName,
                        'payto' => $this->payto,
                        $this->category => $this->fieldName,
                        'debitcategory' => $this->selectDebit,
                        'invoice' => $this->invoice,
                        'amount' => $this->amount,
                        'advance' => $this->advance,
                        'finalamount' => $this->finalAmount,
                        'checkdate' => $this->checkDate,
                        'cheque' => $this->cheque,
                        'ach' => $this->ach,
                        'memo' => $this->memo,
                        'file' => $this->file
                    ]
                ]]);
            echo $id;
        } else {
            $bank = iterator_to_array($bank);
            $db->payment_bank->insertOne($bank);
            echo 0;
        }
    }

    //Insert carrier Function
    public function insertcarrier($bank, $db, $helper)
    {

        $show = $db->payment_bank->find(['companyID' => (int)$this->companyID, 'bankID' => (int)$this->bankName, 'year' => (int)$this->year]);
        $counter = [];
        $id = [];
        $bankid = [];
        $yearID = [];

        $mainID = null;
        $incrementNumber = null;
        $bankn = null;
        $years = null;
        $companyID = null;
        $i = 0;
        foreach ($show as $s) {
            $id[] = $s['_id'];
            $counter[] = $s['counter'];
            $bankid[] = $s['bankID'];
            $yearID[] = $s['year'];
            $companyID = $s['companyID'];
            if ($counter[$i] < 5000 && $bankid[$i] == $this->bankName && $yearID[$i] == $this->year) {
                $mainID = $id[$i];
                $incrementNumber = $counter[$i];
                $bankn = $bankid[$i];
                $years = $this->year;
            }
            $i++;
        }

        if (!empty($mainID)) {
            $db->payment_bank->updateOne(['companyID' => (int)$this->companyID, '_id' => $mainID],
                ['$set' => ['counter' => $incrementNumber + 1]]);
            $id = $incrementNumber + 1;

            // logic start
            // get month and base-balance
            $curMonth = '';
            $curBaseAmout = '';

            $mon = $db->payment_bank->find(['companyID' => (int)$this->companyID, '_id' => $mainID]);
            foreach ($mon as $m) {
                $y = $m[date("Y")];
                foreach ($y as $data) {
                    if ($data['month'] == date('F')) {
                        $curMonth = $data['month'];
                        $curBaseAmout = $data['balance'];
                    }
                }
            }

            // in year->month->new month array our there value
            if ($curMonth == '') {
                $db->payment_bank->updateOne(['companyID' => (int)$this->companyID, '_id' => $mainID],
                    ['$push' => [
                        $this->year => [
                            'year' => $this->year,
                            'month' => $this->month,
                            'balance' => (int)$this->baseamount,
                        ]
                    ]]
                );
            }
            // logic end

            $db->payment_bank->updateOne(['companyID' => (int)$this->companyID, '_id' => $mainID],
                ['$push' => [
                    $this->month => [
                        '_id' => $id,
                        'counter' => 0,
                        'paymentfrom' => $this->paymentFrom,
                        'companyselect' => $this->companySelect,
                        'bankname' => $this->bankName,
                        'payto' => $this->payto,
                        $this->category => $this->fieldName,
                        'debitcategory' => $this->selectDebit,
                        'invoice' => $this->invoice,
                        'amount' => $this->amount,
                        'checkdate' => $this->checkDate,
                        'cheque' => $this->cheque,
                        'ach' => $this->ach,
                        'memo' => $this->memo,
                        'file' => $this->file
                    ]
                ]]);
            echo $id;

            // transaction date if yes than cut base-balance
            if ($this->checkDate != '') {
                $db->payment_bank->updateOne(['companyID' => (int)$this->companyID, '_id' => (int)$mainID, (int)$this->year . '.month' => $curMonth],
                    ['$set' => [(int)$this->year . '.$.balance' => (int)$curBaseAmout - (int)$this->amount]]
                );
            }

        } else {
            $bank = iterator_to_array($bank);
            $db->payment_bank->insertOne($bank);

            // logic start
            // get month and base-balance
            $curMonth = '';

            $mon = $db->payment_bank->find(['companyID' => (int)$this->companyID]);
            foreach ($mon as $m) {
                $y = $m[date("Y")];
                foreach ($y as $data) {
                    if ($data['month'] == date('F')) {
                        $curMonth = $data['month'];
                    }
                }
            }

            // transaction date if yes than cut base-balance
            if ($this->checkDate != '') {
                $db->payment_bank->updateOne(['companyID' => (int)$this->companyID, (int)$this->year . '.month' => $curMonth],
                    ['$set' => [(int)$this->year . '.$.balance' => $this->baseamount - $this->amount]]
                );
            }

            echo 0;
        }
    }

    //Insert factoringcompany Function
    public function insertfactoring($bank, $db, $helper)
    {

        $show = $db->payment_bank->find(['companyID' => (int)$this->companyID, 'bankID' => (int)$this->bankName, 'year' => (int)$this->year]);
        $counter = [];
        $id = [];
        $bankid = [];
        $yearID = [];

        $mainID = null;
        $incrementNumber = null;
        $bankn = null;
        $years = null;
        $companyID = null;
        $i = 0;
        foreach ($show as $s) {
            $id[] = $s['_id'];
            $counter[] = $s['counter'];
            $bankid[] = $s['bankID'];
            $yearID[] = $s['year'];
            $companyID = $s['companyID'];
            if ($counter[$i] < 5000 && $bankid[$i] == $this->bankName && $yearID[$i] == $this->year) {
                $mainID = $id[$i];
                $incrementNumber = $counter[$i];
                $bankn = $bankid[$i];
                $years = $this->year;
            }
            $i++;
        }

        if (!empty($mainID)) {
            echo "second entry" . $mainID;
            $db->payment_bank->updateOne(['companyID' => (int)$this->companyID, '_id' => $mainID],
                ['$set' => ['counter' => $incrementNumber + 1]]);
            $id = $incrementNumber + 1;
            $db->payment_bank->updateOne(['companyID' => (int)$this->companyID, '_id' => $mainID],
                ['$push' => [
                    $this->month => [
                        '_id' => $id,
                        'counter' => 0,
                        'paymentfrom' => $this->paymentFrom,
                        'companyselect' => $this->companySelect,
                        'bankname' => $this->bankName,
                        'payto' => $this->payto,
                        $this->category => $this->fieldName,
                        'debitcategory' => $this->selectDebit,
                        'invoice' => $this->invoice,
                        'amount' => $this->amount,
                        'checkdate' => $this->checkDate,
                        'cheque' => $this->cheque,
                        'ach' => $this->ach,
                        'memo' => $this->memo,
                        'file' => $this->file
                    ]
                ]]);
            echo $id;
        } else {
            $bank = iterator_to_array($bank);
            $db->payment_bank->insertOne($bank);
            echo 0;
        }
    }

    //Insert Expense Function
    public function insertexpense($bank, $db, $helper)
    {

        $show = $db->payment_bank->find(['companyID' => (int)$this->companyID, 'bankID' => (int)$this->bankName, 'year' => (int)$this->year]);
        $counter = [];
        $id = [];
        $bankid = [];
        $yearID = [];

        $mainID = null;
        $incrementNumber = null;
        $bankn = null;
        $years = null;
        $companyID = null;
        $i = 0;
        foreach ($show as $s) {
            $id[] = $s['_id'];
            $counter[] = $s['counter'];
            $bankid[] = $s['bankID'];
            $yearID[] = $s['year'];
            $companyID = $s['companyID'];
            if ($counter[$i] < 5000 && $bankid[$i] == $this->bankName && $yearID[$i] == $this->year) {
                $mainID = $id[$i];
                $incrementNumber = $counter[$i];
                $bankn = $bankid[$i];
                $years = $this->year;
            }
            $i++;
        }

        if (!empty($mainID)) {
            echo "second entry" . $mainID;
            $db->payment_bank->updateOne(['companyID' => (int)$this->companyID, '_id' => $mainID],
                ['$set' => ['counter' => $incrementNumber + 1]]);
            $id = $incrementNumber + 1;
            $db->payment_bank->updateOne(['companyID' => (int)$this->companyID, '_id' => $mainID],
                ['$push' => [
                    $this->month => [
                        '_id' => $id,
                        'counter' => 0,
                        'paymentfrom' => $this->paymentFrom,
                        'companyselect' => $this->companySelect,
                        'bankname' => $this->bankName,
                        'payto' => $this->payto,
                        'billno' => $this->expensesbill,
                        'expensesname' => $this->expensesname,
                        'debitcategory' => $this->selectDebit,
                        'amount' => $this->amount,
                        'memo' => $this->memo,
                        'file' => $this->file
                    ]
                ]]);
            echo $id;
        } else {
            $bank = iterator_to_array($bank);
            $db->payment_bank->insertOne($bank);
            echo 0;
        }
    }

    //Insert Maintenance Function
    public function insertmaintenance($bank, $db, $helper)
    {

        $show = $db->payment_bank->find(['companyID' => (int)$this->companyID, 'bankID' => (int)$this->bankName, 'year' => (int)$this->year]);
        $counter = [];
        $id = [];
        $bankid = [];
        $yearID = [];

        $mainID = null;
        $incrementNumber = null;
        $bankn = null;
        $years = null;
        $companyID = null;
        $i = 0;
        foreach ($show as $s) {
            $id[] = $s['_id'];
            $counter[] = $s['counter'];
            $bankid[] = $s['bankID'];
            $yearID[] = $s['year'];
            $companyID = $s['companyID'];
            if ($counter[$i] < 5000 && $bankid[$i] == $this->bankName && $yearID[$i] == $this->year) {
                $mainID = $id[$i];
                $incrementNumber = $counter[$i];
                $bankn = $bankid[$i];
                $years = $this->year;
            }
            $i++;
        }

        if (!empty($mainID)) {
            echo "second entry" . $mainID;
            $db->payment_bank->updateOne(['companyID' => (int)$this->companyID, '_id' => $mainID],
                ['$set' => ['counter' => $incrementNumber + 1]]);
            $id = $incrementNumber + 1;
            $db->payment_bank->updateOne(['companyID' => (int)$this->companyID, '_id' => $mainID],
                ['$push' => [
                    $this->month => [
                        '_id' => $id,
                        'counter' => 0,
                        'paymentfrom' => $this->paymentFrom,
                        'companyselect' => $this->companySelect,
                        'bankname' => $this->bankName,
                        'payto' => $this->payto,
                        'debitcategory' => $this->selectDebit,
                        'amount' => $this->amount,
                        'ach' => $this->ach,
                        'truckno' => $this->truckno,
                        'trailerno' => $this->trailerno,
                        'memo' => $this->memo,
                        'file' => $this->file
                    ]
                ]]);
            echo $id;
        } else {
            $bank = iterator_to_array($bank);
            $db->payment_bank->insertOne($bank);
            echo 0;
        }
    }

    //Insert insurance Function
    public function insertinsurance($bank, $db, $helper)
    {

        $show = $db->payment_bank->find(['companyID' => (int)$this->companyID, 'bankID' => (int)$this->bankName, 'year' => (int)$this->year]);
        $counter = [];
        $id = [];
        $bankid = [];
        $yearID = [];

        $mainID = null;
        $incrementNumber = null;
        $bankn = null;
        $years = null;
        $companyID = null;
        $i = 0;
        foreach ($show as $s) {
            $id[] = $s['_id'];
            $counter[] = $s['counter'];
            $bankid[] = $s['bankID'];
            $yearID[] = $s['year'];
            $companyID = $s['companyID'];
            if ($counter[$i] < 5000 && $bankid[$i] == $this->bankName && $yearID[$i] == $this->year) {
                $mainID = $id[$i];
                $incrementNumber = $counter[$i];
                $bankn = $bankid[$i];
                $years = $this->year;
            }
            $i++;
        }

        if (!empty($mainID)) {
            echo "second entry" . $mainID;
            $db->payment_bank->updateOne(['companyID' => (int)$this->companyID, '_id' => $mainID],
                ['$set' => ['counter' => $incrementNumber + 1]]);
            $id = $incrementNumber + 1;
            $db->payment_bank->updateOne(['companyID' => (int)$this->companyID, '_id' => $mainID],
                ['$push' => [
                    $this->month => [
                        '_id' => $id,
                        'counter' => 0,
                        'paymentfrom' => $this->paymentFrom,
                        'companyselect' => $this->companySelect,
                        'bankname' => $this->bankName,
                        'payto' => $this->payto,
                        'debitcategory' => $this->selectDebit,
                        'amount' => $this->amount,
                        'ach' => $this->ach,
                        'truckno' => $this->truckno,
                        'trailerno' => $this->trailerno,
                        'memo' => $this->memo,
                        'file' => $this->file
                    ]
                ]]);
            echo $id;
        } else {
            $bank = iterator_to_array($bank);
            $db->payment_bank->insertOne($bank);
            echo 0;
        }
    }

    //Insert creditcard Function
    public function insertcreditcard($bank, $db, $helper)
    {

        $show = $db->payment_bank->find(['companyID' => (int)$this->companyID, 'bankID' => (int)$this->bankName, 'year' => (int)$this->year]);
        $counter = [];
        $id = [];
        $bankid = [];
        $yearID = [];

        $mainID = null;
        $incrementNumber = null;
        $bankn = null;
        $years = null;
        $companyID = null;
        $i = 0;
        foreach ($show as $s) {
            $id[] = $s['_id'];
            $counter[] = $s['counter'];
            $bankid[] = $s['bankID'];
            $yearID[] = $s['year'];
            $companyID = $s['companyID'];
            if ($counter[$i] < 5000 && $bankid[$i] == $this->bankName && $yearID[$i] == $this->year) {
                $mainID = $id[$i];
                $incrementNumber = $counter[$i];
                $bankn = $bankid[$i];
                $years = $this->year;
            }
            $i++;
        }

        if (!empty($mainID)) {
            echo "second entry" . $mainID;
            $db->payment_bank->updateOne(['companyID' => (int)$this->companyID, '_id' => $mainID],
                ['$set' => ['counter' => $incrementNumber + 1]]);
            $id = $incrementNumber + 1;
            $db->payment_bank->updateOne(['companyID' => (int)$this->companyID, '_id' => $mainID],
                ['$push' => [
                    $this->month => [
                        '_id' => $id,
                        'counter' => 0,
                        'paymentfrom' => $this->paymentFrom,
                        'companyselect' => $this->companySelect,
                        'bankname' => $this->bankName,
                        'payto' => $this->payto,
                        'card' => $this->card,
                        $this->card => $this->cardcategory,
                        'amount' => $this->amount,
                        'memo' => $this->memo,
                        'file' => $this->file
                    ]
                ]]);
            echo $id;
        } else {
            $bank = iterator_to_array($bank);
            $db->payment_bank->insertOne($bank);
            echo 0;
        }
    }

    //Insert fuelcard Function
    public function insertfuelcard($bank, $db, $helper)
    {

        $show = $db->payment_bank->find(['companyID' => (int)$this->companyID, 'bankID' => (int)$this->bankName, 'year' => (int)$this->year]);
        $counter = [];
        $id = [];
        $bankid = [];
        $yearID = [];

        $mainID = null;
        $incrementNumber = null;
        $bankn = null;
        $years = null;
        $companyID = null;
        $i = 0;
        foreach ($show as $s) {
            $id[] = $s['_id'];
            $counter[] = $s['counter'];
            $bankid[] = $s['bankID'];
            $yearID[] = $s['year'];
            $companyID = $s['companyID'];
            if ($counter[$i] < 5000 && $bankid[$i] == $this->bankName && $yearID[$i] == $this->year) {
                $mainID = $id[$i];
                $incrementNumber = $counter[$i];
                $bankn = $bankid[$i];
                $years = $this->year;
            }
            $i++;
        }

        if (!empty($mainID)) {
            echo "second entry" . $mainID;
            $db->payment_bank->updateOne(['companyID' => (int)$this->companyID, '_id' => $mainID],
                ['$set' => ['counter' => $incrementNumber + 1]]);
            $id = $incrementNumber + 1;
            $db->payment_bank->updateOne(['companyID' => (int)$this->companyID, '_id' => $mainID],
                ['$push' => [
                    $this->month => [
                        '_id' => $id,
                        'counter' => 0,
                        'paymentfrom' => $this->paymentFrom,
                        'companyselect' => $this->companySelect,
                        'bankname' => $this->bankName,
                        'payto' => $this->payto,
                        'fuellist' => $this->fuellist,
                        'amount' => $this->amount,
                        'memo' => $this->memo,
                        'file' => $this->file
                    ]
                ]]);
            echo $id;
        } else {
            $bank = iterator_to_array($bank);
            $db->payment_bank->insertOne($bank);
            echo 0;
        }
    }

    //Insert other Function
    public function insertother($bank, $db, $helper)
    {

        $show = $db->payment_bank->find(['companyID' => (int)$this->companyID, 'bankID' => (int)$this->bankName, 'year' => (int)$this->year]);
        $counter = [];
        $id = [];
        $bankid = [];
        $yearID = [];

        $mainID = null;
        $incrementNumber = null;
        $bankn = null;
        $years = null;
        $companyID = null;
        $i = 0;
        foreach ($show as $s) {
            $id[] = $s['_id'];
            $counter[] = $s['counter'];
            $bankid[] = $s['bankID'];
            $yearID[] = $s['year'];
            $companyID = $s['companyID'];
            if ($counter[$i] < 5000 && $bankid[$i] == $this->bankName && $yearID[$i] == $this->year) {
                $mainID = $id[$i];
                $incrementNumber = $counter[$i];
                $bankn = $bankid[$i];
                $years = $this->year;
            }
            $i++;
        }

        if (!empty($mainID)) {
            echo "second entry" . $mainID;
            $db->payment_bank->updateOne(['companyID' => (int)$this->companyID, '_id' => $mainID],
                ['$set' => ['counter' => $incrementNumber + 1]]);
            $id = $incrementNumber + 1;
            $db->payment_bank->updateOne(['companyID' => (int)$this->companyID, '_id' => $mainID],
                ['$push' => [
                    $this->month => [
                        '_id' => $id,
                        'counter' => 0,
                        'paymentfrom' => $this->paymentFrom,
                        'companyselect' => $this->companySelect,
                        'bankname' => $this->bankName,
                        'payto' => $this->payto,
                        'other' => $this->other,
                        'debitcategory' => $this->selectDebit,
                        'pobox' => $this->pobox,
                        'amount' => $this->amount,
                        'checkdate' => $this->checkDate,
                        'cheque' => $this->cheque,
                        'ach' => $this->ach,
                        'memo' => $this->memo,
                        'file' => $this->file
                    ]
                ]]);
            echo $id;
        } else {
            $bank = iterator_to_array($bank);
            $db->payment_bank->insertOne($bank);
            echo 0;
        }
    }

    //updatefile
    public function updatefile($bank, $db, $id)
    {
        $db->payment_bank->updateOne(['companyID' => (int)$_SESSION['companyId'], 'bankID' => (int)$this->bankName, 'year' => (int)$this->year, $this->month . '._id' => (int)$id],
            ['$set' => [$this->month . '.$.file' => $this->getFile()]]
        );
    }
}