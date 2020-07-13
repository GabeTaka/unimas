<fieldset>
		<div class="forms-details">
  	<div class="form-group">
  	<label>
  	<ul id="signup-step">
            <li id="personal" class="active">Penetration Testing Guidelines</li>
            <li id="password">Executive Summary</li>
            <li id="contact">Detailed Findings And Recommendation</li>
    </ul>
	</label>
	</div>
</div>



    <div id="personal-field" class="form-group">
    <h2><u>Penetration Testing Guidelines</u></h2>    	
    <?php foreach($testing_guidelines as $guidelines) : ?>
	<table class="table table-bordered">
      	<tbody>
      		<tr>
      			<th style="background-color: #F4A460" colspan="3" scope="col">Information Gathering</th>
      			<tr><td style="background-color: #B0E0E6"><div class="form-control" id="gathering" name="gathering" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: auto; width: 350px;"><?php echo ($guidelines['gathering']); ?></div></td>
            <td style="background-color: #B0E0E6"><div class="form-control" id="gathering2" name="gathering2" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: auto; width: 350px;"><?php echo ($guidelines['gathering2']); ?></div></td>
          <td style="background-color: #B0E0E6"><div class="form-control" id="gathering3" name="gathering3" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: auto; width: 350px;"><?php echo ($guidelines['gathering3']); ?></div></td></tr>     			
      		</tr>
      	</tbody>
      	<tbody>
      		<tr>
      			<th style="background-color: #F4A460" colspan="3" scope="col">Scanning</th>
      			<tr><td style="background-color: #B0E0E6" colspan="3"><div class="form-control" id="scanning" name="scanning" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: auto;"><?php echo ($guidelines['scanning']); ?></div></td></tr>
      		</tr>
      	</tbody>
      <tbody>
      		<tr>
      			<th style="background-color: #F4A460" colspan="3" scope="col">Vulnerability Discovery and Analysis</th>
      			<tr><td style="background-color: #B0E0E6"><div class="form-control" id="discovery" name="discovery" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: auto; width: 350px;"><?php echo ($guidelines['discovery']); ?></div></td>
            <td style="background-color: #B0E0E6"><div class="form-control" id="discovery2" name="discovery2" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: auto; width: 350px;"><?php echo ($guidelines['discovery2']); ?></div></td>
          <td style="background-color: #B0E0E6"><div class="form-control" id="discovery3" name="discovery3" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: auto; width: 350px;"><?php echo ($guidelines['discovery3']); ?></div></td></tr>
      		</tr>
      	</tbody>
      <tbody>
      		<tr>
      			<th style="background-color: #F4A460" colspan="3" scope="col">Exploitation</th>
      			<tr><td style="background-color: #B0E0E6"><div class="form-control" id="exploitation" name="exploitation" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: auto; width: 350px;"><?php echo ($guidelines['exploitation']); ?></div></td>
            <td style="background-color: #B0E0E6"><div class="form-control" id="exploitation2" name="exploitation2" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: auto; width: 350px;"><?php echo ($guidelines['exploitation2']); ?></div></td>
          <td style="background-color: #B0E0E6"><div class="form-control" id="exploitation3" name="exploitation3" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: auto; width: 350px;"><?php echo ($guidelines['exploitation3']); ?></div></td></tr>
      		</tr>
      	</tbody>
      <tbody>
      		<tr>
      			<th style="background-color: #F4A460" colspan="3" scope="col">Reporting</th>
      			<tr><td style="background-color: #B0E0E6"><div class="form-control" id="reporting" name="reporting" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: auto; width: 350px;"><?php echo ($guidelines['reporting']); ?></div></td>
            <td style="background-color: #B0E0E6"><div class="form-control" id="reporting2" name="reporting2" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: auto; width: 350px;"><?php echo ($guidelines['reporting2']); ?></div></td>
          <td style="background-color: #B0E0E6"><div class="form-control" id="reporting3" name="reporting3" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: auto; width: 350px;"><?php echo ($guidelines['reporting3']); ?></div></td></tr>
      		</tr>
      	</tbody>
      </table>
	<?php endforeach; ?>
	<div class="container-fluid">
	<table class="table table-hover">
		<thead>
			<tr>
				<th scope="col">Vulnerability Level</th>
				<th scope="col">Definition</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th scope="row" style="background-color: #FF4500;">Critical</th>
				<td>A vulnerability with high business risk and easily exploitable.</td>
			</tr>
			<tr>
				<th scope="row" style="background-color: #FF8C00;">High</th>
				<td>A vulnerability with high business risk and medium level of exploitability.</td>
			</tr>
			<tr>
				<th scope="row" style="background-color: #FFFF00;">Medium</th>
				<td>A vulnerability with medium level of business risk and difficult to exploit.</td>
			</tr>
			<tr>
				<th scope="row" style="background-color: #9ACD32;">Low</th>
				<td>A vulnerability with low business risk and no direct exploitation possible.</td>
			</tr>
		</tbody>
	</table>
	</div>
</div>


	<div id="password-field" class="form-group" style="display: none;">
	<h2><u>Executive Summary</u></h2>
	<?php foreach($executive_summary as $executive) : ?>
	<label><h4>Summary Details</h4></label>
	      <div class="form-control" id="summary" name="summary" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: auto;"><?php echo($executive['summary']); ?></div><br>
	      <label><h4>Scope of Work</h4></label>
	      <div class="form-control" id="work" name="work" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: auto; "><?php echo($executive['work']); ?></div><br>
	      <label><h4>Summary of Findings</h4></label>
	      <div class="form-control" id="findings" name="findings" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: auto; "><?php echo($executive['findings']); ?></div><br><br><br>
	<?php endforeach; ?>


	<div class="container-fluid">
	<table class="table table-hover">
		<thead>
			<tr>
				<td align="center" rowspan="2" style="background-color: #4169E1;" width="10%" scope="col"><strong>Target</strong></td>
				<td align="center" colspan="4" style="background-color: #4169E1;" scope="col"><strong>Vulnerability</strong></td>
				<tr>
					<td align="center" width="10%" scope="col" style="background-color: #FF4500;"><strong>Critical</strong></td>
					<td align="center" width="10%" scope="col" style="background-color: #FF8C00;"><strong>High</strong></td>
					<td align="center" width="10%" scope="col" style="background-color: #FFFF00;"><strong>Medium</strong></td>
					<td align="center" width="10%" scope="col" style="background-color: #9ACD32;"><strong>Low</strong></td>
				</tr>
			<tr>
				<td align="center" scope="col">cmtstraining</td>
				<td align="center" scope="col"><?php echo $count_critical; ?></td>
				<td align="center" scope="col"><?php echo $count_high; ?></td>
				<td align="center" scope="col"><?php echo $count_medium; ?></td>
				<td align="center" scope="col"><?php echo $count_low; ?></td>
			</tr>
			<tr>
				<td align="center" rowspan="2" scope="col"><strong>Total</strong></td>
				<td align="center" scope="col"><?php echo $count_critical; ?></td>
				<td align="center" scope="col"><?php echo $count_high; ?></td>
				<td align="center" scope="col"><?php echo $count_medium; ?></td>
				<td align="center" scope="col"><?php echo $count_low; ?></td>
			</tr>
				<tr>
					<td align="center" colspan="5" scope="col"><strong><?php echo $count_total; ?></strong></td>
				</tr>
			</tr>
		</thead>
	</table>
	</div>
  	</div>



	<div id="contact-field" class="form-group" style="display: none;">
  <?php $i=0; ?>
	<h2><u>Vulnerability Findings</u></h2>
	<?php foreach($findings as $findings) : ?>
	<h1><br>4.<?php echo ++$i;?> <?php echo ($findings['name']); ?></h1><br>
	<h3>Vulnerability Details</h3><?php echo ($findings['details']); ?><br><br>
  <?php if(! empty(($findings['url']) && ($findings['parameter'] && ($findings['proof'])))): ?>
	<table class="table table-bordered">
		<tbody>
      		<tr>
      			<th style="background-color: #F4A460" colspan="3" scope="col">URL</th>
      			<th style="background-color: #F4A460" colspan="3" scope="col">Parameter</th>
      			<tr>
      				<td style="background-color: #B0E0E6" colspan="3"><div class="form-control" id="url" name="url" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: auto;"><?php echo ($findings['url']); ?></div></td>
      				<td style="background-color: #B0E0E6" colspan="3"><div class="form-control" id="scanning" name="scanning" rows="3" style="margin-top: 0px; margin-bottom: 0px; height: auto;"><?php echo ($findings['parameter']); ?></div></td>
      			</tr>
      		</tr>
      	</tbody>
    </table>
	<h4><strong>Proof Of Concept</strong></h4><?php echo ($findings['proof']); ?><br>
  <?php endif;?>
	<h4><strong>Risk Rating</strong></h4><?php echo ($findings['risk']); ?><br>
	<h4><strong>Remediation</strong></h4><?php echo ($findings['remediation']); ?><br>
  <?php if(! empty($findings['image'])): ?>
	<img sizes="20" class="post-thumb" src="<?php echo site_url(); ?>assets/images/forms/<?php echo $findings['image']; ?>">
  <?php endif;?>
  <br><br><br><br><hr>
	<?php endforeach; ?>
	</div>

    <button type="button" name="back" id="back" class="btn btn-danger" style="display: none;">Back</button>
    <button type="button" name="next" id="next" class="btn btn-secondary" >Next</button>
</div>
</fieldset>



<style type="text/css">
  #signup-step {
                margin:auto;
                padding:0;
            }

    #signup-step li {
                list-style:none; 
                float:left;
                padding:20px 20px;
                border-top:#004C9C 1px solid;
                border-left:#004C9C 1px solid;
                border-right:#004C9C 1px solid;
                border-radius:5px 5px 0 0;
            }
    #signup-step li.active {
                background-color:#E9967A;
            }
</style>



<script type="text/javascript">
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
                                $("#add").show();
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
                        $("#add").hide();
                        $(".active").removeClass("active");
                        prev.addClass("active");
                        if ($(".active").attr("id") == $("li").first().attr("id")) {
                            $("#back").hide();
                        }
                    }
                });
            });
</script>
