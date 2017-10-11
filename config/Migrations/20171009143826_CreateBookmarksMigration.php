<?php
use Migrations\AbstractMigration;

class CreateBookmarksMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function up()
    {
        $faker=\Faker\Factory::create();
        $populator=new Faker\ORM\CakePHP\Populator($faker);

        $populator->addEntity('Bookmarks',200,[
          'title'=>function() use ($faker){
              return $faker->sentence($nbWords=3, $variableNbWords=true);
          },
            'descripcion'=>function() use ($faker){
                return $faker->sentence($nbSentences=3, $variableNbSentences=true);
            },
            'url'=>function() use($faker){
                return $faker->url;
            },
            'created'=>function() use ($faker){
                return $faker->dateTimeBetween($starDate='now', $endDate='now');
            },
            'modified'=>function() use ($faker){
                return $faker->dateTimeBetween($starDate='now', $endDate='now');
            },
            'user_id'=>function() {
                return rand(1,51);
            }
        ]);
        $populator->execute();
    }
}
