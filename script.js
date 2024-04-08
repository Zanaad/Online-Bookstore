// Search form
$(document).ready(function () {
  $(".search").on("submit", function (e) {
    e.preventDefault(); // Prevent form submission

    var searchTerm = $(".search-bar").val().toLowerCase();

    $(".book-card").each(function () {
      var cardTitle = $(this).find("h5").text().toLowerCase();

      // Check if the card title contains the search term
      if (cardTitle.includes(searchTerm)) {
        $(this).show();
      } else {
        $(this).hide();
      }
    });
  });
});

// Adding books to the cart - Ne kete pjese perfshihen try, catch and throw error nese cmimet jane invalide
$(document).ready(function () {
  function addToCart(book) {
    // Validate book price
    var bookPriceText = book.find(".price").text().replace("€", "");
    var bookPrice = parseFloat(bookPriceText);

    if (isNaN(bookPrice) || bookPrice <= 0) {
      // Throw an error if the price is invalid
      throw new Error("Invalid book price: " + bookPriceText);
    }

    // Store the entire book card HTML, title, and price in local storage
    var cartBook = {
      title: book.find("h5").text(),
      price: bookPrice,
      bookHTML: book.prop("outerHTML"),
    };

    // Retrieve existing cart items from local storage
    var cartItems = JSON.parse(localStorage.getItem("cart")) || [];
    // Check if the book is already in the wishlist
    var existingBook = cartItems.find(function (item) {
      return item.title === cartBook.title;
    });
    if (!existingBook) {
      // Add the new book to the cart items
      cartItems.push(cartBook);

      // Update the cart items in local storage
      localStorage.setItem("cart", JSON.stringify(cartItems));

      // Add the new book card to the cart items
      $(".cart-items").append(cartBook.bookHTML);

      // Update the cart total price
      var totalPrice = parseFloat(
        $("#cart-total-price").text().replace("€", "")
      );
      totalPrice += bookPrice;
      $("#cart-total-price").text(totalPrice.toFixed(2) + "€");
      $("#cart-total-price-books").text(totalPrice.toFixed(2) + "€");

      // Update the cart count
      var cartCount = parseInt($(".cart-count").text());
      $(".cart-count").text(cartCount + 1);
    } else {
      alert("This book is already in your cart.");
    }
  }

  // Function to display cart items on the page
  function displayCartItems() {
    var cartItems = JSON.parse(localStorage.getItem("cart")) || [];
    $(".cart-items").empty(); // Clear previous cart items
    cartItems.forEach(function (item) {
      $(".cart-items").append(item.bookHTML);
    });
    updateCartUI(cartItems);
  }

  // Function to update the cart UI
  function updateCartUI(cartItems) {
    var totalPrice = cartItems.reduce(function (total, item) {
      return total + item.price;
    }, 0);
    $("#cart-total-price").text(totalPrice.toFixed(2) + "€");
    $("#cart-total-price-books").text(totalPrice.toFixed(2) + "€");
    $(".cart-count").text(cartItems.length);
  }

  // Call displayCartItems when the page loads
  displayCartItems();

  // Click event to add a book to the cart
  $(".btn button").click(function () {
    try {
      var book = $(this).closest(".book-cards .book-card");
      addToCart(book);
    } catch (error) {
      // Handle the error by logging it or showing an alert
      console.error("Error adding book to cart:", error.message);
      alert("Error adding book to cart: " + error.message);
    }
  });

  // Click event to toggle the visibility of the cart window
  $(".cart-toggle-btn").click(function () {
    $(".cart-window").toggle();
  });
  $(".btn button").click(function () {
    $(".cart-count").show();
  });
  $(".cart-toggle-btn-1").click(function () {
    $(".cart-window").hide();
  });
});

//add to wishlist
$(document).ready(function () {
  // Function to handle adding a book to the wishlist
  function addToWishlist(book) {
    var wishlistBook = {
      title: book.find("h5").text(),
      price: parseFloat(book.find(".price").text().replace("€", "")),
      bookHTML: book.prop("outerHTML"),
    };

    // Retrieve existing wishlist items from local storage
    var wishlistItems = JSON.parse(localStorage.getItem("wishlist")) || [];

    // Check if the book is already in the wishlist
    var existingBook = wishlistItems.find(function (item) {
      return item.title === wishlistBook.title;
    });

    if (!existingBook) {
      // Add the new book to the wishlist items
      wishlistItems.push(wishlistBook);

      // Update the wishlist items in local storage
      localStorage.setItem("wishlist", JSON.stringify(wishlistItems));

      // Update the cart count
      var cartCount = parseInt($(".cart-count-1").text());
      $(".cart-count-1").text(cartCount + 1);
      // Append the new book card to the wishlist items
      $(".cart-items-1").append(wishlistBook.bookHTML);

      // Update the wishlist count
      // var wishlistCount = parseInt($(".wishlist-count").text());
      // $(".wishlist-count").text(wishlistCount + 1);
    } else {
      // Alert the user that the book is already in the wishlist
      alert("This book is already in your wishlist.");
    }
  }

  // Function to display wishlist items on the page
  function displayWishlistItems() {
    var wishlistItems = JSON.parse(localStorage.getItem("wishlist")) || [];
    $(".cart-items-1").empty(); // Clear previous wishlist items
    wishlistItems.forEach(function (item) {
      $(".cart-items-1").append(item.bookHTML);
    });
    updateWishlistUI(wishlistItems);
  }

  // Function to update the wishlist UI
  function updateWishlistUI(wishlistItems) {
    $(".cart-count-1").text(wishlistItems.length);
  }

  // Call displayWishlistItems when the page loads
  displayWishlistItems();

  // Click event to add a book to the wishlist
  $(".btn.btn-outline-danger").click(function () {
    var book = $(this).closest(".book-card");
    addToWishlist(book);
  });

  // Click event to toggle the visibility of the cart window
  $(".cart-toggle-btn-1").click(function () {
    $(".cart-window-1").toggle();
  });
  $(".btn.btn-outline-danger").click(function () {
    $(".cart-count-1").show();
  });
  $(".cart-toggle-btn").click(function () {
    $(".cart-window-1").hide();
  });
});
// MOVE TO THE BAG
$(document).ready(function () {
  function moveToCart() {
    // Retrieve wishlist items from local storage
    var wishlistItems = JSON.parse(localStorage.getItem("wishlist")) || [];

    // Retrieve cart items from local storage
    var cartItems = JSON.parse(localStorage.getItem("cart")) || [];

    // Iterate over wishlist items
    wishlistItems.forEach(function (item) {
      // Check if the item is already in the cart
      var existingItemIndex = cartItems.findIndex(function (cartItem) {
        return cartItem.title === item.title;
      });

      // If the item is not in the cart, add it
      if (existingItemIndex === -1) {
        cartItems.push(item);
      } else {
        // If the item is already in the cart, update its quantity
        cartItems[existingItemIndex].quantity += item.quantity;
      }
    });

    // Update the cart items in local storage
    localStorage.setItem("cart", JSON.stringify(cartItems));

    // Clear the wishlist items
    localStorage.removeItem("wishlist");

    // Refresh the display of cart items
    displayCartItems();

    // Clear the display of wishlist items
    $(".cart-items-1").empty();
  }

  $("#move").click(moveToCart);
  $("#move-1").click(moveToCart);
});

//funksionet per validim te te dhenave, te forma ne pjesen e kontaktit
function validateName() {
  var name = document.getElementById("emri").value;
  if (name.length === 0) {
    alert("Name cannot be empty");
    return false;
  }
  return true;
}

function validateLastname() {
  var lastname = document.getElementById("lastname").value;
  if (lastname.length === 0) {
    alert("Lastname cannot be empty");
    return false;
  }
  return true;
}

function validateEmail() {
  var email = document.getElementById("contact-email").value;
  if (email.length === 0 || !email.includes("@")) {
    alert("Invalid email address");
    return false;
  }
  return true;
}

function validateForm() {
  var isNameValid = validateName();
  var isLastnameValid = validateLastname();
  var isEmailValid = validateEmail();

  if (isNameValid && isLastnameValid && isEmailValid) {
    return true;
  } else {
    return false;
  }
}

// Review stars
document.addEventListener("DOMContentLoaded", function () {
  const starsContainers = document.querySelectorAll(".stars");

  starsContainers.forEach((starsContainer) => {
    const stars = starsContainer.querySelectorAll("i");

    stars.forEach((star) => {
      star.addEventListener("click", function () {
        rateStar(this, starsContainer);
      });

      star.addEventListener("mouseover", function () {
        hoverStar(this, stars);
      });

      star.addEventListener("mouseout", function () {
        resetStars(stars);
      });
    });
  });

  function rateStar(clickedStar, starsContainer) {
    const value = clickedStar.getAttribute("data-value");
    alert(`You rated ${starsContainer.id} ${value} stars`);
  }

  function hoverStar(hoveredStar, stars) {
    const value = hoveredStar.getAttribute("data-value");
    resetStars(stars);

    for (let i = 0; i < value; i++) {
      stars[i].classList.add("fas");
      stars[i].classList.remove("far");
    }
  }

  function resetStars(stars) {
    stars.forEach((star) => {
      star.classList.remove("fas");
      star.classList.add("far");
    });
  }
});

// dokumentimi eshte 2.5
//te dokumentimi duhet me shkru ku kena perdor ni kerkese, pse e kena perdor qitu qat kerkese
// plotesimi i kerkesave eshte 5p

//Drag and drop
function allowDrop(event) {
  event.preventDefault();
}

function drag(event) {
  event.dataTransfer.setData("text/plain", event.target.textContent);
}

function drop(event) {
  event.preventDefault();

  var data = event.dataTransfer.getData("text/plain");

  var newBook = document.createElement("div");
  newBook.className = "book";
  newBook.textContent = data;
  newBook.draggable = true;
  newBook.ondragstart = drag;
  document.getElementById("recommendationBoard").appendChild(newBook);
}

document.addEventListener("DOMContentLoaded", function () {
  // Cakto një kohë fillestare
  const startTime = new Date().getTime();

  // Përdor setTimeout për të azhurnuar kohën çdo sekondë
  setTimeout(function updateDuration() {
    const currentTime = new Date().getTime();
    const elapsedSeconds = Math.floor((currentTime - startTime) / 1000);

    // Shfaq kohën e qëndrimit
    const timeElapsedElement = document.getElementById("timeElapsed");
    timeElapsedElement.textContent = `${elapsedSeconds} seconds`;

    // Rifresko kohën çdo sekondë
    setTimeout(updateDuration, 1000);
  }, 1000);
});
// krejt kot
document.addEventListener("DOMContentLoaded", function () {
  document
    .querySelector(".signup-btn")
    .addEventListener("click", function (event) {
      // Prevent the form from submitting normally
      event.preventDefault();

      // Retrieve form data
      var firstName = document.getElementById("signup-name").value;
      var lastName = document.getElementById("signup-surname").value;
      var email = document.getElementById("signup-email").value;
      var password = document.getElementById("signup-password").value;

      // Save data to localStorage
      localStorage.setItem("firstName", firstName);
      localStorage.setItem("lastName", lastName);
      localStorage.setItem("email", email);
      localStorage.setItem("password", password);

      // Submit the form
      document.querySelector(".login-page").submit();
    });
});
