app.controller('AdminController', function ($scope, $http, $interval, $sce) {    
    $scope.password = "";
    $scope.isLoggedIn = false;

    $scope.Login = function (_pass) {
        $http.post("/data/login.php", { pass: $scope.password} )
            .then (function (response) {
                if(response.data.includes("true")) {
                    $scope.isLoggedIn = true;
                }
            })
    }
    
    $scope.getApplications = function () {
        $http.get("/data/GetApplications.php")
            .then (function (response) {
                $scope.allApplications = response.data;
            })
    }
    $scope.getApplications();

    $scope.Refresh = function (){
        $scope.getApplications();
    }
    $interval(function() {
        $scope.Refresh();
    }, 30000)
    
    $scope.ShowUser = function (app) {
        $scope.user = app;
    } 

    $scope.UpdateApplication = function() {
        console.log("Update App");
        $scope.status = "";
        $http.post("/data/UpdateApplication.php", $scope.user)
            .then(function(response) {
                if (response.status == 200 ) {
                    // Success
                    console.log(response);
                    $scope.status = "Application Submitted Successfully";
                    $scope.reset();
                    $scope.Submitted = true;
                }
                else {
                    // Failed
                    $scope.status = "App failed Contact @nhawdge#8543 via discord";
                    console.log(response);
                }
        })
    };

});