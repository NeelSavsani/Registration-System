//go to step 2
function goToStep2(){
    const login_email = document.getElementById("login_email").value;

    if(login_email.trim() !== "")
    {
        document.getElementById("step1").style.display = "none";
        document.getElementById("step2").style.display = "block";
    }
    else
    {
        alert("Please enter your email Id");
        login_email.focus();
    }
}

//go to step 1
function goToStep1(){
    document.getElementById("step1").style.display = "block";
    document.getElementById("step2").style.display = "none";
}

//hit enter key to go to step 2
document.getElementById("login_email").addEventListener("keypress", function(event) {
    if(event.key === "Enter")
    {
        event.preventDefault();
        goToStep2();
    }
})
