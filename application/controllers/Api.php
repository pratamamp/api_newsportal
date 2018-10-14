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
		$id = $this->get('id');
		if($id === NULL){
			$resdata = $this->db->get('topic')->result_array();
			if($resdata) {
				$response_code = REST_Controller::HTTP_OK;
            	$result = array('status'=>'success', 'display_message'=>'Get data topic', 'data'=>$resdata, 'time'=>date('Y-m-d H:i:s'));
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
				
				$this->db->where('topic_id', $id);
				$resdata = $this->db->get('topic')->result();
				
	            $response_code = REST_Controller::HTTP_OK;
	            $result = array('status'=>'success', 'display_message'=>'Get data topic', 'data'=>$resdata, 'time'=>date('Y-m-d H:i:s'));
				
			}
		}
		$this->set_response($result, $response_code);
	}

	function topic_post() {
		$title = ($this->input->get_post('topic_title'))? $this->input->get_post('topic_title') : '';
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

	function topic_put() {
		$title = ($this->put('title')) ? $this->put('title') : '';
		$id = $this->get('id');
		if($id <=0) {
			$response_code = REST_Controller::HTTP_BAD_REQUEST; // BAD_REQUEST (400) being the HTTP response code
			$result = array('status'=>'failed', 'display_message'=>'Invalid id', 'time'=>date('Y-m-d H:i:s'));
		}else {
			$data = array('topic_title'=>$title, 'topic_slug'=>format_uri($title));
			$this->db->where('topic_id', $id);
			$update = $this->db->update('topic',$data);
			if($update) {
				$response_code = REST_Controller::HTTP_CREATED;
				$result = array('status'=>'success', 'display_message'=>'Data Modified!', 'time'=>date('Y-m-d H:i:s'));
			}else {
				$response_code = REST_Controller::HTTP_NOT_MODIFIED;
				$result = array('status'=>'failed', 'display_message'=>'Error modified data', 'time'=>date('Y-m-d H:i:s'));
			}
		}
		$this->set_response($result, $response_code);
	}

	function topic_delete() {
		$id = $this->get('id');
		if($id <=0) {
			$response_code = REST_Controller::HTTP_BAD_REQUEST; // BAD_REQUEST (400) being the HTTP response code
			$result = array('status'=>'failed', 'display_message'=>'Invalid id', 'time'=>date('Y-m-d H:i:s'));
		}else {
			$this->db->where('topic_id',$id);
			$deleted = $this->db->delete('topic');
			if($deleted) {
				$response_code = REST_Controller::HTTP_OK;
				$result = array('status'=>'success', 'display_message'=>'Data Deleted!', 'time'=>date('Y-m-d H:i:s'));
			}else {
				$response_code = REST_Controller::HTTP_NOT_MODIFIED;
				$result = array('status'=>'failed', 'display_message'=>'Error delete data', 'time'=>date('Y-m-d H:i:s'));
			}
		}
		$this->set_response($result, $response_code);
	}


	function news_get() {
		$id = $this->get('id');
		$status = $this->get('status');
		if($id === NULL){
			$newsdata = $this->db->get('news')->result_array();
			if($newsdata) {
				$response_code = REST_Controller::HTTP_OK;
            	$result = array('status'=>'success', 'display_message'=>'Get data', 'data'=>$newsdata, 'time'=>date('Y-m-d H:i:s'));
			}else {
				$response_code = REST_Controller::HTTP_NOT_FOUND;
            	$result = array('status'=>'failed', 'display_message'=>'There is no data were found', 'time'=>date('Y-m-d H:i:s'));
			}
		}else {
			// if id is numeric then search by id whether by topic
			if(is_numeric($id)) {
				// $id = (int) $id;
				if ($id <= 0) {
					$response_code = REST_Controller::HTTP_BAD_REQUEST; // BAD_REQUEST (400) being the HTTP response code
					$result = array('status'=>'failed', 'display_message'=>'Invalid id', 'time'=>date('Y-m-d H:i:s'));
				}else {
					$this->db->where('news_id', $id);
					$newsdata = $this->db->get('news')->result_array();
		            $response_code = REST_Controller::HTTP_OK;
		            $result = array('status'=>'success', 'display_message'=>'Get data topic', 'data'=>$newsdata, 'time'=>date('Y-m-d H:i:s'));
				}
			}else {
				// get topic id
				$this->db->where('topic_slug',strtolower(format_uri($id)));
				$topic = $this->db->get('topic');
				if($topic->num_rows() > 0){
					$topicId = $topic->row_array()['topic_id'];
					// search where topic id 
					$this->db->where('topic_id', $topicId);
					$get = $this->db->select('*')
							 ->from('news_topic t')
							 ->join('news n', 'n.news_id = t.news_id')
							 ->get();
					$news = $get->result_array();
					$get->free_result();
					$response_code = REST_Controller::HTTP_OK;
		            $result = array('status'=>'success', 'display_message'=>'Get data topic', 'data'=>$news, 'time'=>date('Y-m-d H:i:s'));
				}else {
					$response_code = REST_Controller::HTTP_NOT_FOUND;
            		$result = array('status'=>'failed', 'display_message'=>'There is no data were found', 'time'=>date('Y-m-d H:i:s'));
				}

			}
			
		}

		if(isset($status)) {
			$this->db->where('news_status', $status);
			$sortBystatus = $this->db->get('news');
			if($sortBystatus->num_rows() > 0) {
				$response_code = REST_Controller::HTTP_OK;
		        $result = array('status'=>'success', 'display_message'=>'Get data topic', 'data'=>$sortBystatus->result_array(), 'time'=>date('Y-m-d H:i:s'));
			}else {
				$response_code = REST_Controller::HTTP_NOT_FOUND;
            	$result = array('status'=>'failed', 'display_message'=>'There is no data were found', 'time'=>date('Y-m-d H:i:s'));
			}
		}
		$this->set_response($result, $response_code);
	}

	function news_post() {
		$title = ($this->input->get_post('title')) ? $this->input->get_post('title') : '';
		$summary = ($this->input->get_post('summary')) ? $this->input->get_post('summary') : '';
		$content = ($this->input->get_post('content')) ? $this->input->get_post('content') : '';
		$topic  = ($this->input->get_post('topics')) ? $this->input->get_post('topics') : '';
		$status = ($this->input->get_post('status')) ? $this->input->get_post('status') : '';
		$published = ($this->input->get_post('published_date')) ? $this->input->get_post('published_date'): '';
		$data = array('news_date_published'=>$published,
					  'news_date_created'=>date('Y-m-d H:i:s'),
					  'news_date_modified'=>date('Y-m-d H:i:s'),
					  'news_title'=>strip_tags(trim($title)),
					  'news_topic'=>trim($topic),
					  'news_slug'=>format_uri($title),
					  'news_summary'=>htmlentities(trim($summary)),
					  'news_content'=>trim($content),
					  'news_status'=>$status
						);
		// check existed topic
		
		$insert = $this->db->insert('news', $data);
		if($insert) {
			$idNews = $this->db->insert_id();
			// Topics
			if(isset($topic)) {
				$topicList = explode(',' ,$topic);
				foreach ($topicList as $topicItem) {
					// check if topic existed
					$this->db->where('topic_slug', strtolower(format_uri($topicItem)));
					$existed = $this->db->get('topic')->row_array();
					if(!$existed) {
						// add new topic
						$topicData = array('topic_title'=>$topicItem, 'topic_slug'=>format_uri($topicItem), 'topic_count'=>1);
						$newTopic = $this->db->insert('topic', $topicData);
						$id = $this->db->insert_id();
						if($insert) $this->add_news_topic($idNews, $id);
					}else {
						$this->add_news_topic($idNews, $existed['topic_id']);
						// update counter topic
						$this->add_counter_topic($existed['topic_id']);
						
					}
				}
			}
			$response_code = REST_Controller::HTTP_CREATED;
			$result = array('status'=>'success', 'display_message'=>'Data Added!', 'time'=>date('Y-m-d H:i:s'));
		}else {
			$response_code = REST_Controller::HTTP_NOT_MODIFIED;
			$result = array('status'=>'failed', 'display_message'=>'Error added data', 'time'=>date('Y-m-d H:i:s'));
		}

		$this->set_response($result, $response_code);

	}

	function news_put() {
		$title = ($this->put('title')) ? $this->put('title') : '';
		$summary = ($this->put('summary')) ? $this->put('summary') : '';
		$content = ($this->put('content')) ? $this->put('content') : '';
		// $topic  = ($this->input->get_post('topics')) ? $this->input->get_post('topics') : '';
		$status = ($this->put('status')) ? $this->put('status') : '';
		$published = ($this->put('published_date')) ? $this->put('published_date'): '';
		$data = array('news_date_published'=>$published,
					  'news_date_modified'=>date('Y-m-d H:i:s'),
					  'news_title'=>strip_tags(trim($title)),
					  'news_slug'=>format_uri($title),
					  'news_summary'=>htmlentities(trim($summary)),
					  'news_content'=>trim($content),
					  'news_status'=>$status
						);
		$id = ($this->get('id')) ? $this->get('id') : '';

		if($id > 0){
			$this->db->where('news_id', $id);
			$update = $this->db->update('news', $data);
			
			if($update) {
				$response_code = REST_Controller::HTTP_CREATED;
				$result = array('status'=>'success', 'display_message'=>'Data Modified!', 'time'=>date('Y-m-d H:i:s'));
			}else {
				$response_code = REST_Controller::HTTP_NOT_MODIFIED;
				$result = array('status'=>'failed', 'display_message'=>'Error modified data', 'time'=>date('Y-m-d H:i:s'));
			}
		}else {
			$response_code = REST_Controller::HTTP_BAD_REQUEST; // BAD_REQUEST (400) being the HTTP response code
			$result = array('status'=>'failed', 'display_message'=>'Invalid id', 'time'=>date('Y-m-d H:i:s'));
		}

		$this->set_response($result, $response_code);
	}

	function news_delete() {
		$id = $this->get('id');
		if($id <=0) {
			$response_code = REST_Controller::HTTP_BAD_REQUEST; // BAD_REQUEST (400) being the HTTP response code
			$result = array('status'=>'failed', 'display_message'=>'Invalid id', 'time'=>date('Y-m-d H:i:s'));
		}else {
			$data = array('news_status'=>'deleted');
			$this->db->where('news_id', $id);
			$deleted = $this->db->update('news', $data);
			if($deleted) {
				$response_code = REST_Controller::HTTP_CREATED;
				$result = array('status'=>'success', 'display_message'=>'Data Deleted!', 'time'=>date('Y-m-d H:i:s'));
			}else {
				$response_code = REST_Controller::HTTP_NOT_MODIFIED;
				$result = array('status'=>'failed', 'display_message'=>'Error modified data', 'time'=>date('Y-m-d H:i:s'));
			}
		}

		$this->set_response($result, $response_code);
	}

	private function add_news_topic($newsid, $topicid) {
		$this->db->escape_str($newsid);
		$this->db->escape_str($topicid);
		$this->db->insert('news_topic', array('news_id'=>$newsid, 'topic_id'=>$topicid));
		return $this->db->insert_id();
	}

	private function add_counter_topic($id) {
		$this->db->set('topic_count', 'topic_count+1', FALSE);
		$this->db->where('topic_id', $id);
		$this->db->update('topic');
		
	}


}