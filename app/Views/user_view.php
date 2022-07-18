<?php
// defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
   <head>
     <meta charset="utf-8">
     <title>TT GLOBAL</title>

     <!-- jQuery library -->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

     <style type="text/css">
     .txtedit{
        display: none;
        width: 98%;
     }
     </style>
   </head>
   <body>

     
       <table class="table table-bordered table-responsive-md table-striped text-center">
        <thead>
          <tr>
          <th width='50%'>ID</th>
          <th width='50%'>Name</th>
           <th width='50%'>Email</th>
          </tr>
        </thead>
        <?php if($users): ?>
          <?php foreach($users as $user):?>
        <tbody>
          <tr>
            <td class="pt-3-half" contenteditable="true"><?=  $user['user_id']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['user_name']; ?></td>
            <td class="pt-3-half" contenteditable="true"><?=  $user['user_email']; ?></td>
          </tr>
          <?php endforeach; ?>
         <?php endif; ?>
        </tbody>
      </table>
     