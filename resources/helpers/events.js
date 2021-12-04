export const addEventListener = (element, event, callback) => {
    if(!element) {
        console.error('No element for addEventListener');

        return;
    }

    element.removeEventListener(event, callback);
    element.addEventListener(event, callback);
}
