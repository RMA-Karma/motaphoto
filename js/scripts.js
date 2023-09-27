//------------------------------------------------MODAL CONTACT ------------------------------------------------------//
let contact = document.getElementById("menu-item-14")
let modalContact = document.querySelector(".modal")
contact.addEventListener("click", function() {
    modalContact.style.display="block"
    modalContact.classList.remove('modal-out')
}) 
window.onclick = function(event) {
    if (event.target == modalContact) {
        modalContact.classList.add('modal-out')
    }}

//---IMAGE EN TETE BANNER--//
let bannerContact = new Image()
let formulaireContact = document.querySelector('.wpcf7')
let firstChild = formulaireContact.firstChild
bannerContact.src = 'http://localhost:8888/motaphoto/wp-content/uploads/2023/09/Contact-header.png'
formulaireContact.insertBefore(bannerContact, firstChild)
bannerContact.classList.add('banner-contact')


//-------------------------------------------------PHOTO------------------------------------------------------------//

let contactRef = document.querySelector(".bouton-contact-ref")
contactRef.addEventListener("click", function() {
    modalContact.style.display="block"
    modalContact.classList.remove('modal-out')})

let ref = document.querySelector(".ref-photo").innerHTML
let valeurRef = document.querySelector('input[name="your-subject"]')
valeurRef.value = ref

let boutonPrevious = document.querySelector(".nav-previous")
let photoPrevious = document.querySelector(".photo-previous")
let boutonNext = document.querySelector(".nav-next")
let photoNext = document.querySelector(".photo-next")
let divPhoto = document.querySelector(".photo-prev-next")
boutonPrevious.addEventListener("mouseover", function() {
    photoPrevious.style.visibility="initial"
    divPhoto.style.visibility="initial"
    photoNext.style.display="none"
})
boutonPrevious.addEventListener("mouseout", function(){
    photoPrevious.style.visibility="hidden"
    divPhoto.style.visibility="hidden"
    photoNext.style.display="block"
})

boutonNext.addEventListener("mouseover", function(){
    divPhoto.style.visibility="initial"
    photoPrevious.style.display="none"
    photoNext.style.visibility="initial"
})
boutonNext.addEventListener("mouseout", function(){
    photoNext.style.visibility="hidden"
    photoPrevious.style.display="block"
    divPhoto.style.visibility="hidden"
})