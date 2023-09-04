//------------------------------------------------MODAL CONTACT ------------------------------------------------------//
let contact = document.getElementById("menu-item-14")
let modalContact = document.querySelector(".modal")
contact.addEventListener("click", function() {
    modalContact.style.display="block"
    modalContact.classList.remove('modal-out')
}) 
window.onclick = function(event) {
    if (event.target == modalContact) {
        //modalContact.style.display = "none";
        modalContact.classList.add('modal-out')
    }}

//---IMAGE EN TETE BANNER--//
let bannerContact = new Image()
let formulaireContact = document.querySelector('.wpcf7')
let firstChild = formulaireContact.firstChild
bannerContact.src = 'wp-content/themes/motaphoto/asset/Contact_header.png'
formulaireContact.insertBefore(bannerContact, firstChild)
bannerContact.classList.add('banner-contact')