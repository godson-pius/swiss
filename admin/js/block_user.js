const blockUser = (element) => {
    let id = element.dataset.id;

    let conf = confirm("Are you sure you want to block user?")

    if (conf) {
        fetch(`api/block_user.php?user_id=${id}`).then(e => e).then(e => e.text()).then(e => {
            if (e == "true") {
                alert("User Blocked!");
                element.innerText = "Unblock User";
                element.className="bg-warning p-2 shadow rounded text-light";
            } else {
                alert("Error! Try again!");
            }
        })
    }
}


const unblockUser = (element) => {
    let id = element.dataset.id;

    let conf = confirm("Are you sure you want to unblock user?")

    if (conf) {
        fetch(`api/unblock_user.php?user_id=${id}`).then(e => e).then(e => e.text()).then(e => {
            if (e == "true") {
                alert("User have been unblocked!");
                element.innerText = "Block User";
                element.className="bg-secondary p-2 shadow rounded text-light";
            } else {
                alert("Error! Try again!");
            }
        })
    }
}