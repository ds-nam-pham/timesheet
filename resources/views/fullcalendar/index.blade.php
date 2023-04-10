<!DOCTYPE html>
<html>
<head>
  <title>Laravel Fullcalender Add/Update/Delete Event</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<style>
    html, body {
        margin: 0;
        padding: 0;
        font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        font-size: 14px;
        }

        #calendar {
        max-width: 900px;
        margin: 40px auto;
        }
        #myModal{
            width: 500px;
            position: absolute;
            float: left;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
        #modal-view{
            width: 500px;
            position: absolute;
            float: left;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
        input[type=time]::-webkit-datetime-edit-ampm-field {
        display: none;
        }
</style>
<body>
 
  <div class="container">
      <div class="response"></div>
      <div id='calendar'></div>  

      <div class="modal" id="myModal">
        <div class="modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Timesheet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="mb-3 row">
                      <label for="task_id" class="col-sm-2 col-form-label">Task ID</label>
                      <div class="col-sm-10">
                          <input type="int" name="task_id" class="form-control" id="task_id" aria-describedby="">
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label for="task_content" class="col-sm-2 col-form-label">Content Task</label>
                      <div class="col-sm-10">
                          <input type="text" name="task_content" class="form-control" id="task_content" aria-describedby="">
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label for="date" class="col-sm-2 col-form-label">Date</label>
                      <div class="col-sm-10">
                          <input type="date" name="date" class="form-control" id="date" aria-describedby="">
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label for="time_spent" class="col-sm-2 col-form-label">Time spent</label>
                      <div class="col-sm-10">
                          <input type="time" name="time_spent"   class="form-control" id="time_spent">
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label for="difficulties" class="col-sm-2 col-form-label">Difficulties</label>
                      <div class="col-sm-10">
                          <input type="text" name="difficulties" class="form-control" id="difficulties">
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label for="plan" class="col-sm-2 col-form-label">Plan</label>
                      <div class="col-sm-10">
                          <input type="tex" name="plan" class="form-control" id="plan">
                      </div>
                      
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary create">Save changes</button>
              </div>
            </div>
          </div>
      </div>    
      <div class="modal" id="modal-view">
        <div class="modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Timesheet</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 row">
                    <label for="task_id" class="col-sm-2 col-form-label">Task ID</label>
                    <div class="col-sm-10">
                        <input type="int" name="task_id" class="form-control" id="view_task_id" aria-describedby="" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="task_content" class="col-sm-2 col-form-label">Content Task</label>
                    <div class="col-sm-10">
                        <input type="text" name="task_content" class="form-control" id="view_task_content" aria-describedby="" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="date" class="col-sm-2 col-form-label">Date</label>
                    <div class="col-sm-10">
                        <input type="date" name="date" class="form-control" id="view_date" aria-describedby="" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="time_spent" class="col-sm-2 col-form-label">Time spent</label>
                    <div class="col-sm-10">
                        <input type="time"   name="time_spent" class="form-control" id="view_time_spent" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="difficulties" class="col-sm-2 col-form-label">Difficulties</label>
                    <div class="col-sm-10">
                        <input type="text" name="difficulties" class="form-control" id="view_difficulties" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="plan" class="col-sm-2 col-form-label">Plan</label>
                    <div class="col-sm-10">
                        <input type="tex" name="plan" class="form-control" id="view_plan" readonly>
                    </div>
                    
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary delete" data-bs-dismiss="modal">Delete</button>
              <button type="button" class="btn btn-primary edit">Edit</button>
              <button type="button" class="btn btn-primary save-edit" hidden>Save changes</button>
            </div>
          </div>
        </div>
      </div>

      
      <div class="modal" id="modal-edit">
        <div class="modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Timesheet</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <div class="mb-3 row">
                      <label for="task_id" class="col-sm-2 col-form-label">Task ID</label>
                      <div class="col-sm-10">
                          <input type="int" name="task_id" class="form-control" id="edit_task_id" aria-describedby="">
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label for="task_content" class="col-sm-2 col-form-label">Content Task</label>
                      <div class="col-sm-10">
                          <input type="text" name="task_content" class="form-control" id="edit_task_content" aria-describedby="">
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label for="date" class="col-sm-2 col-form-label">Date</label>
                      <div class="col-sm-10">
                          <input type="date" name="date" class="form-control" id="edit_date" aria-describedby="">
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label for="time_spent" class="col-sm-2 col-form-label">Time spent</label>
                      <div class="col-sm-10">
                          <input type="time" name="time_spent"   class="form-control" id="edit_time_spent">
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label for="difficulties" class="col-sm-2 col-form-label">Difficulties</label>
                      <div class="col-sm-10">
                          <input type="text" name="difficulties" class="form-control" id="edit_difficulties">
                      </div>
                  </div>
                  <div class="mb-3 row">
                      <label for="plan" class="col-sm-2 col-form-label">Plan</label>
                      <div class="col-sm-10">
                          <input type="tex" name="plan" class="form-control" id="edit_plan">
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
      </div>
      
  </div>
<script>
    
    $(document).ready(function () {
          var SITEURL = "{{url('/')}}";
          $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
          var calendar = $('#calendar').fullCalendar({
              editable: true,
              events: SITEURL + "/fullcalendar",
    //         events: [
    //   {
    //     title: 'All Day Event',
    //     start: '2023-04-01'
    //   },
    //   {
    //     title: 'Long Event 1234',
    //     start: '2023-04-04T16:00:00',
    //     end: '2023-04-07T18:00:00',
    //     color: 'purple' // override!
    //   },
    //   {
    //     groupId: '999',
    //     title: 'Repeating Event',
    //     start: '2023-04-09T16:00:00'
    //   },
    //   {
    //     groupId: '999',
    //     title: 'Repeating Event',
    //     start: '2023-04-16T16:00:00'
    //   },
    //   {
    //     title: 'Conference',
    //     start: '2023-04-11',
    //     end: '2023-04-13',
    //     color: 'purple' // override!
    //   },
    //   {
    //     title: 'Meeting',
    //     start: '2023-04-12T10:30:00',
    //     end: '2023-04-12T12:30:00'
    //   },
    //   {
    //     title: 'Lunch',
    //     start: '2023-04-12T12:00:00'
    //   },
    //   {
    //     title: 'Meeting',
    //     start: '2023-04-12T14:30:00'
    //   },
    //   {
    //     title: 'Birthday Party',
    //     start: '2023-04-13T07:00:00'
    //   },
    //   {
    //     title: 'Click for Google',
    //     url: 'http://google.com/',
    //     start: '2023-04-28'
    //   }
    // ],
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
                          url: SITEURL + "/fullcalendar/create",
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
                      url: SITEURL + '/fullcalendar/update',
                      data: {'date': date, 'id': event.id},
                      type: "POST",
                      success: function (response) {
                          displayMessage("Updated Successfully");
                      }
                  });
              },
              eventClick: function (event) {
                debugger;
                console.log('ass');
                $.ajax({
                    type: "POST",
                    url: SITEURL + '/fullcalendar/view',
                    data: {'id': event.id},
                    success: function (response) {
                        view(response,SITEURL,event.id);
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
      function view(response, SITEURL, id){
        $('.edit').show();
        $('#view_task_id').val(response[0].task_id);
        $('#view_task_content').val(response[0].task_content);
        $('#view_time_spent').val(response[0].time_spent);
        $('#view_date').val(response[0].date);
        $('#view_plan').val(response[0].plan);
        $('#view_difficulties').val(response[0].difficulties);
        $('#view_user_id').val(response[0].user_id);
        
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
            update(response, SITEURL, id);
            $('#calendar').fullCalendar();
        });

        $('.delete').on( "click", function() {
              var deleteMsg = confirm("Do you really want to delete?");
                  if (deleteMsg) {
                      $.ajax({
                          type: "POST",
                          url: SITEURL + '/fullcalendar/delete',
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

      function update(response, SITEURL, id){
        var task_id = $('#view_task_id').val();
        var task_content = $('#view_task_content').val();
        var date = $('#view_date').val();
        var time_spent = $('#view_time_spent').val();
        var difficulties = $('#view_difficulties').val();
        var plan = $('#view_plan').val();
        $.ajax({
                type: "POST",
                url: SITEURL + '/fullcalendar/update',
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
  </script>

</body>
</html>