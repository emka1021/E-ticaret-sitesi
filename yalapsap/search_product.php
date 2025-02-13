<!-- connect file -->
<?php
include('includes/connect.php');
include('functions/common_function.php');
session_start();
$productFunctions = new Product();
$brandFunctions = new Brand();
$categoryFunctions = new Category();
$cartFunctions = new Cart();
$orderFunctions = new User();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yalapşap</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- found awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
    <style>
        .admin_image {
            width: 100px;
            object-fit: contain;

        }

        .footer {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="" alt="">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class='nav-item'><a class='nav-link active' aria-currents='page' href='index.php'>Home</a></li>
                        <li class='nav-item'><a class='nav-link' href='display_all.php'>Ürünler</a></li>
                        <li class='nav-item'>
                            <a class='nav-link' href='./admin_area/admin_login.php'>Admin Girişi</a>
                        </li>
                        <li class='nav-item'>
                            <a class='nav-link' href='./admin_area/admin_registration.php'>Admin Kayıt</a>
                        </li>
                        <li class='nav-item'><a class='nav-link' href='contact.php'>İletişim</a></li>
                        <li class='nav-item'><a class='nav-link' href='cart.php'><i class='fa-solid fa-cart-shopping'></i><sup><?php $cartFunctions->cart_item(); ?></sup></a></li>
                        <li class='nav-item'><a class='nav-link d-inline-flex' href='#'>Toplam Ücret:</a><?php $cartFunctions-> total_cart_price() ?>/-</li>
                    </ul>

                    <form class="d-flex" action="search_product.php" method="get">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                        <input type="submit" value="Search" name="search_data_product" class="btn btn-outline-light">
                    </form>
                </div>
            </div>

            <style>
                .navbar-nav .nav-link {
                    transition: color 0.3s;
                }

                .navbar-nav .nav-link:hover {
                    color: #fff !important;
                }

                /* Navbar animasyonu */
                .navbar-toggler-icon {
                    transition: transform 0.3s;
                }

                .navbar-toggler[aria-expanded="true"] .navbar-toggler-icon {
                    transform: rotate(90deg);
                }

                /* Admin kayıt ve giriş sayfalarının stil ayarları */
                body.admin-style nav {
                    background-color: #333;
                    /* Koyu arka plan rengi */
                    color: #fff;
                    /* Beyaz metin rengi */
                }
            </style>
        </nav>
        <?php
       $cartFunctions-> cart()
       ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">

                <?php
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Hoşgeldin Okur</a>
                </li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='#'>Hoşgeldin " . $_SESSION['username'] . "</a>
                    </li>";
                }
                if (!isset($_SESSION['username'])) {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='./users_area/user_login.php'>Giriş Yap</a></li>";
                } else {
                    echo "<li class='nav-item'>
                    <a class='nav-link' href='./users_area/logout.php'>Çıkış Yap</a>
                    </li>";
                }
                ?>
                <?php
                if (isset($_SESSION['username'])) {
                    echo "<li class='nav-item'><a class='nav-link' href='./users_area/profile.php'>Profil</a></li>";
                } else {
                    echo "<li class='nav-item'><a class='nav-link' href='./users_area/user_registration.php'>Kayıt Ol</a></li>";
                }
                ?>


            </ul>
        </nav>

        <?php
        $title = "Kelimelerin Yaşlandığı Yer: Yalapşap";
        $content = "Eski Kitapların Yeni Hikayesi";
        ?>
        <div style="
        background-color: #f5f5f5; 
        padding: 20px;
        text-align: center;
        animation: bounceIn 1.5s ease-in-out;
    ">
            <style>
                @keyframes bounceIn {
                    from {
                        opacity: 0;
                        transform: scale(0.8);
                    }

                    to {
                        opacity: 1;
                        transform: scale(1);
                    }
                }

                h3 {
                    color: #2196F3;
                    font-size: 2.5em;
                    margin-top: 0;

                }

                p {
                    color: #333;
                    margin-top: 5px;
                    font-size: 1.3em;
                }
            </style>

            <h3><?php echo $title; ?></h3>
            <p><?php echo $content; ?></p>
        </div>

        <div class="row px-3">
            <div class="col-md-10">
                <div class="row">
                    <?php
                    if (isset($_GET['search_data_product'])) {
$productFunctions -> search_product();
                    } else {
                        $categoryFunctions->get_unique_categories();

                        // Tüm markaları getirme işlemi
                        $brandFunctions->get_unique_brands();
                    }
                    ?>
                    <!-- row -->
                </div>

            </div>
            <div class="col-md-2 bg-secondary p-0">
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item bg-info text-light">
                        <a href="#" class="nav-link">
                            <h4>lorem</h4>
                        </a>
                    </li>
                    <?php
                    $brandFunctions -> getbrands();
                    ?>
                    <li class="nav-item bg-info text-light">
                        <a href="#" class="nav-link">
                            <h4>lorem</h4>
                            <?php
                           $categoryFunctions -> getcategories();
                            ?>
                    </li>
                </ul>
            </div>

            <div class="footer"><?php include 'includes/footer.php'; ?></div> 

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>