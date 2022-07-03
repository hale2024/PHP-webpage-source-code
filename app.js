function showPrivate() {  
    document.getElementById('private').style.visibility = "visible";
}

function openURL() {
    window.open("https://gsis.kaist.ac.kr/","_blank");
}

window.onload = function () {
    let unveil = document.getElementById('unveil');
    let contact = document.getElementById('contact');

    unveil.addEventListener('click', this.showPrivate);
    contact.addEventListener('click', this.openURL);
}
