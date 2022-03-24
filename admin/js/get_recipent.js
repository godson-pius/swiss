function getRecipent() {
    let acc_number = document.getElementById('account_number').value;

    fetch(`api/get_recipent.php?recipent=${acc_number}`).then(e => e).then(e => e.text()).then(e => {
        document.getElementById('recipent_name').value = e;
        document.getElementById('make_transfer').style.display = "block";
    });
}