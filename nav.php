
<!--nav-->
<nav class="main-menu">
   
   <ul>
     <li>
     <a href="info.php">
     <i class=" fa fa-solid fa-user"></i>
         <span class="nav-text">
         <h4>Welcome <?php  echo $_SESSION['Customername'];?></h4>
               </span>
     </li>
       <li>
           <a href="home.php">
               <i class="fa fa-home fa-2x"></i>
               <span class="nav-text">
                   Home
               </span>
           </a>
         
       </li>
       
       <li class="has-subnav">
           <a href="meterread.php">
               <i class="fa fa-money-check-alt"></i>
               <span class="nav-text">
                   Bill Payment
               </span>
           </a>
           
       </li>
       <li class="has-subnav">
           <a href="billhistory.php">
               <i class="fa fa-history"></i>
               <span class="nav-text">
                   Billing history
               </span>
           </a>
          
       </li>
       <li>
           <a href="complain.php">
               <i class="fa fa-light fa-user-pen"></i>
               <span class="nav-text">
                   Complain
               </span>
           </a>
       </li>
       <li>
          <a href="aboutus.php">
           <i class="fa sharp fa-light fa-info"></i>
               <span class="nav-text">
                   About US
               </span>
           </a>
       </li>               
   <ul class="logout">
       <li>
          <a href="logout.php">
                <i class="fa fa-power-off fa-2x"></i>
               <span class="nav-text">
                   Logout
               </span>
           </a>
       </li>  
   </ul>
</nav>

