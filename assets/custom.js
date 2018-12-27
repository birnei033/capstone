var subjects_table, lessons_table, students_table;
jQuery(document).ready(function ($) {
    var url = window.location.href;
    $('nav ul.pcoded-item li  a').each(function (index, element) {
        if (this.href == url) {
            $(this).parent().addClass('active');
            if ($(this).parent().parent().parent().hasClass('pcoded-hasmenu')) {
                $(this).parent().parent().parent().addClass('active pcoded-trigger');
            }
        }
    });
    $(".select-programs").select2();
    students_table = $('#alt-pg-test').DataTable({
        initComplete: function(settings, json) {
            $('[data-toggle="tooltip"]').tooltip();  
            // $('.student-update').each(function (index, element) {
            //     $(this).click(function (e) { 
            //         e.preventDefault();
            //         var id = $(this).attr('up-id'),
            //             url = $(this).attr('href');
            //             open_update_modal(id, url, '#student-update-form');
            //     });
                
            // });    
          },
        ajax: {
            url: "your_students/ajax_get",
            type: "post",
        },
        columns: [
            // { "data": "student_id" },
            { "data": "school_id" },
            { "data": "student_login_name" },
            { "data": "student_full_name" },
            { "data": "student_subject"},
            { "data": "student_program" },
            { "data": "actions" }   
        ],
        pagingType: "full_numbers",
        responsive: true
    });

    lessons_table = $('#alt-pg-lessons').DataTable({
        initComplete: function(settings, json) {
            $('[data-toggle="tooltip"]').tooltip();
          },
        ajax: {
            url: "lessons/ajax_get_lessons/ajax_get",
            type: "post",
        },
        columns: [
            // { "data": "id" },
            { "data": "lesson_title" },
            { "data": "lesson_author" },
            { "data": "subject" },
            { "data": "tool" }   
        ],
        pagingType: "full_numbers",
        responsive: true
    });

     subjects_table = $('#subjects-table').DataTable({
        ajax: {
            url: "subjects/ajax_get_subject",
            type: "post",
        },
        columns: [
            // { "data": "subject_id" },
            { "data": "subject_title" },
            { "data": "number_of_lessons" },
            { "data": "tools" }  
        ],
        pagingType: "full_numbers",
        responsive: true
    });

});

// SWEET ALERTS
function delete_alert(id, url, alert_title = "Add Alert Title", alert_text = "Add Alert Text"){   
    swal({
        title: alert_title,
        text: alert_text,
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDeleted) => {
        if (willDeleted) {
            var data = {
                data_type: "ajax",
                id: id
            };
            $.ajax({
                url : url,
                type: "POST",
                data: data,
                dataType: "JSON",
                success: function(data)
                {
                    swal("Item has been deleted!", {
                        icon: "success",
                    });
                    lessons_table.ajax.reload();
                    students_table.ajax.reload();
                    subjects_table.ajax.reload();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    swal(textStatus+" "+errorThrown);
                }
            });
        }
      });
}

function delete_subject(id, url, subjc_name){
    swal({
        title: "Are you sure?",
        text: "You are about to delete "+subjc_name+"!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDeleted) => {
        if (willDeleted) {
            var data = {
                data_type: "ajax",
                subj_id: id
            };
            $.ajax({
                url : url+"delete",
                type: "POST",
                data: data,
                dataType: "JSON",
                success: function(data)
                {
                    swal("Poof! "+subjc_name+" file has been deleted!", {
                        icon: "success",
                    });
                    subjects_table.ajax.reload();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    swal(textStatus+" "+errorThrown);
                }
            });
         
        }
      });
}

// MODALS
function update_subject(id, url){
    $.ajax({
        url : url+"getbyid/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
            swal("", {
                content: {
                    element: "input",
                    attributes: {
                      placeholder: "Type your password",
                      type: "text",
                      value: data.subject.subject_title,
                      name: "subj-name"
                    },
                },
                buttons: true
              })
              .then((value) => {
                  if (value != "" && value != null) {
                    renameSubject(id, url, value);
                  }
              });
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert(textStatus+" "+errorThrown);
        }
    });
}
function renameSubject(id, url, value){
    var data = {
        subj_name : value,
        data_type: "ajax"
      };
    $.ajax({
        url : url+"update/"+id,
        type: "POST",
        data: data,
        dataType: "JSON",
        success: function(data)
        {
            // console.log(data);
            swal("Updated!", {
                icon: "success",
            });
            subjects_table.ajax.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            // console.log("false");
            swal(textStatus+" "+errorThrown);
        }
    });
}

function addSubject(url){
    swal("Input the title of your subject.", {
        content: {
            element: "input",
            attributes: {
            //   placeholder: "SubjectTitle",
              type: "text",
            //   value: data.subject.subject_title,
            //   name: "subj-name"
            },
        },
        buttons: true
      })
      .then((value) => {
          if (value != "" && value != null) {
            var data = {
                subj_name : value,
                data_type: "ajax"
              };
            //   console.log(data);
            $.ajax({
                url : url+"subjects/add",
                type: "POST",
                data: data,
                dataType: "JSON",
                success: function(data)
                {
                    // console.log(data);
                    swal(value+" Successfullly Added!", {
                        icon: "success",
                    });
                    subjects_table.ajax.reload();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    // console.log("false");
                    swal(textStatus+" "+errorThrown);
                }
            });
          }
      });
}

$( function() {
    $( "#draggablePanelList,#draggableMultiple,#draggableWithoutImg" ).sortable({
      revert: true,
      animation:150
    });
  } );

  function student_password_reset(id, url){
    swal({
        title: "Password Reset!",
        text: "You are about to reset student password to 'changeme'!",
        icon: "info",
        buttons: true,
        dangerMode: true,
      })
      .then((willReset) => {
        if (willReset) {
            var data = {
                data_type: "ajax",
                student_id: id
            };
            // console.log(data);
            $.ajax({
                url : url+"your_students/ajax_student_password_reset/"+id,
                type: "POST",
                data: data,
                dataType: "JSON",
                success: function(data)
                {
                    swal("Password Reset Successfully!", {
                        icon: "success",
                    });
                    subjects_table.ajax.reload();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    swal(textStatus+" "+errorThrown);
                }
            });
         
        }
      });
}

 function open_update_modal(id, url, form){  
    $('#student-submit-update').attr('student-id', id);
    $.ajax({
        url : url+"your_students/ajax_get_students/"+id,
        type: "POST",
        dataType: "JSON",
        success: function(data)
        {
            // console.log(data);
            $('#student-submit').text("Save");
            $(form +' [name="s-login-name"]').val(data.student_login_name)
                        .attr('placeholder', data.student_login_name);
            $(form +' [name="s-school-id"]').val(data.school_id)
                        .attr('placeholder', data.school_id);
            $(form +' [name="s-full-name"]').val(data.student_full_name)
                        .attr('placeholder', data.student_full_name);
            $(form +' [name="s-subject"]').val(data.student_subjects);
            $(form +' [name="s-program"]').val(data.student_program);
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            // console.log("false");
            swal(textStatus+" "+errorThrown);
        }
    });
    $('#modal-update-student').addClass('md-show');
}

function submit_updated_student(url, form){
   var id =  $('#student-submit-update').attr('student-id');
    $('#student-submit-update').attr('student-id', id);
     var data = {
        'name': $(form +' [name="s-login-name"]').val(),
        'id': $(form +' [name="s-school-id"]').val(),
        'fname': $(form +' [name="s-full-name"]').val(),
        'program': $(form +' [name="s-program"]').val(),
        'subject': $(form +' [name="s-subject"]').val(),
    }
    
    $.ajax({
        url : url+"your_students/ajax_update_your_student/"+id,
        type: "POST",
        data: data,
        dataType: "JSON",
        success: function(data)
        {
            $('#modal-update-student').removeClass('md-show');
            swal("Successfullly Updated!", {
                icon: "success",
            });
            students_table.ajax.reload();
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal(textStatus+" "+errorThrown);
        }
    });
}
function close_modal(elem){
    $(elem).removeClass('md-show');
}

 function reset_add_student_form(form){
    $('#student-submit').attr('method', 'add');
    $('#modal-add-student .card-header').html('<h5>Default Password is "changeme"</h5> <span>They have to change it on first login.</span>');
    $(form +' [name="s-login-name"]').val("")
    .attr('placeholder', "Enter Student's Login Name");
    $(form +' [name="s-school-id"]').val("")
        .attr('placeholder', "Enter Student's School ID");
    $(form +' [name="s-full-name"]').val("")
        .attr('placeholder', "Enter Student's Full Name");
    $(form +' [name="s-program"]').val("1");
    $(form +' [name="s-subject"]').val('1');
    // console.log(data);
    
}

function _action(url, form){
    var data = {
        's-login-name': $(form +' [name="s-login-name"]').val(),
        's-school-id': $(form +' [name="s-school-id"]').val(),
        's-full-name': $(form +' [name="s-full-name"]').val(),
        's-program': $('[name="s-program"]').val()
    }; 
    $.ajax({
        url : url+"student_registration/add",
        type: "POST",
        data: data,
        dataType: "JSON",
        success: function(data)
        {
            swal("Successfullly Added!", {
                icon: "success",
            });
            $('#modal-add-student').removeClass('md-show');
            students_table.ajax.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal(textStatus+" "+errorThrown);
        }
    });
}