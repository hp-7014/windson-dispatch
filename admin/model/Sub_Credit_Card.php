<?php
    @session_start();

    class SubCredit implements IteratorAggregate
    {
        private $id;
        private $companyID;
        private $displayName;
        private $mainCard;
        private $cardHolderName;
        private $cardNo;

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
        public function getDisplayName()
        {
            return $this->displayName;
        }

        /**
         * @param mixed $displayName
         */
        public function setDisplayName($displayName)
        {
            $this->displayName = $displayName;
        }

        /**
         * @return mixed
         */
        public function getMainCard()
        {
            return $this->mainCard;
        }

        /**
         * @param mixed $mainCard
         */
        public function setMainCard($mainCard)
        {
            $this->mainCard = $mainCard;
        }

        /**
         * @return mixed
         */
        public function getCardHolderName()
        {
            return $this->cardHolderName;
        }

        /**
         * @param mixed $cardHolderName
         */
        public function setCardHolderName($cardHolderName)
        {
            $this->cardHolderName = $cardHolderName;
        }

        /**
         * @return mixed
         */
        public function getCardNo()
        {
            return $this->cardNo;
        }

        /**
         * @param mixed $cardNo
         */
        public function setCardNo($cardNo)
        {
            $this->cardNo = $cardNo;
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
                    'sub_credit' => array([
                        '_id' => 0,
                        'displayName'=>$this->displayName,
                        'mainCard'=>$this->mainCard,
                        'cardHolderName'=>$this->cardHolderName,
                        'cardNo'=>$this->cardNo,
                        'delete_status'=>'0',
                        'insertedUser' => '1',
                    ])
                )
            );
        }

        public function insert($category,$db,$helper)
        {
            $c_id = $db->sub_credit_card->find(['companyID' =>(int)$category->getCompanyID()]);
            $count = 0;
            foreach ($c_id as $c) {
                $count++;
            }
            if ($count > 0) {
                $db->sub_credit_card->updateOne(['companyID' => (int) $this->companyID],['$push'=>['sub_credit'=>[
                    '_id'=>$helper->getDocumentSequence((int) $this->companyID,$db->sub_credit_card),
                    'displayName'=>$this->displayName,
                    'mainCard'=>$this->mainCard,
                    'cardHolderName'=>$this->cardHolderName,
                    'cardNo'=>$this->cardNo,
                    'delete_status'=>'0',
                    'insertedUser' => '1',
                ]]]);
            } else {
                $s_credit = iterator_to_array($category);
                $db->sub_credit_card->insertOne($s_credit);
            }

            echo "Data Insert Successfully";
        }

        public function import_sub_Credit($targetPath, $helper)
        {
            require_once('../excel/excel_reader2.php');
            require_once('../excel/SpreadsheetReader.php');
            include '../database/connection.php';   // connection

            $Reader = new SpreadsheetReader($targetPath);

            $sheetCount = count($Reader->sheets());

            for ($i = 0; $i < $sheetCount; $i++) {

                $Reader->ChangeSheet($i);

                foreach ($Reader as $Row) {
                    $this->companyID = $_SESSION['companyId'];
                    $this->setId($helper->getNextSequence("sub_credit_card",$db));
                    if(isset($Row[0])) {
                        $this->displayName = $Row[0];
                    }
                    if(isset($Row[1])) {
                        $this->mainCard = $Row[1];
                    }
                    if(isset($Row[2])) {
                        $this->cardHolderName = $Row[2];
                    }
                    if(isset($Row[3])) {
                        $this->cardNo = $Row[3];
                    }

                    $this->Insert($this,$db,$helper);
                }
            }
        }

        public function update_Sub_Credit($s_credit,$db){
            $db->sub_credit_card->updateOne(['companyID' => (int) $_SESSION['companyId'], 'sub_credit._id' => (int)$this->getId()],
                ['$set' => ['sub_credit.$.' . $s_credit->getColumn() => $s_credit->getDisplayName()]]
            );

            echo "Data Update Successfully.";
        }

        public function delete_Sub_Credit($s_credit,$db) {
            $db->sub_credit_card->updateOne(['companyID' => (int)$_SESSION['companyId']], [
                '$pull' => ['sub_credit' => ['_id' => (int)$s_credit->getId()]]]
            );
        }

        public function export_Sub_Credit($db){
            $s_credit = $db->sub_credit_card->find(['companyID' => $_SESSION['companyId']]);
            foreach ($s_credit as $bdebit) {
                $bank_debit = $bdebit['sub_credit'];
                foreach ($bank_debit as $test) {
                    $p[] = array(
                        $test['displayName'],
                        $test['mainCard'],
                        $test['cardHolderName'],
                        $test['cardNo'],
                    );
                }
            }
            echo json_encode($p);
        }
    }