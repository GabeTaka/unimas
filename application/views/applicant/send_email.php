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
                <h3 class="panel-title"><i class="fa fa-envelope"></i> Send Email to Coordinator</h3>
              </div>
                  <form method="post" action="<?php echo base_url(); ?>applicant/send" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label>From: </label>
                  <input type="email" name="from" class="form-control" placeholder="Enter Your Email Address" required />
                </div>
                <div class="form-group">
                  <label>Password: </label>
                  <input type="password" name="email_password" class="form-control" placeholder="Enter Your Email Password" required />
                </div>
                <div class="form-group">
                  <label>To:</label>
                  <input type="email" name="to" class="form-control" placeholder="Enter Receiver Email Address" required />
                </div>
                <div class="form-group">
                  <label>Subject: </label>
                  <input type="text" name="subject" placeholder="Enter a Subject" class="form-control" required />
                </div>
                <div class="form-group">
                  <label>Enter Additional Information :</label>
                  <textarea name="body" placeholder="Enter Additional Information" class="form-control" required rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label>Select Your Resume</label>
                  <input type="file" name="resume" accept=".doc,.docx, .pdf" required />
                </div>
              </div>
            </div>
            <div class="form-group" align="center">
              <input type="submit" name="submit" value="Submit" class="btn btn-info" />
            </div>
          </form>
            </div>
          </div>
        </div>