<?php

class List {

	//Properties (Variables)
	private $meetups; //Array
	private $path; //String

	//Methods (Functions)
	public function setPath($path) {

		$this->path = $path;

	}

	public function getPath() {

		return $this->path;

	}

	public function getMeetups () {

		return $this->meetups;
	}
}