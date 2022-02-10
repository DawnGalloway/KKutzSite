// Input validation using the DOM 2 --Does not work with IE8
// As you may remember, the product in this instance is digital so having a quantity
// button and shipping wouldn't make sense
// JS for week12
var bagTotal = 0;

function setUp() {
  // temp remove the bag icon animation
  var bagIcon = document.getElementById("shoppingBagIcon02");
  bagIcon.classList.remove("object");
  //element.style.webkitAnimationPlayState = "paused";

  // remove the shopping bag & checkout form for now
  document.forms[0].style.display = 'none';
  document.getElementById("shoppingBag").style.display = 'none';

  // remove the elemnts of the shopping bag
  document.getElementById("bagHead").style.display='none';
  document.getElementById("bagFoot").style.display='none';
  document.getElementById("1").style.display='none';
  document.getElementById("2").style.display='none';
  document.getElementById("3").style.display='none';
  document.getElementById("4").style.display='none';
  document.getElementById("5").style.display='none';
  document.getElementById("6").style.display='none';

}

function goToBag() {
  document.getElementById("productContainer").style.display = 'none';
  document.forms[0].style.display = 'none';
  document.getElementById("shoppingBag").style.display = 'grid';
}


// productContainer
function addToBag(price, id) {
  // credit to https://robots.thoughtbot.com/css-animation-for-beginners
  // and https://css-tricks.com/restart-css-animation/ for getting the bag
  // animation working.
  var bagIcon = document.getElementById("shoppingBagIcon02");
  bagIcon.classList.remove("object");
  void bagIcon.offsetWidth;
  bagIcon.classList.add("object");

  document.getElementById("item" + id).value = price;
  document.getElementById("bagHead").style.display='table-row';
  document.getElementById("bagFoot").style.display='table-row';
  document.getElementById(id).style.display='table-row';
  document.getElementById("button" + id).disabled = true;



  
  bagTotal += parseFloat(price);
  document.getElementById("total").innerHTML = "$" + bagTotal.toFixed(2);
  document.getElementById("formTotal").value = bagTotal.toFixed(2);
  //element.style.webkitAnimationPlayState = "paused";
}

// shoppingBag
function returnToProducts(id) {
  document.getElementById(id).style.display = 'none';
  document.getElementById("productContainer").style.display = 'grid';
}

function setUpCheckout(id) {
  document.getElementById(id).style.display = 'none';
  document.forms[0].style.display = 'grid';
  document.getElementById("nameFocus").focus();
}

function removeFromBag(price, id) {
  document.getElementById("item" + id).value = 0;
  document.getElementById(id).style.display='none';
  document.getElementById("button" + id).disabled = false;
  
  bagTotal -= parseFloat(price);
  document.getElementById("total").innerHTML = "$" + bagTotal.toFixed(2);
  document.getElementById("formTotal").value = bagTotal.toFixed(2);
}

// js for checkoutForm
function chkText(text, id) {
  var textRegx = /^\s*([A-Z]|[a-z])+\s*/
  document.getElementById(id).style.visibility
    = (textRegx.test(text)) ? 'hidden': 'visible';
}

function chkPhoneNumber(number, id) {
  // US area codes do not begin with 0 or 1
  var phoneNumRegx = /^\s*[2-9]\d{2}-?\d{3}-?\d{4}\s*$/
  document.getElementById(id).style.visibility
    = (phoneNumRegx.test(number)) ? 'hidden': 'visible';
}

function chkEmail(email, id) {
  // this is difficult because RFC standards are flouted by some providers
  var emailRegx = /^\s*[\w\.\-+]*[^\.]@[^\.][\w\.-]*.[a-zA-Z]{2,}\s*$/
  document.getElementById(id).style.visibility
    = (emailRegx.test(email)) ? 'hidden': 'visible';
}

function chkAddress(address, id) {
  var textRegx = /^\s*(?:[0-9]|[A-Z])+\s*/
  document.getElementById(id).style.visibility
    = (textRegx.test(address)) ? 'hidden': 'visible';
}

function chkStateAbbr(abbr, id) {
// all valid postal codes per USPS, including armed forces (AA, AE, AP)
var abbrRegx = /^\s*(?:A[AEKLPRSZ]|C[AOT]|D[CE]|F[LM]|G[AU]|HI|I[ADLN]|K[SY]|LA|M[ADEINOPST]|N[CDEHJMVY]|O[HKR]|P[ARW]|RI|S[CD]|T[NX]|UT|V[AIT]|W[ATVY])\s*$/
var upperRegx = /[^a-z]/g;
  document.getElementById(id).style.visibility
     = (abbrRegx.test(abbr) && upperRegx.test(abbr)) ? 'hidden': 'visible';
}

function chkZip(zip, id) {
  var zipRegx = /^\s*\d{5}(?:-\d{4})?\s*$/
  document.getElementById(id).style.visibility
     = (zipRegx.test(zip)) ? 'hidden': 'visible';
}

function chkCC(cc, id) {
  var ccRegx = /^\s*\d{4}\s\d{4}\s\d{4}\s\d{4}\s*$/
  document.getElementById(id).style.visibility
    = (ccRegx.test(cc)) ? 'hidden': 'visible';
}
  
function chkDate(date, id) {
  var dateRegx = /^\s*(?:1[0-2]|0\d)\/20[1-9]\d\s*$/
  document.getElementById(id).style.visibility
    = (dateRegx.test(date)) ? 'hidden': 'visible';
}

function chkCVV(cvv, id) {
  var cvvRegx = /^\s*\d{3}\d?\s*$/
  document.getElementById(id).style.visibility
    = (cvvRegx.test(cvv)) ? 'hidden': 'visible';
}
