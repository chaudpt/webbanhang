

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Default page</title>
        <link rel="icon" type="image/x-icon" href="https://i.pinimg.com/1200x/a3/91/10/a39110ecac49e385adc3e276b19d847d.jpg">
        <meta charset="utf-8">
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <meta content="Default page" name="description">
        <meta content="width=device-width, initial-scale=1" name="viewport">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="/src/css/style.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        <style>
            #content-1{
                background-image: url("https://images.pexels.com/photos/255379/pexels-photo-255379.jpeg?cs=srgb&dl=pexels-padrinan-255379.jpg&fm=jpg");
            }
            .circle1{
                height: 550px;  
                width: 550px;  
                background-color: #555;  
                border-radius: 50%; 
                background-image: url("https://images.contentstack.io/v3/assets/bltcedd8dbd5891265b/blt4a4af7e6facea579/6668df6ceca9a600983250ac/beautiful-flowers-hero.jpg?q=70&width=3840&auto=webp");
            }
            .circle2{
                height: 550px;
                width: 1200px;
                background-color: #555;
                border-radius: 50%;
                background-image: url(" https://c02.purpledshub.com/uploads/sites/40/2023/08/JI230816Cosmos220-6d9254f-edited-scaled.jpg?w=1029&webp=1");
            }
           .hinh_anh{
                 width:200px;
                 height: 200px;
                 background: url('https://images.contentstack.io/v3/assets/bltcedd8dbd5891265b/blt4a4af7e6facea579/6668df6ceca9a600983250ac/beautiful-flowers-hero.jpg?q=70&width=3840&auto=webp');
                 border-radius: 50%;
                 float: left;
                 shape-outside: circle();
                 margin:20px 20px 20px 0px;
             }
             
             .noi_dung{
                 position:absolute;
                 top: 50%;
                 left: 50%;
                 transform: translate(-50%, -50%);
                 width: 600px;
                 padding: 30px;
                 background: #ffffff;
                 box-sizing: border-box;
                 border-radius:10px;
                 box-shadow: 0 15px 50px rgba(0,0,0 0.2)
             }
             
             
        </style>
    </head>
    <body>
        <a href="/src/html/na-nav.php" class="button-class">   MENU</a>
        <a href="/src/html/na-load-image.php" class="button-class">   HINANASHOP IMAGE</a>
        <!-- <p>HINANASHOP</p>-->
        
        <!-- <p style="font-size: 200px;">NEW</p>-->
        
        <!-- <div class="noi_dung">-->
       <!--  <div class="hinh_anh"></div>-->
        <!-- <h2>Chữ xung quanh hình ảnh</h2>-->
       <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing
                elit. Dolores quia vitae incidunt necessitatibus, sapiente
                            voluptate. Nam eos accusantium ea aspernatur ex
                recusandae obcaecati iste odit maxime, necessitatibus fuga
                            harum consequatur. Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Tempore in minus libero corporis
                            incidunt, quaerat eum dignissimos impedit sunt
                voluptates, aut molestias vitae praesentium dolores? Alias,
                            quis! Ex, ipsa doloribus.</p>
                </div> -->

        <?php include './na-config.php';?> 
        <?php /*include './includes/config.php';*/?> 
        
        <?php /*include './src/html/header.php';*/?> 
       <!-- <div class="circle1"> Những ngày xưa thân ái</div> -->
      <!--  <div class="circle2">Những ngày xưa thân ái</div>-->
       
        <?php /*include './src/html/body-1.php'; */?> 
        <div class="clear"> </div>
        
        <div class="container mt-1 bg-light fixed-bottom" id="content-1" style="position: fixed; background: #7FFF00;  width: 200px;  height: 100px;  botton: 100px; right: 5px;">
             <h1>Zalo: 0522930481</h1>
             <div class="clear"></div>
        </div>
            
        <?php /*include './src/html/body-2.php';*/ ?> 
        <div class="clear"> </div>
        <?php /*include './src/html/body-3.php'; */?> 
        
        <?php /*include './src/html/body-4.php'; */?> 
        <?php /*include './src/html/footer.php'; */?>
    </body>
</html>