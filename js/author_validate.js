//------------------------------------
// REGEX Expressions
//------------------------------------
const NAME_REGEX = /^[a-zA-Z-' ]*$/;

// URL REGEX Generated from https://regexr.com/39nr7
const URL_REGEX =
    /^(https?:\/\/)?([\da-z\.-]+\.[a-z\.]{2,6}|[\d\.]+)([\/:?=&#]{1}[\da-z\.-]+)*[\/\?]?$/im;

//------------------------------------
// Get input fields
//------------------------------------
let submitBtn = document.getElementById("submit_btn");
let firstNameInput = document.getElementById("first_name");
let lastNameInput = document.getElementById("last_name");
let authorLinkInput = document.getElementById("author_link");

//------------------------------------§
// Get error divs by id
//------------------------------------
let first_nameError = document.getElementById("first_name_error");
let last_nameError = document.getElementById("last_name_error");
let author_linkError = document.getElementById("author_link_error");

submitBtn.addEventListener("click", onSubmitForm);

let error = false;

// function isSelected(inputField) {
//     let selected = false;
//     for (let i = 0; i != inputField.length; i++) {
//         if (inputField[i].checked) {
//             selected = true;
//             break;
//         }
//     }
//     return selected;
// }

//------------------------------------
// Reset the value of the error messages and error flag
//------------------------------------
function resetValues() {
    error = false;
    first_nameError.innerHTML = "";
    last_nameError.innerHTML = "";
    author_linkError.innerHTML = "";
}

//------------------------------------
//select Error and error output
//------------------------------------
function inputErrors(errorVar, str) {
    errorVar.innerHTML = str;
    errorVar.style.color = "red";
    error = true;
}

function regexValid(regex, str) {
    return regex.test(str);
}

//------------------------------------
//check fields not empty on form submission
//------------------------------------
function onSubmitForm(event) {
    resetValues();

    // validate name
    if (firstNameInput.value == "") {
        inputErrors(first_nameError, "The first name field is required.");
    } else if (!regexValid(NAME_REGEX, firstNameInput.value)) {
        inputErrors(first_nameError, "Only letters or spaces are allowed.");
    }

    //validate address
    if (lastNameInput.value == "") {
        inputErrors(last_nameError, "The last name field is required.");
    } else if (!regexValid(NAME_REGEX, lastNameInput.value)) {
        inputErrors(last_nameError, "Only letters or spaces are allowed.");
    }

    //validate phone
    if (authorLinkInput.value == "") {
        inputErrors(author_linkError, "The author link is required");
    } else if (!regexValid(URL_REGEX, authorLinkInput.value)) {
        inputErrors(author_linkError, "URL should be in standard domain formats");
    }

    if (error) {
        event.preventDefault();
    }
}