const content = document.getElementById('main-content');
const nav = document.querySelector('nav');
const footer = document.querySelector('footer');

function setDynamicContentHeight() {
  const windowHeight = window.innerHeight;

  const rawNavHeight = window.getComputedStyle(nav).height;
  const rawFooterHeight = window.getComputedStyle(footer).height;
  const rawContentPaddingTop = window.getComputedStyle(content).paddingTop;
  const rawContentPaddingBottom =
    window.getComputedStyle(content).paddingBottom;

  const contentPaddingTop = parseInt(rawContentPaddingTop.slice(0, -2));
  const contentPaddingBottom = parseInt(rawContentPaddingBottom.slice(0, -2));
  const navHeight = parseInt(rawNavHeight.slice(0, -2));
  const footerHeight = parseInt(rawFooterHeight.slice(0, -2));

  const contentHeight =
    windowHeight -
    navHeight -
    footerHeight -
    contentPaddingTop -
    contentPaddingBottom;

  content.style.height = contentHeight + 'px';
}

// Call the function on page load and window resize
window.addEventListener('load', setDynamicContentHeight);
window.addEventListener('resize', setDynamicContentHeight);
