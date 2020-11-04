window.onload = function() {
    $('#myModalMatch').modal('show');
    $('#myModalCv').modal('show');

    let id = document.getElementById('idToMessages').value;
    axios({ method: 'get', url: location.origin + `/getMessageCount/${id}` }).then(({ data }) => {
        document.getElementById('countMessage').innerText += data
    })

}


class Messages {
    confirmMessages(id, type) {
        let url = location.origin + '/confirmMessages';
        axios({ method: 'post', url: url, data: { id: id, type: type } }).then(({ data }) => {
            if (data === `your ${type} messages is confirm now`) {
                Swal.fire({
                    title: 'confirm!',
                    text: `${data}`,
                    icon: 'success'
                }).then(() => {
                    location.reload()
                });
            } else {
                Swal.fire({
                    title: 'error!',
                    text: `${data}!`,
                    icon: 'error'
                })
            }
        })
    }
    showMessages(id, type) {
        let url = location.origin + `/getMessage/${id}/${type}`;
        axios({ method: 'get', url: url }).then(({ data }) => {
            if (data === 'dont found any message') {
                Swal.fire({
                    title: 'error!',
                    text: `${data}!`,
                    icon: 'error'
                })
            } else {

                const parentMessages = document.getElementById(`body${type}`)
                let i = 0;
                data.forEach(message => {
                    i++
                    let p = document.createElement('p');
                    p.textContent = i + '- ' + message.message;
                    p.classList = 'border-bottom';
                    p.style.fontSize = '1.4rem'
                    parentMessages.appendChild(p)
                })

                $(`#myModal_${type}`).modal('show');
            }

        })

    }


}

function confirmMessages(id, type) {
    let confirmMessage = new Messages;
    confirmMessage.confirmMessages(id, type)
}

function showMessages(id, type) {
    let showMessage = new Messages;
    showMessage.showMessages(id, type)
}
