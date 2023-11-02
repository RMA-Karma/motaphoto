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

    
//---------------------------------------------------MENU MOBILE------------------------------------------------//

let ouvertureMenu = document.getElementById("open-menu-logo")
let menu = document.querySelector(".menu-menu-header-container")
let fermetureMenu = document.getElementById("close-menu-logo")
ouvertureMenu.addEventListener("click", function(){
    menu.style.display="block"
    menu.classList.remove('swipe-out-menu')
    menu.classList.add('swipe-in-menu')
    ouvertureMenu.style.display="none"
    fermetureMenu.style.display="block"
    document.body.style.overflow="hidden"
})

fermetureMenu.addEventListener("click", function(){
    menu.classList.remove('swipe-in-menu')
    menu.classList.add('swipe-out-menu')
    fermetureMenu.style.display="none"
    ouvertureMenu.style.display="block"
    document.body.style.overflow="auto"
})

function largeurEcran() {
    let largeur = window.innerWidth
    if (largeur >= 1025) {
      menu.classList.remove('swipe-out-menu')
      ouvertureMenu.style.display="none"
      fermetureMenu.style.display="none"
      menu.style.display="block"
    } else {
        if (largeur <= 1024) {
        ouvertureMenu.style.display="block"
        menu.style.display="none"
        document.body.style.overflow="auto"
        fermetureMenu.style.display="none"
    }}}

window.onresize = largeurEcran


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



