<template>
  <div class="gender-block">
    <!--<label class="checkbox-green">
      <input type="checkbox" v-on:change="sexchange" v-model="sexcheck" />
      <span
        class="checkbox-green-switch"
        data-label-on="Женщина"
        data-label-off="Мужчина"
      ></span>
    </label>-->

    <label class="selectLabel" for="selectGender">Пол</label>
    <select
      class="select"
      v-model="activeGender"
      name="gender"
      id="selectGender"
      @change="sexchange"
    >
      <option
        class="selectOption"
        :id="'gender' + index"
        v-for="(gender, index) in genders"
        :key="gender.id"
        :value="gender.id"
      >
        {{ gender.name }}
      </option>
    </select>
  </div>
</template>

<script>
export default {
  name: "Gender",
  data() {
    return {
      activeGender: 1,
    };
  },
  computed: {
    genders() {
      return this.$store.getters["dummy/dummies"];
    },
  },
  methods: {
    sexchange: function () {
      //console.log(this.$eventHub);
      this.$eventHub.$emit("sexchecker", this.activeGender);
    },
  },

  mounted: async function () {
    await this.$store.dispatch("dummy/getDummies");
    //await console.log(this.dummies);
  },
};
</script>

<style scoped>
.select {
  width: 100%;
  max-width: 100%;
  padding: 0.5rem 0.8rem 0.5rem 0.8rem;
  font-size: calc(0.4rem + 0.8vw);
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
  font-size: calc(0.4rem + 0.8vw);
  color: #777777;
  font-weight: 400;
  text-align: center;
}
.selectCont {
  margin-bottom: calc(0.8rem + 0.4vw);
}
</style>