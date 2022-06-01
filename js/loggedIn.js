let button = document.getElementById('btn');

window.onload = function getCookie() {

    console.log("hallo");

    button.addEventListener("click", goTo);

    if (document.cookie.match(/^(.*;)?\s*login\s*=\s*[^;]+(.*)?$/)) {
        button.innerText = "My Account";

    } else {
        console.log("no Cookie set")
    }


}

function goTo() {

    if (document.cookie.match(/^(.*;)?\s*login\s*=\s*[^;]+(.*)?$/)) {
        location.href = "account.php";
    } else {
        location.href = " registration.php";
    }

}