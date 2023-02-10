<?php

namespace Laravel\Cashier\Tests\Plan;

use Illuminate\Foundation\Testing\Concerns\InteractsWithTime;
use Illuminate\Support\Carbon;
use Laravel\Cashier\Plan\AdvancedIntervalGenerator;
use Laravel\Cashier\Tests\BaseTestCase;
use Laravel\Cashier\Tests\Fixtures\Subscription;

class AdvancedIntervalGeneratorTest extends BaseTestCase
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
            (new AdvancedIntervalGenerator($data->intervalConfig))->getEndOfNextSubscriptionCycle($subscription)->format('Y-m-d')
        );
    }

    protected function data(): array
    {
        $defaultIntervalConfig = [
            'generator' => AdvancedIntervalGenerator::class,
            'value' => 1,
            'period' => 'month',
            'monthOverflow' => true,
        ];

        $noOverflowConfig = array_merge($defaultIntervalConfig, ['monthOverflow' => false]);

        return [
            [
                new TestData(
                    expectedDate: '2023-03-08',
                    todaysDate: '2023-02-08',
                    intervalConfig: $defaultIntervalConfig
                )
            ],
            [
                new TestData(
                    expectedDate: '2023-03-03',
                    intervalConfig: $defaultIntervalConfig,
                    subscriptionData: [
                        'name' => 'had trial, on a cycle, with overflow',
                        'trial_ends_at' => '2023-01-01',
                        'cycle_ends_at' => '2023-01-31'
                    ]
                )
            ],
            [
                new TestData(
                    expectedDate: '2023-02-01',
                    intervalConfig: $noOverflowConfig,
                    subscriptionData: [
                        'name' => 'had trial, on a cycle, with no overflow',
                        'trial_ends_at' => '2023-01-01',
                        'cycle_ends_at' => '2023-01-31'
                    ]
                )
            ],
            [
                new TestData(
                    expectedDate: '2023-03-03',
                    intervalConfig: $defaultIntervalConfig,
                    subscriptionData: [
                        'name' => 'on a cycle, with overflow',
                        'cycle_ends_at' => '2023-01-31',
                        'created_at' => '2023-01-01'
                    ]
                )
            ],
            [
                new TestData(
                    expectedDate: '2023-02-01',
                    intervalConfig: $noOverflowConfig,
                    subscriptionData: [
                        'name' => 'on a cycle, without overflow',
                        'cycle_ends_at' => '2023-01-31',
                        'created_at' => '2023-01-01'
                    ]
                )
            ],
            [
                new TestData(
                    expectedDate: '2023-02-28',
                    intervalConfig: $noOverflowConfig,
                    subscriptionData: [
                        'name' => 'on a cycle, without overflow',
                        'cycle_ends_at' => '2023-01-30',
                        'created_at' => '2022-12-30'
                    ]
                )
            ],
            [
                new TestData(
                    expectedDate: '2023-03-30',
                    intervalConfig: $noOverflowConfig,
                    subscriptionData: [
                        'name' => 'on a cycle, without overflow',
                        'cycle_ends_at' => '2023-02-28',
                        'created_at' => '2022-12-30'
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
