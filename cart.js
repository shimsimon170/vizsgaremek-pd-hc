let cart = JSON.parse(localStorage.getItem('cart')) || []; 

function updateCart() {
    const itemCount = document.getElementById('item-count');
    const cartItems = document.getElementById('cart-items');
    const totalPriceElement = document.getElementById('total-price'); 

    itemCount.textContent = cart.length;

    cartItems.innerHTML = '';

    let totalPrice = 0; 

    cart.forEach((item, index) => {
        const li = document.createElement('li');
        li.className = 'list-group-item d-flex justify-content-between align-items-center'; 
        li.textContent = `${item.name} - $${item.price}`;

        const deleteButton = document.createElement('button');
        deleteButton.className = 'btn btn-danger btn-sm';
        deleteButton.textContent = 'Delete';
        

        deleteButton.addEventListener('click', function() {
            deleteItem(index);
        });


        li.appendChild(deleteButton);
        
        cartItems.appendChild(li);
        

        totalPrice += parseFloat(item.price);
    });

    totalPriceElement.textContent = `$${totalPrice.toFixed(2)}`; 

    localStorage.setItem('cart', JSON.stringify(cart));
}

function deleteItem(index) {

    cart.splice(index, 1);


    updateCart();
}


document.querySelectorAll('.add-to-cart').forEach(button => {
    button.addEventListener('click', function() {
        const itemName = this.getAttribute('data-name');
        const itemPrice = this.getAttribute('data-price');


        cart.push({ name: itemName, price: itemPrice });

        updateCart();
    });
});

updateCart();
