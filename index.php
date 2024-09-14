<?php
include "./include/config.php";
include "./include/db.php";

if(isset($_GET['category'])){
    $category=$_GET['category'];
    $posts = $db->prepare("SELECT * FROM posts WHERE category_id = :id ");
    $posts->execute(['id' => $category ]);
}
else{
    $posts=$db->query("SELECT * FROM posts ");
}
$categories=$db->query("SELECT * FROM categories ");


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
                          <li><a class="dropdown-item" href="#"><img src="./assets/image/5.png" width="25px">دکوراسیون داخلی</a></li>
                        </ul>
                      </li>
                    <li><a href=""><img src="./assets/image/icon3.png" width="25px">درباره ما</a></li>
                </ul>
            </div>
            <div class="search-header">
                <form class="d-flex" action="search.php" method="GET">
                    <input class="form-control ms-2" name="search" type="search" placeholder="دنبال چی میگردی؟" aria-label="Search">
                    <button class="btn btn-outline-warning" type="submit">جستجو</button>
                </form>
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
         <div class="hero">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="./assets/image/hero1.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="./assets/image/hero3.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
         </div>
    </section>

    <section class="section-category">
        <div class="categories">
            <div class="title">
                <h4>دسته بندی آثار</h4>
            </div>
            <div class="row" style="margin: 0;">
            <?php foreach($categories as $category): ?>
                <div class="col-lg-3 col-md-6">
                    <div class="category">
                        <a href="index.php?category=<?php echo $category['id'] ?>"> <img src="./assets/image/<?php echo $category['image'] ?>" width="150px">
                          <p><?php echo $category['title'] ?></p></a>
                      </div>      
                </div>

                <?php endforeach ?>
            </div>
        </div>
    </section>

    <section class=" baner-section">
        <div class="row " style="margin:0;text-align: center;">
            <div class="col-lg-6 mb-4 baner">
                <img src="./assets/image/2.jpg"  width="400px">
            </div>

            <div class="col-lg-6 mb-3 baner">
                <img src="./assets/image/1.jpg"  width="400px">
            </div>
        </div>
    </section>

    <section class=" section-product" >
        <div class="title">
            <h4>محصولات</h4>
        </div>
        
        <div class="row d-flex justify-content-around align-items-center" style="margin:0;">
            <?php foreach($posts as $post): ?>
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
                                    > <?php echo $category['title'] ?></span
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
                                href="single.php?post=<?php echo $post['id'] ?>"
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

    <section class="section-concat">
        <div class="row d-flex justify-content-center align-items-center" style="margin: 0;">
            <div class="col-lg-6">
                <h4 class="mb-5" style="color: #D1B254;">ارتباط با ما</h4>
                <h5 style="color: #D1B254;"><i class="bi bi-geo-alt-fill ms-2"></i>آدرس :</h5>
                <p style="color: #a5a5a5;">سعادت آباد – میدان کتاب – ورودی پارکینگ اپال – دفتر مرکزی ابنیه سازان اپال </p>
                <h5 style="color: #D1B254;"> <i class="bi bi-envelope-at-fill ms-2"></i>ایمیل :</h5>
                <p class="mb-5" style="color: #a5a5a5;">jaryanofficial2022@gmail.com </p>
            </div>
            <div class="col-lg-6">
            <?php
                                        
                 $invalidName="";
                $invalidText="";
                $invalidMobile="";
                 if(isset($_POST['question'])){

                if(empty(trim($_POST['name']))){
                     $invalidName="فیلد نام الزامی است";
                 }

                 if(empty(trim($_POST['mobile']))){
                     $invalidMobile="فیلد موبایل الزامی است";
                 }

                 if(empty(trim($_POST['text']))){
                      $invalidText="فیلد متن الزامی است";
                  }


                else{

                    $name=$_POST['name'];
                    $text=$_POST['text'];
                    $mobile=$_POST['mobile'];

                    $question=$db->prepare("INSERT INTO question (name ,text,mobile) VALUES (:name , :text,:mobile)");
                    $question->execute(['name'=> $name, 'text'=> $text, 'mobile'=> $mobile]);
                    $showSuccessMessage=true;
                        
                     }

                     }

                     ?>
                 <form method="POST" style="padding: 2rem;border-radius: 1.5rem;">
                    <h5 class="mb-4"  style="color: #D1B254;">پاسخگوی سوالات شما هستیم</h5>
                    <input class="form-control mb-3" name="name" placeholder="نام">
                    <span class="mb-2" style="color:red"><?php echo $invalidName?></span>
                    <input class="form-control mb-3" name="mobile" placeholder="شماره موبایل">
                    <span class="mb-2" style="color:red"><?php echo $invalidMobile?></span>
                    <textarea class="form-control mb-3" name="text"  placeholder="پیام" rows="5" cols="50"></textarea>
                    <span class="mb-2" style="color:red"><?php echo $invalidText?></span>
                    <br>
                    <button class="btn btn-warning" name="question" type="question" >ثبت</button>
                 </form>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <script src="./js/main.js"></script>
 <script>
    <?php if ($showSuccessMessage): ?>
    Swal.fire({
        title: "ثبت پیام",
        text: "پیغام شما با موفقیت ثبت شد",
        icon: "success"
    });
    <?php endif; ?>
</script>
</body>
</html>