document.addEventListener("DOMContentLoaded", () => {
    console.log('oke');
    const content = document.getElementById("content");
    const navbarHeight = document.querySelector(".navbar").offsetHeight;

    content.style.marginTop = `${navbarHeight}px`;
});
