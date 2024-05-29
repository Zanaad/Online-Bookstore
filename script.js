// Adding books to the cart
$(document).ready(function () {
  // Change event binding to the button
  $(".add-to-cart").on("click", function (e) {
    e.preventDefault(); // Prevent default button behavior

    var bookId = $(this).data("id");

    $.ajax({
      type: "POST",
      url: "./php/add_to_cart.php",
      data: { book_id: bookId },
      success: function (response) {
        var data = JSON.parse(response);
        if (data.status === "success") {
          // Update cart count
          var newCount = parseInt($(".cart-count").text()) + 1;
          $(".cart-count").text(newCount);

          // Refresh cart items display
          displayCartItems();
        } else {
          alert("Error: " + data.message);
        }
      },
      error: function () {
        alert("Error adding book to cart");
      },
    });
  });

  function displayCartItems() {
    $.ajax({
      type: "GET",
      url: "./php/get_cart_items.php",
      success: function (response) {
        var data = JSON.parse(response);
        if (data.status === "success") {
          $(".cart-items").empty();
          var totalPrice = 0;
          data.cart_items.forEach(function (item) {
            $(".cart-items").append(
              `<div class="book-card" data-id="${item.id}">
                                <img src="${item.image}" alt="${item.title}">
                                <h5>${item.title}</h5>
                                <h6>${item.author}</h6>
                                <p class="price">${item.price}€</p>
                                <p class="quantity">Quantity: ${item.quantity}</p>
                            </div>`
            );
            totalPrice += parseFloat(item.price) * item.quantity;
          });
          $("#cart-total-price").text(totalPrice.toFixed(2) + "€");
          $(".cart-count").text(data.cart_count); // Update cart count
        } else {
          alert("Error: " + data.message);
        }
      },
      error: function () {
        alert("Error fetching cart items");
      },
    });
  }

  // Call displayCartItems() when the page is ready
  displayCartItems();

  $(".cart-toggle-btn").click(function () {
    $(".cart-window").toggle();
  });
});

//add to wishlist
$(document).ready(function () {
  // Event binding to the add-to-wishlist button
  $(".add-to-wishlist").on("click", function (e) {
    e.preventDefault(); // Prevent default button behavior

    var bookId = $(this).data("id");

    $.ajax({
      type: "POST",
      url: "./php/add_to_wishlist.php",
      data: { book_id: bookId },
      success: function (response) {
        var data = JSON.parse(response);
        if (data.status === "success") {
          // Update wishlist count
          var newCount = parseInt($(".cart-count-1").text()) + 1;
          $(".cart-count-1").text(newCount);

          // Refresh cart items display
          displayWishlistItems();
        } else {
          alert("Error: " + data.message);
        }
      },
      error: function () {
        alert("Error adding book to wishlist");
      },
    });
  });

  function displayWishlistItems() {
    $.ajax({
      type: "GET",
      url: "./php/get_wishlist_items.php",
      success: function (response) {
        var data = JSON.parse(response);
        console.log("Wishlist items response:", data); // Log the response
        if (data.status === "success") {
          $(".cart-items-1").empty();
          data.wishlist_items.forEach(function (item) {
            $(".cart-items-1").append(
              `<div class="book-card" data-id="${item.id}">
                <img src="${item.image}" alt="${item.title}">
                <h5>${item.title}</h5>
                  <h6>${item.author}</h6>
                <p class="price">${item.price}€</p>
              </div>`
            );
          });
        } else {
          alert("Error: " + data.message);
        }
      },
      error: function () {
        alert("Error fetching wishlist items");
      },
    });
  }

  displayWishlistItems();

  $(".cart-toggle-btn-1").click(function () {
    $(".cart-window-1").toggle();
  });
});

//move to bag
$(document).ready(function () {
  $(".move-to-bag-btn").click(function () {
    var wishlistId = $(this).data("id");
    $.ajax({
      type: "POST",
      url: "./php/move_to_cart.php",
      data: { wishlist_id: wishlistId },
      success: function (response) {
        var data = JSON.parse(response);
        if (data.status === "success") {
          location.reload();
        } else {
          alert("Error: " + data.message);
        }
      },
      error: function () {
        alert("Error moving item to bag");
      },
    });
  });
});

$(document).ready(function () {
  // Sort Books Function
  const sortBooks = () => {
    const sort = document.getElementById("sort").value;
    window.location.href = `?sort=${sort}`;
  };

  // Set the selected option based on the current sort parameter
  const urlParams = new URLSearchParams(window.location.search);
  const currentSort = urlParams.get("sort");
  if (currentSort) {
    document.getElementById("sort").value = currentSort;
  }

  // Rate Book Function
  const rateBook = (bookId, rating) => {
    const userId = userId; // Assuming userId is defined globally
    $.ajax({
      url: "./php/rate_book.php",
      method: "POST",
      data: {
        book_id: bookId,
        rating: rating,
        user_id: userId,
      },
      success: function (response) {
        const data = JSON.parse(response);
        if (data.success) {
          alert("Rating submitted successfully!");
          // Update the average rating in the DOM
          const avgRatingElem = document.getElementById(
            `average-rating-${bookId}`
          );
          if (avgRatingElem) {
            avgRatingElem.textContent = `Average Rating: ${data.average_rating.toFixed(
              2
            )}`;
          }
        } else {
          alert("Failed to submit rating: " + data.message);
        }
      },
      error: function () {
        alert("An error occurred while submitting the rating.");
      },
    });
  };

  // Attach event listener to the sort select element
  const sortElement = document.getElementById("sort");
  if (sortElement) {
    sortElement.addEventListener("change", sortBooks);
  }

  // Expose rateBook to global scope
  window.rateBook = rateBook;
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
