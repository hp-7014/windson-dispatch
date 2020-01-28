<?php 
    @session_start();
	class CreditCardCategory implements IteratorAggregate
	{
		private $id;
		private $companyID;
		private $cardName;

		/*public function __construct(string $id, string $companyID, string $cardName)
		{
			$this->id = $id;
			$this->cardName = $cardName;
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
			return $this->cardName;
		}

		/**
		* @param string $id
		*/
		public function setCategoryName(string $cardName): void
		{
			$this->cardName = $cardName;
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
                    'credit_card' => array(['_id' => 0,'cardName'=>$this->cardName])
                )
            );
		}

        public function insert($category,$db,$helper) {
            $c_id = $db->credit_card_category->find(['companyID' =>(int)$category->getCompanyID()]);
            $count = 0;
            foreach ($c_id as $c) {
                $count++;
            }
            if ($count > 0) {
                $db->credit_card_category->updateOne(['companyID' => (int)$this->companyID],['$push'=>['credit_card'=>[
                    '_id'=>$helper->getDocumentSequence((int)$this->companyID,$db->credit_card_category),
                    'cardName'=>$this->cardName
                ]]]);
            } else {
                $card = iterator_to_array($category);
                $db->credit_card_category->insertOne($card);
            }

            echo "Data Inserted Successfully";
        }

        public function updateBankCard($card,$db) {
            $db->credit_card_category->updateOne(['companyID' => (int)$_SESSION['companyId'], 'credit_card._id' => (int)$this->getId()],
                ['$set' => ['credit_card.$.' . $card->getColumn() => $card->getCategoryName()]]
            );
        }

        public function deleteBankCard($card,$db) {
            $db->credit_card_category->updateOne(['companyID' => (int)$_SESSION['companyId']], [
                    '$pull' => ['credit_card' => ['_id' => (int)$card->getId()]]]
            );
        }

        public function import_Card($targetPath, $helper) {
            require_once('../excel/excel_reader2.php');
            require_once('../excel/SpreadsheetReader.php');
            include '../database/connection.php';   // connection

            $Reader = new SpreadsheetReader($targetPath);

            $sheetCount = count($Reader->sheets());

            for ($i = 0; $i < $sheetCount; $i++ )
            {
                $Reader->ChangeSheet($i);

                foreach ($Reader as $Row)
                {
                    if(isset($Row[0])) {
                        $this->cardName = $Row[0];
                        $this->companyID =$_SESSION['companyId'];
                        $this->setId($helper->getNextSequence("credit_card_category",$db));
                    }
                    $this->Insert($this,$db,$helper);
                }
            }
        }

        public function export_Card($db)
        {
            $card = $db->credit_card_category->find(['companyID' => $_SESSION['companyId']]);
            foreach ($card as $c_card) {
                $card = $c_card['credit_card'];
                foreach ($card as $test) {
                    $p[] = array($test['cardName']);
                }
            }
            echo json_encode($p);
        }
	}

