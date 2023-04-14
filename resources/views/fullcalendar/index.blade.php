@extends('layouts.home')
@section('css')
@vite(['resources/css/calendar.css'])
@endsection
@section('content')
  <div class="container">
      <div class="response"></div>
      <div id='calendar'></div>  
      <div class="modal" id="myModal">
        <div class="modal-dialog-centered">
            <form method="POST" enctype="multipart/form-data" id="form_create">
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
                            <input type="datetime-local" name="date" class="form-control" id="date" aria-describedby="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="date" class="col-sm-2 col-form-label">Date</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" name="end_date" class="form-control" id="end_date" aria-describedby="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="time_spent" class="col-sm-2 col-form-label">Time spent</label>
                        <div class="col-sm-10">
                            <input type="text" name="time_spent"   class="form-control" id="time_spent" readonly>
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
            </form>
          </div>
      </div>    
      <div class="modal" id="modal-view">
        <div class="modal-dialog-centered">
            <form method="POST" enctype="multipart/form-data" id="form_view">
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
                                <input type="datetime-local" name="date" class="form-control" id="view_date" aria-describedby="" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="date" class="col-sm-2 col-form-label">Date</label>
                            <div class="col-sm-10">
                                <input type="datetime-local" name="end_date" class="form-control" id="view_end_date" aria-describedby="" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="time_spent" class="col-sm-2 col-form-label">Time spent</label>
                            <div class="col-sm-10">
                                <input type="text"   name="time_spent" class="form-control" id="view_time_spent" readonly>
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
            </form>
        </div>
      </div>
  </div>
@endsection
@section('javascript')
  @vite(['resources/js/calendar/calendar.js'])
@endsection