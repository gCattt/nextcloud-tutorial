import Vue from 'vue'
// The vueBootstrap.js file makes it possible to use the translation functions in our Vue components.
import './vueBootstrap.js'
// The GifWidget.vue file is the Vue component for the widget that could be inserted everywhere
import GifWidget from './views/GifWidget.vue'

document.addEventListener('DOMContentLoaded', () => {
	OCA.Dashboard.register('catgifsdashboard-vue-widget', (el, { widget }) => {
		const View = Vue.extend(GifWidget)
		new View({
			propsData: { title: widget.title },
		}).$mount(el)
	})
})
