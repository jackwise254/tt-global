<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=yes">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.12/snippets/javascript.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url('/css/bootstrap.min.css'); ?>" >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    <script src="<?php echo base_url('/js/jquery.min.js'); ?>"></script>
    <script src="<?php echo base_url('/js/popper.min.js'); ?>"></script>
    <script src="<?php echo base_url('/js/bootstrap.min.js'); ?>"></script>
    <title>TT GLOBAL</title>
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-4 mb-4">Invoice</h2>
        <span id="message"></span>
        <div class="card">
            <div class="card-header"></div>
            <div class="card-body">
                <div class="row justify-content-md-center">
                    <div class="col col-lg-6">
                        <div class="form-group">
                            <select name="type" id="type" class="form-control input-lg">
                                <option value="">Select type</option>
                                <?php
                                foreach($masterlist as $row)
                                {
                                    echo '<option value="'.$row["id"].'">'.$row["type"].'</option>';
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="hdd" id="hdd" class="form-control input-lg">
                                <option value="">Select hdd</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select name="gen" id="gen" class="form-control input-lg">
                                <option value="">Select gen</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 
</body>
</html>

<script>

$(document).ready(function(){

    $('#type').change(function(){

        var id = $('#type').val();

        var action = 'get_type';

        if(id != '')
        {
            $.ajax({
                url:"<?php echo base_url('/ProductCrud/action'); ?>",
                method:"POST",
                data:{id:id, action:action},
                dataType:"JSON",
                success:function(data)
                {
                    var html = '<option value="">Select hdd</option>';

                    for(var count = 0; count < data.length; count++)
                    {

                        html += '<option value="'+data[count].id+'">'+data[count].hdd+'</option>';

                    }

                    $('#hdd').html(html);
                }
            });
        }
        else
        {
            $('#hdd').val('');
        }
        $('#gen').val('');
    });

    $('#hdd').change(function(){

        var hdd_id = $('#hdd').val();

        var action = 'get_gen';

        if(state_id != '')
        {
            $.ajax({
                url:"<?php echo base_url('/ProductCrud/action'); ?>",
                method:"POST",
                data:{state_id:state_id, action:action},
                dataType:"JSON",
                success:function(data)
                {
                    var html = '<option value="">Select gen</option>';

                    for(var count = 0; count < data.length; count++)
                    {
                        html += '<option value="'+data[count].id+'">'+data[count].gen+'</option>';
                    }

                    $('#gen').html(html);
                }
            });
        }
        else
        {
            $('#gen').val('');
        }

    });

});

</script>