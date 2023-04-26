"use strict";

const foodForm = document.getElementById("food-form");
const nutrientResults = document.getElementById("nutrient-results");
const recommendations = document.querySelector(".recommendations");
const nutrients = document.querySelector(".nutrient__results");
const resultsContainer = document.querySelector(".result__container");
console.log("hello");
foodForm.addEventListener("submit", (event) => {
  event.preventDefault();
  const foodInput = document.getElementById("food-input").value;
  console.log(foodInput);

  // API call to retrieve nutrient data for the food
  fetch(
    `https://api.nutritionix.com/v1_1/search/${foodInput}?fields=item_name%2Cnf_total_fat%2Cnf_total_carbohydrate%2Cnf_protein&appId=eb69f562&appKey=6abfb6d1e676f6d3dde0e5156547afbf`
  )
    .then((response) => response.json())
    // console.log(data)
    .then((data) => {
      console.log(data.hits);
      const food = data.hits[0];
      //   const nutrientData = food.fields.nutrient_values;

      const nutrientDensity = calculateNutrientDensity(
        food.fields.nf_total_fat,
        food.fields.nf_total_carbohydrate,
        food.fields.nf_protein
      );
      const nutrientDistribution =
        calculateNutrientIntakeDistribution(nutrientDensity);
      const nutrientRecommendations = getRecommendations(nutrientDistribution);
      // console.log(nutrientDensity);
      // console.log(nutrientDistribution);
      // console.log(nutrientRecommendations);
      nutrientResults.innerHTML = `
        <h2>${food.fields.item_name}</h2>
        <p>Nutrient Density: ${nutrientDensity.toFixed(2)}</p>
        <p>Nutrient Distribution:</p>
        <ul class="nutrient__list">
          <li>FAT: ${nutrientDistribution.FAT.toFixed(2)}%</li>
          <li>CHOCDF: ${nutrientDistribution.CHOCDF.toFixed(2)}%</li>
          <li>Protein: ${nutrientDistribution.PROCNT.toFixed(2)}%</li>
        </ul>
      `;
    })
    .catch((error) => {
      nutrientResults.innerHTML =
        "<p>An error occurred while retrieving nutrient data.</p>";
      console.error(error);
    });
});

function calculateNutrientDensity(totalFAT, totalCarbohydrate, protein) {
  const calorieDensity =
    (totalFAT * 9 + totalCarbohydrate * 4 + protein * 4) / 100;
  return protein / calorieDensity;
}

function calculateNutrientIntakeDistribution(nutrientDensity) {
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
    FAT: 65,
    CHOCDF: 300,
    PROCNT: 50,
  };
  //   console.log(nutrientDistribution);
  //   const nutrientIntakeDistribution = calculateNutrientIntakeDistribution(nutrientDistribution);
  //   console.log(nutrientIntakeDistribution);

  const recommendationList = document.querySelector("#result");
  const mealList = document.getElementById("meal");
  //   console.log(recommendationList);
  //   console.log(nutrientIntakeDistribution);

  if (nutrientIntakeDistribution.FAT < targetNutrients.FAT) {
    // console.log('hello');
    // Retrieve recipe data for high FAT foods
    fetch(
      `https://api.edamam.com/search?q=&app_id=${APP_ID}&app_key=${APP_KEY}&diet=balanced`
    )
      .then((response) => response.json())
      .then((data) => {
        //console.log(data);
        for (let i = 0; i < data.hits.length; i++) {
          const recipe = data.hits[i].recipe;
          const listItem = document.createElement("li");
          listItem.textContent = recipe.label;
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
  }

  if (nutrientIntakeDistribution.CHOCDF < targetNutrients.CHOCDF) {
    // Retrieve recipe data for high carbohydrate foods
    fetch(
      `https://api.edamam.com/search?q=&app_id=${APP_ID}&app_key=${APP_KEY}&diet=high-fiber`
    )
      .then((response) => response.json())
      .then((data) => {
        for (let i = 0; i < data.hits.length; i++) {
          const recipe = data.hits[i].recipe;
          const listItem = document.createElement("li");
          listItem.textContent = recipe.label;
          recommendationList.appendChild(listItem);
        }
      });
  }

  if (nutrientIntakeDistribution.PROCNT < targetNutrients.PROCNT) {
    // Retrieve recipe data for high protein foods
    fetch(
      `https://api.edamam.com/search?q=&app_id=${APP_ID}&app_key=${APP_KEY}&diet=high-protein`
    )
      .then((response) => response.json())
      .then((data) => {
        // console.log(data.hits);
        for (let i = 0; i < data.hits.length; i++) {
          const recipe = data.hits[i].recipe;
          const listItem = document.createElement("li");
          listItem.textContent = recipe.label;
          recommendationList.appendChild(listItem);
        }
      });
  }

  // ...
}
