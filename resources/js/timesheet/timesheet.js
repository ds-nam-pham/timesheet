$(function(){
    var startDate = $('#date').val();
    var endDate = $('#end_date').val();
    var timeSpent;
    var time;
    $('#date').on('change', function(){
        startDate = $('#date').val();
        if (startDate && endDate && new Date(startDate) < new Date(endDate)) {
            if (startDate && endDate && new Date(startDate) < new Date(endDate)) {
                timeSpent = new Date(endDate).getTime() - new Date(startDate).getTime();
                time = formatTime(timeSpent);
                $('#time_spent').val(time);
             }
        }
    });
    $('#end_date').on('change', function(){
        endDate = $('#end_date').val();
        if (startDate && endDate && new Date(startDate) < new Date(endDate)) {
           timeSpent = new Date(endDate).getTime() - new Date(startDate).getTime();
           time = formatTime(timeSpent);
           $('#time_spent').val(time);
        }
    });
    
});

function formatTime(seconds) {
    var hours = Math.floor(seconds / 3600000);
    var minutes = Math.floor((seconds - hours * 3600000) / 60000);
    return hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0');
  }