<?php

class Post {
	public string $title;

	/**
	 * @param string $title;
	 * **/
	public function __construct($title) {
		$this->title = $title;
	}
}

?>
