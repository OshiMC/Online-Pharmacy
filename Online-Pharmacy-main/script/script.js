const aboutUsLink = document.querySelector('a[href="#about"]');

aboutUsLink.addEventListener('click', function(event) {
  event.preventDefault();
  
  const aboutUsSection = document.querySelector('#about');
  const bottomSection = document.querySelector('#bottom');
  
  const distanceToAboutUsSection = aboutUsSection.getBoundingClientRect().top;
  const distanceToBottomSection = bottomSection.getBoundingClientRect().top;
  
  const distanceToScroll = distanceToAboutUsSection + window.scrollY;
  const duration = Math.abs(distanceToScroll - distanceToBottomSection) / 3;
  
  window.scroll({
    top: distanceToScroll,
    behavior: 'smooth',
    duration: duration
  });
});
