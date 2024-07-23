<template>
	<!-- You can also add Vue components here -->
	<NcDashboardWidget :items="items"
		:show-more-url="showMoreUrl"
		:show-more-text="title"
		:loading="state === 'loading'">
		<template #empty-content>
			<NcEmptyContent :title="t('catgifsdashboard', 'No gifs found')">
				<template #icon>
					<FolderIcon />
				</template>
			</NcEmptyContent>
		</template>
	</NcDashboardWidget>
</template>

<script>
import FolderIcon from 'vue-material-design-icons/Folder.vue'

import NcDashboardWidget from '@nextcloud/vue/dist/Components/NcDashboardWidget.js'
import NcEmptyContent from '@nextcloud/vue/dist/Components/NcEmptyContent.js'

import { generateUrl } from '@nextcloud/router'
import { loadState } from '@nextcloud/initial-state'

export default {
	name: 'GifWidget',

	// list of components that will be used in this component
	components: {
		FolderIcon,
		NcDashboardWidget,
		NcEmptyContent,
	},
	// component properties
	props: {
		title: {
			type: String,
			required: true,
		},
	},

	data() {
		return {
			gifItems: loadState('catgifsdashboard', 'dashboard-widget-items'),
			showMoreUrl: generateUrl('/apps/files'),
			state: 'ok',
		}
	},
	// properties recomputed dinamically
	computed: {
		items() {
			return this.gifItems.map((g) => {
				return {
					id: g.id,
					targetUrl: g.link,
					avatarUrl: g.iconUrl,
					mainText: g.title,
					subText: g.subtitle,
				}
			})
		},
	},

	watch: {
	},

	beforeDestroy() {
	},

	beforeMount() {
	},

	mounted() {
	},
	// component methods that you can call anywhere in the component
	methods: {
	},
}
</script>

<style scoped lang="scss">
// nothing
</style>
