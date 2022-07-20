<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
  <h2 style="text-align: center;">INVOICE</h2>
  <div class="panel panel-primary">
    <div class="panel-heading">
        Generate PDF in Codeigniter 4
        <a href="<?php echo base_url('generate-pdf') ?>" class="btn btn-info pull-right" style="margin-top:-7px">
        Download PDF
      </a>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                </tr>
            </thead>
            <tbody>
            <?php
                if(count($students) > 0){
                    foreach($students as $index => $student){
                        ?>
                        <tr>
                            <td><?= $student->id ?></td>
                            <td><?= $student->name ?></td>
                            <td><?= $student->email ?></td>
                            <td><?= $student->mobile ?></td>
                        </tr>
                        <?php
                    }
                }
            ?>
            </tbody>
        </table>
    </div>
  </div>
</div>

</body>
</html>