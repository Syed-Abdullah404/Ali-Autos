<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--<title> Responsive Sidebar Menu  | CodingLab </title>-->
    <link rel="stylesheet" href="css/styles.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
     <script src="ckeditor/ckeditor.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
     <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.css">
  
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   </head>
<body>
  <div class="sidebar d-print-none">
    
  
    
    <ul class="nav-list">
    <!-- <li>
    <img src="images/logo.png" class="ms-3" alt="" height="90px" width="210px">
    </li> -->
      <li>
        <a href="index.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
        
      </li>
      <li class=" dropdown">
       <a  href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
       <i class="fas fa-registered"></i>

        <span class="links_name">Reports</span>
       </a>
       <span class="tooltip">Reports</span>
       <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="saleReport.php">Sale Report</a></li>
            <li><a class="dropdown-item" href="purchaseReport.php">Purchase Report</a></li>
            <li><a class="dropdown-item" href="supplierReport.php">Supplier Report</a></li>
            <li><a class="dropdown-item" href="customerReport.php">Customer Report</a></li>
            <li><a class="dropdown-item" href="stockReport.php">Stock Report</a></li>
            
            
          </ul>
     </li>
      
      <li class=" dropdown">
       <a  href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
       <i class="fab fa-cuttlefish"></i>

        <span class="links_name">Categories</span>
       </a>
       <span class="tooltip">Categories</span>
       <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="category.php">Category</a></li>
            <li><a class="dropdown-item" href="subcategory.php">Sub-Category</a></li>
            
            
          </ul>
     </li>

    
    

     <li>
       <a href="units.php">
         <i class='bx bx-chat' ></i>
         <span class="links_name">Units</span>
       </a>
       <span class="tooltip">Units</span>
     </li>
     <li>
       <a href="products.php">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Products</span>
       </a>
       <span class="tooltip">Products</span>
     </li>
     <li>
       <a href="supplier.php">
         <i class='bx bx-folder' ></i>
         <span class="links_name">Supplier</span>
       </a>
       <span class="tooltip">Supplier</span>
     </li>
     <li>
       <a href="customer.php">
         <i class='bx bx-cart-alt' ></i>
         <span class="links_name">Customer</span>
       </a>
       <span class="tooltip">Customer</span>
     </li>
     <li>
       <a href="stock.php">
         <i class='bx bx-heart' ></i>
         <span class="links_name">Stock</span>
       </a>
       <span class="tooltip">Stock</span>
     </li>
     <li>
       <a href="dailyexpense.php">
         <i class='fas fa-money-check' ></i>
         <span class="links_name">Daily Expense</span>
       </a>
       <span class="tooltip"> Daily Expense</span>
     </li>
     <li>
       <a href="purchase.php">
         <i class='fas fa-store' ></i>
         <span class="links_name">Purchase</span>
       </a>
       <span class="tooltip">Purchase</span>
     </li>
     <li>
       <a href="sale.php">
         <i class='fas fa-shopping-basket' ></i>
         <span class="links_name">Sale</span>
       </a>
       <span class="tooltip">Sale</span>
     </li>
     <li>
       <a href="employee.php">
         <i class='fas fa-male' ></i>
         <span class="links_name">Employee</span>
       </a>
       <span class="tooltip">Employee</span>
     </li>
     <li>
       <a href="recipe.php">
       <i class="fas fa-exchange-alt"></i>
         <span class="links_name">Recipe</span>
       </a>
       <span class="tooltip">Recipe</span>
     </li>
     <li>
       <a href="loss.php">
       <i class="fas fa-exchange-alt"></i>
         <span class="links_name">Loss</span>
       </a>
       <span class="tooltip">Loss</span>
     </li>
     <li>
       <a href="saleprice.php">
         <i class='fas fa-chart-line' ></i>
         <span class="links_name">Sale Price List</span>
       </a>
       <span class="tooltip">Sale Price List</span>
     </li>
     <li>
       <a href="costprice.php">
         <i class='fas fa-chart-bar' ></i>
         <span class="links_name">Cost Price List</span>
       </a>
       <span class="tooltip">Cost Price List</span>
     </li>
     <li>
       <a href="alert.php">
         <i class='fas fa-bell' ></i>
         <span class="links_name">Alert</span>
       </a>
       <span class="tooltip">ALert</span>
     </li>
    
    

     
     
    </ul>
  </div>
  <div class="top-section d-print-none">
      <div class="row shadow">
        <div class="col-lg-6">
        <div class="logo-details">
        <i class='bx bx-menu' id="btn" ></i>
    </div>
        </div>
        <div class="col-lg-6 text-end d-print-none">
          <!-- <img src="images/dummy-dp.png" style="border-radius: 100px;" class="m-4" alt="" height="50px" width="60px"> -->
          <div class="dropdown m-2">
      <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
        Admin
      </a>

  <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <li><a class="dropdown-item" href="profile.php">Profile</a></li>
    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
   
  </ul>
</div>
        </div>
      </div>
</div>