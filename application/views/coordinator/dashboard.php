
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Coordinator Dashboard</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="mr-5"><?php echo $totalFormsNo; ?> Approved Proposals</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('/coordinator/view_proposals/'); ?>">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="mr-5"><?php echo $totalPendingFormsNo; ?> Pending Proposals</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('/coordinator/view_pending_proposals/'); ?>">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="mr-5"><?php echo $totalProposalLog; ?> Proposal Log</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('/coordinator/report_list/'); ?>">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="mr-5"><?php echo $totalProposal; ?> Proposal Lists</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="<?php echo site_url('/coordinator/view_proposal_list/'); ?>">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>UNIMAS Service Learning &copy; 2016</small>
        </div>
      </div>
    </footer>
   
  </div>
</body>

</html>
