// --------------------------------------------
// Constants - Elements
// --------------------------------------------
const content = document.getElementById('main-content');
const nav = document.querySelector('nav');
const footer = document.querySelector('footer');
const menuIcon = document.getElementById('menu-icon');
const mobileMenu = document.querySelectorAll('.mobile-menu')[0];
const mobileOptions = document.querySelectorAll('.mobile-options')[0];
const mobileOptionsList = document.getElementsByName('mobile-option');
const desktopOptionsList = document.getElementsByName('desktop-option');
const contentDivs = document.getElementsByName('content-div');
// --------------------------------------------
// Constants - Values
// --------------------------------------------
const mobileStyle = {
  menuGap: mobileMenu.style.gap,
  menuPadding: mobileMenu.style.padding,
  optionsWidth: mobileOptions.style.width,
  optionWidth: mobileOptionsList[0].style.width,
};
// --------------------------------------------
// Functions
// --------------------------------------------
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
function rotate(e) {
  e.classList.toggle('active');
}
function menuHandler() {
  rotate(menuIcon);
  toggleMobileMenu(menuIcon);
}
function toggleMobileMenu(e) {
  let active = isActive(e);
  if (active) {
    mobileMenu.style.gap = mobileStyle.menuGap;
    mobileMenu.style.padding = mobileStyle.menuPadding;
    mobileOptions.style.width = mobileStyle.optionsWidth;
  } else {
    mobileMenu.style.gap = '0';
    mobileMenu.style.padding = '0';
    mobileOptions.style.width = '0';
  }
  setOptionWidth(active);
}
function isActive(e) {
  return e.classList.contains('active');
}
function menuOff() {
  mobileMenu.style.gap = '0';
  mobileMenu.style.padding = '0';
  mobileOptions.style.width = '0';
}
function setOptionWidth(active) {
  mobileOptionsList.forEach((option) => {
    if (active) {
      option.style.width = mobileStyle.optionWidth;
    } else {
      option.style.width = '0';
    }
  });
}
function mobileContentSelectHandler() {
  menuHandler();
  loopLinkElements();
  let id = this.id.replace('mobile-', '');
  activateLinkElement(id);
  showContent(id);
}
function loopLinkElements(e) {
  mobileOptionsList.forEach((option) => {
    option.classList.remove('active');
  });
  desktopOptionsList.forEach((option) => {
    option.classList.remove('active');
  });
}
function activateLinkElement(e) {
  let desktop_e = document.getElementById('desktop-' + e);
  let mobile_e = document.getElementById('mobile-' + e);
  desktop_e.classList.add('active');
  mobile_e.classList.add('active');
}
function desktopContentSelectHandler() {
  loopLinkElements();
  let id = this.id.replace('desktop-', '');
  activateLinkElement(id);
  showContent(id);
}
function showContent(id) {
  id += '-content';
  contentDivs.forEach((div) => {
    div.style.display = 'none';
  });
  let div = document.getElementById(id);
  div.style.display = 'block';
}
// --------------------------------------------
// Event listeners
// --------------------------------------------
mobileOptionsList.forEach((option) => {
  option.addEventListener('click', mobileContentSelectHandler);
});
desktopOptionsList.forEach((option) => {
  option.addEventListener('click', desktopContentSelectHandler);
});
menuIcon.addEventListener('click', menuHandler);
window.addEventListener('load', menuOff);
window.addEventListener('load', setDynamicContentHeight);
window.addEventListener('resize', setDynamicContentHeight);
// --------------------------------------------
