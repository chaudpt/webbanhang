
        <div class="container position-relative bg-light" id="content-2.1">
            <div class="row mt-1 bg-light align-items-center">  
                <div class-"col-sm-12">
                    <!--
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.5 5.24609C2.5 3.72731 3.73122 2.49609 5.25 2.49609H6C6.41421 2.49609 6.75 2.83188 6.75 3.24609C6.75 3.66031 6.41421 3.99609 6 3.99609H5.25C4.55964 3.99609 4 4.55574 4 5.24609V10.6842C4 11.3745 4.55964 11.9342 5.25 11.9342H10.7508C11.4411 11.9342 12.0008 11.3745 12.0008 10.6842V9.99829C12.0008 9.58408 12.3366 9.24829 12.7508 9.24829C13.165 9.24829 13.5008 9.58408 13.5008 9.99829V10.6842C13.5008 12.203 12.2696 13.4342 10.7508 13.4342H5.25C3.73122 13.4342 2.5 12.203 2.5 10.6842V5.24609ZM12 5.05906L8.03033 9.02873C7.73744 9.32162 7.26256 9.32162 6.96967 9.02873C6.67678 8.73583 6.67678 8.26096 6.96967 7.96807L10.9393 3.9984L9 3.9984C8.58579 3.9984 8.25 3.66261 8.25 3.2484C8.25 2.83418 8.58579 2.4984 9 2.4984L12.25 2.4984C12.9404 2.4984 13.5 3.05804 13.5 3.7484V6.9984C13.5 7.41261 13.1642 7.7484 12.75 7.7484C12.3358 7.7484 12 7.41261 12 6.9984V5.05906Z" fill="#673DE6"/>
                    </svg>
                    -->
                     <br>
                    <h1 class="display-5 lead" >Bạn đang tìm kiếm những chậu hoa đáng yêu trang trí cho khu vườn nhà bạn hoặc bạn cần làm cho góc bàn làm việc thêm nhiều năng lượng, thoải mái khi ngồi làm việc!</h1>
                </div>
            </div>
        </div>            
        
        <div class="clear" style= "width:80%; background: lightpink; align-items: center;">
            <hr style="height:20px; width: 70%;">
            <p > Tất cả bạn cần làm là hãy thường xuyên ghé thăm trang web của chúng tôi để có được những phút giây thoải mái và thư thả nhất. Đếm với <a hre="https://hinanashop.com">Hi Nana Shop </a>, chúng tôi mang lại cho bạn những điều tuyệt vời nhất</p>
             <br>
            <p> Bạn có muốn đăng ký để nhận được ebook chăm sóc cây cảnh của chúng tôi không?  <button class="joinBtn">Subscribe</button> </p>
           <br>
           
            <p>Chào mừng bạn đến với <a    href="/about.php"     rel="nofollow"    target="_blank"  >Hi Nana Shop  </a></p>
            <hr style="height:20px;">
        </div>
        
        <div class="container position-relative bg-light" id="content-2.2">
            <div class="row mt-1 bg-light align-items-center position-relative">  
                <div class-"col-sm-12 position-relative" style= "background: lightgray;">             
                    <hr style="height:20px;">
                   
                    <br>
                    <p class="small">
                            Chúng tôi rất vui khi bạn ghé thăm và mua sắm tại website của chúng tôi, hãy chia sẻ cảm nghĩ của bạn với chúng tôi <a 
                            class="link"
                            href="https://blog.hinanashop.com"
                            rel="nofollow"
                            target="_blank"
                        > ở đây </a>
                    </p>
                    
                    <br>
                    <?php include '/session.php';?>
                    <?php
                        $loggedIn = $_SESSION["loggedin"];
                        if ($loggedIn == 1) {
                          echo '<a id="loginBtn" class="btn btn-primary myButtons" href="/store.php">Hi Nana Shop</a>';
                        } else {
                          echo '<a id="loginBtn" class="btn btn-primary myButtons" href="/login.php">Hi Nana Shop</a>';
                        }
                        ?>
                     <p class="small"> Nếu bạn có bất cứ câu hỏi nào hãy <a href="/mail.php"> Email </a>cho chúng tôi </p>
                      <br>
                    <hr style="height:20px;">
                </div>
            </div>
            
        </div>
        
        <div class="clear"></div>
        
        <div class="clear">
             <hr style="height:600px;">
        </div>
        
            
         <div class="container-fluid position-relative bg-light" id="content-2.4">   
            <div class="row position-relative">
                    <div class="z-1 position-absolute" style=" top: 0px;  right: 0;">
                        <img src="https://static.vecteezy.com/system/resources/thumbnails/048/476/514/small/chinese-scroll-banner-chinese-paper-scroll-chinese-scroll-asian-frame-png.png" alt="Forest" width="100%" height="100%" style="object-fit: cover;">
                    </div>
                    <div class="z-2 p-2 position-absolute w-100" style=" opacity: 0.33; top: 50;  right: 0;">
                        <hr style="height:30px; background: blue;">
                        <svg height="300" width="1250"  xmlns="http://www.w3.org/2000/svg"  style="scale: 0.5;">
    
                            <!-- Draw the paths -->
                            <path id="line-H" d="M0 5 l 0 200 l 40 0 l 0 -80 l 40 0 l 0 80 l 40 0  l 0 -200  l -40 0 l 0 80  l -40 0 l 0 -80 Z" stroke="green" stroke-width="4" fill="none"/>
                            <path id="line-I" d="M 125 5 l 0 200 l 40 0 l 0 -200  Z" stroke="green" stroke-width="4" fill="none"/>
                            <path id="line-N1" d="M 170 5 l 0 200 l 40 0 l 0 -100 l 40 100 l 40 0 l 0 -200 l -40 0 l 0 100 l -40 -100 Z " stroke="green" stroke-width="4" fill="none"/>
                            <path id="line-A1" d="M 335 5 l -40 200 l 40 0 l 7 -40 l 26 0 l 7 40 l 40 0 l -40 -200 Z" stroke="green" stroke-width="4" fill="none"/>
                            <path id="line-Aa1" d="M 355 40 l -12 80 l 18 0 Z " stroke="green" stroke-width="4" fill="none"/>
                            
                            <path id="line-N2" d="M 425 5 l 0 200 l 40 0 l 0 -100 l 40 100 l 40 0 l 0 -200 l -40 0 l 0 100 l -40 -100 Z" stroke="green" stroke-width="4" fill="none"/>
                            <path id="line-A2" d="M 600 5 l -40 200 l 40 0 l 7 -40 l 26 0 l 7 40 l 40 0 l -40 -200 Z" stroke="green" stroke-width="4" fill="none"/>
                            <path id="line-Aa2" d="M 620 45 l -12 80 l 18 0 Z " stroke="green" stroke-width="4" fill="none"/>
                            
                           <path id="lineS" d="M 760 60 l 40 0 l 0 -20 q -12 -28 -40 -40 l -40 0 q -28 12 -40 40 q 7 50 40 70 q 35 15 40 30 q -20 30 -40 0  l -40 0 l 0 20 q 12 28  40 40 l 40 0 q 28 -12 40 -40 q -7 -50 -40 -70  q -35 -15 -40 -30  q 20 -30 40 0 Z " stroke="green" stroke-width="4" fill="none"/>
                           
                            <path id="line-H2" d="M810 5 l 0 200 l 40 0 l 0 -80 l 40 0 l 0 80 l 40 0  l 0 -200  l -40 0 l 0 80  l -40 0 l 0 -80 Z" stroke="green" stroke-width="4" fill="none"/>
                            <path id="line-O" d="M 980 5 q -28 18 -40 40 l 0 120 q 15 30 40 40 l 40 0 q 30 -15 40 -40 l 0 -120 q -15 -30 -40 -40 Z" stroke="green" stroke-width="4" fill="none"/>
                            <path id="line-Oo" d="M 1000 45  q -15 5 -20 20 l 0 80 q 5 15 20 20 q 15 -5 20 -20 l 0 -80 q -5 -15 -20 -20  Z" stroke="green" stroke-width="4" fill="none"/>
                            <path id="lineP" d="M 1080 5 l 0 200 l 40 0 l 0 -80 l 40 0 q 28 -18 40 -40 l 0 -40 q -18 -28 -40 -40 Z"  stroke="green" stroke-width="4" fill="none"/>
                            <path id="lineP" d="M 1080 5 l 0 200 l 40 0 l 0 -80 l 40 0 q 28 -18 40 -40 l 0 -40 q -18 -28 -40 -40 Z"  stroke="green" stroke-width="4" fill="none"/>
                            <path id="lineA1" d="M 1120 40 l 0 40 l 20 0 q 30 -20 0 -40 Z " stroke="green" stroke-width="4" fill="none"/>
                            
                            <!-- Mark relevant points 
                            <g stroke="black" stroke-width="3" fill="black">
                            <circle id="pointA" cx="100" cy="300" r="4" />
                            <circle id="pointB" cx="200" cy="250" r="4" />
                            <circle id="pointC" cx="300" cy="290" r="4" />
                            </g>
                            -->
                            <!-- Label the points 
                            <g font-size="30" font-family="sans-serif" fill="green" text-anchor="middle">
                            <text x="100" y="350" dx="-30">A</text>
                            <text x="250" y="250" dy="-10">B</text>
                            <text x="310" y="310" dx="30">C</text>
                            </g>
                            -->
                        </svg>
                </div>
                <div class="z-3 position-absolute" style=" opacity: 1; top: 50px;  right: 0; border: 1px;">
                    <hr style="height:160px; background: blue;">
                     <p class="display-5 text-center" style="top:100px; right:0"> Up to 35% OFF </p>
                 </div>
            </div>
        </div>
        <div class="clear" style="background: green;">
             <hr style="height:200px; background: blue;">
             <hr style="height:200px;background: yellow;">
             <hr style="height:200px;background: grey;">
        </div>
        
        
        <div class="container-fluid position-relative bg-light" id="content-2.6">
            <div class="opacity-75" style="position-relative background: green;   flex-wrap: wrap; ">
                 <div class="row position-relative"  style="background: lightblue; padding-top: 50px; padding-right: 30px; padding-bottom: 50px; padding-left: 80px;">
                    <div class="col-sm-2 mt-auto">
                        <img src="https://dienhoa24gio.net/assets/upload/product/13-06-2023/lang-hoa-dep-sang-trong-1686645677/default.jpg" alt="Forest" width="100%">
                    </div> 
                    <div class="col-sm-2 mt-auto">
                        <img src="https://elmich.vn/wp-content/uploads/2024/04/Hinh-1-hinh-trong-bai-viet-18.jpg" alt="Forest" width="100%" >
                    </div> 
                    <div class="col-sm-2 mt-auto">
                        <img src="https://noithatmeta.com/wp-content/uploads/2022/02/hoa-tulip.jpg" alt="Forest" width="100%" height="100p%">
                    </div> 
                    <div class="col-sm-2 mt-auto">
                        <img src="https://dienhoa24gio.net/assets/upload/product/13-06-2023/lang-hoa-dep-sang-trong-1686645677/default.jpg" alt="Forest" width="100%" height="100%">
                    </div> 
                    <div class="col-sm-2 mt-auto">
                        <img src="https://elmich.vn/wp-content/uploads/2024/04/Hinh-1-hinh-trong-bai-viet-18.jpg" alt="Forest" width="100%" height="100%">
                    </div> 
                    <div class="col-sm-2 mt-auto">
                    <img src="https://noithatmeta.com/wp-content/uploads/2022/02/hoa-tulip.jpg" alt="Forest" width="100%" height="100%">
                     </div> 
                </div>
                <div style="display:none;  height:500px;"></div>
                
             </div>
          </div>   
         <div class="clear"></div>