<?php 
class Guidelines_model extends CI_Model{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function create_testing_guidelines($report_id){
		$data = array(
			'gathering' => $this->input->post('gathering'),
			'gathering2' => $this->input->post('gathering2'),
			'gathering3' => $this->input->post('gathering3'),
			'scanning' => $this->input->post('scanning'),
			'discovery' => $this->input->post('discovery'),
			'discovery2' => $this->input->post('discovery2'),
			'discovery3' => $this->input->post('discovery3'),
			'exploitation' => $this->input->post('exploitation'),
			'exploitation2' => $this->input->post('exploitation2'),
			'exploitation3' => $this->input->post('exploitation3'),
			'reporting' => $this->input->post('reporting'),
			'reporting2' => $this->input->post('reporting2'),
			'reporting3' => $this->input->post('reporting3'),
			'user_id' => $this->session->userdata('user_id'),
			'report_id' => $report_id
		);

		$this->db->insert('testing_guidelines', $data);
		return $insert_id = $this->db->insert_id();
	}

	public function get_testing_guidelines($report_id){
			$this->db->select('
								testing_guidelines.gathering,
								testing_guidelines.gathering2,
								testing_guidelines.gathering3,
								testing_guidelines.scanning,
								testing_guidelines.discovery,
								testing_guidelines.discovery2,
								testing_guidelines.discovery3,
								testing_guidelines.exploitation,
								testing_guidelines.exploitation2,
								testing_guidelines.exploitation3,
								testing_guidelines.reporting,
								testing_guidelines.reporting2,
								testing_guidelines.reporting3,
								testing_guidelines.id as report_id,
								report.prepared_by,
								report.endorsed_by,
				');
			$this->db->from('testing_guidelines');
			$this->db->join('report','report.id = testing_guidelines.report_id');
			$this->db->where('testing_guidelines.report_id',$report_id);
			$query = $this->db->get();
			return $query->result_array();
		}

		public function delete_guidelines($reportid){
			$this->db->delete('testing_guidelines', ['id' => $reportid]);
			$query = $this->db->where('report_id', $reportid)->get('testing_guidelines');
			foreach($query->result() as $report){
				$this->delete_guidelines($report->id);
			}
		}
}