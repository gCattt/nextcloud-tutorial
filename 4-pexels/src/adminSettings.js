import Vue from 'vue'
import AdminSettings from './components/AdminSettings.vue'
// Use the Nextcloud translations functions in our Vue.js components.
Vue.mixin({ methods: { t, n } })

const VueSettings = Vue.extend(AdminSettings)
new VueSettings().$mount('#pexels_prefs')
