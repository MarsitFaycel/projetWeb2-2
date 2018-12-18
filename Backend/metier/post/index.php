<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="css/stylePageIndex.css">
    <title>Page1</title>

</head>
<body>
    <div class="wrapper">

        <nav class="main-nav">
            <ul>
                <li><a href="#">BREACK-LIMIT'S</a></li>

            </ul>
        </nav>

        <!-- top container-->
        <section class="top-container">
            <header class="showcase">
              <div class="slideshow-container">

<div class="mySlides fade">

  <img src="https://picsum.photos/800/500/?random" >

</div>

<div class="mySlides fade">

  <img src="https://picsum.photos/800/502/?random" >

</div>

<div class="mySlides fade">

  <img src="https://picsum.photos/801/501/?random" >

</div>
</div>
<br>

<div style="text-align:center">
  <span class="dot"></span>
  <span class="dot"></span>
  <span class="dot"></span>
</div>



          </header>
            <div class="top-box top-box-a">
              <label> Connexion</label>
              <form action="../auteur/connexion.php" method="POST">


                  <input type="text" name="login" id="login" placeholder="login" size="30" maxlength="20" autofocus required/><br>
                  <input type="text" name="password" id="password" placeholder="password" size="30" maxlength="30" autofocus required/><br>


                <input type="submit" value="ok" class="btn"><br>
                <input type="reset" value="reset" class="btn">

                </form>
 		<a href=""><h5>Mot de passe oubliée</h5></a>

            </div>
            <div class="top-box top-box-b">


                    <a href="../auteur/formulaireAuteur.html" class="btn">inscription</a>
                </div>
        </section>
        <p></p>
        <!--box section-->

        <p></p>
        <!--section info-->
        <section class="info">
            <div>
                <h2>Apropos de nous</h2>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Autem necessitatibus placeat maxime ex officia nobis recusandae cumque tempore sit cupiditate.</p>
                <a href="" class="btn">Learn more</a>
            </div>
        </section>
        <p></p>

        <!--portfolio-->
        <section class="portfolio">
            <img src="https://source.unsplash.com/random/200x200" alt="">
            <img src="https://source.unsplash.com/random/201x200" alt="">
            <img src="https://source.unsplash.com/random/202x200" alt="">
            <img src="https://source.unsplash.com/random/203x200" alt="">
            <img src="https://source.unsplash.com/random/204x200" alt="">
            <img src="https://source.unsplash.com/random/205x200" alt="">
	    <img src="https://source.unsplash.com/random/208x200" alt="">
	    <img src="https://source.unsplash.com/random/209x200" alt="">
<img src="https://source.unsplash.com/random/206x200" alt="">
<img src="https://source.unsplash.com/random/207x200" alt="">
<img src="https://source.unsplash.com/random/208x200" alt="">
<img src="https://source.unsplash.com/random/209x200" alt="">

        </section>


    <footer>
        <p>Student &copy; 2018</p>
    </footer>
    </div>
    <script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
      var i;
      var slides = document.getElementsByClassName("mySlides");
      var dots = document.getElementsByClassName("dot");
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      slideIndex++;
      if (slideIndex > slides.length) {slideIndex = 1}
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
      setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
    </script>
</body>
</html>
