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
</head>
  <!-- Bootstrap core JavaScript-->
    <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"><\/script>')</script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js') ?>"><\/script>')</script>

    <!-- Core plugin JavaScript-->
    <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/jquery-easing/jquery.easing.min.js') ?>"><\/script>')</script>

    <!-- Page level plugin JavaScript-->
    <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"><\/script>')</script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"><\/script>')</script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.js') ?>"><\/script>')</script>
    
    <!-- Custom scripts for all pages-->
    <script>window.jQuery || document.write('<script src="<?php echo base_url('js/sb-admin.min.js') ?>"><\/script>')</script>
    
    <!-- Custom scripts for this page-->
    <script>window.jQuery || document.write('<script src="<?php echo base_url('js/sb-admin-datatables.min.js') ?>"><\/script>')</script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url('js/sb-admin-charts.min.js') ?>"><\/script>')</script>
<?php echo validation_errors(); ?>
<form action="<?=base_url('resetpassword')?>" method="post">
<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Reset Password</div>
      <div class="card-body">
        <div class="text-center mt-4 mb-5">
          <h4>Forgot your password?</h4>
          <p>Enter your email address and we will send you instructions on how to reset your password.</p>
        </div>
        <form>
          <div class="form-group">
            <input class="form-control" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email address">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url('users/login')?>">Login</a>
      </div>
      </div>
    </div>
  </div>
</form>