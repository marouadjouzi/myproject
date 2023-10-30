const container = document.querySelector(".main-nav");
const containerHeight = container.offsetHeight;
document.documentElement.style.setProperty("--scroll-padding", `${containerHeight}px`);