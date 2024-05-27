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

// Adding books to the cart
$(document).ready(function () {
  // Change event binding to the button
  $(".add-to-cart").on("click", function (e) {
    e.preventDefault(); // Prevent default button behavior

    var bookId = $(this).data("id");

    $.ajax({
      type: "POST",
      url: "add_to_cart.php",
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
      url: "get_cart_items.php",
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
      url: "add_to_wishlist.php",
      data: { book_id: bookId },
      success: function (response) {
        var data = JSON.parse(response);
        console.log("Add to wishlist response:", data); // Log the response
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
      url: "get_wishlist_items.php",
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
      url: "move_to_cart.php",
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
