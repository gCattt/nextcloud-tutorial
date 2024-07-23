// import statement for translations
import {
	translate as t,
	// translatePlural as n,
} from '@nextcloud/l10n'
import { loadState } from '@nextcloud/initial-state'

// manipulate the widget received by the 'el' function
function renderWidget(el) {
	// create HTML elements to append in our widget
	const gifItems = loadState('catgifsdashboard', 'dashboard-widget-items')

	const paragraph = document.createElement('p')
	paragraph.textContent = t('catgifsdashboard', 'You can define the frontend part of a widget with plain Javascript.')
	el.append(paragraph)

	const paragraph2 = document.createElement('p')
	paragraph2.textContent = t('catgifsdashboard', 'Here is the list of files in your gif folder:')
	el.append(paragraph2)

	// Since we are using data from the initial-state, the data is only loaded on page load so it is static.
	// If you modify the files listed, you will not see this change unless you refresh the page.
	const list = document.createElement('ul')
	list.classList.add('widget-list')
	gifItems.forEach(item => {
		const li = document.createElement('li')
		li.textContent = item.title
		list.append(li)
	})
	el.append(list)
}

// wait for the page to be fully loaded and then tell the dashboard we want to register a widget
document.addEventListener('DOMContentLoaded', () => {
	OCA.Dashboard.register('catgifsdashboard-simple-widget', (el, { widget }) => {
		renderWidget(el)
	})
})
