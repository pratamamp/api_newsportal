<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Api extends REST_Controller {
	function __construct() {
		// Construct the parent class
        parent::__construct();
        $this->load->database();
        $this->load->helper('custom');
        // Configure limits on our controller methods
        // Ensure you have created the 'limits' table and enabled 'limits' within application/config/rest.php
        $this->methods['topic_get']['limit'] = 500; // 500 requests per hour per user/key
	}

	function topic_get() {
		$resdata = $this->db->get('topic')->result_array();
		$this->get_response($resdata);
	}

	function topic_post() {
		$title = ($this->input->get_post('title'))? $this->input->get_post('title') : '';
		$insert = $this->db->insert('topic', ['topic_title'=>$title, 'topic_slug'=>format_uri($title)]);  
		if($insert) {
			$response_code = REST_Controller::HTTP_CREATED;
			$result = array('status'=>'success', 'display_message'=>'Data Added!', 'time'=>date('Y-m-d H:i:s'));
		}else {
			$response_code = REST_Controller::HTTP_NOT_MODIFIED;
			$result = array('status'=>'failed', 'display_message'=>'Error added data', 'time'=>date('Y-m-d H:i:s'));
		}
		$this->set_response($result, $response_code);
	}


	function news_get() {
		$newsdata = $this->db->get('news')->result_array();
		$this->get_response($newsdata);
	}

	function news_post() {
		$title = ($this->input->get_post('title')) ? $this->input->get_post('title') : '';
		$summary = ($this->input->get_post('summary')) ? $this->input->get_post('summary') : '';
		$content = ($this->input->get_post('content')) ? $this->input->get_post('content') : '';
		$status = ($this->input->get_post('status')) ? $this->input->get_post('status') : '';
		$published = ($this->input->get_post('published_date')) ? $this->input->get_post('published_date'): '';
		$data = array('news_date_published'=>$published,
					  'news_date_created'=>date('Y-m-d H:i:s'),
					  'news_date_modified'=>date('Y-m-d H:i:s'),
					  'news_title'=>strip_tags(trim($title)),
					  'news_slug'=>format_uri($title),
					  'news_summary'=>htmlentities(trim($summary)),
					  'news_content'=>trim($content),
					  'news_status'=>$status
						);
		$insert = $this->db->insert('news', $data);
		if($insert) {
			$response_code = REST_Controller::HTTP_CREATED;
			$result = array('status'=>'success', 'display_message'=>'Data Added!', 'time'=>date('Y-m-d H:i:s'));
		}else {
			$response_code = REST_Controller::HTTP_NOT_MODIFIED;
			$result = array('status'=>'failed', 'display_message'=>'Error added data', 'time'=>date('Y-m-d H:i:s'));
		}

	}

	function get_response($data) {
		$id = $this->get('id');
		if($id === NULL){
			if($data) {
				$response_code = REST_Controller::HTTP_OK;
            	$result = array('status'=>'success', 'display_message'=>'Get data topic', 'data'=>$data, 'time'=>date('Y-m-d H:i:s'));
			}else {
				$response_code = REST_Controller::HTTP_NOT_FOUND;
            	$result = array('status'=>'failed', 'display_message'=>'There is no data were found', 'time'=>date('Y-m-d H:i:s'));
			}
		}else {
			$id = (int) $id;
			if ($id <= 0) {
				$response_code = REST_Controller::HTTP_BAD_REQUEST; // BAD_REQUEST (400) being the HTTP response code
				$result = array('status'=>'failed', 'display_message'=>'Invalid id', 'time'=>date('Y-m-d H:i:s'));
			}else {
				if(!empty($data)) {
					$item = NULL;

					foreach ($data as $key => $value) {
						if(isset($value['topic_id']) && $value['topic_id'] == $id){
							$item = $value;
						}
					}

		            $response_code = REST_Controller::HTTP_OK;
		            $result = array('status'=>'success', 'display_message'=>'Get data topic', 'data'=>$item, 'time'=>date('Y-m-d H:i:s'));
				}
			}
		}

		$this->set_response($result, $response_code);
	}


}