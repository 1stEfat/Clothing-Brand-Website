<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Details</title>
  <link rel="stylesheet" href="stylesheet5.css">
</head>
<body>
    <body>
        <div class="ma2">
            <a href="2nd.html"><button class="btn" id="Home">HOME</button></a>
        <h1 id="mnwr">OPIUM</h1> 
    
    <div class="button-container">
        <a href="logout.php"><button class="button" onclick="clearCartFromOtherPage()">
          <svg
            class="icon"
            stroke="currentColor"
            fill="currentColor"
            stroke-width="0"
            viewBox="0 0 512 512"
            height="1em"
            width="1em"
            xmlns="http://www.w3.org/2000/svg"
          >
            <path
              d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"
            ></path>
          </svg>
        </button></a>
      <a href="Profile.html"><button class="button1">
        <svg
          class="icon"
          stroke="currentColor"
          fill="currentColor"
          stroke-width="0"
          viewBox="0 0 24 24"
          height="1em"
          width="1em"
          xmlns="http://www.w3.org/2000/svg"
        >
          <path
            d="M12 2.5a5.5 5.5 0 0 1 3.096 10.047 9.005 9.005 0 0 1 5.9 8.181.75.75 0 1 1-1.499.044 7.5 7.5 0 0 0-14.993 0 .75.75 0 0 1-1.5-.045 9.005 9.005 0 0 1 5.9-8.18A5.5 5.5 0 0 1 12 2.5ZM8 8a4 4 0 1 0 8 0 4 4 0 0 0-8 0Z"
          ></path>
        </svg>
      </button></a>
    
      <a href="CART.html"><button class="button1">
        <svg
          class="icon"
          stroke="currentColor"
          fill="none"
          stroke-width="2"
          viewBox="0 0 24 24"
          stroke-linecap="round"
          stroke-linejoin="round"
          height="1em"
          width="1em"
          xmlns="http://www.w3.org/2000/svg"
        >
          <circle cx="9" cy="21" r="1"></circle>
          <circle cx="20" cy="21" r="1"></circle>
          <path
            d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"
          ></path>
        </svg>
      </button></a>
    </div>
</div>
  <div class="product-container">
    <div class="image-section">
        <button id="prev-image" class="arrow-button left-arrow">⬅</button>
        <img src="images/18.png" alt="Hoodie Front" id="main-image" class="main-image">
        <button id="next-image" class="arrow-button right-arrow">➡</button>
      </div>      
    <div class="details-section">
      <h1 id="product-name">Whogivesash!t T</h1>
      <p class="price">EGP 700.00</p>
      <div class="size-selector">
        <label for="size">Size:</label>
        <div class="sizes">
        <button class="size-button" data-size="S">S</button>
<button class="size-button" data-size="M">M</button>
<button class="size-button" data-size="L">L</button>
<button class="size-button" data-size="XL">XL</button>

        </div>
        <div id="stock-status"></div>
      </div>
      <label for="quantity-container">Quantity:</label>
      <div class="quantity-container">
        <button id="decrease" class="quantity-button">−</button>
        <span id="quantity-value" class="quantity-value">1</span>
        <button id="increase" class="quantity-button">+</button>
      </div>
      
      <button class="butt" id="add-to-cart">ADD TO CART</button>
      <p class="stock-status">✔ In stock - Ready to ship</p>
      <details>
        <summary>SIZE CHART</summary>
        <table>
          <tr>
            <th>Size</th>
            <th>Chest Width</th>
            <th>Sleeve Length</th>
            <th>Total Length</th>
          </tr>
          <tr>
            <td>S</td>
            <td>55 cm</td>
            <td>53 cm</td>
            <td>65 cm</td>
          </tr>
          <tr>
            <td>M</td>
            <td>57 cm</td>
            <td>55 cm</td>
            <td>67 cm</td>
          </tr>
          <tr>
            <td>L</td>
            <td>59 cm</td>
            <td>57 cm</td>
            <td>69 cm</td>
          </tr>
          <tr>
            <td>XL</td>
            <td>61 cm</td>
            <td>59 cm</td>
            <td>71 cm</td>
          </tr>
        </table>
      </details>
      <details>
        <summary>DETAILS</summary>
        <p>MATERIAL: Cotton</p>
        <br>
        <p>COLOR: BLACK WITH A TOUCH OF ORANGE</p>
        <br>
        <p>PRINT: Null </p>
        <br>
        <p>FIT: Oversized fit (TRUE TO SIZE)</p>   
      </details>
      <details>
        <summary>RETURN AND EXCHANGE POLICY</summary>
        <p>Returns are accepted within 30 days of purchase.</p>
      </details>
    </div>
  </div>
  <div id="cart-popup" class="cart-popup">
    <p>Item added to cart successfully!</p>
  </div>
  <script>
   const decreaseButton = document.getElementById('decrease');
const increaseButton = document.getElementById('increase');
const quantityValue = document.getElementById('quantity-value');

// Initialize quantity
let quantity = 1;

// Decrease quantity
decreaseButton.addEventListener('click', () => {
  if (quantity > 1) {
    quantity--;
    quantityValue.textContent = quantity;
  }
});

// Increase quantity
increaseButton.addEventListener('click', () => {
  quantity++;
  quantityValue.textContent = quantity;
});



const sizeButtons = document.querySelectorAll('.size-button');
let selectedSize = 'M'; // Initial selected size
const stockStatusDiv = document.getElementById('stock-status');

// Add event listeners to each button
sizeButtons.forEach(button => {
    button.addEventListener('click', () => {
        // Remove "active" class from all buttons
        sizeButtons.forEach(btn => btn.classList.remove('active'));
        // Add "active" class to the clicked button
        button.classList.add('active');

        // Update the selected size
        selectedSize = button.getAttribute('data-size');
        const productName = document.getElementById('product-name').textContent;

        // Fetch stock information from the server
        fetch('stock.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ product_name: productName, size: selectedSize })
        })
        .then(response => response.json())
        .then(data => {
            stockStatusDiv.innerHTML = ''; // Clear previous stock status

            if (data.success) {
                if (data.quantity >= 5) {
                    stockStatusDiv.innerHTML = `<p class="stock-status">✔ In stock - Ready to ship</p>`;
                } else if (data.quantity > 0 && data.quantity < 5) {
                    stockStatusDiv.innerHTML = `<p class="stock-status limited-stock">Hurry up Limited pieces left</p>`;
                }
            } else {
                stockStatusDiv.innerHTML = `<p class="stock-status out-of-stock">✘ Out of stock</p>`;
            }
        })
        .catch(error => {
            console.error('Error:', error);
            stockStatusDiv.innerHTML = `<p class="stock-status error">Error checking stock. Please try again later.</p>`;
        });
    });
});








const mainImage = document.getElementById('main-image');
const prevButton = document.getElementById('prev-image');
const nextButton = document.getElementById('next-image');

// Tracks the current image being shown
let showingFront = true;

// Add click event to the left arrow (prev button)
prevButton.addEventListener('click', () => {
  if (!showingFront) {
    mainImage.src = 'images/1.png'; // Show front image
    showingFront = true;
  }
});

// Add click event to the right arrow (next button)
nextButton.addEventListener('click', () => {
  if (showingFront) {
    mainImage.src = 'images/2.png'; // Show back image
    showingFront = false;
  }
 
});
const addToCartButton = document.getElementById('add-to-cart');
const cartPopup = document.getElementById('cart-popup');

addToCartButton.addEventListener('click', () => {
  const product = {
    name: 'Whogivesash!t T',
    price: 'EGP 700.00',
    quantity: quantity,
    size: selectedSize,
    code: 'T006'
  };


  // Retrieve cart from localStorage
  let cart = JSON.parse(localStorage.getItem('cart')) || [];

  // Calculate total quantity for this product and size already in the cart
  const existingProduct = cart.find(
    item => item.name === product.name && item.size === product.size
  );
  const currentCartQuantity = existingProduct ? existingProduct.quantity : 0;

  // Check with server if the addition exceeds stock
  fetch('cart.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      name: product.name,
      size: product.size,
      quantity: currentCartQuantity + product.quantity, // Total quantity after addition
    }),
  })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Update cart in localStorage if validation passes
        if (existingProduct) {
          existingProduct.quantity += product.quantity; // Update quantity
        } else {
          cart.push(product); // Add new product
        }
        localStorage.setItem('cart', JSON.stringify(cart));

        // Show success popup
        cartPopup.textContent = 'Product added to cart!';
      } else {
        // Show error popup if validation fails
        cartPopup.textContent = `You can't add more ${product.name} (${product.size}) to the cart.`;
      }

      cartPopup.style.display = 'block';

      // Hide popup after 3 seconds
      setTimeout(() => {
        cartPopup.style.display = 'none';
      }, 2000);
    })
    .catch(error => {
      console.error('Error:', error);
      cartPopup.textContent = 'An error occurred. Please try again.';
      cartPopup.style.display = 'block';

      setTimeout(() => {
        cartPopup.style.display = 'none';
      }, 3000);
    });
});


  </script>
</body>
</html>
