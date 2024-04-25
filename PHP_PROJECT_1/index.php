<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rent</title>
    <link rel="stylesheet" href="assets/css/homestyle.css">
    <script src="https://kit.fontawesome.com/325320c17a.js" crossorigin="anonymous"></script>

</head>

<body>
    <!--==================== NAVBAR ====================-->
    <nav>
        <ul class="sidebar">
            <li onclick="hideSidebar()">
                <a href="#"><i class="fa-solid fa-xmark"></i></a>
            </li>
            <li>
                <a href="#" data-hover="Home" class="resNavItem">Home</a>
            </li>
            <li><a href="#" id="about-link" data-hover="About" class="resNavItem">About</a></li>
            <li><a href="user-dashboard.php" data-hover="Profile" class="resNavItem">Profile</a></li>
        </ul>
        <ul>
            <li><a href="#">House Renting</a></li>
            <!--<li class="hideOnMobile"><a href="#" class="itemNav">Home</a></li>-->
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <li class="hideOnMobile"><a href="#" id="about-link" class="itemNav">About</a></li>
            <li class="hideOnMobile">
                <a href="user-dashboard.php" class="itemNav"><span>Profile</span></a>
            </li>

            <li class="menu-button" onclick="showSidebar()">
                <a href="#"><i class="fa-solid fa-bars"></i></a>
            </li>
        </ul>
    </nav>

    <!--==================== MAIN ====================-->

    <main>
        <div class="mainDIv">
            <div class="title">
                <h1>Premier Rental Solutions! </h1>
                <p>our Key to Comfortable Living</p>
            </div>
        </div>
        <section class="mainSection">
            <h1 class="heading">Rent House</h1>

            <div class="box-container">

                <div class="box">
                    <img src="assets/images/house1.jpg" alt="">
                    <h3>Random 1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
                    <a href="flat.php?flat_id=1" class="btn">Explore</a>
                </div>

                <div class="box">
                    <img src="assets/images/house2.jpg" alt="">
                    <h3>Random 2</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
                    <a href="flat.php?flat_id=2" class="btn">Explore</a>
                </div>

                <div class="box">
                    <img src="assets/images/house3.jpg" alt="">
                    <h3>Random 3</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
                    <a href="flat.php?flat_id=3" class="btn">Explore</a>
                </div>

                <div class="box">
                    <img src="assets/images/house4.jpg" alt="">
                    <h3>Random 4</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
                    <a href="flat.php?flat_id=4" class="btn">Explore</a>
                </div>

                <div class="box">
                    <img src="assets/images/house5.jpg" alt="">
                    <h3>Random 5</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
                    <a href="flat.php?flat_id=5" class="btn">Explore</a>
                </div>

                <div class="box">
                    <img src="assets/images/house6.jpg" alt="">
                    <h3>Random 6</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
                    <a href="flat.php?flat_id=6" class="btn">Explore</a>
                </div>
                <div class="box">
                    <img src="assets/images/house3.jpg" alt="">
                    <h3>Random 7</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
                    <a href="flat.php?flat_id=7" class="btn">Explore</a>
                </div>

                <div class="box">
                    <img src="assets/images/house4.jpg" alt="">
                    <h3>Random 8</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
                    <a href="flat.php?flat_id=8" class="btn">Explore</a>
                </div>

                <div class="box">
                    <img src="assets/images/house5.jpg" alt="">
                    <h3>Random 9</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus, commodi?</p>
                    <a href="flat.php?flat_id=9" class="btn">Explore</a>
                </div>



            </div>
        </section>
    </main>
    <!--==================== FOOTER ====================-->

    <footer id="footer">
        <div class="fcontainer">
            <div class="footer-col">
                <h2>House Renting</h2>
                <p class="footer-para">Lorem ipsum dolor sit amet, consect adipisicing elit. Deserunt labore qu magnam?
                </p>
            </div>
            <div class="footer-col">
                <h3 class="text-office">
                    Location
                    <div class="underline"><span></span></div>
                </h3>
                <p>Moghbazar</p>
                <p>Dhaka, Bangladesh</p>

                <p class="email">mail@gmail.com</p>
                <p class="phone">+880 000 0000</p>
            </div>
            <div class="footer-col">
                <h3>
                    Menu
                    <div class="underline"><span></span></div>
                </h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Our Team</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <h3>
                    Knock Us
                    <div class="underline"><span></span></div>
                </h3>
                <form action="">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="text" placeholder="Email">
                    <a href=""><i class="fa-solid fa-arrow-right"></i></a>
                </form>
                <div class="social-icons">
                    <a href="#"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!--==================== Responsive ====================-->

    <script>
        function showSidebar() {
            const sidebar = document.querySelector(".sidebar");
            sidebar.style.display = "flex";
        }

        function hideSidebar() {
            const sidebar = document.querySelector(".sidebar");
            sidebar.style.display = "none";
        }
    </script>
    <script>
    // JavaScript to scroll to footer section when "About" link is clicked
      document.getElementById('about-link').addEventListener('click', function(event) {
      event.preventDefault(); // Prevent default link behavior
      document.getElementById('footer').scrollIntoView({ behavior: 'smooth' }); // Scroll to footer
    });
    </script>
</body>

</html>