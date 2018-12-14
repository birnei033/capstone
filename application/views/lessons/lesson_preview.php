    <script>
        jQuery(document).ready(function ($) {
            $('#page-title').text('Lessons Test Only');
        });
    </script>
 
                        <!-- <h1 class="page-header">Lessons</h1> -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Lesson List
                        
                    </div>
                    <!-- /.panel-heading -->
                    <div class="card-block">
                        <?php echo $preview; ?>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <button data-modal="modal-2" data="add" class="btn btn-primary waves-effect md-trigger open-modal">
                        Add Lesson
                    </button>
            </div>
        </div>
  
        