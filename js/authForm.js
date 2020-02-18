//------------Company Register start-----------
function companyRegister() {
    var companyName = document.getElementById('companyName').value;
    var companyEmail = document.getElementById('companyEmail').value;
    var companyContact = document.getElementById('companyContact').value;
    var companyAddress = document.getElementById('companyAddress').value;
    var companyPassword = document.getElementById('companyPassword').value;
    var companyConfirmPassword = document.getElementById('companyConfirmPassword').value;
    
    if (val_companyName1(companyName)) {
        if (val_companyEmail(companyEmail)) {
            if (val_companyContact(companyContact)) {
                if (val_companyAddress(companyAddress)) {
                    if (val_companyPassword(companyPassword)) {
                        if (val_companyConfirmPassword(companyPassword,companyConfirmPassword)) {
                           $.ajax({
                               url:'./auth_driver.php?type=' + 'register',
                               method:'POST',
                               data:{
                                   companyName:companyName,
                                   companyEmail:companyEmail,
                                   companyContact:companyContact,
                                   companyAddress:companyAddress,
                                   companyPassword:companyPassword
                               },
                               success: function (data) {
                                   swal(data);
                                   window.location='index.php';
                               }
                           });
                        }
                    }
                }
            }
        }
    }
}
//------------Company Register End-------------

//------------Admin Login Start---------------
function companyLogin(){
   // alert("called");
    var companyEmail = document.getElementById('companyEmail').value;
    var companyPassword = document.getElementById('companyPassword').value;

    if (val_loginCompanyEmail(companyEmail)) {
        if (val_loginCompanyPassword(companyPassword)) {
            $.ajax({
                url: './auth_driver.php?type=' + 'login',
                method: 'POST',
                data: {
                    companyEmail: companyEmail,
                    companyPassword: companyPassword
                },
                success: function (data) {
                    if (data == "valid") {
                        window.location="./Dashboard.php";
                    } else {
                        swal("Invalid Email and Password!! Please Try Agian Later");
                        //window.location="./index.php";
                    }
                }
            });
        }
    }
}
//-------------Admin Login End-------------