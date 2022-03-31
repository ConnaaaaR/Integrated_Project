//------------------------------------
// REGEX Expressions
//------------------------------------

// Self made Regex, probably sucks. Regular expressions are confusing. This took like 2 hours
// because of The Guardian using special punctuation -_-
// probably will use str.replace() in the future, and just replace the problematic symbols.
const TEXT_REGEX = /^[a-zA-Z0-9áéí'‘’%.;:,!?"“”\-\/[\]()\… 	—\r\n€£$–]*$/;

// Date REGEX from https://stackoverflow.com/questions/22061723/regex-date-validation-for-yyyy-mm-dd
const DATE_REGEX = /^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/;

// Time REGEX from https://stackoverflow.com/questions/43038769/regex-for-24-hour-time
const TIME_REGEX = /^([01][0-9]|2[0-3]):([0-5][0-9])$/;

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
    shortHeadlineError.innerHTML = "";
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
        inputErrors(headlineError, "The headline field is required.");
    } else if (!regexValid(TEXT_REGEX, headlineInput.value)) {
        inputErrors(
            headlineError,
            "Only letters, spaces and common punctuation are allowed."
        );
    }

    //Validate short headline
    if (shortHeadlineInput.value == "") {
        inputErrors(shortHeadlineError, "The short headline field is required.");
    } else if (!regexValid(TEXT_REGEX, shortHeadlineInput.value)) {
        inputErrors(
            shortHeadlineError,
            "Only letters, spaces and common punctuation are allowed."
        );
    }

    //Validate subtitle
    if (subtitleInput.value == "") {
        inputErrors(subtitleError, "The subtitle is required");
    } else if (!regexValid(TEXT_REGEX, subtitleInput.value)) {
        inputErrors(
            subtitleError,
            "Only letters, spaces and common punctuation are allowed."
        );
    }

    //Validate article
    if (articleInput.value == "") {
        inputErrors(articleInputError, "The article is required");
    } else if (!regexValid(TEXT_REGEX, articleInput.value)) {
        inputErrors(
            // This doesn't work for some unknown reason, i suspect it is due to the element being a textarea??
            articleInputError,
            "Only letters, spaces and common punctuation are allowed."
        );
    }

    //Validate summary
    if (summaryInput.value == "") {
        inputErrors(summaryInputError, "The summary is required");
    } else if (!regexValid(TEXT_REGEX, summaryInput.value)) {
        inputErrors(
            summaryInputError,
            "Only letters, spaces and common punctuation are allowed."
        );
    }

    //Validate date
    if (dateInput.value == "") {
        inputErrors(dateInputError, "The date is required");
    } else if (!regexValid(DATE_REGEX, dateInput.value)) {
        inputErrors(dateInputError, "Incorrect Date Format! YYYY-MM-DD");
    }

    //Validate time
    if (timeInput.value == "") {
        inputErrors(timeInputError, "The time is required");
    } else if (!regexValid(TIME_REGEX, timeInput.value)) {
        inputErrors(timeInputError, "Incorrect Time Format! HH:MM (24Hr)");
    }

    if (error) {
        event.preventDefault();
    }
}