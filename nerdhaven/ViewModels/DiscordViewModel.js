function DiscordUser(data) {
    self = this;
    self.username = data.username;
    self.playingGame = data.game ? "Playing " + data.game.name : "";
}

function DiscordViewModel() {
    var self = this;
    self.users = ko.observableArray();

    self.loadDiscordStatus = function() {
        $.get('https://discordapp.com/api/guilds/277836081083449344/widget.json', function(data) {
            document.getElementById("discordInvite").href = data.instant_invite;
            for (user in data.members) {
                self.users.push( new DiscordUser(data.members[user]));
            }
        });
    }
    self.Load = function () {
        this.loadDiscordStatus();
    }
}
 

    