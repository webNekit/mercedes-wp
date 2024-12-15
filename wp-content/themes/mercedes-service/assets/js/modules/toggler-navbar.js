export function toggleNavbar() {
    // Найти элементы меню и кнопки
    const navbar = document.querySelector('[data-navbar]');
    const menuToggler = document.querySelector('[data-menu-toggler]');
    const menuLinks = document.querySelectorAll('[data-navbar] .navbar__menu-link');

    if (!navbar || !menuToggler) {
        console.error('Не удалось найти элементы с атрибутами data-navbar или data-menu-toggler');
        return;
    }

    // Функция для переключения класса активности
    const toggleMenu = () => {
        navbar.classList.toggle('navbar--active');
    };

    // Закрытие меню
    const closeMenu = () => {
        navbar.classList.remove('navbar--active');
    };

    // Событие на кнопку открытия/закрытия меню
    menuToggler.addEventListener('click', toggleMenu);

    // Событие на ссылки внутри меню
    menuLinks.forEach(link => {
        link.addEventListener('click', closeMenu);
    });
}
