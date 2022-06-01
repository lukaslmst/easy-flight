let text1 = document.getElementById("text1");
let text2 = document.getElementById("text2");
let text3 = document.getElementById("text3");

const texts = [
    "Are",
    "You",
    "Ready?",
    "",
    "Book",
    "Your",
    "Next",
    "Adventure.",
];

const morphTime = 1.3; //animation durration
const cooldownTime = 0.5; //durration to next Text 

let morph;
let textIndex = texts.length - 1; //8
let time = new Date();
let cooldown = cooldownTime;

//9     ->      9
text1.textContent = texts[textIndex % texts.length];
console.log(texts[textIndex % texts.length])

text2.textContent = texts[(textIndex + 1) % texts.length];
console.log(texts[(textIndex + 1) % texts.length])

function doMorph() {

    morph -= cooldown;
    cooldown = 0;

    let fraction = morph / morphTime;

    if (fraction > 1) {
        cooldown = cooldownTime;
        fraction = 1;
    }

    setMorph(fraction);
}

function setMorph(fraction) {
    text2.style.filter = `blur(${Math.min(8 / fraction - 8, 100)}px)`;
    text2.style.opacity = `${Math.pow(fraction, 0.4) * 100}%`;

    fraction = 1 - fraction;
    text1.style.filter = `blur(${Math.min(8 / fraction - 8, 100)}px)`;
    text1.style.opacity = `${Math.pow(fraction, 0.4) * 100}%`;

    text1.textContent = texts[textIndex % texts.length];
    text2.textContent = texts[(textIndex + 1) % texts.length];
}

function doCooldown() {
    morph = 0;

    text2.style.filter = "";
    text2.style.opacity = "100%";

    text1.style.filter = "";
    text1.style.opacity = "0%";
}

function animate() {
    requestAnimationFrame(animate);

    let newTime = new Date();
    let shouldIncrementIndex = cooldown > 0;
    let dt = (newTime - time) / 1000;
    time = newTime;

    cooldown -= dt;

    if (cooldown <= 0 && !(textIndex == 7 + texts.length)) {
        if (shouldIncrementIndex) {
            textIndex++;
        }

        if (textIndex == 7 + texts.length) {
            text1.style.display = "none";
            text2.style.display = "none";
            text3.style.display = "inline-block";
        }

        doMorph();
    } else {
        doCooldown();
    }
}

animate();