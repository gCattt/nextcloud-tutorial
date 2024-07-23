import { registerWidget } from '@nextcloud/vue-richtext'
import PhotoReferenceWidget from './views/PhotoReferenceWidget.vue'
import Vue from 'vue'
Vue.mixin({ methods: { t, n } })

// This component defines how we want to render the link
registerWidget('pexels_photo', (el, { richObjectType, richObject, accessible }) => {
	// Callback to the Nextcloud reference system, called each time a Pexel link is rendered.
	const Widget = Vue.extend(PhotoReferenceWidget)
	new Widget({
		propsData: {
			richObjectType,
			richObject,
			accessible,
		},
	}).$mount(el)
})
