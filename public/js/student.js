function checkCategory(id) {
    Swal.fire({
        title: "to view more please fill Your profile?",
        text: "Choose Your SubCategroy...",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ok go To my Profile'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = `profile/${id}`;
        } else {
            Swal.fire("Cancelled", "Stay Here:)", "Warning");

        }
    });

}

function resetProfile(id) {
    var form = this;


    Swal.fire({
        title: "Are you sure to reset Your profile?",
        text: "You will not be able to recover this details!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            let url = location.origin + '/profile/reset';
            axios({
                method: 'delete',
                url: url,
                data: {
                    id: id,
                }
            }).then(({ data }) => {
                Swal.fire({
                    title: 'Shortlisted!',
                    text: 'Profile successfully initialized!',
                    icon: 'success'
                }).then(({ data }) => {
                    location.reload()
                });
            });
        } else {
            Swal.fire("Cancelled", "Your details is safe :)", "error");
        }
    });
}


function addLikeTojob(rilation, beloved, love) {
    var form = this;
    Swal.fire({
        title: "Are you sure you like this job?",
        text: "if you add like this is send to placement...",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'yes i like this job'
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
                    Swal.fire({
                        title: 'cancel!',
                        text: `${data}!`,
                        icon: 'error'
                    })
                } else {
                    Swal.fire({ title: 'success!', text: `${data}!`, icon: 'success' })
                }
            });
        } else {
            Swal.fire("Cancelled", "You dont send any like:)", "error");

        }
    });

}