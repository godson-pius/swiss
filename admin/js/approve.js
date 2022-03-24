const unapprove = (element) => {
    let id = element.dataset.id;

    fetch(`api/unapprove.php?id=${id}`).then(e => e).then(e => e.text()).then(e => {
        if (e == "true") {
            alert("Transaction Rejected!");
            element.parentElement.parentElement.remove();
        } else {
            alert("Error! Try again!");
        }
    })
}


const approve = (element) => {
    let userid = element.dataset.id;
    let tid = element.dataset.tid;
    let amount = element.dataset.amount;
    let to = element.dataset.acct;

    // console.log(userid);
    // console.log(tid);
    // console.log(amount);



    fetch(`api/approve.php?tid=${tid}&userid=${userid}&amount=${amount}&to=${to}`).then(e => e).then(e => e.text()).then(e => {
        if (e == "true") {
            alert("Transaction Approved!");
            element.parentElement.parentElement.remove();
        } else {
            alert("Error! Try again!");
        }
    })
}