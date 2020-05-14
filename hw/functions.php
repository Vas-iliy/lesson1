<?php

	// your functions may be here

	/* start --- black box */
function getArticles() : array{
    return json_decode(file_get_contents('db/articles.json'), true);
}
/*function getArticles () {
    return [
        '1' => [
            'id' => 1,
            'title' => 'Статья 1',
            'content' => 'Ну, тут говориться про то что ты пидор'
        ],
        '2' => [
            'id' => 2,
            'title' => 'статья 2',
            'content' => 'Ну, тут написано что ты любишь пить пиво'
        ],
        '5' => [
            'id' => 5,
            'title' => 'статья 5',
            'content' => 'Ну, тут написано что тебе скучно'
        ]
    ];
}*/

	function addArticle(string $title, string $content) : bool{
		$articles = getArticles();

		$lastId = end($articles)['id'];
		$id = $lastId + 1;

		$articles[$id] = [
			'id' => $id,
			'title' => $title,
			'content' => $content
		];

		saveArticles($articles);
		return true;
	}

	function removeArticle(int $id) : bool{
		$articles = getArticles();

		if(isset($articles[$id])){
			unset($articles[$id]);
			saveArticles($articles);
			return true;
		}
		
		return false;
	}

	function saveArticles(array $articles) : bool{
		file_put_contents('db/articles.json', json_encode($articles));
		return true;
	}
	/* end --- black box */