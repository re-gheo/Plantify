<p class="
    @if($product->rating_average >=  10)
        text-success
    @elseif($product->rating_average < 0)
        text-warning
    @endif
">
    {{($product->rating_average) ? 'Rating: '.$product->rating_average.'/10' : 'No Ratings Yet' }}
</p>
