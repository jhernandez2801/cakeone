<?php
use Migrations\AbstractMigration;
use Cake\Auth\DefaultPasswordHasher;

class CreateAdminSeedMigration extends AbstractMigration
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
        $populator->addEntity('Users',1,[
            'first_name'=>'Jorge',
            'last_name'=>'Hernandez',
            'email'=>'jjhernandez2801@gmail.com',
            'password'=>function(){
                return '123456';
            },
            'role'=>'admin',
            'active'=>1,
            'created'=>function() use ($faker){
                return $faker->dateTimeBetween($starDate='now', $endDate='now');
            },
            'modified'=>function() use ($faker){
                return $faker->dateTimeBetween($starDate='now', $endDate='now');
            }
        ]);
        $populator->execute();
    }
}