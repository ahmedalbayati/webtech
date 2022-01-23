function toggleDropdown() {
    if (document.getElementsByClassName('nav-dropdown')[0].style.display === 'none') {
        document.getElementsByClassName('nav-dropdown')[0].style.display = 'flex';
    } else {
        document.getElementsByClassName('nav-dropdown')[0].style.display = 'none';
    }
}

function ajaxSwitchPage(request, div_id) {
    const xhttp = new XMLHttpRequest();

    xhttp.open('GET', request);
    xhttp.send();

    xhttp.onload = function() {
        document.getElementById(div_id).innerHTML = xhttp.responseText;
    }
}
