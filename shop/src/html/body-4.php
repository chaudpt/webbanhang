<div class="container mt-0 bg-primary position-relative d-block" id="content-6">
    <div class="row">
         <form action="/action_page.php">
             <div class="mb-3 mt-3">
                    <label for="email">Địa chỉ email:</label>
                    <input id="email" name="email" type="email" value="hinanashop@gmail.com" />
                
                    <label for="note">Gởi cho chúng tôi ảnh của bạn:</label>
                    <textarea id="note" name="note">Đừng ngại nhé</textarea>
                
                    <label for="pic">Ảnh của bạn:</label>
                    <input id="pic" name="pic" type="file" />
                    
                    <label for="comment">Comments</label>
                    <textarea class="form-control" id="comment" name="text" placeholder="Comment goes here"></textarea>
                    
                    <input type="submit" value="Gởi đăng ký" />
            </div>
        </form>
    </div>
    
    <div class="row">
        <p>Điền chi tiết thông tin của bạn ở trên:</p>
        <br>
        <a href="https://hinanashop.com">
            <input type="button" name="shop-page" value="HI NANA SHOP">
        </a>
        <input id="shop-page" type="button" value="Cửa hàng" />
        <input id="home-page" type="button" value="Trang chủ" />
        <input id="chinh-sách" type="button" value="Chính sách" />
         <input id="about-page" type="button" value="Về chúng tôi" />
        <script> 
            document.getElementById('shop-page').addEventListener('click', 
                function() {
                    this.style.backgroundColor = 'blue';
                });
            
        </script> 
    </div>
    <div class="clear"></div>
    
    
    <div class="row position-relative" id="content-7" style="width: 1300px; height: 450px; background: lightgray; display:flex;">
        <div class="col" style=" top: 0; left: 0; width: 100%; height: 100%; background: pink; position: absolute;">
          <img src="https://media.istockphoto.com/id/503874466/vi/anh/tr%C4%83ng-tr%C3%B2n.jpg?s=612x612&w=0&k=20&c=5sBpWZES-BPWe7gAJvI2r7A0rlvxec1fh0TSxkPsjQw=" alt="Forest" width="100%" height="100%">
          <p class="bg-primary text-white"> Những chậu hoa xinh xắn nhất đang đợi quý vị mang về nhà </p> 
        </div>
        <div class="col" style="position: relative; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: rgba(0, 0, 255, 0.7); padding: 10px; color: white;">
          <!-- Label the points 
            <svg height="400" width="450" xmlns="http://www.w3.org/2000/svg">
                <path id="lineH" d="M0 5 l 0 200 l 40 0 l 0 -80 l 40 0 l 0 80 l 40 0  l 0 -200  l -40 0 l 0 80  l -40 0 l 0 -80 Z" stroke="green" stroke-width="4" fill="none"/>
                <path id="lineI" d="M 125 5 l 0 200 l 40 0 l 0 -200  Z" stroke="green" stroke-width="4" fill="none"/>
                <path id="lineN1" d="M 170 5 l 0 200 l 40 0 l 0 -100 l 40 100 l 40 0 l 0 -200 l -40 0 l 0 100 l -40 -100 Z " stroke="green" stroke-width="4" fill="none"/>
                <path id="lineA1" d="M 335 5 l -40 200 l 40 0 l 7 -40 l 26 0 l 7 40 l 40 0 l -40 -200 Z" stroke="green" stroke-width="4" fill="none"/>
                <path id="lineA1" d="M 355 40 l -12 80 l 18 0 Z " stroke="green" stroke-width="4" fill="none"/>
                
                 <path id="lineN2" d="M 425 5 l 0 200 l 40 0 l 0 -100 l 40 100 l 40 0 l 0 -200 l -40 0 l 0 100 l -40 -100 Z" stroke="green" stroke-width="4" fill="none"/>
                <path id="lineA2" d="M 600 5 l -40 200 l 40 0 l 7 -40 l 26 0 l 7 40 l 40 0 l -40 -200 Z" stroke="green" stroke-width="4" fill="none"/>
                <path id="lineA2" d="M 620 45 l -12 80 l 18 0 Z " stroke="green" stroke-width="4" fill="none"/>
                
               <path id="lineS" d="M 760 60 l 40 0 l 0 -20 q -12 -28 -40 -40 l -40 0 q -28 12 -40 40 q 7 50 40 70 q 35 15 40 30 q -20 30 -40 0  l -40 0 l 0 20 q 12 28  40 40 l 40 0 q 28 -12 40 -40 q -7 -50 -40 -70  q -35 -15 -40 -30  q 20 -30 40 0 Z " stroke="green" stroke-width="4" fill="none"/>
               
                <path id="lineH2" d="M810 5 l 0 200 l 40 0 l 0 -80 l 40 0 l 0 80 l 40 0  l 0 -200  l -40 0 l 0 80  l -40 0 l 0 -80 Z" stroke="green" stroke-width="4" fill="none"/>
                <path id="line0" d="M 980 5 q -28 18 -40 40 l 0 120 q 15 30 40 40 l 40 0 q 30 -15 40 -40 l 0 -120 q -15 -30 -40 -40 Z" stroke="green" stroke-width="4" fill="none"/>
                <path id="line0" d="M 1000 45  q -15 5 -20 20 l 0 80 q 5 15 20 20 q 15 -5 20 -20 l 0 -80 q -5 -15 -20 -20  Z" stroke="green" stroke-width="4" fill="none"/>
                <path id="lineP" d="M 1080 5 l 0 200 l 40 0 l 0 -80 l 40 0 q 28 -18 40 -40 l 0 -40 q -18 -28 -40 -40 Z"  stroke="green" stroke-width="4" fill="none"/>
                <path id="lineP" d="M 1080 5 l 0 200 l 40 0 l 0 -80 l 40 0 q 28 -18 40 -40 l 0 -40 q -18 -28 -40 -40 Z"  stroke="green" stroke-width="4" fill="none"/>
                <path id="lineA1" d="M 1120 40 l 0 40 l 20 0 q 30 -20 0 -40 Z " stroke="green" stroke-width="4" fill="none"/>
                
                
                <g stroke="black" stroke-width="3" fill="black">
                <circle id="pointA" cx="100" cy="300" r="4" />
                <circle id="pointB" cx="200" cy="250" r="4" />
                <circle id="pointC" cx="300" cy="290" r="4" />
                </g>
                
                
                <g font-size="30" font-family="sans-serif" fill="green" text-anchor="middle">
                <text x="100" y="350" dx="-30">A</text>
                <text x="250" y="250" dy="-10">B</text>
                <text x="310" y="310" dx="30">C</text>
                </g>
            </svg>
            <p class="display-1> Up to 35% OFF </p>
            -->
            <p> SECTION 3.2</p>
        </div>
        <div class="clear"></div>
    </div>
</div>