<template>
  <div class="selectCont">
    <label class="selectLabel" :for="'select'+selectItem.id">{{selectItem.name}}</label>
    <select class="select"
    v-model="vModel" :name="selectItem.name" :id="'select'+selectItem.id">
      <option
        class="selectOption"
        :id= innerItem + feature.id
        v-for="(innerItem, i) in selectItem.innerItems"
        :key="i"
        :value="innerItem.id"
      >
        {{innerItem.name}}
      </option>
    </select>
  </div>
</template>

<script>
export default {
  props: {
    selectItem: Object,
    vModel: String,
    innerItems: String,
  },

  mounted: function () {
    console.log(this.selectItem);
  },
};
</script>

<style>
.select {
  width: 100%;
  max-width: 100%;
  padding: 0.5rem 0.8rem 0.5rem 0.8rem;
  font-size: calc(0.6rem + 0.8vw);
  cursor: pointer;
  background-color: #eeeeee;
  line-height: 1.5;
  margin-top: calc(0.2rem + 0.4vw);
}
.select::after {
  content: "";
  width: 0.8em;
  height: 0.5em;
  background-color: #777777;
  clip-path: polygon(100% 0%, 0 0%, 50% 100%);
}
.selectLabel {
  font-size: calc(0.2rem + 0.8vw);
  color: #777777;
  font-weight: 400;
}
.selectCont {
  margin-bottom: calc(0.8rem + 0.4vw);
}
</style>