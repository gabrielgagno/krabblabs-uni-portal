/**
 * Created by Dell on 9/25/2016.
 */

$(document).ready(function () {
    $('#applyLeaveCalendarModal').on('shown.bs.modal', function () {
        $('#applyLeaveCalendar').fullCalendar({})
    });
});