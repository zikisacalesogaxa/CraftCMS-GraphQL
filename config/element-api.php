<?php

use craft\elements\Entry;
use craft\helpers\UrlHelper;

return [
	'endpoints' => [
		'news.json' => function() {
			return [
				'elementType'	=> Entry::class,
				'criteria'		=> ['section' => 'news'],
				'transformer'	=> function(Entry $entry) {
					return [
						'title'		=> $entry->title,
						'url'		=> $entry->url,
						'jsonUrl'	=> UrlHelper::url("blog/{$entry->id}.json"),
						'excerpt'	=> $entry->excerpt,
					];
				},
			];
		},
		'blog/<entryid:\d+>.json' => function($entryId) {
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
