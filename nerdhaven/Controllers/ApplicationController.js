app.controller('ApplicationController', function($scope, $http) { 
    $scope.Submitted = false;

    $scope.master = {
        email: "",
        mcUsername: "",
        firstName: "",
        age: "",
        country: "",
        personalInfo: "",
        projectInfo: "",
        timePlayed: "",
        reference: ""
    };
    
    $scope.reset = function () {
        $scope.application = angular.copy($scope.master);
    };
    $scope.reset();

    $scope.SubmitApplication = function() {
        $scope.status = "";
        $http.post("/data/SaveApplication.php", $scope.application)
            .then(function(response) {
                if (response.data.includes("Success")) {
                    // Success
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