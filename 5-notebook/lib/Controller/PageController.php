<?php

namespace OCA\NoteBook\Controller;

// Access the database through the Mapper defined in lib/Db
use OCA\NoteBook\Db\NoteMapper;
use OCP\AppFramework\Http\TemplateResponse;
use OCP\AppFramework\Services\IInitialState;
use OCP\Collaboration\Reference\RenderReferenceEvent;
use OCP\EventDispatcher\IEventDispatcher;
use OCP\IConfig;
use OCP\IRequest;
use OCP\AppFramework\Controller;

use OCA\NoteBook\AppInfo\Application;
use OCP\PreConditionNotMetException;

class PageController extends Controller {

	public function __construct(
		string   $appName,
		IRequest $request,
		private IEventDispatcher $eventDispatcher,
		private IInitialState $initialStateService,
		private IConfig $config,
		private NoteMapper $noteMapper,
		private ?string $userId
	) {
		parent::__construct($appName, $request);
	}

	/**
	 * @NoAdminRequired
	 * @NoCSRFRequired
	 *
	 * @return TemplateResponse
	 * @throws PreConditionNotMetException
	 */
	public function index(): TemplateResponse {
		$this->eventDispatcher->dispatchTyped(new RenderReferenceEvent());
 		// Use the NoteMapper
		try {
 			$notes = $this->noteMapper->getNotesOfUser($this->userId);
 		} catch (\Exception | \Throwable $e) {
 			$notes = []; // Instruction used to load the app without the database
		}
		$selectedNoteId = (int) $this->config->getUserValue($this->userId, Application::APP_ID, 'selected_note_id', '0');
		$state = [
			'notes' => $notes,
			'selected_note_id' => $selectedNoteId,
		];
		$this->initialStateService->provideInitialState('notes-initial-state', $state);
		// Load the main template defined in templates/
		return new TemplateResponse(Application::APP_ID, 'main');
	}
}
