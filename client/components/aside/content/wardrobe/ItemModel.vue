<template>
  <div class="item-image"></div>
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
} from "three-full";

export default {
  props: {
    item: Object,
  },

  data() {
    return {
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
      activeModel: null,
    };
  },

  computed: {
    wardrobeItem(index) {
      return this.$store.getters["wardrobe/wardrobe"].find(
        (item) => item.index === index
      );
    },
  },

  methods: {
    init: function () {
      let global = this.global;

      //let conts = document.querySelector(".item-image");

      //console.log(cont.offsetWidth);
      this.$store.getters["wardrobe/wardrobe"].forEach((curItem) => {
        this.loadModel(curItem);
        this.createSсene();
      });
    },

    loadModel: function (curItem) {
      
      console.log(curItem);
      //load model
      global.loader = new GLTFLoader();
      global.loader.load(
        this.activeClothes[curItem.type].path + '/' + curItem.modelName + '.glb',
        function (gltf) {
          console.log(gltf.scene.children[0]);
          global.scene.add(gltf.scene);
          gltf.scene.children[0].position.set(0, -3.5, 0);
          gltf.scene.children[0].scale.set(3, 3, 3);
        },
        undefined,
        function (error) {
          console.log(error);
        }
      );

      
    },

    createSсene: function () {
      let global = this.global;
      
      //set scene
      global.scene = new Scene();
      global.scene.background = new Color(0xffffff);

      //set camera
      global.camera = new PerspectiveCamera(
        75,
        cont.offsetWidth / cont.offsetHeight,
        0.1,
        1000
      );
      global.camera.position.set(5, 20, 5);
      global.camera.lookAt(new Vector3(0, 0, 0));

      //set renderer
      global.renderer = new WebGLRenderer({ antialias: true });
      global.renderer.setSize(cont.offsetWidth, cont.offsetHeight);

      //set light
      const ambient = new AmbientLight(this.colors.lightColor, 1);
      global.scene.add(ambient);
      global.scene.scale.multiplyScalar(10);

      const light = new PointLight(0xc4c4c4, 1);
      light.position.set(20, 0, 20);
      global.scene.add(light);

      //controls
      global.controls = new OrbitControls(
        global.camera,
        global.renderer.domElement
      );
      global.controls.enableZoom = false;
      global.controls.enablePan = false;

      cont.appendChild(global.renderer.domElement);
      console.log(this.wardrobe, this.activeBody);
      this.animate();
    },

    animate: function () {
      requestAnimationFrame(this.animate);
      this.global.controls.update();
      this.global.renderer.render(this.global.scene, this.global.camera);
    },
  },
  mounted() {
    this.$nextTick(async function () {
      this.init();
    });
  },
};
</script>