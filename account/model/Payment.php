<?php
/**
 * Created by PhpStorm.
 * User: BOND
 * Date: 3/26/2020
 * Time: 4:13 PM
 */
session_start();

class Payment
{
    private $carrierName;

    /**
     * @return mixed
     */
    public function getCarrierName()
    {
        return $this->carrierName;
    }

    /**
     * @param mixed $carrierName
     */
    public function setCarrierName($carrierName): void
    {
        $this->carrierName = $carrierName;
    }

    public function getCarrierInvoice($payment, $db)
    {
        $show = $db->carrier->aggregate([
            ['$lookup' => [
                'from' => 'active_load',
                'localField' => 'companyID',
                'foreignField' => 'companyID',
                'as' => 'company'
            ]],
            ['$match' => ['companyID' => 1]]
        ]);
        $cid = $this->carrierName;
        $i = 0;
        foreach ($show as $show1) {
            foreach ($show1['carrier'] as $car) {
                if ($cid == $car['_id']) {
                    $carrierID = $car['_id'];
                    break;
                }
            }
            foreach ($show1['company'] as $s) {
                foreach ($s['Invoiced'] as $a) {
                    $a['_id'][] = $a['_id'];
                    $a['carrier_total'][] = $a['carrier_total'];
                    $i++;
                }
            }
        }
        echo json_encode($invoice);
    }
}