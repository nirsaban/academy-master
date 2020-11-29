window.onload = function init() {

}

function addRequire() {
    document.getElementById('disabled').style.display = 'block'
    let inputsParent = document.getElementById('requirementsAll');
    let input = document.createElement('input');
    input.setAttribute('type', 'text');
    input.classList = 'form-control text-capitalize require';
    input.placeholder = 'add more require...'
    inputsParent.appendChild(input)

}

// trickCat.value = parseInt(localStorage.getItem('category_id'))
// if (localStorage.getItem('requirements') != null) {
//     trickReq.value = localStorage.getItem('requirements').replace('requirements- ', '')
// }
// let optionsArr = courseRegister.options;
// for (const [key, option] of Object.entries(optionsArr)) {
//     if (option.text === localStorage.getItem('mainTitle')) {
//         courseRegister.value = option.value
//     }
// }

//     for (const [key, value] of Object.entries(localStorage)) {
//         if (key === 'requirements') {
//             document.getElementById('disabled').style.display = 'block';
//             const inputsParent = document.getElementById('requirementsAll');
//             let strRe = 'requirements- ';
//             const rep = value.replace(strRe, '')
//             const reqArr = JSON.parse(rep);
//             document.getElementById('requirements').innerHTML += strRe;
//             document.getElementById('reqIn').value = reqArr[0];
//             for (let i = 1; i < reqArr.length; i++) {
//                 let input = document.createElement('input');
//                 input.setAttribute('type', 'text');
//                 input.classList = 'require';
//                 input.value = reqArr[i];
//                 inputsParent.appendChild(input)
//             }
//             reqArr.forEach(req => {
//                 let pr = document.getElementById(key);
//                 let li = document.createElement('li')
//                 li.textContent = req;
//                 pr.appendChild(li)
//             })
//         } else if (key === 'category_id') {
//             continue
//         } else {
//             document.getElementById(key).innerHTML = value;
//             let form = document.forms[1];
//             let newValue = value.replace(key + '-', "");
//             if (key === 'description') {
//                 document.querySelector('.description ').innerText = newValue;
//             } else if (key === 'mainTitle' || key === 'subTitle') {
//                 continue;
//             } else {
//                 let selectElement = form.querySelector(`input[name=${key}]`);
//                 selectElement.value = newValue;

//             }
//         }
//     }
//     if (courseRegister.value !== 'main subject') {
//         let url = location.origin + '/courseId'
//         axios({
//             method: 'post',
//             url: url,
//             data: {
//                 id: courseRegister.value,
//             }
//         }).then(({ data }) => {
//             let selcetSub = document.getElementById('sub&main');
//             selcetSub.innerHTML += data;
//             for (const [key, option] of Object.entries(optionsArr)) {
//                 if (option.text === mainTitle.textContent) {
//                     courseRegister.value = option.value
//                 }
//             }
//         });
//     }
// }

// function onChangeCourse(data) {
//     //על מנת למנוע מהיוסר ליצור סתם סלקשיין
//     if (mainTitle.textContent === data.options[data.selectedIndex].text) {
//         return

//     } else if (mainTitle.textContent !== data.options[data.selectedIndex].text && mainTitle.textContent.length > 2 && subTitle.textContent.length < 1) {
//         subSelect.parentNode.removeChild(subSelect);
//         localStorage.setItem('mainTitle', data.options[data.selectedIndex].text)
//         mainTitle.innerHTML = data.options[data.selectedIndex].text;
//         let url = location.origin + '/courseId'
//         axios({
//             method: 'post',
//             url: url,
//             data: {
//                 id: data.value,
//             }
//         }).then(({ data }) => {

//             let selcetSub = document.getElementById('sub&main');
//             selcetSub.innerHTML += data;
//             // console.log(document.getElementById('subSelect'))
//             let optionsArr = courseRegister.options;
//             for (const [key, option] of Object.entries(optionsArr)) {
//                 if (option.text === mainTitle.textContent) {
//                     courseRegister.value = option.value

//                 }
//             }
//         });
//     } //במצב שכבר בחרנו קורס וקטגוריה ואנחנו רוצים לשנות
//     else if (mainTitle.textContent.length > 0 && mainTitle.textContent !== data.options[data.selectedIndex].text && subTitle.textContent.length > 0) {
//         subSelect.parentNode.removeChild(subSelect);
//         subTitle.textContent = ''
//         localStorage.clear('subTitle')
//         localStorage.setItem('mainTitle', data.options[data.selectedIndex].text)
//         mainTitle.innerHTML = data.options[data.selectedIndex].text;
//         let optionsArr = courseRegister.options;
//         let url = location.origin + '/courseId'
//         axios({
//             method: 'post',
//             url: url,
//             data: {
//                 id: data.value,
//             }
//         }).then(({ data }) => {
//             let selcetSub = document.getElementById('sub&main');
//             selcetSub.innerHTML += data;
//             for (const [key, option] of Object.entries(optionsArr)) {
//                 if (option.text === mainTitle.textContent) {
//                     courseRegister.value = option.value

//                 }
//             }
//         });
//     } else {
//         localStorage.setItem('mainTitle', data.options[data.selectedIndex].text)
//         mainTitle.innerHTML = data.options[data.selectedIndex].text;
//         let url = location.origin + '/courseId'
//         axios({
//             method: 'post',
//             url: url,
//             data: {
//                 id: data.value,
//             }
//         }).then(({ data }) => {

//             let selcetSub = document.getElementById('sub&main');
//             selcetSub.innerHTML += data;
//             // console.log(document.getElementById('subSelect'))
//             let optionsArr = courseRegister.options;
//             for (const [key, option] of Object.entries(optionsArr)) {
//                 if (option.text === mainTitle.textContent) {
//                     courseRegister.value = option.value

//                 }
//             }
//         });
//     }
// }

function onChangeCourse(data) {
    //על מנת למנוע מהיוסר ליצור סתם סלקשיין

    let url = location.origin + '/courseId'
    axios({
        method: 'post',
        url: url,
        data: {
            id: data.value,
        }
    }).then(({ data }) => {

        let selcetSub = document.getElementById('subSelect');
        selcetSub.innerHTML = data
    });

}


function saveAllRequire(button) {
    disabledPlus.style.display = 'none'
    button.style.cursor = 'not-allowed'
    button.style.opacity = '0.6';
    const reqArr = []
    let allRequire = document.querySelectorAll('.require');
    allRequire.forEach(inputRequire => {
        inputRequire.style.color = 'rgba(131, 125, 125, 0.24)';
        inputRequire.disabled = true
        reqArr.push(inputRequire.value)
    })
    let jsonValue = JSON.stringify(reqArr);
    trickReq.value = jsonValue
        // let requireDiv = document.getElementById('requirements');

    // requireDiv.innerHTML += 'requirements - ' + '<br>'

    // reqArr.forEach(req => {
    //     if (req.length >= 3) {
    //         requireDiv.innerHTML += '<li>' + req + '</li>';
    //     }
    // })
    // localStorage.setItem('requirements', 'requirements- ' + jsonValue);
}
// Jquery Dependency

$("input[data-type='currency']").on({
    keyup: function() {
        formatCurrency($(this));
    },
    blur: function() {
        formatCurrency($(this), "blur");
    }
});


function formatNumber(n) {
    // format number 1000000 to 1,234,567
    return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
}


function formatCurrency(input, blur) {
    var input_val = input.val();
    if (input_val === "") { return; }
    var original_len = input_val.length;
    var caret_pos = input.prop("selectionStart");
    if (input_val.indexOf(".") >= 0) {
        var decimal_pos = input_val.indexOf(".");
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);
        left_side = formatNumber(left_side);
        right_side = formatNumber(right_side);

        if (blur === "blur") {
            right_side += "00";
        }

        right_side = right_side.substring(0, 2);

        input_val = "₪" + left_side + "." + right_side;
    } else {

        input_val = formatNumber(input_val);
        input_val = "₪" + input_val;
        if (blur === "blur") {
            input_val += ".00";
        }
    }

    input.val(input_val);
    var updated_len = input_val.length;
    caret_pos = updated_len - original_len + caret_pos;
    input[0].setSelectionRange(caret_pos, caret_pos);
}




function resetForm() {
    location.reload()
    localStorage.clear()
}