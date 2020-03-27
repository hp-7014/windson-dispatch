<?php
@session_start();

class ActiveLoad implements IteratorAggregate
{
    private $id;
    private $companyID;
    private $company;
    private $counter;
    private $customer;
    private $dispatcher;
    private $cnno;
    private $status;
    private $active_type;
    private $rate;
    private $units;
    private $fsc;
    private $fsc_percentage;
    private $other_charges;
    private $other_charges_modal;
    private $total_rate;
    private $equipment_type;
    private $typeofLoader;
    private $carrier_name;
    private $flat_rate;
    private $advance_charges;
    private $carrier_other_modal;
    private $carrier_total;
    private $currency;
    private $driver_name;
    private $truck;
    private $trailer;
    private $loaded_mile;
    private $empty_mile;
    private $driver_other;
    private $driver_other_modal;
    private $tarp;
    private $flat;
    private $driver_total;
    private $owner_name;
    private $owner_percentage;
    private $owner_truck;
    private $owner_trailer;
    private $owner_other;
    private $owner_other_modal;
    private $owner_total;
    private $start_location;
    private $end_location;
    private $shipper;
    private $consignee;
    private $tarp_select;
    private $loaded_miles_value;
    private $empty_miles_value;
    private $driver_miles_value;
    private $file = array();
    private $load_notes;
    private $carrier_email;
    private $customer_email;
    private $created_user;
    private $created_at;
    private $updated_at;

    private $status_Break_Down_time;
    private $status_Loaded_time;
    private $status_Arrived_Consignee_time;
    private $status_Arrived_Shipper_time;
    private $status_Paid_time;
    private $status_Open_time;
    private $status_On_Route_time;
    private $status_Dispatched_time;
    private $status_Delivered_time;
    private $status_Completed_time;
    private $status_Invoiced_time;

    private $newStatus;
    private $oldArray;

    /**
     * @return mixed
     */
    public function getOldArray()
    {
        return $this->oldArray;
    }

    /**
     * @param mixed $oldArray
     */
    public function setOldArray($oldArray): void
    {
        $this->oldArray = $oldArray;
    }

    /**
     * @return mixed
     */
    public function getNewStatus()
    {
        return $this->newStatus;
    }

    /**
     * @param mixed $newStatus
     */
    public function setNewStatus($newStatus): void
    {
        $this->newStatus = $newStatus;
    }


    /**
     * @return mixed
     */
    public function getStatusBreakDownTime()
    {
        return $this->status_Break_Down_time;
    }

    /**
     * @param mixed $status_Break_Down_time
     */
    public function setStatusBreakDownTime($status_Break_Down_time): void
    {
        $this->status_Break_Down_time = $status_Break_Down_time;
    }

    /**
     * @return mixed
     */
    public function getStatusLoadedTime()
    {
        return $this->status_Loaded_time;
    }

    /**
     * @param mixed $status_Loaded_time
     */
    public function setStatusLoadedTime($status_Loaded_time): void
    {
        $this->status_Loaded_time = $status_Loaded_time;
    }

    /**
     * @return mixed
     */
    public function getStatusArrivedConsigneeTime()
    {
        return $this->status_Arrived_Consignee_time;
    }

    /**
     * @param mixed $status_Arrived_Consignee_time
     */
    public function setStatusArrivedConsigneeTime($status_Arrived_Consignee_time): void
    {
        $this->status_Arrived_Consignee_time = $status_Arrived_Consignee_time;
    }

    /**
     * @return mixed
     */
    public function getStatusArrivedShipperTime()
    {
        return $this->status_Arrived_Shipper_time;
    }

    /**
     * @param mixed $status_Arrived_Shipper_time
     */
    public function setStatusArrivedShipperTime($status_Arrived_Shipper_time): void
    {
        $this->status_Arrived_Shipper_time = $status_Arrived_Shipper_time;
    }

    /**
     * @return mixed
     */
    public function getStatusPaidTime()
    {
        return $this->status_Paid_time;
    }

    /**
     * @param mixed $status_Paid_time
     */
    public function setStatusPaidTime($status_Paid_time): void
    {
        $this->status_Paid_time = $status_Paid_time;
    }

    /**
     * @return mixed
     */
    public function getStatusOpenTime()
    {
        return $this->status_Open_time;
    }

    /**
     * @param mixed $status_Open_time
     */
    public function setStatusOpenTime($status_Open_time): void
    {
        $this->status_Open_time = $status_Open_time;
    }

    /**
     * @return mixed
     */
    public function getStatusOnRouteTime()
    {
        return $this->status_On_Route_time;
    }

    /**
     * @param mixed $status_On_Route_time
     */
    public function setStatusOnRouteTime($status_On_Route_time): void
    {
        $this->status_On_Route_time = $status_On_Route_time;
    }

    /**
     * @return mixed
     */
    public function getStatusDispatchedTime()
    {
        return $this->status_Dispatched_time;
    }

    /**
     * @param mixed $status_Dispatched_time
     */
    public function setStatusDispatchedTime($status_Dispatched_time): void
    {
        $this->status_Dispatched_time = $status_Dispatched_time;
    }

    /**
     * @return mixed
     */
    public function getStatusDeliveredTime()
    {
        return $this->status_Delivered_time;
    }

    /**
     * @param mixed $status_Delivered_time
     */
    public function setStatusDeliveredTime($status_Delivered_time): void
    {
        $this->status_Delivered_time = $status_Delivered_time;
    }

    /**
     * @return mixed
     */
    public function getStatusCompletedTime()
    {
        return $this->status_Completed_time;
    }

    /**
     * @param mixed $status_Completed_time
     */
    public function setStatusCompletedTime($status_Completed_time): void
    {
        $this->status_Completed_time = $status_Completed_time;
    }

    /**
     * @return mixed
     */
    public function getStatusInvoicedTime()
    {
        return $this->status_Invoiced_time;
    }

    /**
     * @param mixed $status_Invoiced_time
     */
    public function setStatusInvoicedTime($status_Invoiced_time): void
    {
        $this->status_Invoiced_time = $status_Invoiced_time;
    }

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
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param mixed $company
     */
    public function setCompany($company): void
    {
        $this->company = $company;
    }

    /**
     * @return mixed
     */
    public function getCounter()
    {
        return $this->counter;
    }

    /**
     * @param mixed $counter
     */
    public function setCounter($counter): void
    {
        $this->counter = $counter;
    }

    /**
     * @return mixed
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param mixed $customer
     */
    public function setCustomer($customer): void
    {
        $this->customer = $customer;
    }

    /**
     * @return mixed
     */
    public function getDispatcher()
    {
        return $this->dispatcher;
    }

    /**
     * @param mixed $dispatcher
     */
    public function setDispatcher($dispatcher): void
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @return mixed
     */
    public function getCnno()
    {
        return $this->cnno;
    }

    /**
     * @param mixed $cnno
     */
    public function setCnno($cnno): void
    {
        $this->cnno = $cnno;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getActiveType()
    {
        return $this->active_type;
    }

    /**
     * @param mixed $active_type
     */
    public function setActiveType($active_type): void
    {
        $this->active_type = $active_type;
    }

    /**
     * @return mixed
     */
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * @param mixed $rate
     */
    public function setRate($rate): void
    {
        $this->rate = $rate;
    }

    /**
     * @return mixed
     */
    public function getUnits()
    {
        return $this->units;
    }

    /**
     * @param mixed $units
     */
    public function setUnits($units): void
    {
        $this->units = $units;
    }

    /**
     * @return mixed
     */
    public function getFsc()
    {
        return $this->fsc;
    }

    /**
     * @param mixed $fsc
     */
    public function setFsc($fsc): void
    {
        $this->fsc = $fsc;
    }

    /**
     * @return mixed
     */
    public function getFscPercentage()
    {
        return $this->fsc_percentage;
    }

    /**
     * @param mixed $fsc_percentage
     */
    public function setFscPercentage($fsc_percentage): void
    {
        $this->fsc_percentage = $fsc_percentage;
    }

    /**
     * @return mixed
     */
    public function getOtherCharges()
    {
        return $this->other_charges;
    }

    /**
     * @param mixed $other_charges
     */
    public function setOtherCharges($other_charges): void
    {
        $this->other_charges = $other_charges;
    }

    /**
     * @return mixed
     */
    public function getTotalRate()
    {
        return $this->total_rate;
    }

    /**
     * @param mixed $total_rate
     */
    public function setTotalRate($total_rate): void
    {
        $this->total_rate = $total_rate;
    }

    /**
     * @return mixed
     */
    public function getEquipmentType()
    {
        return $this->equipment_type;
    }

    /**
     * @param mixed $equipment_type
     */
    public function setEquipmentType($equipment_type): void
    {
        $this->equipment_type = $equipment_type;
    }

    /**
     * @return mixed
     */
    public function getTypeofLoader()
    {
        return $this->typeofLoader;
    }

    /**
     * @param mixed $typeofLoader
     */
    public function setTypeofLoader($typeofLoader): void
    {
        $this->typeofLoader = $typeofLoader;
    }

    /**
     * @return mixed
     */
    public function getCarrierName()
    {
        return $this->carrier_name;
    }

    /**
     * @param mixed $carrier_name
     */
    public function setCarrierName($carrier_name): void
    {
        $this->carrier_name = $carrier_name;
    }

    /**
     * @return mixed
     */
    public function getFlatRate()
    {
        return $this->flat_rate;
    }

    /**
     * @param mixed $flat_rate
     */
    public function setFlatRate($flat_rate): void
    {
        $this->flat_rate = $flat_rate;
    }

    /**
     * @return mixed
     */
    public function getAdvanceCharges()
    {
        return $this->advance_charges;
    }

    /**
     * @param mixed $advance_charges
     */
    public function setAdvanceCharges($advance_charges): void
    {
        $this->advance_charges = $advance_charges;
    }

    /**
     * @return mixed
     */
    public function getCarrierTotal()
    {
        return $this->carrier_total;
    }

    /**
     * @param mixed $carrier_total
     */
    public function setCarrierTotal($carrier_total): void
    {
        $this->carrier_total = $carrier_total;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency): void
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getDriverName()
    {
        return $this->driver_name;
    }

    /**
     * @param mixed $driver_name
     */
    public function setDriverName($driver_name): void
    {
        $this->driver_name = $driver_name;
    }

    /**
     * @return mixed
     */
    public function getTruck()
    {
        return $this->truck;
    }

    /**
     * @param mixed $truck
     */
    public function setTruck($truck): void
    {
        $this->truck = $truck;
    }

    /**
     * @return mixed
     */
    public function getTrailer()
    {
        return $this->trailer;
    }

    /**
     * @param mixed $trailer
     */
    public function setTrailer($trailer): void
    {
        $this->trailer = $trailer;
    }

    /**
     * @return mixed
     */
    public function getLoadedMile()
    {
        return $this->loaded_mile;
    }

    /**
     * @param mixed $loaded_mile
     */
    public function setLoadedMile($loaded_mile): void
    {
        $this->loaded_mile = $loaded_mile;
    }

    /**
     * @return mixed
     */
    public function getEmptyMile()
    {
        return $this->empty_mile;
    }

    /**
     * @param mixed $empty_mile
     */
    public function setEmptyMile($empty_mile): void
    {
        $this->empty_mile = $empty_mile;
    }

    /**
     * @return mixed
     */
    public function getDriverOther()
    {
        return $this->driver_other;
    }

    /**
     * @param mixed $driver_other
     */
    public function setDriverOther($driver_other): void
    {
        $this->driver_other = $driver_other;
    }

    /**
     * @return mixed
     */
    public function getTarp()
    {
        return $this->tarp;
    }

    /**
     * @param mixed $tarp
     */
    public function setTarp($tarp): void
    {
        $this->tarp = $tarp;
    }

    /**
     * @return mixed
     */
    public function getFlat()
    {
        return $this->flat;
    }

    /**
     * @param mixed $flat
     */
    public function setFlat($flat): void
    {
        $this->flat = $flat;
    }

    /**
     * @return mixed
     */
    public function getDriverTotal()
    {
        return $this->driver_total;
    }

    /**
     * @param mixed $driver_total
     */
    public function setDriverTotal($driver_total): void
    {
        $this->driver_total = $driver_total;
    }

    /**
     * @return mixed
     */
    public function getOwnerName()
    {
        return $this->owner_name;
    }

    /**
     * @param mixed $owner_name
     */
    public function setOwnerName($owner_name): void
    {
        $this->owner_name = $owner_name;
    }

    /**
     * @return mixed
     */
    public function getOwnerPercentage()
    {
        return $this->owner_percentage;
    }

    /**
     * @param mixed $owner_percentage
     */
    public function setOwnerPercentage($owner_percentage): void
    {
        $this->owner_percentage = $owner_percentage;
    }

    /**
     * @return mixed
     */
    public function getOwnerTruck()
    {
        return $this->owner_truck;
    }

    /**
     * @param mixed $owner_truck
     */
    public function setOwnerTruck($owner_truck): void
    {
        $this->owner_truck = $owner_truck;
    }

    /**
     * @return mixed
     */
    public function getOwnerTrailer()
    {
        return $this->owner_trailer;
    }

    /**
     * @param mixed $owner_trailer
     */
    public function setOwnerTrailer($owner_trailer): void
    {
        $this->owner_trailer = $owner_trailer;
    }

    /**
     * @return mixed
     */
    public function getOwnerOther()
    {
        return $this->owner_other;
    }

    /**
     * @param mixed $owner_other
     */
    public function setOwnerOther($owner_other): void
    {
        $this->owner_other = $owner_other;
    }

    /**
     * @return mixed
     */
    public function getOwnerTotal()
    {
        return $this->owner_total;
    }

    /**
     * @param mixed $owner_total
     */
    public function setOwnerTotal($owner_total): void
    {
        $this->owner_total = $owner_total;
    }

    /**
     * @return mixed
     */
    public function getStartLocation()
    {
        return $this->start_location;
    }

    /**
     * @param mixed $start_location
     */
    public function setStartLocation($start_location): void
    {
        $this->start_location = $start_location;
    }

    /**
     * @return mixed
     */
    public function getEndLocation()
    {
        return $this->end_location;
    }

    /**
     * @param mixed $start_location
     */
    public function setEndLocation($end_location): void
    {
        $this->end_location = $end_location;
    }

    /**
     * @return mixed
     */
    public function getTarpSelect()
    {
        return $this->tarp_select;
    }

    /**
     * @param mixed $tarp_select
     */
    public function setTarpSelect($tarp_select): void
    {
        $this->tarp_select = $tarp_select;
    }

    /**
     * @return mixed
     */
    public function getLoadedMilesValue()
    {
        return $this->loaded_miles_value;
    }

    /**
     * @param mixed $loaded_miles_value
     */
    public function setLoadedMilesValue($loaded_miles_value): void
    {
        $this->loaded_miles_value = $loaded_miles_value;
    }

    /**
     * @return mixed
     */
    public function getEmptyMilesValue()
    {
        return $this->empty_miles_value;
    }

    /**
     * @param mixed $empty_miles_value
     */
    public function setEmptyMilesValue($empty_miles_value): void
    {
        $this->empty_miles_value = $empty_miles_value;
    }

    /**
     * @return mixed
     */
    public function getDriverMilesValue()
    {
        return $this->driver_miles_value;
    }

    /**
     * @param mixed $driver_miles_value
     */
    public function setDriverMilesValue($driver_miles_value): void
    {
        $this->driver_miles_value = $driver_miles_value;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file, $originalname, $fileSize, $targetFilePath, $i)
    {
        $this->file[$i] = array("filename" => $file, "Originalname" => $originalname, "filesize" => $fileSize, "filepath" => $targetFilePath);
    }

    /**
     * @return mixed
     */
    public function getLoadNotes()
    {
        return $this->load_notes;
    }

    /**
     * @param mixed $load_notes
     */
    public function setLoadNotes($load_notes): void
    {
        $this->load_notes = $load_notes;
    }

    /**
     * @return mixed
     */
    public function getCarrierEmail()
    {
        return $this->carrier_email;
    }

    /**
     * @param mixed $carrier_email
     */
    public function setCarrierEmail($carrier_email, $email2, $email3): void
    {
        $this->carrier_email = array();
        $this->carrier_email[] = array("CarrierEmail" => $carrier_email, "email2" => $email2, "email3" => $email3);
    }

    /**
     * @return mixed
     */
    public function getCustomerEmail()
    {
        return $this->customer_email;
    }

    /**
     * @param mixed $customer_email
     */
    public function setCustomerEmail($customer_email, $emailcustomer2, $emailcustomer3): void
    {
        $this->customer_email = array();
        $this->customer_email[] = array("CustomerEmail" => $customer_email, "emailcustomer2" => $emailcustomer2, "emailcustomer3" => $emailcustomer3);
    }

    /**
     * @return mixed
     */
    public function getCreatedUser()
    {
        return $this->created_user;
    }

    /**
     * @param mixed $created_user
     */
    public function setCreatedUser($created_user): void
    {
        $this->created_user = $created_user;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at): void
    {
        $this->updated_at = $updated_at;
    }

    /**
     * @return mixed
     */
    public function getOtherChargesModal()
    {
        return $this->other_charges_modal;
    }

    /**
     * @param mixed $updated_at
     */
    public function setOtherChargesModal($description, $amount): void
    {
        $this->other_charges_modal = array();

        for ($i = 0; $i < sizeof($description); $i++) {
            $this->other_charges_modal[] = array("description" => $description[$i], "amount" => $amount[$i]);
        }
    }

    /**
     * @return mixed
     */
    public function getCarrierOtherModal()
    {
        return $this->carrier_other_modal;
    }

    /**
     * @param mixed $updated_at
     */
    public function setCarrierOtherModal($description, $advance, $amount): void
    {
        $this->carrier_other_modal = array();
        for ($i = 0; $i < count($description); $i++) {
            $this->carrier_other_modal[] = array("description" => $description[$i], "advance" => $advance[$i], "amount" => $amount[$i]);
        }
    }

    /**
     * @return mixed
     */
    public function getDriverOtherModal()
    {
        return $this->driver_other_modal;
    }

    /**
     * @param mixed $updated_at
     */
    public function setDriverOtherModal($description, $amount): void
    {
        $this->driver_other_modal = array();
        for ($i = 0; $i < count($description); $i++) {
            $this->driver_other_modal[] = array("description" => $description[$i], "amount" => $amount[$i]);
        }
    }

    /**
     * @return mixed
     */
    public function getOwnerOtherModal()
    {
        return $this->owner_other_modal;
    }

    /**
     * @param mixed $updated_at
     */
    public function setOwnerOtherModal($description, $amount): void
    {
        $this->owner_other_modal = array();
        for ($i = 0; $i < count($description); $i++) {
            $this->owner_other_modal[] = array("description" => $description[$i], "amount" => $amount[$i]);
        }
    }

    /**
     * @return mixed
     */
    public function getShipper()
    {
        return $this->shipper;
    }

    /**
     * @param mixed $updated_at
     */
    public function setShipper($shipper_name, $shipper_address, $shipper_location, $shipper_pickup, $shipper_picktime, $shipper_load_type, $shipper_commodity, $shipper_qty, $shipper_weight, $shipper_pickup_number, $shipper_seq, $shipper_notes): void
    {
        $this->shipper = array();
        for ($i = 0; $i < count($shipper_name); $i++) {
            $this->shipper[] = array("shipper_name" => $shipper_name[$i], "shipper_address" => $shipper_address[$i], "shipper_location" => $shipper_location[$i], "shipper_pickup" => $shipper_pickup[$i], "shipper_picktime" => $shipper_picktime[$i], "shipper_load_type" => $shipper_load_type[$i], "shipper_commodity" => $shipper_commodity[$i], "shipper_qty" => $shipper_qty[$i], "shipper_weight" => $shipper_weight[$i], "shipper_pickup_number" => $shipper_pickup_number[$i], "shipper_seq" => $shipper_seq[$i], "shipper_notes" => $shipper_notes[$i]);
        }
    }

    /**
     * @return mixed
     */
    public function getConsignee()
    {
        return $this->consignee;
    }

    /**
     * @param mixed $updated_at
     */
    public function setConsignee($consignee_name, $consignee_address, $consignee_location, $consignee_pickup, $consignee_picktime, $consignee_load_type, $consignee_commodity, $consignee_qty, $consignee_weight, $consignee_delivery_number, $consignee_seq, $consignee_notes): void
    {
        $this->consignee = array();
        for ($i = 0; $i < count($consignee_name); $i++) {
            $this->consignee[] = array("consignee_name" => $consignee_name[$i], "consignee_address" => $consignee_address[$i], "consignee_location" => $consignee_location[$i], "consignee_pickup" => $consignee_pickup[$i], "consignee_picktime" => $consignee_picktime[$i], "consignee_load_type" => $consignee_load_type[$i], "consignee_commodity" => $consignee_commodity[$i], "consignee_qty" => $consignee_qty[$i], "consignee_weight" => $consignee_weight[$i], "consignee_delivery_number" => $consignee_delivery_number[$i], "consignee_seq" => $consignee_seq[$i], "consignee_notes" => $consignee_notes[$i]);
        }
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new ArrayIterator(
            array(
                '_id' => $this->id,
                'companyID' => (int)$this->companyID,
                'counter' => 0,
                $this->status => array([
                    '_id' => 0,
                    'company' => $this->company,
                    'customer' => $this->customer,
                    'dispatcher' => $this->dispatcher,
                    'cnno' => $this->cnno,
                    'status' => $this->status,
                    'active_type' => $this->active_type,
                    'rate' => $this->rate,
                    'units' => $this->units,
                    'fsc' => $this->fsc,
                    'fsc_percentage' => $this->fsc_percentage,
                    'other_charges' => $this->other_charges,
                    'other_charges_modal' => $this->other_charges_modal,
                    'total_rate' => $this->total_rate,
                    'equipment_type' => $this->equipment_type,
                    'typeofloader' => $this->typeofLoader,
                    'carrier_name' => $this->carrier_name,
                    'flat_rate' => $this->flat_rate,
                    'advance_charges' => $this->advance_charges,
                    'carrier_other_modal' => $this->carrier_other_modal,
                    'carrier_total' => $this->carrier_total,
                    'currency' => $this->currency,
                    'driver_name' => $this->driver_name,
                    'truck' => $this->truck,
                    'trailer' => $this->trailer,
                    'loaded_mile' => $this->loaded_mile,
                    'empty_mile' => $this->empty_mile,
                    'driver_other' => $this->driver_other,
                    'driver_other_modal' => $this->driver_other_modal,
                    'tarp' => $this->tarp,
                    'flat' => $this->flat,
                    'driver_total' => $this->driver_total,
                    'owner_name' => $this->owner_name,
                    'owner_percentage' => $this->owner_percentage,
                    'owner_truck' => $this->owner_truck,
                    'owner_trailer' => $this->owner_trailer,
                    'owner_other' => $this->owner_other,
                    'owner_other_modal' => $this->owner_other_modal,
                    'owner_total' => $this->owner_total,
                    'start_location' => $this->start_location,
                    'end_location' => $this->end_location,
                    'shipper' => $this->shipper,
                    'consignee' => $this->consignee,
                    'tarp_select' => $this->tarp_select,
                    'loaded_miles_value' => $this->loaded_miles_value,
                    'empty_miles_value' => $this->empty_miles_value,
                    'driver_miles_value' => $this->driver_miles_value,
                    'file' => $this->file,
                    'load_notes' => $this->load_notes,
                    'carrier_email' => $this->carrier_email,
                    'customer_email' => $this->customer_email,
                    'created_user' => $_SESSION['companyName'],
                    'created_at' => time(),
                    'updated_at' => time(),
                    'status_BreakDown_time' => $this->status_Break_Down_time,
                    'status_Loaded_time' => $this->status_Loaded_time,
                    'status_ArrivedConsignee_time' => $this->status_Arrived_Consignee_time,
                    'status_ArrivedShipper_time' => $this->status_Arrived_Shipper_time,
                    'status_Paid_time' => $this->status_Paid_time,
                    'status_Open_time' => $this->status_Open_time,
                    'status_OnRoute_time' => $this->status_On_Route_time,
                    'status_Dispatched_time' => $this->status_Dispatched_time,
                    'status_Delivered_time' => $this->status_Delivered_time,
                    'status_Completed_time' => $this->status_Completed_time,
                    'status_Invoiced_time' => $this->status_Invoiced_time,
                ])
            )
        );
    }

    public function insert($activeload, $db, $helper)
    {
        $collection = $db->active_load;
        $criteria = array(
            'companyID' => (int)$activeload->getCompanyID(),

        );
        $doc = $collection->findOne($criteria);

        if (!empty($doc)) {
            //    echo "inside if of model";
            $id = $helper->getDocumentSequence((int)$this->companyID, $db->active_load);
            $db->active_load->updateOne(['companyID' => (int)$this->companyID], ['$push' => [$this->status => [
                '_id' => $id,
                'company' => $this->company,
                'customer' => $this->customer,
                'dispatcher' => $this->dispatcher,
                'cnno' => $this->cnno,
                'status' => $this->status,
                'active_type' => $this->active_type,
                'rate' => $this->rate,
                'units' => $this->units,
                'fsc' => $this->fsc,
                'fsc_percentage' => $this->fsc_percentage,
                'other_charges' => $this->other_charges,
                'other_charges_modal' => $this->other_charges_modal,
                'total_rate' => $this->total_rate,
                'equipment_type' => $this->equipment_type,
                'typeofloader' => $this->typeofLoader,
                'carrier_name' => $this->carrier_name,
                'flat_rate' => $this->flat_rate,
                'advance_charges' => $this->advance_charges,
                'carrier_other_modal' => $this->carrier_other_modal,
                'carrier_total' => $this->carrier_total,
                'currency' => $this->currency,
                'driver_name' => $this->driver_name,
                'truck' => $this->truck,
                'trailer' => $this->trailer,
                'loaded_mile' => $this->loaded_mile,
                'empty_mile' => $this->empty_mile,
                'driver_other' => $this->driver_other,
                'driver_other_modal' => $this->driver_other_modal,
                'tarp' => $this->tarp,
                'flat' => $this->flat,
                'driver_total' => $this->driver_total,
                'owner_name' => $this->owner_name,
                'owner_percentage' => $this->owner_percentage,
                'owner_truck' => $this->owner_truck,
                'owner_trailer' => $this->owner_trailer,
                'owner_other' => $this->owner_other,
                'owner_other_modal' => $this->owner_other_modal,
                'owner_total' => $this->owner_total,
                'start_location' => $this->start_location,
                'end_location' => $this->end_location,
                'shipper' => $this->shipper,
                'consignee' => $this->consignee,
                'tarp_select' => $this->tarp_select,
                'loaded_miles_value' => $this->loaded_miles_value,
                'empty_miles_value' => $this->empty_miles_value,
                'driver_miles_value' => $this->driver_miles_value,
                'file' => $this->file,
                'load_notes' => $this->load_notes,
                'carrier_email' => $this->carrier_email,
                'customer_email' => $this->customer_email,
                'created_user' => $_SESSION['companyName'],
                'created_at' => time(),
                'updated_at' => time(),
                'status_BreakDown_time' => $this->status_Break_Down_time,
                'status_Loaded_time' => $this->status_Loaded_time,
                'status_ArrivedConsignee_time' => $this->status_Arrived_Consignee_time,
                'status_ArrivedShipper_time' => $this->status_Arrived_Shipper_time,
                'status_Paid_time' => $this->status_Paid_time,
                'status_Open_time' => $this->status_Open_time,
                'status_OnRoute_time' => $this->status_On_Route_time,
                'status_Dispatched_time' => $this->status_Dispatched_time,
                'status_Delivered_time' => $this->status_Delivered_time,
                'status_Completed_time' => $this->status_Completed_time,
                'status_Invoiced_time' => $this->status_Invoiced_time,
            ]]]);
            echo $id;
        } else {
            $cons = iterator_to_array($activeload);
            $db->active_load->insertOne($cons);
            echo 0;
        }
    }

    //updatefile
    public function updatefile($activeload, $db, $id)
    {
        $db->active_load->updateOne(['companyID' => (int)$_SESSION['companyId'], 'activeload._id' => (int)$id],
            ['$set' => ['activeload.$.file' => $this->getFile()]]
        );
    }

    // status and data transfer in here
    public function changeStatus($activeload, $db)
    {
        $db->active_load->updateOne(['companyID' => (int)$_SESSION['companyId']], ['$push' => [$this->newStatus => [
            '_id' => $this->id,
            'company' => $this->company,
            'customer' => $this->customer,
            'dispatcher' => $this->dispatcher,
            'cnno' => $this->cnno,
            'status' => $this->status,
            'active_type' => $this->active_type,
            'rate' => $this->rate,
            'units' => $this->units,
            'fsc' => $this->fsc,
            'fsc_percentage' => $this->fsc_percentage,
            'other_charges' => $this->other_charges,
            'other_charges_modal' => $this->other_charges_modal,
            'total_rate' => $this->total_rate,
            'equipment_type' => $this->equipment_type,
            'typeofloader' => $this->typeofLoader,
            'carrier_name' => $this->carrier_name,
            'flat_rate' => $this->flat_rate,
            'advance_charges' => $this->advance_charges,
            'carrier_other_modal' => $this->carrier_other_modal,
            'carrier_total' => $this->carrier_total,
            'currency' => $this->currency,
            'driver_name' => $this->driver_name,
            'truck' => $this->truck,
            'trailer' => $this->trailer,
            'loaded_mile' => $this->loaded_mile,
            'empty_mile' => $this->empty_mile,
            'driver_other' => $this->driver_other,
            'driver_other_modal' => $this->driver_other_modal,
            'tarp' => $this->tarp,
            'flat' => $this->flat,
            'driver_total' => $this->driver_total,
            'owner_name' => $this->owner_name,
            'owner_percentage' => $this->owner_percentage,
            'owner_truck' => $this->owner_truck,
            'owner_trailer' => $this->owner_trailer,
            'owner_other' => $this->owner_other,
            'owner_other_modal' => $this->owner_other_modal,
            'owner_total' => $this->owner_total,
            'start_location' => $this->start_location,
            'end_location' => $this->end_location,
            'shipper' => $this->shipper,
            'consignee' => $this->consignee,
            'tarp_select' => $this->tarp_select,
            'loaded_miles_value' => $this->loaded_miles_value,
            'empty_miles_value' => $this->empty_miles_value,
            'driver_miles_value' => $this->driver_miles_value,
            'file' => $this->file,
            'load_notes' => $this->load_notes,
            'carrier_email' => $this->carrier_email,
            'customer_email' => $this->customer_email,
            'created_user' => $_SESSION['companyName'],
            'created_at' => time(),
            'updated_at' => time(),
            'status_BreakDown_time' => $this->status_Break_Down_time,
            'status_Loaded_time' => $this->status_Loaded_time,
            'status_ArrivedConsignee_time' => $this->status_Arrived_Consignee_time,
            'status_ArrivedShipper_time' => $this->status_Arrived_Shipper_time,
            'status_Paid_time' => $this->status_Paid_time,
            'status_Open_time' => $this->status_Open_time,
            'status_OnRoute_time' => $this->status_On_Route_time,
            'status_Dispatched_time' => $this->status_Dispatched_time,
            'status_Delivered_time' => $this->status_Delivered_time,
            'status_Completed_time' => $this->status_Completed_time,
            'status_Invoiced_time' => $this->status_Invoiced_time,
        ]]]);

        // after copying all data remove from the old location
        $db->active_load->updateOne(['companyID' => (int)$_SESSION['companyId']], ['$pull' => [$this->oldArray => ['_id' =>(int)$this->id]]]);
    }
}