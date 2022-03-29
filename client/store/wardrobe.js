const state = () => ({
  wardrobe: [],
  elements: [],
  baseItem: {},
  panel: false,
  editedItem: null,
  activeItem: null,
  loadDefaults: true,
});

const getters = {
  wardrobe: state => {
    return state.wardrobe;
  },
  elements: state => {
    return state.elements;
  },
  baseItem: state => {
    return state.baseItem;
  },
  loadDefaults: state => {
    return state.loadDefaults;
  },
  editedItem: state => {
    let item = state.wardrobe.find(
      product => product.index === state.editedItem
    );
    if (item !== void 0) {
      return item;
    } else {
      return null;
    }
  },
  editedItemIndex: state => {
    return state.editedItem;
  },
  panel: state => {
    return state.panel;
  },
  activeItem: state => {
    return state.activeItem;
  },
  lastBody: state => {
    let item = state.wardrobe.find(product => product.index === state.lastBody);
    if (item !== void 0) {
      return item;
    } else {
      return null;
    }
  }
};

const mutations = {
  add(state, item) {
    console.log(item, "c");
    if (state.wardrobe.length !== 0) {
      let last = state.wardrobe[state.wardrobe.length - 1];
      let index = last.index + 1;
      item.index = index;
    } else {
      let index = 1;
      item.index = index;
    }
    item.activeSize = "L";
    state.wardrobe.push(item);
  },

  addElement(state, item) {
    const elementPosition = state.elements.findIndex(
      existingElement => existingElement.element.section_id == item[1].section_id
    );

    console.log(elementPosition >= 0, elementPosition, "addElement");

    if(elementPosition >= 0) {
      state.elements.splice(elementPosition, 1);
      //console.log(state.elements, "addElement");
      state.elements = [...state.elements, {item: item[0], element: item[1]}];
    }
    else {
      state.elements = [...state.elements, {item: item[0], element: item[1]}];
    }

    console.log(state.elements, "addElement");
  },

  change(state, { settingCategory, newSetting } = settings) {
    let newSettings = {
      model_name: settingCategory,
      model_type: newSetting.model_type
    };
    state.wardrobe = state.wardrobe.map(element => {
      if (element.index === state.editedItem) {
        let isAddedCategory = element.settings.find(
          type => type.model_name === newSettings.model_name
        );
        if (isAddedCategory === undefined) {
          return {
            ...element,
            settings: [...element.settings, { ...newSettings }]
          };
        } else {
          let elemSet = element.settings.map((el, i) => {
            if (element.settings[i].model_name === isAddedCategory.model_name) {
              newSettings.color = element.settings[i].color;
              return newSettings;
            }
            return el;
          });
          return { ...element, settings: elemSet };
        }
      } else {
        return element;
      }
    });
  },
  setLoad(state, boolean = true) {
    return state.loadDefaults = boolean;
  },
  reset(state, item) {
    state.wardrobe = state.wardrobe.map(element => {
      if (element.model_name === item.model_name) {
        return { ...element, settings: [...item.defaults] };
      }
      return element;
    });
  },
  setSize(state, size) {
    for (let i = 0; i < state.wardrobe.length; i++) {
      if (state.wardrobe[i].index === state.editedItem) {
        state.wardrobe[i].activeSize = size.name;
      }
    }
  },
  copy(state, index) {
    let copyItem = {
      ...state.wardrobe.find(product => product.index === index)
    };
    let last = state.wardrobe[state.wardrobe.length - 1];
    let newIndex = last.index + 1;
    copyItem.index = newIndex;
    state.wardrobe.push(copyItem);
  },
  edit(state, items) {
    state.panel = true;
    state.baseItem = items.currentItem;
    state.editedItem = items.editedItem;
    state.activeItem = items.editedItem;
  },
  remove(state, item) {
    state.wardrobe = state.wardrobe.filter(
      product => product.index !== item.index
    );
    if (state.wardrobe.length === 0 || state.activeItem === item.index) {
      state.activeItem = null;
    }
  },
  clear(state) {
    state.wardrobe = [];
  },
  stopEditing(state) {
    state.panel = false;
    state.editedItem = null;
  }
};

const actions = {
  addProduct({ commit }, item) {
    console.log(item, "b");
    commit("add", item);
  },
  async setCurrentItems({ commit }, editingItem) {
    //Тут будем по id товара получать все его парметры, либо просто весь товар с параметрами, но пока из мока вылавливаем конкретный
    const item = await this.$axios.get(
      "http://127.0.0.1:8000/api/gender/catalog/category/items"
    );
    const itemDefault = item.data.data.find(
      product => product.id === editingItem.id
    );
    const items = {
      currentItem: itemDefault,
      editedItem: editingItem.index
    };
    commit("edit", items);
  }
};

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
};
