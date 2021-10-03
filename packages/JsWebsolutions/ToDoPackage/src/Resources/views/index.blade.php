<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-sm-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h1>Assign Task To Employee</h1>
                </div>
                <div class="panel-body">
                    <form id="task_registration" class="form-horizontal" role="form" method="POST" action="{{ route('task.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="email" class="col-md-3 control-label">Employee Name</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="employee_name"
                                    placeholder="Employee Name" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="firstname" class="col-md-3 control-label">Task</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="task" id="task" placeholder="Task"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <!-- Button -->
                            <div class="col-md-offset-3 col-md-9">
                                <button id="btn-signup" type="submit" class="btn btn-info"><i
                                        class="icon-hand-right"></i> &nbsp Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
