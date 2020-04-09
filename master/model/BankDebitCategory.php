<?php
    @session_start();

    class BankDebitCategory implements IteratorAggregate
    {
        private $id;
        private $companyID;
        private $bankName;

        /*		public function __construct(string $id, string $companyID, string $bankName)
                {
                    $this->id = $id;
                    $this->bankName = $bankName;
                    $this->companyID = $companyID;
                }*/
        /**
         * @return string
         */
        public function getId(): string
        {
            return $this->id;
        }

        /**
         * @param string $id
         */
        public function setId($id): void
        {
            $this->id = $id;
        }

        /**
         * @return string
         */
        public function getCompanyID(): string
        {
            return $this->companyID;
        }

        /**
         * @param string $id
         */
        public function setCompanyID($companyID): void
        {
            $this->companyID = $companyID;
        }

        /**
         * @return string
         */
        public function getCategoryName(): string
        {
            return $this->bankName;
        }

        /**
         * @param string $id
         */
        public function setCategoryName(string $bankName): void
        {
            $this->bankName = $bankName;
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
            return new ArrayIterator(
                array('_id'=> $this->id,
                    'companyID'=>(int) $this->companyID,
                    'counter' => 0,
                    'bank_debit' => array(['_id' => 0,'bankName'=>$this->bankName,'counter'=>0])
                )
            );
        }

        public function insert($category,$db,$helper)
        {
            $c_id = $db->bank_debit_category->find(['companyID' =>(int)$category->getCompanyID()]);
            $count = 0;
            foreach ($c_id as $c) {
                $count++;
            }
            if ($count > 0) {
                $db->bank_debit_category->updateOne(['companyID' => (int)$this->companyID],['$push'=>['bank_debit'=>[
                    '_id'=>$helper->getDocumentSequence((int)$this->companyID,$db->bank_debit_category),
                    'bankName' => $this->bankName,
                    'counter' => 0
                ]]]);
            } else {
                $debit = iterator_to_array($category);
                $db->bank_debit_category->insertOne($debit);
            }

            echo "Data Insert Successfully";
        }

        public function deleteBankDebit($debit,$db) {
            $db->bank_debit_category->updateOne(['companyID' => (int)$_SESSION['companyId']], [
                    '$pull' => ['bank_debit' => ['_id' => (int)$debit->getId()]]]
            );

            //$db->bank_debit_category->deleteOne(['_id' => (int)$debit->getId()]);
        }

        public function updateBankDebit($debit,$db){
            $db->bank_debit_category->updateOne(['companyID' => (int)$_SESSION['companyId'], 'bank_debit._id' => (int)$this->getId()],
                ['$set' => ['bank_debit.$.' . $debit->getColumn() => $debit->getCategoryName()]]
            );

            /*$db->bank_debit_category->updateOne(
                ['_id' => (int)$debit->getId()],
                ['$set' => [$debit->getColumn()=> $debit->getCategoryName()]]
            );*/
            echo "Data Update Successfully.";
        }

        public function import_Debit($targetPath, $helper, $db)
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
                            $this->setId($helper->getNextSequence("bank_debit_category", $db));
                            $this->companyID = $_SESSION['companyId'];
                            $this->bankName = $Row[0];
                        }

                        $this->Insert($this, $db,$helper);
                    }
                }
            }
            unlink($targetPath);
        }

        public function export_Excel($db){
            $debit = $db->bank_debit_category->find(['companyID' => $_SESSION['companyId']]);
            foreach ($debit as $bdebit) {
                $bank_debit = $bdebit['bank_debit'];
                foreach ($bank_debit as $test) {
                    $p[] = array($test['bankName']);
                }
            }
            echo json_encode($p);
        }
    }