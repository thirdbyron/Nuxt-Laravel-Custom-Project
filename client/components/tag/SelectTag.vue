<template>
  <div class="selectCont">
    <label class="selectLabel" :for="'select' + selectItem.id">{{
      selectItem.name
    }}</label>
    <select
      class="select"
      v-model="value"
      :name="selectItem.name"
      :data-id="'option' + selectItem.id"
      
      
    >
      {{
        innerItems
      }}
      <option
        class="selectOption"
        
        v-for="(innerItem, i) in innerItems"
        :key="i"
        :value="innerItem.id"
        :data-id="selectName + innerItem.id"
      >
        {{ innerItem.name }}
      </option>
    </select>
  </div>
</template>

<script>
export default {
  props: {
    selectItem: Object,
    vModel: String,
    innerItems: Array,
    selectName: String,
    selectGroup: Number,
  },

  data: function() {
    return{
      value: null,
    }
  },

  mounted: function () {
    this.value = this.vModel;
    console.log(this.selectItem, this.innerItems, "s");
  },
  methods: {
    /*selected: function(value) {
      this.$emit('change:selected', value, this.selectItem.id, this.value, this.selectGroup);
    }*/
  }
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