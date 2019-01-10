$(document).ready(function () {
    // swiches
    var elemsingle = document.querySelector('.js-single');
    var switchery = new Switchery(elemsingle, { color: '#4099ff', jackColor: '#fff' });
    var mc_answers = [];
    var tf_answers = [];
    var written_answers = [];
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
        var ex_mc_count = 1;
        var parent = $('#ex-elems');
        var data = {
            ex_mc_question: $('#ex-mc-question').val(),
            answers: [
                $('#ex-mc-correct-anwser').val(), 
                $('#ex-mc-wrong1').val(), 
                $('#ex-mc-wrong2').val(), 
                $('#ex-mc-wrong3').val()
            ]
        };
        $('.ex-m-choices').each(function (index, element) {
            ex_mc_count++;
            
        });
        mc_answers['m-choice-'+ex_mc_count] = data.answers[0];
        console.log(mc_answers);
        
        var out = "<tr class='ex-m-choices num-"+ex_mc_count+"'><td>";
        var answers = shuffle(data.answers);
        // console.log(answers);
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

        parent.append(out+"</td></tr>");
    });

    $('#ex-tf-submit').click(function (e) { 
        e.preventDefault();
        var ex_tf_count = 1;
        var out = "<tr class='ex-tf'><td>";
        var parent = $('#ex-elems');
        
        var data = {
            question: $('#ex-tf-question').val(),
            answer: $('#ex-tf-answer').prop('checked')
        }
        $('.ex-tf').each(function (index, element) {
            ex_tf_count++;
        });
        tf_answers['tf-'+ex_tf_count] = data.answer;
        console.log(tf_answers);
        
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
        parent.append(out+"</td></tr>");
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
        out +=                '<textarea  class="form-control" name="ex-written-question-answer" id="ex-written-question-answer"></textarea>';
        out +=            '</div>';
        out +=          "</div>";
        out +=      "</div>";
        out += "</div>" //row close

        parent.append(out+"</td></tr>");
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
});