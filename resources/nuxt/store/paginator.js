export const state = () => ({
    totalPageCount:0,
    currentPage: 0
});

export const mutations = {
    setLastPage (state, totalPageCount){
        state.totalPageCount = totalPageCount;
    },
    setPages (state, currentPage, totalPageCount) {
        state.totalPageCount = totalPageCount;
        state.currentPage = currentPage;
    }
};
