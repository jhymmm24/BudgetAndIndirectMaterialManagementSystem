
<?php





function isActivePage($pageNames)
{
    $currentPage = basename($_SERVER['PHP_SELF']);
    $currentPageURL = $_SERVER['REQUEST_URI'];
    
    if (is_array($pageNames)) {
        foreach ($pageNames as $pageName) {
            if ($currentPage == $pageName || strpos($currentPageURL, $pageName) !== false) {
                return true;
            }
        }
    } else {
        if ($currentPage == $pageNames || strpos($currentPageURL, $pageNames) !== false) {
            return true;
        }
    }
    return false;
}
?>




<nav id="sidebar" style="background-color: #2F323E;">
               <div class="sidebar_blog_1">
                  <div class="sidebar-header">
                     <div class="logo_section" style="height:80px;">
                        <a href="dashboard.php"><img class="logo_icon img-responsive" src="images/logo/logo_icon2.png" alt="#" style="margin-top: 10px;"></a>
                     </div>
                  </div>
                  <div class="sidebar_user_info" style="height:81px; background-color: #614ED3;">
                     <div class="icon_setting"></div>
                     <div class="user_profle_side">
                        <div class="user_img"><img class="img-responsive" style="width:50px; " src="images/layout_img/userkillua.png" alt="#" /></div>
                        <div class="user_info">
                           <h6 style="font-size:12px; margin-top:-10px;"><?php echo $fullname?></h6>
                           <!-- <h6 style="font-size:12px; margin-top:-5px;"><?php echo $adid?></h6> -->
                           <p><span class="online_animation" style="font-size:12px; margin-top:-10px;"></span> Online</p>
                           <p><span id="date" style="font-size:12px; color:white;">Loading...</span></p>
                                
  
                       
                          
                                 <script>
                                 function updateDateTime() {
                                    var dateElement = document.getElementById("date");
                                    var now = new Date();
                                    dateElement.textContent = now.toLocaleString();
                                 }

                                 // Update the date and time every second
                                 setInterval(updateDateTime, 1000);

                                 // Call updateDateTime initially to set the initial time
                                 updateDateTime();
                                 </script>
                         <?php
                         $dateTime = new DateTime();

                         $formattedDateTime = $dateTime->format('Y-m-d H:i:s');
                         
                         ?>
                        
                          
                  <div class="logo_section" style="width: 210px;  margin-top:-10px; text-align: left;" >
                                 <a href="dashboard.php" ><img class="img-responsive" src="images/logo/whitbims2.png" alt="#" /></a>
                            
                              </div>


                        </div>
                     </div>
                  </div>
               </div>
               <div class="sidebar_blog_2" >
                  <!-- <h4 style="background-color: #99c569;" style="font-size:10px;">Budget & Indirect Material Management System</h4> -->
             
                  <ul class="list-unstyled components">

                
                  <li <?php if (isActivePage("dashboard.php")) echo 'style="background-color: #FF5722;"'; ?>>
                  <a href="dashboard.php"><i class="fa fa-dashboard" style="color: white;"></i> <span>Dashboard</span></a>
                 </li>


                     <li class="active">
                        <a href="#masterlist" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-desktop" style="color:#white;"></i><span>Masterlist</span></a>
                        <ul class="collapse list-unstyled <?php if (isActivePage(["common-goods-pricelist.php","common-goods-pricelist_masterlist.php","im-list.php"])) echo 'show'; ?>" id="masterlist">


                        <li <?php if (isActivePage(["common-goods-pricelist.php","common-goods-pricelist_masterlist.php"])) echo 'style="background-color: #FF5722;"'; ?>>
                           <a href="common-goods-pricelist.php">•   <span>Common Goods Pricelist</span></a>
                        </li>
                        <li <?php if (isActivePage(["im-list.php"])) echo 'style="background-color: #FF5722;"'; ?>>
                              <a href="im-list.php">•   <span>IM List</span></a>
                           </li>
                          
                           
                        </ul>
                     </li>

                     <li class="active">
                        <a href="#demandlist" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-shopping-cart" style="color:#white;"></i><span>Demand List</span></a>
                        <ul class="collapse list-unstyled <?php if (isActivePage(["demand-list-input.php", "demand-list-approval.php", "demand-list-query.php"])) echo 'show'; ?>" id="demandlist">


                        <li <?php if (isActivePage("demand-list-input.php")) echo 'style="background-color: #FF5722;"'; ?>>
                           <a href="demand-list-input.php">•   <span>Demand List Input</span></a>
                        </li>

                        <!-- <li <?php if (isActivePage("demand-list-approval.php")) echo 'style="background-color: #FF5722;"'; ?>>
                           <a href="demand-list-approval.php">•   <span>Demand List Approval</span></a>
                        </li> -->

                        <li <?php if (isActivePage("demand-list-query.php")) echo 'style="background-color: #FF5722;"'; ?>>
                           <a href="demand-list-query.php">•   <span>Demand List Query</span></a>
                        </li>
                   
                        </ul>
                     </li>


                    
                     <li class="active">
                        <a href="#ims" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-bar-chart" style="color:white;"></i> <span>IMS</span></a>
                        <ul class="collapse list-unstyled <?php if (isActivePage(["stock-informationsetting.php","stock-query.php","item-issuance.php","item-request-input.php","item-request-approval.php","item-request-query.php","item-input.php","item-input-queryandmodify.php","item-output.php","item-output-application.php","item-output-query-modify.php"])) echo 'show'; ?>" id="ims">
                        


                              
                           <li class="active">
                              <a href="#itemrequest" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-cube" style="color:white;"></i><span>Item Request</span></a>
                              <ul class="collapse list-unstyled <?php if (isActivePage(["item-issuance.php","item-request-input.php","item-request-approval.php","item-request-query.php"])) echo 'show'; ?>" id="itemrequest">


                              <li <?php if (isActivePage("item-request-input.php")) echo 'style="background-color: #FF5722;"'; ?>>
                                 <a href="item-request-input.php">•   <span>Item Requesting</span></a>
                              </li>

                              <!-- <li <?php if (isActivePage("item-request-approval.php")) echo 'style="background-color: #FF5722;"'; ?>>
                                 <a href="item-request-approval.php">•   <span>Item Request Approval</span></a>
                              </li> -->

                              <li <?php if (isActivePage("item-issuance.php")) echo 'style="background-color: #FF5722;"'; ?>>
                                 <a href="item-issuance.php">•   <span>Item Issuance</span></a>
                              </li>

                              <li <?php if (isActivePage("item-request-query.php")) echo 'style="background-color: #FF5722;"'; ?>>
                                 <a href="item-request-query.php">•   <span>Item Request Query</span></a>
                              </li>

                              
                              
                        
                              </ul>
                           </li>


                           
                           <li class="active">
                              <a href="#iteminput" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-plus" style="color:white;"></i><span>Input</span></a>
                              <ul class="collapse list-unstyled <?php if (isActivePage(["item-input.php","item-input-queryandmodify.php"])) echo 'show'; ?>" id="iteminput">


                              <li <?php if (isActivePage("item-input.php")) echo 'style="background-color: #FF5722;"'; ?>>
                                 <a href="item-input.php">•   <span>Item Input</span></a>
                              </li>

                              <li <?php if (isActivePage("item-input-queryandmodify.php")) echo 'style="background-color: #FF5722;"'; ?>>
                                 <a href="item-input-queryandmodify.php">•   <span>Item Query and Modify</span></a>
                              </li>

                               </ul>

                           </li>


                           
                           <li class="active">
                              <a href="#itemoutput" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-exchange" style="color:white;"></i><span>Output</span></a>
                              <ul class="collapse list-unstyled <?php if (isActivePage(["item-output.php","item-output-query-modify.php","item-output-application.php"])) echo 'show'; ?>" id="itemoutput">



                              <li <?php if (isActivePage("item-output.php")) echo 'style="background-color: #FF5722;"'; ?>>
                                 <a href="item-output.php">•   <span>Item Output</span></a>
                              </li>

                              <li <?php if (isActivePage("item-output-application.php")) echo 'style="background-color: #FF5722;"'; ?>>
                                 <a href="item-output-application.php">•   <span>Output with Application</span></a>
                              </li>

                              <li <?php if (isActivePage("item-output-query-modify.php")) echo 'style="background-color: #FF5722;"'; ?>>
                                 <a href="item-output-query-modify.php">•   <span>Output Query and Modify</span></a>
                              </li>
                            </li>

                            
                        </ul>


                        <li class="active">
                              <a href="#stock" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-archive" style="color:white;"></i><span>Stock</span></a>
                              <ul class="collapse list-unstyled <?php if (isActivePage(["stock-informationsetting.php","stock-query.php","stock-report.php","stock-inventorymanagement.php"])) echo 'show'; ?>" id="stock">



                              <li <?php if (isActivePage("stock-informationsetting.php")) echo 'style="background-color: #FF5722;"'; ?>>
                                 <a href="stock-informationsetting.php">•   <span>Stock Information Setting</span></a>
                              </li>

                              <li <?php if (isActivePage("stock-query.php")) echo 'style="background-color: #FF5722;"'; ?>>
                                 <a href="stock-query.php">•   <span>Stock Query</span></a>
                              </li>

                              <li <?php if (isActivePage("stock-report.php")) echo 'style="background-color: #FF5722;"'; ?>>
                                 <a href="stock-report.php">•   <span>Stock Report</span></a>
                              </li>

                              <li <?php if (isActivePage("stock-inventorymanagement.php")) echo 'style="background-color: #FF5722;"'; ?>>
                                 <a href="stock-inventorymanagement.php">•   <span>Stock Inventory Management</span></a>
                              </li>

                              </ul>


                            </li>
                     </li>
                        </ul>

                        
                     </li>


                     <li class="active">
                        <a href="#bms" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-dollar" style="color:#white;"></i><span>BMS</span></a>
                        <ul class="collapse list-unstyled <?php if (isActivePage(["bms-forecast.php","bms-control.php","bms-analysis.php"])) echo 'show'; ?>" id="bms">


                        <li <?php if (isActivePage(["bms-forecast.php"])) echo 'style="background-color: #FF5722;"'; ?>>
                           <a href="bms-forecast.php">•   <span>Forecast</span></a>
                        </li>
                        <li <?php if (isActivePage(["bms-control.php"])) echo 'style="background-color: #FF5722;"'; ?>>
                              <a href="bms-control.php">•   <span>Control</span></a>
                           </li>
                           <li <?php if (isActivePage(["bms-analysis.php"])) echo 'style="background-color: #FF5722;"'; ?>>
                              <a href="bms-analysis.php">•   <span>Analysis</span></a>
                           </li>
                           
                        </ul>
                     </li>
                    


                     <li class="active"><a href=""><i class="fa fa-file-text" style="color: #white;"></i> <span>Reports</span></a></li>
                     <li  class="active">
                        <a href="#apps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-users" style="color:#white;"></i> <span>Administrator</span></a>
                        <ul class="collapse list-unstyled" id="apps">
                           <li><a href="">•  <span>User Management</span></a></li>
                           <li><a href="">•  <span>Section Cost Center Index</span></a></li>
                           <li><a href="">•  <span>Warehouse Index</span></a></li>
                           <li><a href="">•  <span>Warehouse Acess</span></a></li>
                        </ul>
                     </li>
                     <li  class="active"><a href=""><i class="fa fa-address-book-o"></i><span>User Manual</span></a></li>
                     <li  class="active"><a href="login.php"><i class="fa fa-power-off" style="color: red;"></i><span>Log out</span></a></li>
                   
                  </ul>
               </div>
            </nav>