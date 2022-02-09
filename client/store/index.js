export const state = () => ({
    token: null
  })
  
export const actions = {
    nuxtServerInit({ dispatch }) {
        dispatch('catalog/getItems')
        console.log('nuxtServerInit')
    },
    login({commit}) {
        commit('setToken', 'truetoken')
    },
    logout({commit}) {
        commit('clearToken')
    }
}

export const getters = {
    hasToken: s => !!s.token
}