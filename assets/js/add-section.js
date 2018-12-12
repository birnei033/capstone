class Section{
    constructor(layout = 1){
        this.layout = layout;
    }

}
jQuery(document).ready(function ($) {
    CKEDITOR.replace( 'editor', {
        height: 400
    } );
});
// CKEDITOR.replace( 'editor' );

function addSection(appendTo){
    var section = '<div class="sortable-moves card-sub ui-sortable-handle" style="position: relative; left: 0px; top: 0px;">'
    +'<div class="row">'
        +'<div class="col-sm-12">'
            +'<span>Number of Column</span>'
            +'<select class="form-control" name="num-of-column">'
            +'<option value="1">1</option>'
            +'<option value="2">2</option>'
            +'<option value="3">3</option>'
            +'<option value="4">4</option>'
            +'</select>'
        +'</div>'
    +'</div>'
    // +'<h5 class="card-title">Multiple list 1</h5>'

    // +
    +'</div>';
    $(appendTo).append(section);
}
// trigger on select
function numberOfColumn(selectElement){
    var columnCount =  $(selectElement).val();
    var column = "";
    switch (columnCount) {
        case 1:
            column = '<div class="col-sm-12">'
                    + '</div>'
            break;
        case 2:
        
        break;

        case 3:
            
        break;
    
        case 4:
            
        break;
    
        default:
            break;
    }
}