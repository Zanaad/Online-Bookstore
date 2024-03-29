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

    var cartBook = book.clone();
    cartBook.find(".btn button").remove();
    cartBook.find(".star-heart").remove();

    // Add the new book card to the cart items
    $(".cart-items").append(cartBook);

    // Update the cart total price
    var totalPrice = parseFloat($("#cart-total-price").text().replace("€", ""));
    totalPrice += bookPrice;
    $("#cart-total-price").text(totalPrice.toFixed(2) + "€");

    // Update the cart count
    var cartCount = parseInt($(".cart-count").text());
    $(".cart-count").text(cartCount + 1);
  }

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
    var cartBook = book.clone();
    cartBook.find(".btn button").remove();
    cartBook.find(".star-heart").remove();
    // Append the new book card to the cart items
    $(".cart-items-1").append(cartBook);

    // Update the cart count
    var cartCount = parseInt($(".cart-count-1").text());
    $(".cart-count-1").text(cartCount + 1);
  }

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

//funksionet per validim te te dhenave, te forma ne pjesen e kontaktit
function validateName() {
  var name = document.getElementById("name").value;
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
  var email = document.getElementById("email").value;
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

// Defining the Book object constructor
class Book {
  constructor(title, author, genre, price) {
    this.title = title;
    this.author = author;
    this.genre = genre;
    this.price = price;
  }
}

// Creating instances of the Book object
var books = [
  new Book("The Great Gatsby", "F. Scott Fitzgerald", "Fiction", 15.99),
  new Book("To Kill a Mockingbird", "Harper Lee", "Classics", 12.5),
  new Book("The Hobbit", "J.R.R. Tolkien", "Fantasy", 18.75),
];

// Using map to create an array of book titles
var bookTitles = books.map((book) => book.title);
console.log("Book Titles:", bookTitles);

// Using filter to get only fiction books
var fictionBooks = books.filter((book) => book.genre === "Fiction");
console.log("Fiction Books:", fictionBooks);

// Using reduce to calculate the total price of the books
var CmimiTotal = books.reduce((acc, book) => acc + book.price, 0);
console.log("Total Price of All Books:", CmimiTotal);

// Using map and filter together to get titles of expensive books (price > 15)
var expensiveBookTitles = books
  .filter((book) => book.price > 15)
  .map((book) => book.title);
console.log("Expensive Book Titles:", expensiveBookTitles);

// dokumentimi eshte 2.5
//te dokumentimi duhet me shkru ku kena perdor ni kerkese, pse e kena perdor qitu qat kerkese
// plotesimi i kerkesave eshte 5p
document.addEventListener("DOMContentLoaded", function () {
  const loginLink = document.getElementById("login-link");
  const loginOverlay = document.getElementById("login-page");

  // Add a click event listener to the login link
  loginLink.addEventListener("click", function (event) {
    event.preventDefault(); // Prevent the default link behavior (navigating to a new page)
    console.log("Login link clicked");
    loginOverlay.style.display = "flex"; // Show the login overlay
  });

  // Add a click event listener to close the overlay when clicking outside the form
  loginOverlay.addEventListener("click", function (event) {
    if (event.target === loginOverlay) {
      console.log("Overlay clicked");
      loginOverlay.style.display = "none"; // Hide the login overlay
    }
  });
});

//per log in

let loginForm = document.querySelector(".login-form-container");
document.querySelector("#login-btn").onclick = () => {
  loginForm.classList.toggle("active");
};
document.querySelector("#close-login-btn").onclick = () => {
  loginForm.classList.remove("active");
};

// per sign up
let signUpForm = document.querySelector(".signup-form-container");
document.querySelector("#signup-btn").onclick = () => {
  signUpForm.classList.toggle("active");
};
document.querySelector("#close-signup-btn").onclick = () => {
  signUpForm.classList.remove("active");
};

//per SIgn Up Now
let signUpLink = document.querySelector(".go-to-register #signUp");

signUpLink.onclick = (event) => {
  event.preventDefault(); // Prevent default link behavior
  loginForm.classList.remove("active");
  signUpForm.classList.add("active");
};

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
