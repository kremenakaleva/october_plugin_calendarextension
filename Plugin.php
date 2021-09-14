<?php namespace Pensoft\Calendarextension;

use System\Classes\PluginBase;
use Pensoft\Calendar\Controllers\Entries as EntriesController;
use Pensoft\Calendar\Models\Entry as EntryModel;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
    }

    public function registerSettings()
    {
    }

    public function boot()
	{
		if(class_exists('\Pensoft\Calendar\Controllers\Entries')){
			EntriesController::extendFormFields(function($form, $model){
				if (!$model instanceof \Pensoft\Calendar\Models\Entry) {
					return;
				}

				$form->addFields([
					'materials' => [
						'label' => 'Additional materials',
						'span' => 'auto',
						'type' => 'repeater',
						'form' => [
							'fields' => [
								'title' => [
									'label' => 'Title',
									'span' => 'auto',
									'type' => 'text',
								],
								'button_title' => [
									'label' => 'Button title',
									'span' => 'auto',
									'type' => 'text',
								],
								'button_url' => [
									'label' => 'Button url',
									'span' => 'auto',
									'type' => 'text',
								],
								'button_file' => [
									'label' => 'Button file',
									'span' => 'auto',
									'type' => 'mediafinder',
									'mode' => 'file',
								],
							]
						]
					],
					'show_on_timeline' => [
						'label' => 'Show on timeline',
						'span' => 'auto',
						'type' => 'checkbox',
						'default' => true,
					],
				]);

			});
		}
	}
}
