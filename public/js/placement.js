function addCv(){
  let file =  $('input[type=file]').val().replace(/C:\\fakepath\\/i, '')
    console.log(file)
}

function updateStatus(id,count){
  let url = location.origin + '/status'
    let status = document.getElementById(`statusSelect_${count}`).value
    if(status.length > 1){
        document.getElementById(`errorStatus_${count}`).innerText += 'you must choose valid status';
    }
    let message = document.getElementById(`statusMessage_${count}`).value ?? null;
    console.log(message)
    axios({method:'post',
        url:url,
        data:{
            id:id,
            status:status,
            message:message
        }
    }).then(({data})=>{
        const icon = document.getElementById(`statusIcon_${count}`)
       if(data == '0'){
           icon.classList = 'fas fa-times fa-2x'
           icon.parentNode.style.color  = 'rgba(240,20,60,0.7)'
       }else{
          icon.classList = 'fas fa-check fa-2x'
           icon.parentNode.style.color  = 'rgba(50,240,80,0.7)'

       }
        // document.getElementById(`dateOfInterview_${count}`).classList += 'text-pop-up-bottom ';
    })
}

function SaveTheDate(matchId,count){
  let url = location.origin + '/SaveTheDate'
  let date = document.getElementById(`dateOfInterview_${count}`).value;
axios({method:'post',
    url:url,
    data:{
     id:matchId,
     date:date
     }
}).then(({data})=>{
  document.getElementById(`dateOfInterview_${count}`).classList += 'text-pop-up-bottom ';
})
}
function setTextAreaToStudent(name,title,company,job_id,student_id,userSend,count){
    const message = `Hey ${name} The job you love ${title} from ${company} company is interested in continuing with you. Please contact the placement department , welcome:${userSend} `;
    let textArea = document.getElementById(`errorMessageToStudent_${count}`) ;
    textArea.innerText = message
    console.log(textArea)
}
function setTextAreaToEmployer(name,title,student,userSend,id,student_id,job_id,count){
    const message = ` Hi ${name} the student ${student}, who suited up for the job ${title}, also liked the job. contact me and move forward , welcome:${userSend}`;
    let textArea = document.getElementById(`errorMessageToEmployer_${count}`) ;
    textArea.innerText = message
    console.log(textArea)
}


function sendMessageToEmployer(id,student_id,job_id,count) {
    const message = document.getElementById(`errorMessageToEmployer_${count}`).value
            let url = location.origin + '/sendMessage';
            axios({
                method: 'post', url: url,
                data: {
                    message: message,
                    user_id: id,
                    job_id:job_id,
                    student_id: student_id
                }
            }).then(({data}) => {
                if (data.trim() == 'you dont sent more than one message to this match') {
                    Swal.fire({
                        title: 'error!',
                        text: `${data}!`,
                        icon: 'error'
                    })
                } else {
                    Swal.fire({title: 'Shortlisted!', text: `${data}!`, icon: 'success'});
                    location.reload()
                }
            });

}
function sendMessageToStudent(job_id,student_id,count) {
    const message = document.getElementById(`errorMessageToStudent_${count}`).value
    let url = location.origin + '/sendMessage';
            axios({
                method: 'post', url: url,
                data: {
                    message: message,
                    user_id: student_id,
                    job_id:job_id,
                    student_id: student_id
                }
            }).then(({data}) => {
                if (data.trim() == 'you dont sent more than one message to this match') {
                    Swal.fire({
                        title: 'error!',
                        text: `${data}!`,
                        icon: 'error'
                    })
                } else {
                    Swal.fire({title: 'message Send Successfully!', text: `${data}!`, icon: 'success'}).then(()=>{
                        location.reload()
                    });
                }
            });
}
function checkProfileAndGetCategory(id,div){
    let url = location.origin + '/getCategory'
   axios({method:'post',url:url,data:{id:id}}).then(({data})=>{
   document.getElementById(`category_id${div}`).innerText += data;
   })
}
function sendErrorMessage(id,count){
    let message = document.getElementById(`errorMessage_${count}`).value;
    let url = location.origin + '/sendMessage'
    axios({method:'post',url:url,data:{user_id:id,message:message}}).then(({data})=>{
        Swal.fire({title: 'your message send!', text: `${data}!`, icon: 'success', position: 'top'}).then(()=>{
            location.reload()
        });
    })
}
function confirm(id,elem) {
    let url = location.origin + '/confirm'
    axios({method:'post',url:url,data:{id:id,type:elem['type'],bool:elem['bool']}}).then(({data})=>{
        Swal.fire({title: ' confirmed success!', text: `${data}!`, icon: 'success', position: 'center'}).then(()=>{
            location.reload()
        });
    })
}
function editCourse(count){
    let id = document.getElementById(`idCourse${count}`).value;
    let inputEditCourse  = document.getElementById(`inputEditCourse_${count}`).value
    let url = location.origin + '/editCourse';
    axios({method:'post',url:url,data:{course:inputEditCourse,id:id}}).then(({data})=>{
        if(data == 'you must give min 2 characters' || data == 'something faild'){

            Swal.fire("Cancelled", `${data}`, "error");
        }else{
            Swal.fire({title: 'the course as been updated successfully', text: `${data}!`, icon: 'success', position: 'center'}).then(()=>{
                location.reload()
            });
        }

    })
}
function editCategory(count) {

    let id = count;
    let inputEditCategory  = document.getElementById(`inputEditCategory_${count}`).value
    let url = location.origin + '/editCategory';
    axios({method:'post',url:url,data:{category:inputEditCategory,id:id}}).then(({data})=>{
        if(data == 'you must give min 2 characters' || data == 'something faild'){
            Swal.fire("Cancelled", `${data}`, "error");
        }else{
            Swal.fire({title: 'the course as been updated successfully', text: `${data}!`, icon: 'success', position: 'center'}).then(()=>{
                location.reload()
            });
        }

    })

}
// `Are you sure delete ${name['coursename']}?`,
// if you delete ${name['coursename']} course all categories students and jobs from this course as been deleted also :( ! `,
function deleteCourse(id,name) {
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: `Are you sure delete ${name['coursename']}?`,
        text:  `if you delete ${name['coursename']} course all categories students and jobs from this course as been deleted also :( ! `,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            let url = location.origin + '/deleteCourse'
            axios({method:'delete',url:url,data:{id:id}}).then(({data})=>{
                // if(data === 'all as been deleted'){
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                location.reload()
                // }
            })
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            )
        }
    })
}
function addCategory(elem){
   let input =  document.createElement('input');
    input.setAttribute('type','text')
    input.placeholder = 'add Category...'
    input.style.marginTop = '1rem';
    input.classList = 'category'
    document.getElementById('parentCategories').appendChild(input)
}
function animatePluse() {
document.querySelector('.fa-plus-square').classList += 'wobble-hor-bottom';
}
function createNewCourse() {
    const err = document.querySelector('.errorMessage');
    err.textContent = '';
    const allCategories = document.querySelectorAll('.category');
    const categories = [];
     allCategories.forEach((category,key) => {
       if(category.value.length  > 1 ){
           categories[key] = category.value
       }
   })
    const courseName = document.getElementById('course');

    if(categories.length < 2 ){
        err.textContent = 'you must add minimum 2 categories'
    }else if(courseName.value.length < 2 ){
        err.textContent = 'you must add  2 characters to course name'
    }else{
        let url = location.origin + '/createCourse';
        let courseNameValue = document.getElementById('course').value;
        axios({method:'post',url:url,data:{course:courseNameValue,categories:categories}}).then(({data})=>{
         if(data === 'something faild'){
             Swal.fire("Error 500", "something faild please try again :(", "error");
         }else{
             Swal.fire("success Creating", "good job :)", "success").then(()=>{
                 location.reload();
             });
         }
        })
    }

}

function deleteCategory(id,name){
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: `Are you sure delete ${name}?`,
        text:  `if you delete ${name} category all  students and jobs from this category as been deleted also :( ! `,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            let url = location.origin + '/deleteCategory'
            axios({method:'delete',url:url,data:{id:id}}).then(({data})=>{
                // if(data === 'all as been deleted'){
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                )
                location.reload()
                // }
            })
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your category is safe :)',
                'error'
            )
        }
    })
}

