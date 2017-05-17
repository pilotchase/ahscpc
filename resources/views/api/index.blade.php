<!DOCTYPE html>
<html>
<head>
    <title>AHSCPC Public API Documentation</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        ul.apinav {
            margin-top: 15px
        }

        footer {
            text-align: center;
            font-size: 10px;
            color: gray
        }

        .italic {
            font-style: italic
        }
        .nav-pills.alt > .active > a, .nav-pills.alt > .active > a:hover, .nav-pills.alt > .active > a:focus {
            color: white;
            background-color: gray
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <ul class="apinav nav nav-pills">
                <li class="logo"><img alt="VATUSA" src="https://ahscpc.org/img/ahscpc-logo.png" style="width: 200px;"></li>
            </ul>
            <h1>AHSCPC Public API Documentation</h1>
            <h5>by Chase A. Morgan, President</h5>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">Features</div>
            <div class="panel-body">
                <p>This documentation lists the public functions of the AHSCPC API.</p>
                <ul>
                    <li>The API returns data in <b>JSON</b>. The object must be decoded before use.</li>
                    <p></p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">Users</h3></div>
            <div class="panel-body">
                To get a list of current club members.
                <pre><code>https://api.ahscpc.org/token/@{{token}}/members         # Generic request
</code></pre>
            </div>
        </div>
    </div>
</div>
</body>
</html>