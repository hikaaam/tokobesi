	<!-- Header -->
    <header class="header1">
        <!-- Header desktop -->
        <div class="container-menu-header">
        <div class="wrap_header">
            <!-- Logo -->
            <a href="" class="logo">
          

                <img src="{{ url('private/images', ['logo']) }}" alt="IMG-LOGO" >
            </a>
            <!-- Menu -->
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <li>
                            <a href="{{ url('/', []) }}">Home</a>
        
                        </li>
             
                        <li>
                        <a href="#">{{'kat1'}}</a>
                           <ul class="sub_menu">
                                              
                           <li><a href="{{ url('cat', ['']) }}">kat1</a></li>
                     
                            </ul>
                        </li>
   
                        <li>
                            <a href="{{ url('about', []) }}">About Us</a>
                        </li>
                    </ul>
                </nav>
            </div>
        
            <!-- Header Icon -->
            <div class="header-icons">
                <button  class="searchlogo" id="searchIcon" onclick="openForm()"> <i class="fas fa-search"></i></button>
                
                    <div class="form-popup" id="myForm">
                           
                    </div>
        
            </div>
        </div>
        </header>
        
        <!-- Header Mobile -->
        <div class="wrap_header_mobile">
                <!-- Logo moblie -->
                <a href="{{ url('/', []) }}" class="logo-mobile">
                    <img src="{{ url('private/images', ['logo']) }}" alt="IMG-LOGO" >
                </a>
        
                <!-- Button show menu -->
                <div class="btn-show-menu">
                    <!-- Header Icon mobile -->
                    <div class="header-icons-mobile">
        
                    <button id="menuMobile" onclick="popupMobile()" class="buttonMobile"> <i class="fa fa-bars "></i></button>
                    <button id="ClosemenuMobile" onclick="closeMobile()" class="closeButtonMobile"> <i class="fa fa-times "></i></button> 
                    
                    </div>
                </div>
        </div>
        
        
        <!-- Menu Mobile -->
        <div class="wrap-side-menu" id="wrap-side-menu" >
            <nav class="side-menu">
                <ul class="main-menu">
                    {{-- <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                        <span class="topbar-child1">
                            Free shipping for standard order over $100
                        </span>
                    </li>
        
                    <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
                        <div class="topbar-child2-mobile">
                            <span class="topbar-email">
                                fashe@example.com
                            </span>
        
                            <div class="topbar-language rs1-select2">
                                <select class="selection-1" name="time">
                                    <option>USD</option>
                                    <option>EUR</option>
                                </select>
                            </div>
                        </div>
                    </li> --}}
         
                  
                    
            
                     
            
        
                                
                    <li class="item-menu-mobile">
                        <a href="{{ url('cat', []) }}">Home</a>
                    </li>
                
                    <li class="item-menu-mobile">
                        <a href="{{ url('about', []) }}">About Us</a>
                    </li>
                    <li class="item-menu-mobile">          
                                <a href="https://web.facebook.com/AndaCoegSekalli"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
                                <a href="https://www.instagram.com/shollahudinyusuf/" ><i class="fab fa-instagram" aria-hidden="true"></i></a>
                                <a href="https://twitter.com/Ery_795"><i class="fab fa-twitter" aria-hidden="true"></i></a>
                                <a href="https://wa.me/6282264020976" ><i class="fab fa-whatsapp" aria-hidden="true"></i></a>
                                <a href="https://www.youtube.com/channel/UCcuLvcG10Q34iH8o7BmXvLg" ><i class="fab fa-youtube" aria-hidden="true"></i></a>
                                <a href="https://t.me/ucupj" ><i class="fab fa-telegram" aria-hidden="true"></i></a>
                        </li>
                </ul>
            </nav>
        </div>
        
        
        