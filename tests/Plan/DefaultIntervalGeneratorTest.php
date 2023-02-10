<?php

namespace Laravel\Cashier\Tests\Plan;

use Illuminate\Foundation\Testing\Concerns\InteractsWithTime;
use Illuminate\Support\Carbon;
use Laravel\Cashier\Plan\DefaultIntervalGenerator;
use Laravel\Cashier\Tests\BaseTestCase;
use Laravel\Cashier\Tests\Fixtures\Subscription;

class DefaultIntervalGeneratorTest extends BaseTestCase
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
            (new DefaultIntervalGenerator('1 month'))->getEndOfNextSubscriptionCycle($subscription)->format('Y-m-d')
        );
    }

    protected function data(): array
    {
        return [
            [
                new TestData(expectedDate: '2023-03-08', todaysDate: '2023-02-08')
            ],
            [
                new TestData(
                    expectedDate: '2023-03-15',
                    subscriptionData: ['name' => 'had trial, on a cycle', 'trial_ends_at' => '2023-01-15', 'cycle_ends_at' => '2023-02-15']
                )
            ],
            [
                new TestData(
                    expectedDate: '2023-02-01',
                    subscriptionData: ['name' => 'on a cycle', 'cycle_ends_at' => '2023-01-31', 'created_at' => '2023-01-01']
                )
            ],
        ];
    }
}

class TestData
{
    public function __construct(
        public string $expectedDate,
        public ?string $todaysDate = null,
        public array $subscriptionData = []
    ) {
        //
    }
}
