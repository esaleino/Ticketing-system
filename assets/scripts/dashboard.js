// --------------------------------------------
// Constants - Elements
// --------------------------------------------
const contentDivs = document.getElementsByName('content-div');

// --------------------------------------------
// Run once
// --------------------------------------------
contentDivs.forEach((div) => {
  div.style.display = 'none';
});
