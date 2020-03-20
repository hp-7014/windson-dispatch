<?php
/**
 * Created by PhpStorm.
 * User: BOND
 * Date: 3/13/2020
 * Time: 4:16 PM
 */

class Activeload
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
    private $total_rate;
    private $equipment_type;
    private $typeofLoader;
    private $carrier_name;
    private $flat_rate;
    private $advance_charges;
    private $carrier_total;
    private $currency;
    private $driver_name;
    private $truck;
    private $trailer;
    private $loaded_mile;
    private $empty_mile;
    private $driver_other;
    private $tarp;
    private $flat;
    private $driver_total;
    private $owner_name;
    private $owner_percentage;
    private $owner_truck;
    private $owner_trailer;
    private $owner_other;
    private $owner_total;
    private $start_location;
    private $shipper_name;
    private $shipper_address;
    private $shipper_location;
    private $shipper_pickup;
    private $shipper_picktime;
    private $shipper_load_type;
    private $shipper_commodity;
    private $shipper_qty;
    private $shipper_weight;
    private $shipper_pickup_number;
    private $shipper_seq;
    private $shipper_notes;
    private $consignee_name;
    private $consignee_address;
    private $consignee_location;
    private $consignee_pickup;
    private $consignee_picktime;
    private $consignee_load_type;
    private $consignee_commodity;
    private $_consignee_qty;
    private $consignee_weight;
    private $consignee_delivery_number;
    private $consignee_seq;
    private $consignee_notes;
    private $tarp_select;
    private $loaded_miles_value;
    private $empty_miles_value;
    private $driver_miles_value;
    private $file;
    private $load_notes;
    private $carrier_email;
    private $customer_email;
    private $created_user;
    private $created_at;
    private $updated_at;

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
    public function getShipperName()
    {
        return $this->shipper_name;
    }

    /**
     * @param mixed $shipper_name
     */
    public function setShipperName($shipper_name): void
    {
        $this->shipper_name = $shipper_name;
    }

    /**
     * @return mixed
     */
    public function getShipperAddress()
    {
        return $this->shipper_address;
    }

    /**
     * @param mixed $shipper_address
     */
    public function setShipperAddress($shipper_address): void
    {
        $this->shipper_address = $shipper_address;
    }

    /**
     * @return mixed
     */
    public function getShipperLocation()
    {
        return $this->shipper_location;
    }

    /**
     * @param mixed $shipper_location
     */
    public function setShipperLocation($shipper_location): void
    {
        $this->shipper_location = $shipper_location;
    }

    /**
     * @return mixed
     */
    public function getShipperPickup()
    {
        return $this->shipper_pickup;
    }

    /**
     * @param mixed $shipper_pickup
     */
    public function setShipperPickup($shipper_pickup): void
    {
        $this->shipper_pickup = $shipper_pickup;
    }

    /**
     * @return mixed
     */
    public function getShipperPicktime()
    {
        return $this->shipper_picktime;
    }

    /**
     * @param mixed $shipper_picktime
     */
    public function setShipperPicktime($shipper_picktime): void
    {
        $this->shipper_picktime = $shipper_picktime;
    }

    /**
     * @return mixed
     */
    public function getShipperLoadType()
    {
        return $this->shipper_load_type;
    }

    /**
     * @param mixed $shipper_load_type
     */
    public function setShipperLoadType($shipper_load_type): void
    {
        $this->shipper_load_type = $shipper_load_type;
    }

    /**
     * @return mixed
     */
    public function getShipperCommodity()
    {
        return $this->shipper_commodity;
    }

    /**
     * @param mixed $shipper_commodity
     */
    public function setShipperCommodity($shipper_commodity): void
    {
        $this->shipper_commodity = $shipper_commodity;
    }

    /**
     * @return mixed
     */
    public function getShipperQty()
    {
        return $this->shipper_qty;
    }

    /**
     * @param mixed $shipper_qty
     */
    public function setShipperQty($shipper_qty): void
    {
        $this->shipper_qty = $shipper_qty;
    }

    /**
     * @return mixed
     */
    public function getShipperWeight()
    {
        return $this->shipper_weight;
    }

    /**
     * @param mixed $shipper_weight
     */
    public function setShipperWeight($shipper_weight): void
    {
        $this->shipper_weight = $shipper_weight;
    }

    /**
     * @return mixed
     */
    public function getShipperPickupNumber()
    {
        return $this->shipper_pickup_number;
    }

    /**
     * @param mixed $shipper_pickup_number
     */
    public function setShipperPickupNumber($shipper_pickup_number): void
    {
        $this->shipper_pickup_number = $shipper_pickup_number;
    }

    /**
     * @return mixed
     */
    public function getShipperSeq()
    {
        return $this->shipper_seq;
    }

    /**
     * @param mixed $shipper_seq
     */
    public function setShipperSeq($shipper_seq): void
    {
        $this->shipper_seq = $shipper_seq;
    }

    /**
     * @return mixed
     */
    public function getShipperNotes()
    {
        return $this->shipper_notes;
    }

    /**
     * @param mixed $shipper_notes
     */
    public function setShipperNotes($shipper_notes): void
    {
        $this->shipper_notes = $shipper_notes;
    }

    /**
     * @return mixed
     */
    public function getConsigneeName()
    {
        return $this->consignee_name;
    }

    /**
     * @param mixed $consignee_name
     */
    public function setConsigneeName($consignee_name): void
    {
        $this->consignee_name = $consignee_name;
    }

    /**
     * @return mixed
     */
    public function getConsigneeAddress()
    {
        return $this->consignee_address;
    }

    /**
     * @param mixed $consignee_address
     */
    public function setConsigneeAddress($consignee_address): void
    {
        $this->consignee_address = $consignee_address;
    }

    /**
     * @return mixed
     */
    public function getConsigneeLocation()
    {
        return $this->consignee_location;
    }

    /**
     * @param mixed $consignee_location
     */
    public function setConsigneeLocation($consignee_location): void
    {
        $this->consignee_location = $consignee_location;
    }

    /**
     * @return mixed
     */
    public function getConsigneePickup()
    {
        return $this->consignee_pickup;
    }

    /**
     * @param mixed $consignee_pickup
     */
    public function setConsigneePickup($consignee_pickup): void
    {
        $this->consignee_pickup = $consignee_pickup;
    }

    /**
     * @return mixed
     */
    public function getConsigneePicktime()
    {
        return $this->consignee_picktime;
    }

    /**
     * @param mixed $consignee_picktime
     */
    public function setConsigneePicktime($consignee_picktime): void
    {
        $this->consignee_picktime = $consignee_picktime;
    }

    /**
     * @return mixed
     */
    public function getConsigneeLoadType()
    {
        return $this->consignee_load_type;
    }

    /**
     * @param mixed $consignee_load_type
     */
    public function setConsigneeLoadType($consignee_load_type): void
    {
        $this->consignee_load_type = $consignee_load_type;
    }

    /**
     * @return mixed
     */
    public function getConsigneeCommodity()
    {
        return $this->consignee_commodity;
    }

    /**
     * @param mixed $consignee_commodity
     */
    public function setConsigneeCommodity($consignee_commodity): void
    {
        $this->consignee_commodity = $consignee_commodity;
    }

    /**
     * @return mixed
     */
    public function getConsigneeQty()
    {
        return $this->_consignee_qty;
    }

    /**
     * @param mixed $consignee_qty
     */
    public function setConsigneeQty($consignee_qty): void
    {
        $this->_consignee_qty = $consignee_qty;
    }

    /**
     * @return mixed
     */
    public function getConsigneeWeight()
    {
        return $this->consignee_weight;
    }

    /**
     * @param mixed $consignee_weight
     */
    public function setConsigneeWeight($consignee_weight): void
    {
        $this->consignee_weight = $consignee_weight;
    }

    /**
     * @return mixed
     */
    public function getConsigneeDeliveryNumber()
    {
        return $this->consignee_delivery_number;
    }

    /**
     * @param mixed $consignee_delivery_number
     */
    public function setConsigneeDeliveryNumber($consignee_delivery_number): void
    {
        $this->consignee_delivery_number = $consignee_delivery_number;
    }

    /**
     * @return mixed
     */
    public function getConsigneeSeq()
    {
        return $this->consignee_seq;
    }

    /**
     * @param mixed $consignee_seq
     */
    public function setConsigneeSeq($consignee_seq): void
    {
        $this->consignee_seq = $consignee_seq;
    }

    /**
     * @return mixed
     */
    public function getConsigneeNotes()
    {
        return $this->consignee_notes;
    }

    /**
     * @param mixed $consignee_notes
     */
    public function setConsigneeNotes($consignee_notes): void
    {
        $this->consignee_notes = $consignee_notes;
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
    public function setFile($file): void
    {
        $this->file = $file;
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
    public function setCarrierEmail($carrier_email): void
    {
        $this->carrier_email = $carrier_email;
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
    public function setCustomerEmail($customer_email): void
    {
        $this->customer_email = $customer_email;
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


}
