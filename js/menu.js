const rhHamburger = document.getElementById('rh-hamburger');
const rhNav = document.getElementById('rh-nav');

rhHamburger.addEventListener('click', () => {
  rhHamburger.classList.toggle('active');
  rhNav.classList.toggle('active');
});