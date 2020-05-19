<?php

namespace ITReview;

/**
 * Интерфейс поведения.
 *
 * @package ITReview
 */
interface BehaviorInterface
{
    /**
     * Выстрел.
     */
    public function shoot(): void;

    /**
     * Перемещение.
     */
    public function move(): void;
}

/**
 * Поведение с пистолетом.
 *
 * @package ITReview
 */
final class GunBehavior implements BehaviorInterface
{
    /**
     * {@inheritDoc}
     */
    public function shoot(): void
    {
        echo 'Стреляет слабо, т.к. у пистолета малая огневая мощь.' . PHP_EOL;
    }

    /**
     * {@inheritDoc}
     */
    public function move(): void
    {
        echo 'Перемещается быстро, т.к. пистолет легкий.' . PHP_EOL;
    }
}

/**
 * Поведение с пулеметом.
 *
 * @package ITReview
 */
final class MachineGunBehavior implements BehaviorInterface
{
    /**
     * {@inheritDoc}
     */
    public function shoot(): void
    {
        echo 'Стреляет сильно, т.к. у пулемета большая огневая мощь.' . PHP_EOL;
    }

    /**
     * {@inheritDoc}
     */
    public function move(): void
    {
        echo 'Перемещается медленно, т.к. пулемет тяжелый.' . PHP_EOL;
    }
}

/**
 * Солдат.
 *
 * @package ITReview
 */
final class Soldier
{
    /**
     * @var BehaviorInterface $behavior Поведение.
     */
    private BehaviorInterface $behavior;

    /**
     * Конструктор.
     *
     * @param  BehaviorInterface  $behavior  Поведение.
     */
    public function __construct(BehaviorInterface $behavior)
    {
        $this->behavior = $behavior;
    }

    /**
     * Изменение поведения.
     *
     * @param  BehaviorInterface  $behavior  Поведение.
     */
    public function changeBehavior(BehaviorInterface $behavior): void
    {
        $this->behavior = $behavior;
    }

    /**
     * Выстрел.
     */
    public function shoot(): void
    {
        $this->behavior->shoot();
    }

    /**
     * Перемещение.
     */
    public function move(): void
    {
        $this->behavior->move();
    }


}

$soldier = new Soldier(new GunBehavior());
$soldier->move();
$soldier->shoot();

$soldier->changeBehavior(new MachineGunBehavior());
$soldier->move();
$soldier->shoot();

