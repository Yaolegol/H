export const toggleClass = (element, className, isShow) => {
    if(isShow) {
        element.classList.add(className);
    } else {
        element.classList.remove(className);
    }
}
