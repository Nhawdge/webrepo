var BaseViewModel = function() {
    var self = this;
    self.users = ko.observableArray();
    
    self.DiscordVM = ko.observable();
    

    function DiscordUser(data) {
        self = this;
        self.username = data.username;
        self.playingGame = data.game ? "Playing " + data.game.name : "";
    }

    self.loadDiscordStatus = function() {
        $.get('https://discordapp.com/api/guilds/277836081083449344/widget.json', function(data) {
            document.getElementById("discordInvite").href = data.instant_invite;
             self.users($.map(data.members, function (user) {
                    return new DiscordUser(user);
             }));
        });
    }
    self.loadDiscordStatus();

}

    