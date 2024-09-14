<?php  
include "../../../include/config.php";
include "../../../include/db.php";

if(isset($_GET['id'])){

    $id=$_GET['id'];
    $categories=$db->prepare('SELECT * FROM categories WHERE id= :id');
    $categories->execute(['id'=> $id]);
    $categories=$categories->fetch();
}

if(isset($_POST['editCategory'])){
    if(!empty(trim($_POST['title']))){
        $title= $_POST['title'];
        if(!empty(trim($_FILES['image']['name']))){

            $image=time() ."_" . $_FILES['image']['name'];
            $tempName=$_FILES['image']['tmp_name'];
           if(move_uploaded_file($tempName,"../../../assets/image/$image")){
            echo "Upload Success";
           } 
           else{
            echo "Upload error";
           }

           $categoryUpdate=$db->prepare("UPDATE categories SET title=:title , image=:image WHERE id = :id");
           $categoryUpdate->execute(['title'=>$title, 'id'=> $id, 'image'=>$image ]);
            header("Location:index.php");
            exit();
        }

        else{

            $categoryUpdate=$db->prepare("UPDATE categories SET title=:title WHERE id = :id");
            $categoryUpdate->execute(['title'=>$title, 'id'=> $id ]);
            header("Location:index.php");
            exit();
        }
      
    }
}

?>



<!DOCTYPE html>
<html dir="rtl" lang="fa">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>پنل ادمین</title>

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

        <link rel="stylesheet" href="../../assets/css/style.css" />
    </head>

    <body>
        <header
            class="navbar sticky-top bg-secondary flex-md-nowrap p-0 shadow-sm"
        >
            <a
                class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-5 text-white"
                href="index.html"
                >پنل ادمین</a
            >

            <button
                class="ms-2 nav-link px-3 text-white d-md-none"
                type="button"
                data-bs-toggle="offcanvas"
                data-bs-target="#sidebarMenu"
            >
                <i class="bi bi-justify-left fs-2"></i>
            </button>
        </header>

        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar Section -->
                <div
                    class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary"
                >
                    <div
                        class="offcanvas-md offcanvas-end bg-body-tertiary"
                        tabindex="-1"
                        id="sidebarMenu"
                    >
                        <div class="offcanvas-header">
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="offcanvas"
                                data-bs-target="#sidebarMenu"
                            ></button>
                        </div>

                        <div
                            class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto"
                        >
                        <ul class="nav flex-column pe-3">
                                <li class="nav-item">
                                    <a
                                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2"
                                        href="../../index.php"
                                    >
                                        <i
                                            class="bi bi-house-fill fs-4 text-secondary"
                                        ></i>
                                        <span class="fw-bold">داشبورد</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a
                                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2 text-secondary"
                                        href="index.php"
                                    >
                                        <i
                                            class="bi bi-file-earmark-image-fill fs-4 text-secondary"
                                        ></i>
                                        <span class="fw-bold">محصولات</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a
                                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2"
                                        href="../categories/index.php"
                                    >
                                        <i
                                            class="bi bi-folder-fill fs-4 text-secondary"
                                        ></i>

                                        <span class="fw-bold">دسته بندی</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a
                                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2"
                                        href="../comments/index.php"
                                    >
                                        <i
                                            class="bi bi-chat-left-text-fill fs-4 text-secondary"
                                        ></i>

                                        <span class="fw-bold">کامنت ها</span>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a
                                        class="nav-link link-body-emphasis text-decoration-none d-flex align-items-center gap-2"
                                        href="../auth/logout.php"
                                    >
                                        <i
                                            class="bi bi-box-arrow-right fs-4 text-secondary"
                                        ></i>

                                        <span class="fw-bold">خروج</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Main Section -->
                <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom"
                    >
                        <h1 class="fs-3 fw-bold">ویرایش دسته بندی</h1>
                    </div>

                    <!-- Posts -->
                    <div class="mt-4">
                
                        <form method="POST" class="row g-4" enctype="multipart/form-data">
                            <div class="col-12 col-sm-6 col-md-4">
                                <label class="form-label">عنوان دسته بندی</label>
                                <input type="text" class="form-control" name="title" value="<?php echo $categories['title'] ?>" />
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                                <label for="formFile" class="form-label"
                                    >تصویر </label
                                >
                                <input name="image" class="form-control" type="file" />
                            </div>

                            <div class="col-12 col-sm-6 col-md-4">
                                <img class="rounded" src="../../../assets/image/<?php echo $categories['image'] ?>" width="300" />
                            </div>

                            <div class="col-12">
                                <button type="submit" name="editCategory" class="btn btn-dark">
                                     ویرایش
                                </button>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </div>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
