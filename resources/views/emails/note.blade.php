<p>
Hello,

The notes what you search: 
Title:{{ $title }} 
<br>
@if (count($notes) > 0)
@foreach ($notes as $note)
{{$note->title}}
<br>
{{$note->body}}
<br>
@endforeach
</div>
@else
Nothing found by your search
@endif




Dream  Team  


</p>
