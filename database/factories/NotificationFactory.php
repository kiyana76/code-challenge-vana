<?php

namespace Database\Factories;

use App\Enums\NotificationStatusEnum;
use App\Enums\NotificationTypeEnum;
use App\Enums\ProductableEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Notification>
 */
class NotificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'status' => fake()->randomElement(NotificationStatusEnum::cases()),
            'type'   => fake()->randomElement(NotificationTypeEnum::cases()),
            'message' => fake()->text(100),
            'price' => 0,
            'productable_id' => fake()->numberBetween(1,100),
            'productable_type' => fake()->randomElement(ProductableEnum::cases()),
            'created_at' => fake()->dateTimeBetween('-2 months', '-1 months'),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function emailType(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => NotificationTypeEnum::EMAIL->value,
        ]);
    }
    public function smsType(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => NotificationTypeEnum::SMS->value,
        ]);
    }
    public function deliverStatus(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => NotificationStatusEnum::DELIVERED->value,
        ]);
    }
    public function notDeliverStatus(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => NotificationStatusEnum::NOT_DELIVERED->value,
        ]);
    }
    public function createdStatus(): static
    {
        return $this->state(fn (array $attributes) => [
            'status' => NotificationStatusEnum::CREATED->value,
        ]);
    }

}
