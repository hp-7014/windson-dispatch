<?php
@session_start();
/**
 * Created by PhpStorm.
 * User: BOND
 * Date: 1/22/2020
 * Time: 11:22 PM
 */

class Shipper implements IteratorAggregate
{
    private $id;
    private $companyID;
    private $shipperName;
    private $shipperAddress;
    private $shipperLocation;
    private $shipperPostal;
    private $shipperContact;
    private $shipperEmail;
    private $shipperTelephone;
    private $shipperExt;
    private $shipperTollFree;
    private $shipperFax;
    private $shipperShippingHours;
    private $shipperAppointments;
    private $shipperIntersaction;

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

    private $shipperStatus;
    private $shippingNotes;
    private $internalNotes;
    private $shipperASconsignee;

    /**
     * @return mixed
     */
    public function getShipperName()
    {
        return $this->shipperName;
    }

    /**
     * @param mixed $shipperName
     */
    public function setShipperName($shipperName)
    {
        $this->shipperName = $shipperName;
    }

    /**
     * @return mixed
     */
    public function getShipperAddress()
    {
        return $this->shipperAddress;
    }

    /**
     * @param mixed $shipperAddress
     */
    public function setShipperAddress($shipperAddress)
    {
        $this->shipperAddress = $shipperAddress;
    }

    /**
     * @return mixed
     */
    public function getShipperLocation()
    {
        return $this->shipperLocation;
    }

    /**
     * @param mixed $shipperLocation
     */
    public function setShipperLocation($shipperLocation)
    {
        $this->shipperLocation = $shipperLocation;
    }

    /**
     * @return mixed
     */
    public function getShipperPostal()
    {
        return $this->shipperPostal;
    }

    /**
     * @param mixed $shipperPostal
     */
    public function setShipperPostal($shipperPostal)
    {
        $this->shipperPostal = $shipperPostal;
    }

    /**
     * @return mixed
     */
    public function getShipperContact()
    {
        return $this->shipperContact;
    }

    /**
     * @param mixed $shipperContact
     */
    public function setShipperContact($shipperContact)
    {
        $this->shipperContact = $shipperContact;
    }

    /**
     * @return mixed
     */
    public function getShipperEmail()
    {
        return $this->shipperEmail;
    }

    /**
     * @param mixed $shipperEmail
     */
    public function setShipperEmail($shipperEmail)
    {
        $this->shipperEmail = $shipperEmail;
    }

    /**
     * @return mixed
     */
    public function getShipperTelephone()
    {
        return $this->shipperTelephone;
    }

    /**
     * @param mixed $shipperTelephone
     */
    public function setShipperTelephone($shipperTelephone)
    {
        $this->shipperTelephone = $shipperTelephone;
    }

    /**
     * @return mixed
     */
    public function getShipperExt()
    {
        return $this->shipperExt;
    }

    /**
     * @param mixed $shipperExt
     */
    public function setShipperExt($shipperExt)
    {
        $this->shipperExt = $shipperExt;
    }

    /**
     * @return mixed
     */
    public function getShipperTollFree()
    {
        return $this->shipperTollFree;
    }

    /**
     * @param mixed $shipperTollFree
     */
    public function setShipperTollFree($shipperTollFree)
    {
        $this->shipperTollFree = $shipperTollFree;
    }

    /**
     * @return mixed
     */
    public function getShipperFax()
    {
        return $this->shipperFax;
    }

    /**
     * @param mixed $shipperFax
     */
    public function setShipperFax($shipperFax)
    {
        $this->shipperFax = $shipperFax;
    }

    /**
     * @return mixed
     */
    public function getShipperShippingHours()
    {
        return $this->shipperShippingHours;
    }

    /**
     * @param mixed $shipperShippingHours
     */
    public function setShipperShippingHours($shipperShippingHours)
    {
        $this->shipperShippingHours = $shipperShippingHours;
    }

    /**
     * @return mixed
     */
    public function getShipperAppointments()
    {
        return $this->shipperAppointments;
    }

    /**
     * @param mixed $shipperAppointments
     */
    public function setShipperAppointments($shipperAppointments)
    {
        $this->shipperAppointments = $shipperAppointments;
    }

    /**
     * @return mixed
     */
    public function getShipperIntersaction()
    {
        return $this->shipperIntersaction;
    }

    /**
     * @param mixed $shipperIntersaction
     */
    public function setShipperIntersaction($shipperIntersaction)
    {
        $this->shipperIntersaction = $shipperIntersaction;
    }

    /**
     * @return mixed
     */
    public function getShipperStatus()
    {
        return $this->shipperStatus;
    }

    /**
     * @param mixed $shipperStatus
     */
    public function setShipperStatus($shipperStatus)
    {
        $this->shipperStatus = $shipperStatus;
    }

    /**
     * @return mixed
     */
    public function getShippingNotes()
    {
        return $this->shippingNotes;
    }

    /**
     * @param mixed $shippingNotes
     */
    public function setShippingNotes($shippingNotes)
    {
        $this->shippingNotes = $shippingNotes;
    }

    /**
     * @return mixed
     */
    public function getInternalNotes()
    {
        return $this->internalNotes;
    }

    /**
     * @param mixed $internalNotes
     */
    public function setInternalNotes($internalNotes)
    {
        $this->internalNotes = $internalNotes;
    }

    /**
     * @return mixed
     */
    public function getShipperASconsignee()
    {
        return $this->shipperASconsignee;
    }

    /**
     * @param mixed $shipperASconsignee
     */
    public function setShipperASconsignee($shipperASconsignee)
    {
        $this->shipperASconsignee = $shipperASconsignee;
    }

    public function getIterator()
    {
        // TODO: Implement getIterator() method.
        return new ArrayIterator(
            array(
                '_id' => $this->id,
                'companyID' => $this->companyID,
                'counter' => 0,
                'shipper' => array([
                    'shipperName' => $this->shipperName,
                    'shipperAddress' => $this->shipperAddress,
                    'shipperLocation' => $this->shipperLocation,
                    'shipperPostal' => $this->shipperPostal,
                    'shipperContact' => $this->shipperContact,
                    'shipperEmail' => $this->shipperEmail,
                    'shipperTelephone' => $this->shipperTelephone,
                    'shipperExt' => $this->shipperExt,
                    'shipperTollFree' => $this->shipperTollFree,
                    'shipperFax' => $this->shipperFax,
                    'shipperShippingHours' => $this->shipperShippingHours,
                    'shipperAppointments' => $this->shipperAppointments,
                    'shipperIntersaction' => $this->shipperIntersaction,
                    'shipperStatus' => $this->shipperStatus,
                    'shippingNotes' => $this->shippingNotes,
                    'internalNotes' => $this->internalNotes
                ])
            )
        );
    }

    public function insert($shipper, $db,$helper)
    {
        $c_id = $db->shipper->find(['companyID' => (int)$shipper->getCompanyID()]);
        $count = 0;
        foreach ($c_id as $c) {
            $count++;
        }
        if ($count > 0) {
            $db->shipper->updateOne(['companyID' => (int)$this->companyID], ['$push' => ['shipper' => [
                '_id' => $helper->getDocumentSequence((int)$this->companyID, $db->shipper),
                'shipperName' => $this->shipperName,
                'shipperAddress' => $this->shipperAddress,
                'shipperLocation' => $this->shipperLocation,
                'shipperPostal' => $this->shipperPostal,
                'shipperContact' => $this->shipperContact,
                'shipperEmail' => $this->shipperEmail,
                'shipperTelephone' => $this->shipperTelephone,
                'shipperExt' => $this->shipperExt,
                'shipperTollFree' => $this->shipperTollFree,
                'shipperFax' => $this->shipperFax,
                'shipperShippingHours' => $this->shipperShippingHours,
                'shipperAppointments' => $this->shipperAppointments,
                'shipperIntersaction' => $this->shipperIntersaction,
                'shipperStatus' => $this->shipperStatus,
                'shippingNotes' => $this->shippingNotes,
                'internalNotes' => $this->internalNotes
            ]]]);
        } else {
            $ship = iterator_to_array($shipper);
            $db->shipper->insertOne($ship);
        }
    }

}