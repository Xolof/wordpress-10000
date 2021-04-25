<?php
/**
* A script to programatically create a number of blog posts in WordPress.
*
*/

// require wp-load.php to use built-in WordPress functions
require_once("../wp-load.php");

function addPost($postNum, $dateTime)
{
    // Variables for the post
    $postType = 'post'; // set to post or page
    $userID = 0; // set to user id
    $categoryID = '2'; // set to category id.
    $postStatus = 'publish';  // set to future, draft, or publish
    $leadTitle = "Post {$postNum}";
    $leadContent = '<h1>A new post!</h1><p>This is a post created by a PHP-script.</p>';
    $leadContent .= "<!--more--> <p>This is post number {$postNum}.</p>";

    // WordPress Array and Variables for posting
    $new_post = array(
        'post_title' => $leadTitle,
        'post_content' => $leadContent,
        'post_status' => $postStatus,
        'post_date' => $dateTime,
        'post_author' => $userID,
        'post_type' => $postType,
        'post_category' => array($categoryID)
    );

    // WordPress Post Function
    $post_id = wp_insert_post($new_post);

    // Print if the posting succeeded or not.
    $finaltext = '';
    if($post_id) {
        $finaltext .= 'Post added!';
    } else {
        $finaltext .= 'Post creation failed!';
    }
    echo $finaltext;
}

$numPosts = 10000; // The number of posts to create.

for ($i = 0; $i < $numPosts; $i++) {
    $currentDateTime = date("Y-m-d H:i:s");
    $currentUNIX = strtotime($currentDateTime);
    $dateTime = date("Y-m-d H:i:s", $currentUNIX - 60 * $i);
    
    $postNum = $numPosts - $i;
    addPost($postNum, $dateTime);
}
