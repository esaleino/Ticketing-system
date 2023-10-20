console.log('hello');
const sidebar = document.getElementById('sidebar');
const sidebarButton = document.getElementById('sidebar-button');
const mainContent = document.getElementById('main-content');
sidebarButton.addEventListener('click', toggleSidebar);

const widthMobile = '3rem';
const widthDesktop = '10rem';
function setSidebarSize() {
  if (window.matchMedia('(max-width: 768px)').matches) {
    sidebar.style.width = widthMobile;
    mainContent.style.marginLeft = widthMobile;
  } else {
    sidebar.style.width = widthDesktop;
    mainContent.style.marginLeft = widthDesktop;
  }
}
function isSidebarOpen() {
  return (
    sidebar.style.width === widthMobile || sidebar.style.width === widthDesktop
  );
}
function toggleSidebar() {
  if (isSidebarOpen()) {
    sidebar.style.width = '0';
    mainContent.style.marginLeft = '0';
  } else {
    setSidebarSize();
  }
}
function resizeHandler() {
  if (isSidebarOpen()) {
    setSidebarSize();
  }
}
window.addEventListener('resize', resizeHandler);
