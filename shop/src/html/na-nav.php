<!DOCTYPE html>
<html>
<head>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover {
  background-color: #111;
}
#menu li {
 position: relative;
}
.sub-menu {
 display: none;
 position: absolute;
}

#menu li {
 position: relative;
}

#menu li:hover .sub-menu {
 display: block;
}
</style>
</head>
<body>

<ul>
  <li><a class="active" href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
    <ul class="sub-menu">
    <li><a href="#">WordPress</a></li>
    <li><a href="#">SEO</a></li>
    <li><a href="#">Hosting</a></li>
    </ul>
  <li><a href="#about">About</a></li>
  <li><a href="#">Trang chủ</a></li>
    <li><a href="#">Diễn đàn</a></li>
    <li><a href="#">Tin tức</a></li>
    <li><a href="#">Hỏi đáp</a></li>
    <li><a href="#">Liên hệ</a></li>
</ul>

</body>
</html>


