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

     <table width='100%' style='border-collapse: collapse;'>
       <thead>
         <tr>
           <th width='50%'>Name</th>
           <th width='50%'>Email</th>
         </tr>
       </thead>
       <tbody>
       <?php 
       // User List
       foreach($users as $user){
         $id = $user['user_id'];
         $name = $user['user_name'];
         $email = $user['user_email'];

         echo "<tr>";
         echo "<td>
         <span class='edit' >".$name."</span>
         <input type='text' class='txtedit' data-id='".$id."' data-field='user_name' id='nametxt_".$id."' value='".$name."' >
         </td>";
         echo "<td>
         <span class='edit' >".$email."</span>
         <input type='text' class='txtedit' data-id='".$id."' data-field='user_email' id='emailtxt_".$id."' value='".$email."' >
         </td>";
         echo "</tr>";
       }
       ?>
       </tbody>
     </table>

     <!-- Script -->
     <script type="text/javascript">
     $(document).ready(function(){

       // On text click
       $('.edit').click(function(){
          // Hide input element
          $('.txtedit').hide();

          // Show next input element
          $(this).next('.txtedit').show().focus();

          // Hide clicked element
          $(this).hide();
       });

       // Focus out from a textbox
       $('.txtedit').focusout(function(){
          // Get edit id, field name and value
          var edit_id = $(this).data('user_id');
          var fieldname = $(this).data('field');
          var value = $(this).val();

          // assign instance to element variable
          var element = this;

          // Send AJAX request
          $.ajax({
            url: '<?= base_url() ?>index.php/users/updateuser',
            type: 'post',
            data: { field:fieldname, value:value, id:edit_id },
            success:function(response){

              // Hide Input element
              $(element).hide();

              // Update viewing value and display it
              $(element).prev('.edit').show();
              $(element).prev('.edit').text(value);
            }
          });
        });
      });
      </script>

   </body>
</html>