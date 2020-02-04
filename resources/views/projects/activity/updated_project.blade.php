@if ( count($activity->changes['after']) == 1 )
    <span class="capitalize">{{ $activity->user->name }}</span> قام بتعديل "{{ key($activity->changes['after']) }}" 
@else   
    <span class="capitalize">{{ $activity->user->name }}</span> قام بتعديل 
@endif
