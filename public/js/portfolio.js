$(document).ready(function() {
    $("#file").change(function() {
        $('#form').submit()
    });


})

function addPhoto(theItemPosiotion, theimagePosition) {
    let obj = [
        theItemPosiotion,
        theimagePosition
    ]
    the_position.value = JSON.stringify(obj)
    $('#file').click();
}

function saveInput(posotion, type, value) {

    let url = location.origin + '/addInput';
    axios({ method: 'post', url: url, data: { position: posotion, type: type, value: value } }).then(({ data }) => {


    })


}

function livedemo(data) {
    let url = location.origin + '/getAllDataPort/' + data;
    axios({ method: 'GET', url: url }).then(({ data }) => {
        if (data == null) {
            Swal.fire('Error', 'First Enter content or Photos :(', 'error')
        } else {
            let obj = JSON.parse(data)
            for (const [key, value] of Object.entries(obj)) {
                if (key.indexOf('des') != -1 || key.indexOf('title') != -1) {
                    document.querySelector(`.${key}`).textContent = value
                    document.querySelector(`.${key}`).style.display = 'inline-block'
                    document.querySelector(`#${key}`).style.display = 'none'
                }

            }
        }

    })
}

function resetAll(id) {

    let url = location.origin + '/deletePort/' + id;
    axios({ method: 'GET', url: url }).then(({ data }) => {
        location.reload();
    })
}