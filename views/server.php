<?php 
// connect to database
include  '../database.php';
$pdo= config1::getConnexion();



// lets assume a user is logged in with id $user_id

$user_id =  88;
//echo($user_id);
if (!$pdo) {
  exit();
}

// if user clicks like or dislike button
if (isset($_POST['action'])) {
  $post_id = $_POST['post_id'];
  $action = $_POST['action'];
  switch ($action) {
  	case 'like':
         $sql="INSERT INTO rating_info (user_id, post_id, rating_action) 
         	   VALUES ($user_id, $post_id, 'like') 
         	   ON DUPLICATE KEY UPDATE rating_action='like'";
         break;
  	case 'dislike':
          $sql="INSERT INTO rating_info (user_id, post_id, rating_action) 
               VALUES ($user_id, $post_id, 'dislike') 
         	   ON DUPLICATE KEY UPDATE rating_action='dislike'";
         break;
  	case 'unlike':
	      $sql="DELETE FROM rating_info WHERE user_id=$user_id AND post_id=$post_id";
	      break;
  	case 'undislike':
      	  $sql="DELETE FROM rating_info WHERE user_id=$user_id AND post_id=$post_id";
      break;
  	default:
  		break;
  }

  // execute query to effect changes in the database ...
  $result = $pdo->query($sql) ; 

  echo getRating($post_id);
  exit(0);
}

// Get total number of likes for a particular post
function getLikes($id)
{
  global $pdo;
  $sql = "SELECT COUNT(*) FROM rating_info 
  		  WHERE post_id = $id AND rating_action='like'";
  		  $rs= $pdo->query($sql);
  $result = $rs->fetch(PDO::FETCH_BOTH);
  return $result[0];
}

// Get total number of dislikes for a particular post
function getDislikes($id)
{
  global $pdo;
  $sql = "SELECT COUNT(*) FROM rating_info 
  		  WHERE post_id = $id AND rating_action='dislike'";
$rs= $pdo->query($sql);
  $result = $rs->fetch(PDO::FETCH_BOTH);
  return $result[0];
}

// Get total number of likes and dislikes for a particular post
function getRating($id)
{
  global $pdo;
  $rating = array();
  $likes_query = "SELECT COUNT(*) FROM rating_info WHERE post_id = $id AND rating_action='like'";
  $dislikes_query = "SELECT COUNT(*) FROM rating_info 
		  			WHERE post_id = $id AND rating_action='dislike'";
		  			$likes_rs= $pdo->query($likes_query);
$dislikes_rs= $pdo->query($dislikes_query);
  $likes= $likes_rs->fetch(PDO::FETCH_BOTH);
  $dislikes= $dislikes_rs->fetch(PDO::FETCH_BOTH);
  
  $rating = [
  	'likes' => $likes[0],
  	'dislikes' => $dislikes[0]
  ];
  return json_encode($rating);
}

// Check if user already likes post or not
function userLiked($post_id)
{
  global $pdo;
  global $user_id;
  $sql = "SELECT * FROM rating_info WHERE user_id=$user_id 
  		  AND post_id=$post_id AND rating_action='like'";
  $result = $pdo->query($sql);
  if ($result->Rowcount() > 0) {
  	return true;
  }else{
  	return false;
  }
}

// Check if user already dislikes post or not
function userDisliked($post_id)
{
  global $pdo;
  global $user_id;
  $sql = "SELECT * FROM rating_info WHERE user_id=$user_id 
  		  AND post_id=$post_id AND rating_action='dislike'";
  $result = $pdo->query($sql);
  if ($result->Rowcount() > 0) {
  	return true;
  }else{
  	return false;
  }
}

$sql = "SELECT * FROM question";
$result = $pdo->query($sql);
// fetch all posts from database
// return them as an associative array called $posts
$posts = $result->fetchAll();