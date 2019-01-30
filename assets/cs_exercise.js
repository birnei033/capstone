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
        
        
});