<?php
    use App\Domain\ArticleFactory;
    use App\Domain\Entity\ArticleInterface;
    use App\Models\Article;
    use Illuminate\Support\Collection;
    use InvalidArgumentException;
    use App\Exceptions\PersistenceException;

    class ArticleRepository{
        /**
         * @var ArticleFactory
         */
        private $factory;

        /**
         * コンストラクタ
         * @param ArticleFactory $factory
         */
        public function __construct(ArticleFactory $factory)
        {
            $this->factory = $factory;
        }

        /**
         * @inheritDoc
         */
        public function find(int $id): ?ArticleInterface
        {
            $record = Article::query()->find($id);

            if ($record === null) {
                return null;
            }

            return $this->factory->fromRecord($record);
        }

        /**
         * @inheritDoc
         */
        public function list(): Collection
        {
            /** @var Article[] $records */
            $records = Article::all()->all();

            return collect($records)
                ->map(
                    function (Article $record) {
                        return $this->factory->fromRecord($record);
                    }
                );
        }

        /**
         * @inheritDoc
         */
        public function persist(ArticleInterface $article): ArticleInterface
        {
            if (!$article instanceof Article) {
                throw new InvalidArgumentException('このリポジトリで永続化できるエンティティは' . Article::class . 'のみです');
            }

            /** @var Article|null $record */
            $record = Article::query()->find($article->getId());

            if ($record === null) {
                $record = new Article();
            }

            $record->title = $article->getTitle();
            $record->completed_at = $article->getCompletedAt()->getValue();

            if (!$record->save()) {
                throw new PersistenceException('Todo項目の永続化に失敗しました。title=' . $article->getTitle());
            }

            return $this->factory->fromRecord($record);
        }

        /**
         * @inheritDoc
         */
        public function new(array $record): ArticleInterface
        {
            return $this->factory->fromArray($record);
        }
    }