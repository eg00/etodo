try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {
}
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

const token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
}
import OrgChart from 'orgchart.js';
window.OrgChart = OrgChart;
require('datetimepicker')

$(document).ready(function () {
    $("#dtBox").DateTimePicker({
        dateFormat: "dd-MM-yyyy HH:mm",
        minDateTime: new Date(),
        language: "ru"
    });

    $('.i-task-edit').on('click', (e) => {
        e.preventDefault();
        const link = $(e.currentTarget).attr('href');
        axios.get(link)
            .then(({data}) => {
                $('body').append(data);
                $('#editTaskModal').modal('show');
            })
    });
    $('body').on('hidden.bs.modal','#editTaskModal', (e) => {
        $(e.currentTarget).remove();
    });
})
