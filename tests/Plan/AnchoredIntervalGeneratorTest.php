<?php

namespace Laravel\Cashier\Tests\Plan;

use Illuminate\Foundation\Testing\Concerns\InteractsWithTime;
use Illuminate\Support\Carbon;
use Laravel\Cashier\Plan\AnchoredIntervalGenerator;
use Laravel\Cashier\Tests\BaseTestCase;
use Laravel\Cashier\Tests\Fixtures\Subscription;

class AnchoredIntervalGeneratorTest extends BaseTestCase
{
    use InteractsWithTime;

    /**
     * @dataProvider data
     * @test
     */
    public function getEndOfNextSubscriptionCycle(TestData $data)
    {
        if ($data->todaysDate) {
            $this->travelTo(Carbon::parse($data->todaysDate));
        }

        $subscription = empty($data->subscriptionData) ? null : new Subscription($data->subscriptionData);

        $this->assertEquals(
            $data->expectedDate,
            (new AnchoredIntervalGenerator($data->intervalConfig))->getEndOfNextSubscriptionCycle($subscription)->format('Y-m-d')
        );
    }

    protected function data(): array
    {
        $monthlyFirstOfMonthConfig = [
            'generator' => AnchoredIntervalGenerator::class,
            'day' => 1,
            'period' => 'month',
        ];

        $monthlyEndOfMonthConfig = [
            'generator' => AnchoredIntervalGenerator::class,
            'day' => 'end',
            'period' => 'month',
        ];

        $yearlyFirstDayConfig = [
            'generator' => AnchoredIntervalGenerator::class,
            'day' => 1,
            'period' => 'year',
        ];

        $yearlyIntervalConfig14thMay = [
            'generator' => AnchoredIntervalGenerator::class,
            'day' => 14,
            'month' => 5,
            'period' => 'year',
        ];

        return [
            [
                new TestData(
                    expectedDate: '2023-02-01',
                    todaysDate: '2023-01-31',
                    intervalConfig: $monthlyFirstOfMonthConfig
                )
            ],
            [
                new TestData(
                    expectedDate: '2023-03-01',
                    todaysDate: '2023-02-28',
                    intervalConfig: $monthlyFirstOfMonthConfig
                )
            ],
            [
                new TestData(
                    expectedDate: '2023-02-01',
                    intervalConfig: $monthlyFirstOfMonthConfig,
                    subscriptionData: [
                        'name' => 'had trial, on a monthly cycle',
                        'trial_ends_at' => '2023-01-01',
                        'cycle_ends_at' => '2023-01-31'
                    ]
                )
            ],
            [
                new TestData(
                    expectedDate: '2023-02-01',
                    intervalConfig: $monthlyFirstOfMonthConfig,
                    subscriptionData: [
                        'name' => 'on a monthly cycle',
                        'created_at' => '2023-01-01',
                        'cycle_ends_at' => '2023-01-31',
                    ]
                )
            ],
            [
                new TestData(
                    expectedDate: '2023-03-01',
                    intervalConfig: $monthlyFirstOfMonthConfig,
                    subscriptionData: [
                        'name' => 'on a monthly cycle',
                        'created_at' => '2023-02-01',
                        'cycle_ends_at' => '2023-02-28',
                    ]
                )
            ],
            [
                new TestData(
                    expectedDate: '2023-02-28',
                    intervalConfig: $monthlyEndOfMonthConfig,
                    subscriptionData: [
                        'name' => 'on a monthly cycle',
                        'created_at' => '2023-01-01',
                        'cycle_ends_at' => '2023-01-31',
                    ]
                )
            ],
            [
                new TestData(
                    expectedDate: '2023-03-31',
                    intervalConfig: $monthlyEndOfMonthConfig,
                    subscriptionData: [
                        'name' => 'on a monthly cycle',
                        'created_at' => '2023-02-01',
                        'cycle_ends_at' => '2023-02-28',
                    ]
                )
            ],
            [
                new TestData(
                    expectedDate: '2024-01-01',
                    intervalConfig: $yearlyFirstDayConfig,
                    subscriptionData: [
                        'name' => 'on a yearly cycle',
                        'created_at' => '2023-01-01',
                        'cycle_ends_at' => '2023-12-31',
                    ]
                )
            ],
            [
                new TestData(
                    expectedDate: '2024-01-01',
                    intervalConfig: $yearlyFirstDayConfig,
                    subscriptionData: [
                        'name' => 'on a yearly cycle',
                        'created_at' => '2023-02-01',
                        'cycle_ends_at' => '2023-12-31',
                    ]
                )
            ],
            [
                new TestData(
                    expectedDate: '2023-05-14',
                    intervalConfig: $yearlyIntervalConfig14thMay,
                    subscriptionData: [
                        'name' => 'on a yearly cycle',
                        'created_at' => '2023-01-01',
                        'cycle_ends_at' => '2023-05-13',
                    ]
                )
            ],
            [
                new TestData(
                    expectedDate: '2024-05-14',
                    intervalConfig: $yearlyIntervalConfig14thMay,
                    subscriptionData: [
                        'name' => 'on a yearly cycle',
                        'created_at' => '2024-07-01',
                        'cycle_ends_at' => '2024-05-13',
                    ]
                )
            ],
        ];
    }
}

class TestData
{
    public function __construct(
        public string $expectedDate,
        public array $intervalConfig,
        public ?string $todaysDate = null,
        public array $subscriptionData = []
    ) {
        //
    }
}
