document.getElementsById('btn-contact').click(function(){
document.getElementsByClassName('modal1').style.display = "flex";
document.getElementsById('email_div').fadeIn(100)})
document.getElementsByClassName('cerrar_contact').click(function(){
document.getElementsByClassName('modal1').style.display = "none";
document.getElementsById('email_div').fadeOut(300)})
