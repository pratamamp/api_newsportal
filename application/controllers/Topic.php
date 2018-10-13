<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
/** @noinspection PhpIncludeInspection */
//To Solve File REST_Controller not found
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Topic extends REST_Controller {
	function __construct(){
        // Construct the parent class
        parent::__construct();
        $this->load->database();
   	}

   	function _index_get() {
   		
		$topic = $this->db->get('topic')->result();

		$id = $this->get('id');
		if($id === NULL){
			if($topic) {
				$response_code = REST_Controller::HTTP_OK; // OK (200) being the HTTP response code
            	$result = array('status'=>'success', 'display_message'=>'Get data topic', 'data'=>$topic, 'time'=>date('Y-m-d H:i:s'));
			}else {
				$response_code = Rest_Controller::HTTP_NOT_FOUND;
            	$result = array('status'=>'failed', 'display_message'=>'There is no data were found', 'time'=>date('Y-m-d H:i:s'));
			}
		}else {
			$result = array('status'=>'success', 'display_message'=>'masuk');
			$response_code = Rest_Controller::HTTP_OK;

		}


		$this->set_response($result, $response_code);

   	}

   	function index_get() {
   		$data = $this->db->get('topic')->result_array();

   		$id = $this->get('id');
   		if($id === NULL) {
   			if($data) {
   				$this->response($data, REST_Controller::HTTP_OK);
   			}else {
   				$this->response([
                    'status' => FALSE,
                    'message' => 'No users were found'
                ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
   			}
   		}

   		/*$id = (int) $id;

        // Validate the id.
        if ($id <= 0){
            // Invalid id, set the response and exit.
            $this->response(NULL, REST_Controller::HTTP_BAD_REQUEST); // BAD_REQUEST (400) being the HTTP response code
        }

        $item = NULL;

        if (!empty($data))
        {
            foreach ($data as $key => $value)
            {
                if (isset($value['id']) && $value['id'] === $id)
                {
                    $item = $value;
                }
            }
        }*/

        
   	}


}