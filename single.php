<?php 
 include "./include/config.php";
include "./include/db.php";


if (isset($_GET['post'])) {
    $postId=$_GET['post'];
    $post=$db->prepare('SELECT * FROM posts WHERE id= :id');
    $post->execute(['id' => $postId]);
    $post=$post->fetch();


    $categoryId = $post['category_id'];
    $category = $db->query("SELECT * FROM categories WHERE id=$categoryId ")->fetch();
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
        <div class="row" style="margin: 0;">
            <div class="col-lg-8">
                <div class="content">
                    <div class="product">
                         <div class="title-product">
                            <h4><?php echo $post['title']?></h4>
                         </div>
                         <div class="image-product mt-5 mb-5">
                             <img src="./assets/image/<?php echo $post['image']?>">
                         </div>

                         <div class="card mb-3" style="background-color: #fff;">
                            <div class="card-title" style="text-align: right;padding: 1rem;">
                                <h5>مشخصات</h5>
                            </div>
                            <div class="card-body" style="text-align: right;">
                              
                                    <p style="color: #777777;">طراح : <span style="color:#a5a5a5"><?php echo $post['designer']?></span></p>
                                    <p style="color: #777777;">طرح :  <span style="color:#a5a5a5"><?php echo $post['title']?></span></p>
                                    <p style="color: #777777;">ابعاد : <span style="color:#a5a5a5"><?php echo $post['Length']?></span></p>
                                    <p style="color: #777777;">تکنیک : <span style="color:#a5a5a5"><?php echo $post['Technique']?></span></p>
                                    <p style="color: #777777;">قیمت : <span style="color:#a5a5a5"><?php echo $post['price']?></span></p>
                                <p style="color: #777777;font-weight:;"><?php echo $post['body']?></p>
                            </div>
                         </div>

        
                         <div class="card card-comment" style="background-color: #fff;text-align: right;">
                            <div class="card-title mb-3">
                                <h5>نظرات</h5>
                            </div>
                            <?php
                                        $invalidName="";
                                        $invalidcomment="";

                                        if(isset($_POST['postcomment'])){

                                            if(empty(trim($_POST['name']))){
                                                $invalidName="فیلد نام الزامی است";
                                            }

                                            if(empty(trim($_POST['comment']))){
                                                $invalidcomment="فیلد کامنت الزامی است";
                                            }


                                            else{

                                                $name=$_POST['name'];
                                                $comment=$_POST['comment'];
                                                $postId=$post['id'];
                                        

                                                $postComment=$db->prepare("INSERT INTO comments (name ,comment, post_id) VALUES (:name , :comment, :post_id)");
                                                $postComment->execute(['name'=> $name, 'comment'=> $comment, 'post_id'=>$postId]);
                                                
                                            }

                                        }

                                        ?>
                            <form method="POST">
                                <input class="form-control mb-3" name="name" placeholder="نام" >
                                <span style="color:red" class="mb-3"><?php echo $invalidName?></span>
                                <textarea class="form-control" name="comment" placeholder="متن پیام" cols="10" rows="5" ></textarea>
                                <span style="color:red" class="mb-3"><?php echo $invalidcomment?></span>
                                <br>
                                <button class="btn btn-warning  mt-4" style="text-align: right;" name="postcomment"  type="submit">ارسال</button>
                            </form>

                            <div class="comment mt-5">
                                <?php
                                         $postId=$post['id'];
                                         $comments=$db->prepare("SELECT * FROM comments WHERE post_id= :id AND status= '1' ");
                                         $comments->execute(['id' => $postId])
                                       ?>
                                    <p class="fw-bold fs-6">تعداد کامنت<?php echo $comments->rowCount() ?></p>

                                    <?php foreach($comments as $comment) : ?>
                                <div class="card bg-light-subtle mb-3">
                                    <div class="card-body">
                                        <div
                                            class="d-flex align-items-center"
                                        >
                                            <img
                                                src="./assets/image/profile.png"
                                                width="45"
                                                height="45"
                                                alt="user-profle"
                                            />

                                            <h5
                                                class="card-title me-2 mb-0"
                                            >
                                            <?php echo $comment['name'] ?>
                                            </h5>
                                        </div>

                                        <p class="card-text pt-3 pr-3">
                                            <?php echo $comment['comment'] ?>
                                        </p>
                                    </div>
                                </div>
                                <?php endforeach ?>


                            </div>
                         </div>
                    </div>

                    </div>
                </div>
            
            <div class="col-lg-4  d-flex justify-content-center">
                <div class="">
                    <div class="card card-right  text-bg-dark mt-5 mb-5" style="width: 320px;text-align: center;">
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