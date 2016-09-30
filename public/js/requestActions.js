/**
 * Created by Dell on 9/25/2016.
 */

$(document).ready(function () {
    $('#applyLeaveCalendarModal').on('shown.bs.modal', function () {
        $('#applyLeaveCalendar').fullCalendar({
            dayClick: function() {
                alert('a day has been clicked!');
            }
        });
    });

    $('#dateCorrection').datetimepicker({
        'format': 'YYYY/MM/DD'
    });

    $('#dateCorrectionNewIn').datetimepicker({

    });
    $('#dateCorrectionNewOut').datetimepicker({

    });
});