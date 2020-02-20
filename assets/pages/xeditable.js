/*
 Template Name: Stexo - Responsive Bootstrap 4 Admin Dashboard
 Author: Themesdesign
 Website: www.themesdesign.in
 File: Xeditable js
 */
function showTextarea(columnID,type,id,columnName){
    //alert(type);
    /* alert(data);
     alert(id);*/


    if(type == "text") {
        $('#' + columnID).editable({
            showbuttons: 'bottom',
            mode: 'inline',
            inputclass: 'form-control col-sm-8',
            row: 3,
        });
    } else if(type == "date") {
        $('#' + columnID).editable({
            showbuttons: 'bottom',
            mode: 'inline',
            inputclass: 'form-control col-sm-6 ',
            row: 3,
        });
    }

    if (columnName) {
        document.getElementById(columnName+id).style.display = "block";
    }

}
