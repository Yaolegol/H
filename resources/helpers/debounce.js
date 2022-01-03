const debounceMap = new Map();

export const debounce = (callback, wait) => {
    const data = debounceMap.get(callback);

    if(data) {
        const {timeoutId} = data;

        if(timeoutId) {
            clearTimeout(timeoutId);
        }
    }

    const timeoutId = setTimeout(() => {
        callback();
    }, wait);

    debounceMap.set(callback, {
        timeoutId,
    });
}
