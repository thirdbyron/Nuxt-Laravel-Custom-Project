const state = () => ({
  dummies: [],
  dummy: null,
});

const getters = {
  dummies: state => {
    //console.log(state.dummies, 'm');
    return state.dummies;
  },
  dummy: state => {
    //console.log(state.dummy, 'ms');
    return state.dummy;
  },
};

const mutations = {
  setDummies(state, dummies) {
    state.dummies = dummies;
  },
  setDummy(state, dummy) {
    state.dummy = dummy;
  }
};

const actions = {
  async getDummies({ commit }) {
    const dummies = await this.$axios.get(
      "http://127.0.0.1:8000/api/genders"
    );
    commit("setDummies", dummies.data.data);
    return dummies.data.data;
  },
  async getDummy({ commit }, id) {
    const dummy = await this.$axios.get(
      `http://127.0.0.1:8000/api/genders/${id}`
    );
    commit("setDummy", dummy.data.data);
    return dummy.data.data;
  }
};

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
};
