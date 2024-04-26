
    

    <nav class="sidebarr close">
        <header>
            <div class="image-text">
                <span class="image">
                    <!--<img src="logo.png" alt="">-->
                </span>

                <!-- <div class="text logo-text">
                    <span class="name">Codinglab</span>
                    <span class="profession">Web developer</span>
                </div> -->
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Search...">
                </li>
<br>
                <ul class="menu-links" style="margin-left: -50px;">
                    <li class="nav-link">
                        <a href="http://localhost/Easyfarm/V_renter_home/get_details1">
                            <i class='bx bx-home-alt icon' ></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <!-- <a href="http://localhost/Easyfarm/Seller_post/creating"> -->
                         <a href = "http://localhost/Easyfarm/V_post/creating";>

                            <i class='bx bx-bar-chart-alt-2 icon' ></i>
                            <span class="text nav-text">Create</span>
                        </a>
                    </li>

                    <li class="nav-link">
                    <!-- <a href="http://localhost/Easyfarm/Plan/get_plan_details"> -->
                <a href = "http://localhost/Easyfarm/V_plan/get_plan_details";>
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Plan</span>
                        </a>
                    </li>

               

                    <li class="nav-link">
                        <!-- <a href="http://localhost/Easyfarm/Seller_post/created_post"> -->
                             <a href = "http://localhost/Easyfarm/V_post/created_post";>

                            <i class='bx bx-heart icon' ></i>
                            <span class="text nav-text">Wallets</span>
                        </a>
                    </li>

                    <!-- <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon' ></i>
                            <span class="text nav-text">Wallets</span>
                        </a>
                    </li> -->

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="<?php echo URLROOT?>/Users/logout">
                        <i class='bx bx-log-out icon' ></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
                
            </div>
        </div>

    </nav>

    <section class="home">
   
      
    </section>

    <script>
        const body = document.querySelector('body'),
      sidebar = body.querySelector('nav'),
      toggle = body.querySelector(".toggle"),
      searchBtn = body.querySelector(".search-box"),
      modeSwitch = body.querySelector(".toggle-switch"),
      modeText = body.querySelector(".mode-text");


toggle.addEventListener("click" , () =>{
    sidebar.classList.toggle("close");
})

searchBtn.addEventListener("click" , () =>{
    sidebar.classList.remove("close");
})

modeSwitch.addEventListener("click" , () =>{
    body.classList.toggle("dark");
    
    if(body.classList.contains("dark")){
        modeText.innerText = "Light mode";
    }else{
        modeText.innerText = "Dark mode";
        
    }
});
    </script>




