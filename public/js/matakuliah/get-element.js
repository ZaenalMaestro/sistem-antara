// get element by class name
function getClass(className) {
  return document.querySelector(`.${className}`)
}

// get all element by class name
function getAllClass(className) {
  return document.querySelectorAll(`.${className}`)
}

// get element by id name
function getId(idName) {
  return document.getElementById(idName)
}

// get element by tag name
function getTag(tagName) {
  return document.getElementsByTagName(tagName)
}