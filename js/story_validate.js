//------------------------------------
// REGEX Expressions
//------------------------------------

// Text REGEX from: https://stackoverflow.com/questions/10105584/regex-in-javascript-allow-only-letters-comma-and-punctuation
const TEXT_REGEX = /^[a-zA-Z]+(([\'\,\.\- ][a-zA-Z ])?[a-zA-Z]*)*$/;

// URL REGEX Generated from https://regexr.com/39nr7
const URL_REGEX =
    /^(https?:\/\/)?([\da-z\.-]+\.[a-z\.]{2,6}|[\d\.]+)([\/:?=&#]{1}[\da-z\.-]+)*[\/\?]?$/im;

//------------------------------------
// Get input fields
//------------------------------------
let submitBtn = document.getElementById("submit_btn");
let headlineInput = document.getElementById("headline");
let shortHeadlineInput = document.getElementById("short_headline");
let subtitleInput = document.getElementById("subtitle");
let articleInput = document.getElementById("article");
let summaryInput = document.getElementById("summary");
let dateInput = document.getElementById("date");
let timeInput = document.getElementById("time");
let genreInput = document.getElementById("genre");
let authorInput = document.getElementById("author");

//------------------------------------§
// Get error divs by id
//------------------------------------
let headlineError = document.getElementById("headline_error");
let shortHeadlineError = document.getElementById("short_headline_error");
let subtitleError = document.getElementById("subtitle_error");
let articleInputError = document.getElementById("article_error");
let summaryInputError = document.getElementById("summary_error");
let dateInputError = document.getElementById("date_error");
let timeInputError = document.getElementById("time_error");
let genreInputError = document.getElementById("genre_error");
let authorInputError = document.getElementById("author_error");

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
    headlineError.innerHTML = "";
    short_headlineError.innerHTML = "";
    subtitleError.innerHTML = "";
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

    // Validate headline
    if (headlineInput.value == "") {
        inputErrors(headlineError, "The first headline field is required.");
    } else if (!regexValid(NAME_REGEX, headlineInput.value)) {
        inputErrors(headlineError, "Only letters or spaces are allowed.");
    }

    //Validate short headline
    if (shortHeadlineInput.value == "") {
        inputErrors(
            shortHeadlineError,
            "The last short headline field is required."
        );
    } else if (!regexValid(NAME_REGEX, shortHeadlineInput.value)) {
        inputErrors(shortHeadlineError, "Only letters or spaces are allowed.");
    }

    //Validate subtitle
    if (subtitleInput.value == "") {
        inputErrors(subtitleError, "The subtitle is required");
    } else if (!regexValid(URL_REGEX, subtitleInput.value)) {
        inputErrors(subtitleError, "URL should be in standard domain formats");
    }

    if (error) {
        event.preventDefault();
    }
}