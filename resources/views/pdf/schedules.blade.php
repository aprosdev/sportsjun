@extends('layouts.pdf')

@section('content')
    <div id="header">
        <h2>{{strtoupper($tournament->name)}}</h2>
        @if ($logo)
            <img src="uploads/tournaments/{{$logo}}" height="50px"/>
        @endif
    </div>
    <style>
        table, td, tr, th {
            border: 1px solid black;
            border-collapse: collapse
        }
        .second {
            background-color: #EFEFEF
        }
    </style>





    <table style="width:100%;text-align:center;">
        <thead>
        <tr>
            {{--<th>STAGE</th>--}}
            <th>DATE</th>
            <th>TIME</th>
            <th style="width:40%">MATCHES</th>
            <th>TYPE</th>
            <th>VENUE</th>
            <th>Category</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0;?>
        @foreach($schedules as  $match)
            @if(!empty($match['a_id']) && !empty($match['b_id']))
                <?php if ($match->match_status == 'completed') $match_class = 'sub_tour';
                else $match_class = 'bg-grey';

                if (empty($match->match_details)) $match_started = false;
                else $match_started = true;
                ?>
                <tr class="{{ ($i % 2) ? 'second':'' }}">
                    {{--<td>                   </td>--}}
                    <td>
                        {{ Helper::displayDate($match['match_start_date'] . (isset( $match['match_start_time'] ) ? " " . $match['match_start_time'] : ""), 1) }}
                    </td>
                    <td>
                        {{ date('h:i A', strtotime($match['match_start_date'] . (isset( $match['match_start_time'] ) ? " " . $match['match_start_time'] : ""))) }}
                    </td>
                    <td>
                        @if($match['schedule_type']=='team' )
                            <p>{{ $team_name_array[$match['a_id']] }}  {{'VS'}} {{ $team_name_array[$match['b_id']] }}</p>
                            <p>
                                <img src="{!! Helper::ImageCheck('uploads/teams/'.$team_logo[$match['a_id']]['url']) !!}" height="32px" width="32px"/>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <img src="{!! Helper::ImageCheck('uploads/teams/'.$team_logo[$match['b_id']]['url']) !!}" height="32px" width="32px"/>
                            </p>
                        @else
                            <p>{{ $user_name[$match['a_id']] }}   {{'VS'}} {{ $user_name[$match['b_id']] }}</p>
                            <p>
                                <img src="{!! Helper::ImageCheck('uploads/user_profile/'.$user_profile[$match['a_id']]['url']) !!}" height="32px" width="32px"/>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <img src="{!! Helper::ImageCheck('uploads/user_profile/'.$user_profile[$match['b_id']]['url']) !!}" height="32px" width="32px"/>
                            </p>
                        @endif

                        @if ($match->match_status != "scheduled")
                            <p><span style="color:#224488">{{Helper::getMatchDetails($match['id'])->scores}} </span></p>
                        @endif
                        <p><span style="color:#224488">{{ucfirst($match['match_status']) }} </span></p>
                        @if(!is_null($match['winner_id']))
                            Winner:    <span
                                    style="color:#ff0000"> {{Helper::getMatchDetails($match['id'])->winner}} </span>
                        @endif
                    </td>
                    <td>{{ $match['match_type']=='odi'?strtoupper($match['match_type']):ucfirst($match['match_type']) }}</td>
                    <td>{{ trim($match['match_location'],',')}}</td>
                    <td>
                        {{ucfirst($match['match_category'])}}
                    </td>
                </tr>
                <?php $i++;?>
            @endif

        @endforeach

        </tbody>
    </table>
@stop


