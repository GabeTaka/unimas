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
                <h3 class="panel-title"><i class="fa fa-file-text"></i> Proposal Log</h3>
              </div>
              <div class="panel-body">
                <div class="table-responsive">
                  <table class="table table-bordered table-hover table-striped tablesorter">
                    <thead>
                      <tr>
                        <th>NO <i class="fa fa-sort"></i></th>
                        <th>EXECUTE BY <i class="fa fa-sort"></i></th>
                        <th>ACTION <i class="fa fa-sort"></i></th>
                        <th>TIME EXECUTE <i class="fa fa-sort"></i></th>
                      </tr>
                    </thead>
                     <?php $i=0; ?>
                    <?php foreach ($div as $users_item): ?>
                    <tbody>
                      <td class="custom-tbl"><?php echo ++$i;?></td>
                      <td><?php echo $users_item['spesificID']; ?></td>
                      <td><?php echo $users_item['action']; ?></td> 
                      <td><?php echo $users_item['time_execute']; ?></td> 
                      <td>
                    </tbody>
                    <?php endforeach; ?>
                  </table>
                </div>
              </div>
            </div>
<script>
  $(document).ready(function() {
   $('#userInfo').DataTable( {
    scrollY:        '50vh',
    scrollCollapse: true,
    pagingType: "full_numbers"

  } );

 } );
</script>
 <script type="text/javascript">
  $(".remove").click(function(){
    var id = $(this).parents("tr").attr("id");


    if(confirm('Are you sure to remove this record ?'))
    {
      $.ajax({
       url: '/users/delete/'.$users_item['id'],
       type: 'DELETE',
       error: function() {
        alert('Something is wrong');
      },
      success: function(data) {
        $("#"+id).remove();
        alert("Record removed successfully");  
      }
    });
    }
  });


</script>

</tbody>
</table> </div>
          </div>
        </div>
