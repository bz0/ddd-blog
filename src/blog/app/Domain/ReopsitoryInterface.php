<?php

declare(strict_types=1);

namespace App\Domain;

use App\Domain\Entity\ArticleInterface;
use Illuminate\Support\Collection;

/**
 * Todo項目のリポジトリのインターフェース
 * @package N1215\LaraTodo\Common
 */
interface ArticleRepositoryInterface
{
    /**
     * IDを指定してエンティティを取得
     * @param int $id
     * @return ArticleInterface|null
     */
    public function find($id): ?ArticleInterface;

    /**
     * 全エンティティを取得
     * @return Collection|ArticleInterface[]
     */
    public function list(): Collection;

    /**
     * エンティティを永続化
     * @param ArticleInterface $article
     * @return ArticleInterface
     * @throws PersistenceException
     */
    public function persist(ArticleInterface $article): ArticleInterface;

    /**
     * エンティティを初期化
     * @param array $record
     * @return ArticleInterface
     */
    public function new(array $record): ArticleInterface;
}