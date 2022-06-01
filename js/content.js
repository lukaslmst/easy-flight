window.onload = function generateContent() {


    console.log("generate content...")

    let content = document.getElementsByClassName('content');
    let flightObject = (sessionStorage.getItem("flight"));
    flightObject = JSON.parse(flightObject);


    // store flightObject in sessionStorage
    sessionStorage.setItem("flight", JSON.stringify(flightObject));



    for (let i = 0; i < flightObject.max; i++) {

        content[0].innerHTML += `
        <div class="flight" id="flight${i}">
    
        <div class="left-info">
    
            <div class="locations">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/82/Lufthansa_Logo_%28Crane%29.svg/1200px-Lufthansa_Logo_%28Crane%29.svg.png" width="12%">
                <p class="from-location">${flightObject.loc} </p><span class="city-code">${flightObject.loc}</span>
                <p class="line"> - </p>
                <p class="to-location">${flightObject.des}</p><span class="city-code">${flightObject.des}</span>
            </div>
            <div class="time">
                <p>21:30 - 22:40 </p>
            </div>
              
            <div class="persons">
                <p class="anz">${flightObject.persons}x</p>
                <img src="img/pers2.png" class="imgPers"width="7%">
            </div>
    
        </div>
    
        <div class="right-info">
            <input type="date" value="${ flightObject.lastBookingDate[i]}" class="date">
            <p class="price">ab ${flightObject.totalPrice[i]} €</p>

            <div class="seats">
            <p>free seats: ${flightObject.space[i]} </p>
        </div>

            <button class="btn" id="${i}" onClick="showOffer(${i})">wählen</button>
    
        </div>
    
    </div>
    
    `

    }

}

function showOffer(id) {

    console.log("show offer");
    console.log(id);

    let tempObject = JSON.parse(sessionStorage.getItem("flight"));

    let objectToSave = {
        loc: tempObject.loc,
        des: tempObject.des,
        date: tempObject.date,
        persons: tempObject.persons,
        price: tempObject.price[id],
        totalPrice: tempObject.totalPrice[id],
        space: tempObject.space[id],
        oneway: tempObject.oneway[id],
        lastBookingDate: tempObject.lastBookingDate[id],
        max: tempObject.max,
        airline: tempObject.airline
    };


    sessionStorage.setItem("flightOffer", JSON.stringify(objectToSave));
    window.location.href = "offer.php";

}