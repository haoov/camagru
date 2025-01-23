<?php

require_once "../database.php";
require_once "./post.php";

class postModel {
	/**
	 * @param Post $post
	 * **/
	function newPost($post) {
		echo "Creating post $post->title\n";
		// $query = "INSERT INTO post (title) VALUES (?);";
		// $params = [$post->title];
		//
		// $db->execure_query($query, $params);
	}
}

?>
