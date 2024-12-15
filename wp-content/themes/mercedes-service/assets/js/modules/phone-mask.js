export const initPhoneMask = () => {
    const element = document.getElementById('your-phone');
    const maskOptions = {
        mask: '+{7}(000)000-00-00'
    };
    const mask = IMask(element, maskOptions);
}