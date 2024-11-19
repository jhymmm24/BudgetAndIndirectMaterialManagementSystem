
<?php





?>
<style>
   .user_profile_dd .dropdown-toggle {
      display: inline-block;
      width: 200px; /* Set the width of the dropdown toggle */
      text-decoration: none;
      cursor: pointer;
   }

   .dropdown-menu {
            width: 200px; /* Adjust the width of the dropdown menu as needed */
            position: absolute;
            background-color: #F2F6F8; /* Background color */
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
            display: none; /* Hide the dropdown menu by default */
            transition: transform 0.3s ease-in-out;
            transform-origin: top left;
        }
        .dropdown-menu.grow {
            transform: scale(1.5);
        }

   .dropdown-menu a {
      color: black; /* Black font color for links */
      padding: 12px 16px;
      text-decoration: none; /* Ensure links are not underlined */
      display: block; /* Ensure links take full width of the menu */
   }

   .dropdown-menu a:hover {
      background-color: #e0e0e0; /* Light grey background on hover */
   }

   .dropdown-menu .name_user,
   .dropdown-menu .user_category {
      color: black; /* Black font color for name and category */
      display: block;
      padding: 8px 16px;
   }

   .rolling-text-container {
            overflow: hidden;
            white-space: nowrap;
            position: relative;
            background-color: #2D303C;
        }

        .rolling-text {
            display: inline-block;
            /* Adjust padding-left relative to the container width */
            padding-left: 1%; /* Example: set to 100% to start from the same position */
            animation: roll 30s linear infinite;
            color: white;
            animation-delay: 0s; /* Start the animation immediately */
        }

        @keyframes roll {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }
</style>




<div class="topbar">

                  <nav class="navbar navbar-expand-lg navbar-light">
                  <div class="full" style="background-color: #7460EE;">
                  <div class="rolling-text-container" style="background-color: #2D303C;">
                  <div id="rolling-text" class="rolling-text">
                        Budget and Indirect Material Management System | Copyright © 2024 Brother Industries Philippines Inc. All Rights Reserved.
                    </div>
                    </div>



                        <button type="button" id="sidebarCollapse" class="sidebar_toggle" hidden ><i class="fa fa-bars"></i></button>

              

                        <div class="right_topbar">
   <div class="icon_info">
      <ul class="user_profile_dd">
         <li style="background-color: #FF5722;">
            <!-- Only show the image initially -->
            <a class="dropdown-toggle" data-toggle="dropdown">
               <img class="img-responsive rounded-circle" src="images/layout_img/user.png" alt="#" />
            </a>
            <!-- Hidden details initially -->
            <div class="dropdown-menu">
            <div class="user_img"><img class="img-responsive" style="width:50px;" src="images/layout_img/userkillua.png" alt="#" /></div>
              <h6 style="font-size:12px; ">Hello <?php echo $fullname?>!</h6>
              <h6 style="font-size:12px; "><?php echo $section?></h6>
              
               <a class="dropdown-item" href="#">Help</a>
               <a class="dropdown-item" href="login.php"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
            </div>
         </li>
      </ul>
   </div>
</div>

<script>
        document.querySelector('.dropdown-toggle').addEventListener('click', function() {
            var dropdownMenu = document.querySelector('.dropdown-menu');
            dropdownMenu.style.display = dropdownMenu.style.display === 'none' ? 'block' : 'none';
            
            // Trigger the grow effect
            setTimeout(function() {
                dropdownMenu.classList.toggle('grow');
            }, 10); // Small delay to ensure the display change takes effect
        });
    </script>                                          
                  
                     </div>

                     
   
     
                  </nav>

                  
<!-- Centered paragraph -->
          </div>
