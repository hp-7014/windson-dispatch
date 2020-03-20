<?php

class Helper
{
    // for Auto-Increment ID
    public function getNextSequence($name,$collection) {
        $cursor = $collection->counter->find(['_id'=>$name]);
        $arr = iterator_to_array($cursor);
        $id = 0;
        foreach ($arr as $value) {
            $id = $value['seq'];
        }
        $id += 1;

        $collection->counter->findOneAndUpdate(['_id'=>$name],['$set'=>['seq'=>$id]]);
        return $id;
    }

    // for particular document counter ID
    function getDocumentSequence($key,$collection) {

        $cursor = $collection->find(['companyID'=>$key]);
        $array = iterator_to_array($cursor);
        $id = 0;
        foreach ($array as $value){
            $id = $value['counter'];
        }
        $id += 1;
        $collection->findOneAndUpdate(['companyID'=>$key],['$set'=>['counter'=>$id]]);

        return $id;
    }

    // particular object counter Increment
    function getDocumentSequenceId($type,$collection1,$arrayName,$companyid) {
        $cursor = $collection1->find(['companyID' => $companyid],[
            $arrayName => ['$elemMatch' => ['_id' => (int)$type]]
        ]);
        $array = iterator_to_array($cursor);
        $id = 0;
        foreach ($array as $value){
            $counterID = $value[$arrayName];
            foreach ($counterID as $row) {
                if((int)$type == $row['_id']){
                    $id = $row['counter'];
                }
            }
        }
        $id += 1;
        $collection1->updateOne(['companyID'=>$companyid,$arrayName.'_id' => (int)$type],['$set'=>[$arrayName.'$.counter'=>$id]]);
        return $id;
    }

    // particular object counter Decrement
    function getDocumentDecrementId($type,$collection2,$arrayName,$companyid) {
        $cursor = $collection2->find(['companyID' => $companyid],[
            $arrayName => ['$elemMatch' => ['_id' => (int)$type]]
        ]);
        $array = iterator_to_array($cursor);
        $id = 0;
        foreach ($array as $value){
            $counterID = $value[$arrayName];
            foreach ($counterID as $row) {
                if((int)$type == $row['_id']){
                    $id = $row['counter'];
                }
            }
        }
        $id -= 1;
        $collection2->updateOne(['companyID'=>1,$arrayName.'_id' => (int)$type],['$set'=>[$arrayName.'$.counter'=>$id]]);
        return $id;
    }

}

