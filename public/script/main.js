function popup(){
    document.getElementById('popup').classList.add('show');
    document.getElementById('popup').style.display = 'block'
}
function closePopup(){
    document.getElementById('popup').style.display = 'none';
    document.getElementById('popup').classList.remove('show');
}

// const btn = document.getElementById('close');
// popup.addEventListener('click', function(){
//     close();
// });