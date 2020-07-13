<?php class Findings_model extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function create_findings($image, $report_id){

		$name = $this->input->post('name');
		$details = $this->input->post('details');
		$url = $this->input->post('url');
		$parameter = $this->input->post('parameter');
		$proof = $this->input->post('proof');
		$risk = $this->input->post('risk');
		$remediation = $this->input->post('remediation');
		$image = $this->input->post('image');
		$user_id = $this->session->userdata('user_id'); 

		$data = array();
		for ($i=0; $i < count($name); $i++)
			$data[] = array(
				'name' => $name[$i],
				'details' => $details[$i],
				'url' => $url[$i],
				'parameter' => $parameter[$i],
				'proof' => $proof[$i],
				'risk' => $risk[$i],
				'remediation' => $remediation[$i],
				'image' => $image[$i],
				'user_id' => $user_id,
				'report_id' => $report_id,
			);
			// print_r($data);exit();
		$this->db->insert_batch('findings', $data);
		return $insert_id = $this->db->insert_id();
	}

	public function get_findings($report_id){
			$this->db->select('
								findings.name,
								findings.details,
								findings.url,
								findings.parameter,
								findings.proof,
								findings.risk,
								findings.remediation,
								findings.image,
								findings.id as report_id,
								report.prepared_by,
								report.endorsed_by,
				');
			$this->db->from('findings');
			$this->db->join('report','report.id = findings.report_id');
			$this->db->where('findings.report_id',$report_id);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function delete_findings($reportid){
			$this->db->delete('findings', ['id' => $reportid]);
			$query = $this->db->where('report_id', $reportid)->get('findings');
			foreach($query->result() as $report){
				$this->delete_findings($report->id);
			}
		}
}