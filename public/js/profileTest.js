function updateCategory(id) {
    let url = location.origin + '/profile/update';
    let catId = document.getElementById('category_id').value;
    axios({
        method: 'post',
        url: url,
        data: {
            item: 'category_id',
            id: id,
            value: catId
        }
    }).then(({ data }) => {
        location.reload();
    });
}

function updateAboutMe(id) {
    let url = location.origin + '/profile/update';
    let aboutMe = document.getElementById('about_me').value;
    axios({
        method: 'post',
        url: url,
        data: {
            item: 'about_me',
            id: id,
            value: aboutMe
        }
    }).then(({ data }) => {
        location.reload();
    });
}

function addInputsEdu(event) {
    let url = location.origin + '/getInputsEdu';
    $(".educationsInputs").append($("<div>").load(`${url}`));
}

function addInputsLink() {
    let input = document.createElement('input')
    input.classList += 'col-12 field form__field link p-2 mb-2';
    input.placeholder = 'add project...'
    document.querySelector('.LinksInputs').appendChild(input)
}

function addInputsWorks() {
    let url = location.origin + '/getInputsWork';
    $(".worksInputs").append($("<div>").load(`${url}`));
}

function addInputsSkill() {
    let input = document.createElement('input')
    input.classList += 'col-12 field form__field skill p-2 mb-2';
    input.placeholder = 'add skill...'
    document.querySelector('.SkillsInputs').appendChild(input)
}

function updateEducation(id) {

    let educationArr = []
    let theAllInputs = document.querySelectorAll('.educationsInputs > div > .col-lg-12');
    let errorDate = false;
    theAllInputs.forEach(eduDiv => {
        let eduObj = {};
        let FieldStudy = $(eduDiv).find('input[type="text"]').val()
        let startYear = $(eduDiv).find('.start').find(":selected").text();
        let endYear = $(eduDiv).find('.end').find(":selected").text();
        eduObj['FieldStudy'] = FieldStudy
        eduObj['startYear'] = startYear
        eduObj['endYear'] = endYear
        educationArr.push(eduObj)
    })
    let allStart = document.querySelectorAll('#myModalEducation  .start');
    allStart.forEach(start => {
        console.log(start.value)
        if (start.style.border == '1px solid red' || start.value == 'Start Year') {
            document.getElementById('errorEdu').textContent = 'you have error in yout date input'
            errorDate = true
        }
    })
    console.log(errorDate)
    if (!errorDate) {
        let url = location.origin + '/profile/update';
        axios({
            method: 'post',
            url: url,
            data: {
                item: 'education',
                id: id,
                value: JSON.stringify(educationArr)
            }
        }).then(({ data }) => {
            location.reload();
        });

    }
}

function updateLinks(id) {
    let LinksArr = []
    document.querySelectorAll('.link').forEach(link => {
        LinksArr.push(link.value)
    })
    let url = location.origin + '/profile/update';
    axios({
        method: 'post',
        url: url,
        data: {
            item: 'links',
            id: id,
            value: JSON.stringify(LinksArr)
        }
    }).then(({ data }) => {
        location.reload();
    });

}

function updateWorks(id) {

    let worksArr = []
    let theAllInputs = document.querySelectorAll('.worksInputs > div > .col-lg-12');
    let errorDate = false;
    theAllInputs.forEach(workDiv => {
        let workObj = {};
        let theJob = $(workDiv).find('input[type="text"]').val()
        let startYear = $(workDiv).find('.start').find(":selected").text();
        let endYear = $(workDiv).find('.end').find(":selected").text();
        workObj['theJob'] = theJob
        workObj['startYear'] = startYear
        workObj['endYear'] = endYear
        worksArr.push(workObj)
    })
    let allStart = document.querySelectorAll('#myModalWorks  .start');

    allStart.forEach(start => {
        console.log(start.value)
        if (start.style.border == '1px solid red' || start.value == 'Start Year') {
            document.getElementById('errorWork').textContent = 'you have an error in your date inputs'
            errorDate = true
        }
    })

    if (!errorDate) {
        let url = location.origin + '/profile/update';
        axios({
            method: 'post',
            url: url,
            data: {
                item: 'work_experience',
                id: id,
                value: JSON.stringify(worksArr)
            }
        }).then(({ data }) => {
            location.reload();
        });

    }
}

function updateSkills(id) {
    let skillsArr = []
    document.querySelectorAll('.skill').forEach(skill => {
        skillsArr.push(skill.value)
    })
    let url = location.origin + '/profile/update';
    axios({
        method: 'post',
        url: url,
        data: {
            item: 'my_skills',
            id: id,
            value: JSON.stringify(skillsArr)
        }
    }).then(({ data }) => {
        location.reload();
    });
}




function checkPassword(password) {
    if (new_password.value == password.value) {
        password.style.backgroundColor = 'rgba(0,255,0,.3)'
    } else {
        password.style.backgroundColor = 'rgba(255,0,0,.3)'
    }
}



function checkTheStart(elem) {
    let theStart = JSON.parse($(elem.parentNode).find('.start').find(':selected').text());
    let theEnd = JSON.parse(elem.value)
    if (theStart > theEnd) {
        $(elem.parentNode).find('.start').css("border", "1px solid red");
    } else {
        $(elem.parentNode).find('.start').css("border", "1px solid black");
    }
}

function checkTheEnd(elem) {
    let theEnd = JSON.parse($(elem.parentNode).find('.end').find(':selected').text());
    if (theEnd) {
        let theStart = JSON.parse(elem.value)
        if (theStart < theEnd || theEnd == theStart) {
            $(elem).css("border", "1px solid black");
            $(`#error${elem.dataset.selector}`).empty()
        } else {
            $(elem).css("border", "1px solid red");
        }
    }


}