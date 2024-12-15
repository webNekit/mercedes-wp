export function handleScrollButton() {
    const buttonUp = document.querySelector(".button-up");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 200) {
            buttonUp.classList.add("button-up--active");
        } else {
            buttonUp.classList.remove("button-up--active");
        }
    });
}
