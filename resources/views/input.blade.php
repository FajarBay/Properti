<html>
    <head>
    </head>
    <body>
        <form method="POST" action="{{ url('properti')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
        <div class="form-group">
            <label>Enter First Name</label>
            <input type="text" name="id_kat" id="id_kat" class="form-control" />
            <span id="error_first_name" class="text-danger"></span>
           </div>
           <button type="submit" name="btn_login_details" id="btn_login_details" class="btn btn-info btn-lg">Next</button>
        </form>
        </body>
</html>