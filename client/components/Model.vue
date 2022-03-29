<template>
  <div id="dummy"></div>
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
} from "three-full";
export default {
  name: "Dummy3D",
  data() {
    return {
      global: {
        scene: null,
        loader: null,
        camera: null,
        renderer: null,
        controls: null,
      },
      activeModel: null,
    };
  },
  computed: {
    dummy() {
      //console.log(this.$store.getters['dummy/dummy'], 'g');
      return this.$store.getters["dummy/dummy"];
    },
  },
  methods: {
    init: function () {
      let t = this;
      let global = this.global;

      t.$el.innerHTML = "";

      global.scene = new Scene();
      const hemiLight = new HemisphereLight(0xffffff, 0x444444);
      hemiLight.position.set(0, 20, 0);
      global.scene.add(hemiLight);
      global.scene.background = new Color(0x7d7d7d); //new THREE.TextureLoader().load(require('@/assets/dummy-bg.png'));

      global.loader = new GLTFLoader();
      global.loader.load("models/" + t.dummy.dummy_url, async function (gltf) {
        //await console.log(gltf, t.dummy.dummy_url, 'sc');
        await t.global.scene.add(gltf.scene);
        //await console.log(gltf, t.dummy.dummy_url, 'sc');
      });

      global.camera = new PerspectiveCamera(
        45,
        t.$el.offsetWidth / t.$el.offsetHeight,
        1,
        100
      );
      global.camera.position.set(0, 3.7, 1);

      global.renderer = new WebGLRenderer({ antialias: true });
      global.renderer.setSize(t.$el.offsetWidth, t.$el.offsetHeight);
      //this.renderer.outputEncoding = 3001; //THREE.sRGBEncoding;
      global.renderer.shadowMap.enabled = true;
      t.$el.appendChild(global.renderer.domElement);

      global.controls = new OrbitControls(
        global.camera,
        global.renderer.domElement
      );

      global.controls.enablePan = true;
      global.controls.screenSpacePanning = true;
      global.controls.enableZoom = true;
      global.controls.enableRotate = true;
      global.controls.minPolarAngle = Math.PI / 2.2; //Math.PI/2;
      global.controls.maxPolarAngle = Math.PI / 1.8; //Math.PI/2;
      global.controls.target.set(0, 1, 0);
      global.controls.update();
    },
    animate: function () {
      requestAnimationFrame(this.animate);
      this.global.renderer.render(this.global.scene, this.global.camera);
    },
    resize: function () {
      this.global.renderer.setSize(this.$el.offsetWidth, this.$el.offsetHeight);
      this.global.camera.aspect = this.$el.offsetWidth / this.$el.offsetHeight;
      this.global.camera.updateProjectionMatrix();
      this.global.renderer.render(this.global.scene, this.global.camera);
    },
    reloadsex: async function (sex) {
      //await console.log(sex, "s");
      if (this.activeModel) {
        //this.global.scene.remove(this.activeModel);
      }

      try {
        await this.$store.dispatch("dummy/getDummy", sex);
      } catch (error) {
        console.log(error);
      }
      this.activeModel = await dummy;

      await this.init();
      //this.global.scene.add(this.activeModel);
    },
    /*changeClothes: function (type, modelName, color = false) {
      let t = this;
      if (type in this.activeClothes) {
        this.global.loader.load(
          this.activeClothes[type].path + "/" + modelName + ".glb",
          function (gltf) {
            t.global.scene.remove(t.activeClothes[type].active);
            t.activeClothes[type].active = gltf.scene;
            t.global.scene.add(t.activeClothes[type].active);
            if (color) {
              t.changecolor(type, color);
            }
          }
        );
      }
    },*/
    changecolor: function (type, color) {
      let newcolor = new MeshStandardMaterial({
        color: Number(color.replace("#", "0x")),
      });
      this.activeClothes[type].active.traverse(function (object3D) {
        if (object3D.isMesh) {
          object3D.material = newcolor;
        }
      });
    },
    cleanModel: function () {
      for (let i in this.activeClothes) {
        this.activeClothes[i].color = null;
        this.global.scene.remove(this.activeClothes[i].active);
        this.activeClothes[i].active = null;
      }
    },
  },
  mounted: async function () {
    this.activeModel = await this.$store.dispatch("dummy/getDummy", 1);

    //console.log(this.$store, 'mou');
    await this.init();
    //await console.log(this.activeModel, "m");
    //await this.global.scene.add(this.activeModel);
    await this.animate();
    window.addEventListener(
      "resize",
      () => {
        this.resize();
      },
      true
    );
    await this.$eventHub
      .$on("dummy:dummy_load", () => {
        this.reloadsex(1);
      })
      .$on("dummy:sexchecker", (value) => {
        //console.log(value, 'val');
        this.reloadsex(value);
        //console.log(this.global.scene, "s");
        this.cleanModel();
      })
      .$on("dummy:changeClothElement", (element) => {
        console.log(element, "dummyC");
      })
      /*.$on("dummy:dummy_reload_tshirt", (type, modelName, color = null) => {
        this.changeClothes(type, modelName, color);
      })*/
      .$on("dummy:changecolor_tshirt", (element, color) => {
        this.changecolor(element, color);
      })
      .$on("dummy:clean_model", () => {
        this.cleanModel();
      });
  },
};
</script>
