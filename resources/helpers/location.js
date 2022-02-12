const getPathArray = () => {
    const currentPathName = window.location.pathname;
    const currentPathNamesArray = currentPathName.split('/');

    return currentPathNamesArray.filter((path) => path !== '');
}

export const setLocationWithNewRegion = (link, isReload = true) => {
    const currentPathArray = getPathArray();
    const isContainsSearch = currentPathArray[0] === 'search';
    let newPathNamesArray = [...currentPathArray];

    if(isContainsSearch) {
        newPathNamesArray[1] = link;
    } else {
        newPathNamesArray = ['search', link, ...newPathNamesArray];
    }

    window.location.href = '/' + newPathNamesArray.join('/') + window.location.search;
}
