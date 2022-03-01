<template>
  <div class="tab-content">
    <div class="items">
      <form
        class="section"
        v-for="(section, sectionIndex) in defaultItem.settings.sections"
        :key="sectionIndex"
        method="post"
        @submit.prevent="changeModel()"
      >
        <span class="typeHeader">{{ section.name }}</span>
        <div class="options" v-for="(option, optionIndex) in section.options" :key="optionIndex">
          {{forms[sectionIndex]}}
          <select-tag :vModel="forms[sectionIndex]" :innerItems="'feature'" :selectItem="option"></select-tag>
        </div>
        <button class="submitButton classic" type="submit">Поменять</button>
      </form>
      <!--<div
        class="selectCont"
        v-for="(element, i) in defaultItem.settings.sections"
        :key="i"
      >
        <select name="" id=""></select>
      </div>
      -->
      <!--<div
        class="elements"
        v-for="(element, i) in defaultItem.settings.sections"
        :key="i"
      >
        <span class="type-header">{{ element.name }}</span>
        <div class="grid-row variants">
          <div
            class="item"
            v-for="(item, i) in element.options"
            :key="i"
            v-on:click="saveSettings(element.model_name, item)"
          >
            <img
              :src="itemImage"
              width="124"
              height="122"
              :alt="item.name"
              class="item-image"
            />
            <span>{{ item.name }}</span>
          </div>
        </div>
        <a href="#" class="show-btn" v-on:click="showMore">+ Показать все</a>
      </div>-->
    </div>
    <a href="#" class="reset-button" v-on:click="resetSettings"
      >Сбросить элементы</a
    >
  </div>
</template>

<script>
import SelectTag from '../../../../tag/SelectTag.vue';
export default {
  components: { SelectTag },
  props: {
    defaultItem: Object,
  },
  data() {
    return {
      activeItem: null,
      itemImage: require("@/assets/media/img/demo-e.png"),
      forms: [],
    };
  },
  computed: {
    editedItem() {
      return this.$store.getters["wardrobe/editedItem"];
    },
  },
  mounted: async function() {
    await this.defaultItem.settings.sections.forEach(section => {
      this.forms.push(section.options);
    });
    await console.log(this.forms)
  },
  methods: {
    changeModel: function (element) {
      console.log(element);
    },

    reloadModel: function (defaultsArray) {
      for (let i = 0; i < defaultsArray.length; i++) {
        this.$eventHub.$emit(
          "dummy:dummy_reload_tshirt",
          defaultsArray[i]["model_name"],
          defaultsArray[i]["model_type"],
          defaultsArray[i]["color"]
        );
      }
    },
    saveSettings: function (type, item) {
      let settings = { newSetting: item, settingCategory: type };
      this.$store.commit("wardrobe/change", settings);
      this.reloadModel(this.editedItem.settings);
    },
    showMore: function () {
      alert("Не работает!");
    },
    resetSettings: function () {
      this.$store.commit("wardrobe/reset", this.editedItem);
      this.reloadModel(this.editedItem.settings);
    },
  },
};
</script>

<style scoped>
.items {
  padding: calc(2rem + 0.4vw);
  padding-top: calc(2rem + 0.4vw);
}
.typeHeader {
  font-size: calc(.4rem + .8vw);
  margin-bottom: 25px;
  color: #202122;
  display: inline-block;
}
.section {
  margin-bottom: calc(3rem + .4vw);
}
.section:last-child {
  margin-bottom: 0;
}
/*
.fakeSelect {
  background-color: #eeeeee;
}
.fakeOptionsList {
  display: flex;
  flex-direction: column;
  list-style-type: none;
  padding-bottom: 1rem;
}
.fakeOption {
  text-decoration: none;
  padding-left: 0.7rem;
  padding-right: 0.7rem;
  padding-top: 0.4rem;
  padding-bottom: 0.4rem;
  font-size: calc(0.6rem + 1vw);
  font-weight: 700;
}
.fakeOptionTitle {
  padding: 0.7rem;
  font-size: calc(0.5rem + 1vw);
  font-weight: 400;
  margin-bottom: 0.3rem;
}*/
</style>

<style>
.submitButton {
  outline: none;
  border: none;
  background: #dddddd;
  max-width: 50%;
  width: 100%;
  text-align: left;
  padding-left: .8rem;
  padding: .5rem .8rem .5rem .8rem;
  font-size: calc(.4rem + .8vw);
}
</style>