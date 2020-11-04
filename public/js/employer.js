function addLikeToStudent(rilation, beloved, love) {


    swal.fire({
        title: "Are you sure you like this Student?",
        text: "if you add like this is send to placement...",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, i like this student !'
    }).then((result) => {
        if (result.isConfirmed) {
            let url = location.origin + '/addLike';
            axios({
                method: 'post',
                url: url,
                data: {
                    beloved: beloved,
                    love: love,
                    rilation: rilation
                }
            }).then(({ data }) => {
                if (data.trim() == 'You dont can send more then 1 like') {
                    swal.fire({
                        title: 'Error!',
                        text: `${data}!`,
                        icon: 'error'
                    })
                } else {
                    swal.fire({ title: 'Great!', text: `${data}!`, icon: 'success' })
                    like = document.querySelector('.fa-thumbs-up')
                    like.style.color = 'red'
                    like.style.transform = 'rotate(15deg)';
                }
            });
        } else {
            swal.fire("Cancelled", "You dont send any like:)", "error");
        }
    });

}