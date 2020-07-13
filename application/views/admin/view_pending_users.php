<div class="content-wrapper">
  <div class="container-fluid">
  <?php

          if($this->session->flashdata("message"))
          {
            echo "
            <div class='alert alert-success'>
              ".$this->session->flashdata("message")."
            </div>
            ";
          }
          ?>
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-users"></i>Pending User Details</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr>
                        <th>NO <i class="fa fa-sort"></i></th>
                        <th>NAME <i class="fa fa-sort"></i></th>
                        <th>EMAIL <i class="fa fa-sort"></i></th>
                        <th>USERNAME <i class="fa fa-sort"></i></th>
                        <th>ACTION <i class="fa fa-sort"></i></th>
                      </tr>
                    </thead>
                     <?php $i=0; ?>
                    <?php foreach($users as $users) : ?>
                    <tbody>
                      <td class="custom-tbl"><?php echo ++$i;?></td>
                      <td class="custom-tbl"><?php echo ($users['name']); ?></td>
                      <td class="custom-tbl"><?php echo ($users['email']); ?></td>
                      <td class="custom-tbl"><?php echo ($users['username']); ?></td>
                      <td>
                        <button class="btn btn-success approve" onclick="location.href='<?php echo site_url('/admin/update/'.$users['id']); ?>'">Approve</button>
                        <button class="btn btn-danger delete" onclick="location.href='<?php echo site_url('/admin/delete/'.$users['id']); ?>'">Reject</button>
                    </tbody>
                    <?php endforeach; ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
<script type="text/javascript">
    $(".delete").click(function(){
        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to remove this User ?'))
        {
            $.ajax({
               url: '/admin/delete'+id,
               type: 'DELETE',
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert("User is removed successfully");  
               }
            });
        }
    });

    $(".approve").click(function(){
        var id = $(this).parents("tr").attr("id");


        if(confirm('Are you sure to approve this User ?'))
        {
            $.ajax({
               url: '/admin/update'+id,
               type: 'UPDATE',
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert("User is approved successfully");  
               }
            });
        }
    });


</script>