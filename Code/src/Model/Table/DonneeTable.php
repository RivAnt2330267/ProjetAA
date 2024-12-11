<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Orientationmoteur Model
 *
 * @method \App\Model\Entity\Orientationmoteur newEmptyEntity()
 * @method \App\Model\Entity\Orientationmoteur newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Orientationmoteur> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Orientationmoteur get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Orientationmoteur findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Orientationmoteur patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Orientationmoteur> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Orientationmoteur|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Orientationmoteur saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Orientationmoteur>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Orientationmoteur>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Orientationmoteur>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Orientationmoteur> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Orientationmoteur>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Orientationmoteur>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Orientationmoteur>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Orientationmoteur> deleteManyOrFail(iterable $entities, array $options = [])
 */
class OrientationmoteurTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('donnee');
        $this->setDisplayField('donneeId');
        $this->setPrimaryKey('donneeId');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('time')
            ->requirePresence('time', 'create')
            ->notEmptyString('time');

        return $validator;

        $validator
            ->integer('temperature')
            ->requirePresence('temperature', 'create')
            ->notEmptyString('temperature');

        return $validator;
    }
}
