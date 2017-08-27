app.controller('DiscordController', function($scope, $http) {
    $scope.LoadDiscord = function() {
        $http.get("https://discordapp.com/api/guilds/277836081083449344/widget.json")
        .then (function (response) {
            $scope.users = response.data.members;
            $scope.url = response.data.instant_invite;
        })
    };
    $scope.LoadDiscord();

})