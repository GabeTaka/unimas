<?php 
class Executive_Summary_model extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function create_executive_summary($report_id){
		$data=array(
			'summary' => $this->input->post('summary'),
			'work' => $this->input->post('work'),
			'findings' => $this->input->post('findings'),
			'user_id' => $this->session->userdata('user_id'),
			'report_id' => $report_id
		);
		$this->db->insert('executive_summary',$data);
		return $insert_id = $this->db->insert_id();

	}

	public function get_executive_summary($report_id){
			$this->db->select('
								executive_summary.summary,
								executive_summary.work,
								executive_summary.findings,
								executive_summary.id as report_id,
								report.prepared_by,
								report.endorsed_by,
				');
			$this->db->from('executive_summary');
			$this->db->join('report','report.id = executive_summary.report_id');
			$this->db->where('executive_summary.report_id',$report_id);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function delete_executive($reportid){
			$this->db->delete('executive_summary', ['id' => $reportid]);
			$query = $this->db->where('report_id', $reportid)->get('executive_summary');
			foreach($query->result() as $report){
				$this->delete_executive($report->id);
			}
		}
}