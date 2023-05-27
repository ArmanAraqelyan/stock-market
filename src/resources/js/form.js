import $ from 'jquery';
window.jQuery = $;

import 'bootstrap/dist/js/bootstrap.min';
import 'jquery-ui/dist/jquery-ui.min';
import 'jquery-datepicker/jquery-datepicker';
import 'jquery-validation/dist/jquery.validate.min';

$(document).ready(function() {
    $('#start_date').datepicker();
    $('#end_date').datepicker();

    $('#stock-form').validate({
        rules: {
            company_symbol: {
                required: true
            },
            start_date: {
                required: true
            },
            end_date: {
                required: true
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            company_symbol: {
                required: "Please enter a symbol"
            },
            start_date: {
                required: "Please enter a start date"
            },
            end_date: {
                required: "Please enter an end date"
            },
            email: {
                required: "Please enter an email",
                email: "Please enter a valid email"
            }
        },
        submitHandler: function(form) {
            form.submit();
        }
    });
});
