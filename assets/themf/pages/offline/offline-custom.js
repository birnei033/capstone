"use strict";
$(document).ready(function($) {

            Offline.check();
            Offline.options = {
                interceptRequests: true,
            };
        var c=$(".avatar-online"),
            d=$(".avatar-off");
            var timeinterval = setInterval(function(){
                Offline.check();
            },3000);
        Offline.on("confirmed-down",
            function() {
                c.removeClass(".avatar-online").addClass("avatar-off");
            }
        ),
            Offline.on("confirmed-up",
                function() {
                    // console.log("No internet!");
                    d.removeClass(".avatar-off").addClass("avatar-online")
                }
            )
});