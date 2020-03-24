// account step form
function toggleAccount(val) {
    if ($("#carrier").hasClass("show")) {
        $("#carrier").toggleClass("show");
    }
    if ($("#carrier").hasClass("active")) {
        $("#carrier").toggleClass("active");
    }
    if ($("#insurance").hasClass("show")) {
        $("#insurance").toggleClass("show");
    }
    if ($("#insurance").hasClass("active")) {
        $("#insurance").toggleClass("active");
    }
    if ($("#accounting").hasClass("show")) {
        $("#accounting").toggleClass("show");
    }
    if ($("#accounting").hasClass("active")) {
        $("#accounting").toggleClass("active");
    }
    if ($("#equipment").hasClass("show")) {
        $("#equipment").toggleClass("show");
    }
    if ($("#equipment").hasClass("active")) {
        $("#equipment").toggleClass("active");
    }
    if ($("#home-tab").hasClass("active")) {
        $("#home-tab").toggleClass("active");
    }
    if ($("#insurance-tab").hasClass("active")) {
        $("#insurance-tab").toggleClass("active");
    }
    if ($("#accounting-tab").hasClass("active")) {
        $("#accounting-tab").toggleClass("active");
    }
    if ($("#equipment-tab").hasClass("active")) {
        $("#equipment-tab").toggleClass("active");
    }
    if ($("#home-title").hasClass("show")) {
        $("#home-title").toggleClass("show");
    }
    if ($("#insurance-title").hasClass("show")) {
        $("#insurance-title").toggleClass("show");
    }
    if ($("#accounting-title").hasClass("show")) {
        $("#accounting-title").toggleClass("show");
    }
    if ($("#equipment-title").hasClass("show")) {
        $("#equipment-title").toggleClass("show");
    }

    if ($("#home-tab").attr("aria-selected") === 'true') {
        $("#home-tab").attr("aria-selected", "false");
    } else {
        $("#home-tab").attr("aria-selected", "true");
    }

    if ($("#insurance-tab").attr("aria-selected") === 'true') {
        $("#insurance-tab").attr("aria-selected", "false");
    } else {
        $("#insurance-tab").attr("aria-selected", "true");
    }

    if ($("#accounting-tab").attr("aria-selected") === 'true') {
        $("#accounting-tab").attr("aria-selected", "false");
    } else {
        $("#accounting-tab").attr("aria-selected", "true");
    }

    if ($("#equipment-tab").attr("aria-selected") === 'true') {
        $("#equipment-tab").attr("aria-selected", "false");
    } else {
        $("#equipment-tab").attr("aria-selected", "true");
    }

    if (val == 'first') {
        $("#carrier").toggleClass("show");
        $("#carrier").toggleClass("active");
        $("#home-tab").toggleClass("active");
        $("#home-title").toggleClass("show");
    } else if (val == 'second') {
        $("#insurance").toggleClass("show");
        $("#insurance").toggleClass("active");
        $("#insurance-tab").toggleClass("active");
        $("#insurance-title").toggleClass("show");
    } else if (val == 'third') {
        $("#accounting").toggleClass("show");
        $("#accounting").toggleClass("active");
        $("#accounting-tab").toggleClass("active");
        $("#accounting-title").toggleClass("show");
    } else if (val == 'fourth') {
        $("#equipment").toggleClass("show");
        $("#equipment").toggleClass("active");
        $("#equipment-tab").toggleClass("active");
        $("#equipment-title").toggleClass("show");
    }

}