let adjectives;
let objects;
let fileName;

fetch('objects.js')
  .then(response => response.text())
  .then(data => objects = textToArray(data))
  .catch(error => console.error(error))

fetch('adjectives.js')
  .then(response => response.text())
  .then(data => adjectives = textToArray(data))
  .catch(error => console.error(error))

const nameDOM = document.getElementById('nameDOM');

// window.onload = async () => {
//   await updateFileName();
// }

function generateRandomName() {
  // Pick a random value for all of them
  try {
    let firstAdjective = capitalizeFirstLetter(adjectives[randomInt(0, adjectives.length)]);
    let secondAdjective = capitalizeFirstLetter(adjectives[randomInt(0, adjectives.length)]);
    let object = capitalizeFirstLetter(objects[randomInt(0, objects.length)]);

    // Return the [Adjective][Adjective][Object] string
    return `${firstAdjective}${secondAdjective}${object}`;

  } catch (error) {
    
  }
}

/* Turns the text file containing adjectives/objects into an array */
function textToArray(str) {
  return str.split("\n");
}

function randomInt(min, max) {
  return Math.floor((Math.random() * max) + min);
}

function capitalizeFirstLetter(str) {
  return str.charAt(0).toUpperCase() + str.slice(1);
}


function updateFileName() {
  fileName = generateRandomName();
  nameDOM.innerHTML = fileName;
}

generateRandomName();
