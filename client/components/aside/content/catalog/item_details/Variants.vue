<template>
  <div class="tab-content">
    <div class="items">
      <form
        class="section"
        v-for="(section, sectionIndex) in defaultItem.settings.sections"
        :key="sectionIndex"
        :data-id="'section' + section.id"
        method="post"
        @submit.prevent="changeModel(section.id)"
      >
        <span class="typeHeader">{{ section.name }}</span>
        <div
          class="options"
          v-for="(option, optionIndex) in section.options"
          :key="optionIndex"
        >
          {{ option.features }}
          <select-tag
            select-name="feature"
            :vModel="section.name + option.name"
            :innerItems="option.features"
            :selectItem="option"
            :selectGroup="section.id"
          ></select-tag>
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
import SelectTag from "../../../../tag/SelectTag.vue";
export default {
  components: { SelectTag },
  props: {
    defaultItem: Object,
  },
  data() {
    return {
      activeItem: null,
      itemImage: require("@/assets/media/img/demo-e.png"),

      selectedFeatures: {},

      sections: [],
      options: [],
      features: [],

      forms: [],
    };
  },
  computed: {
    editedItem() {
      return this.$store.getters["wardrobe/editedItem"];
    },
    computedForms() {
      return (this.forms = this.sections);
    },
  },
  mounted: async function () {
    await console.log(this.defaultItem.settings.sections, "s");
    await this.defaultItem.settings.sections.map((section) => {
      this.sections = [...this.sections, section];

      section.options.map((option) => {
        this.options = [...this.options, option];

        option.features.map((feature) => {
          this.features = [...this.features, feature];
        });
      });
    });
    await console.log(
      [this.sections, this.options, this.features],
      [this.computedForms],
      "so"
    );
  },
  methods: {
    changeModel: function (formId) {
      console.log(formId, "fid");
      let selectedFeatures = [];

      document
        .querySelectorAll(`[data-id=section${formId}] select`)
        .forEach((section) => {
          selectedFeatures = [...selectedFeatures, section.value];
          console.log(section.value, selectedFeatures, "forme");
        });
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

    /*selected: function (event, optionId, featureId, sectionId) {
      //console.log(this.forms);
      console.log(event, optionId, featureId, sectionId);

      /*this.forms.sections = new Map();
      this.forms.sections.set('options', []);
      Object.assign(this.selectedFeatures, { optionId: optionId,
      featureId: featureId});
      console.log(this.selectedFeatures);
    },*/

    select: function (event, optionId, featureId) {},
  },
};
</script>

<style scoped>
.items {
  padding: calc(2rem + 0.4vw);
  padding-top: calc(2rem + 0.4vw);
}
.typeHeader {
  font-size: calc(0.4rem + 0.8vw);
  margin-bottom: 25px;
  color: #202122;
  display: inline-block;
}
.section {
  margin-bottom: calc(3rem + 0.4vw);
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
  padding-left: 0.8rem;
  padding: 0.5rem 0.8rem 0.5rem 0.8rem;
  font-size: calc(0.4rem + 0.8vw);
}
</style>