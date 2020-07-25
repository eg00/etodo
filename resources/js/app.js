try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {
}

require('pc-bootstrap4-datetimepicker');
require('datetimepicker')

$(document).ready(function () {
    $("#dtBox").DateTimePicker({
        dateFormat: "dd-MM-yyyy HH:mm",
        minDateTime: new Date(),
        language: "ru"
    });
})
