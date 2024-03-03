<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link
      href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css"
    />
    <link rel="stylesheet" href="styles.css" />
    <title>Nafis Portfoilo</title>
  </head>






  <body>
    <header class="header">
      
      <nav>
        <div class="nav__bar">
          <div class="nav__header">
            
            <div class="nav__menu__btn" id="menu-btn">
              <span><i class="ri-menu-3-line"></i></span>
            </div>
          </div>
          <ul class="nav__links" id="nav-links">
            <li class="link"><a href="#home">Home</a></li>
            <li class="link"><a href="#about">About</a></li>
            <li class="link"><a href="#project">Projects</a></li>
            <li class="link"><a href="#service">Services</a></li>
            <li class="link"><a href="#client">Clients</a></li>
            <li class="link"><a href="#blog">Blog</a></li>
            <li class="link btn"><a href="#contact">Contact</a></li>
          </ul>
        </div>
      </nav>







      <div class="section__container header__container" id="home">
        <div class="header__image">
          <img src="assets/header.png" alt="header" />
        </div>
        <?php
                include 'include/config.php';
                $sql = "SELECT * FROM home_description where id=1";
                $result = mysqli_query($connection, $sql);
                $data = mysqli_fetch_assoc($result);
                ?>
                
                <div class="header__content">
                <h1>Hi, I Am Nafis Foysal Ashik</h1>
                <?php
                if($result)
                      echo  $data["description"] . "<br>";
              
                ?>
         
          <!-- <p>
            I'm a dedicated web developer with a creative flair and a penchant
            for turning lines of code into captivating online experiences. My
            journey in the digital realm began years ago, and I've since honed
            my skills in front-end and back-end development.
          </p> -->
          <button class="btn">Hire Me Now</button>
        </div> 
      </div>
    </header>

    <section class="section__container about__container" id="about">
      <!-- <div class="about__image">
        <img src="assets/about.jpeg" alt="about" />
      </div> -->


<!-- <div class="about__image"> -->
      <?php

                $sql = "SELECT * FROM image_data where user_id=1";
                $result = mysqli_query($connection, $sql);
                $data = mysqli_fetch_assoc($result);
                if ($result) {
                  $imageSource = $data["image_source"];
                  echo '<div class="about__image"><img src="' . $imageSource . '" alt="about" /></div>';
              } else {
                  echo '<div class="about__image"><img src="assets/default_image.jpg" alt="default" /></div>';
              }


                ?>
                </div>







      <div class="about__content">
      <h2 class="section__header">Hi There I'm Nafis Foysal Ashik</h2>
      <?php
      $sql = "SELECT * FROM profile_data where id=1";
                $result = mysqli_query($connection, $sql);
                $data = mysqli_fetch_assoc($result);
                if($result)
                      echo  $data["description"] . "<br>";
                ?>

        
        <!-- <p>
          A passionate web developer with a creative flair and a knack for
          turning visions into reality. My journey in web development began with
          a fascination for coding and design, and it has evolved into a career
          where I blend aesthetics with functionality.
        </p>
        <h4>
          With a focus on user experience and a commitment to staying updated
          with the latest industry trends, I'm dedicated to creating web
          solutions that not only meet but exceed expectations.
        </h4> -->




        <div class="about__btns">
          <a href="assets/Nafis_CV.pdf" download class="download__btn">
            Download CV
          </a>
          <a href="https://mail.google.com"><i class="ri-mail-fill"></i></a>
          <a href="https://github.com/"><i class="ri-github-fill"></i></a>
          <a href="https://www.linkedin.com/feed/"><i class="ri-linkedin-fill"></i></a>
        </div>
      </div>
    </section>






    <h1>
      <p class="sk">Language Skills</p>
    </h1>
    <section class="section__container banner__container">
      
      <div class="banner__card">
        <div>
          <h4>JavaScript</h4>
        </div>
      </div>


      <div class="banner__card">
        <div>
          <h4>HTML & CSS</h4>
        </div>
      </div>



      <div class="banner__card">
        <div>
          <h4>Fllutter</h4>
        </div>
      </div>
      <div class="banner__card">
        <div>
          <h4>PHP</h4>
        </div>
      </div>
      <div class="banner__card">
        <div>
          <h4>C & C++</h4>
        </div>
      </div>



      <div class="banner__card">
        <div>
          <h4>Python</h4>
        </div>
      </div>
    </section>








    <section class="section__container project__container" id="project">
      <div class="project__header">
        <h2 class="section__header">My Projects</h2>
        <div class="project__nav">
          <button
            class="btn project__btn mixitup-control-active"
            data-filter="all"
          >
            All Projects
          </button>
        </div>
      </div>









      <div class="project__grid">
        <!-- <a href="https://github.com/Nafis-Foysal-Ashik/Bus_Ticket_Management.git"><div class="project__card mix web">
          <img src="assets/project-1.jpg" alt="project" />
        </div></a> -->

        <?php
            $sql = "SELECT * FROM projects";
            $result = mysqli_query($connection, $sql);

            while ($data = mysqli_fetch_assoc($result)) {
                echo '<a href="' . $data["url"] . '">';
                echo '<div class="project__card mix web">';
                echo '<img src="' . $data["image_source"] . '" alt="project" />';
                echo '</div></a>';
            }
            ?>


        <!-- <a href="https://github.com/Nafis-Foysal-Ashik/Blood-Bank-Management-System-Andriod.git">
          <div class="project__card mix game">
            <img src="assets/project-2.jpg" alt="project" />
          </div>
        </a> -->
        <!-- <div class="project__card mix design">
          <img src="assets/project-3.jpg" alt="project" />
        </div> -->
        <!-- <div class="project__card mix web">
          <img src="assets/project-4.jpg" alt="project" />
        </div> -->
        
      </div>
    </section>

    <section class="section__container service__container" id="service">
      <h2 class="section__header">My Skills</h2>
      
      
      
      
      <p class="section__description">
        Here is some of my skills that I have learnt and have a strong basic concept on that topics
      </p>
      <div class="service__grid">
        <div class="service__card">
          <span><i class="ri-window-fill"></i></span>
          <h4>Website Design</h4>
          <p>
            I have a strong knowledge over HTML and CSS for front-end desing . Also I have learnt JavaScript , php and ASP.NET for back-end coding.
          </p>
        </div>
        
        
        
        
        <div class="service__card">
          <span><i class="ri-window-fill"></i></span>
          <h4>Desktop</h4>
          <p>
            Create a desktop application using INTElliJ IDEA . Also know how to implemant FireBase for Aunthecation and JSON Parsing . Have a strong knowledge about how to create an application without any issues.
          </p>
        </div>
        
        
        
        
        <div class="service__card">
          <span><i class="ri-window-fill"></i></span>
          <h4>Mobile Development</h4>
          <p>
            From iOS to Android, I create apps that deliver seamless
            performance and keep users coming back for more.
          </p>
        </div>
        
        
        
        
        
        <div class="service__card">
          <span><i class="ri-window-fill"></i></span>
          <h4>Contest Programming</h4>
          <p>
            I am a regular compititive contest programmer in Codeforces.I have solved about 250+ problems in Codeforces . 
          </p>
        </div>
        
        
        
        
        
        <div class="service__card">
          <span><i class="ri-window-fill"></i></span>
          <h4>Object Oriented Programming</h4>
          <p>
            Have a strong concept on object Oriented programming like inheritance , class , polymorphism , abstact & interface  , constructor etc.
          </p>
        </div>
        
        
        
        
        
        <div class="service__card">
          <span><i class="ri-window-fill"></i></span>
          <h4>Structure Programming</h4>
          <p>
            I have learnt C programming Language and solve different problems usign c programming.
          </p>
        </div>
      </div>
    </section>

    

    <section class="section__container blog__container" id="blog">
      <p class="section__subheader">Travelling Blog Posts</p>
      <h2 class="section__header">I Love Travelling</h2>
      <div class="blog__grid">
        
      
      
      <div class="blog__card">
          <img src="assets/blog-1.jpg" alt="blog" />
          <p>Sylhet Tour</p>
        </div>
        
        
        
        
        <div class="blog__card">
          <img src="assets/blog-2.jpg" alt="blog" />
          <p>Sundarbans Tour</p>
          
        </div>
        
        
        
        <div class="blog__card">
          <img src="assets/blog-3.jpg" alt="blog" />
          <p>Cox's Bazar Tour</p>
          
        </div>
        
        
        
        <div class="blog__card">
          <img src="assets/blog-4.jpg" alt="blog" />
          <p>Sajek Valley</p>
          
        </div>
        
        
        
        <div class="blog__card">
          <img src="assets/blog-5.jpg" alt="blog" />
          <p>Shat Gombuj Mosque</p>
          
        </div>
        
        
        
        
        <div class="blog__card">
          <img src="assets/blog-6.jpg" alt="blog" />
          <p>Lalbagh Kella</p>
          
        </div>
      </div>
    </section>

    
    
    
    
    <section class="section__container contact__container" id="contact">
      <p class="section__subheader">Contact Us</p>
      <h2 class="section__header">Get In Touch</h2>
      <form action="/" class="contact__form">
        <div class="input__row">
          <input type="text" placeholder="First Name" />
          <input type="text" placeholder="Last Name" />
        </div>
        <input type="text" placeholder="Email" />
        <input type="text" placeholder="Description" />
        <button class="btn">Submit</button></a>
      </form>
    </section>

    
    
    
    
    <footer class="footer">
      <div class="section__container footer__container">
        <div class="footer__col">
          <h5><a href="#">Nafis</a></h5>
          <p>
            I'm a dedicated web developer with a creative flair and a penchant
            for turning lines of code into captivating online experiences.
          </p>
          
          
          
          
          
          <div class="footer__socials">
            <a href="https://mail.google.com/mail"><i class="ri-mail-fill"></i></a>
            <a href="https://github.com/"><i class="ri-github-fill"></i></a>
            <a href="https://www.linkedin.com/feed/"><i class="ri-linkedin-fill"></i></a>
          </div>
        </div>
        
        
        
        
        
        <div class="footer__col">
          <h4>Services</h4>
          <div class="footer__links">
            <a href="#">Web Design</a>
            <a href="#">App Design</a>
            <a href="#">Photography</a>
            <a href="#">Videography</a>
            <a href="#">Web Development</a>
          </div>
        </div>
        
        
        
        
        
        
        <div class="footer__col">
          <h4>Support</h4>
          <div class="footer__links">
            <a href="#">Contact</a>
            <a href="#">My Blog</a>
            <a href="#">Privacy Policy</a>
          </div>
        </div>
      </div>
      
      
      
      
      <div class="footer__bar">
        Copyright © 2023 Web Design Mastery. All rights reserved.
      </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="main.js"></script>
  </body>
</html>