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
    <body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">UNIMAS Service Learning</a>
  </nav>


<?php echo form_open('users/register'); ?>
<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <?php echo validation_errors(); ?>
        <form>
          <div class="form-group">
                <label for="exampleInputName">Name</label>
                <input class="form-control" name="name" id="exampleInputName" type="text" aria-describedby="nameHelp" placeholder="Enter full name">
              </div>
              <div class="form-group">
                <label for="exampleInputLastName">Username</label>
                <input class="form-control" name="username" id="exampleInputLastName" type="text" aria-describedby="nameHelp" placeholder="Enter username">
            </div>
          <div class="form-group">
		<label for="usertype">User Type</label>
      <select class="form-control" id="usertype" name="usertype">
        <option value="2">Applicant</option>
        <option value="3">Coordinator</option>
      </select>
	</div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" name="email" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input class="form-control" name="password" id="exampleInputPassword1" type="password" placeholder="Password">
              </div>
              <div class="col-md-6">
                <label for="exampleConfirmPassword">Confirm password</label>
                <input class="form-control" name="password2" id="exampleConfirmPassword" type="password" placeholder="Confirm password">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="<?php echo base_url('users/login')?>">Login</a>
      </div>
      </div>
    </div>
  </div>
<?php echo form_close(); ?>