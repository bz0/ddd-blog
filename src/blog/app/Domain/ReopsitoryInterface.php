<?php

declare(strict_types=1);

namespace App\Domain;

use Illuminate\Support\Collection;

/**
 * Todo項目のリポジトリのインターフェース
 * @package N1215\LaraTodo\Common
 */
interface ArticleRepositoryInterface
{
    /**
     * IDを指定してエンティティを取得
     * @param TodoItemId $id
     * @return TodoItemInterface|null
     */
    public function find($id): ?ArticleInterface;

    /**
     * 全エンティティを取得
     * @return Collection|TodoItemInterface[]
     */
    public function list(): Collection;

    /**
     * エンティティを永続化
     * @param TodoItemInterface $todoItem
     * @return TodoItemInterface
     * @throws PersistenceException
     */
    public function persist(TodoItemInterface $todoItem): TodoItemInterface;

    /**
     * エンティティを初期化
     * @param array $record
     * @return TodoItemInterface
     */
    public function new(array $record): TodoItemInterface;
}