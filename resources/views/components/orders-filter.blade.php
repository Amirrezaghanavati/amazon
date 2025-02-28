<section class="d-flex justify-content-center my-4">
    @forelse(\App\Enums\OrderStatusEnum::cases() as $status)

        <a
            class="btn btn-sm mx-1 btn-{{ $status->getColor() }}"
            href="{{ route('profile.my-orders', 'status=' . $status->value) }}"
        >
            {{ $status->getLabel() }}
        </a>

    @empty
    @endforelse
</section>
