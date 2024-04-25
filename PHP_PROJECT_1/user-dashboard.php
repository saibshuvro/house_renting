<?php
include "connection.php";

session_start();

if (!isset($_SESSION['username'])) {

  // header('location:index.php');
  // echo $_SESSION['username'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <script src="https://kit.fontawesome.com/325320c17a.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="assets/css/style.css" />

  <script type="text/javascript">
    function preventBack() {
      window.history.forward();
    }
    setTimeout("preventBack()", 0);
    window.onunload = function() {
      null;
    };
  </script>
</head>

<body>
  <!--==================== NAVBAR ====================-->
  <nav>
    <ul class="sidebar">
      <li onclick="hideSidebar()">
        <a href="#"><i class="fa-solid fa-xmark"></i></a>
      </li>
      <li>
        <a href="#" data-hover="Dasboard" class="resNavItem">Dasboard</a>
      </li>
      <li><a href="index.php" data-hover="About" class="resNavItem">About</a></li>
      <li><a href="logout.php" data-hover="Logout" class="resNavItem">Logout</a></li>
    </ul>
    <ul>
      <li><a href="#">Logo</a></li>
      <li class="hideOnMobile"><a href="#" class="itemNav">Dasboard</a></li>
      <li class="hideOnMobile"><a href="index.php" class="itemNav">About</a></li>
      <li class="hideOnMobile">
        <a href="logout.php" class="itemNav"><span>Logout</span></a>
      </li>

      <li class="menu-button" onclick="showSidebar()">
        <a href="#"><i class="fa-solid fa-bars"></i></a>
      </li>
    </ul>
  </nav>


  <!--==================== Main ====================-->
  <div class="containerBox container">
    <div class="row justify-content-center">
      <div class="row custom-container">
        <?php
        if (isset($_GET["msg"])) {
          $msg = $_GET["msg"];
          echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
      ' . $msg . '
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
        }
        ?>
        <a href="./assets/php crud/add-new.php" class="btn btn-dark mb-3">Add New</a>

        <table class="table table-hover text-center">
          <thead class="table-dark">
            <tr>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Age</th>
              <th scope="col">Gender</th>
              <th scope="col">Phone no</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT r.name, u.email, r.age, r.gender, p.phone_no FROM user u JOIN regular_user r ON u.email = r.u_email JOIN reg_user_phone_no p ON u.email = p.reg_email;";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
              <tr>
                <td><?php echo $row["name"] ?></td>
                <td><?php echo $row["email"] ?></td>
                <td><?php echo $row["age"] ?></td>
                <td><?php echo $row["gender"] ?></td>
                <td><?php echo $row["phone_no"] ?></td>
                <td>
                  <a href="./assets/php crud/edit.php?email=<?php echo $row["email"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
                  <a href="./assets/php crud/delete.php?email=<?php echo $row["email"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
                </td>
              </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>





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
</body>

</html>