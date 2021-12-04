export const getQueryData = () => {
    const queryString = window.location.search;

    if(!queryString) {
        return null;
    }

    const queryStringFormatted = queryString.substring(1);
    const queryArray = queryStringFormatted.split('&');

    return queryArray.reduce((acc, queryItemString) => {
        const queryItemArray = queryItemString.split('=');
        const queryName = queryItemArray[0];
        const queryValue = queryItemArray[1];

        return {
            ...acc,
            [queryName]: queryValue,
        }
    }, {});
}
