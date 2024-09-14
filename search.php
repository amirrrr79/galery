<?php 
 
include "./include/config.php";
include "./include/db.php";


 if(isset($_GET['search'])){
    $keyword=$_GET['search'];
    $posts=$db->prepare('SELECT * FROM posts WHERE title LIKE :keyword');
    $posts->execute(['keyword'=>"%$keyword%"]);
 }
 else{
    header("Location:index.php");
 }



?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
/>
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
    crossorigin="anonymous"
/>
    <link href="./assets/css/main.css" rel="stylesheet" >
    <title>گالری جریان</title>
</head>
<body>
    <header>
        <div class="desktop-header">
            <div class="logo_header">
                <img src="./assets/image/logo-1.png"  width="130px" height="" >
            </div>
            <div class="item-header">
                <ul class="ul-item">
                    <li><a href=""><img src="./assets/image/icon1.png" width="25px">فروش آثار و محصولات</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="./assets/image/icon2.png" width="25px">دسته بندی محصولات
                        </a>
                        <ul class="dropdown-menu" style="text-align: right;">
                          <li><a class="dropdown-item" href="#"><img src="./assets/image/icon2.png" width="25px">تابلو نقاشی</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#"><img src="./assets/image/icon4.png" width="25px">فرش و گلیم</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#"><img src="./assets/image/icon7.png" width="25px">ظروف سرامیکی</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#"><img src="./assets/image/icon6.png" width="25px">تابلو فرش</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="#"><img src="./assets/image/5.png" width="25px">دکوراسیون داخلی</a></li>
                        </ul>
                      </li>
                    <li><a href=""><img src="./assets/image/icon3.png" width="25px">درباره ما</a></li>
                </ul>
            </div>
            <div class="search-header">
                    <input class="form-control ms-2" type="search" placeholder="دنبال چی میگردی؟" aria-label="Search">
                    <button class="btn btn-outline-warning" type="submit">جستجو</button>
            </div>
        </div>

        <div class="mobile-header">
            <div class="btn-toggle">
                <i class="bi bi-list-nested" id="open"></i>
            </div>

            <div class="logo_header">
                <img src="./assets/image/logo-1.png"  width="100px" height="" >
            </div>

            <div class="search_header">
                <i class="bi bi-search" id="search"></i>
            </div>
        </div>
    </header>
    <aside class="aside" id="menu-aside">
        <div class="" style="text-align:left;">
            <i class="bi bi-x" style="color: red;font-size: 2rem;cursor: pointer;" id="close"></i>
        </div>
        <ul class="ul-item-aside">
            <li><a href=""><img src="./assets/image/icon1.png" width="25px">فروش آثار و محصولات</a></li>
            <li><a  href="#"><img src="./assets/image/icon2.png" width="25px">تابلو نقاشی</a></li>
            <li><a  href="#"><img src="./assets/image/icon4.png" width="25px">فرش و گلیم</a></li>
            <li><a  href="#"><img src="./assets/image/icon7.png" width="25px">ظروف سرامیکی</a></li>
            <li><a  href="#"><img src="./assets/image/icon6.png" width="25px">تابلو فرش</a></li>
            <li><a href="#"><img src="./assets/image/5.png" width="25px">دکوراسیون داخلی</a></li>
            <li><a href=""><img src="./assets/image/icon3.png" width="25px">درباره ما</a></li>
        </ul>
    </aside>

    <div class="box-search" id="box-search">
        <i class="bi bi-x" id="close-search"></i>
        <form class="d-flex" role="search">
            <input class="form-control color ms-2" type="search" placeholder="دنبال چی میگردی؟" aria-label="Search">
            <button class="btn btn-warning btn-size" type="submit"><i class="bi bi-search"></i></button>
          </form>
        </div>

        <section>
            <div class="row " style="margin: 0;">
            
            <div class="col-lg-8">
                <div class="col mt-5">
                    <div class="alert alert-secondary">
                        پست های مرتبط با کلمه [<?php echo $keyword ?>]
                    </div>
                    <?php if($posts->rowCount() ==0) : ?>
                    <div class="alert alert-danger">
                        !!!! چیزی یافت نشد
                    </div>
                    <?php endif; ?>
                </div>

                <section>
                    
                    <div class="row d-flex justify-content-around align-items-center" style="margin:0;">
                       
                            <?php foreach($posts as $post) : ?>
                                <?php 
                                     $categoryId = $post['category_id'];
                                      $category = $db->query("SELECT * FROM categories WHERE id=$categoryId")->fetch();
                                  ?>
                            <div class="card mb-5" style="width: 20rem;">
                                <img
                                    src="./assets/image/<?php echo $post['image'] ?>"
                                    class="card-img-top"
                                    alt="post-image"
                                />
                                <div class="card-body">
                                    <div
                                        class="d-flex justify-content-between"
                                    >
                                        <h5 class="card-title fw-bold">
                                        <?php echo $post['title'] ?>
                                        </h5>
                                        <div>
                                            <span
                                                class="badge text-bg-secondary"
                                                ><?php echo $category['title'] ?></span
                                            >
                                        </div>
                                    </div>
                                    <p
                                        class="card-text text-secondary pt-3"
                                    >
                                    <?php echo substr($post['body'],0,150) . "..." ?>
                                    </p>
                                    <div
                                        class="d-flex justify-content-between align-items-center"
                                    >
                                        <a
                                            href="single.html"
                                            class="btn btn-sm btn-dark"
                                            >مشاهده</a
                                        >
            
                                        <p class="fs-7 mb-0">
                                        نام طراح : <?php echo $post['designer'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                    </div>
                    
                </section>

              


            </div>
    
            <div class="col-lg-4  d-flex justify-content-center" >
                <div class="">
                    <div class="card card-right text-bg-dark mt-5 mb-5" style="width: 320px;text-align: center;">
                        <img src="./assets/image/tablo2.jpg" class="card-img" alt="...">
                      </div>
    
                      <div class="card card-right text-bg-dark mb-5" style="width: 320px;">
                        <img src="./assets/image/farsh2.jpg" width="200px" class="card-img" alt="...">
                      </div>
    
                      <div class="card card-right text-bg-dark mb-5" style="width: 320px;">
                        <img src="./assets/image/decorasion2.jpg" width="200px" class="card-img" alt="...">
                      </div>
    
                      <div class="card card-right text-bg-dark mb-5" style="width: 320px;">
                        <img src="./assets/image/3.jpg" width="200px" class="card-img" alt="...">
                      </div>
                </div>
                
            </div>

            </div>
        </section>

    <footer class="footer">
         <div class="row footer-center d-flex justify-content-center align-items-center text-center" style="margin: 0;">
             <div class="col-lg-3 col-md-6 contact-footer">
                <h5>تماس با ما</h5>
                <p>  آدرس : سعادت آباد – میدان کتاب – ورودی پارکینگ اپال – دفتر مرکزی ابنیه سازان اپال   </p>
                <p>ایمیل : info@jaryangallery.art</p>
                <div class="icon-footer">
                    <i class="bi bi-telegram" style="color: #6EC1E4;"></i>
                    <i class="bi bi-whatsapp" style="color: #3afd5e;"></i>
                    <i class="bi bi-youtube" style="color: red;"></i>
                 </div>
             </div>

             <div class="col-lg-3 col-md-6 about">
                <h5>درباره ما</h5>
                <ul style="padding: 0;">
                    <li>درباره جریان</li>
                    <li>تماس با ما</li>
                    <li>پیگیری خرید</li>
                    <li>ثبت اثر</li>
                </ul>
             </div>

             <div class="col-lg-3 col-md-6 service" >
                <h5>خدمات جریان</h5>
                <ul style="padding: 0;">
                    <li>حساب کاربری</li>
                    <li>دسترسی سریع به فروشگاه</li>
                    <li>هنرمندان</li>
                    <li>همکاری با جریان</li>
                </ul>
             </div>
             <div class="col-lg-3 col-md-6 image-footer">
                <img src="./assets/image/logo-1.png"  width="250px" height="" >
             </div>
         </div>
         <div class="text-footer text-center" style="padding: .5rem;">
            کلیه حقوق این وبسایت محفوظ میباشد
         </div>
    </footer>
    <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
    crossorigin="anonymous"
></script>
 <script src="./js/main.js"></script>
</body>
</html>