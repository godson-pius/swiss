
const wireForm = document.getElementById('wire')
const id = document.getElementById('user').value

wireForm.addEventListener('submit', (e) => {
    e.preventDefault()

    const form = new FormData(e.currentTarget)
    form.append("submit", "")

    let cot = prompt('COT is required! Kindly insert your COT code to facilitate your transfer')
    fetch(`api/make_transfer.php?cott=${cot}`).then(e => e).then(e => e.text()).then(e => {
        if (e == true) {
            // For imf
            let imf = prompt('IMF is required!')
            fetch(`api/make_transfer.php?imff=${imf}&id=${id}`).then(m => m).then(m => m.text()).then(m => {
                if (m == true) {
                    let otp = prompt('Enter OTP that was sent to your email!')
                    fetch(`api/make_transfer.php?otpp=${otp}&id=${id}`).then(o => o).then(o => o.text()).then(o => {
                        if (o == true) {
                            fetch('api/transfer.php', {
                                method: "post",
                                body: form
                            }).then(f => f).then(f => f.text()).then(f => {
                                if (f === "success") {
                                    alert('Transfer Successful');
                                } else if (f === "failed") {
                                    alert('Please check your form inputs and try again')
                                } else {
                                    alert(f)
                                }
                            })
                        } else {
                            alert('OTP is invalid')
                        }
                    })
                } else {
                    alert('IMF provided is invalid')
                }
            })
        } else {
            alert('COT provided is invalid! Please try again')
        }
    })

    Imf()



    


})

function OTP() {
    
}