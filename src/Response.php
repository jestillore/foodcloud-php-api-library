<?php

namespace Foodcloud\APILibrary;

class Response
{

	private $success;
	private $status;
	private $data;

	public function __construct($success = true, $status = 200, $data = []) {
		$this->success = $success;
		$this->status = $status;
		$this->data = $data;
	}

	public function isSuccess() {
		return $this->success;
	}

	public function setSuccess($success) {
		$this->success = $success;
		return $this;
	}

	public function getStatus() {
		return $this->status;
	}

	public function setStatus($status) {
		$this->status = $status;
		return $this;
	}

	public function getData() {
		return $this->data;
	}

	public function setData($data) {
		$this->data = $data;
		return $this;
	}

	public function __toString() {
		return $this->data;
	}

}
