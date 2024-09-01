<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <header>
        <div class="home-header background_nav">
            <div class="container background_nav">

                <nav class="header-nav navbar navbar-expand-lg navbar-light col-12">
                    <div class="container justify-content-between col-12">
                        <div class="logo col-lg-2 d-flex">
                            <img src="./lib/imges/logo.jpg" alt="logo" class="rounded-circle" />
                            <h4>
                                Store
                            </h4>
                        </div>
                        <div class="collapse navbar-collapse justify-content-center col-lg-4" id="navLinksWrapper">
                            <ul class="navbar-nav  mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="home.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="products.php">Shop</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contacts</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-4 d-flex justify-content-center">
                            <form action="products.php" method="post" class="w-100 d-flex justify-content-between">
                                <input type="text" name="search_product" class="w-75 rounded-pill out-line-none search">
                                <button type="submit" name="submit_search" class="btn btn-outline-info">Search</button>
                            </form>
                        </div>
                        <div class="pt-2 col-lg-2 d-flex justify-content-end">

                            <a class="footer-call-to-action-button button" href="logged.php">Logged</a>
                        </div>
                    </div>
                </nav>
            </div>


        </div>
    </header>

</body>

</html>