<?php
    @session_start();

    class CreditCard implements IteratorAggregate
    {
        private $id;
        private $companyID;
        private $Name;
        private $displayName;
        private $cardType;
        private $cardHolderName;
        private $cardNo;
        private $openingBalanceDt;
        private $cardLimit;
        private $openingBalance;
        private $transacBalance;

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
        public function getName()
        {
            return $this->Name;
        }

        /**
         * @param mixed $Name
         */
        public function setName($Name)
        {
            $this->Name = $Name;
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
        public function getCardType()
        {
            return $this->cardType;
        }

        /**
         * @param mixed $cardType
         */
        public function setCardType($cardType)
        {
            $this->cardType = $cardType;
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
        public function getOpeningBalanceDt()
        {
            return $this->openingBalanceDt;
        }

        /**
         * @param mixed $openingBalanceDt
         */
        public function setOpeningBalanceDt($openingBalanceDt)
        {
            $this->openingBalanceDt = $openingBalanceDt;
        }

        /**
         * @return mixed
         */
        public function getCardLimit()
        {
            return $this->cardLimit;
        }

        /**
         * @param mixed $cardLimit
         */
        public function setCardLimit($cardLimit)
        {
            $this->cardLimit = $cardLimit;
        }

        /**
         * @return mixed
         */
        public function getOpeningBalance()
        {
            return $this->openingBalance;
        }

        /**
         * @param mixed $openingBalance
         */
        public function setOpeningBalance($openingBalance)
        {
            $this->openingBalance = $openingBalance;
        }

        /**
         * @return mixed
         */
        public function getTransacBalance()
        {
            return $this->transacBalance;
        }

        /**
         * @param mixed $transacBalance
         */
        public function setTransacBalance($transacBalance)
        {
            $this->transacBalance = $transacBalance;
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
                    'admin_credit' => array([
                        '_id' => 0,
                        'Name'=>$this->Name,
                        'displayName'=>$this->displayName,
                        'cardType'=>$this->cardType,
                        'cardHolderName'=>$this->cardHolderName,
                        'cardNo'=>$this->cardNo,
                        'openingBalanceDt'=>$this->openingBalanceDt,
                        'cardLimit'=>$this->cardLimit,
                        'openingBalance'=>$this->openingBalance,
                        'transacBalance'=>$this->transacBalance,
                        'delete_status'=>'0',
                        'insertedUser' => '1',
                    ])
                )
            );
        }

        public function insert($category,$db,$helper)
        {
            $c_id = $db->credit_card_admin->find(['companyID' =>(int)$category->getCompanyID()]);
            $count = 0;
            foreach ($c_id as $c) {
                $count++;
            }
            if ($count > 0) {
                $db->credit_card_admin->updateOne(['companyID' => (int) $this->companyID],['$push'=>['admin_credit'=>[
                    '_id'=>$helper->getDocumentSequence((int) $this->companyID,$db->credit_card_admin),
                    'Name'=>$this->Name,
                    'displayName'=>$this->displayName,
                    'cardType'=>$this->cardType,
                    'cardHolderName'=>$this->cardHolderName,
                    'cardNo'=>$this->cardNo,
                    'openingBalanceDt'=>$this->openingBalanceDt,
                    'cardLimit'=>$this->cardLimit,
                    'openingBalance'=>$this->openingBalance,
                    'transacBalance'=>$this->transacBalance,
                    'delete_status'=>'0',
                    'insertedUser' => '1',
                ]]]);
            } else {
                $b_admin = iterator_to_array($category);
                $db->credit_card_admin->insertOne($b_admin);
            }

            echo "Data Insert Successfully";
        }

        public function export_Bank_Credit($db){
            $b_credit = $db->credit_card_admin->find(['companyID' => $_SESSION['companyId']]);
            foreach ($b_credit as $bdebit) {
                $bank_credit = $bdebit['admin_credit'];
                foreach ($bank_credit as $test) {
                    $p[] = array(
                        $test['Name'],
                        $test['displayName'],
                        $test['cardType'],
                        $test['cardHolderName'],
                        $test['cardNo'],
                        $test['openingBalanceDt'],
                        $test['cardLimit'],
                        $test['openingBalance'],
                        $test['transacBalance'],
                    );
                }
            }
            echo json_encode($p);
        }

        public function import_Bank_Credit($targetPath, $helper)
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
                    $this->setId($helper->getNextSequence("bank_admin",$db));
                    if(isset($Row[0])) {
                        $this->Name = $Row[0];
                    }
                    if(isset($Row[1])) {
                        $this->displayName = $Row[1];
                    }
                    if(isset($Row[2])) {
                        $this->cardType = $Row[2];
                    }
                    if(isset($Row[3])) {
                        $this->cardHolderName = $Row[3];
                    }
                    if(isset($Row[4])) {
                        $this->cardNo = $Row[4];
                    }
                    if(isset($Row[5])) {
                        $this->cardLimit = $Row[5];
                    }
                    if(isset($Row[6])) {
                        $this->openingBalance = $Row[6];
                    }
                    if(isset($Row[7])) {
                        $this->transacBalance = $Row[7];
                    }

                    $this->Insert($this,$db,$helper);
                }
            }
        }

        public function delete_Credits($b_credit,$db) {
            $db->credit_card_admin->updateOne(['companyID' => (int)$_SESSION['companyId']], [
                    '$pull' => ['admin_credit' => ['_id' => (int)$b_credit->getId()]]]
            );
        }

        public function update_Credit($b_credit,$db){
            $db->credit_card_admin->updateOne(['companyID' => (int) $_SESSION['companyId'], 'admin_credit._id' => (int)$this->getId()],
                ['$set' => ['admin_credit.$.' . $b_credit->getColumn() => $b_credit->getName()]]
            );

            echo "Data Update Successfully.";
        }

        public function update_CardType($b_credit,$db){
            $db->credit_card_admin->updateOne(['companyID' => (int) $_SESSION['companyId'], 'admin_credit._id' => (int)$this->getId()],
                ['$set' => ['admin_credit.$.' . $b_credit->getColumn() => $b_credit->getCardType()]]
            );

            echo "Data Update Successfully.";
        }

    }
