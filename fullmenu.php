<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="fullmenu.css">
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
                <a class="nav-link" href="about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="menus.php">Menus</a>
              </li>
            </li>
            <li class="nav-item">
              <div class="container-fluid">
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="search-input">
                  <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
              </div>
            </li>
              <li class="nav-item">
                <button data-bs-toggle="modal" data-bs-target="#signUpForm">Sign Up</button>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <div class="menuContainer"></div>
      <section class="menu-section">
        <div class="container">
          <h2 class="menu-title">Our Menu</h2>
          <p class="menu-description">Discover our delicious offerings, divided into drinks, foods, and desserts, for a truly purr-fect dining experience!</p>
          
          <div class="menu-category">
            <h3 class="category-title">Drinks</h3>
            <div class="menu-grid">
              <div class="menu-item">
                <h4>Coffee</h4>
                <ul>
                  <li>Espresso - $3.00</li>
                  <li>Latte Macchiato - $4.50</li>
                  <li>Almond Coffee (special) - $5.00</li>
                  <li>Catpuccino (special) - $5.00</li>
                </ul>
              </div>
              <div class="menu-item">
                <h4>Specialty Drinks</h4>
                <ul>
                  <li>Matcha Latte - $4.50</li>
                  <li>Bubble Tea - $4.00</li>
                  <li>Craft Beer - $7.00</li>
                  <li>Meowtini (non-alcoholic) - $6.00</li>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="menu-category">
            <h3 class="category-title">Foods</h3>
            <div class="menu-grid">
              <div class="menu-item">
                <h4>Burgers</h4>
                <ul>
                  <li>Classic Cheeseburger - $8.00</li>
                  <li>BBQ Bacon Burger - $9.50</li>
                  <li>Veggie Delight Burger - $7.50</li>
                  <li>Meow-Meat Special Burger - $10.00</li>
                </ul>
              </div>
              <div class="menu-item">
                <h4>Ramen</h4>
                <ul>
                  <li>Classic Shoyu Ramen - $12.00</li>
                  <li>Spicy Miso Ramen - $13.50</li>
                  <li>Bento box - $10.50</li>
                  <li>Purrfect Tonkotsu Ramen - $12.00</li>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="menu-category">
            <h3 class="category-title">Desserts</h3>
            <div class="menu-grid">
              <div class="menu-item">
                <h4>Sweet Treats</h4>
                <ul>
                  <li>Cat Cookies - $3.50</li>
                  <li>Meow-Macarons (3 pcs) - $4.50</li>
                  <li>Paw-some Brownie - $5.00</li>
                  <li>Cat Cupcake - $3.00</li>
                </ul>
              </div>
              <div class="menu-item">
                <h4>Mochis</h4>
                <ul>
                  <li>Matcha Mochi (4 pcs) - $6.00</li>
                  <li>Strawberry Mochi - $6.50</li>
                  <li>Mango Mochi (4 pcs) - $6.50</li>
                  <li>Mixed Flavors Cat Mochi (6 pcs) - $10.00</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section>
      
      
    
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
                    <a href="menus.html" class="text-white">Menu</a>
                  </p>
                  <p>
                    <a href="drink.html" class="text-white">Drinks</a>
                  </p>
                  <p>
                    <a href="food.html" class="text-white">Food</a>
                  </p>
                  <p>
                    <a href="dessert.html" class="text-white">Desserts</a>
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

  <div class="modal fade" id="signUpForm" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Sign Up</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="register.php">
            <div class="mb-3">
              <label for="registerEmail" class="form-label">Email address</label>
              <input type="email" class="form-control" id="registerEmail" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="registerPassword" class="form-label">Password</label>
              <input type="password" class="form-control" id="registerPassword">
            </div>
            <div class="mb-3">
              <label for="registerRePassword" class="form-label">Re-enter Password</label>
              <input type="password" class="form-control" id="registerRePassword">
            </div>
            <p>Already have an account? <a data-bs-toggle="modal" data-bs-target="#signInForm">Sign in here!</a></p>
            <button type="submit">Register</button>
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
          <form method="POST" action="login.php">
            <div class="mb-3">
              <label for="signInEmail" class="form-label">Email address</label>
              <input type="email" class="form-control" id="signInEmail" aria-describedby="emailHelp">
              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
              <label for="signInPassword" class="form-label">Password</label>
              <input type="password" class="form-control" id="signInPassword">
            </div>
            <p>Don't have an account? <a data-bs-toggle="modal" data-bs-target="#signUpForm">Register here!</a></p>
            <button type="submit">Sign In</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="search.js"></script> 
  <script src="server.js"></script> 
  <script src="signin.js"></script> 
  <script src="register.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>