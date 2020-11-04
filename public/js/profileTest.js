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

function addInputsEdu() {
    let input = document.createElement('input')
    input.classList += 'col-12 p-2 mb-2 field form__field edu';
    input.placeholder = 'add Education'
    document.querySelector('.educationsInputs').appendChild(input)
}

function addInputsLink() {
    let input = document.createElement('input')
    input.classList += 'col-12 field form__field link p-2 mb-2';
    input.placeholder = 'add project...'
    document.querySelector('.LinksInputs').appendChild(input)
}

function addInputsWorks() {
    let input = document.createElement('input')
    input.classList += 'col-12 field form__field work p-2 mb-2';
    input.placeholder = 'add work experience...'
    document.querySelector('.worksInputs').appendChild(input)
}

function addInputsSkill() {
    let input = document.createElement('input')
    input.classList += 'col-12 field form__field skill p-2 mb-2';
    input.placeholder = 'add skill...'
    document.querySelector('.SkillsInputs').appendChild(input)
}

function updateEducation(id) {
    let eduArr = []
    document.querySelectorAll('.edu').forEach(ed => {
        eduArr.push(ed.value)
    })
    let url = location.origin + '/profile/update';
    axios({
        method: 'post',
        url: url,
        data: {
            item: 'education',
            id: id,
            value: JSON.stringify(eduArr)
        }
    }).then(({ data }) => {
        location.reload();
    });

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
    document.querySelectorAll('.work').forEach(work => {
        worksArr.push(work.value)
    })
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