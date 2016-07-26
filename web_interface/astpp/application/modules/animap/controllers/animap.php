<?php
###############################################################################
# ASTPP - Open Source VoIP Billing Solution
#
# Copyright (C) 2016 iNextrix Technologies Pvt. Ltd.
# Samir Doshi <samir.doshi@inextrix.com>
# ASTPP Version 3.0 and above
# License https://www.gnu.org/licenses/agpl-3.0.html
#
# This program is free software: you can redistribute it and/or modify
# it under the terms of the GNU Affero General Public License as
# published by the Free Software Foundation, either version 3 of the
# License, or (at your option) any later version.
# 
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU Affero General Public License for more details.
# 
# You should have received a copy of the GNU Affero General Public License
# along with this program.  If not, see <http://www.gnu.org/licenses/>.
###############################################################################
class Animap extends MX_Controller {

    function Animap() {
        parent::__construct();

        $this->load->helper('template_inheritance');

        $this->load->library('session');
        $this->load->library("animap_form");
        $this->load->library('astpp/form');
        $this->load->model('animap_model');

        if ($this->session->userdata('user_login') == FALSE)
            redirect(base_url() . '/astpp/login');
    }

    function animap_add() {
        $data['username'] = $this->session->userdata('user_name');
        $data['flag'] = 'create';
        $data['page_title'] = 'Add Caller ID';
        $edit_id='';
        $data['form'] = $this->form->build_form($this->animap_form->get_animap_form_fields($edit_id), '');

        $this->load->view('animap_add_edit', $data);
    }

    function animap_edit($edit_id = '') {
        $data['page_title'] = 'Edit Caller ID ';
        $where = array('id' => $edit_id);
        $account = $this->db_model->getSelect("*", "ani_map", $where);
        foreach ($account->result_array() as $key => $value) {
            $edit_data = $value;
        }
    
        $data['form'] = $this->form->build_form($this->animap_form->get_animap_form_fields($edit_id), $edit_data);
        $this->load->view('animap_add_edit', $data);
    }

    function animap_save() {
        $add_array = $this->input->post();

      $edit_id=$add_array['id'];
        $data['form'] = $this->form->build_form($this->animap_form->get_animap_form_fields($edit_id), $add_array);
        if ($add_array['id'] != '') {
            $data['page_title'] = 'Add Caller ID';
            if ($this->form_validation->run() == FALSE) {
                $data['validation_errors'] = validation_errors();
                echo $data['validation_errors'];
                exit;
            } else {
                
                $this->animap_model->edit_animap($add_array, $add_array['id']);
                echo json_encode(array("SUCCESS"=> " Caller ID updated successfully!"));
                exit;
            }
        } else {
         
            if ($this->form_validation->run() == FALSE) {
                $data['validation_errors'] = validation_errors();
                echo $data['validation_errors'];
                exit;
            } else {
              
                $ip_id = $this->animap_model->add_animap($add_array);
                               
                echo json_encode(array("SUCCESS"=> " Caller ID added successfully!"));
                exit;
            }
        }
    }



    function animap_delete($id) {
        $this->animap_model-> remove_animap($id);
        $this->session->set_flashdata('astpp_notification', 'Caller ID removed successfully!');
        redirect(base_url() . 'animap/animap_detail/');
    }

    function  animap_detail_search() {
        $ajax_search = $this->input->post('ajax_search', 0);
        if ($this->input->post('advance_search', TRUE) == 1) {
            $this->session->set_userdata('advance_search', $this->input->post('advance_search'));
            $action = $this->input->post();
            unset($action['action']);
            unset($action['advance_search']);
            $this->session->set_userdata('animap_list_search', $action);
        }
        if (@$ajax_search != 1) {
            redirect(base_url() . 'animap/animap_list/');
        }
    }

    function animap_detail_clearsearchfilter() {
        $this->session->set_userdata('advance_search', 0);
        $this->session->set_userdata('animap_list_search', "");
    }

    function animap_detail() {
        $data['username'] = $this->session->userdata('user_name');
        $data['page_title'] = 'Caller ID';
        $data['search_flag'] = true;
        $this->session->set_userdata('advance_search', 0);
        $data['grid_fields'] = $this->animap_form->build_animap_list_for_admin();
        $data["grid_buttons"] = $this->animap_form->build_grid_buttons();
        $data['form_search'] = $this->form->build_serach_form($this->animap_form->get_animap_search_form());

        $this->load->view('animap_view', $data);
    }

    function animap_detail_json() {
        $json_data = array();
        $count_all = $this->animap_model->animap_list(false);
        $paging_data = $this->form->load_grid_config($count_all, $_GET['rp'], $_GET['page']);
        $json_data = $paging_data["json_paging"];
        $query = $this->animap_model->animap_list(true, $paging_data["paging"]["start"], $paging_data["paging"]["page_no"]);
        $grid_fields = json_decode($this->animap_form->build_animap_list_for_admin());
        $json_data['rows'] = $this->form->build_grid($query, $grid_fields);

        echo json_encode($json_data);
    }

    function animap_delete_multiple() {
        $ids = $this->input->post("selected_ids", true);
        $where = "id IN ($ids)";
        $this->db->where($where);
        echo $this->db->delete("ani_map");
    }
   

    
}



?>
 
