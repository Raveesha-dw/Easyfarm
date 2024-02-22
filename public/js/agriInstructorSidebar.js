const shrink_btn = document.querySelector(".shrink-btn");
const search = document.querySelector(".search");
const sidebar_links = document.querySelectorAll(".sidebar-links a");
const active_tab = document.querySelector(".active-tab");
const shortcuts = document.querySelector(".sidebar-links h4");
const tooltip_elements = document.querySelectorAll(".tooltip-element");

let activeIndex;

shrink_btn.addEventListener("click", () => {
  document.body.classList.toggle("shrink");
  setTimeout(moveActiveTab, 400);

  shrink_btn.classList.add("hovered");

  setTimeout(() => {
    shrink_btn.classList.remove("hovered");
  }, 500);
});

search.addEventListener("click", () => {
  document.body.classList.remove("shrink");
  search.lastElementChild.focus();
});

function moveActiveTab() {
  let topPosition = activeIndex * 58 + 2.5;

  if (activeIndex > 3) {
    topPosition += shortcuts.clientHeight;
  }

  active_tab.style.top = `${topPosition}px`;
}

function changeLink() {
    // Remove 'active' class from all links
    sidebar_links.forEach((sideLink) => sideLink.classList.remove("active"));
  
    // Add 'active' class to the clicked link
    this.classList.add("active");
  
    // Get the URL of the clicked link from the data-url attribute
    const linkUrl = this.dataset.url;
  
    // Check if the current URL contains the link's URL
    if (window.location.href.includes(linkUrl)) {
      // Set the activeIndex based on the dataset
      activeIndex = this.dataset.active;
  
      // Move the active tab
      moveActiveTab();
    }
}
  
// Add an event listener to each sidebar link
sidebar_links.forEach((link) => link.addEventListener("click", changeLink));
  

// function changeLink() {
//   sidebar_links.forEach((sideLink) => sideLink.classList.remove("active"));
//   this.classList.add("active");

//   activeIndex = this.dataset.active;

//   moveActiveTab();
// }

// sidebar_links.forEach((link) => link.addEventListener("click", changeLink));

function showTooltip() {
  let tooltip = this.parentNode.lastElementChild;
  let spans = tooltip.children;
  let tooltipIndex = this.dataset.tooltip;

  Array.from(spans).forEach((sp) => sp.classList.remove("show"));
  spans[tooltipIndex].classList.add("show");

  tooltip.style.top = `${(100 / (spans.length * 2)) * (tooltipIndex * 2 + 1)}%`;
}

tooltip_elements.forEach((elem) => {
  elem.addEventListener("mouseover", showTooltip);
});


// Your existing JavaScript code

document.addEventListener("DOMContentLoaded", function() {
    // Get the link with the 'active' class and set activeIndex
    const activeLink = document.querySelector('.sidebar-links a.active');
    activeIndex = activeLink ? activeLink.dataset.active : 0;
 
    // Move the active tab based on activeIndex
    moveActiveTab();
 });
 