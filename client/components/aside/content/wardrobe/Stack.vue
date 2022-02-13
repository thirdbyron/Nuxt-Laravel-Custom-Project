<template>
  <div class="stack">
    <div class="stack-content">
      <div class="stack-top">
        <span>Мой гардероб</span>
        <div class="stack-counter">
          {{ wardrobe.length }}
        </div>
      </div>
      <client-only>
        <div class="add-model-tip" v-if="wardrobe.length === 0">
          <img :src="plusImg" />
          <span>Добавьте модель</span>
        </div>
      </client-only>
      <div class="selected-items">
        <div
          class="selected-item"
          v-for="item in wardrobe"
          :key="item.index"
          v-bind:class="{ active: item.index === editedItem }"
        >
          <div class="main-block">
            <div
              class="eye-hidden"
              v-bind:class="{ active: item.index === activeBody }"
            >
              <img
                src="~/assets/media/img/hidden.svg"
                alt="Иконка показа товара"
              />
            </div>
            <div class="item-image" :id="'model' + item.id"></div>
            <span class="price">{{ item.start_price }} ₽</span>
            <div class="controls">
              <div class="control-btn" @click="remove(item)">
                <img src="~/assets/media/img/close.svg" />
              </div>
              <div class="control-btn" @click="show(item)">
                <img src="~/assets/media/img/eye.svg" />
              </div>
              <div class="control-btn" @click="copy(item)">
                <img src="~/assets/media/img/copy.svg" />
              </div>
              <div class="control-btn" @click="toCart(item)">
                <img src="~/assets/media/img/cart.svg" />
              </div>
            </div>
          </div>
          <div class="action-edit">
            <button @click="edit(item)">Редактор</button>
          </div>
        </div>
      </div>
    </div>
    <div class="remove-button" v-on:click="removeAll">Удалить все</div>
  </div>
</template>

<script>
import {
  Scene,
  HemisphereLight,
  PerspectiveCamera,
  Color,
  WebGLRenderer,
  OrbitControls,
  MeshStandardMaterial,
  GLTFLoader,
  AmbientLight,
  PointLight,
  Vector3,
  Matrix4,
} from "three-full";

export default {
  name: "Stack",
  data() {
    return {
      itemImage: require("@/assets/media/img/std_tshirt.png"),
      plusImg: require("@/assets/media/img/plus.png"),

      global: {
        scene: null,
        camera: null,
        renderer: null,
        loader: null,
        controls: null,
      },
      colors: {
        bgColor: 0xf0f0f0,
        lightColor: 0xffffff,
      },
    };
  },
  computed: {
    wardrobe() {
      return this.$store.getters["wardrobe/wardrobe"];
    },
    editedItem() {
      return this.$store.getters["wardrobe/editedItemIndex"];
    },
    activeBody() {
      return this.$store.getters["wardrobe/activeBody"];
    },
  },
  methods: {
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
    setActiveType: function (item) {
      let settings = {
        type: item.type,
        index: item.index,
      };
      if (this.activeBody === item.index) {
        this.$eventHub.$emit("dummy:clean_model");
        settings.index = null;
      } else {
        this.reloadModel(item.settings);
      }
      this.$store.commit("wardrobe/setActiveClothes", settings);
    },
    edit: function (item) {
      this.$store.dispatch("wardrobe/setCurrentItems", item);
      this.reloadModel(item.settings);
    },
    show: function (item) {
      if (this.editedItem !== item.index) {
        //console.log(item);
        this.setActiveType(item);
      }
    },
    copy: function (item) {
      if (this.$store.getters["wardrobe/wardrobe"].length < 5) {
        this.$store.commit("wardrobe/copy", item.index);
      } else {
        this.$modal.show("dialog", {
          title: "Достигнут лимит гардероба!",
          text: "При копировании достигнут лимит гардероба, удалите одну или несколько вещей чтобы освободить место",
          buttons: [
            {
              title: "Понятно",
              handler: () => {
                this.$modal.hide("dialog");
              },
            },
          ],
        });
      }
    },
    toCart: function (item) {
      //console.log(item);
      this.$store.commit("cart/add", item);
    },
    remove: function (item) {
      this.$modal.show("dialog", {
        title: "Подвтержение удаления!",
        text: "Вы уверены что хотите удалить вещь со всеми её конфигурациями?",
        buttons: [
          {
            title: "Нет",
            handler: () => {
              this.$modal.hide("dialog");
            },
          },
          {
            title: "Да",
            handler: () => {
              this.$store.commit("wardrobe/remove", item);
              this.$modal.hide("dialog");
              if (this.activeBody !== null) {
                let item = this.wardrobe.find(
                  (product) => product.index === this.activeBody
                );
                this.reloadModel(item.settings);
              } else {
                this.$eventHub.$emit("dummy:clean_model");
              }
              if (
                this.editedItem === item.index ||
                this.wardrobe.length === 0
              ) {
                this.$store.commit("wardrobe/stopEditing");
              }
            },
          },
        ],
      });
    },
    removeAll: function () {
      this.$modal.show("dialog", {
        title: "Подвтержение удаления!",
        text: "Вы уверены что хотите удалить все вещи со всеми их конфигурациями?",
        buttons: [
          {
            title: "Нет",
            handler: () => {
              this.$modal.hide("dialog");
            },
          },
          {
            title: "Да",
            handler: () => {
              this.$store.commit("wardrobe/stopEditing");
              this.$store.commit("wardrobe/clear");
              this.$modal.hide("dialog");
              this.$eventHub.$emit("dummy:clean_model");
            },
          },
        ],
      });
    },

    initModels: function (domElements = []) {
      try {
        domElements.forEach((element) => {
          //this.initModelScene(element);
          //console.log(element.children.length);
          //console.log(element.innerHTML);
          //if( element.children.length >= 1 ) element.innerHTML = '';

          let global = this.global;

          //set scene
          const scene = new Scene();
          scene.background = new Color(0xffffff);

          //set renderer
          const renderer = new WebGLRenderer({ antialias: true });
          renderer.setSize(element.offsetWidth, element.offsetHeight);

          //appending in dom
          element.appendChild(renderer.domElement);

          //set camera
          const camera = new PerspectiveCamera(
            60,
            element.offsetWidth / element.offsetHeight,
            1,
            1000
          );
          camera.position.set(0, 10, 0);

          //controls
          const controls = new OrbitControls(camera, renderer.domElement);
          controls.enableZoom = false;
          controls.enablePan = false;
          controls.enablePan = false;
          controls.screenSpacePanning = true;
          controls.enableRotate = true;
          controls.minPolarAngle = Math.PI / 3;
          controls.maxPolarAngle = Math.PI / 1.5;
          controls.target.set(0, 1, 0);

          let inst = this;
          var apiItem = this.wardrobe.filter(function (item) {
            console.log(inst.wardrobe[2], item.id, element.id);
            if (item.id == element.id.replace(/\D/g, "")) {
              return item;
            }
          });
          console.log(apiItem);

          this.loadModel(apiItem, scene);

          //set light
          /*const ambient = new AmbientLight(this.colors.lightColor, 1);
          scene.add(ambient);
          scene.scale.multiplyScalar(10);*/

          const light = new PointLight(0xc4c4c4, 1);
          light.position.set(10, 10, 5);
          scene.add(light);

          const sphereLight = new HemisphereLight(0xffffff, 0x000000, 2);
          scene.add(sphereLight);

          camera.position.set(0, 0, 10);

          this.animate(controls, renderer, scene, camera);
        });

        /*this.wardrobe.forEach((apiElement, index) => {
          let domElement = document.querySelector(
            "#model" + index + " > canvas"
          );
          this.loadModel(domElement, apiElement);
        });*/
      } catch (error) {
        console.log(error);
      }
    },

    animate: function (controls, renderer, scene, camera) {
      try {
        requestAnimationFrame(() => {
          //console.log(renderer);
          renderer.render(scene, camera);
          controls.update();
          this.animate(controls, renderer, scene, camera);
        });
      } catch (error) {
        console.log(error);
      }
    },
    loadModel: function (apiElement, scene) {
      //console.log(apiElement, scene);

      try {
        const loader = new GLTFLoader();

        apiElement[0].defaults.forEach((item) => {
          console.log(item);
          loader.load(
            "/models/" + item.model_path + "/" + item.model_name + ".glb",
            function (gltf) {
              let model = gltf.scene.children[0];
              const color = item.color.slice(1);

              //model.geometry.computeBoundingSphere();
              //const modelPosInAir = model.geometry.boundingSphere.center;
              console.log(model, apiElement[0], item.color);

              if (model.children.length > 0) {
                model.children.forEach(async function (mesh) {
                  mesh.material.color.setHex("0x" + color);
                });
              } else {
                model.material.color.setHex("0x" + color);
              }

              model.position.set(0, -1.45 * apiElement[0].model_position, 0);
              //model.rotation.set(90, 0, 0);
              gltf.scene.scale.set(10, 10, 10);
              scene.add(gltf.scene);
            },
            undefined,
            function (error) {
              console.log(error);
            }
          );
        });
      } catch (error) {
        console.log(error);
      }
    },
  },
  mounted() {
    this.$store.commit("wardrobe/stopEditing");
    this.$store.commit("wardrobe/resetGender");

    this.$nextTick(() => {
      this.initModels(document.querySelectorAll(".item-image"));
    });
  },

  watch: {
    wardrobe: function (newWardrobe, oldWardrobe) {
      this.$nextTick(async function () {
        if (newWardrobe.length < oldWardrobe.length) return;
        const items = await document.querySelectorAll(".item-image");
        //console.log({ items, newWardrobe });
        await this.initModels([items[items.length - 1]]);
      });
    },
  },
};
</script>