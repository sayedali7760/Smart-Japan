<?php
class Dashboard_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function get_dashboard_count($inst_ids)
    {

        $return_query['institutions'] = $this->db->select('*')
            ->from('institution')
            ->where('is_active', 1)
            ->where_in('institution_id', $inst_ids)
            ->get()
            ->result();

        $return_query['requisitions'] = $this->db->select('*')
            ->from('requisitions')
            ->where('is_active', 1)
            ->where_in('inst_id', $inst_ids)
            ->get()
            ->result();

        $return_query['interview_scheduled'] = $this->db->select('*')
            ->from('requisition_resume_mapping as R')
            ->where('status', 3)
            ->where_in('S.inst_id', $inst_ids)
            ->join('requisitions as S', 'S.requisition_id = R.requisition_id', 'left')
            ->get()
            ->result();

        $where = '(status="1" or status = "2")';
        $return_query['pending_scheduled'] = $this->db->select('*')
            ->from('requisition_resume_mapping as R')
            ->where($where)
            ->where_in('S.inst_id', $inst_ids)
            ->join('requisitions as S', 'S.requisition_id = R.requisition_id', 'left')
            ->get()
            ->result();


        return $return_query;
    }
}
