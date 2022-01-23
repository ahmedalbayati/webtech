function toggleDropdown() {
    if (document.getElementsByClassName('nav-dropdown')[0].style.display === 'none') {
        document.getElementsByClassName('nav-dropdown')[0].style.display = 'flex';
    } else {
        document.getElementsByClassName('nav-dropdown')[0].style.display = 'none';
    }
}
