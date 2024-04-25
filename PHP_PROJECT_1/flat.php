<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flat</title>
    <link rel="stylesheet" href="assets/css/homestyle.css">
    <script src="https://kit.fontawesome.com/325320c17a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/style.css" />

</head>
<style>
    table, th, td {
        border: 1px solid black;
    }
</style>

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
            <li class="hideOnMobile"><a href="#" class="itemNav">Home</a></li>
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
        <div class="container">
            <?php
            // Include database connection
            include 'connection.php';

            // Retrieve flat information
            $flat_id = $_GET['flat_id']; // Get flat ID from URL parameter

            // Query to retrieve flat, facility, charges, and room information
            $query = "SELECT * FROM flat
                    LEFT JOIN facility ON flat.id = facility.flat_id
                    LEFT JOIN charges ON flat.id = charges.flat_id
                    LEFT JOIN room ON flat.id = room.f_id
                    WHERE flat.id = $flat_id";

            $result = mysqli_query($con, $query);

            if (mysqli_num_rows($result) > 0) {
                $flat_info = mysqli_fetch_assoc($result);

                // Display flat information
                echo "<h1>Flat Information</h1>";
                echo "<p><strong>Location:</strong> " . $flat_info['location'] . "</p>";
                echo "<p><strong>Floor Number:</strong> " . $flat_info['floor_no'] . "</p>";
                echo "<p><strong>Size:</strong> " . $flat_info['size'] . "</p>";

                // Display facility information
                echo "<h2>Facility</h2>";
                echo "<p><strong>No. of Bedrooms:</strong> " . $flat_info['no_of_bedrooms'] . "</p>";
                echo "<p><strong>Drawing:</strong> " . $flat_info['drawing'] . "</p>";
                echo "<p><strong>Dinning:</strong> " . $flat_info['dinning'] . "</p>";
                echo "<p><strong>Gas:</strong> " . $flat_info['gas1'] . "</p>";
                echo "<p><strong>Lift:</strong> " . $flat_info['lift'] . "</p>";
                echo "<p><strong>Parking:</strong> " . $flat_info['parking1'] . "</p>";
                // Add other facility details here

                // Display charges information
                echo "<h2>Charges</h2>";
                echo "<p><strong>Rent:</strong> " . $flat_info['rent1'] . "</p>";
                echo "<p><strong>Service:</strong> " . $flat_info['service'] . "</p>";
                echo "<p><strong>gas:</strong> " . $flat_info['gas2'] . "</p>";
                echo "<p><strong>Water:</strong> " . $flat_info['water2'] . "</p>";
                echo "<p><strong>Parking:</strong> " . $flat_info['parking2'] . "</p>";
                // Add other charges details here

                // Display room information
                echo "<h2>Rooms</h2>";
                // Loop through room data and display room details
                ?>
                <?php
                // Fetch room information
                $room_sql = "SELECT * FROM room WHERE f_id = $flat_id"; // Assuming flat_id 1
                $room_result = $con->query($room_sql);

                // Display room information using loops
                if ($room_result->num_rows > 0) {
                    echo "<h2>Room Information</h2>";
                    ?>
                    <table class="table table-hover text-center">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Room no.</th>
                                <th scope="col">Type</th>
                                <th scope="col">Size</th>
                                <th scope="col">Washroom</th>
                                <th scope="col">Balcony</th>
                                <th scope="col">Washroom Type</th>
                            </tr>
                        </thead>
                    <tbody>
                    <?php
                    while ($room_row = $room_result->fetch_assoc()) {
                        ?>
                            <tr>
                                <td><?php echo $room_row["room_no"] ?></td>
                                <td><?php echo $room_row["type"] ?></td>
                                <td><?php echo $room_row["size"] ?></td>
                                <td><?php echo $room_row["washroom"] ?></td>
                                <td><?php echo $room_row["balcony"] ?></td>
                                <td><?php echo $room_row["washroom_type"] ?></td>
                            </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                    </table>
                <?php
                } else {
                    echo "No flat found with ID: " . $flat_id;
                }
            }
            // Close database connection
            mysqli_close($con);
            ?>
        </div>
    </main>
    <!--==================== FOOTER ====================-->
    
    <br>
    <br>
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