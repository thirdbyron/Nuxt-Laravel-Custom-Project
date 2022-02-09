const state = () => ({
    gender: 'man',
    wardrobe: [],
    womanWardrobe: [],
    baseItem: {},
    panel: false,
    editedItem: null,
    activeBody: null,
    lastBody: null,
    activeLegs: null,
    lastLegs: null
})

const getters = {
    wardrobe: (state) => {
        if(state.gender === 'man') {
            return state.wardrobe
        } else {
            return state.womanWardrobe
        }
    },
    baseItem: (state) => {
        return state.baseItem
    },
    editedItem: (state) => {
        let item = state.wardrobe.find(product => product.index === state.editedItem)
        if(item !== void 0)  {
            return item
        } else {
            return null
        }
        
    },
    editedItemIndex: (state) => {
        return state.editedItem
    },
    panel: (state) => {
        return state.panel
    },
    activeBody: (state) => {
        return state.activeBody
    },
    lastBody: (state) => {
        let item = state.wardrobe.find(product => product.index === state.lastBody)
        if(item !== void 0)  {
            return item
        } else {
            return null
        }
    },
    gender: (state) => {
        return state.gender
    }
}

const mutations = {
    add(state, item) {
        item.settings = item.defaults
        if (state.wardrobe.length !== 0) {
            let last = state.wardrobe[state.wardrobe.length - 1]
            let index = last.index + 1
            item.index = index
        } else {
            let index = 1
            item.index = index
        }
        item.activeSize = "L"
        switch(item.type) {
            case 'body': 
            state.activeBody = item.index
            break
            case 'legs': 
            state.activeLegs = item.index
            break
        }
        state.wardrobe.push(item)
    },
    setActiveClothes(state, settings) {
        switch(settings.type) {
            case 'body': 
            state.activeBody = settings.index
            break
            case 'legs': 
            state.activeLegs = settings.index
            break
        }
        if(state.activeBody !== null) {
            state.lastBody = state.activeBody
        }
    },
    change(state, {settingCategory, newSetting} = settings) {
        let newSettings = {
            model_name: settingCategory,
            model_type: newSetting.model_type
        }
        state.wardrobe = state.wardrobe.map(element => {
            if (element.index === state.editedItem) {
                let isAddedCategory = element.settings.find(type => type.model_name === newSettings.model_name)
                if (isAddedCategory === undefined) {
                    return {...element, settings: [...element.settings, { ...newSettings }]}
                } else {
                    let elemSet = element.settings.map((el, i) => {
                        if (element.settings[i].model_name === isAddedCategory.model_name) {
                            newSettings.color = element.settings[i].color
                            return newSettings
                        }
                        return el
                    })
                    return {...element, settings: elemSet}
                }
            } else {
                return element
            }
        })
    },
    reset(state, item) {
        state.wardrobe = state.wardrobe.map(element => {
            if (element.model_name === item.model_name) {
                return {...element, settings: [...item.defaults]}
            }
            return element
        })
    },
    changeColor(state, {color, settingCategory} = settings) {
        state.wardrobe = state.wardrobe.map(element => {
            if (element.index === state.editedItem) {
                return {...element, settings: [...element.settings.map((el) => {
                    if (el.model_name === settingCategory) {
                        return {...el, color: color}
                    }
                    return el
                })]}
            } 
            return element
        })
    },
    setSize(state, size) {
        for (let i = 0; i < state.wardrobe.length; i++) {
            if (state.wardrobe[i].index === state.editedItem) {
                state.wardrobe[i].activeSize = size.name
            }
        }
    },
    copy(state, index) {
        let copyItem = { ...state.wardrobe.find(product => product.index === index) }
        let last = state.wardrobe[state.wardrobe.length - 1]
        let newIndex = last.index + 1
        copyItem.index = newIndex
        state.wardrobe.push(copyItem)
    },
    edit(state, items) {
        state.panel = true
        state.baseItem = items.currentItem
        state.editedItem = items.editedItem
        state.activeBody = items.editedItem
    },
    remove(state, item) {
        state.wardrobe = state.wardrobe.filter(product => product.index !== item.index)
        if (state.wardrobe.length === 0 || state.activeBody === item.index) {
            state.activeBody = null
        }
        state.lastBody = state.activeBody
    },
    clear(state) {
        state.lastBody = null
        state.wardrobe = []
    },
    removeColors(state) {
        state.wardrobe = state.wardrobe.map(element => {
            return {...element, settings: element.defaults}
        })
    },
    stopEditing(state) {
        state.panel = false
        state.editedItem = null
    },
    changeGender(state, gender) {
        state.gender = gender
        state.activeBody = null
        state.lastBody = null
        state.panel = false
        state.editedItem = null
    },
    resetGender(state) {
        state.gender = 'man'
        state.activeBody = null
        state.lastBody = null
    }
}


const actions = {
    async addProduct({ commit }, item) {
        commit('add', {...item})
    },
    async setCurrentItems({ commit }, editingItem) {
        //Тут будем по id товара получать все его парметры, либо просто весь товар с параметрами, но пока из мока вылавливаем конкретный
        const item = await this.$axios.get('https://drevproektstroi.ru/api/get-cats-items')
        const itemDefault = item.data.find(product => product.id === editingItem.id)
        const items = {
            currentItem: itemDefault,
            editedItem: editingItem.index
        }
        commit('edit', items)
    }
}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
}