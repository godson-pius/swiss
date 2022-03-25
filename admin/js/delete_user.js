const deleteUser = (element) => {
    let id = element.dataset.id;

    let conf = confirm("Are you sure you want to delete this user?")

    if (conf) {
        fetch(`api/delete_user.php?user_id=${id}`).then(e => e).then(e => e.text()).then(e => {
            if (e == "true") {
                element.parentElement.parentElement.parentElement.remove();
                alert("User Deleted!");
            } else {
                alert("Error! Try again!");
            }
        })
    }
}