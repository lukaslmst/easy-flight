var myHeaders = new Headers();
myHeaders.append("Authorization", "Bearer lTbdBEwHLYryazHoWWMbaOUljpDL");

var requestOptions = {
    method: 'GET',
    headers: myHeaders,
    redirect: 'follow'
};


function getFlight() {

    console.log("get flights")

    let loc = document.getElementById('search').value;
    let des = document.getElementById('from').value;
    let date = document.getElementById('date').value;
    let persons = document.getElementById('guests').value;


    let price = Array();
    let totalPrice = Array();

    let space = Array();
    let oneway = Array();
    let lastBookingDate = Array();
    let duration = Array();
    let airline = Array();

    let max = 3;


    fetch(`https://test.api.amadeus.com/v2/shopping/flight-offers?originLocationCode=${loc}&destinationLocationCode=${des}&departureDate=${date}&adults=${persons}&max=${max}`, requestOptions)
        .then(response => response.json())
        .then(result => {



            let resultObj = result;
            console.log(resultObj)


            for (let i = 0; i < max; i++) {
                price[i] = resultObj.data[i].price;
                totalPrice[i] = resultObj.data[i].price.total;
                space[i] = resultObj.data[i].numberOfBookableSeats;
                oneway[i] = resultObj.data[i].oneWay;
                lastBookingDate[i] = resultObj.data[i].lastTicketingDate;
                airline[i] = resultObj.data[i].validatingAirlineCodes[0];
            }


            const flightObject = {
                loc: loc,
                des: des,
                date: date,
                persons: persons,
                price: price,
                totalPrice: totalPrice,
                space: space,
                oneway: oneway,
                lastBookingDate: lastBookingDate,
                duration: duration,
                max: max,
                airline: airline
            };


            var flightStr = JSON.stringify(flightObject);


            send(flightStr);



        })
        .catch(error => console.log('error', error));

}


function send(flightStr) {

    sessionStorage.setItem("flight", flightStr);
    console.log("send");
    location.href = "offers.php";

}