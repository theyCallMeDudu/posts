
<?php

    require "WordpressController.php";
    // Require wp-load.php to use built-in WordPress functions
    require_once("../wp-load.php");
    
    // Include image.php tp use built-in image WordPress functions
    include_once( ABSPATH . 'wp-admin/includes/image.php' );
   
    /*****************
    * POST VARIABLES *
    ******************/

    $postType = 'post'; // set to post or page;
    $userID = '1'; // get_current_user_id(); // set to user id;
    $categoryID = '5'; // set to category id;
    $postStatus = 'publish'; // set to future, draft or publish;

    $leadTitle = 'First post with PHP, today: '.date("d/n/Y");
    $leadContent = '<h1>First test post with PHP</h1><p>This is the first post on WordPress made programatically with PHP.</p>';

    /********************************
     * TIME VARIABLES/ CALCULATIONS *
    *********************************/

    // VARIABLES
    $timeStamp = $minuteCounter = 0; // set all timers to 0;
    $iCounter = 1; // number use to multiply by minute increment;
    $minuteIncrement = 1; // increment which to increase each post time for feature schedule;
    $adjustClockMinutes = 0; // add 1 hour or 60 minutes - daylight savings;

    // CALCULATIONS
    $minuteCounter = $iCounter * $minuteIncrement; // setting how far out in time to post if future;
    $minuteCounter = $minuteCounter + $adjustClockMinutes; // adjusting for server timezone;

    date_default_timezone_set('America/Sao_Paulo');

    $timeStamp = date('Y-m-d H:i:s', strtotime("+$minuteCounter min")); // format needed for WordPress;

    /*********************************************
     * WordPress array and variables for posting *
    *********************************************/
    
   
    
     foreach ($arrayPosts as $key => $valores) {
        $newPost = array(
            'post_title' => $valores->title,
            'post_content' => $valores->content,
            'post_status' => $postStatus,
            'post_date' => $timeStamp,
            'post_author' => $userID,
            'post_type' => $postType,
            'post_category' => array($categoryID)
        );
    }

     /***************************
      * WordPress post function *
     ***************************/

      $post_id = wp_insert_post($newPost); // WordPress post ID will be used for featured image to be set too;

      /*************************
       * Simple error checking *
      *************************/

      $finalText = '';

      if($post_id){
        //  $finalText = 'Uhul \o/, I made a new post!<br>';
        
         
      } else{
         $finalText = 'Something went wrong and I didn\'t insert a new post :(<br>';
      }

      echo $finalText;

      
      // Image to be uploaded to WordPress and set as featured image
     // $IMGFileName = $Foto[0];
      foreach($arrayPosts as $key => $valor){
        $IMGFileName = $valor->foto;
    }

      // Current path directory
      
     
      $dirPath = getcwd();
        

      // Full path of image
      $IMGFilePath = $dirPath.'/'.$IMGFileName;
      

      // Messages for file found/ not found in directory
      $message = $IMGFileName.' is not available or found in directory.';

      // Does image file exists in directory?
      if(file_exists($IMGFileName)){
        
        // Prepare upload image to WordPress Media Library
        $upload = wp_upload_bits($IMGFileName, null, file_get_contents($IMGFilePath, FILE_USE_INCLUDE_PATH));

        // Check and return file type
        $imageFile = $upload['file'];
        $wpFileType = wp_check_filetype($imageFile, null);

        // Attachment attributes for file
        $attachment = array(
            'post_mime_type' => $wpFileType['type'], //file type
            'post_title' => sanitize_file_name($imageFile), // sanitize and use image name as file name
            'post_content' => '', // could use the image description as content
            'post_status' => 'inherit'
        );

        // Insert and return attachment id
        $attachmentID = wp_insert_attachment($attachment, $imageFile, $post_id);

        // Insert and return attachment metadata
        $attachmentData = wp_generate_attachment_metadata($attachmentID, $imageFile);

        // Update and return attachment metadata
        wp_update_attachment_metadata($attachmentID, $attachmentData);

        // Associate attachment id to post id
        $success = set_post_thumbnail($post_id, $attachmentID);

        // Was featured image associated with post?
        if($success){
            $message = $IMGFileName.' has been added as featured image to post.';
        } else{
            $message = $IMGFileName.' has NOT been added as featured image to post.';
        }

      }
    
   // echo $message;
     // header("refresh:5; http://localhost/postMakerWP-master/public/posts");
      // http://localhost/wordpress/test/test.php


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unirio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script type="text/javascript">
   function goBack() {
    window.history.back()
   }
</script>
</head>
 
<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container">
			<a class="navbar-brand" href="#">
				<img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
			  	UNIRIO
			</a>
			<a class="navbar-nav ml-auto" href="sair.php">
					Sair
			</a>
    </div>
  </nav>

 <div class="container" style="margin-top: 30px;">
 <div class="alert alert-success text-center" role="alert">
  Sua publicação foi realizada com sucesso. Dentro de alguns instantes ela estará na plataforma Wordpress!
 </div>

<div class="card">
  <div class="card-header">
      Dados da publicação
  </div>
  <div class="card-body">
  <?php foreach($arrayPosts as $indice => $post){ ?>
       <p> <strong> Titulo da publicação </strong> - <span><?=$post->title?></span></p>
       <p> <strong>Conteudo da publicação </strong> - <span><?=$post->content?></span></p>
       <p></strong> Foto da publicação </strong></p> <br>
       <img src="<?=$post->foto?>" alt="">
       									
										
 <?php } ?>
    
    <div style="position: absolute; bottom: 0; margin-bottom: 10px;">
      <button onclick="goBack()" class="btn btn-danger text-right">Voltar</button>
    </div>

  </div>
 </div>
</div>
 
</body>
</html>

