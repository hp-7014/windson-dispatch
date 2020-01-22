//----------Shipper Start-------------
function addShipper() {
    var shipperName = document.getElementById('shipperName').value;
    var shipperAddress = document.getElementById('shipperAddress').value;

    if (val_shipperName(shipperName)) {
        if (val_shipperAddress(shipperAddress)) {
            alert(10);
        }
    }
}
//----------Shipper Start-------------