<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Champions_model
 *
 * This Model for ...
 *
 * @package        CodeIgniter
 * @category    Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Champions_model extends CI_Model
{

    // ------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------

    // ------------------------------------------------------------------------
    public function get_champion($id_champion)
    {
        try {
            return $this->db->get_where('champion', array('id' => $id_champion))->row_array();
        } catch (Exception $ex) {
            throw new Exception('Champions_model Model : Error in get_champion function - ' . $ex);
        }
    }

    public function get_all_champions($params = array())
    {
        try {
            $this->db->order_by('id', 'asc');
            if (isset($params) && !empty($params)) {
                $this->db->limit($params['limit'], $params['offset']);
            }
            return $this->db->get('champion')->result_array();
        } catch (Exception $ex) {
            throw new Exception('Champions_model model : Error in get_all_champions function - ' . $ex);
        }
    }

    public function get_all_champions_count()
    {
        try {
            $this->db->from('champion');
            return $this->db->count_all_results();
        } catch (Exception $ex) {
            throw new Exception('Champions_model model : Error in get_all_champions_count function - ' . $ex);
        }
    }

    public function add_champion($params)
    {
        try {
            $this->db->insert('champion', $params);
            return $this->db->insert_id();
        } catch (Exception $ex) {
            throw new Exception('Champions_model model : Error in add_champion function - ' . $ex);
        }
    }

    public function delete_champion($id_champion)
    {
        try {
            return $this->db->delete('champion', array('id' => $id_champion));
        } catch (Exception $ex) {
            throw new Exception('Champions_model model : Error in delete_champion function - ' . $ex);
        }
    }

    public function update_champion($params, $id_champion)
    {
        try {
            $this->db->where('id', $id_champion);
            return $this->db->update('champion', $params);
        } catch (Exception $ex) {
            throw new Exception('Champions_model model : Error in update_champion function - ' . $ex);
        }
    }

    // ------------------------------------------------------------------------

}

/* End of file Champions_model.php */
/* Location: ./application/models/Champions_model.php */
