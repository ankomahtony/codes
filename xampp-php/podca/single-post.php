<?php 
include('functions.php'); 

//Single Post 
$podID = $_GET['podID'];
$podca_query = mysqli_query($connection, "SELECT * FROM `blog` WHERE SN = '$podID'");
$podca = mysqli_fetch_assoc($podca_query);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Ri-Podca &mdash; <?php echo $podca['title'];?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,700,900"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" type="text/css" href="dash_style.css"> -->
    
  </head>
  <body>
  
  <div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>


    <header class="site-navbar py-4 absolute transparent" role="banner">

      <div class="container">
        <div class="row align-items-center">
          

          <div class="col-3" data-aos="fade-down">
            <h1><a href="index.php" class="text-white h2">Ri-Podca</a></h1>
          </div>
          <div class="col-9" data-aos="fade-down">
            <nav class="site-navigation position-relative text-right text-md-right" role="navigation">

                

                <div class="d-inline-block ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none">
                  <li class="has-children">
                    <a href="index.html">Home</a>
                    <ul class="dropdown arrow-top">
                      <li><a href="#">Menu One</a></li>
                      <li><a href="#">Menu Two</a></li>
                      <li><a href="#">Menu Three</a></li>
                      <li class="has-children">
                        <a href="#">Sub Menu</a>
                        <ul class="dropdown">
                          <li><a href="#">Menu One</a></li>
                          <li><a href="#">Menu Two</a></li>
                          <li><a href="#">Menu Three</a></li>
                        </ul>
                      </li>
                    </ul>
                  </li>
                  <li class="has-children">
                    <a href="#">Dropdown</a>
                    <ul class="dropdown arrow-top">
                      <li><a href="#">Menu One</a></li>
                      <li><a href="#">Menu Two</a></li>
                      <li><a href="#">Menu Three</a></li>
                    </ul>
                  </li>
                  <li class="active"><a href="about.html">About</a></li>
                  <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>


          </div>

        </div>
      </div>
      
    </header>

   <?php echo '<div class="site-blocks-cover overlay inner-page-cover" style="background-image: url('.$podca['picture'].');" data-aos="fade" data-stellar-background-ratio="0.5">'; ?>
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">
          <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
            <h2 class="text-white font-weight-light mb-2 display-4"><?php echo 'Episode '.$podca['episodeNumber'];?>: <?php echo $podca['title']; ?></h2>
            <div class="text-white mb-3"><span class="text-white-opacity-05"><small><?php echo $podca['author'];?>  <span class="sep">/</span> <?php echo $podca['datePosted'];?> <span class="sep">/</span><?php echo $podca['timePosted'];?></small></span></div>
          </div>
        </div>
      </div>
    </div>  
    
    <div class="container site-section">
    
      <div class="player mb-5">
        <audio id="player2" preload="none" controls style="max-width: 100%">
          <?php echo '<source src="'.$podca['audio'].'" type="audio/mp3">'; ?>
        </audio>
      </div>

      <div class="row justify-content-center">
        <div class="col-md-7">
      

      <?php
          if(isset($_POST['post'])){
            $speaker = $_POST['speaker'];
            $message = $_POST['message'];


          $query_conv = mysqli_query($connection, "INSERT INTO conversation (blogSN, speaker,message) VALUES ('$podID','$speaker','$message')");
        }

          $post_conv = mysqli_query($connection, "SELECT * FROM conversation WHERE blogSN = '$podID'");
          
          while ($chat=mysqli_fetch_array($post_conv)) {
            echo '<p style="color:white; background-color:brown;"><strong class="font-weight-bold font-weight-bold" style="color:blue; background-color:yellow;"> '.$chat['speaker'].' :</strong> '.$chat['message'].'</p>';
          }
       ?>
       <?php
if (isset($_SESSION['user'])) {
    echo '<form method="post">
        Speaker: <input type="text" name="speaker" class="form-control">
        Message: <input type="text" name="message" class="form-control message" >
        <button type="submit" name="post">Post</button>
      </form>';
}

?>
       
      <br>
       </div>
      </div>
      <div class="row justify-content-left">
        <div class="col-md-5">
      

              <?php
                  if(isset($_POST['postComment'])){
                    $author = $_POST['author'];
                    $comment = $_POST['comment'];


                  $query_conv = mysqli_query($connection, "INSERT INTO comment (onContent, author,message) VALUES ('$podID','$author','$comment')");
                }

                  $post_comm = mysqli_query($connection, "SELECT * FROM comment WHERE onContent = '$podID'");
                  
                  while ($comm=mysqli_fetch_array($post_comm)) {
                    echo '<p style="color:darkblue;"><strong class="font-weight-bold font-weight-bold" style="color:blue; background-color:yellow;">'.$comm['author'].' :</strong>'.$comm['message'].'</p>';
                  }
               ?>
           <form method="post">
            Speaker: <input type="text" name="author" class="form-control">
            Comment: <input type="text" name="comment" class="form-control message" >
            <button type="submit" name="postComment">Comment</button>
          </form>
          <br>
       </div>
      </div>

    </div>

    <div class="site-section bg-light">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12 text-center">
            <h2 class="font-weight-bold text-black">Related Podcasts</h2>
          </div>
        </div>
        <div class="row">
          <?php  
            $query_all = mysqli_query($connection,"SELECT * FROM blog order by SN desc limit 2");

            while ($podcaRec = mysqli_fetch_array($query_all)) {
              echo '<div class="col-md-6">
            <div class="d-block podcast-entry bg-white mb-5" data-aos="fade-up">
              <div class="image w-100" style="height: 300px; background-image: url('.$podcaRec['picture'].');"></div>
              <div class="text w-100">

                <h3 class="font-weight-light"><a href="single-post.html">Episode '.$podcaRec['episodeNumber'].': '.$podcaRec['title'].'</a></h3>
                <div class="text-white mb-3"><span class="text-black-opacity-05"><small>By Mike Smith <span class="sep">/</span> '.$podcaRec['datePosted'].' <span class="sep">/</span> '.$podcaRec['timePosted'].'</small></span></div>
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti repellat mollitia consequatur, optio nesciunt placeat. Iste voluptates excepturi tenetur, nesciunt.</p>


                <div class="player">
                  <audio id="player2" preload="none" controls style="max-width: 100%">
                    <source src="http://www.largesound.com/ashborytour/sound/AshboryBYU.mp3" type="audio/mp3">
                  </audio>
                </div>

              </div>
            </div>
          </div>';
            }
          ?>
        </div>
      </div>
    </div>
    
<?php include_once('inc/footer.html') ?>