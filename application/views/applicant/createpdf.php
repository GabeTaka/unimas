<?php
//============================================================+
// File name   : example_005.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 005 for TCPDF class
//               Multicell
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Multicell
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('PENTEST Administration');
$pdf->SetTitle('UNIMAS SERVICE LEARNING');
$pdf->SetSubject('Engagement Summary Report');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 10);

// add a page
$pdf->AddPage();

foreach($info as $info) {
$info = '<h1>UNIMAS SERVICE LEARNING</h1>
        <h3><b>Project Name</b></h3>
        <p>'.($info['project_name']).'</p>
        <br></br>
        <h3><b>Course Code and Course Name</b></h3>
        <p>'.($info['course_code']).'</p>
        <br></br>
        <h3><b>Project Period</b></h3>
        <p>'.($info['from_date']).' - '.($info['to_date']).'</p>
        <br></br>
        <h3><b>Project Location</b></h3>
        <p>'.($info['project_location']).'</p>
        <br></br>
        <h3><b>Organized By</b></h3>
        <p>'.($info['organizer']).'</p>
        <br></br>
        <h3><b>Co-Organizer</b></h3>
        <p>'.($info['co_organizer']).'</p>

';
}


$pdf->writeHTML($info, true, false, true, false, '');

$pdf->AddPage();

foreach($description as $description) {
$description = '
        <h3><b>1.0 Project Synopsis</b></h3>
        <p>'.($description['project_synopsis']).'</p>
        <br></br>
        <h3><b>2.0 Justification Of SULAM/USR Project</b></h3>
        <p>'.($description['justification_project']).'</p>
        <br></br>
        <h3><b>3.0 SULAM/USR Objectives</b></h3>
        <p>'.($description['project_objectives']).'</p>
        <br></br>
        <h3><b>4.0 SULAM/USR Impact To The Community</b></h3>
        <p>'.($description['impact_community']).'</p>
        <br></br>
';
}


$pdf->writeHTML($description, true, false, true, false, '');

foreach($sdg_table as $sdg_table) {
$sdg_table = '
        <h3><b>5.0 SULAM/USR Suistanable Development Goals</b></h3>
        <p>'.($sdg_table['sdg']).'</p>
';
}


$pdf->writeHTML($sdg_table, true, false, true, false, '');

$pdf->AddPage();


foreach($milestone as $milestone) {
$milestone = '
        <h3><b>6.0 USR/SULAM Location and Project Milestone</b></h3>
        <h4><b>6.1 Project Location</b></h4>
        <p>'.($milestone['project_location']).'</p>
        <h4><b>6.2 Project Milestone</b></h4>
        <p>'.($milestone['project_milestone']).'</p>
        <br></br>
';
}


$pdf->writeHTML($milestone, true, false, true, false, '');

foreach($target_groups as $target_groups) {
$target_groups = '
        <h3><b>7.0 Target Group</b></h3>
        <h4><b>7.1 Number Of Students Involve</b></h4>
        <p>'.($target_groups['number_student']).'</p>
        <h4><b>7.2 Community Target Group For The Project</b></h4>
        <p>'.($target_groups['target']).'</p>
        <h4><b>7.3 Justification For Selecting The Community</b></h4>
        <p>'.($target_groups['justification']).'</p>
        <h4><b>7.4 SULAM/USR Activity Descriptions</b></h4>
        <p>'.($target_groups['activity_description']).'</p>
        <br></br>
';
}


$pdf->writeHTML($target_groups, true, false, true, false, '');

foreach($project_members as $project_members) {
$project_members = '
        <h3><b>8.0 Head Of Project, Members And Their Job Scope</b></h3>
        <h4><b>8.1 Please To Provide The Following Details Of Project Leader And
        Member (Among UNIMAS Staff) And Their Job Scope In This USR/SULAM Project</b></h4>
        <table cellspacing="0" cellpadding="10" border="1" align="center">
            <tbody>
                <tr> 
                <th style="background-color: grey" colspan="3"><font color="white">Name</font></th>
                <th style="background-color: grey" colspan="3"><font color="white">Expertise</font></th>
                <th style="background-color: grey" colspan="3"><font color="white">Position</font></th>
                <th style="background-color: grey" colspan="3"><font color="white">Role</font></th>
                <th style="background-color: grey" colspan="3"><font color="white">Email</font></th>
                <th style="background-color: grey" colspan="3"><font color="white">Telephone</font></th>
                </tr>
                <tr>
                <td colspan="3">'.($project_members['members_name']).'</td>
                <td colspan="3">'.($project_members['expertise']).'</td>
                <td colspan="3">'.($project_members['position']).'</td>
                <td colspan="3">'.($project_members['role']).'</td>
                <td colspan="3">'.($project_members['email']).'</td>
                <td colspan="3">'.($project_members['telephone']).'</td>
                </tr>
            </tbody>
    </table>';
}


$pdf->writeHTML($project_members, true, false, true, false, '');

$pdf->AddPage();


foreach($project_budget as $project_budget) {
foreach($total as $total) {
$project_budget = '
        <h3><b>9.0 Budget And Financial Implication</b></h3>
        <h4><b>9.1 Please Please Do State Clearly The Project Cost And Expenses</b></h4>
        <table cellspacing="0" cellpadding="10" border="1" align="center">
            <tbody>
                <tr> 
                <th style="background-color: grey" colspan="4"><font color="white">Program/Project Expenditure</font></th>
                </tr>
                <tr>
                <th style="background-color: grey"><font color="white">Expenditure</font></th>
                <th style="background-color: grey"><font color="white">Quantity</font></th>
                <th style="background-color: grey"><font color="white">Cost Per Unit</font></th>
                <th style="background-color: grey"><font color="white">Amount</font></th>
                </tr>
                <tr>
                <td>'.($project_budget['pr_desc']).'</td>
                <td>'.($project_budget['pr_qty']).'</td>
                <td>'.($project_budget['pr_cpu']).'</td>
                <td>'.($project_budget['pr_cpi']).'</td>
                </tr>
                <tr>
                <th style="background-color: grey" colspan="3"><font color="white">Grand Total</font></th>
                <td>'.($total['grand_total']).'</td>
                </tr>
            </tbody>
    </table>';
}
}


$pdf->writeHTML($project_budget, true, false, true, false, '');


foreach($facilities as $facilities) {
$facilities = '
        <h4><b>9.2 Kindly Do State The University Facilities That Will Be Used In The Execution Of The
        USR/SULAM Project</b></h4>
        <table cellspacing="0" cellpadding="10" border="1" align="center">
            <tbody>
                <tr> 
                <th style="background-color: grey" colspan="3"><font color="white">UNIMAS Facilities To Be Applied</font></th>
                </tr>
                <tr>
                <th style="background-color: grey"><font color="white">Name Of Facility</font></th>
                <th style="background-color: grey"><font color="white">Date/Time</font></th>
                <th style="background-color: grey"><font color="white">Number Of Unit</font></th>
                </tr>
                <tr>
                <td>'.($facilities['facility']).'</td>
                <td>'.($facilities['date']).'</td>
                <td>'.($facilities['unit']).'</td>
                </tr>
            </tbody>
    </table>';
}


$pdf->writeHTML($facilities, true, false, true, false, '');


// move pointer to last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
ob_clean();
$pdfFilePath ="PentestSummaryReport(".date("Y-m-d h:i:s",time()).").pdf";
$pdf->Output($pdfFilePath, 'I');

//============================================================+
// END OF FILE
//============================================================+

