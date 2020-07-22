<?php

use craft\elements\Entry;
use craft\helpers\UrlHelper;

return [
	'endpoints' => [
		'news.json' => function() {
			return [
				'elementType'	=> Entry::class,
				'criteria'		=> ['section' => 'newsArticles'],
				'transformer'	=> function(Entry $entry) {
					return [
						'title'		=> $entry->title,
						'url'		=> $entry->url,
						'jsonUrl'	=> UrlHelper::url("news/{$entry->id}.json"),
						'excerpt'	=> $entry->excerpt,
					];
				},
			];
		},
		'news/<entryid:\d+>.json' => function($entryId) {
			return [
				'elementType'	=> Entry::class,
				'criteria'		=> ['id' => $entryId],
				'one'			=> true,
				'transformer'	=> function(Entry $entry) {
					return [
						'title'		=> $entry->title,
						'url'		=> $entry->url,
						'excerpt'	=> $entry->excerpt,
					];
				},
			];
		},
	]
];
