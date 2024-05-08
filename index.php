<?php
session_start();
include('includes/dbconnection.php');

if (!isset($_SESSION['bpmsaid']) || strlen($_SESSION['bpmsaid']) == 0) {
    header('location:logout.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hamro Salon</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Sharp:opsz,wght,FILL,GRAD@48,400,0,0" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <link rel="stylesheet" href="style.css">
</head>
<body>
   <div class="container">
      <aside>
         <div class="top">
           <div class="logo">
             <h2>Hamro <span class="danger">Salon</span> </h2>
           </div>
           <div class="close" id="close_btn">
            <span class="material-symbols-sharp">
              close
              </span>
           </div>
         </div>
         <!-- end top -->
          <div class="sidebar">
           <a href="appointment.php">
              <span class="material-symbols-sharp">person_outline</span>
              <h3>Appointment</h3>
           </a>
       
           <a href="service.php">
            <span class="material-symbols-sharp"> menu </span>
            <h3>service</h3>
         </a>
           <a href="pending.html">
            <span class="material-symbols-outlined">pending </span>
            <h3>Pending Appointment</h3>
           </a>
           <a href="#">
              <span class="material-symbols-sharp">logout </span>
              <h3>logout</h3>
           </a>
          

          </div>
      

       <!-- insights section -->
<div class="insights">
    <div class="appointment">
        <span class="material-symbols-sharp">trending_up</span>
        <div class="middle">
            <div class="left">
                <h3>Total Appointment</h3>
                <?php
                // PHP logic to fetch and display total appointments
                $total_appointments = getTotalAppointments(); // assume this function fetches the total appointments
                echo "<h1>$total_appointments</h1>";
               ?>
            </div>
            <div class="progress">
                <svg>
                    <circle r="30" cy="40" cx="40"></circle>
                </svg>
                <!-- PHP logic to calculate and display progress -->
                <?php
                $progress = calculateProgress(); // assume this function calculates the progress
                echo "<div class='number'><p>$progress%</p></div>";
               ?>
            </div>
        </div>
        <small>Last 24 Hours</small>
    </div>

   
                <?php
               
                $completed_appointments = getCompletedAppointments(); 
                echo "<h1>$completed_appointments</h1>";
               ?>
            </div>
            <div class="progress">
                <svg>
                    <circle r="30" cy="40" cx="40"></circle>
                </svg>
             
                <?php
                $progress = calculateProgress(); 
                echo "<div class='number'><p>$progress%</p></div>";
               ?>
            </div>
        </div>
        <small>Last 24 Hours</small>
    </div>
    <!-- end expenses -->
    <!-- start income -->
    <div class="income">
        <span class="material-symbols-sharp">stacked_line_chart</span>
        <div class="middle">
            <div class="left">
                <h3>Total Sales</h3>
                <?php
              
                $total_sales = getTotalSales();
                echo "<h1>$total_sales</h1>";
               ?>
            </div>
            <div class="progress">
                <svg>
                    <circle r="30" cy="40" cx="40"></circle>
                </svg>
                <!-- PHP logic to calculate and display progress -->
                <?php
                $progress = calculateProgress(); // assume this function calculates the progress
                echo "<div class='number'><p>$progress%</p></div>";
               ?>
            </div>
        </div>
        <small>Last 24 Hours</small>
    </div>
    <!-- end income -->

        </div>
       <!-- end insights -->
      </main>
      <!-- end main -->

      <!-- start right main -->
    <div class="right">
      <div class="top">
         <button id="menu_bar">
           <span class="material-symbols-sharp">menu</span>
         </button>
         <div class="theme-toggler">
           <span class="material-symbols-sharp active">light_mode</span>
           <span class="material-symbols-sharp">dark_mode</span>
         </div>
          <div class="profile">
             <div class="info">
                 <p><b>Hamro Salon</b></p>
                 <p>Admin</p>
                 <small class="text-muted"></small>
             </div>
             <div class="profile-photo">
               <img src="./images/profile-1.jpg" alt=""/>
             </div>
          </div>
      </div>

       
       </div>
      </div>
    </div>
  </div>

   <script src="script.js"></script>
</body>
</html>
