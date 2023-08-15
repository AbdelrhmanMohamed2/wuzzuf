const submit = document.getElementById('submit-btn');
const form = document.getElementById('form');

const skillInput = document.getElementById('skillInput');
const addSkillBtn = document.getElementById('addSkillBtn');
const skillList = document.getElementById('skillList');

const languageInput = document.getElementById('languageInput');
const addLanguageBtn = document.getElementById('addLanguageBtn');
const languageList = document.getElementById('languageList');

const skillsInput = document.createElement('input');
skillsInput.type = 'hidden';
skillsInput.name = 'skills';

const languagesInput = document.createElement('input');
languagesInput.type = 'hidden';
languagesInput.name = 'languages';

let skills = [];
let languages = [];

//  Handle Skills
function makeSkillsList() {
    let list_of_li = skills.map((s) => `<li class="list-group-item">${s} <i class="fa-solid fa-trash text-danger skill" id="${s}"></i></li>`).join("");
    skillList.innerHTML = "";
    skillList.innerHTML = list_of_li;
}

skillList.addEventListener("click", function (e) {
    if (e.target.classList.contains('fa-trash')) {
        newSkillsArray = skills.filter((skill) => skill !== e.target.id);
        skills = newSkillsArray;
        makeSkillsList();
    }
});

function addSkill() {
    const skill = skillInput.value.trim();
    if (skill !== "" && !skills.includes(skill)) {

        skills.push(skill);
        makeSkillsList();

        skillInput.value = "";
    }
}

addSkillBtn.addEventListener('click', addSkill);
// #################################

// Handle Languages
function makeLanguagesList() {
    let list_of_li = languages.map((lang) => `<li class="list-group-item">${lang} <i class="fa-solid fa-trash text-danger language" id="${lang}"></i></li>`).join("");
    languageList.innerHTML = "";
    languageList.innerHTML = list_of_li;
}

function addLanguage() {
    const language = languageInput.value.trim();
    if (language !== "" && !languages.includes(language)) {
        languages.push(language);

        makeLanguagesList();

        languageInput.value = "";
    }
}

languageList.addEventListener('click', function (e) {
    if (e.target.classList.contains('fa-trash')) {
        newLanguageArray = languages.filter((language) => language !== e.target.id);
        languages = newLanguageArray;
        makeLanguagesList();
    }
});

addLanguageBtn.addEventListener('click', addLanguage);
// #################################


submit.addEventListener('click', () => {
    const skillItems = skillList.getElementsByClassName('list-group-item');
    const skillsArray = Array.from(skillItems).map(item => item.textContent);

    const languageItems = languageList.getElementsByClassName('list-group-item');
    const languagesArray = Array.from(languageItems).map(item => item.textContent);

    skillsInput.value = JSON.stringify(skillsArray);
    languagesInput.value = JSON.stringify(languagesArray);

    form.appendChild(skillsInput);
    form.appendChild(languagesInput);

    form.submit();
});


window.onload = function() {
    const skillElements = document.querySelectorAll(".skill");
    skillElements.forEach(function(element) {
        skills.push(element.id);
    });

    const languageElements = document.querySelectorAll(".language");
    languageElements.forEach(function(element) {
        languages.push(element.id);
    });
};
