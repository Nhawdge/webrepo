<html>

<head>
    <title> Nhawdge.net</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="nhawdge.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.4.2/knockout-min.js"></script>
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <h1> Nhawdge.net</h1>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" data-bind="click:ShowBlog">Nhawdge.net</a>
                        </div>
                        <ul class="nav navbar-nav">
                            <li data-bind="css: { active: Content().name == 'Blog'}" >
                                <a data-bind="click: ShowBlog">Blog</a>
                            </li>
                            <!-- <li><a href="#">Page 1</a></li> -->
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown">
                                    Projects <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li data-bind="css: { active: Content().name == 'GymTracker'}" >
                                        <a data-bind="click: ShowGymTracker" >Gym Tracker</a>
                                        </li>
                                        <li data-bind="css: { active: Content().name == 'Breakout'}" >
                                        <a data-bind="click: ShowBreakout" >Breakout</a>
                                        </li>           
                                        <li data-bind="css: { active: Content().name == 'NetherCalc'}" >
                                        <a data-bind="click: ShowNetherCalc" >Nether Calculator</a>
                                        </li>
                                </ul>
                            </li>
                            <li  data-bind="css: { active: Content().name == 'Admin'}" >
                                <a data-bind="click: ShowAdmin"> Admin </a>
                                </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-sm-12">
                <div data-bind="component: Content">    
                </div>
            </div>
        </div>
    </div>


<?php
    include("Templates/Blog.html");
    include("Templates/GymTracker.html");
    include("Templates/Admin.html");
    include("Templates/Breakout.html");
    include("Templates/NetherCalc.html");
 ?>
</body>

<script src="ViewModels/_BaseViewModel.js"></script>
<script src="ViewModels/BlogViewModel.js"></script>
<script src="ViewModels/GymTrackerViewModel.js"></script>
<script src="ViewModels/AdminViewModel.js"></script>
<script src="ViewModels/BreakoutViewModel.js"></script>
<script src="ViewModels/NetherCalcViewModel.js"></script>

<script>
    ko.applyBindings(new BaseViewModel());

</script>

</html>