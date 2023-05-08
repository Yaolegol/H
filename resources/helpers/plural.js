export const plural_ru = (count, words) => {
    const _count = Number(count);
    const cases = [2, 0, 1, 1, 1, 2];

    return words[ (_count % 100 > 4 && _count % 100 < 20) ? 2 : cases[ Math.min(_count % 10, 5)] ];

}
