<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>PHP Mysql PDO CRUD (Create, Read, Update and Delete) with jQuery Ajax and Bootstrap 4 Modal</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1 class="page-header text-center">PHP Mysql PDO CRUD (Create, Read, Update and Delete) with jQuery Ajax and Bootstrap 4 Modal</h1>
        <div class="row">
            <div class="col-12">
                <button id="addnew" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Add New Member</button>
                <div id="alert" class="alert alert-info text-center" style="margin-top:20px; display:none;">
                    <button class="close"><span aria-hidden="true">×</span></button>
                    <span id="alert_message"></span>
                </div>  
                <table class="table table-bordered table-striped" style="margin-top:20px;">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Firstname</th>
                            <th>Lastname</th>
                            <th>Address</th>
                            <th width="150">Action</th>
                        </tr>
                    </thead>
                    <tbody id="tbody"></tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modals -->
    <?php include('modal.html'); ?>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>
