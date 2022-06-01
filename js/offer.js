window.onload = function showFlight() {

    console.log("show flight");

    let flightObject = JSON.parse(sessionStorage.getItem("flightOffer"));

    let wrapper = document.getElementById("wrapper");


    wrapper.innerHTML += ` 


<div class="offer">


    <div class="flight-from-to">
        <div class="left-fight-from-to">
            <div class="left-fight-from-to-top">
                <p id="from">${flightObject.loc} </p>
                <p> - </p>
                <p id="to">${flightObject.des} </p>
            </div>
            <p id="description">Hin- und Rückflug, ${flightObject.persons} Reisende/r</p>
        </div>

        <div class="right-fight-from-to">
            <div class="share">
                <i class="fa-solid fa-share"></i>
            </div>
            <div class="save">
                <i class="fa-solid fa-heart" id="favourize" onClick="favourize()"></i>
            </div>

        </div>
    </div>

    <div class="flight-info">

        <div class="flight-info-left">


            <div class="left-item-1">

                <img src="img/logo.svg.png" width="50%">

            </div>

            <div class="left-item-2">

                <p class="date-info">
                ${flightObject.date}                
                </p>

                <p class="day-info">
                    SA.
                </p>

            </div>

            <div class="left-item-3">

                <p class="date-info">
                    21:20 - 22: 30
                </p>

                <p class="day-info">
                ${flightObject.airline[0]} 
                </p>

            </div>

        </div>

        <div class="flight-info-right">

            <div class="right-item-1">

            </div>

            <div class="right-item-2">
                <div class="time">
                    1:10 Std.
                </div>
                <div class="city-codes">
                    <div class="city-code-left">
                    ${flightObject.loc}
                    </div>
                    <p style="display: flex; justify-content:center; align-items:center;">-</p>
                    <div class="city-code-right">
                    ${flightObject.des}

                    </div>
                </div>
            </div>

            <div class="right-item-3">

            </div>
        </div>

    </div>

    <div class="info-booking">

    </div>

    <div class="book-flight">

        <div class="left-logo">

        </div>

        <div class="right-book">
            <div class="book-price">
                €  ${flightObject.totalPrice}
            </div>
            <div class="book-book-btn">
                <button onClick="sold()">book</button>
            </div>
        </div>

    </div>



</div>

`;



}


function favourize() {

    console.log("favourize");

    let object = JSON.parse(sessionStorage.getItem("flightOffer"));


    console.log(JSON.stringify(object));

    fetch("save.php?data=" + JSON.stringify(object))
        .then(response => {
            return response.json();
        })
        .then(data => {
            console.log(data)
        })
        .catch(error => {
            console.log(error);
        });

}


function sold() {

    location.href = "sold.php";
}