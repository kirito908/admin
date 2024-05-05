<?php

session_start();
include('dbconnection.php');

if (strlen($_SESSION['bpmsaid'] == 0)) {
    header('location:logout.php');
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
           <a href="#" class="active">
            <span class="material-symbols-sharp">person_outline </span>
            <h3>custumers</h3>
         </a>
       
           <a href="#">
            <span class="material-symbols-sharp"> menu </span>
            <h3>service</h3>
         </a>
           <a href="#">
              <span class="material-symbols-sharp">settings </span>
              <h3>settings</h3>
           </a>
           <a href="#">
              <span class="material-symbols-sharp">add </span>
              <h3>Add Service</h3>
           </a>
           <a href="#">
              <span class="material-symbols-sharp">logout </span>
              <h3>logout</h3>
           </a>
          </div>
      </aside>
      
      <!-- start main part -->
      <main>
           <h1>Dashbord</h1>

           <div class="date">
             <input type="date" >
           </div>

        <div class="insights">

 
            <div class="appointment">
               <span class="material-symbols-sharp">trending_up</span>
               <div class="middle">

                 <div class="left">
                   <h3>Total Appointment</h3>
                 
                   <h1><?php /* Insert PHP logic to fetch and display total appointments */ ?></h1>
                 </div>
                  <div class="progress">
                      <svg>
                         <circle  r="30" cy="40" cx="40"></circle>
                      </svg>
                      <!-- PHP logic to calculate and display progress -->
                      <div class="number"><p><?php /* Insert PHP logic to calculate and display progress */ ?></p></div>
                  </div>

               </div>
               <small>Last 24 Hours</small>
            </div>
           <!-- end selling -->
              <!-- start expenses -->
              <div class="expenses">
                <span class="material-symbols-sharp">local_mall</span>
                <div class="middle">
 
                  <div class="left">
                    <h3>Complete Appointment</h3>
                    <!-- PHP logic to fetch and display completed appointments -->
                    <h1><?php /* Insert PHP logic to fetch and display completed appointments */ ?></h1>
                  </div>
                   <div class="progress">
                       <svg>
                          <circle  r="30" cy="40" cx="40"></circle>
                       </svg>
                       <!-- PHP logic to calculate and display progress -->
                       <div class="number"><p><?php /* Insert PHP logic to calculate and display progress */ ?></p></div>
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
                    
                    <h1><?php   ?></h1>
                  </div>
                   <div class="progress">
                       <svg>
                          <circle  r="30" cy="40" cx="40"></circle>
                       </svg>
                     
                       <div class="number"><p><?php  ?></p></div>
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
