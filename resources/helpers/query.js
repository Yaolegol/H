export const getQueryData = () => {
    const queryString = window.location.search;

    if(!queryString) {
        return null;
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

export const getUrlWithNewQueryData = ({queryDataArray, removeQueryWithoutValue}) => {
    const url = new URL(window.location);
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
