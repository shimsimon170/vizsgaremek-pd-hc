<!DOCTYPE html>
<?php require_once 'web.php'; ?>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Yume Neko Café</title>
</head>
<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid logo">
            <img src="./img/yumenekoLogo.png" alt="logo" title="logo">
            <h3>Yume Neko Café</h3>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="menus.php">Menus</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#" id="cart-icon" data-bs-toggle="modal" data-bs-target="#cartModal">
                      <i class="fas fa-shopping-cart"></i>
                      <span class="badge bg-danger" id="item-count">0</span>
                  </a>
              </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="btn btn-outline-dark rounded-pill px-4 me-2" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                  <a class="btn btn-dark rounded-pill px-4" href="register.php">Register</a>
                </li>
              </ul>
          </div>
        </div>
      </nav>
      <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="cartModalLabel">Your Cart</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <ul id="cart-items" class="list-group">
                          </ul>
                          <hr>
                          <h5>Total Price: <span id="total-price">$0.00</span></h5>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary" id="checkout-btn">Proceed to Checkout</button>
                      </div>
                  </div>
              </div>
          </div>
    <div class="container-fluid homeContainer">
        <div class="row">
            <div class="col">
                <h1>Welcome to The Yume Neko Café Webpage!</h1>
                <p class="flavourtext">Step into the enchanting world of Yume Neko Café, where dreams and feline magic come alive! Our café offers a harmonious blend of Japanese-inspired charm, mouthwatering treats, and the heartwarming companionship of our delightful cats. Whether you seek a serene escape, a cozy spot to unwind, or simply the joy of connecting with our furry friends, Yume Neko Café promises an unforgettable experience.
                  Explore our menu, meet our lovable cats, and discover why we're the purr-fect destination for cat lovers and dreamers alike. Your journey to tranquility begins here—welcome to Yume Neko Café! 🐈</p>
                <a href="about.php" class="btn-learn-more">Learn More</a>
            </div>
        </div>
        <br>
        <div class="row">
            <h2>Meet Our Cats!</h2>
            <div class="card" style="width: 50rem;">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./cats/mikan.jpg" alt="">
                        <div class="card-body">
                        <h5 class="card-title">Mikan</h5>
                        <p class="card-text">Mikan is a tabby Maine Coon cat. She's 6 months old (as of 10/01/2025) and very friendly. She loves getting attention from our costumers.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                            <img src="./cats/chibi.jpg" alt="">
                            <div class="card-body">
                            <h5 class="card-title">Chibi</h5>
                            <p class="card-text">Chibi is 8 months old (as of 10/01/2025) and incredibly gentle. He enjoys lounging by the window and loves being pampered by our customers.</p>
                            </div>
                    </div>
                    <div class="carousel-item">
                            <img src="./cats/azuki.png" alt="">
                            <div class="card-body">
                            <h5 class="card-title">Azuki</h5>
                            <p class="card-text">Azuki is 7 months old (as of 10/01/2025) and full of energy. He enjoys climbing and showing off his agility to entertain our guests.</p>
                            </div>
                    </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-fluid">
      <footer
              class="text-center text-lg-start text-white"
              style="background-color: #362b13" >
        <section
                 class="d-flex justify-content-between p-4"
                 style="background-color: #cea77a">
          <div class="me-5 fw-bold">
            <span>Get connected with us on social networks:</span>
          </div>
            <div class="footer-icons">
              <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
              <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
              <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
              <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
          </div>
        </section>
        <section class="">
          <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">
              <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                <h6 class="text-uppercase fw-bold">Yume Neko Café</h6>
                <hr
                    class="mb-4 mt-0 d-inline-block mx-auto"
                    style="width: 60px; background-color: #cea77a; height: 2px"
                    />
                    <p>
                      Yume Neko Café is a cozy, cat-themed haven where visitors can enjoy delicious beverages and treats while relaxing in the company of adorable, friendly cats. 
                    </p>
              </div>
              <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase fw-bold">Products</h6>
                <hr
                    class="mb-4 mt-0 d-inline-block mx-auto"
                    style="width: 60px; background-color: #cea77a; height: 2px"
                    />
                    <p>
                <a href="menus.php" class="text-white">Menu</a>
              </p>
              <p>
                <a href="drink.php" class="text-white">Drinks</a>
              </p>
              <p>
                <a href="food.php" class="text-white">Food</a>
              </p>
              <p>
                <a href="dessert.php" class="text-white">Desserts</a>
              </p>
              </div>
              
              <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                <h6 class="text-uppercase fw-bold">Contact</h6>
                <hr
                    class="mb-4 mt-0 d-inline-block mx-auto"
                    style="width: 60px; background-color: #cea77a; height: 2px"
                    />
                <p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                <p><i class="fas fa-envelope mr-3"></i> yumeneko@gmail.com</p>
                <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
              </div>
            </div>
          </div>
        </section>
        <div
             class="text-center p-3"
             style="background-color: rgba(45, 28, 3, 0.2)">
             <p>&copy; 2025 Yume Neko Café. All rights reserved.</p>
        </div>
      </footer>
    </div>

    <script src="server.js"></script> 
    <script src="login.js"></script> 
    <script src="register.js"></script> 
    <script src="cart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>