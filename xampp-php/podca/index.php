<?php include('functions.php'); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Ri-Podca &mdash; Homepage</title>
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
            <h1><a href="#" class="text-white h2">Ri-Podca</a></h1>
          </div>
          <div class="col-9" data-aos="fade-down">
            <nav class="site-navigation position-relative text-right text-md-right" role="navigation">

                

                <div class="d-inline-block ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

                <ul class="site-menu js-clone-nav d-none">
                  <li class="has-children active">
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
                  <li><a href="about.html">About</a></li>
                  <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>


          </div>

        </div>
      </div>
      
    </header>

    <?php echo '<div class="site-blocks-cover overlay" style="background-image: url('.$podca_last['picture'].');" data-aos="fade" data-stellar-background-ratio="0.5">'; ?>
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-8" data-aos="fade-up" data-aos-delay="400">
            <?php echo '<h2 class="text-white font-weight-light mb-2 display-4">Episode 0'.$podca_last['episodeNumber'].': '.$podca_last['title'].'</h2>'; ?>
            
            <div class="text-white mb-4"><span class="text-white-opacity-05"><small>By <?php echo $podca_last['author']; ?> | <?php echo $podca_last['datePosted'];?> | <?php echo $podca_last['timePosted'];?></small></span></div>
            <?php echo '<p><a href="single-post.php?podID='.$podca_last['SN'].'" class="btn btn-primary btn-sm py-3 px-4 small">Read The Transcript</a></p>';?>

            <div class="player">
              <audio id="player2" preload="none" controls style="max-width: 100%">
                <?php echo '<source src="'.$podca_last['audio'].'" type="audio/mp3">'; ?>
              </audio>
            </div>

          </div>
        </div>
      </div>
    </div>  


    <div class="site-section bg-light">
      <div class="container">

        <div class="row mb-5" data-aos="fade-up">
          <div class="col-md-12 text-center">
            <h2 class="font-weight-bold text-black">Recent Podcasts</h2>
          </div>
        </div>

        <?php 
          $query_all = mysqli_query($connection,"SELECT * FROM blog order by SN desc");

          while ($podca = mysqli_fetch_array($query_all)) {
            echo ' <div class="d-block d-md-flex podcast-entry bg-white mb-5" data-aos="fade-up">
          <div class="image" style="background-image: url('.$podca['picture'].');"></div>
          <div class="text">

            <h3 class="font-weight-light"><a href="single-post.php?podID='.$podca['SN'].'">Episode '.$podca['episodeNumber'].': '.$podca['title'].'</a></h3>
            <div class="text-white mb-3"><span class="text-black-opacity-05"><small>'.$podca['author'].' <span class="sep">/</span> '.$podca['datePosted'].' <span class="sep">/</span> '.$podca['timePosted'].'</small></span></div>
            <p class="mb-4">'.$podca['content'].'</p>

            <div class="player">
              <audio id="player2" preload="none" controls style="max-width: 100%">
                <source src="'.$podca['audio'].'" type="audio/mp3">
              </audio>
            </div>

          </div>
        </div>';
          }
        ?>

      </div>
      <div class="container" data-aos="fade-up">
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="site-block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section">
      <div class="container" data-aos="fade-up">
        <div class="row mb-5">
          <div class="col-md-12 text-center">
            <h2 class="font-weight-bold text-black">Behind The Mic</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
            <div class="team-member">

              <img src="images/wonsano.jpg" alt="Image" class="img-fluid">

              <div class="text">

                <h2 class="mb-2 font-weight-light h4">Michael Acheampong</h2>
                <span class="d-block mb-2 text-white-opacity-05">Co Director</span>
                <p class="mb-4">This man like coding like a jonky like cocaine. He has a lot of information to give you.</p>
                <p>
                  <a href="#" class="text-white p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-white p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-white p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>

            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
            <div class="team-member">

              <img src="images/tony.jpg" alt="Image" class="img-fluid">

              <div class="text">

                <h2 class="mb-2 font-weight-light h4">Anthony Ankomah</h2>
                <span class="d-block mb-2 text-white-opacity-05">Co Director</span>
                <p class="mb-4">Another Guru like Mike. They don't while code is dancing, they dance with it till both get fed up &#128522; </p>
                <p>
                  <a href="#" class="text-white p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-white p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-white p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>

            </div>
          </div>

          <div class="col-md-6 col-lg-4 mb-5 mb-lg-5">
            <div class="team-member">

              <img src="images/person_3.jpg" alt="Image" class="img-fluid">

              <div class="text">

                <h2 class="mb-2 font-weight-light h4"> Sir Richmond </h2>
                <span class="d-block mb-2 text-white-opacity-05">Executive Speaker</span>
                <p class="mb-4">Sense speaking is a gift from Supreme Almighty God. He is rich of the gift. Dare him and proof you are fool! &#128522; </p>
                <p>
                  <a href="#" class="text-white p-2"><span class="icon-facebook"></span></a>
                  <a href="#" class="text-white p-2"><span class="icon-twitter"></span></a>
                  <a href="#" class="text-white p-2"><span class="icon-linkedin"></span></a>
                </p>
              </div>

            </div>
          </div>



        </div>
      </div>
    </div>

    <div class="site-section bg-light block-13">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12 text-center">
            <h2 class="font-weight-bold text-black">Featured Guests</h2>
          </div>
        </div>
        <div class="nonloop-block-13 owl-carousel">
          
          <div class="text-center p-3 p-md-5 bg-white">
            <div class="mb-4">            
              <img src="images/person_3.jpg" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
            </div>
            <div class="">
              <h3 class="font-weight-light h5">Kofi Apaloo</h3>
              <p>Like Wonsano and Tony, This guy too is crazy programmer, KofiJavaSpan &#128522; </p>
            </div>
          </div>

          <div class="text-center p-3 p-md-5 bg-white">
            <div class="mb-4">            
              <img src="images/person_4.jpg" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
            </div>
            <div class="">
              <h3 class="font-weight-light h5">Prince Baidoo</h3>
              <p>A chemist amidst programmers and Speaker, Anwansenaaa! &#128522; </p>
            </div>
          </div>

          <div class="text-center p-3 p-md-5 bg-white">
            <div class="mb-4">            
              <img src="images/person_3.jpg" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
            </div>
            <div class="">
              <h3 class="font-weight-light h5">Philip Martin</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, iusto. Aliquam illo, cum sed ea? Ducimus quos, ea?</p>
            </div>
          </div>

          <div class="text-center p-3 p-md-5 bg-white">
            <div class="mb-4">            
              <img src="images/person_4.jpg" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
            </div>
            <div class="">
              <h3 class="font-weight-light h5">Steven Ericson</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, iusto. Aliquam illo, cum sed ea? Ducimus quos, ea?</p>
            </div>
          </div>

          <div class="text-center p-3 p-md-5 bg-white">
            <div class="mb-4">            
              <img src="images/person_5.jpg" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
            </div>
            <div class="">
              <h3 class="font-weight-light h5">Nathan Dumlao</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, iusto. Aliquam illo, cum sed ea? Ducimus quos, ea?</p>
            </div>
          </div>

          <div class="text-center p-3 p-md-5 bg-white">
            <div class="mb-4">            
              <img src="images/person_6.jpg" alt="Image" class="w-50 mx-auto img-fluid rounded-circle">
            </div>
            <div class="">
              <h3 class="font-weight-light h5">Brook Smith</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Et, iusto. Aliquam illo, cum sed ea? Ducimus quos, ea?</p>
            </div>
          </div>

        </div>
      </div>
    </div>


    <div class="site-blocks-cover overlay inner-page-cover" style="background-image: url(images/hero_bg_1.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center text-center">

          <div class="col-md-6" data-aos="fade-up" data-aos-delay="400">
            <h2>Subscribe</h2>
            <p class="mb-5">Subscribe for more Podcast updates in your Mail</p>
            <form action="#" method="post" class="site-block-subscribe">
                <div class="input-group mb-3">
                  <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="button-addon2">Send</button>
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>  

    
    
<?php include_once('inc/footer.html') ?>