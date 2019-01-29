
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/themf/bower_components/jquery/js/jquery.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
            <ul id="menu">
            </ul>
            </div>
            <div class="col-sm-8"></div>
        </div>
        <h4 class="title"></h4>
        <div class="body">
            <p class="content"></p>
        </div>
    </div>
<footer>
    <script>
        $(document).ready(function () {
            $.ajax({
                type: "GET",
                url: "http://localhost/ignite/api/tester/test",
                // data: "data",
                dataType: "JSON",
                success: function (r) {
                    console.log(r.results);
                    var result = r.results;
                    var result_count = result.length;
                    // for (let index = 0; index < result_count; index++) {
                    //     var out = '<li><a href="<?php echo api_base()?>tester/view_test'+result[index]._links.webui+'">'+result[index].title+'</a></li>';
                    //     $('#menu').append(out);
                    // }
                    
                }
            });
        });
    </script>
</footer>
</body>
</html>