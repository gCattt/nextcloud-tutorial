<template>
	<div class="main-content">
		<h2>
			{{ note.name }}
		</h2>
		<!-- maxlength defines how large the input field is -->
		<NcRichContenteditable
			class="content-editable"
			:value="note.content"
			:maxlength="10000"
			:multiline="true"
			:placeholder="t('notebook', 'Write a note')"
			@update:value="onUpdateValue" />
	</div>
</template>

<script>
import NcRichContenteditable from '@nextcloud/vue/dist/Components/NcRichContenteditable.js'

import { delay } from '../utils.js'

export default {
	// This is the part where users can write and save notes
	name: 'MyMainContent',

	components: {
		NcRichContenteditable,
	},

	props: {
		note: {
			type: Object,
			required: true,
		},
	},

	data() {
		return {
		}
	},

	computed: {
	},

	watch: {
	},

	mounted() {
	},

	beforeDestroy() {
	},

	// The input gets automatically saved using the utils.js script
	methods: {
		onUpdateValue(newValue) {
			delay(() => {
				this.$emit('edit-note', this.note.id, newValue)
			}, 2000)()
		},
	},
}
</script>

<style scoped lang="scss">
.main-content {
	height: 100%;
	display: flex;
	flex-direction: column;
	align-items: center;
	justify-content: center;

	.content-editable {
		min-width: 600px;
		min-height: 200px;
	}
}
</style>
