function getRecipent() {
    let acc_number = document.getElementById('account_number').value;
    let transfer_btn = document.getElementById('tbtn');

    

    if (acc_number == '') {
        document.getElementById('make_transfer').style.display = "block";
        document.getElementById('recipent_name').value = "Please specify an account number";
        transfer_btn.style.display = "none";
    } else {
        fetch(`api/get_recipent.php?recipent=${acc_number}`).then(e => e).then(e => e.text()).then(e => {
            if (e == "failed") {
                document.getElementById('make_transfer').style.display = "block";
                document.getElementById('recipent_name').value = "Failed to fetch user with the provided account number";
                transfer_btn.style.display = "none";
            } else {
                document.getElementById('recipent_name').value = e;
                transfer_btn.style.display = "block";
                document.getElementById('make_transfer').style.display = "block";
            }
        });
    }
}