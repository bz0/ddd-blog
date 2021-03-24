<?php
namespace App\Domain;
use App\Models\Article;
use App\Domain\Entity\ArticleEntity;

/**
 * ArticleFactory
 * モデル・配列からEntityを生成
 */
class ArticleFactory
{
    /**
     * DBレコードから作成
     * @param TodoItemRecord $record
     * @return TodoItem
     */
    public function fromRecord(Article $record): ArticleEntity
    {
        return new ArticleEntity(
            $record->id,
            $record->title,
            $record->body
        );
    }

    /**
     * 配列から作成
     * @param array $record
     * @return TodoItem
     */
    public function fromArray(array $record): ArticleEntity
    {
        return new ArticleEntity(
            $record["id"],
            $record["title"],
            $record["body"]
        );
    }
}