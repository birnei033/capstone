class Section{
    constructor(layout = 1){
        this.layout = layout;
    }

}
jQuery(document).ready(function ($) {
    CKEDITOR.replace( 'editor', {
        height: 400
    } );
    CKEDITOR.on('dialogDefinition', function(e) {
        dialogeNAme = e.data.name;
        dialogeDefinition = e.data.definition;
        console.log(dialogeDefinition);
        if(dialogeNAme == 'image'){
            dialogeDefinition.removeContents('Link');
            dialogeDefinition.removeContents('advanced');
            var tabContent = dialogeDefinition.getContents('info');
            tabContent.remove('txtHSpace');
            tabContent.remove('txtVSpace');
            tabContent.remove('txtAlt');
            console.log(tabContent.get('htmlPreview').html)
            // tabContent.get('htmlPreview');
            // tabContent.get('htmlPreview').html = '<div>Preview<br><div id="cke_156_ImagePreviewLoader" class="ImagePreviewLoader" style="display:none"><div class="loading">&nbsp;</div></div><div class="ImagePreviewBox"><table><tr><td><a href="javascript:void(0)" target="_blank" onclick="return false;" id="cke_157_previewLink"><img id="cke_158_previewImage" alt="" /></a>h</td></tr></table></div></div>';
        }
    })
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