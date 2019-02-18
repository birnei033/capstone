var subjects_table, lessons_table, students_table;

function update_student_trashed(json){
    $('#student_trashed').html("");
    if (json.trashed.length != 0) {
        json.trashed.forEach(e => {
            var out = "";
            out  += '<li class="list-group-item ">';
            out  +=    e.student_login_name;
            out  +=    '<button  student_id="'+e.student_id+'" onclick="student_trashed_action($(this), \'delete\')"  class="btn btn-danger btn-outline-danger float-right p-1"><i class="ti-trash"></i></button>';
            out  +=    '<button onclick="student_trashed_action($(this))"  student_id="'+e.student_id+'" id="undo" class="btn btn-inverse btn-outline-inverse float-right mr-1 p-1"><i class="ti-control-backward"></i></button>';
            out  += '</li>';
            $('#student_trashed').append(out);
        });
    }
}

function update_subject_trashed(json){
    $('#subject-trashed').html("");
    $('#badge-trashed-subject-count').text(json.trashed.length);
    if (json.trashed.length != 0) {
        json.trashed.forEach(e => {
            var out = "";
            out  += '<li class="list-group-item ">';
            out  +=    e.subject_title;
            out  +=    '<button  trashed_id="'+e.subject_id+'" onclick="subject_trashed_action($(this), \'delete\')"  class="btn btn-danger btn-outline-danger float-right p-1"><i class="ti-trash"></i></button>';
            out  +=    '<button onclick="subject_trashed_action($(this))"  trashed_id="'+e.subject_id+'" id="undo" class="btn btn-inverse btn-outline-inverse float-right mr-1 p-1"><i class="ti-control-backward"></i></button>';
            out  += '</li>';
            $('#subject-trashed').append(out);
        });
    }
}
jQuery(document).ready(function ($) {
    var url = location.href;
    // console.log(url);
    
    $('nav ul.pcoded-item li  a').each(function (index, element) {
        // console.log(this.pathname);
        
        if (this.href.replace(/\/|#.*$/g,"") == url.replace(/\/|#.*$/g,"")) {
            $(this).parent().addClass('active');
            if ($(this).parent().parent().parent().hasClass('pcoded-hasmenu')) {
                $(this).parent().parent().parent().addClass('active pcoded-trigger');
            }
        }
    });
    $(".select-programs").select2();
    students_table = $('#alt-pg-test').DataTable({
        initComplete: function(settings, json) {
            console.log(json.trashed);
            $('#badge-trash-count').text(json.trashed.length);
            update_student_trashed(json);
            $('[data-toggle="tooltip"]').tooltip(); 
            var elem = $('#sel').html();
            var sear = $('#sear').html();
            $('#sel').remove(); $('#sear').remove();
            $('#select-subject').html('<div class="row m-0"><div class="col-sm-4 text-right" style="padding-top: 7px;">Your Subject:</div><div class="col-sm-8">'+elem+'</div></div>');
            $('#search-box').html(sear);
            students_table.search($('#filter-by-subject option:selected').val()).draw();
            
            $('#filter-by-subject').change(function (e) { 
                e.preventDefault();
                students_table.search($('#filter-by-subject option:selected').val()).draw();
                console.log($('#filter-by-subject option:selected').val());
            });
            $('#searchit').on('input',function (e) { 
                e.preventDefault();
                students_table.search($('#filter-by-subject option:selected').val()+' '+$(this).val()).draw();
            });  
        },
        language: {
            infoFiltered: ""
        },
          dom: '<"row"<"#search-box.col-sm-6" ><"#select-subject.col-sm-6" >>t<"row"<"col-sm-6"i><"col-sm-6"p>>',
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
            var elem = $('#lessonsel').html();
            var sear = $('#lessonsear').html();
            $('#lessonsel').remove(); $('#lessonsear').remove();
            $('#lesson-select-subject').html('<div class="row m-0"><div class="col-sm-4 text-right" style="padding-top: 7px;">Your Subject:</div><div class="col-sm-8">'+elem+'</div></div>');
            $('#lesson-search-box').html(sear);
            lessons_table.search($('#lesson-filter-by-subject option:selected').val()).draw();

            $('#lesson-filter-by-subject').change(function (e) { 
                e.preventDefault();
                lessons_table.search($('#lesson-filter-by-subject option:selected').val()).draw();
                // console.log($('#lesson-filter-by-subject option:selected').val());
            });
            $('#lesson-searchit').on('input',function (e) { 
                e.preventDefault();
                lessons_table.search($('#lesson-filter-by-subject option:selected').val()+' '+$(this).val()).draw();
            });
          },
          dom: '<"row"<"#lesson-search-box.col-sm-6" ><"#lesson-select-subject.col-sm-6" >>t<"row"<"col-sm-6"i><"col-sm-6"p>>',
        ajax: {
            url: "lessons/ajax_get_lessons/ajax_get",
            type: "post",
        },
        columns: [
            // { "data": "id" },
            { "data": "lesson_title" },
            // { "data": "lesson_author" },
            { "data": "subject" },
            { "data": "tool" }   
        ],
        pagingType: "full_numbers",
        responsive: true
    });

     subjects_table = $('#subjects-table').DataTable({
        initComplete: function(settings, json) {
            $('[data-toggle="tooltip"]').tooltip();
            // console.log(json);
           
            update_subject_trashed(json);
        },
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

function subject_trashed_action(btn, action = 'update'){
    var id = btn.attr('trashed_id');
    var url = location.pathname;
    switch (action) {
        case 'update':
            console.log('you want to update');
            var data = {
                data_type: "ajax",
                subj_id: id
            };
                $.ajax({
                    type: "POST",
                    url : url+"/retrieve",
                    data: data,
                    dataType: "JSON",
                    success: function (response) {
                        subjects_table.ajax.reload(function(json){
                            update_subject_trashed(json);
                        });
                    }
                });
            break;
    case 'delete':
    // console.log('you want to delete');
                swal({
                    title: "Warning!",
                    text: "Once deleted, all students, exercises and lessons related to this subject will also be deleted!",
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
                            url : url+"/delete",
                            type: "POST",
                            data: data,
                            dataType: "JSON",
                            success: function(data)
                            {
                                swal("Success!", {
                                    icon: "success",
                                });
                                subjects_table.ajax.reload(function(json){
                                    update_subject_trashed(json);
                                });
                            },
                            error: function (jqXHR, textStatus, errorThrown)
                            {
                                swal(textStatus+" "+errorThrown);
                            }
                        });
                    
                    }
                });
            break;
        default:
            break;
    }
}

function student_trashed_action(btn, action = 'update'){
    // console.log(action);
    switch (action) {
        case 'delete':
        swal('Delete permanently?',{
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((result)=>{
            if (result) {
                $.ajax({
                    type: "GET",
                    url: location.pathname+'/ajax_delete/?id='+btn.attr('student_id')+'&data_type=ajax',
                   //  data: "data",
                    dataType: "JSON",
                    success: function (response) {
                        // console.log(response);
                        students_table.ajax.reload(function(json){
                           $('#badge-trash-count').text(json.trashed.length);
                           update_student_trashed(json);
                       });
                    }
                });
            }
        })
            break;
        case 'update':
            $.ajax({
                type: "GET",
                url: location.pathname+'/ajax_retrieve/?id='+btn.attr('student_id')+'&data_type=ajax',
               //  data: "data",
                dataType: "JSON",
                success: function (response) {
                    // console.log(response);
                    students_table.ajax.reload(function(json){
                    //    console.log(json.trashed);
                       $('#badge-trash-count').text(json.trashed.length);
                       update_student_trashed(json);
                   });
                }
            });
            break;
        default:
            break;
    }
    
}
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
                    students_table.ajax.reload(function(json){
                        // console.log(json.trashed);
                        $('#badge-trash-count').text(json.trashed.length);
                        update_student_trashed(json);
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

function delete_subject(id, url, subjc_name){
    // swal({
    //     // title: "Are you sure?",
    //     text: "Once deleted, all students related to this subject will be deleted!",
    //     icon: "warning",
    //     buttons: true,
    //     dangerMode: true,
    //   })
    //   .then((willDeleted) => {
    //     if (willDeleted) {
            var data = {
                data_type: "ajax",
                subj_id: id
            };
            $.ajax({
                url : url+"trash",
                type: "POST",
                data: data,
                dataType: "JSON",
                success: function(data)
                {
                    swal(subjc_name+" sent to trash!", {
                        icon: "success",
                    });
                    subjects_table.ajax.reload(function(json){
                        update_subject_trashed(json);
                    });
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    swal(textStatus+" "+errorThrown);
                }
            });
         
    //     }
    //   });
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
                    var message = "", icon = "";
                    // console.log(data);
                    if (data.title_existed == 0) {
                        message = "successfullly Added!";
                        icon = "success";
                    }else{
                        message = "title already exist.";
                        icon = "error";
                    }
                    swal(value+" "+message, {
                        icon: icon,
                    });
                    subjects_table.ajax.reload();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    // console.log("false");
                    swal(textStatus+" "+errorThrown);
                }
            });
          }else{
            swal("No subject added.", {
                icon: 'info',
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
                    students_table.ajax.reload();
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
function open_lesson_modal_update_subject(elem, id){
    $(elem).addClass('md-show');
    $('#student-submit-subject_title').attr('subject_id', id);
}

function submit_lesson_update_subject(url){
    var id = $('#student-submit-subject_title').attr('subject_id');
    var data = {
        'subject_id': $('[name="s-subject"]').val(),
        dataType: "ajax"
    };
    console.log(data);
    
    $.ajax({
        url : url+"lessons/ajax_update_subject/"+id,
        type: "POST",
        data: data,
        dataType: "JSON",
        success: function(data)
        {
            $('#modal-add-subject').removeClass('md-show');
            swal("Successfullly Updated!", {
                icon: "success",
            });
            lessons_table.ajax.reload();
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal(textStatus+" "+errorThrown);
        }
    });   
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
    // $(form +' [name="s-program"]').val("1");
    // $(form +' [name="s-subject"]').val('1');
    // console.log(data);
    
}

function _action(url, form){
    var data = {
        's-login-name': $(form +' [name="s-login-name"]').val(),
        's-school-id': $(form +' [name="s-school-id"]').val(),
        's-full-name': $(form +' [name="s-full-name"]').val(),
        's-program': $(form +' [name="s-program"]').val(),
        's-subject': $(form +' [name="s-subject"]').val()
    }; 
    console.log(data);
    
    $.ajax({
        url : url+"student_registration/add",
        type: "POST",
        data: data,
        dataType: "JSON",
        success: function(data)
        {
            swal(data.message, {
                icon: data.icon,
            });
            if (data.icon != "error") {
                $('#modal-add-student').removeClass('md-show');
                students_table.ajax.reload();   
            }
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            swal(textStatus+" "+errorThrown);
        }
    });
}
