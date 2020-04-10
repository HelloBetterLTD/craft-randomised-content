# craft-randomised-content
Craft module to randomised contents for Matrix type blocks

# Installations

## 1. install with composer
`composer require SilverStripers/craft-randomised-content`

## 2. update configs

Please merge below array into your projects `config/app.php`

```
return [
    'modules' => [
        'randomise-content' => \silverstripers\randomisedcontent\RandomiseModule::class
    ],
    'bootstrap' => ['randomise-content'],
];
```