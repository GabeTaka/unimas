<div class="content-wrapper">
  <div class="container-fluid">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-users"></i>Verified User Details</h3>
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
            <?php if ('approved_users') : ?>
              <?php $i=0; ?>
              <?php foreach($users as $users) : ?>
                <tbody>
                  <td class="custom-tbl"><?php echo ++$i;?></td>
                      <td class="custom-tbl"><?php echo ($users['name']); ?></td>
                      <td class="custom-tbl"><?php echo ($users['email']); ?></td>
                      <td class="custom-tbl"><?php echo ($users['username']); ?></td>
                  <td>
                    <button style="width: 50%;" type="button" class="btn btn-danger">Delete</button>
                  </tbody>
                <?php endforeach; ?>
              <?php endif; ?>
            </table>
          </div>
        </div>
      </div>
  </div>
</div>