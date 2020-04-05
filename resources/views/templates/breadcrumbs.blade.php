@if(isset($mainnav))
    @if($src == 'cs')
        <span style="font-size: 11pt; margin-left: 21px;">
            <b>
            {{ \App\Structure::find(\App\Http\Controllers\StructuresController::getEFP(auth()->user()->structures->first()->id)->first()->id)->structure }}
            </b>
        </span>
    @endif
@endif

<ol class="breadcrumb" style="padding-bottom: 0;">
    <li>
    	<a href="{{ auth()->user()->can('index')?route('index'):route('index') }}">
    		<i class="icon-inicio"></i>
    	</a>
    </li>

    @if(Route::currentRouteName() == 'primerinforme.show')
        <li class="active"><span style="font-size: 15pt;">{{ $project->project }}</span></li>
    @endif
    @if(isset($mainnav))
        @if(auth()->user()->actor_id == 1 || auth()->user()->actor_id == 2 || auth()->user()->actor_id == 3)
    	    <li><a href="#">{{ $project->programs->first()->program }}</a></li>
    	    <li><a href="#">{{ $project->subtopics->first()->subtopic }}</a></li>

            <li>
                <a href="#">
                {{ isset($project->subsubtopics->first()->subsubtopic) ? $project->subsubtopics->first()->subsubtopic : 'subtema no asignado'}}
                </a>
            </li>
    	    <li class="active"><span style="font-size: 15pt;">{{ $project->project }}</span></li>
        @else
            <li><a href="#">{{ empty($eje->program) ? 'CGAAI' : $eje->program}}</a></li>
        @endif
    @endif
</ol>