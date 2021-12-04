export const getCookieData = () => {
    const cookie = document.cookie;
    const cookieArray = cookie.split(';');

    return cookieArray.reduce((acc, cookieString) => {
        const cookieStringFormatted = cookieString.trim();
        const cookieNameValueArray = cookieStringFormatted.split('=');
        const cookieName = cookieNameValueArray[0];
        const cookieValue = cookieNameValueArray[1];

        return {
            ...acc,
            [cookieName]: cookieValue,
        };
    }, {});
}
