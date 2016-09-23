// var oldElement=document.getElementsByClassName('channels')[0];
//
// function activeChannel(element) {
//     oldElement.style.color="#9f9f9f";
//     oldElement=element;
//     document.getElementById('sendTo').value=element.innerHTML;
//     document.getElementById('labelSendTo').innerHTML=element.innerHTML;
//     element.style.color="white";
//
//     // hideSideBar();
// }
function showSideBar() {
    document.getElementsByClassName('sideBar')[0].style.visibility = 'visible';
    document.getElementsByClassName('sideBarMask')[0].style.visibility='visible';
}
function hideSideBar() {
    document.getElementsByClassName('sideBar')[0].style.visibility = 'hidden';
    document.getElementsByClassName('sideBarMask')[0].style.visibility='hidden';
}
var historyMessages = document.getElementsByClassName("historyMessages")[0];
historyMessages.scrollTop=historyMessages.scrollHeight;
