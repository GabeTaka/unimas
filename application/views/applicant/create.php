<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<style type="text/css">
  #signup-step {
                margin:auto;
                padding:0;
            }

    #signup-step li {
                list-style:none; 
                float:left;
                padding:5px 10px;
                border-top:#004C9C 1px solid;
                border-left:#004C9C 1px solid;
                border-right:#004C9C 1px solid;
                border-radius:5px 5px 0 0;
            }
    #signup-step li.active {
                background-color:#AED6F1 ;
            }
</style>
<div class="content-wrapper">
    <div class="container-fluid">
<?php echo validation_errors(); ?>
<form action="add" method="post" enctype="multipart/form-data" name="add_name" id="add_name" class="container-fluid" style="height: 100px;">
  <?php echo validation_errors(); ?>
    <div class="form-group">
    <label>
    <ul id="signup-step">
            <li id="info" class="active">1. Project Info</li>
            <li id="description">2. Project Description</li>
            <li id="sdg">3. SDG</li>
            <li id="milestone">4. Project Milestone</li>
            <li id="target">5. Target Groups</li>
            <li id="members">6. Project Members</li>
            <li id="budget">7. Project Budget</li>
<!--             <li id="sustainability">Program Sustainability</li> -->
    </ul>
  </label>
  </div>

  <div id="info-field" class="form-group">
    <h2>PROJECT INFO</h2>
    <div class="row">
      <div class="col-md-5">
        <div class="form-group">
          <label>Project Name:</label>
          <input type="text" class="form-control" name="project_name" id="project_name">
        </div>
        <div class="form-group">
          <label>Course Code & Name:</label>
          <input type="text" class="form-control" name="course_code" id="course_code">
        </div>
        <div class="form-group">
          <label>Organizer:</label>
          <input type="text" class="form-control" name="organizer" id="organizer">
        </div>
        <div class="form-group">
          <label>Co-Organizer:</label>
          <input type="text" class="form-control" name="co_organizer" id="co_organizer">
        </div>
        <div class="form-group">
        <label>Sustainability Framework</label>
        <div><textarea class="form-control" id="program_sustainability" name="program_sustainability" rows="3" style="margin-top: 0px; margin-bottom: 0px; "></textarea></div>
        </div>
      </div>
    </div>
  </div>

  <div id="description-field" class="form-group" style="display: none;">
    <h2>PROJECT DESCRIPTION</h2>
    <div class="row">
      <div class="col-md-5">
      <label>Project Synopsis</label>
        <div><textarea class="form-control" id="project_synopsis" name="project_synopsis" rows="3" style="margin-top: 0px; margin-bottom: 0px; "></textarea></div>
        <label>Justification of Project</label>
        <div><textarea class="form-control" id="justification_project" name="justification_project" rows="3" style="margin-top: 0px; margin-bottom: 0px; "></textarea></div>
        <label>Project Objectives</label>
        <div><textarea class="form-control" id="project_objectives" name="project_objectives" rows="3" style="margin-top: 0px; margin-bottom: 0px; "></textarea></div>
        <label>Impact to the Community</label>
        <div><textarea class="form-control" id="impact_community" name="impact_community" rows="3" style="margin-top: 0px; margin-bottom: 0px; "></textarea></div>
      </div>
    </div>
  </div>

  <div id="sdg-field" class="form-group" style="display: none;">
    <h2>SUSTAINABLE DEVELOPMENT GOALS</h2>
      <table class='table table-bordered table-hover' id="tab_logic">
        <thead class="table-secondary">
                                <tr class='info'>
                                  <th colspan="3" style='width:10%;'>UNIMAS Facilities to be Applied</th>
                                </tr>
                              </thead>
                            <thead class="table-primary">
                                <tr class='info'>
                                    <th style='width:10%;'>NO</th>
                                    <th style='width:100%;'>Sustainable Development Goals</th>
                                    <th style='width:10%;'>ACTION</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr id="addr0">
                                    <td class="custom-tbl"><input class='form-control input-sm'style='width:100%;' type="text" value="1" id="num" name="num[]" readonly required></td>
                                   <td class="custom-tbl"><select class="form-control" id="sdg" name="sdg[]">
                                    <option>1. No Poverty</option>
                                    <option>2. Zero Hunger</option>
                                    <option>3. Good Health and Well Being</option>
                                    <option>4. Quality Education</option>
                                    <option>5. Gender Equality</option>
                                    <option>6. Clean Water & Sanitation</option>
                                    <option>7. Affordable & Clean Energy</option>
                                    <option>8. Decent Work & Economic Growth</option>
                                    <option>9. Industries, Innovation & Infrastructure</option>
                                    <option>10. Reduce Inequalities</option>
                                    <option>11. Sustainable Cities and Communities</option>
                                    <option>12. Responsible Consumption & Production</option>
                                    <option>13. Climate Action</option>
                                    <option>14. Life Below Water</option>
                                    <option>15. Life On Land</option>
                                    <option>16. Peace Justice and Strong Institutions</option>
                                    <option>17. Partnership For The Goals</option>
                                  </select></td>
                                    <td class="custom-tbl"><button type="button" class="btn btn-info btn-sm add4"><span class="fas fa-plus"></span>Add</button></td>
                                </tr>
                            </thead>
                            <tbody id="dynamic_field4">

                            <tbody>

                        </table>
  </div>

  <div id="milestone-field" class="form-group" style="display: none;">
    <h2>PROJECT MILESTONE</h2>
    <div class="row">
      <div class="col-md-5">
        <div class="form-group">
          <label>Project Period:</label><br>
          <label>From: <input type="text" name="from_date" id="from_date" class="form-control" placeholder="From Date" /></label>
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <label>To: <input type="text" name="to_date" id="to_date" class="form-control" placeholder="To Date" /></label>
        </div>
        <div class="form-group">
          <label>Project Location:</label>
          <input type="text" class="form-control" name="project_location" id="project_location">
        </div>
        <div class="form-group">
          <label>Project Milestone:</label>
          <input type="text" class="form-control" name="project_milestone" id="project_milestone">
        </div>
      </div>
    </div>
  </div>

  <div id="target-field" class="form-group" style="display: none;">
    <h2>TARGET GROUPS</h2>
      <div class="row">
      <div class="col-md-5">
      <div class="form-group">
          <label>Number of Student Involve:</label>
          <input type="text" class="form-control" name="number_student" id="number_student">
        </div>
        <div class="form-group">
          <label>Community Target Group for the Project:</label>
          <input type="text" class="form-control" name="target" id="target">
        </div>
        <div class="form-group">
          <label>Justification for Selecting the Community:</label>
          <input type="text" class="form-control" name="justification" id="justification">
        </div>
      <label>Activity Description</label>
        <div><textarea class="form-control" id="activity_description" name="activity_description" rows="4" style="margin-top: 0px; margin-bottom: 0px; "></textarea></div>
    </div>
  </div>
  </div>

  <div id="members-field" class="form-group" style="display: none;">
      <h2>PROJECT MEMBERS</h2>
      <table class='table table-bordered table-hover' id="tab_logic">
                            <thead class="table-primary">
                                <tr class='info'>
                                    <th style='width:10%;'>NO</th>
                                    <th style='width:10%;'>NAME</th>
                                    <th style='width:30%;'>EXPERTISE</th>
                                    <th style='width:10%;'>POSITION</th>
                                    <th style='width:10%;'>ROLE</th>
                                    <th style='width:10%;'>EMAIL</th>
                                    <th style='width:10%;'>TELEPHONE</th>
                                    <th style='width:10%;'>ACTION</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr id="addr0">
                                    <td class="custom-tbl"><input class='form-control input-sm'style='width:100%;' type="text" value="1" id="no" name="no[]" readonly required></td>
                                    <td class="custom-tbl"><input class='form-control input-sm' style='width:100%;' type="text" id="members_name" name="members_name[]"></td>
                                    <td class="custom-tbl"><input class='form-control input-sm' style='width:100%;' type="text" id="expertise" name="expertise[]"></td>
                                    <td class="custom-tbl"><input class='form-control input-sm' style='width:100%;' type="text" id="position" name="position[]"></td>
                                    <td class="custom-tbl"><input class='form-control input-sm' style='width:100%;' type="text" id="role" name="role[]"></td>
                                    <td class="custom-tbl"><input class='form-control input-sm' style='width:100%;' type="text" id="email" name="email[]"></td>
                                    <td class="custom-tbl"><input class='form-control input-sm' style='width:100%;' type="text" id="telephone" name="telephone[]"></td>
                                    <td class="custom-tbl"><button type="button" class="btn btn-info btn-sm add2"><span class="fas fa-plus"></span>Add</button></td>
                                </tr>
                            </thead>
                            <tbody id="dynamic_field2">

                            <tbody>

                        </table>
    </div>

    <div id="budget-field" class="form-group" style="display: none;">
      <h2>PROJECT BUDGET</h2>
    <label>Project Cost and Expenses</label>
<div class="table-responsive">
                        <table class='table table-bordered table-hover' id="tab_logic">
                          <thead class="table-secondary">
                                <tr class='info'>
                                  <th colspan="6" style='width:10%;'>Program/Project Expenditure</th>
                                </tr>
                              </thead>
                            <thead class="table-primary"> 
                                <tr class='info'>
                                    <th style='width:10%;'>ITEM NO.</th>
                                    <th style='width:10%;'>QTY</th>
                                    <th style='width:30%;'>DESCRIPTION</th>
                                    <th style='width:10%;'>COST PER UNIT</th>
                                    <th style='width:10%;'>Amount</th>
                                    <th style='width:10%;'>ACTION</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr id="addr0">
                                    <td class="custom-tbl"><input class='form-control input-sm'style='width:100%;' type="text" value="1" id="pr_item0" name="pr_item[]" readonly required></td>
                                    <td class="custom-tbl"><input class='form-control input-sm' style='width:100%;' type="text" id="pr_qty0" oninput='multiply(0);' name="pr_qty[]"></td>
                                    <td class="custom-tbl"><input class='form-control input-sm' style='width:100%;' type="text" id="pr_desc0" name="pr_desc[]"></td>
                                    <td><input class='form-control input-sm' style='width:100%;' type="text" id="pr_cpu0" oninput='multiply(0);' name="pr_cpu[]"></td>
                                    <td class="custom-tbl"><input class='estimated_cost form-control input-sm' id="pr_cpi0" style='width:100%;' type="text" name="pr_cpi[]" readonly></td>
                                    <td class="custom-tbl"><button type="button" id="add" class="btn btn-info btn-sm add"><span class="fas fa-plus"></span>Add</button></td>
                                </tr>
                            </thead>
                            <tbody id="dynamic_field">

                            <tbody>
                            <tfoot>
                                <tr class='info'>
                                    <td style='width:65%;text-align:right;padding:4px;' colspan='4'>GRAND TOTAL:</td>
                                    <td style='padding:0px;'>

                                            <input style='width:100%;' type='text' class='form-control input-sm' id='grand_total' name='grand_total' value='0' readonly required>

                                    </td>

                            </tfoot>

                        </table>
                      </div>    
  <br><br>
  <label>University Facilities used in Execution of the Project</label>
      <table class='table table-bordered table-hover' id="tab_logic">
        <thead class="table-secondary">
                                <tr class='info'>
                                  <th colspan="6" style='width:10%;'>UNIMAS Facilities to be Applied</th>
                                </tr>
                              </thead>
                            <thead class="table-primary">
                                <tr class='info'>
                                    <th style='width:10%;'>NO</th>
                                    <th style='width:10%;'>NAME OF FACILITY</th>
                                    <th style='width:30%;'>DATE/TIME</th>
                                    <th style='width:10%;'>NUMBER OF UNIT</th>
                                    <th style='width:10%;'>ACTION</th>
                                </tr>
                            </thead>
                            <thead>
                                <tr id="addr0">
                                    <td class="custom-tbl"><input class='form-control input-sm'style='width:100%;' type="text" value="1" id="number" name="number[]" readonly required></td>
                                   <td class="custom-tbl"><input class='form-control input-sm' style='width:100%;' type="text" id="facility" name="facility[]"></td>
                                    <td class="custom-tbl"><input class='form-control input-sm' style='width:100%;' type="text" id="date" name="date[]"></td>
                                    <td class="custom-tbl"><input class='form-control input-sm' style='width:100%;' type="text" id="unit" name="unit[]"></td>
                                    <td class="custom-tbl"><button type="button" class="btn btn-info btn-sm add3"><span class="fas fa-plus"></span>Add</button></td>
                                </tr>
                            </thead>
                            <tbody id="dynamic_field3">

                            <tbody>

                        </table>
    </div>


    <button type="button" name="back" id="back" class="btn btn-danger" style="display: none;">Back</button>
    <button type="button" name="next" id="next" class="btn btn-secondary" >Next</button>
    <button type="button" name="submit" id="submit" class="btn btn-success" style="display: none;">Submit</button>
    

  

<script>
  $(document).ready(function(){
    $("#next").click(function () {
                        var current = $(".active");
                        var next = $(".active").next("li");
                        if (next.length > 0) {
                            $("#" + current.attr("id") + "-field").hide();
                            $("#" + next.attr("id") + "-field").show();
                            $("#back").show();
                            $("#submit").hide();
                            $(".active").removeClass("active");
                            next.addClass("active");
                            if ($(".active").attr("id") == $("li").last().attr("id")) {
                                $("#next").hide();
                                $("#submit").show();
                            }
                    }
                });


                $("#back").click(function () {
                    var current = $(".active");
                    var prev = $(".active").prev("li");
                    if (prev.length > 0) {
                        $("#" + current.attr("id") + "-field").hide();
                        $("#" + prev.attr("id") + "-field").show();
                        $("#next").show();
                        $("#submit").hide();
                        $(".active").removeClass("active");
                        prev.addClass("active");
                        if ($(".active").attr("id") == $("li").first().attr("id")) {
                            $("#back").hide();
                        }
                    }
                });

        var count = 0;
    var i=1;
var j=1;
var k=1; 
var l=1;
    $('.add2').click(function(){
           j++;  
           $('#dynamic_field2').append('<tr id="row2'+j+'" class="dynamic-added"><td class="custom-tbl"><input id="no'+j+'" class="form-control input-sm"style="width:100%;" type="text" value="'+j+'" name="no[]" readonly required></td><td class="custom-tbl"><input id="members_name'+j+'" class="form-control input-sm" style="width:100%;" type="text" name="members_name[]"></td><td class="custom-tbl"><input id="expertise'+j+'" class="form-control input-sm" style="width:100%;" type="text" name="expertise[]"></td><td class="custom-tbl"><input id="position'+j+'" class="form-control input-sm" style="width:100%;" type="text" name="position[]"></td><td class="custom-tbl"><input id="role'+j+'" class="form-control input-sm" style="width:100%;" type="text" name="role[]"></td><td class="custom-tbl"><input id="email'+j+'" class="form-control input-sm" style="width:100%;" type="text" name="email[]"></td><td class="custom-tbl"><input id="telephone'+j+'" class="form-control input-sm" style="width:100%;" type="text" name="telephone[]"></td><td class="custom-tbl"><button type="button" name="remove" id="'+j+'" class="btn btn-danger btn-sm btn_remove2"><span class="fas fa-remove"></span>Remove</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove2', function(){ 
          j--; 
           var button_id = $(this).attr("id");   
           $('#row2'+button_id+'').remove('<tr id="row2'-j-'" class="dynamic-added"><td class="custom-tbl"><input id="no'-j-'" class="form-control input-sm"style="width:100%;" type="text" value="'-j-'" name="no[]" readonly required></td><td class="custom-tbl"><input id="members_name'-j-'" class="form-control input-sm" style="width:100%;" type="text" name="members_name[]"></td><td class="custom-tbl"><input id="expertise'-j-'" class="form-control input-sm" style="width:100%;" type="text" name="expertise[]"></td><td class="custom-tbl"><input id="position'-j-'" class="form-control input-sm" style="width:100%;" type="text" name="position[]"></td><td class="custom-tbl"><input id="role'-j-'" class="form-control input-sm" style="width:100%;" type="text" name="role[]"></td><td class="custom-tbl"><input id="email'-j-'" class="form-control input-sm" style="width:100%;" type="text" name="email[]"></td><td class="custom-tbl"><input id="telephone'-j-'" class="form-control input-sm" style="width:100%;" type="text" name="telephone[]"></td><td class="custom-tbl"><button type="button" name="remove" id="'-j-'" class="btn btn-danger btn-sm btn_remove2"><span class="fas fa-remove"></span>Remove</button></td></tr>');  
      });

$('.add').click(function(){
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'" class="dynamic-added"><td class="custom-tbl"><input id="pr_item'+i+'" class="form-control input-sm"style="width:100%;" type="text" value="'+i+'" name="pr_item[]" readonly required></td><td class="custom-tbl"><input id="pr_qty'+i+'"class="form-control input-sm" style="width:100%;" type="text" oninput="multiply('+i+');" name="pr_qty[]"></td><td class="custom-tbl"><input id="pr_desc'+i+'" class="form-control input-sm" style="width:100%;" type="text" name="pr_desc[]"></td><td class="custom-tbl"><input id="pr_cpu'+i+'" class="form-control input-sm" style="width:100%;" type="text" oninput="multiply('+i+');" name="pr_cpu[]"></td><td class="custom-tbl"><input id="pr_cpi'+i+'" class="estimated_cost form-control input-sm" style="width:100%;" type="text" name="pr_cpi[]" readonly></td><td class="custom-tbl"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn-sm btn_remove"><span class="fas fa-remove"></span>Remove</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove', function(){ 
          i--; 
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove('<tr id="row'-i-'" class="dynamic-added"><td class="custom-tbl"><input id="pr_item'-i-'" class="form-control input-sm"style="width:100%;" type="text" value="'-i-'" name="pr_item[]" readonly required></td><td class="custom-tbl"><input id="pr_qty'-i-'"class="form-control input-sm" style="width:100%;" type="text" oninput="multiply('-i-');" name="pr_qty[]"></td><td class="custom-tbl"><input id="pr_desc'-i-'" class="form-control input-sm" style="width:100%;" type="text" name="pr_desc[]"></td><td class="custom-tbl"><input id="pr_cpu'-i-'" class="form-control input-sm" style="width:100%;" type="text" oninput="multiply('-i-');" name="pr_cpu[]"></td><td class="custom-tbl"><input id="pr_cpi'-i-'" class="estimated_cost form-control input-sm" style="width:100%;" type="text" name="pr_cpi[]" readonly></td><td class="custom-tbl"><button type="button" name="remove" id="'-i-'" class="btn btn-danger btn-sm btn_remove"><span class="fas fa-remove"></span>Remove</button></td></tr>');  
      });

 $('.add3').click(function(){
           k++;  
           $('#dynamic_field3').append('<tr id="row3'+k+'" class="dynamic-added"><td class="custom-tbl"><input id="number'+k+'" class="form-control input-sm"style="width:100%;" type="text" value="'+k+'" name="number[]" readonly required></td><td class="custom-tbl"><input id="facility'+k+'" class="form-control input-sm" style="width:100%;" type="text" name="facility[]"></td><td class="custom-tbl"><input id="date'+k+'" class="form-control input-sm" style="width:100%;" type="text" name="date[]"></td><td class="custom-tbl"><input id="unit'+k+'" class="form-control input-sm" style="width:100%;" type="text" name="unit[]"></td><td class="custom-tbl"><button type="button" name="remove" id="'+k+'" class="btn btn-danger btn-sm btn_remove3"><span class="fas fa-remove"></span>Remove</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove3', function(){ 
          k--; 
           var button_id = $(this).attr("id");   
           $('#row3'+button_id+'').remove('<tr id="row3'-k-'" class="dynamic-added"><td class="custom-tbl"><input id="number'-k-'" class="form-control input-sm"style="width:100%;" type="text" value="'-k-'" name="number[]" readonly required></td><td class="custom-tbl"><input id="facility'-k-'" class="form-control input-sm" style="width:100%;" type="text" name="facility[]"></td><td class="custom-tbl"><input id="date'-k-'" class="form-control input-sm" style="width:100%;" type="text" name="date[]"></td><td class="custom-tbl"><input id="unit'-k-'" class="form-control input-sm" style="width:100%;" type="text" name="unit[]"></td><td class="custom-tbl"><button type="button" name="remove" id="'-k-'" class="btn btn-danger btn-sm btn_remove3"><span class="fas fa-remove"></span>Remove</button></td></tr>');  
      });

$('.add4').click(function(){
           l++;  
           $('#dynamic_field4').append('<tr id="row4'+l+'" class="dynamic-added"><td class="custom-tbl"><input id="num'+l+'" class="form-control input-sm"style="width:100%;" type="text" value="'+l+'" name="num[]" readonly required></td><td class="custom-tbl"><select class="form-control" id="sdg[]'+l+'" name="sdg[]"><option>1. No Poverty</option><option>2. Zero Hunger</option><option>3. Good Health and Well Being</option><option>4. Quality Education</option><option>5. Gender Equality</option><option>6. Clean Water & Sanitation</option><option>7. Affordable & Clean Energy</option><option>8. Decent Work & Economic Growth</option><option>9. Industries, Innovation & Infrastructure</option><option>10. Reduce Inequalities</option><option>11. Sustainable Cities and Communities</option><option>12. Responsible Consumption & Production</option><option>13. Climate Action</option><option>14. Life Below Water</option><option>15. Life On Land</option><option>16. Peace Justice and Strong Institutions</option><option>17. Partnership For The Goals</option></select></td><td class="custom-tbl"><button type="button" name="remove" id="'+l+'" class="btn btn-danger btn-sm btn_remove4"><span class="fas fa-remove"></span>Remove</button></td></tr>');  
      });  


      $(document).on('click', '.btn_remove4', function(){ 
          l--; 
           var button_id = $(this).attr("id");   
           $('#row4'+button_id+'').remove('<tr id="row4'-l-'" class="dynamic-added"><td class="custom-tbl"><input id="num'-l-'" class="form-control input-sm"style="width:100%;" type="text" value="'-l-'" name="num[]" readonly required></td><td class="custom-tbl"><select class="form-control" id="sdg[]'-l-'" name="sdg[]"><option>1. No Poverty</option><option>2. Zero Hunger</option><option>3. Good Health and Well Being</option><option>4. Quality Education</option><option>5. Gender Equality</option><option>6. Clean Water & Sanitation</option><option>7. Affordable & Clean Energy</option><option>8. Decent Work & Economic Growth</option><option>9. Industries, Innovation & Infrastructure</option><option>10. Reduce Inequalities</option><option>11. Sustainable Cities and Communities</option><option>12. Responsible Consumption & Production</option><option>13. Climate Action</option><option>14. Life Below Water</option><option>15. Life On Land</option><option>16. Peace Justice and Strong Institutions</option><option>17. Partnership For The Goals</option></select></td><td class="custom-tbl"><button type="button" name="remove" id="'-l-'" class="btn btn-danger btn-sm btn_remove4"><span class="fas fa-remove"></span>Remove</button></td></tr>');  
      });

    $.datepicker.setDefaults({  
                dateFormat: 'yy/mm/dd'   
           });  
           $(function(){  
                $("#from_date").datepicker();  
                $("#to_date").datepicker(); 
                $("#from_date2").datepicker();  
                $("#to_date2").datepicker(); 
           });

 /*$('#submit').click(function(event){
  event.preventDefault();
  var count_data = 0;
  $('.name').each(function(){
   count_data = count_data + 1;
  });
  if(count_data > 0)
  {
   $.ajax({
    url:"add",
    method:"POST",
    data:new FormData(document.getElementById("add_name")),
    contentType: false,  
    cache: false,  
    processData:false,
    success:function(data)
    {
         console.log(data);
         alert(data);
         document.location.href='index';
    }
   })
  }
  else
  {
   $('#action_alert').html('<p>Please Add atleast one data</p>');
   $('#action_alert').dialog('open');
  }
 });*/



    $('#submit').click(function(e){
     e.preventDefault();
     $.ajax({
       url:"add",
       type:"POST",
       data:new FormData(document.getElementById("add_name")),  
       contentType: false,  
       cache: false,  
       processData:false,
       dataType:'json',  
       success:function(data)
       {
         console.log(data);
         document.location.href='index';
       }
     })
    })
  });
</script>
<script type="text/javascript">
    function multiply(id)
        {
            var total1=parseFloat($('#pr_qty'+id).val())*parseFloat($('#pr_cpu'+id).val());
            $("input[id=pr_cpi" + id + "]").val(total1);
            grandTotal();
        }
function grandTotal()
        {
            var items = document.getElementsByClassName("estimated_cost");
            var itemCount = items.length;
            var total = 0;
            for(var i = 0; i < itemCount; i++)
            {
                total = total +  parseFloat(items[i].value);
            }
            document.getElementById('grand_total').value = total;
        }
</script>
</form>
</div>
</div>
  