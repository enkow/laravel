<?php

namespace App\Models\Support;

class Paginator
{
	public static function pagination($page, $query, $sort = [], $limit = 1)
	{
		$pagesCount = Paginator::countPages($limit, $query);
		$page = (int)Paginator::getCurrentPageNumber($page, $pagesCount);
		$items = Paginator::getPaginatedRecords($page, $limit, $query, $sort);

		return [$items, ['page' => $page, 'pagesCount' => $pagesCount, 'limit' => $limit]];
	}

	private static function countPages($limit, $query)
  {
      $result = $query->count();
      $pagesCount = ceil($result/$limit);

      return (int)$pagesCount;
  }

	private static function getCurrentPageNumber($page, $pagesCount)
  {
      return (($page <= 1) || ($page > $pagesCount)) ? 1 : $page;
  }

	private static function getPaginatedRecords($page, $limit, $query, $sort = [])
	{
		$offset = ($page - 1) * $limit;
		if ($sort) {
			$result = $query->orderBy($sort[0], $sort[1])->skip($offset)->take($limit)->get();
		} else {
			$result = $query->skip($offset)->take($limit)->get();
		}

		return !$result ? array() : $result;
	}
}
