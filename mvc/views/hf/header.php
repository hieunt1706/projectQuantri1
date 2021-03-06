<style>
.toggle__icon{
  background-image: url(http://localhost:8080/projectQuanTri1/public/style/images/menu-button.svg);
}
.search, .user {
    display: flex;
    justify-content: flex-end;
}
@media screen and (max-width: 767px) {
  .ok{
    width: 95%;
  }
  #header1{
    width: 95% !important;
  }
  .search{
    display: none;
  }
}

</style>

<nav class="navbar navbar-expand-lg ok">
          <nav class="navbar">
              <a class="navbar-brand" href="<?php echo URL; ?>">
              <img src="http://demo1.wpopal.com/bestfriend/wp-content/uploads/2016/12/logo.png"  alt="logo">
              </a>
          </nav>
       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon toggle__icon"></span>
       </button>
  
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto navbar_home">
              <div class="search">
                <li class="nav-item dropdown dropdownn">
                  
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Something else here</a>
                  </div>
              </li>
              <li class="nav-item">
                  <form class="form-inline my-2 my-lg-0">
                      <input  class="form-control mr-sm-2 formsearch inputt" type="search"  placeholder="What do you need..." aria-label="Search">
                      <div>
                     
                      </div>
                  </form>
                  
              </li>
              
              </div>
              <div class="user">
              <div class="cart">
                <a href="<?php echo URL . 'home/cart'; ?>" class="cart_home">
                  <span id="numcart">
                    <span id=num_cart>
                      <?php
                        if(isset($_SESSION['cart'])){
                          echo count($_SESSION['cart']);
                        }
                        else{
                          echo "0";
                        }
                      ?>
                    </span>
                  </span>
                  <i class="fas fa-shopping-cart"></i>
                  
                </a>
               
              </div>
              <li class="nav-item">
                <div class="dropdown show ">
                    <a  class="btn btn_user" href="#" role="button" id="dropdownUserLink" data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                      <span>
                        <?php
                          if(isset($_SESSION['user'])){
                            echo $_SESSION['user']['username'];
                          }
                        ?>
                      </span>
                      <i class="far fa-user"></i>
                    </a>
                
                    <div class="dropdown-menu" aria-labelledby="dropdownUserLink">
                      <?php
                        if(isset($_SESSION['user'])){
                          if($_SESSION['user']['admin'] == 1){
                            echo  "<a class='dropdown-item' href=" . URL . 'dashboard' . ">Admin</a>"; 
                          }
                        }
                      ?>
                  
                    <a class="dropdown-item log" href="<?php 
                                                      if(isset($_SESSION['user'])){
                                                        echo URL . 'user/logout';
                                                      }
                                                      else{
                                                        echo URL . 'LoginAndRegister'; 
                                                      }
                                                    ?>">
                                                      <?php
                                                        if(isset($_SESSION['user'])){
                                                          echo "Log Out";
                                                        }
                                                        else{
                                                          echo "Log In";
                                                        }
                                                      ?>
                                                    </a>
                    <?php
                      if(isset($_SESSION['user'])){
                        echo "<a class='dropdown-item' href='". URL . "user/changepass'>Change Password</a>";
                      }
                    ?>                              
                    </div>
                </div>
              </li>
              </div>
              
            </ul>
        </div>
      </nav>