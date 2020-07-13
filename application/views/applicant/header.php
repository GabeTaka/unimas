<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>UNIMAS Service Learning</title>
  <!-- Bootstrap core CSS-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
  <!-- Page level plugin CSS-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/datatables/dataTables.bootstrap4.css">
  <!-- Custom styles for this template-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/unimas.css">
  <!-- Bootstrap core JavaScript-->
  <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"><\/script>')</script>
  <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"><\/script>')</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" ></script>
  <!-- Core plugin JavaScript-->
  <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"><\/script>')</script>

  <!-- Page level plugin JavaScript-->
  <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"><\/script>')</script>
  <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"><\/script>')</script>
  <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.js') ?>"><\/script>')</script>

  <!-- Custom scripts for all pages-->
  <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/js/sb-admin.min.js') ?>"><\/script>')</script>

  <!-- Custom scripts for this page-->
  <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/js/sb-admin-datatables.min.js') ?>"><\/script>')</script>
  <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/js/sb-admin-charts.min.js') ?>"><\/script>')</script>


</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">UNIMAS Service Learning</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="<?php echo base_url(); ?>applicant/index" >
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="<?php echo base_url(); ?>applicant/create" >
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Create Proposal</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-gear"></i>
            <span class="nav-link-text">Setting</span>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('/users/logout/'); ?>">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>UNIMAS Service Learning &copy; 2016</small>
        </div>
      </div>
    </footer>

