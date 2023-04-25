$(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var calendar = $('#calendar').fullCalendar({
            editable: true,
            events: "/calendar",
            displayEventTime: true,
            editable: true,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
                $('#myModal').show();
                $( ".btn-primary.create" ).on( "click", function(e) {
                    var postData = $('#form_create').serializeArray();
                    $.ajax({
                        url: "/calendar",
                        data: postData,
                        type: "POST",
                        success: function (data) {
                            $('#calendar').fullCalendar( 'refetchEvents' );
                            displayMessage("Added Successfully");
                            $('#myModal').hide();
                        }
                    });
                    calendar.fullCalendar('renderEvent',
                        {
                            title: task_content,
                            start: date,
                            end: date,
                            allDay: allDay
                        },
                        true
                    );
                });
                calendar.fullCalendar('unselect');
            },

            eventDrop: function (event, delta) {
                var date = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                $.ajax({
                    url: '/calendar/' + event.id,
                    data: {'date': date, 'id': event.id},
                    type: "patch",
                    success: function (response) {
                        displayMessage("Updated Successfully");
                    }
                });
            },
            eventClick: function (event) {
                $.ajax({
                    type: "get",
                    url: '/calendar/' + event.id,
                    success: function (response) {
                        view(response,event.id);
                    }
                });
                $('#modal-view').show();
            }

        });

        $('.btn-close').on( "click", function() {
            $('#myModal').hide();
            $(".save-edit").prop("hidden", true);
        });
        $('.btn-secondary').on( "click", function() {
            $('#myModal').hide();
        });
        
});
function displayMessage(message) {
    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}

function view(response, id){
    $('.edit').show();
    $('#view_task_id').val(response.task_id);
    $('#view_task_content').val(response.task_content);
    $('#view_time_spent').val(response.time_spent);
    $('#view_date').val(response.date);
    $('#view_end_date').val(response.end_date);
    $('#view_plan').val(response.plan);
    $('#view_difficulties').val(response.difficulties);
    $('#view_user_id').val(response.user_id);
    $('#form_view').find('.save-edit').attr('record_id', id);
    $('#form_view').find('.delete').attr('record_id', id);
}
function update(id) {
    var postData = $('#form_view').serializeArray();
    postData.push({
        name : 'check_update',
        value : true
    });
    $.ajax({
        type: "patch",
        url: '/calendar/' + id,
        data: postData,
        success: function (response) {
            $('#calendar').fullCalendar( 'refetchEvents' );
            $('#modal-view').hide();
        }
    });
}

$('.save-edit').on( "click", function(e) {
    e.preventDefault();
    update($(this).attr('record_id'));
});

$('.btn-close').on( "click", function(e) {
    e.preventDefault();
    $('#modal-view').hide();
    $('#view_task_id').attr("readonly", true);
    $('#view_task_content').attr("readonly", true);
    $('#view_time_spent').attr("readonly", true);
    $('#view_date').attr("readonly", true);
    $('#view_end_date').attr("readonly", true);
    $('#view_plan').attr("readonly", true);
    $('#view_difficulties').attr("readonly", true);
    $('#view_user_id').attr("readonly", true);
});

$('.edit').on( "click", function(e) {
    e.preventDefault();
    $('#view_task_id').attr("readonly", false);
    $('#view_task_content').attr("readonly", false);
    $('#view_time_spent').attr("readonly", false);
    $('#view_date').attr("readonly", false);
    $('#view_end_date').attr("readonly", false);
    $('#view_plan').attr("readonly", false);
    $('#view_difficulties').attr("readonly", false);
    $('#view_user_id').attr("readonly", false);
    $(this).hide();
    $(".save-edit").prop("hidden", false);
});

$('.delete').on( "click", function(e) {
    e.preventDefault();
        var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                $.ajax({
                    type: "delete",
                    url: '/calendar/' + $(this).attr('record_id'),
                    data: {'id': $(this).attr('record_id')},
                    success: function (response) {
                        if(parseInt(response) > 0) {
                            $('#calendar').fullCalendar('removeEvents', $(this).attr('record_id'));
                            displayMessage("Deleted Successfully");
                        }
                    }
                });
            }
    $('#modal-view').hide();
});