<?php

namespace Laravel\Cashier\Plan;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Laravel\Cashier\Plan\Contracts\IntervalGeneratorContract;
use Laravel\Cashier\Subscription;

class AnchoredIntervalGenerator extends BaseIntervalGenerator implements IntervalGeneratorContract
{
    /**
     * @var array
     */
    protected array $configuration;

    public function __construct(array $configuration)
    {
        $this->configuration = $configuration;

        $this->useCarbonGivenDayOrLast();
    }

    /**
     * @param  \Laravel\Cashier\Subscription  $subscription
     * @return \Carbon\Carbon
     */
    public function getEndOfNextSubscriptionCycle(Subscription $subscription = null): Carbon
    {
        $cycle_ends_at = $subscription->cycle_ends_at ?? now();

        if ($this->isMonthly()) {
            return $cycle_ends_at
                ->addMonthNoOverflow()
                ->setDaysToGivenDayOrLastOfMonth($this->day());
        }

        $endOfNextSubscriptionCycle = $cycle_ends_at->month($this->month());

        if ($endOfNextSubscriptionCycle->isPast()) {
            $endOfNextSubscriptionCycle = $endOfNextSubscriptionCycle = $endOfNextSubscriptionCycle->addYearNoOverflow();
        }

        return $endOfNextSubscriptionCycle->setDaysToGivenDayOrLastOfMonth($this->day());
    }

    /**
     * @return int|string
     */
    protected function day()
    {
        return Arr::get($this->configuration, 'day');
    }

    /**
     * @return int
     */
    protected function month(): int
    {
        $month = Arr::get($this->configuration, 'month', 1);

        return $month > 12 ? 12 : $month;
    }

    /**
     * @return string
     */
    protected function period(): string
    {
        return Arr::get($this->configuration, 'period');
    }

    /**
     * @return bool
     */
    protected function isMonthly(): bool
    {
        return Str::startsWith($this->period(), 'month');
    }

    private function useCarbonGivenDayOrLast(): void
    {
        Carbon::macro('setDaysToGivenDayOrLastOfMonth', function (int|string $day) {
            if (in_array($day, ['end', 'last']) || $day > $this->daysInMonth) {
                $day = $this->daysInMonth;
            }

            return $this->day($day);
        });
    }
}
