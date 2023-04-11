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
                $( ".btn-primary.create" ).on( "click", function() {
                    var task_id = $('#task_id').val();
                    var task_content = $('#task_content').val();
                    var date = $('#date').val();
                    var time_spent = $('#time_spent').val();
                    var difficulties = $('#difficulties').val();
                    var plan = $('#plan').val();
                    $.ajax({
                        url: "/calendar",
                        data: {'task_id' : task_id, 'task_content': task_content, 'date': date, 'time_spent' : time_spent, 'difficulties': difficulties, 'plan': plan},
                        type: "POST",
                        success: function (data) {
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
            console.log(event.id);
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
    $('#view_date').val(getFormattedDate(response.date));
    $('#view_plan').val(response.plan);
    $('#view_difficulties').val(response.difficulties);
    $('#view_user_id').val(response.user_id);
    
    $('.btn-close').on( "click", function() {
        $('#modal-view').hide();
        $('#view_task_id').attr("readonly", true);
        $('#view_task_content').attr("readonly", true);
        $('#view_time_spent').attr("readonly", true);
        $('#view_date').attr("readonly", true);
        $('#view_plan').attr("readonly", true);
        $('#view_difficulties').attr("readonly", true);
        $('#view_user_id').attr("readonly", true)
    });

    $('.edit').on( "click", function() {
        $('#view_task_id').attr("readonly", false);
        $('#view_task_content').attr("readonly", false);
        $('#view_time_spent').attr("readonly", false);
        $('#view_date').attr("readonly", false);
        $('#view_plan').attr("readonly", false);
        $('#view_difficulties').attr("readonly", false);
        $('#view_user_id').attr("readonly", false);
        $(this).hide();
        $('.save-edit').removeAttr('hidden');
    });
    $('.save-edit').on( "click", function() {
        update(response, id);
        $('#calendar').fullCalendar();
    });

    $('.delete').on( "click", function() {
            var deleteMsg = confirm("Do you really want to delete?");
                if (deleteMsg) {
                    $.ajax({
                        type: "delete",
                        url: '/calendar/' + id,
                        data: {'id': id},
                        success: function (response) {
                            if(parseInt(response) > 0) {
                                $('#calendar').fullCalendar('removeEvents', id);
                                displayMessage("Deleted Successfully");
                            }
                        }
                    });
                }
                $('#modal-view').hide();
    });

    }
    function getFormattedDate(date) {
        let currentDate = new Date(date);
        let year = currentDate.getFullYear();
        let month = (1 + currentDate.getMonth()).toString().padStart(2, '0');
        let day = currentDate.getDate().toString().padStart(2, '0');
        return year + '-' + month + '-' + day;
    }

    function update(response, id){
    var task_id = $('#view_task_id').val();
    var task_content = $('#view_task_content').val();
    var date = $('#view_date').val();
    var time_spent = $('#view_time_spent').val();
    var difficulties = $('#view_difficulties').val();
    var plan = $('#view_plan').val();
    $.ajax({
            type: "patch",
            url: '/calendar/' + id,
            data: {
                'id': id,
                'task_content': task_content,
                'task_id': task_id,
                'date': date,
                'time_spent': time_spent,
                'difficulties': difficulties,
                'plan': plan,
                'check_update' : true
            },
            success: function (response) {
                $('#modal-view').hide();
            }
        });
    }
