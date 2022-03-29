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
              v-bind:class="{ active: item.index === activeItem }"
            >
              <img
                src="~/assets/media/img/hidden.svg"
                alt="Иконка показа товара"
              />
            </div>
            <div class="item-image" :data-id="'model' + item.id"></div>
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
import { Service } from "../Service";
export default {
  name: "Stack",
  data() {
    return {
      itemImage: require("@/assets/media/img/std_tshirt.png"),
      plusImg: require("@/assets/media/img/plus.png"),
    };
  },
  computed: {
    wardrobe() {
      return this.$store.getters["wardrobe/wardrobe"];
    },
    elements() {
      return this.$store.getters["wardrobe/elements"];
    },
    editedItem() {
      return this.$store.getters["wardrobe/editedItemIndex"];
    },
    activeItem() {
      return this.$store.getters["wardrobe/activeItem"];
    },
    loadDefaults() {
      return this.$store.getters["wardrobe/loadDefaults"];
    },
  },
  methods: {
    edit: async function (item) {
      this.$store.dispatch("wardrobe/setCurrentItems", item);
    },
    show: function (item) {
      if (this.editedItem !== item.index) {
        //console.log(item);
        this.setActiveType(item);
      }
    },
    copy: function (item) {
      if (this.wardrobe.length < 5) {
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
              if (this.activeItem !== null) {
                let item = this.wardrobe.find(
                  (product) => product.index === this.activeItem
                );
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
          controls.enableDamping = true;
          controls.dampingFactor = 0.04;
          controls.rotateSpeed = 0.4;

          let inst = this;
          //console.log(this.wardrobe);
          let apiItem = this.wardrobe.filter(function (item) {
            //console.log(inst.wardrobe[2], item.id, element.id);
            if (item.id == element.dataset.id.replace(/\D/g, "")) {
              console.log(1);
              console.log(item, "cooo");
              return item;
            }
          });
          console.log(apiItem, scene, "stack");

          this.loadModel(apiItem, scene);

          console.log(this.loadModel(apiItem, scene), "stack");
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
        //console.log(error);
      }
    },

    animate: function (controls, renderer, scene, camera) {
      try {
        requestAnimationFrame(() => {
          //console.log(controls);
          renderer.render(scene, camera);
          controls.update();
          this.animate(controls, renderer, scene, camera);
        });
      } catch (error) {
        console.log(error);
      }
    },
    loadModel: function (apiElement, scene) {
      //console.log(apiElement, Service.defaults(apiElement), "defs");

      let defaults = Service.defaults(apiElement);

      try {
        const loader = new GLTFLoader();
        //console.log(apiElement[0]);
        //console.log(this.$store.getters["wardrobe/wardrobe"]);

        if (this.loadDefaults) {
          defaults.forEach((item) => {
            console.log(item, "for");
            item.models.forEach((model) => {
              console.log(model, "m");
              loader.load(
                "/models/" + model.model_path + "/" + model.model_name + ".glb",
                function (gltf) {
                  let mesh = gltf.scene.children[0];

                  //model.geometry.computeBoundingSphere();
                  //const modelPosInAir = model.geometry.boundingSphere.center;
                  console.log(model, apiElement[0]);

                  mesh.position.set(0, -1.45 * apiElement[0].model_position, 0);
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
          });
        } else {
          console.log(this.elements, apiElement, "mnsdgjfsdrgjibfgd");
          /*console.log(
            this.elements.find((element) => element.item.id == apiElement[0].id),
            "findmmm"
          );*/

          this.elements.forEach((element) => {
            if (element.item.id == apiElement[0].id) {
              element.element.models.forEach((model) => {
                loader.load(
                  "/models/" +
                    model.model_path +
                    "/" +
                    model.model_name +
                    ".glb",
                  function (gltf) {
                    let mesh = gltf.scene.children[0];

                    console.log(model, apiElement[0]);

                    mesh.position.set(
                      0,
                      -1.45 * apiElement[0].model_position,
                      0
                    );
                    gltf.scene.scale.set(10, 10, 10);
                    scene.add(gltf.scene);
                  },
                  undefined,
                  function (error) {
                    console.log(error);
                  }
                );
              });
            }
          });
        }
      } catch (error) {
        console.log(error);
      }
    },

    addDefaultsToElements() {
      !this.loadDefaults ||
        this.wardrobe.forEach((item) => {
          item.settings.sections.forEach((section) => {
            section.elements.forEach((element) => {
              //console.log(element, "eveve");
              this.$store.commit("wardrobe/addElement", [item, element]);
              console.log(this.elements, "eveve");
            });
          });
        });
    },
  },
  mounted() {
    //this.$store.commit("/stopEditing");

    this.$nextTick(() => {
      this.initModels(document.querySelectorAll(".item-image"));
    });

    this.addDefaultsToElements();

    this.$eventHub.$on("wardrobe:changeClothElement", (item) => {
      let domElement = document.querySelector(
        `[data-id=model${item[0].id}]>canvas`
      );
      const domParent = domElement.parentNode;

      domElement.parentNode.removeChild(domElement);

      this.initModels([domParent], false);

      //console.log(item[1], domElement, "wardrobeC");
    });
  },

  watch: {
    wardrobe: function (newWardrobe, oldWardrobe) {
      this.$nextTick(async function () {
        //console.log(newWardrobe.length, oldWardrobe.length);
        if (newWardrobe.length < oldWardrobe.length) return;
        const items = await document.querySelectorAll(".item-image");
        //console.log(items);
        //console.log({ items, newWardrobe });
        await this.initModels([items[items.length - 1]], true);

        this.addDefaultsToElements();
      });
    },
  },
};
</script>