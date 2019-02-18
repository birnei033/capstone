<div class="md-modal md-effect-1" style="z-index:1001" id="trash-bin">
    <div class="md-content">
        <div class="card p-0">
            <div class="card-header p-1 pl-4 pr-2">
                <h5>Trash bin</h5>
                <a class=" float-right md-close mt-1" style="cursor:pointer;" ><i class="ti-close bg-danger p-1"></i></a>
            </div>
            <div class="card-block cards" style="min-height: 250px">
            <div class="table-responsive">
                <table id="trashed" class="table table-hover">
                    <!-- <thead>
                        <th>Title</th> -->
                        <!-- <th></th> -->
                    <!-- </thead> -->
                    <tbody id="trashed-item">
                    <?php $count = count($trashed);
                        foreach ($trashed as $item) { ?>
                            <tr>
                                <td class="p-1">
                                    <?php echo $item->ex_name ?>
                                    <button  <?php echo tooltip('Delete permanently') ?> id="delete-permanent" lesson_id="<?php echo $item->id ?>"  onclick="delete_permanently($(this))" class="btn btn-danger btn-outline-danger float-right p-1"><i class="ti-trash"></i></button>
                                    <button onclick="load_trashed($(this))" <?php echo tooltip('Recover') ?> lesson_id="<?php echo $item->id ?>"  class=" undo btn btn-inverse btn-outline-inverse float-right mr-1 p-1"><i class="ti-control-backward"></i></button>
                                </td>
                                <!-- <td></td> -->
                            </tr>
                        
                       <?php }

                    ?>
                    </tbody>
                </table>
            </div>
            </div>
            <div class="card-footer bg-danger text-right">
                    <!-- <button class="btn btn-success btn-outline-success" id="ex-set-date-time-submit" type="button">Set</button> -->
                    <!-- <button type="button" class="btn btn-danger btn-outline-danger waves-effect md-close">Cancel</button> -->
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
            });
        function load_trashed(elem){
         
            var data = {
                    'undo': 'undo',
                    'id': elem.attr('lesson_id')
            };
            $.ajax({
                type: "POST",
                url: location.pathname,
                data: data,
                dataType: "JSON",
                success: function (response) {
                    // console.log(response);
                    if (response.undo == true) {
                        ex_list.ajax.reload();
                        swal('',{icon: 'success'});
                        $.ajax({
                            type: "GET",
                            url: location.pathname+"get_trashed_exerceercises",
                            // data: "data",
                            dataType: "JSON",
                            success: function (response) {
                                // console.log(response);
                                var l = response.trashed.length;
                                $('#trashed-item').html("");
                                response.trashed.forEach(e => {
                                    // console.log(e);
                                    var out = "";
                                    out  += '<tr>';
                                    out  += '<td class="p-1">';
                                    out  +=    e.ex_name;
                                    out  +=    '<button  <?php echo tooltip("Delete permanently") ?> lesson_id="'+e.id+'" onclick="delete_permanently($(this))"  class="btn btn-danger btn-outline-danger float-right p-1"><i class="ti-trash"></i></button>';
                                    out  +=    '<button onclick="load_trashed($(this))" <?php echo tooltip("Recover") ?> lesson_id="'+e.id+'" id="undo" class="btn btn-inverse btn-outline-inverse float-right mr-1 p-1"><i class="ti-control-backward"></i></button>';
                                    out  += '</td>';
                                    out  += '</tr>';
                                    $('#trashed-item').append(out);
                                    $('[data-toggle="tooltip"]').tooltip(); 
                                });
                                $('#badge-trash-count').text(l);
                            }
                        });
                    }
                }
            });
        }
        function delete_permanently(elem){
            var data = {
                    'delete_permanent': 'delete_permanent',
                    'id': elem.attr('lesson_id')
            };
            $.ajax({
                type: "POST",
                url: location.pathname,
                data: data,
                dataType: "JSON",
                success: function (response) {
                    // console.log(response);
                    swal('OK',{
                        icon: 'success'
                    }).then((val)=>{
                        $.ajax({
                            type: "GET",
                            url: location.pathname+"get_trashed_exerceercises",
                            // data: "data",
                            dataType: "JSON",
                            success: function (response) {
                                // console.log(response);
                                var l = response.trashed.length;
                                $('#trashed-item').html("");
                                response.trashed.forEach(e => {
                                    // console.log(e);
                                    var out = "";
                                    out  += '<tr>';
                                    out  += '<td class="p-1">';
                                    out  +=    e.ex_name;
                                    out  +=    '<button  <?php echo tooltip("Delete permanently") ?> lesson_id="'+e.id+'" onclick="delete_permanently($(this))"  class="btn btn-danger btn-outline-danger float-right p-1"><i class="ti-trash"></i></button>';
                                    out  +=    '<button onclick="load_trashed($(this))" <?php echo tooltip("Recover") ?> lesson_id="'+e.id+'" id="undo" class="btn btn-inverse btn-outline-inverse float-right mr-1 p-1"><i class="ti-control-backward"></i></button>';
                                    out  += '</td>';
                                    out  += '</tr>';
                                    $('#trashed-item').append(out);
                                    $('[data-toggle="tooltip"]').tooltip(); 
                                });
                                $('#badge-trash-count').text(l);
                            }
                        });
                    });
                }
            });
        }
            </script>