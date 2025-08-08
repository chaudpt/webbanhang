<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <?php
            //defined( 'ABSPATH' ) || exit;
            //get_header('shop');
        ?>
       <?php esc_html_e( 'View details', 'woocommerce' ); ?>
       <?php esc_html_e( 'Waiting for confirmation' ); ?>
       <?php esc_html_e( 'All Settings' ); ?>
       
        <?php include 'header.php';?>
        <section id="section_1838544616">
            <div class="bg section-bg fill bg-fill bg-loaded">
                <div class="section-bg-overlay absolute fill"></div>
                <button class="scroll-for-more z-5 icon absolute bottom h-center" aria-label="Scroll for more"><i class="icon-angle-down" style="font-size:42px;"></i></button>
		    </div>
		    <div class="section-content relative">
            </div>
        </section>
        
        <h1>Hi Nana Shop!</h1>
        <p>Chúng tôi, những con người trẻ tuổi mong muôn đem lại cho bạn một trải nghiệm mới nhất.</p>
         
        <p>Hãy bắt đầu mua sắm tại <a href="/store.php">Hi Nanan Shop</a>.</p>
        <?php
            get_header('shop');
        ?>
        <section>
            <script>
                var browser = (function (agent) {
                switch (true) {
                    case agent.indexOf("edge") > -1: return "edge";
                    case agent.indexOf("edg") > -1: return "chromium based edge";
                    case agent.indexOf("opr") > -1 && !!window.opr: return "opera";
                    case agent.indexOf("chrome") > -1 && !!window.chrome: return "chrome";
                    case agent.indexOf("trident") > -1: return "ie";
                    case agent.indexOf("firefox") > -1: return "firefox";
                    case agent.indexOf("safari") > -1: return "safari";
                    default: return "other";
                }
            })(window.navigator.userAgent.toLowerCase());
            document.body.innerHTML = window.navigator.userAgent.toLowerCase() + "<br>" + browser;
            </script>
        </section>
        <h1>Chào mừng đến với trang web của tôi</h1>
        <p>Nội dung trang web...</p>
        <section>
            <div class="container">
                 <div class="background-container bg1"></div>
            </div> 
        </section>
        <section class="section huong-dan" id="section_1641949925">
            <div class="col-inner">
                <div class="bi-quyet">
                    <h1 sstyle="text-align: center; --primary-color: #efd540;"> Tại sao bạn nên chọn mua hoa ở Hi Nana Shop!</h1>
                    <ul>
                        <li>Chúng tôi nhận giao hoa miễn phí trong bán kính 10km với đớn hàng trên 500k</li>
                        <li>Giảm 5% nếu các bạn mua hoa thông qua website của chung tôi</li>
                    </ul>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                 <div class="background-container bg2"></div>
            </div> 
        </section>
         <section class="section huong-dan" id="section_1641949926">
            <div class="col-inner">
                <div class="bi-quyet">
                    <h1 sstyle="text-align: center; --primary-color: #efd540;"> Giá trị cốt lõi của chúng tôi!</h1>
                    <ul>
                        <li>Giá trị Tiện Ích trong kinh tế và kinh doanh</li>
                        <li>Giá trị Thị Trường trong kinh tế và kinh doanh</li>
                        <li>Giá trị Thêm trong kinh tế và kinh doanh</li>
                    </ul>
                </div>
            </div>
        </section>
        
        <div class="container">
           
           
            <div class="background-container bg3"></div>
            <div class="background-container bg4"></div>
        </div> 
        

            
        <?php include 'footer.php';?>
    </body>
</html>