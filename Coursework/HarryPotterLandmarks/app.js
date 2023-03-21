// Code for changing the color of the header on scroll
window.addEventListener('scroll', function() {
    const header = document.querySelector('header');
    header.classList.toggle('scroll-header', window.scrollY > 0);
  });
  
  // Code for alerting a message when a user clicks on the "Landmarks" link
  const landmarksLink = document.querySelector('nav ul li:nth-child(2) a');
  landmarksLink.addEventListener('click', function(event) {
    event.preventDefault();
    alert('You clicked on the Landmarks link!');
  });
  