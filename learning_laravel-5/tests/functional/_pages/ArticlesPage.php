<?php

class ArticlesPage
{
    public static $url = '/articles';

    public static function route($param)
    {
        return static::$url.$param;
    }

    public static $formFields = ['title' => '#title', 'body' => 'Body:'];

    /**
     * @var FunctionalTester;
     */
    protected $tester;

    public function __construct(FunctionalTester $I)
    {
        $this->tester = $I;
    }

    /**
     * @return ArticlesPage
     */
    public static function of(FunctionalTester $I)
    {
        return new static($I);
    }

    public function createArticle($fields = [])
    {
        $I = $this->tester;
        $I->amOnPage(static::$url);
        $I->click('Add new article');
        $this->fillFormFields($fields);
        $I->click('Submit');
    }

    public function editArticle($id, $fields = [])
    {
        $I = $this->tester;
        $I->amOnPage(self::route("/$id/edit"));
        $I->see('Edit Article', 'h1');
        $this->fillFormFields($fields);
        $I->click('Update');
    }

    public function deleteArticle($id)
    {
        $I = $this->tester;
        $I->amOnPage(self::route("/$id"));
        $I->click('Delete');
    }

    protected function fillFormFields($data)
    {
        foreach ($data as $field => $value) {
            if (! isset(static::$formFields[$field])) throw new \Exception("Form field  $field does not exist");
            $this->tester->fillField(static::$formFields[$field], $value);
        }
    }
}