$(document).ready(function () {

    var mc_answers = {};
    var tf_answers = {};
    var written_answers = {};
    // var all_answers = {mc_answers: mc_answers, tf_answers: tf_answers, written_answers: written_answers};
    var all_answers = {mc_answers: mc_answers, tf_answers: tf_answers, written_answers: written_answers};

    // -----------------
    $('#submit-text').click(function (e) { 
        e.preventDefault();
        var data = $('#editor1').html(),
            text_count = 0,
            parent = $('#ex-elems');
            $('.text').each(function (index, element) {
                text_count++;
            });
        parent.append('<tr class="text text-'+text_count+'"><td>'+data+'</td></tr>');
        $('#set-instruction').removeClass('md-show');
        $('#ex-instruction').val('');

    });

    $('#ex-mul-choice-submit').click(function (e) { 
        e.preventDefault();
        var parent = $('#ex-elems');
        var append_elem = "";
        $('#set-mul-choice .accordion-desc').each(function (index, element) {
            var ex_mc_count = index+1;
            var data = {
                ex_mc_question: $(this).children().children('#ex-mc-question').val(),
                answers: [
                    $(this).children().children('.ex-mc-correct-anwsers').val(), 
                    $(this).children().children('.ex-mc-wrong1').val(), 
                    $(this).children().children('.ex-mc-wrong2').val(), 
                    $(this).children().children('.ex-mc-wrong3').val()
                ]
            };
            // $('.ex-m-choices').each(function (index, element) {
            //     ex_mc_count++;
            // });
            mc_answers['mchoice-'+ex_mc_count] = data.answers[0];
            all_answers.mc_answers = mc_answers;
            console.log(mc_answers);
            
            
            var out = "<tr class='ex-m-choices num-"+ex_mc_count+"'><td>";
            var answers = shuffle(data.answers);
            console.log(answers);
            out += "<h5>"+ex_mc_count+". "+data.ex_mc_question+"</h5><br>";
            out += "<div class=''>"; //row open
            out +=      "<div class='col-sm-12'>";
            out +=          "<div class='row'>";
            out += "<form>";
            out +=              "<div class='form-radio'>";
            out +=                       '<div class="radio radio-inline">';
            out +=                        '<label>';
            out +=                            '<input value="'+answers[0]+'" type="radio" name="m-choice-'+ex_mc_count+'">';
            out +=                            '<i class="helper"></i>'+answers[0];
            out +=                        '</label>';
            out +=                        '</div>';
            out +=                        '<div class="radio radio-inline">';
            out +=                            '<label>';
            out +=                                '<input value="'+answers[1]+'" type="radio" name="m-choice-'+ex_mc_count+'">';
            out +=                                '<i class="helper"></i>'+answers[1];
            out +=                            '</label>';
            out +=                        '</div>';
            out +=                        '<div class="radio radio-inline">';
            out +=                            '<label>';
            out +=                                '<input value="'+answers[2]+'" type="radio" name="m-choice-'+ex_mc_count+'">';
            out +=                                '<i class="helper"></i>'+answers[2];
            out +=                            '</label>';
            out +=                        '</div>';
            out +=                        '<div class="radio radio-inline">';
            out +=                            '<label>';
            out +=                                '<input value="'+answers[3]+'" type="radio" name="m-choice-'+ex_mc_count+'">';
            out +=                                '<i class="helper"></i>'+answers[3];
            out +=                            '</label>';
            out +=                        '</div>';
            out +=              "</div>";
            out += "</form>";
            out +=              "<div class='col-sm-6'>";
            out +=              "</div>";
            out +=          "</div>";
            out +=      "</div>";
            out += "</div>" //row close
            out += "</td></tr>";
            console.log(all_answers);
            append_elem += out;
        });
        parent.html(append_elem);
        $('#set-mul-choice').removeClass('md-show');
        console.log(all_answers);

        
    });

    $('#ex-tf-submit').click(function (e) { 
        e.preventDefault();
        var parent = $('#ex-elems');
        var append_elem = "";
        $('#set-true-false .accordion-desc').each(function (index, element) {
            var ex_tf_count = index+1;
            
            var data = {
                question: $(this).children().children('#ex-tf-question').val(),
                answer: $(this).children().children('#ex-tf-answer').prop('checked')
            }
            // $('.ex-tf').each(function (index, element) {
                //     ex_tf_count++;
                // });
                tf_answers['tf-'+ex_tf_count] = data.answer;
                console.log(tf_answers);
                
            var out = "<tr class='ex-tf'><td>";
            out += "<h5>"+ex_tf_count+". "+data.question+"</h5><br>";
            out += "<div class=''>"; //row open
            out +=      "<div class='col-sm-12'>";
            out +=          "<div class='row'>";
            out += "<form>";
            out +=              "<div class='form-radio'>";
            out +=                       '<div class="radio radio-inline">';
            out +=                        '<label>';
            out +=                            '<input value="true" type="radio" name="tf-'+ex_tf_count+'">';
            out +=                            '<i class="helper"></i>True';
            out +=                        '</label>';
            out +=                        '</div>';
            out +=                        '<div class="radio radio-inline">';
            out +=                            '<label>';
            out +=                                '<input value="false" type="radio" name="tf-'+ex_tf_count+'">';
            out +=                                '<i class="helper"></i>False';
            out +=                            '</label>';
            out +=                        '</div>';
            out +=              "</div>";
            out += "</form>";
            out +=          "</div>";
            out +=      "</div>";
            out += "</div>" //row close
            out += "</td></tr>";
            append_elem += out;
            // console.log(all_answers);
        });
        parent.html(append_elem);
        $('#set-true-false').removeClass('md-show');
            
    });
    
    $('#ex-written-submit').click(function (e) { 
        e.preventDefault();
        var ex_written_count = 1;
        var out = "<tr class='ex-written'><td>";
        var parent = $('#ex-elems');
        var data = {
            question: $('#ex-written-question').val(),
            answer: $('#ex-tf-answer').val()
        }
        $('.ex-written').each(function (index, element) {
            ex_written_count++;
        });
        
        out += "<h5>"+ex_written_count+". "+data.question+"</h5><br>";
        out += "<div class=''>"; //row open
        out +=      "<div class='col-sm-12'>";
        out +=          "<div class='row'>";
        out +=                '<div style="width:100%" class="form-group form-default ">';
        out +=                '<label for="ex-written-question-answer">Your Answer</label>';
        out +=                '<textarea  class="form-control" name="ex-written-question-answer-'+ex_written_count+'" id="ex-written-question-answer"></textarea>';
        out +=            '</div>';
        out +=          "</div>";
        out +=      "</div>";
        out += "</div>" //row close

        parent.append(out+"</td></tr>");
        $('#set-written').removeClass('md-show');
        // console.log(all_answers);
        
    });

    $('#ex-set-time-submit').click(function (e) { 
        e.preventDefault();
        var time = $('#ex-set-time').val();
        var out =   '<div id="timer"><span id="clock-icon"></span>';
        out +=          '<span>Time: </span><span id="time">'+time+'</time> minutes';
        out +=      '</div>';

        if (time < 1 || time == "") {
            swal('Oops!', "Time must be greater than 0 minute.", {
                icon: "info",
            });
        }else{
            $('#timer-wrapper').html(out);
            $('#set-time').removeClass('md-show');
        }
    });
    
    function shuffle(array) {
        var currentIndex = array.length, temporaryValue, randomIndex;
      
        // While there remain elements to shuffle...
        while (0 !== currentIndex) {
      
          // Pick a remaining element...
          randomIndex = Math.floor(Math.random() * currentIndex);
          currentIndex -= 1;
      
          // And swap it with the current element.
          temporaryValue = array[currentIndex];
          array[currentIndex] = array[randomIndex];
          array[randomIndex] = temporaryValue;
        }
      
        return array;
      }


      $('#ex-submit').click(function (e) { 
          e.preventDefault();
          var url = location.pathname;
          var data = {
            ex_subject: $('#ex-subject').val(),
            ex_elems: $('#ex-elems').html(),
            exercise_title: $('#ex-title').val(),
            ex_submit: $('#ex-submit').val(),
            answers: JSON.stringify(all_answers)
          };
          console.log(data);
          
          $.ajax({
              type: "POST",
              url: url,
              data: data,
              dataType: "JSON",
              success: function (response) {
                if (response.icon === "success") {
                    swal('Success', response.message, {
                        icon: response.icon,
                    })
                    .then((val)=>{
                        location.reload();
                    });
                }else{
                    swal("Something Went wrong!",response.message, {
                        icon: response.icon,
                    });
                }
              },
              error: function(jqXHR, textStatus, errorThrown){
                console.log(errorThrown);
                
              }
          });
      });

      $('#ex_submit').click(function (e) { 
         e.preventDefault();
         var data = {};
         var temp = {};
         console.log("CHOICES");
         $('.ex-m-choices').each(function (index, element) {
             var n = index+1;
             $('[name="m-choice-'+(index+1)+'"]').each(function (index, element) {
                 var chosen = $(this).prop('checked'); 
                 if (chosen) {
                     console.log($(this).val());
                     temp["mchoice-"+n] = $(this).val();
                    }
                    
                });
                console.log(temp);
                //  data.m_choice_answer = twmp;
            });
        data.mc_answers = JSON.stringify(temp);
        temp = {};
         console.log("TRUE OR FALSE");
         $('.ex-tf').each(function (index, element) {
            var n = index+1;
            $('[name="tf-'+(index+1)+'"]').each(function (index, element) {
                var chosen = $(this).prop('checked'); 
                if (chosen) {
                    console.log($(this).val());
                    temp["tf-"+n] = $(this).val();
                }
            });
         });
        data.tf_answers = JSON.stringify(temp);
        data.ex_submit = "submit";
        data.ex_id = $('#ex_submit').attr('ex-id');
        data.subject_id = $('#ex_submit').attr('sub-id');
        temp = {};
        
        console.log("WRITTEN");
        $('.ex-written').each(function (index, element) {
            var n = index+1;
            $('[name="ex-written-question-answer-'+(index+1)+'"]').each(function (index, element) {
                    console.log($(this).val());
                    temp[n] = ($(this).val());
                });
            });
            data.written_answers =temp;
         console.log(data);
         var url = location.pathname;
        //  PASS DATA
         $.ajax({
             url: url,
             type: "POST",
             data: data,
             dataType: "JSON",
             success: function (response) {
                 console.log(response);
                 swal(response.message,
                    'You got '+response.score+' out of '+response.total+'\n'+response.percent+"%", {
                    icon: response.icon,
                });
             },
             error: function(jqXHR, textStatus, errorThrown){
                console.log(textStatus);
              }
         });
        });
});