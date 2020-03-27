<?php
    @session_start();

	class BankCreditCategory implements IteratorAggregate
	{
		private $id;
		private $companyID;
		private $bankName;

		/*public function __construct(string $id, string $companyID, string $bankName)
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
		public function setCompanyID(string $companyID): void
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

		/**
		* @inheritDoc
		*/
		public function getIterator()
		{
			return new ArrayIterator(
                array('_id'=> $this->id,
                    'companyID'=>(int) $this->companyID,
                    'counter' => 0,
                    'bank_credit' => array(['_id' => 0,'bankName'=>$this->bankName,'counter'=>0])
                )
            );
		}

		public function insert($category,$db,$helper)
		{
            $c_id = $db->bank_credit_category->find(['companyID' =>(int)$category->getCompanyID()]);
            $count = 0;
            foreach ($c_id as $c) {
                $count++;
            }
            if ($count > 0) {
                $db->bank_credit_category->updateOne(['companyID' => (int)$this->companyID],['$push'=>['bank_credit'=>[
                    '_id'=>$helper->getDocumentSequence((int)$this->companyID,$db->bank_credit_category),
                    'bankName'=>$this->bankName,
                    'counter'=>0
                ]]]);
            } else {
                $credit = iterator_to_array($category);
                $db->bank_credit_category->insertOne($credit);
            }

			echo "Data Insert Successfully";
		}

        public function updateBankCredit($credit,$db) {
            $db->bank_credit_category->updateOne(['companyID' => (int)$_SESSION['companyId'], 'bank_credit._id' => (int)$this->getId()],
                ['$set' => ['bank_credit.$.' . $credit->getColumn() => $credit->getCategoryName()]]
            );
        }

        public function deleteBankCredit($credit,$db) {
            $db->bank_credit_category->updateOne(['companyID' => (int)$_SESSION['companyId']], [
                '$pull' => ['bank_credit' => ['_id' => (int)$credit->getId()]]]
            );
        }

        public function importCredit($targetPath, $helper, $db) {
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
                        $this->bankName = $Row[0];
                        $this->companyID =$_SESSION['companyId'];
                        $this->setId($helper->getNextSequence("bank_credit_category",$db));
                    }
                    $this->Insert($this,$db,$helper);
                }
            }
        }

        public function exportExcelCredit($db) {
            $credit = $db->bank_credit_category->find(['companyID' => $_SESSION['companyId']]);
            foreach ($credit as $c_credit) {
                $bank_credit = $c_credit['bank_credit'];
                foreach ($bank_credit as $test) {
                    $p[] = array($test['bankName']);
                }
            }
            echo json_encode($p);
        }
	}

