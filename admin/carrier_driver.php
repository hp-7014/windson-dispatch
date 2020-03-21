<?php
require 'model/External_Carrier.php';
require 'utils/Helper.php'; // helper method
require '../database/connection.php';   // connection

$helper = new Helper();

if($_GET['type'] == 'add_carrier'){
    $carrier = new External_Carrier();
    $carrier->setId($helper->getNextSequence("carrier",$db));
    $carrier->setCompanyID($_SESSION['companyId']);
    $carrier->setName($_POST['carrierName']);
    $carrier->setAddress($_POST['carrierAddress']);
    $carrier->setLocation($_POST['carrierLocation']);
    $carrier->setZip($_POST['carrierZip']);
    $carrier->setContactName($_POST['carrierContactName']);
    $carrier->setEmail($_POST['carrierEmail']);
    $carrier->setTelephone($_POST['carrierTelephone']);
    $carrier->setExt($_POST['carrierExt']);
    $carrier->setTollfree($_POST['carrierTollFree']);
    $carrier->setFax($_POST['carrierFax']);
    $carrier->setPaymentTerms($_POST['carrierPayTerms']);
    $carrier->setTaxID($_POST['carrierTaxID']);
    $carrier->setMc($_POST['carrierMC']);
    $carrier->setDot($_POST['carrierDOT']);
    $carrier->setFactoringCompany($_POST['carrierFactoring']);
    $carrier->setCarrierNotes($_POST['carrierNotes']);
    $carrier->setBlacklisted($_POST['carrierBlacklisted']);
    $carrier->setCorporation($_POST['carrierCorporation']);
    $carrier->setInsuranceLiabilityCompany($_POST['liabilityCompany']);
    $carrier->setInsurancePolicyNo($_POST['liabilityPolicy']);
    $carrier->setExpiryDate($_POST['liabilityExpDate']);
    $carrier->setInsuranceTelephone($_POST['liabilityTelephone']);
    $carrier->setInsuranceExt($_POST['liabilityEXT']);
    $carrier->setInsuranceContactName($_POST['liabilityContact']);
    $carrier->setInsuranceLiabilityAmount($_POST['liabilityAmount']);
    $carrier->setInsuranceNotes($_POST['liabilityNotes']);
    $carrier->setAutoInsuranceCompany($_POST['insuranceCompany']);
    $carrier->setAutoInsPolicyNo($_POST['insurancePolicy']);
    $carrier->setAutoInsExpiryDate($_POST['insuranceExpDate']);
    $carrier->setAutoInsTelephone($_POST['insuranceTelephone']);
    $carrier->setAutoInsExt($_POST['insuranceExt']);
    $carrier->setAutoInsContactName($_POST['insuranceContactName']);
    $carrier->setAutoInsLiabilityAmount($_POST['insuranceAmt']);
    $carrier->setAutoInsuranceNotes($_POST['insuranceNotes']);
    $carrier->setCargoCompany($_POST['cargoName']);
    $carrier->setCargoPolicyNo($_POST['cargoPolicy']);
    $carrier->setCargoExpiryDate($_POST['cargoExpDate']);
    $carrier->setCargoTelephone($_POST['cargoTelephone']);
    $carrier->setCargoExt($_POST['cargoExt']);
    $carrier->setCargoContactName($_POST['cargoContactName']);
    $carrier->setCargoInsuranceAmt($_POST['cargoInsuranceAmount']);
    $carrier->setCargoNotes($_POST['cargoNotes']);
    $carrier->setWSIBNo($_POST['wsib']);
    $carrier->setPrimaryName($_POST['primaryName']);
    $carrier->setPrimaryTelephone($_POST['primaryTelephone']);
    $carrier->setPrimaryEmail($_POST['primaryEmail']);
    $carrier->setSecondaryName($_POST['secondaryName']);
    $carrier->setSecondaryTelephone($_POST['secondaryTelephone']);
    $carrier->setSecondaryEmail($_POST['secondaryEmail']);
    $carrier->setAccountingNotes($_POST['primaryNotes']);
    $carrier->setSizeOfFleet($_POST['sizeOfFleet']);
    $carrier->setEquipment($_POST['equipment'],$_POST['quantity']);
    $carrier->insert($carrier,$db,$helper);
}
// edit external carrier

// Update External Carrier
else if($_GET['type'] == 'Update_carrierDetail'){
    $carrier = new External_Carrier();
    $carrier->setId($_POST['carrierid']);
    $carrier->setCompanyID($_SESSION['companyId']);
    $carrier->setName($_POST['carrierName']);
    $carrier->setAddress($_POST['carrierAddress']);
    $carrier->setLocation($_POST['carrierLocation']);
    $carrier->setZip($_POST['carrierZip']);
    $carrier->setContactName($_POST['carrierContactName']);
    $carrier->setEmail($_POST['carrierEmail']);
    $carrier->setTelephone($_POST['carrierTelephone']);
    $carrier->setExt($_POST['carrierExt']);
    $carrier->setTollfree($_POST['carrierTollFree']);
    $carrier->setFax($_POST['carrierFax']);
    $carrier->setPaymentTerms($_POST['carrierPayTerms']);
    $carrier->setTaxID($_POST['carrierTaxID']);
    $carrier->setMc($_POST['carrierMC']);
    $carrier->setDot($_POST['carrierDOT']);
    $carrier->setFactoringCompany($_POST['carrierFactoring']);
    $carrier->setCarrierNotes($_POST['carrierNotes']);
    $carrier->setBlacklisted($_POST['carrierBlacklisted']);
    $carrier->setCorporation($_POST['carrierCorporation']);
    $carrier->setInsuranceLiabilityCompany($_POST['liabilityCompany']);
    $carrier->setInsurancePolicyNo($_POST['liabilityPolicy']);
    $carrier->setExpiryDate($_POST['liabilityExpDate']);
    $carrier->setInsuranceTelephone($_POST['liabilityTelephone']);
    $carrier->setInsuranceExt($_POST['liabilityEXT']);
    $carrier->setInsuranceContactName($_POST['liabilityContact']);
    $carrier->setInsuranceLiabilityAmount($_POST['liabilityAmount']);
    $carrier->setInsuranceNotes($_POST['liabilityNotes']);
    $carrier->setAutoInsuranceCompany($_POST['insuranceCompany']);
    $carrier->setAutoInsPolicyNo($_POST['insurancePolicy']);
    $carrier->setAutoInsExpiryDate($_POST['insuranceExpDate']);
    $carrier->setAutoInsTelephone($_POST['insuranceTelephone']);
    $carrier->setAutoInsExt($_POST['insuranceExt']);
    $carrier->setAutoInsContactName($_POST['insuranceContactName']);
    $carrier->setAutoInsLiabilityAmount($_POST['insuranceAmt']);
    $carrier->setAutoInsuranceNotes($_POST['insuranceNotes']);
    $carrier->setCargoCompany($_POST['cargoName']);
    $carrier->setCargoPolicyNo($_POST['cargoPolicy']);
    $carrier->setCargoExpiryDate($_POST['cargoExpDate']);
    $carrier->setCargoTelephone($_POST['cargoTelephone']);
    $carrier->setCargoExt($_POST['cargoExt']);
    $carrier->setCargoContactName($_POST['cargoContactName']);
    $carrier->setCargoInsuranceAmt($_POST['cargoInsuranceAmount']);
    $carrier->setCargoNotes($_POST['cargoNotes']);
    $carrier->setWSIBNo($_POST['wsib']);
    $carrier->setPrimaryName($_POST['primaryName']);
    $carrier->setPrimaryTelephone($_POST['primaryTelephone']);
    $carrier->setPrimaryEmail($_POST['primaryEmail']);
    $carrier->setSecondaryName($_POST['secondaryName']);
    $carrier->setSecondaryTelephone($_POST['secondaryTelephone']);
    $carrier->setSecondaryEmail($_POST['secondaryEmail']);
    $carrier->setAccountingNotes($_POST['primaryNotes']);
    $carrier->setSizeOfFleet($_POST['sizeOfFleet']);
    $carrier->setEquipment($_POST['equipment'],$_POST['quantity']);
    $carrier->updateCarrierID($carrier,$db,$helper);
}