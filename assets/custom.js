var subjects_table, lessons_table;
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


    // DATATABLES
    // $('#alt-pg-dt').DataTable({
    //     "pagingType": "full_numbers"
    // // });

    // var  dataset = ""; 
    // $.get("your_students/ajax_get", function(data, status){
    //    console.log(data);
    //   });
    var students_table = $('#alt-pg-test').DataTable({
        ajax: {
            url: "your_students/ajax_get",
            type: "post",
        },
        columns: [
            { "data": "student_id" },
            { "data": "school_id" },
            { "data": "student_login_name" },
            { "data": "student_full_name" },
            { "data": "student_program" },
            { "data": "student_subjects" }   
        ],
        pagingType: "full_numbers",
        responsive: true
    });

    lessons_table = $('#alt-pg-lessons').DataTable({
        ajax: {
            url: "lessons/ajax_get_lessons/ajax_get",
            type: "post",
        },
        columns: [
            { "data": "id" },
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
            { "data": "subject_id" },
            { "data": "subject_title" },
            { "data": "number_of_lessons" },
            { "data": "tools" }  
        ],
        pagingType: "full_numbers",
        responsive: true
    });

});

// SWEET ALERTS
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
            console.log(data);
            $.ajax({
                url : url+"delete",
                type: "POST",
                data: data,
                dataType: "JSON",
                success: function(data)
                {
                    console.log("true");
                    swal("Poof! "+subjc_name+" file has been deleted!", {
                        icon: "success",
                    });
                    subjects_table.ajax.reload();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    console.log("false");
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
            console.log(data.subject.subject_title);
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
      console.log(data);
    $.ajax({
        url : url+"update/"+id,
        type: "POST",
        data: data,
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
            swal("Updated!", {
                icon: "success",
            });
            subjects_table.ajax.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log("false");
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
              console.log(data);
            $.ajax({
                url : url+"subjects/add",
                type: "POST",
                data: data,
                dataType: "JSON",
                success: function(data)
                {
                    console.log(data);
                    swal(value+" Successfullly Added!", {
                        icon: "success",
                    });
                    subjects_table.ajax.reload();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    console.log("false");
                    swal(textStatus+" "+errorThrown);
                }
            });
          }
      });
}
// $('.open-modal').each(function (index, element) {
//     $(this).click(function (e) { 
//         e.preventDefault();
//         var method = $(this).attr('data');
//         var url = "";
//         if (method == "add") {
//             url = "<?php echo teacher_base('subjects/add/'); ?>";
//             $('#modal-form').attr('action', url);
//             $('#modal-form #subj-name').val("");
//             $('#modal-form-update').text(method);
//         }else if(method == "update"){
//             var id = $(this).attr('subj_id');
//             url = "<?php echo teacher_base('subjects/getbyid/'); ?>"+id;
//             $('#modal-form').attr('action', url);
//             $('#modal-form-update').text(method);
//             $.ajax({
//             url : url,
//             type: "POST",
//             dataType: "JSON",
//             success: function(data)
//             {
//                $('#modal-form #subj-name').val(data.subject.subject_title);
//             },
//             error: function (jqXHR, textStatus, errorThrown)
//             {
//                 alert(textStatus+" "+errorThrown);
//             }
//         });
//         url = "<?php echo teacher_base('subjects/update/'); ?>"+id;
//         $('#modal-form').attr('action', url);
//         }
//     });
// });

$( function() {
    $( "#draggablePanelList,#draggableMultiple,#draggableWithoutImg" ).sortable({
      revert: true,
      animation:150
    });
  } );
