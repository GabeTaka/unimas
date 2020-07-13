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
                <h3 class="panel-title"><i class="fa fa-file-text"></i> Pending Proposal Details</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr>
                        <th>NO <i class="fa fa-sort"></i></th>
                        <th>PROJECT ID <i class="fa fa-sort"></i></th>
                        <th>PROJECT NAME <i class="fa fa-sort"></i></th>
                        <th>PROJECT LOCATION <i class="fa fa-sort"></i></th>
                        <th>ORGANIZER <i class="fa fa-sort"></i></th>
                        <th>ACTION <i class="fa fa-sort"></i></th>
                      </tr>
                    </thead>
                    <?php $i=0; ?>
                    <?php foreach($info as $info) : ?>
                    <tbody>
                      <td class="custom-tbl"><?php echo ++$i;?></td>
                      <td class="custom-tbl">SULAM/USR-<?php echo ($info['info_id']); ?></td>
                      <td class="custom-tbl"><?php echo ($info['project_name']); ?></td>
                      <td class="custom-tbl"><?php echo ($info['project_location']); ?></td>
                      <td class="custom-tbl"><?php echo ($info['organizer']); ?></td>
                      <td>
                        <button class="btn btn-info" onclick="location.href='<?php echo site_url('/applicant/createpdf/'.$info['info_id']); ?>'">View</button>                        
                        <button class="btn btn-success accept" onclick="location.href='<?php echo site_url('/coordinator/update/'.$info['info_id']); ?>'">Approve</button>
                        <button class="btn btn-danger remove" onclick="location.href='<?php echo site_url('/coordinator/delete/'.$info['info_id']); ?>'">Reject</button>
                    </tbody>
                    <?php endforeach; ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("info_id");


        if(confirm('Are you sure to reject this record ?'))
        {
            $.ajax({
               url: '/coordinator/delete'+info_id,
               type: 'DELETE',
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+info_id).remove();
                    alert("Record reject successfully");  
               }
            });
        }
    });

    $(".accept").click(function(){
        var id = $(this).parents("tr").attr("info_id");


        if(confirm('Are you sure to approve this record ?'))
        {
            $.ajax({
               url: '/coordinator/update'+info_id,
               type: 'UPDATE',
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+info_id).remove();
                    alert("Record approve successfully");  
               }
            });
        }
    });


</script>
