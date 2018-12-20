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

    var lessons_table = $('#alt-pg-lessons').DataTable({
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

    var subjects_table = $('#subjects-table').DataTable({
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

$( function() {
    $( "#draggablePanelList,#draggableMultiple,#draggableWithoutImg" ).sortable({
      revert: true,
      animation:150
    });
  } );
