<?php
    @session_start();

    class CustomsBroker implements IteratorAggregate
    {
        private $id;
        private $companyID;
        private $brokerName;
        private $crossing;
        private $telephone;
        private $ext;
        private $tollfree;
        private $fax;
        private $Status;

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
        public function getBrokerName()
        {
            return $this->brokerName;
        }

        /**
         * @param mixed $brokerName
         */
        public function setBrokerName($brokerName)
        {
            $this->brokerName = $brokerName;
        }

        /**
         * @return mixed
         */
        public function getCrossing()
        {
            return $this->crossing;
        }

        /**
         * @param mixed $crossing
         */
        public function setCrossing($crossing)
        {
            $this->crossing = $crossing;
        }

        /**
         * @return mixed
         */
        public function getTelephone()
        {
            return $this->telephone;
        }

        /**
         * @param mixed $telephone
         */
        public function setTelephone($telephone)
        {
            $this->telephone = $telephone;
        }

        /**
         * @return mixed
         */
        public function getExt()
        {
            return $this->ext;
        }

        /**
         * @param mixed $ext
         */
        public function setExt($ext)
        {
            $this->ext = $ext;
        }

        /**
         * @return mixed
         */
        public function getTollfree()
        {
            return $this->tollfree;
        }

        /**
         * @param mixed $tollfree
         */
        public function setTollfree($tollfree)
        {
            $this->tollfree = $tollfree;
        }

        /**
         * @return mixed
         */
        public function getFax()
        {
            return $this->fax;
        }

        /**
         * @param mixed $fax
         */
        public function setFax($fax)
        {
            $this->fax = $fax;
        }

        /**
         * @return mixed
         */
        public function getStatus()
        {
            return $this->Status;
        }

        /**
         * @param mixed $Status
         */
        public function setStatus($Status)
        {
            $this->Status = $Status;
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
                    'custom_b' => array([
                        '_id' => 0,
                        'brokerName'=>$this->brokerName,
                        'crossing'=>$this->crossing,
                        'telephone'=>$this->telephone,
                        'ext'=>$this->ext,
                        'tollfree'=>$this->tollfree,
                        'fax'=>$this->fax,
                        'Status'=>$this->Status,
                        'delete_status'=>'0',
                        'insertedUser' => $_SESSION['companyName'],
                    ])
                )
            );
        }

        public function insert($category,$db,$helper)
        {
            $c_id = $db->customs_broker->find(['companyID' =>(int)$category->getCompanyID()]);
            $count = 0;
            foreach ($c_id as $c) {
                $count++;
            }
            if ($count > 0) {
                $db->customs_broker->updateOne(['companyID' => (int) $this->companyID],['$push'=>['custom_b'=>[
                    '_id'=>$helper->getDocumentSequence((int) $this->companyID,$db->customs_broker),
                    'brokerName'=>$this->brokerName,
                    'crossing'=>$this->crossing,
                    'telephone'=>$this->telephone,
                    'ext'=>$this->ext,
                    'tollfree'=>$this->tollfree,
                    'fax'=>$this->fax,
                    'Status'=>$this->Status,
                    'delete_status'=>'0',
                    'insertedUser' => $_SESSION['companyName'],
                ]]]);
            } else {
                $c_broker = iterator_to_array($category);
                $db->customs_broker->insertOne($c_broker);
            }

            //echo "Data Insert Successfully";
        }

        public function update_Cus_Broker($c_broker,$db){
            $db->customs_broker->updateOne(['companyID' => (int) $_SESSION['companyId'], 'custom_b._id' => (int)$this->getId()],
                ['$set' => ['custom_b.$.' . $c_broker->getColumn() => $c_broker->getBrokerName()]]
            );

            echo "Data Update Successfully.";
        }

        public function delete_Custom_Broker($c_broker,$db) {
            // $db->customs_broker->updateOne(['companyID' => (int)$_SESSION['companyId'], 'custom_b._id' => (int)$this->getId()],
            //     ['$set' => ['custom_b.$.delete_status' => "1"]]
            // );
            $db->customs_broker->updateOne(['companyID' => (int)$_SESSION['companyId']], [
                '$pull' => ['custom_b' => ['_id' => (int)$c_broker->getId()]]]
            );
        }

        public function export_Custom_Broker($db) {
            $c_broker = $db->customs_broker->find(['companyID' => $_SESSION['companyId']]);
            foreach ($c_broker as $broker) {
                $broker_c = $broker['custom_b'];
                foreach ($broker_c as $test) {
                    $p[] = array(
                        $test['brokerName'],
                        $test['crossing'],
                        $test['telephone'],
                        $test['ext'],
                        $test['tollfree'],
                        $test['fax'],
                        $test['Status'],
                    );
                }
            }
            echo json_encode($p);
        }

        public function import_Custom_Broker($targetPath,$helper,$db) {
            require_once('../excel/excel_reader2.php');
            require_once('../excel/SpreadsheetReader.php');

            $Reader = new SpreadsheetReader($targetPath);

            $sheetCount = count($Reader->sheets());

            for ($i = 0; $i < $sheetCount; $i++) {

                $Reader->ChangeSheet($i);
                $count = 0;
                foreach ($Reader as $Row)
                {
                    $count++;
                    if($count > 1000){
                        echo "Your file should contain atmost 1000 entries. First 1000 entries added successfully"; 
                        break;
                    } else {
                        $this->companyID = $_SESSION['companyId'];
                        $this->setId($helper->getNextSequence("customBroker",$db));
                        if (isset($Row[0])) {
                            $this->brokerName = $Row[0];
                        }
                        if (isset($Row[1])) {
                            $this->crossing = $Row[1];
                        }
                        if (isset($Row[2])) {
                            $this->telephone = $Row[2];
                        }
                        if (isset($Row[3])) {
                            $this->ext = $Row[3];
                        }
                        if (isset($Row[4])) {
                            $this->tollfree = $Row[4];
                        }
                        if (isset($Row[5])) {
                            $this->fax = $Row[5];
                        }
                        if (isset($Row[6])) {
                            $this->Status = $Row[6];
                        }

                        $this->Insert($this,$db,$helper);
                    }
                }
            }
            unlink($targetPath);
        }
        
    }