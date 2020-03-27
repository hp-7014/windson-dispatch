<?php
    @session_start();

    class StatusType implements IteratorAggregate
    {
        private $id;
        private $companyID;
        private $status_name;
        private $status_color;

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
        public function setId($id): void
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
        public function setCompanyID($companyID): void
        {
            $this->companyID = $companyID;
        }

        /**
         * @return mixed
         */
        public function getStatusName()
        {
            return $this->status_name;
        }

        /**
         * @param mixed $status_name
         */
        public function setStatusName($status_name): void
        {
            $this->status_name = $status_name;
        }

        /**
         * @return mixed
         */
        public function getStatusColor()
        {
            return $this->status_color;
        }

        /**
         * @param mixed $status_color
         */
        public function setStatusColor($status_color): void
        {
            $this->status_color = $status_color;
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
        public function getIterator() {
            return new ArrayIterator(
                array('_id'=> $this->id,
                    'companyID'=>(int) $this->companyID,
                    'counter' => 0,
                    'status' => array(['_id' => 0,'status_name'=>$this->status_name,'status_color'=>$this->status_color])
                )
            );
        }

        public function insert($category,$db,$helper)
        {
            $c_id = $db->status_type->find(['companyID' =>(int)$category->getCompanyID()]);
            $count = 0;
            foreach ($c_id as $c) {
                $count++;
            }
            if ($count > 0) {
                $db->status_type->updateOne(['companyID' => (int)$this->companyID],['$push'=>['status'=>[
                    '_id'=>$helper->getDocumentSequence((int)$this->companyID,$db->status_type),
                    'status_name'=>$this->status_name,
                    'status_color'=>$this->status_color,
                ]]]);
            } else {
                $status = iterator_to_array($category);
                $db->status_type->insertOne($status);
            }

            echo "Data Inserted Successfully";
        }

        public function updateStatustype($status,$db) {
            $db->status_type->updateOne(['companyID' => (int)$_SESSION['companyId'], 'status._id' => (int)$this->getId()],
                ['$set' => ['status.$.'.$status->getColumn() => $status->getStatusName()]]
            );
        }

        public function update_Statustype($status,$db) {
            $db->status_type->updateOne(['companyID' => (int)$_SESSION['companyId'], 'status._id' => (int)$this->getId()],
                ['$set' => ['status.$.'.$status->getColumn() => $status->getStatusColor()]]
            );
        }

        public function importStatus($targetPath, $helper, $db) {
            require_once('../excel/excel_reader2.php');
            require_once('../excel/SpreadsheetReader.php');

            $Reader = new SpreadsheetReader($targetPath);

            $sheetCount = count($Reader->sheets());

            for ($i = 0; $i < $sheetCount; $i++ )
            {
                $Reader->ChangeSheet($i);

                foreach ($Reader as $Row)
                {
                    $this->companyID = $_SESSION['companyId'];
                    $this->setId($helper->getNextSequence("status_type",$db));
                    if(isset($Row[0])) {
                        $this->status_name = $Row[0];
                    }
                    if(isset($Row[1])) {
                        $this->status_color = $Row[1];
                    }
                    $this->Insert($this,$db,$helper);
                }
            }
        }

        public function deleteStatusTe($status,$db) {
            $db->status_type->updateOne(['companyID' => (int)$_SESSION['companyId']], [
                '$pull' => ['status' => ['_id' => (int)$status->getId()]]]
            );
        }

    }