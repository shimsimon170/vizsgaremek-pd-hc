<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Panel - Yume Neko Café</title>
  <style>
    body {
      font-family: Arial, sans-serif;
     background-color: #f9f5ef !important;
      margin: 0;
      padding: 20px;
    }
    header {
      text-align: center;
      margin-bottom: 20px;
    }
    nav {
      display: flex;
      justify-content: center;
      gap: 15px;
      margin-bottom: 20px;
    }
    nav button {
      padding: 10px 20px;
      border: none;
      background-color: #333;
      color: #fff;
      border-radius: 5px;
      cursor: pointer;
    }
    nav button:hover {
      background-color: #555;
    }
    .hidden {
      display: none;
    }
    .product-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 20px;
    }
    .product-card {
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 15px;
      padding: 15px;
      box-shadow: 0 3px 6px rgba(0,0,0,0.1);
      transition: 0.3s;
    }
    .product-card:hover {
      box-shadow: 0 5px 10px rgba(0,0,0,0.15);
    }
    .product-card img {
      width: 100%;
      height: 180px;
      border-radius: 10px;
      object-fit: cover;
    }
    .product-card h3 {
      margin: 10px 0 5px;
    }
    .product-card p {
      font-size: 0.9rem;
      color: #555;
    }
    .product-card .price {
      font-weight: bold;
      color: #222;
      margin: 10px 0;
    }
    .btns {
      display: flex;
      gap: 10px;
    }
    .btns button {
      flex: 1;
      padding: 8px;
      border: none;
      border-radius: 8px;
      cursor: pointer;
      font-weight: bold;
    }
    .delete-btn {
      background-color: #ff6b6b;
      color: white;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }
    table, th, td {
      border: 1px solid #ddd;
    }
    th, td {
      padding: 10px;
      text-align: left;
    }
    th {
      background-color: #f4f4f4;
    }
    form {
      max-width: 500px;
      margin: 0 auto;
    }
    form input, form textarea {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    form button {
      display: block;
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 4px;
      background-color: #333;
      color: white;
      font-size: 1rem;
      cursor: pointer;
    }
    form button:hover {
      background-color: #555;
    }
  </style>
</head>
<body>

  <header>
    <h1>Yume Neko Café Admin Panel</h1>
  </header>

  <nav>
    <button onclick="showSection('productsSection')">Products</button>
    <button onclick="showSection('ordersSection')">Orders</button>
    <button onclick="showSection('addSection')">Add Product</button>
  </nav>

  <section id="productsSection">
    <h2>Products</h2>
    <div class="product-container" id="productContainer"></div>
  </section>

  <section id="ordersSection" class="hidden">
    <h2>Orders</h2>
    <table>
      <thead>
        <tr>
        <th>ID</th>
          <th>Name</th>
          <th>Date</th>
          <th>Products</th>
          <th>Payment</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody id="ordersTableBody">
      </tbody>
    </table>
  </section>

  <section id="addSection" class="hidden">
    <h2>Add New Product</h2>
    <form id="addProductForm">
    <input type="text" id="name" placeholder="Product name" required />
      <input type="text" id="image" placeholder="Image URL" required />
      <textarea id="description" placeholder="Description" required></textarea>
      <input type="number" id="price" placeholder="Price" step="0.01" required />
      <button type="submit">Add Product</button>
    </form>
  </section>

  <script>
    // Beégetett termékek JSON-adatok
    let products = [
      {
        "name": "Classic Cheeseburger",
        "image": "img/cheeseburesz.jpg",
        "description": "A timeless favorite with a juicy beef patty, melted cheese, fresh lettuce, tomato, and a soft sesame bun.",
        "price": 8.00
      },
      {
        "name": "BBQ Bacon Burger",
        "image": "img/baconburger.jpg",
        "description": "Savory and smoky with crispy bacon, tangy BBQ sauce, cheddar cheese, and caramelized onions.",
        "price": 9.50
      },
      {
        "name": "Veggie Delight Burger",
        "image": "img/veggieburger.jpg",
        "description": "A hearty, plant-based patty topped with fresh veggies, avocado, and a zesty sauce.",
        "price": 7.50
      },
      {
        "name": "Meow-Meat Special Burger",
        "image": "img/foodIcon.jpg",
        "description": "A cat café exclusive with double beef patties, secret sauce, and all the fixings for a satisfying bite.",
        "price": 10.00
      },
      {
        "name": "Classic Shoyu Ramen",
        "image": "img/shoyuramen.jpg",
        "description": "A comforting bowl of soy-based broth with tender noodles, sliced pork, bamboo shoots, and a soft-boiled egg.",
        "price": 12.00
      },
      {
        "name": "Spicy Miso Ramen",
        "image": "img/spicymisoramenű.jpg",
        "description": "Packed with bold flavors, this ramen has a rich miso broth with a spicy kick, paired with pork chashu and fresh greens.",
        "price": 13.50
      },
      {
        "name": "Bento Box",
        "image": "img/menuSushi.jpg",
        "description": "A delightful combination of sushi, rice, pickled vegetables, and a choice of teriyaki chicken, salmon, or tofu.",
        "price": 10.50
      },
      {
        "name": "Purrfect Tonkotsu Ramen",
        "image": "img/menuRamen.jpg",
        "description": "Creamy pork bone broth, perfectly cooked noodles, and an assortment of classic toppings.",
        "price": 12.00
      },
      {
        "name": "Matcha Latte",
        "image": "img/menuMatcha.jpg",
        "description": "A smooth and creamy blend of matcha and milk for a delightful treat.",
        "price": 4.50
      },
      {
        "name": "Bubble Tea",
        "image": "img/bobatea.jpg",
        "description": "Refreshing tea with chewy tapioca pearls in every sip.",
        "price": 4.00
      },
      {
        "name": "Craft Beer",
        "image": "img/beer.jpg",
        "description": "Local craft beer with a unique flavor profile for beer enthusiasts.",
        "price": 7.00
      },
      {
        "name": "Meowtini",
        "image": "img/meowtini.jpg",
        "description": "A non-alcoholic fruity cocktail, perfect for a fun and refreshing experience.",
        "price": 6.00
      },
      {
        "name": "Espresso",
        "image": "img/espresso.jpg",
        "description": "A classic, rich, and intense coffee shot for a quick energy boost.",
        "price": 3.00
      },
      {
        "name": "Latte Macchiato",
        "image": "img/Lattemacchiato.png",
        "description": "A creamy blend of espresso and steamed milk for coffee lovers.",
        "price": 4.50
      },
      {
        "name": "Almond Coffee",
        "image": "img/almondcofee.jpg",
        "description": "A perfect balance of espresso, steamed milk, almond and foam.",
        "price": 5.00
      },
      {
        "name": "Catpuccino",
        "image": "img/catpuccino.jpg",
        "description": "Our special coffee with a cute twist—purrrfect for any cat lover!",
        "price": 5.00
      },
      {
        "name": "Cat Cookies",
        "image": "img/cookies.jpg",
        "description": "Adorably shaped buttery cookies with a hint of vanilla—perfect for a sweet snack.",
        "price": 3.50
      },
      {
        "name": "Meow-Macarons",
        "image": "img/macarons.jpg",
        "description": "Colorful macarons in delightful flavors like vanilla, chocolate, and strawberry.",
        "price": 4.50
      },
      {
        "name": "Paw-some Brownie",
        "image": "img/pawbrownie.jpg",
        "description": "A rich and fudgy chocolate brownie with a paw-shaped design.",
        "price": 5.00
      },
      {
        "name": "Cat Cupcake",
        "image": "img/cupcake.jpg",
        "description": "A fluffy cupcake with creamy frosting, topped with a cute cat face decoration.",
        "price": 3.00
      },
      {
        "name": "Matcha Mochi",
        "image": "img/machamochi.jpg",
        "description": "Soft and chewy rice cakes infused with the earthy sweetness of matcha.",
        "price": 6.00
      },
      {
        "name": "Strawberry Mochi",
        "image": "img/strawmochi.jpg",
        "description": "A sweet and fruity treat with strawberry-flavored filling.",
        "price": 6.50
      },
      {
        "name": "Mango Mochi",
        "image": "img/mangomochi.jpg",
        "description": "Tropical and delicious with a creamy mango filling.",
        "price": 6.50
      },
      {
        "name": "Mixed Flavors Cat Mochi",
        "image": "img/mochi.jpg",
        "description": "An assortment of our best mochi flavors, each shaped like a cute cat face.",
        "price": 10.00
      }
    ];

    // Dummy rendelés adatok
    const orders = [
      {
        id: 1,
        nev: "Kiss Panni",
        datum: "2025-04-19",
        termekek: ["Classic Cheeseburger", "Cat Cookies"],
        fizetes: "Cash",
        statusz: "In Progress"
      },
      {
        id: 2,
        nev: "Nagy Gergő",
        datum: "2025-04-18",
        termekek: ["Latte Macchiato", "Meowtini"],
        fizetes: "Credit Card",
        statusz: "Completed"
      },
      {
    id: 3,
    nev: "Szabó Réka",
    datum: "2025-04-18",
    termekek: ["Spicy Miso Ramen", "Matcha Latte", "Paw-some Brownie"],
    fizetes: "Credit Card",
    statusz: "Completed"
  },
  {
    id: 4,
    nev: "Tóth Dávid",
    datum: "2025-04-17",
    termekek: ["Veggie Delight Burger", "Bubble Tea"],
    fizetes: "Cash",
    statusz: "In Progress"
  },
  {
    id: 5,
    nev: "Varga Anna",
    datum: "2025-04-17",
    termekek: ["Catpuccino", "Cat Cupcake", "Meow-Macarons"],
    fizetes: "SZÉP Card",
    statusz: "Completed"
  },
  {
    id: 6,
    nev: "Fekete Zsolt",
    datum: "2025-04-16",
    termekek: ["Craft Beer", "Classic Cheeseburger", "Strawberry Mochi"],
    fizetes: "Credit Card",
    statusz: "In Progress"
  },
  {
    id: 7,
    nev: "Oláh Petra",
    datum: "2025-04-16",
    termekek: ["Matcha Mochi", "Almond Coffee"],
    fizetes: "Cash",
    statusz: "Completed"
  },
  {
    id: 8,
    nev: "Molnár Bence",
    datum: "2025-04-15",
    termekek: ["Purrfect Tonkotsu Ramen", "Latte Macchiato"],
    fizetes: "Credit Card",
    statusz: "Completed"
  },
  {
    id: 9,
    nev: "Kovács Emese",
    datum: "2025-04-15",
    termekek: ["Meow-Meat Special Burger", "Cat Cookies", "Bubble Tea"],
    fizetes: "Cash",
    statusz: "In Progress"
  },
  {
    id: 10,
    nev: "Sárközi Levente",
    datum: "2025-04-14",
    termekek: ["Mango Mochi", "Cat Cupcake"],
    fizetes: "Credit Card",
    statusz: "Completed"
  }
      
    ];

    // Függvények az adatok megjelenítéséhez

    // Termékek megjelenítése kártyákban
    function renderProducts() {
      const container = document.getElementById('productContainer');
      container.innerHTML = '';
      products.forEach((product, index) => {
        const card = document.createElement('div');
        card.className = 'product-card';
        card.innerHTML = `
          <img src="${product.image}" alt="${product.name}" />
          <h3>${product.name}</h3>
          <p>${product.description}</p>
          <div class="price">${product.price.toFixed(2)} €</div>
          <div class="btns">
            <button class="delete-btn" onclick="deleteProduct(${index})">Delete</button>
          </div>
        `;
        container.appendChild(card);
      });
    }

    // Termék törlése
    function deleteProduct(index) {
      if (confirm("Are you sure you want to delete this product?")) {
        products.splice(index, 1);
        renderProducts();
      }
    }

    // Rendelések megjelenítése
    function renderOrders() {
      const ordersTableBody = document.getElementById('ordersTableBody');
      ordersTableBody.innerHTML = '';
      orders.forEach(order => {
        const row = document.createElement('tr');
        row.innerHTML = `
          <td>${order.id}</td>
          <td>${order.nev}</td>
          <td>${order.datum}</td>
          <td>${order.termekek.join(", ")}</td>
          <td>${order.fizetes}</td>
          <td>${order.statusz}</td>
        `;
        ordersTableBody.appendChild(row);
      });
    }

    // Új termék hozzáadása űrlap kezelése
    const addProductForm = document.getElementById('addProductForm');
    addProductForm.addEventListener('submit', event => {
      event.preventDefault();
      const newProduct = {
        name: document.getElementById('name').value,
        image: document.getElementById('image').value,
        description: document.getElementById('description').value,
        price: parseFloat(document.getElementById('price').value)
      };
      products.push(newProduct);
      addProductForm.reset();
      alert("Product added!");
      // Automatikusan visszairányít a termékek nézetére
      showSection('productsSection');
      renderProducts();
    });

    // Menü váltás (szekciók megjelenítése/elrejtése)
    function showSection(sectionId) {
      // Elrejti az összes szekciót
      document.querySelectorAll('section').forEach(sec => sec.classList.add('hidden'));
      // Megjeleníti a kiválasztott szekciót
      document.getElementById(sectionId).classList.remove('hidden');
      // Ha a rendelés nézetre váltunk, rendereljük az adatokat
      if (sectionId === 'ordersSection') {
        renderOrders();
      }
      if (sectionId === 'productsSection') {
        renderProducts();
      }
    }

    // Alapértelmezetten a termékek nézet legyen megnyitva
    renderProducts();
  </script>

</body>
</html>
