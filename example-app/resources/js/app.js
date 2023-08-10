import { createApp, Vue } from "vue";
import Welcome from "./Welcome.vue";
// import './bootstrap';
const MyComponent = Vue.extend({
    template: '<div>This is my component!</div>',
  });

  createApp({ render: () => h(Welcome) }).mount("#app");