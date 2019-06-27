<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $title; ?></title>
    <?php echo Asset::css('bootstrap.css'); ?>
    <style>
        body { margin: 40px; }
        /* Add a black background color to the top navigation */
        .topnav {
            background-color: #55B8E2;
            overflow: hidden;

        }

        /* Style the links inside the navigation bar */
        .topnav a {
            float: left;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 17px;
        }

        /* Change the color of links on hover */
        .topnav a:hover {
            background-color: #ddd;
            color: black;
        }

        /* Add a color to the active/current link */
        .topnav a.active {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<div class="topnav">

    <a class="active" href="/ocrscanner/public/car/">Home</a>
    <a href="/ocrscanner/public/car/create/">Student Registration </a>
    <a href="/ocrscanner/public/car/create">Visitor Registration</a>
    <a href="/ocrscanner/public/car/pay">Penalty Payment</a>

    <div align="right">  <a href="/ocrscanner/public/car/">Logout</a></div>
</div>

<body>
<div class="container">
    <div class="col-md-12">
        <h1><?php echo ""//$title; ?></h1>
        <hr>
        <?php if (Session::get_flash('success')): ?>
            <div class="alert alert-success">
                <strong>Success</strong>
                <p>
                    <?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
                </p>
            </div>
        <?php endif; ?>
        <?php if (Session::get_flash('error')): ?>
            <div class="alert alert-danger">
                <strong>Error</strong>
                <p>
                    <?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
                </p>
            </div>
        <?php endif; ?>
    </div>
    <div class="col-md-12">
        <?php echo $content; ?>
    </div>
    <footer>
        <p class="pull-right">OCRSCANNER</p>
        <p>
            <a href="
">OCRSCANNER</a> <br>

        </p>
    </footer>
</div>
</body>
</html>
