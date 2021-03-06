<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="<?php echo URL . 'public/style/css/dashboard.css'; ?>">

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        .trong{
            color: #fff;
            border: none;
            background: transparent !important;
        }
        .recent-grid img{
            width: 100px;
        } 
    </style>
</head>
<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <a href="<?php echo URL; ?>"><h2><span class="lab la-accusoft"> <span>Pet</span> </span></h2></a>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li> 
                    <div id="bar1">
                    <a href="<?php echo URL . 'dashboard'; ?>" class="active"><span class="las la-igloo"></span>
                        <span>Dashboard</span></a>
                    </div>
                </li>
                <li> 
                    <div id="bar1">
                    <a  href="<?php echo URL . 'user'; ?>" class="active"><span class="las la-igloo"></span>
                        <span>Customers</span></a>
                    </div>
                </li>
                
                <li> 
                    <div id="bar1">
                    <a  href="<?php echo URL . 'pet'; ?>" class="active"><span class="las la-igloo"></span>
                        <span>Pets</span></a>
                    </div>
                </li>

               
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Dashboard
            </h2>
            <div class="search-wrapper">
                <span class="las la-search">
                    <input class="search" type="search" placeholder="search here">
                </span>
            </div>
            <div class="user-wrapper">
                <div>
                    <h4><?php
                        if(isset($_SESSION['user'])){
                            echo $_SESSION['user']['username'];
                        }
                    ?></h4>
                    <small>Super admin</small>
                </div>
            </div>
        </header>
        <main>
           
            <?php
            
                require_once($data['main'] . '.php'); 
            
            
            ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
  
<script src="<?php echo URL . 'public/style/js/dashboard.js'; ?>" type="text/javascript" charset="utf-8"></script>
 

</body>
</html>