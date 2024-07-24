<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitText
{
    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'OCA\\Text\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'OCA\\Text\\' => 
        array (
            0 => __DIR__ . '/..' . '/../lib',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'OCA\\Text\\AppInfo\\Application' => __DIR__ . '/..' . '/../lib/AppInfo/Application.php',
        'OCA\\Text\\Command\\ResetDocument' => __DIR__ . '/..' . '/../lib/Command/ResetDocument.php',
        'OCA\\Text\\Controller\\AttachmentController' => __DIR__ . '/..' . '/../lib/Controller/AttachmentController.php',
        'OCA\\Text\\Controller\\ISessionAwareController' => __DIR__ . '/..' . '/../lib/Controller/ISessionAwareController.php',
        'OCA\\Text\\Controller\\NavigationController' => __DIR__ . '/..' . '/../lib/Controller/NavigationController.php',
        'OCA\\Text\\Controller\\PublicSessionController' => __DIR__ . '/..' . '/../lib/Controller/PublicSessionController.php',
        'OCA\\Text\\Controller\\SessionController' => __DIR__ . '/..' . '/../lib/Controller/SessionController.php',
        'OCA\\Text\\Controller\\SettingsController' => __DIR__ . '/..' . '/../lib/Controller/SettingsController.php',
        'OCA\\Text\\Controller\\TSessionAwareController' => __DIR__ . '/..' . '/../lib/Controller/TSessionAwareController.php',
        'OCA\\Text\\Controller\\UserApiController' => __DIR__ . '/..' . '/../lib/Controller/UserApiController.php',
        'OCA\\Text\\Controller\\WorkspaceController' => __DIR__ . '/..' . '/../lib/Controller/WorkspaceController.php',
        'OCA\\Text\\Cron\\Cleanup' => __DIR__ . '/..' . '/../lib/Cron/Cleanup.php',
        'OCA\\Text\\DAV\\WorkspacePlugin' => __DIR__ . '/..' . '/../lib/DAV/WorkspacePlugin.php',
        'OCA\\Text\\Db\\Document' => __DIR__ . '/..' . '/../lib/Db/Document.php',
        'OCA\\Text\\Db\\DocumentMapper' => __DIR__ . '/..' . '/../lib/Db/DocumentMapper.php',
        'OCA\\Text\\Db\\Session' => __DIR__ . '/..' . '/../lib/Db/Session.php',
        'OCA\\Text\\Db\\SessionMapper' => __DIR__ . '/..' . '/../lib/Db/SessionMapper.php',
        'OCA\\Text\\Db\\Step' => __DIR__ . '/..' . '/../lib/Db/Step.php',
        'OCA\\Text\\Db\\StepMapper' => __DIR__ . '/..' . '/../lib/Db/StepMapper.php',
        'OCA\\Text\\DirectEditing\\TextDirectEditor' => __DIR__ . '/..' . '/../lib/DirectEditing/TextDirectEditor.php',
        'OCA\\Text\\DirectEditing\\TextDocumentCreator' => __DIR__ . '/..' . '/../lib/DirectEditing/TextDocumentCreator.php',
        'OCA\\Text\\Event\\LoadEditor' => __DIR__ . '/..' . '/../lib/Event/LoadEditor.php',
        'OCA\\Text\\Exception\\DocumentHasUnsavedChangesException' => __DIR__ . '/..' . '/../lib/Exception/DocumentHasUnsavedChangesException.php',
        'OCA\\Text\\Exception\\DocumentSaveConflictException' => __DIR__ . '/..' . '/../lib/Exception/DocumentSaveConflictException.php',
        'OCA\\Text\\Exception\\InvalidDocumentBaseVersionEtagException' => __DIR__ . '/..' . '/../lib/Exception/InvalidDocumentBaseVersionEtagException.php',
        'OCA\\Text\\Exception\\InvalidSessionException' => __DIR__ . '/..' . '/../lib/Exception/InvalidSessionException.php',
        'OCA\\Text\\Exception\\UploadException' => __DIR__ . '/..' . '/../lib/Exception/UploadException.php',
        'OCA\\Text\\Exception\\VersionMismatchException' => __DIR__ . '/..' . '/../lib/Exception/VersionMismatchException.php',
        'OCA\\Text\\Listeners\\AddMissingIndicesListener' => __DIR__ . '/..' . '/../lib/Listeners/AddMissingIndicesListener.php',
        'OCA\\Text\\Listeners\\BeforeAssistantNotificationListener' => __DIR__ . '/..' . '/../lib/Listeners/BeforeAssistantNotificationListener.php',
        'OCA\\Text\\Listeners\\BeforeNodeDeletedListener' => __DIR__ . '/..' . '/../lib/Listeners/BeforeNodeDeletedListener.php',
        'OCA\\Text\\Listeners\\BeforeNodeRenamedListener' => __DIR__ . '/..' . '/../lib/Listeners/BeforeNodeRenamedListener.php',
        'OCA\\Text\\Listeners\\BeforeNodeWrittenListener' => __DIR__ . '/..' . '/../lib/Listeners/BeforeNodeWrittenListener.php',
        'OCA\\Text\\Listeners\\FilesLoadAdditionalScriptsListener' => __DIR__ . '/..' . '/../lib/Listeners/FilesLoadAdditionalScriptsListener.php',
        'OCA\\Text\\Listeners\\FilesSharingLoadAdditionalScriptsListener' => __DIR__ . '/..' . '/../lib/Listeners/FilesSharingLoadAdditionalScriptsListener.php',
        'OCA\\Text\\Listeners\\LoadEditorListener' => __DIR__ . '/..' . '/../lib/Listeners/LoadEditorListener.php',
        'OCA\\Text\\Listeners\\LoadViewerListener' => __DIR__ . '/..' . '/../lib/Listeners/LoadViewerListener.php',
        'OCA\\Text\\Listeners\\NodeCopiedListener' => __DIR__ . '/..' . '/../lib/Listeners/NodeCopiedListener.php',
        'OCA\\Text\\Listeners\\RegisterDirectEditorEventListener' => __DIR__ . '/..' . '/../lib/Listeners/RegisterDirectEditorEventListener.php',
        'OCA\\Text\\Listeners\\RegisterTemplateCreatorListener' => __DIR__ . '/..' . '/../lib/Listeners/RegisterTemplateCreatorListener.php',
        'OCA\\Text\\Middleware\\Attribute\\RequireDocumentBaseVersionEtag' => __DIR__ . '/..' . '/../lib/Middleware/Attribute/RequireDocumentBaseVersionEtag.php',
        'OCA\\Text\\Middleware\\Attribute\\RequireDocumentSession' => __DIR__ . '/..' . '/../lib/Middleware/Attribute/RequireDocumentSession.php',
        'OCA\\Text\\Middleware\\Attribute\\RequireDocumentSessionOrUserOrShareToken' => __DIR__ . '/..' . '/../lib/Middleware/Attribute/RequireDocumentSessionOrUserOrShareToken.php',
        'OCA\\Text\\Middleware\\SessionMiddleware' => __DIR__ . '/..' . '/../lib/Middleware/SessionMiddleware.php',
        'OCA\\Text\\Migration\\ResetSessionsBeforeYjs' => __DIR__ . '/..' . '/../lib/Migration/ResetSessionsBeforeYjs.php',
        'OCA\\Text\\Migration\\Version010000Date20190617184535' => __DIR__ . '/..' . '/../lib/Migration/Version010000Date20190617184535.php',
        'OCA\\Text\\Migration\\Version030001Date20200402075029' => __DIR__ . '/..' . '/../lib/Migration/Version030001Date20200402075029.php',
        'OCA\\Text\\Migration\\Version030201Date20201116110353' => __DIR__ . '/..' . '/../lib/Migration/Version030201Date20201116110353.php',
        'OCA\\Text\\Migration\\Version030201Date20201116123153' => __DIR__ . '/..' . '/../lib/Migration/Version030201Date20201116123153.php',
        'OCA\\Text\\Migration\\Version030501Date20220202101853' => __DIR__ . '/..' . '/../lib/Migration/Version030501Date20220202101853.php',
        'OCA\\Text\\Migration\\Version030701Date20230207131313' => __DIR__ . '/..' . '/../lib/Migration/Version030701Date20230207131313.php',
        'OCA\\Text\\Migration\\Version030901Date20231114150437' => __DIR__ . '/..' . '/../lib/Migration/Version030901Date20231114150437.php',
        'OCA\\Text\\Migration\\Version040100Date20240611165300' => __DIR__ . '/..' . '/../lib/Migration/Version040100Date20240611165300.php',
        'OCA\\Text\\Notification\\Notifier' => __DIR__ . '/..' . '/../lib/Notification/Notifier.php',
        'OCA\\Text\\Service\\ApiService' => __DIR__ . '/..' . '/../lib/Service/ApiService.php',
        'OCA\\Text\\Service\\AttachmentService' => __DIR__ . '/..' . '/../lib/Service/AttachmentService.php',
        'OCA\\Text\\Service\\ConfigService' => __DIR__ . '/..' . '/../lib/Service/ConfigService.php',
        'OCA\\Text\\Service\\DocumentService' => __DIR__ . '/..' . '/../lib/Service/DocumentService.php',
        'OCA\\Text\\Service\\EncodingService' => __DIR__ . '/..' . '/../lib/Service/EncodingService.php',
        'OCA\\Text\\Service\\InitialStateProvider' => __DIR__ . '/..' . '/../lib/Service/InitialStateProvider.php',
        'OCA\\Text\\Service\\NotificationService' => __DIR__ . '/..' . '/../lib/Service/NotificationService.php',
        'OCA\\Text\\Service\\SessionService' => __DIR__ . '/..' . '/../lib/Service/SessionService.php',
        'OCA\\Text\\Service\\WorkspaceService' => __DIR__ . '/..' . '/../lib/Service/WorkspaceService.php',
        'OCA\\Text\\TextFile' => __DIR__ . '/..' . '/../lib/TextFile.php',
        'OCA\\Text\\YjsMessage' => __DIR__ . '/..' . '/../lib/YjsMessage.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitText::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitText::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitText::$classMap;

        }, null, ClassLoader::class);
    }
}
