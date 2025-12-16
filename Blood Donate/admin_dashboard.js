
// first filter btn
let shortByBtn1 = document.querySelector(".short_by_btn1");
let filter1 = document.querySelector(".filter1");

shortByBtn1.addEventListener("click", ()=> {
    filter1.classList.add("shown");
})


// second filter btn
let shortByBtn2 = document.querySelector(".short_by_btn2");
let filter2 = document.querySelector(".filter2");

shortByBtn2.addEventListener("click", ()=> {
    filter2.classList.add("shown");
})