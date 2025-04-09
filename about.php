<!DOCTYPE html>
<?php require_once 'web.php'; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
                <a class="nav-link" href="homepage.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">About</a>
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
                          <button type="button" class="btn btn-primary" id="checkout-btn" onclick="window.location.href='payments.php'">Proceed to Checkout</button>
                      </div>
                  </div>
              </div>
          </div>
      <div class="container-fluid about-container">
        <div class="row align-items-center">
          <div class="col-lg-7 about-text">
            <h1>About Us</h1>
            <p>
              Welcome to <strong>Yume Neko Café</strong>, where we combine our love for animals with a passion for Japanese culture. 
              As two lifelong friends, we dreamed of creating a sanctuary for stray cats, giving them a second chance at life while offering our community a cozy, feline-filled escape. 
            </p>
            <p>
              Every visit to our café directly supports the rescue and care of our furry friends. Step into our serene world and enjoy the company of playful cats, authentic Japanese treats, 
              and a peaceful atmosphere that feels like home.
            </p>
           <a href="#contact"><button class="btn btn-primary">Contact Us</button></a>
          </div>
          <div class="col-lg-5 about-image">
            <img src="./img/mascot.jpg" alt="Our Mascot" class="img-fluid rounded">
          </div>
        </div>
      </div>

      <div class="modal fade" id="signUpForm" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Sign Up</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
              <form action="/register" method="POST">
                <div class="mb-3">
                    <label for="registerName" class="form-label">Name</label>
                    <input type="text" class="form-control" id="registerName" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="registerPhone" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="registerPhone" name="phone" required>
                </div>
                <div class="mb-3">
                    <label for="registerEmail" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="registerEmail" name="email" aria-describedby="emailHelp" required>
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                </div>
                <div class="mb-3">
                    <label for="registerPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="registerPassword" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="registerRePassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="registerRePassword" name="re_password" required>
                </div>
                <p>Already have an account? <a data-bs-toggle="modal" data-bs-target="#signInForm">Sign in here!</a></p>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="signInForm" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Sign In</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="/login" method="POST">
            <div class="mb-3">
                <label for="signInEmail" class="form-label">Email Address</label>
                <input type="email" class="form-control" id="signInEmail" name="email" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="signInPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="signInPassword" name="password" required>
            </div>
            <p>Don't have an account? <a data-bs-toggle="modal" data-bs-target="#signUpForm">Register here!</a></p>
            <button type="submit" class="btn btn-primary">Sign In</button>
        </form>
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
              <h6 class="text-uppercase fw-bold" id="contact">Contact</h6>
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

  <script src="login.js"></script> 
  <script src="register.js"></script> 
  <script src="cart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>