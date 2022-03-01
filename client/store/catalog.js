const state = () => ({
  categoriesModel: [],
  sortedCategories: [],
  sets: []
});

const getters = {
  categoriesModel: state => {
    return state.categoriesModel;
  },
  sortedCategories: state => {
    return state.sortedCategories;
  }
};

const mutations = {
  setCategoriesModel(state, items) {
    state.categoriesModel = items;
    state.sortedCategories = items;
  },
  sortItems(state, id) {
    if (id) {
      state.sortedCategories = state.categoriesModel.filter(
        category => category.id === id
      );
    } else {
      state.sortedCategories = state.categoriesModel;
    }
  }
};

const actions = {
  async getItems({ commit }) {
    const items = await this.$axios.get(
      "http://127.0.0.1:8000/api/gender/catalog/categories"
    );
    commit("setCategoriesModel", items.data.data);
    return items.data;
  }
};

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
};
