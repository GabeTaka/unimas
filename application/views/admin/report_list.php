<div class="content-wrapper">
  <div class="container-fluid">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-file-text"></i> Proposal Lists</h3>
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
                    <button style="width: 50%;" class="btn btn-info" onclick="location.href='<?php echo site_url('/applicant/createpdf/'.$info['info_id']); ?>'">View</button>
                <?php endforeach; ?>
            </table>
          </div>
        </div>
      </div>
  </div>
</div>
