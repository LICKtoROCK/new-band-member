const VModal = window["vue-js-modal"].default

Vue.use(VModal);
const app = new Vue({
  el: '#app',
  methods: {
    show : function() {
      this.$modal.show('recruit');
    },
    hide : function () {
      this.$modal.hide('recruit');
    },
    show2 : function() {
      this.$modal.show('searchPrefectures');
    },
    hide2 : function() {
      this.$modal.hide('searchPrefectures');      
    },
    show3 : function() {
      this.$modal.show('searchParts');
    },
    hide3 : function() {
      this.$modal.hide('searchParts');      
    },    
  }
});