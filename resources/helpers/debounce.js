const debounceMap = new Map();

export const debounce = (callback, wait) => {
    const data = debounceMap.get(callback);

    console.log('--- debounce')
    console.log('debounceMap')
    console.log(debounceMap)
    console.log('data')
    console.log(data)

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
