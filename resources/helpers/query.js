export const getQueryData = () => {
    const queryString = window.location.search;

    if(!queryString) {
        return {};
    }

    const urlSearchParams = new URLSearchParams(queryString);
    const urlSearchParamsEntries = [...urlSearchParams.entries()];

    return urlSearchParamsEntries.reduce((acc, urlSearchParamsEntriesItem) => {
        const [queryName, queryValue] = urlSearchParamsEntriesItem;

        return {
            ...acc,
            [queryName]: queryValue,
        }
    }, {});
}

export const getUrlWithNewQueryData = ({
    defaultUrl = window.location,
    queryDataArray,
    removeQueryWithoutValue = true
}) => {
    const url = new URL(defaultUrl);
    const queryString = window.location.search;
    const urlSearchParams = new URLSearchParams(queryString);

    queryDataArray.forEach(({key, value}) => {
        if(removeQueryWithoutValue) {
            if(!value) {
                urlSearchParams.delete(key);

                return;
            }
        }

        urlSearchParams.set(key, value);
    });

    url.search = urlSearchParams.toString();

    return url;
}

export const setUrlQuery = (queryDataArray) => {
    const newUrl = getUrlWithNewQueryData({queryDataArray});
    const newUrlString = newUrl.toString();

    history.pushState({}, null, newUrlString);
}
