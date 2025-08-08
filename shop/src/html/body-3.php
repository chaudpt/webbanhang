<div class="position-relative bg-dark  text-white text-center d-block" id="content-4">  
    <div class="position-relative d-block" id="content-4-1">
        <div class="row">
            <div class="col-sm-4 content sticky-top">SECTION 4.1.1 Top Thời còn bé tôi rất hay mơ mộng </div>
            <div class="col-sm-8 content sticky-sm-bottom"> SECTION 4.1.2 Right Những gì ảnh hưởng nhất </div>
        </div>
        <div class="row">
            <div class="col-sm-8 content sticky-top"> <span> Top SECTION 4.2 </span></div>
            <div class="col-sm-4 content sticky-sm-bottom"> Right SECTION 4.1</div>
        </div>    
    </div>
    <div class="bg-primary   position-relative d-block" id="content-4-2">
        <div class="row">
              <div class="col-sm-4 content">
                <form>
                  <p>Bạn biết tới trang web chúng thôi thông qua MXH nào??</p>
                  <label
                    ><input name="origin" type="radio" value="google" checked /> Google</label
                  >
                  <label><input name="origin" type="radio" value="facebook" /> Facebook</label>
                  <p>Hãy đồng ý với điều kiện sau của chúng tôi:</p>
                
                  <label
                    ><input name="newsletter" type="checkbox" checked /> I want to subscribe to
                    a personalized newsletter.</label
                  >
                
                  <label
                    ><input name="privacy" type="checkbox" /> I have read and I agree to the
                    Privacy Policy.</label
                  >
                
                  <input type="submit" value="Submit form" />
                </form>
              </div>
              <div class="col-sm-8 content">.
                <form>
                      <label for="name">Họ và tên:</label>
                      <input id="name" name="name" type="text" />
                    
                      <label for="emp">Được thuê:</label>
                      <select id="emp" name="emp" disabled>
                        <option>No</option>
                        <option>Yes</option>
                      </select>
                    
                      <label for="empDate">Ngày thuê:</label>
                      <input id="empDate" name="empDate" type="date" disabled />
                    
                      <label for="resume">CV:</label>
                      <input id="resume" name="resume" type="file" />
                </form>
              </div>

        </div>
    </div>
    <div class="bg-light   position-relative d-block"  id="content-4-3"  class="min-height: 200px;">
        <div class="row">
            <form action="" id="form1">
              <ul>
                Values between 1 and 10 are valid.
                <li>
                  <input
                    id="value1"
                    name="value1"
                    type="number"
                    placeholder="1 to 10"
                    min="1"
                    max="10"
                    value="12"
                    required />
                  <label for="value1">Your value is </label>
                </li>
              </ul>
            </form>
         </div>
    </div>
    <div class="bg-dark  position-relative d-block"  id="content-4-4" class="min-height: 200px;">
        
        <div class="row ">
          <h1>MDN :fullscreen pseudo-class demo</h1>
        
          <p>
            This demo uses the <code>:fullscreen</code> pseudo-class to automatically
            change the background color of the <code>.element</code> div.
          </p>
        
          <p>
            Normally, the background is light yellow. In fullscreen mode, the background
            is light pink.
          </p>
        
          <button class="toggle">Mở rộng màn hình phần nội dung này</button>
        </div>
        <script>
            document.querySelector(".toggle").addEventListener("click", function (event) {
              if (document.fullscreenElement) {
                // If there is a fullscreen element, exit full screen.
                document.exitFullscreen();
                return;
              }
              // Make the .element div fullscreen.
              document.querySelector(".element").requestFullscreen();
            });
        </script>
    </div>
    <div class="bg-primary  position-relative d-block"  class="min-height: 200px;">
        <div class="row">
            <div class="col-sm-4">
                <h3>Dịch vụ hoa treo</h3>
                <p>Bạn muốn ngắm nhìn những bông hoa trên cao...</p>
                <p>Dây chính là nơi tuyệt vời nhất mà bạn có thể ...</p>
                <!--
                <svg>
                  <circle cx="50" cy="50" r="50" fill="#529fca" />
                </svg>
                 -->
                <p> SECTION 4.5</p>
            </div>
            <div class="col-sm-4">
                <img src="https://icons.veryicon.com/png/o/miscellaneous/nms-icon/to-configure-7.png" style="height:200px;">
                <h3>Dịch vụ hoa để bàn</h3>
                <p>Sự lựa chọn hoàn hảo cho không gian làm việc của bạn ...</p>
                <p>Nơi không gian sống của bạn chứa nhiều năng lượng...</p>
                 <!--
                <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M6.99961 8.04961L1.74961 13.2996C1.59961 13.4496 1.42461 13.5246 1.22461 13.5246C1.02461 13.5246 0.849609 13.4496 0.699609 13.2996C0.549609 13.1496 0.474609 12.9746 0.474609 12.7746C0.474609 12.5746 0.549609 12.3996 0.699609 12.2496L5.94961 6.99961L0.699609 1.74961C0.549609 1.59961 0.474609 1.42461 0.474609 1.22461C0.474609 1.02461 0.549609 0.849609 0.699609 0.699609C0.849609 0.549609 1.02461 0.474609 1.22461 0.474609C1.42461 0.474609 1.59961 0.549609 1.74961 0.699609L6.99961 5.94961L12.2496 0.699609C12.3996 0.549609 12.5746 0.474609 12.7746 0.474609C12.9746 0.474609 13.1496 0.549609 13.2996 0.699609C13.4496 0.849609 13.5246 1.02461 13.5246 1.22461C13.5246 1.42461 13.4496 1.59961 13.2996 1.74961L8.04961 6.99961L13.2996 12.2496C13.4496 12.3996 13.5246 12.5746 13.5246 12.7746C13.5246 12.9746 13.4496 13.1496 13.2996 13.2996C13.1496 13.4496 12.9746 13.5246 12.7746 13.5246C12.5746 13.5246 12.3996 13.4496 12.2496 13.2996L6.99961 8.04961Z"
                          fill="#673DE6"></path>
                </svg>
                -->
                <p> SECTION 4.5</p>
            </div>
            <div class="col-sm-4">
                
                <img src="https://i.pinimg.com/474x/e9/72/db/e972dbc5a7bb169529d7fa2b7c4d36ad.jpg" style="height:200px;">
                <h3>Dịch vụ trang trí sân vườn</h3>        
                <p>Hãy trang trí góc sân khoảng nhà của bạn với dịch vụ của chúng tôi...</p>
                <p>Những góc nhà của bạn sẽ thêm nhiều niềm vui và hạnh phúc...</p>
                <!--
                <svg class="hsr-mobile-menu-icon" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path d="M3.75 18C3.5375 18 3.35938 17.9277 3.21563 17.7831C3.07187 17.6385 3 17.4594 3 17.2456C3 17.0319 3.07187 16.8542 3.21563 16.7125C3.35938 16.5708 3.5375 16.5 3.75 16.5H20.25C20.4625 16.5 20.6406 16.5723 20.7844 16.7169C20.9281 16.8615 21 17.0406 21 17.2544C21 17.4681 20.9281 17.6458 20.7844 17.7875C20.6406 17.9292 20.4625 18 20.25 18H3.75ZM3.75 12.75C3.5375 12.75 3.35938 12.6777 3.21563 12.5331C3.07187 12.3885 3 12.2094 3 11.9956C3 11.7819 3.07187 11.6042 3.21563 11.4625C3.35938 11.3208 3.5375 11.25 3.75 11.25H20.25C20.4625 11.25 20.6406 11.3223 20.7844 11.4669C20.9281 11.6115 21 11.7906 21 12.0044C21 12.2181 20.9281 12.3958 20.7844 12.5375C20.6406 12.6792 20.4625 12.75 20.25 12.75H3.75ZM3.75 7.5C3.5375 7.5 3.35938 7.42771 3.21563 7.28313C3.07187 7.13853 3 6.95936 3 6.74563C3 6.53188 3.07187 6.35417 3.21563 6.2125C3.35938 6.07083 3.5375 6 3.75 6H20.25C20.4625 6 20.6406 6.07229 20.7844 6.21687C20.9281 6.36147 21 6.54064 21 6.75437C21 6.96812 20.9281 7.14583 20.7844 7.2875C20.6406 7.42917 20.4625 7.5 20.25 7.5H3.75Z"
                          fill="#36344D"></path>
                </svg> 
                 -->
                 <!--
                <svg height="200" width="350" xmlns="http://www.w3.org/2000/svg">
                  <path id="lineAC" d="M 30 180 q 150 -250 300 0" stroke="red" stroke-width="2" fill="none"/>
                  <text style="fill:yellow;font-size:25px;">
                    <textPath href="#lineAC" startOffset="80">Hi Nana Shop!</textPath>
                  </text>
                </svg>
                 -->
            </div>
        </div>
    </div>
    <div class="bg-light  position-relative d-block"  class="min-height: 200px;">
        <div class="row">
            <!--
            <svg class="hsr-mobile-logo" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.00025 14.046V0.000497794L9.08916 3.78046V10.1086L18.4735 10.1132L25.6774 14.046H2.00025ZM20.3925 8.95058V0L27.6725 3.6859V13.1797L20.3925 8.95058ZM20.3924 26.1177V19.8441L10.9358 19.8375C10.9446 19.8793 3.6123 15.8418 3.6123 15.8418L27.6725 15.9547V30L20.3924 26.1177ZM2 26.1177L2.00025 16.9393L9.08916 21.0683V29.8033L2 26.1177Z" fill="#1D1E20"/>
            </svg>
            
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M2.00025 14.046V0.000497794L9.08916 3.78046V10.1086L18.4735 10.1132L25.6774 14.046H2.00025ZM20.3925 8.95058V0L27.6725 3.6859V13.1797L20.3925 8.95058ZM20.3924 26.1177V19.8441L10.9358 19.8375C10.9446 19.8793 3.6123 15.8418 3.6123 15.8418L27.6725 15.9547V30L20.3924 26.1177ZM2 26.1177L2.00025 16.9393L9.08916 21.0683V29.8033L2 26.1177Z" fill="#1D1E20"/>
            </svg>
             -->
            <p> SECTION 4.6</p>
         </div>
        <div class="row position-relative element">
             <nav class="navigation position-relative element">
                <a href="https://shop.hinanashop.com" rel="nofollow" target="_blank">
                    <svg width="150px" height="30px" viewBox="0 0 150 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    </svg>
                </a>
            </nav>
        </div>
        <div class="row position-relative">
            <nav class="navigation position-relative element">
                <a href="/mail.php" rel="nofollow" target="_blank">
                     <!--
                    <svg width="150" height="30" viewBox="0 0 150 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    </svg>
                    -->
                </a>
            </nav>
        </div>
    </div>
    <div class="clear"></div>
</div>
