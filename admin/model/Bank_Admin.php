<?php
    @session_start();

    class Bank_Admin implements IteratorAggregate
    {
        private $id;
        private $companyID;
        private $bankAddresss;
        private $bankName;
        private $accountHolder;
        private $accountNo;
        private $routingNo;
        private $openingBalDate;
        private $openingBalance;
        private $transacBalance;
        private $currentcheqNo;

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
        public function getBankAddresss()
        {
            return $this->bankAddresss;
        }

        /**
         * @param mixed $bankAddresss
         */
        public function setBankAddresss($bankAddresss)
        {
            $this->bankAddresss = $bankAddresss;
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
        public function setBankName($bankName)
        {
            $this->bankName = $bankName;
        }

        /**
         * @return mixed
         */
        public function getAccountHolder()
        {
            return $this->accountHolder;
        }

        /**
         * @param mixed $accountHolder
         */
        public function setAccountHolder($accountHolder)
        {
            $this->accountHolder = $accountHolder;
        }

        /**
         * @return mixed
         */
        public function getAccountNo()
        {
            return $this->accountNo;
        }

        /**
         * @param mixed $accountNo
         */
        public function setAccountNo($accountNo)
        {
            $this->accountNo = $accountNo;
        }

        /**
         * @return mixed
         */
        public function getRoutingNo()
        {
            return $this->routingNo;
        }

        /**
         * @param mixed $routingNo
         */
        public function setRoutingNo($routingNo)
        {
            $this->routingNo = $routingNo;
        }

        /**
         * @return mixed
         */
        public function getOpeningBalDate()
        {
            return $this->openingBalDate;
        }

        /**
         * @param mixed $openingBalDate
         */
        public function setOpeningBalDate($openingBalDate)
        {
            $this->openingBalDate = $openingBalDate;
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
        public function getCurrentcheqNo()
        {
            return $this->currentcheqNo;
        }

        /**
         * @param mixed $currentcheqNo
         */
        public function setCurrentcheqNo($currentcheqNo)
        {
            $this->currentcheqNo = $currentcheqNo;
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
                    'admin_bank' => array([
                        '_id' => 0,
                        'bankName'=>$this->bankName,
                        'bankAddresss'=>$this->bankAddresss,
                        'accountHolder'=>$this->accountHolder,
                        'accountNo'=>$this->accountNo,
                        'routingNo'=>$this->routingNo,
                        'openingBalDate'=>$this->openingBalDate,
                        'openingBalance'=>$this->openingBalance,
                        'currentcheqNo'=>$this->currentcheqNo,
                        'transacBalance'=>$this->transacBalance,
                        'delete_status'=>'0',
                        'insertedUser' => '1',
                    ])
                )
            );
        }

        public function insert($category,$db,$helper)
        {
            $c_id = $db->bank_admin->find(['companyID' =>(int)$category->getCompanyID()]);
            $count = 0;
            foreach ($c_id as $c) {
                $count++;
            }
            if ($count > 0) {
                $db->bank_admin->updateOne(['companyID' => (int) $this->companyID],['$push'=>['admin_bank'=>[
                    '_id'=>$helper->getDocumentSequence((int) $this->companyID,$db->bank_admin),
                    'bankName'=>$this->bankName,
                    'bankAddresss'=>$this->bankAddresss,
                    'accountHolder'=>$this->accountHolder,
                    'accountNo'=>$this->accountNo,
                    'routingNo'=>$this->routingNo,
                    'openingBalDate'=>$this->openingBalDate,
                    'openingBalance'=>$this->openingBalance,
                    'currentcheqNo'=>$this->currentcheqNo,
                    'transacBalance'=>$this->transacBalance,
                    'delete_status'=>'0',
                    'insertedUser' => '1',
                ]]]);
            } else {
                $b_admin = iterator_to_array($category);
                $db->bank_admin->insertOne($b_admin);
            }

            echo "Data Insert Successfully";
        }

        public function update_Bank($b_admin,$db){
            $db->bank_admin->updateOne(['companyID' => (int) $_SESSION['companyId'], 'admin_bank._id' => (int)$this->getId()],
                ['$set' => ['admin_bank.$.' . $b_admin->getColumn() => $b_admin->getBankName()]]
            );

            echo "Data Update Successfully.";
        }

        public function update_Account($acc,$db){
            $db->bank_admin->updateOne(['companyID' => (int) $_SESSION['companyId'], 'admin_bank._id' => (int)$this->getId()],
                ['$set' => ['admin_bank.$.' . $acc->getColumn() => $acc->getAccountHolder()]]
            );

            echo "Data Update Successfully.";
        }

        public function delete_Banks($debit,$db) {
            $db->bank_admin->updateOne(['companyID' => (int)$_SESSION['companyId']], [
                    '$pull' => ['admin_bank' => ['_id' => (int)$debit->getId()]]]
            );
        }

        public function import_Bank_Admin($targetPath, $helper)
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
                        $this->bankName = $Row[0];
                    }
                    if(isset($Row[1])) {
                        $this->bankAddresss = $Row[1];
                    }
                    if(isset($Row[2])) {
                        $this->accountHolder = $Row[2];
                    }
                    if(isset($Row[3])) {
                        $this->accountNo = $Row[3];
                    }
                    if(isset($Row[4])) {
                        $this->routingNo = $Row[4];
                    }
                    if(isset($Row[5])) {
                        $this->openingBalDate = $Row[5];
                    }
                    if(isset($Row[6])) {
                        $this->openingBalance = $Row[6];
                    }
                    if(isset($Row[7])) {
                        $this->currentcheqNo = $Row[7];
                    }
                    if(isset($Row[8])) {
                        $this->transacBalance = $Row[8];
                    }

                    $this->Insert($this,$db,$helper);
                }
            }
        }

        public function export_Bank_A($db){
            $b_admin = $db->bank_admin->find(['companyID' => $_SESSION['companyId']]);
            foreach ($b_admin as $bdebit) {
                $bank_debit = $bdebit['admin_bank'];
                foreach ($bank_debit as $test) {
                    $p[] = array(
                        $test['bankName'],
                        $test['bankAddresss'],
                        $test['accountHolder'],
                        $test['accountNo'],
                        $test['routingNo'],
                        $test['openingBalDate'],
                        $test['openingBalance'],
                        $test['currentcheqNo'],
                        $test['transacBalance'],
                    );
                }
            }
            echo json_encode($p);
        }

    }