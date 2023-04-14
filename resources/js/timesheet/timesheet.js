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

    $('#view_date').on('change', function(){
        startDate = $('#view_date').val();
        if (startDate && endDate && new Date(startDate) < new Date(endDate)) {
            if (startDate && endDate && new Date(startDate) < new Date(endDate)) {
                timeSpent = new Date(endDate).getTime() - new Date(startDate).getTime();
                time = formatTime(timeSpent);
                $('#view_time_spent').val(time);
             }
        }
    });
    $('#view_end_date').on('change', function(){
        endDate = $('#view_end_date').val();
        if (startDate && endDate && new Date(startDate) < new Date(endDate)) {
           timeSpent = new Date(endDate).getTime() - new Date(startDate).getTime();
           time = formatTime(timeSpent);
           $('#view_time_spent').val(time);
        }
    });
    
    $("#form-create").validate({
		onfocusout: false,
		onkeyup: false,
		onclick: true,
		rules: {
			"task_id": {
				required: true
			},
			"task_content": {
				required: true
			},
			"date": {
				equalTo: ""
				
			},
			"end_date": {
				required: true
			},
            "time_spent": {
				required: ""
				
			},
            "difficulties": {
				required: ""
				
			},
            "plan": {
				required: ""
				
			},
		},
		messages: {
			"task_id": {
				required: "Bắt buộc nhập task_id"
			},
			"task_content": {
				required: "Bắt buộc nhập task_content"
			},
			"date": {
				required: "Bắt buộc nhập date"
			},
            "end_date": {
				required: "Bắt buộc nhập end_date"
			},
			"time_spent": {
				required: "Bắt buộc nhập time_spent"
			},
			"difficulties": {
				required: "Bắt buộc nhập difficulties"
			},
            "plan": {
				required: "Bắt buộc nhập plan"
			}
		}
	});

    $("#edit-form").validate({
		onfocusout: false,
		onkeyup: false,
		onclick: true,
		rules: {
			"task_id": {
				required: true
			},
			"task_content": {
				required: true
			},
			"date": {
				equalTo: ""
				
			},
			"end_date": {
				required: true
			},
            "time_spent": {
				required: ""
				
			},
            "difficulties": {
				required: ""
				
			},
            "plan": {
				required: ""
				
			},
		},
		messages: {
			"task_id": {
				required: "Bắt buộc nhập task_id"
			},
			"task_content": {
				required: "Bắt buộc nhập task_content"
			},
			"date": {
				required: "Bắt buộc nhập date"
			},
            "end_date": {
				required: "Bắt buộc nhập end_date"
			},
			"time_spent": {
				required: "Bắt buộc nhập time_spent"
			},
			"difficulties": {
				required: "Bắt buộc nhập difficulties"
			},
            "plan": {
				required: "Bắt buộc nhập plan"
			}
		}
	});
    
});

function formatTime(seconds) {
    var hours = Math.floor(seconds / 3600000);
    var minutes = Math.floor((seconds - hours * 3600000) / 60000);
    return hours.toString().padStart(2, '0') + ':' + minutes.toString().padStart(2, '0');
}