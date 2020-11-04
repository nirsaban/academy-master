//class that update data
class Profile {

    editDom(data) {
        if (data['col'] == 'category_id') {
            let select = document.querySelector('.cat');
            select.style.display = 'block';
        } else if (data['col'] == 'about_me') {
            $(editAbout).prop("onclick", null).off("click");
            let parentAbout = document.getElementById('aboutParent')
            let pAbout = document.querySelector('.aboutMe');
            let ValpAbout = pAbout.textContent;
            pAbout.style.display = 'none';
            let inputAbout = document.createElement('TEXTAREA');
            inputAbout.setAttribute('type', 'text');
            inputAbout.setAttribute('id', 'inputAbout');
            inputAbout.setAttribute('class', 'textArea');
            inputAbout.setAttribute('rows', '4');
            inputAbout.value = ValpAbout;
            console.log(pAbout)
            parentAbout.appendChild(inputAbout)
            inputAbout.addEventListener('focusout', () => {
                let up = document.querySelector('.updateAbout');
                up.id = 'rotate-scale-up-diag-1'
            })

        } else if (data['col'] == 'education') {
            $(editEd).prop("onclick", null).off("click");
            editEd.removeAttribute('onclick');
            const parentEducation = document.querySelector('.educationParent')
            let plusEdu = document.createElement('button');
            let plusAllEdu = document.createElement('button')
            plusEdu.innerText = '+ '
            plusEdu.classList = ' plusEdu  buttonNew-change  thirdNew col-xs-1';
            plusAllEdu.innerText = 'V'
            plusAllEdu.classList = ' plusEduAll  buttonNew-change thirdNew col-xs-1 '
            plusAllEdu.style.color = 'red';
            parentEducation.appendChild(plusEdu)
            parentEducation.appendChild(plusAllEdu)
            let allEdu = document.querySelectorAll('.pEdu');
            pEdu.style.display = 'none';
            allEdu.forEach(edu => {
                let inputEdu = document.createElement('input');
                inputEdu.setAttribute('type', 'text')
                inputEdu.classList = 'eduInput  col-6 field form__field';

                inputEdu.setAttribute('value', edu.textContent)
                parentEducation.appendChild(inputEdu)
            })
            plusEdu.addEventListener('click', () => {
                let inputEducation = document.createElement('input');
                inputEducation.setAttribute('type', 'text');
                inputEducation.classList = 'eduInput  col-6 field  form__field'
                inputEducation.placeholder = 'add new education'
                parentEducation.appendChild(inputEducation)
            })
            const arrEd = []
            plusAllEdu.addEventListener('click', () => {
                document.querySelectorAll('.eduInput').forEach(edu => {
                    arrEd.push(edu.value)
                });

                let jsonValue = JSON.stringify(arrEd);
                let inputHidden = document.createElement('input');
                inputHidden.setAttribute('type', 'hidden');
                inputHidden.classList = 'inputEdHidden';
                inputHidden.value = jsonValue;
                parentEducation.appendChild(inputHidden)
                plusEdu.disabled = true;
                let up = document.querySelector('.updateEd');
                up.id = 'rotate-scale-up-diag-1'
            })

        } else if (data['col'] == 'work_experience') {
            $(editEx).prop("onclick", null).off("click");
            editEx.removeAttribute('onclick');
            const parentExperience = document.querySelector('.ExperienceParent')
            let plusEx = document.createElement('button');
            let plusAllEx = document.createElement('button')
            plusEx.innerText = '+'
            plusEx.classList = 'plusEx buttonNew-change  thirdNew col-sm-1';
            plusAllEx.innerText = 'V'
            plusAllEx.classList = ' plusExAll buttonNew-change text-danger thirdNew col-sm-1'
            parentExperience.appendChild(plusEx)
            parentExperience.appendChild(plusAllEx)
            let allEx = document.querySelectorAll('.pEx')
            pEx.style.display = 'none';
            allEx.forEach(ex => {
                let inputEx = document.createElement('input');
                inputEx.setAttribute('type', 'text')
                inputEx.classList = 'exInput field  form__field col-4';

                inputEx.setAttribute('value', ex.textContent)
                parentExperience.appendChild(inputEx)
            })
            plusEx.addEventListener('click', () => {
                let inputEx = document.createElement('input');
                inputEx.setAttribute('type', 'text');
                inputEx.classList = 'exInput field  form__field col-4'
                inputEx.placeholder = ' Add new work'
                parentExperience.appendChild(inputEx)
            })
            const arrEx = []
            plusAllEx.addEventListener('click', () => {
                document.querySelectorAll('.exInput').forEach(ex => {
                    arrEx.push(ex.value)
                });
                let jsonValue = JSON.stringify(arrEx);
                let inputHidden = document.createElement('input');
                inputHidden.setAttribute('type', 'hidden');
                inputHidden.classList = 'inputExHidden';
                inputHidden.value = jsonValue;
                parentExperience.appendChild(inputHidden)
                plusEx.disabled = true;
                let up = document.querySelector('.updateEx');
                up.id = 'rotate-scale-up-diag-1'
            })

        } else if (data['col'] == 'my_skills') {
            editSk.removeAttribute('onclick');
            const parentSkills = document.querySelector('.skillsParent');
            let plusSkill = document.createElement("button");
            plusSkill.innerHTML += '+';
            plusSkill.classList = 'buttonNew-change  thirdNew'
            let plusSkillAll = document.createElement("button");
            plusSkillAll.innerHTML += 'V';
            plusSkillAll.classList = 'buttonNew-change  thirdNew'
            plusSkillAll.style.color = 'red';
            parentSkills.appendChild(plusSkill);
            parentSkills.appendChild(plusSkillAll);

            plusSkill.addEventListener('click', () => {
                let inputSkills = document.createElement('input');
                inputSkills.setAttribute('type', 'text');
                inputSkills.classList = 'skillsInput field  form__field col-md-3'
                inputSkills.placeholder = "add skill..";
                parentSkills.appendChild(inputSkills);
            })
            let allSkills = document.querySelectorAll('.tags')
            spansSkills.style.display = 'none';
            allSkills.forEach(skill => {
                let inputSkill = document.createElement('input');
                inputSkill.setAttribute('type', 'text')

                inputSkill.classList = 'skillsInput field  form__field col-md-3';
                inputSkill.setAttribute('value', skill.textContent)
                parentSkills.appendChild(inputSkill)
            })
            const arrSk = []
            plusSkillAll.addEventListener('click', () => {
                plusSkill.disabled = true;
                plusSkillAll.disabled = true;
                let allInputSkills = document.querySelectorAll('.skillsInput');
                allInputSkills.forEach(inputSkill => {
                    arrSk.push(inputSkill.value)
                })
                let jsonValue = JSON.stringify(arrSk);
                let inputHidden = document.createElement('input');
                inputHidden.setAttribute('type', 'hidden');
                inputHidden.classList = 'inputSkHidden';
                inputHidden.value = jsonValue;
                parentSkills.appendChild(inputHidden)
                let up = document.querySelector('.updateSk');
                up.id = 'rotate-scale-up-diag-1'
            })
        } else if (data['col'] == 'links') {
            pLink.style.display = 'none';
            $(editLi).prop("onclick", null).off("click");
            const parentLinks = document.querySelector('.linksParent')
            let plusLinks = document.createElement('button');
            let plusAllLinks = document.createElement('button')
            plusLinks.innerText = '+ '
            plusLinks.classList = ' buttonNew-change  thirdNew col-sm-1'
            plusAllLinks.innerText = 'V'
            plusAllLinks.classList = 'buttonNew-change text-danger thirdNew col-sm-1'
            parentLinks.appendChild(plusLinks)
            parentLinks.appendChild(plusAllLinks)
            let allLinks = document.querySelectorAll('.linksA')
            allLinks.forEach(link => {
                console.log(link)
                let inputlink = document.createElement('input');
                inputlink.setAttribute('type', 'text')
                inputlink.classList = 'linkInput col-6 field form__field';
                inputlink.setAttribute('value', link.textContent)
                parentLinks.appendChild(inputlink)
            })
            plusLinks.addEventListener('click', () => {
                let inputLinks = document.createElement('input');
                inputLinks.setAttribute('type', 'text');
                inputLinks.classList = 'linkInput col-6 field form__field'
                inputLinks.placeholder = ' add your project link'
                parentLinks.appendChild(inputLinks)
            })
            const arrLi = []
            plusAllLinks.addEventListener('click', () => {
                document.querySelectorAll('.linkInput').forEach(link => {
                    arrLi.push(link.value)
                });

                let jsonValue = JSON.stringify(arrLi);
                let inputHidden = document.createElement('input');
                inputHidden.setAttribute('type', 'hidden');
                inputHidden.classList = 'inputLiHidden';
                inputHidden.value = jsonValue;
                parentLinks.appendChild(inputHidden)
                plusLinks.disabled = true;
                let up = document.querySelector('.updateLi');
                up.id = 'rotate-scale-up-diag-1'
            })
        }
    }
    takeValue(data) {
        const id = parseInt(data['id'])
        const item = data['col']
        if (data['col'] == 'category_id') {
            let valueF = document.querySelector('.cat').value;
            let value = parseInt(valueF)
            this.update(id, item, value)
        } else if (data['col'] == 'about_me') {
            let value = document.querySelector('#inputAbout').value;
            this.update(id, item, value)
        } else if (data['col'] == 'education') {
            let value = document.querySelector('.inputEdHidden').value;
            this.update(id, item, value)
        } else if (data['col'] == 'work_experience') {
            let value = document.querySelector('.inputExHidden').value;
            this.update(id, item, value)
        } else if (data['col'] == 'my_skills') {
            let value = document.querySelector('.inputSkHidden').value;
            this.update(id, item, value)
        } else if (data['col'] == 'links') {
            let value = document.querySelector('.inputLiHidden').value;
            this.update(id, item, value)
        }
    }

    update(id, item, value) {
        let url = location.origin + '/profile/update';
        axios({
            method: 'post',
            url: url,
            data: {
                item: item,
                id: id,
                value: value
            }
        }).then(({ data }) => {
            location.reload()
        });
    }
}
//the global object from class
const profile = new Profile;

function edit(data) {
    profile.editDom(data);
}

function update(data) {
    profile.takeValue(data);
}

$(document).ready(function() {
    // let id  = document.getElementById('idToMessages').value;
    // axios({method:'get',url:location.origin+ `/getMessageCount/${id}`}).then(({data})=>{
    //     document.getElementById('countMessage').innerText += data
    // })
    // $('#myModalMatch').modal('show');
    // $('#myModalCv').modal('show');

    function present(PRESENT) {
        let count = []
        for (const [key, value] of Object.entries(PRESENT)) {
            count.push(key)
            console.log(count);
            let div = document.querySelector(`.${key}`);
            let color = $(div).data("color");
            $(div).css("background", color)
            div.style.transition = 'background 0.5s ease-in-out'
                // if(div.style.background != '#fff'){
                //     div.style.order = 1
                // };
        }
        let presentNum = Math.ceil(count.length * 14 + 2)
        let presentDiv = document.querySelector('.present');
        presentDiv.innerHTML = presentNum + '% ';
        let r = 156 - (count.length * 4);
        let g = 233 - (count.length * 2);
        let b = 125 - (count.length * 6);
        let colorPresentDiv = "rgba(" + r + "," + g + "," + b + "," + (count.length + 2) / 10 + ")";
        console.log(colorPresentDiv)
        $(presentDiv).css("background", colorPresentDiv)

        if (presentNum == 100) {
            swal({
                position: 'top-center',
                icon: 'success',
                title: 'Your profile has been completed... Now find Job!',
                showConfirmButton: false,
                timer: 3000
            })
        }
    }

    present(PRESENT)

})
