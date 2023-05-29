"use strict";

const foodForm = document.getElementById("food-form");
const nutrientResults = document.getElementById("nutrient-results");
const recommendations = document.querySelector(".recommendations");
const nutrients = document.querySelector(".nutrient__results");
const resultsContainer = document.querySelector(".result__container");
const logoutBtn = document.querySelector(".logout__btn");
const recommendationList = document.querySelector("#result");
const mealList = document.getElementById("meal");

// Function to fetch recommendation
const fetchRecommendation = function (appId, appKey, dietType) {
  fetch(
    `https://api.edamam.com/search?q=&app_id=${appId}&app_key=${appKey}&diet=${dietType}`
  )
    .then((response) => response.json())
    .then((data) => {
      recommendationList.innerHTML = "";
      for (let i = 0; i < data.hits.length; i++) {
        const recipe = data.hits[i].recipe;
        const listItem = document.createElement("p");
        listItem.textContent = recipe.label;
        recommendationList.appendChild(listItem);
        addRecipeImageLink(recipe);
      }
    });
};

// Function to add the recipe images with button to the result container
const addRecipeImageLink = function (recipe) {
  recommendations.classList.remove("hidden");
  nutrients.classList.remove("hidden");
  resultsContainer.classList.remove("zero__size");
  // console.log("img"+data.hits[i].recipe.image);
  let html = `
                    <div class = "meal-item">
                        <div class = "meal-img">
                            <img src = "${recipe.image}" alt = "food">
                        </div>
                        <div class = "meal-name">
                            <h3>${recipe.label}</h3>
                            <a href = "${recipe.url}" class = "recipe__button">Get Recipe</a>
                        </div>
                    </div>
                `;
  mealList.insertAdjacentHTML("afterbegin", html);
};

foodForm.addEventListener("submit", (event) => {
  event.preventDefault();
  const foodInput = document.getElementById("food-input").value;

  // API call to retrieve nutrient data for the food
  fetch(
    "https://trackapi.nutritionix.com/v2/natural/nutrients?timestamp=${timestamp}",
    {
      method: "POST",
      headers: {
        "x-app-id": "eb69f562",
        "x-app-key": "6abfb6d1e676f6d3dde0e5156547afbf",
        "Content-Type": "application/json", // Add the Content-Type header
      },
      body: JSON.stringify({ query: foodInput }), // Convert the body to a JSON string
    }
  )
    .then((response) => response.json())
    .then((data) => {
      // Clear previous results
      nutrientResults.innerHTML = "";
      recommendationList.innerHTML = "";
      mealList.innerHTML = "";
      recommendations.classList.add("hidden");
      nutrients.classList.add("hidden");
      resultsContainer.classList.add("zero__size");

      console.log(data.foods[0]);
      const food = data.foods[0];

      const nutrientDensity = calculateNutrientDensity(
        //nutrient density
        food.nf_total_fat,
        food.nf_total_carbohydrate,
        food.nf_protein
      );
      const nutrientDistribution =
        calculateNutrientIntakeDistribution(nutrientDensity); //nutrient distribution
      getRecommendations(nutrientDistribution);
      nutrientResults.innerHTML = `
        <h2>${food.food_name}</h2>
        <p>Quantity: ${food.serving_qty}</p>
        <p>Nutrient Density: ${nutrientDensity.toFixed(2)}</p>
        <p>Nutrient Distribution:</p>
          <p>FAT: ${food.nf_total_fat}%</p>
          <p>CHOCDF: ${food.nf_total_carbohydrate}%</p>
          <p>Protein: ${food.nf_protein}%</p>
      `;
    })
    .catch((error) => {
      nutrientResults.innerHTML =
        "<p>An error occurred while retrieving nutrient data.</p>";
    });
});

function calculateNutrientDensity(totalFAT, totalCarbohydrate, protein) {
  //nutrient density
  const calorieDensity =
    (totalFAT * 9 + totalCarbohydrate * 4 + protein * 4) / 100;
  return protein / calorieDensity; //nutrient density
}

// Nutrient Intake Distribution
function calculateNutrientIntakeDistribution(nutrientDensity) {
  //nutrient distribution
  const FAT = nutrientDensity * 0.25;
  //  const ENERC_KCAL =calculateNutrientDensity.totalFAT* 9 + calculateNutrientDensity.totalCarbohydrate * 4 + calculateNutrientDensity.protein * 4
  const CHOCDF = nutrientDensity * 0.45;
  const PROCNT = nutrientDensity * 0.3;
  const total = FAT + CHOCDF + PROCNT;
  return {
    FAT: (FAT / total) * 100,
    CHOCDF: (CHOCDF / total) * 100,
    PROCNT: (PROCNT / total) * 100,
  };
}

const APP_ID = "f14bc3eb";
const APP_KEY = "bae3a04e6b06e43d16dfed5c2f322ada";

function getRecommendations(nutrientIntakeDistribution) {
  const targetNutrients = {
    FAT: 25,
    CHOCDF: 300,
    PROCNT: 50,
  };

  if (nutrientIntakeDistribution.FAT < targetNutrients.FAT) {
    // Retrieve recipe data for high FAT foods
<<<<<<< HEAD
    fetchRecommendation(APP_ID, APP_KEY, "balanced");
=======
    fetch(
      `https://api.edamam.com/api/recipes/v2?type=public&app_id=${APP_ID}&app_key=${APP_KEY}&diet=balanced`
    )
      .then((response) => response.json())
      .then((data) => {
        //console.log(data);
        for (let i = 0; i < data.hits.length; i++) {
          const recipe = data.hits[i].recipe;
          const listItem = document.createElement("p");
          listItem.textContent = recipe.label;
          console.log(recommendationList.innerHTML);
          // if (recommendationList.hasChildNodes()) {
          //   recommendationList.removeChild();
          // }
          recommendationList.appendChild(listItem);
          recommendations.classList.remove("hidden");
          nutrients.classList.remove("hidden");
          resultsContainer.classList.remove("zero__size");
          // console.log("img"+data.hits[i].recipe.image);
          let html = `
                    <div class = "meal-item">
                        <div class = "meal-img">
                            <img src = "${data.hits[i].recipe.image}" alt = "food">
                        </div>
                        <div class = "meal-name">
                            <h3>${data.hits[i].recipe.label}</h3>
                            <a href = "${data.hits[i].recipe.url}" class = "recipe__button">Get Recipe</a>
                        </div>
                    </div>
                `;
          mealList.insertAdjacentHTML("afterbegin", html);
        }
      });
>>>>>>> c85442336fd18e843188fe2ff6a1f0c62d86631a
  }

  if (nutrientIntakeDistribution.CHOCDF < targetNutrients.CHOCDF) {
    // Retrieve recipe data for high carbohydrate foods
<<<<<<< HEAD
    fetchRecommendation(APP_ID, APP_KEY, "high-fiber");
=======
    fetch(
      `https://api.edamam.com/api/recipes/v2?type=public&app_id=${APP_ID}&app_key=${APP_KEY}&diet=high-fiber`
    )
      .then((response) => response.json())
      .then((data) => {
        for (let i = 0; i < data.hits.length; i++) {
          const recipe = data.hits[i].recipe;
          const listItem = document.createElement("p");
          listItem.textContent = recipe.label;
          // console.log(recommendationList.innerHTML);
          // if (recommendationList.hasChildNodes()) {
          //   recommendationList.removeChild();
          // }
          recommendationList.appendChild(listItem);
        }
      });
>>>>>>> c85442336fd18e843188fe2ff6a1f0c62d86631a
  }

  if (nutrientIntakeDistribution.PROCNT < targetNutrients.PROCNT) {
    // Retrieve recipe data for high protein foods
<<<<<<< HEAD
    fetchRecommendation(APP_ID, APP_KEY, "high-protein");
=======
    fetch(
      `https://api.edamam.com/api/recipes/v2?type=public&app_id=${APP_ID}&app_key=${APP_KEY}&diet=high-protein`
    )
      .then((response) => response.json())
      .then((data) => {
        // console.log(data.hits);
        for (let i = 0; i < data.hits.length; i++) {
          const recipe = data.hits[i].recipe;
          const listItem = document.createElement("p");
          listItem.textContent = recipe.label;
          // console.log(recommendationList.innerHTML);
          // if (recommendationList.hasChildNodes()) {
          //   recommendationList.removeChild();
          // }
          recommendationList.appendChild(listItem);
        }
      });
>>>>>>> c85442336fd18e843188fe2ff6a1f0c62d86631a
  }
}

logoutBtn.addEventListener("click", function (e) {
  e.preventDefault();

  Swal.fire({
    title: "Logging Out",
    text: "You are being logged out",
    icon: "warning",
    confirmButtonText: "OK",
  }).then(function () {
    window.location.href = "logout.php";
  });
});

window.addEventListener("scroll", function () {
  const topMove = window.scrollY + 5;
  logoutBtn.style.top = `${topMove}px`;
});
