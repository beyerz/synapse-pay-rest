<?php

namespace SynapsePayRest;

// use SynapsePayRest\HelperFunctions;

class Node{

	function __construct($client){
		$this->client = $client;
	}

	function create_node_path($node_id=null){
		$path = '/users/' . $this->client->user_id . '/nodes';
		if($node_id){
			return $path . '/' . $node_id;
		}
		return $path;
	}

	function add($payload=null){
		if($payload){
			$path = $this->create_node_path();
			$response = $this->client->post($path, $payload);
		}else{
			$response = HelperFunctions::create_custom_error_message('payload');
		}
		return $response;
	}

	function get($node_id=null, $page=null){
		$path = $this->create_node_path($node_id);
		if($node_id){
			if($page){
				$path = $path . '?page=' . $query;
				if($per_page){
					$path = $path . '&per_page=' . $per_page;
				}
			}elseif($per_page){
				$path = $path . '?per_page=' . $per_page;
			}
		}
		$response = $this->client->get($path);
		return $response;
	}

	function verify($node_id=null, $payload){
		$path = $this->create_node_path($node_id);
		if($node_id){
			$response = $this->client->patch($path, $payload);
		}else{
			$response = $this->client->post($path, $payload);
		}
		return $response;
	}

	function delete($node_id){
		$path = $this->create_node_path($node_id);
		$response = $this->client->delete($path);
		return $response;
	}
}