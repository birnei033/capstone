$(document).ready(function () {
    
    function start_exam(){
        
        var time_in_minutes = $('.card.exercise #time').text();
        // var time_in_minutes = 1;
        var current_time = Date.parse(new Date());
        var deadline = new Date(current_time + time_in_minutes*60*1000);
        
        
        function time_remaining(endtime){
            var t = Date.parse(endtime) - Date.parse(new Date());
            var seconds = Math.floor( (t/1000) % 60 );
            var minutes = Math.floor( (t/1000/60) % 60 );
                var hours = Math.floor( (t/(1000*60*60)) % 24 );
                var days = Math.floor( t/(1000*60*60*24) );
                return {'total':t, 'days':days, 'hours':hours, 'minutes':minutes, 'seconds':seconds};
            }
            function run_clock(id,endtime){
                var clock =  $(id);
                function update_clock(){
                    var t = time_remaining(endtime);
                    clock.html(t.minutes+':'+t.seconds);
                    if(t.total<=0){
                         clearInterval(timeinterval); 
                         
                         swal('Time is up!',{
                             icon: 'info'
                            }).then((val)=>{
                                $('.card.exercise #ex_submit').trigger('click');
                                
                            });
                    }
                }
                update_clock(); // run function once at first to avoid delay
                var timeinterval = setInterval(update_clock,1000);
            }
            run_clock('.card.exercise #time',deadline);
        }
        
        var content = $('.card.exercise #ex-elems').html();
        $('.card.exercise #ex-elems').html("");
        
        function start_it(){
            
            swal("Warning:\n.","When the timer starts, \nrefreshing this page will make your score 0. \nJust don't try to cheat or else you will fail.\n\n Ready? Click 'start' to begin.",{
                icon: 'warning',
                buttons:['I\'m not ready', 'Start']
            }).then((val)=>{
                if (val == 1) {
                    $('.card.exercise #ex-elems').html(content);
                    var url = location.pathname;
                    var data ={
                        ex_initial: "submit",
                        ex_id: $('#ex_submit').attr('ex-id'),
                        subject_id: $('#ex_submit').attr('sub-id'),
                    }
                    //  PASS DATA
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: data,
                        dataType: "JSON",
                        success: function (response) {
                            start_exam();
                             console.log(response);
                            },
                            error: function(jqXHR, textStatus, errorThrown){
                                console.log(textStatus);
                            }
                     });
                    }else{
                        location.href = "/ignite/student";
                    }
                });
            }
            
        // console.log(start_date);
        var now = new Date();
        var millisTill10 = new Date(start_date.year, start_date.month -1, start_date.day, start_date.hour, start_date.minute, 0, 0) - now;
        if (millisTill10 < 0) {
            // alert("go now");
            start_it();
            millisTill10 += 86400000; 
        }else{
            console.log("running pa");
            swal('It\'s not time yet! Please come back and be ready on '+start_date.month+"/"+start_date.day+"/"+start_date.year+" - "+start_date.hour+""+start_date.minute+" hour/s",
            {
                icon: "info"
            }).then((val)=>{
                location.href = "/ignite/student";
            });

        }
        setTimeout(function(){
        }, millisTill10);
        

        // end date time
        if (end_date.year != 0) {
            var end = new Date();
            var end_time = new Date(end_date.year, end_date.month -1, end_date.day, end_date.hour, end_date.minute, 0, 0) - end;
            if (end_time < 0) {
                swal('I am sorry, you are too late. ',
                {
                    icon: "error"
                }).then((val)=>{
                    var data ={
                        ex_initial: "submit",
                        ex_id: $('#ex_submit').attr('ex-id'),
                        subject_id: $('#ex_submit').attr('sub-id'),
                    }
                    var url = location.pathname; 
                    //  PASS DATA
                    $.ajax({
                        url: url,
                        type: "POST",
                        data: data,
                        dataType: "JSON",
                        success: function (response) {
                             location.href = "/ignite/student";
                            },
                            error: function(jqXHR, textStatus, errorThrown){
                            
                            }
                     });
                    });
                end_time += 86400000; 
            }
            setTimeout(function(){
            }, end_time);
        }
        
});