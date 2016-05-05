@extends('layouts.app')
@section('content')
@include ('album._leftmenu')
<div class="col-lg-8 col-md-10 col-sm-12 col-md-offset-1 tournament_profile teamslist-pg" style="padding-top: 3px !important;">
        <div class="panel panel-default">

                @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                <!-- /.panel-heading -->
                <div class="panel-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-justified">
                                <li class="active"><a href="#followingplayers" data-toggle="tab" aria-expanded="true">Following Players <span class="t_badge"> {{ count($followingPlayers) }} </span></a></li>
                                <li class=""><a href="#followingteams" data-toggle="tab" aria-expanded="false">Following Teams <span class="t_badge"> {{ count($followingTeams) }} </span></a></li>
                                <li class=""><a href="#followingtournaments" data-toggle="tab" aria-expanded="false">Following Tournaments  <span class="t_badge"> {{ count($followingTournaments) }} </span></a></li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">

                                <div class="tab-pane fade" id="followingtournaments">
                                        <table class="table">
                                                <tbody>
                                                        <tr>
                                                                <td>
                                                                        @if(count($followingTournaments))
                                                                        @foreach($followingTournaments as $followkey => $followedTeam)
                                                                        <div class="t_details">
                                                                                <div class="row main_tour">
                                                                                        <div class="col-xs-2 text-center">
                                                                                          <!--<img class="img-circle img-border" src="http://localhost/sportsjun/public/images/sunrisers_hyd.png" style="width: 90%;height:90%;">-->
                                                                                          <!--  <img class="img-circle img-border" src="{{ asset('/uploads/'.config('constants.PHOTO_PATH.TOURNAMENT').'/'.$followedTeam['url']) }}" onerror="this.onerror=null;this.src='{{ asset('/images/default-profile-pic.jpg') }}';" style="width: 90%;height:90%;">-->
                                                                                                {!! Helper::Images($followedTeam['url'],config('constants.PHOTO_PATH.TOURNAMENT'),array('height'=>90,'width'=>90,'class'=>'img-circle img-border img-scale-down img-responsive') )!!}

                                                                                        </div>
                                                                                        <div class="col-xs-10">
                                                                                                <p class="t_tltle">
                                                                                                        <a href="{{ url('tournaments/groups').'/'.$followedTeam['id'] }}">{{ $followedTeam['name'] }}</a>
                                                                                                <p class="t_by">By {{ $followedTeam['user_name'] }}</p>
                                                                                                </p>
                                                                                                <ul class="t_tags">
                                                                                                        <li>Sports <span class="green">{{ $followedTeam['sports_name'] }}</span></li>
                                                                                                        <li>Teams <span class="green">{{ $followedTeam['team_count'] }}</span></li>
                                                                                                </ul>
                                                                                                <p class="lt-grey">{{ $followedTeam['description'] }}</p>
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                        @endforeach
                                                                        @else
                                                                        <div class="message_new_for_team">Search for Tournaments and Follow easily.</div>
                                                                        @endif
                                                                </td>
                                                        </tr>
                                                </tbody>
                                        </table>
                                </div>






                                <div class="tab-pane fade" id="followingteams">
                                        <table class="table">
                                                <tbody>
                                                        <tr>
                                                                <td>
                                                                        @if(count($followingTeams))
                                                                        @foreach($followingTeams as $following_team)
                                                                        <div class="t_details">
                                                                                <div class="row main_tour">
                                                                                        <div class="col-md-2 col-sm-3 col-xs-12 text-center">
                                                                                                @if(count($following_team['photos']))
                                                                                                @foreach($following_team['photos'] as $p)
                                                                                                 <!--   <img class="img-circle img-border" src="{{ asset('/uploads/'.config('constants.PHOTO_PATH.TEAMS_FOLDER_PATH').'/'.(!empty($p['url'])?$p['url']:'')) }}" onerror="this.onerror=null;this.src='{{ asset('/images/default-profile-pic.jpg') }}';" style="width: 90%;height:90%;">-->
                                                                                                {!! Helper::Images((!empty($p['url'])?$p['url']:''),config('constants.PHOTO_PATH.TEAMS_FOLDER_PATH'),array('class'=>'img-circle img-border  img-scale-down','height'=>90,'width'=>90) )!!}

                                                                                                @endforeach
                                                                                                @else
                                                                                                   <!-- <img class="img-circle img-border" src="{{ asset('/images/default-profile-pic.jpg') }}" onerror="this.onerror=null;this.src='{{ asset('/images/default-profile-pic.jpg') }}';" style="width: 90%;height:90%;">-->
                                                                                                {!! Helper::Images('default-profile-pic.jpg','images',array('class'=>'img-circle img-border  img-scale-down','height'=>90,'width'=>90) )!!}
                                                                                                @endif
                                                                                        </div>
                                                                                        <div class="col-md-10 col-sm-9 col-xs-12">
                                                                                                <div class="sm-center">
                                                                                                        <div class="t_tltle">
                                                                                                                <a href="{{ url('/team/members').'/'.(!empty($following_team['id'])?$following_team['id']:0) }}">{{ !empty($following_team['name'])?$following_team['name']:'' }}</a>
                                                                                                                <p class="t_by">By <a target="_blank" href="{{ url('/editsportprofile/'.(!empty($following_team['team_owner_id'])?$following_team['team_owner_id']:0))}}">{{ !empty($following_team['user']['name'])?$following_team['user']['name']:'' }}</a></p>
                                                                                                        </div>
                                                                                                        <ul class="t_tags">
                                                                                                                <li>Sport: <span>{{ !empty($following_team['sports']['sports_name'])?$following_team['sports']['sports_name']:'' }}</span></li>
                                                                                                                <li>Players: <span>{{ !empty($following_team['teamplayers'])?count($following_team['teamplayers']):0 }}</span></li>
                                                                                                        </ul>
                                                                                                        <p class="lt-grey">{{ !empty($following_team['description'])?$following_team['description']:'' }}</p>                                                        </div>     
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                        @endforeach

                                                                        @else
                                                                        <div class="message_new_for_team">Search for Teams and Follow easily.</div>
                                                                        @endif

                                                                </td>
                                                        </tr>
                                                </tbody>
                                        </table>
                                </div>

                                <div class="tab-pane fade active in" id="followingplayers">
                                        <table class="table">
                                                <tbody>
                                                        <tr>
                                                                <td>
                                                                        @if(count($followingPlayers))
                                                                        @foreach($followingPlayers as $player)
                                                                        <div class="t_details">   
                                                                                <div class="row main_tour">	
                                                                                        <div class="search_thumbnail right-caption">

                                                                                                <div class="col-md-2 col-sm-3 col-xs-12 text-center">
                                                                                                        @if(!empty($player->logo))
                                                                                                         <!--   <img class="img-circle img-border" src="{{ asset('/uploads/'.config('constants.PHOTO_PATH.TEAMS_FOLDER_PATH').'/'.(!empty($p['url'])?$p['url']:'')) }}" onerror="this.onerror=null;this.src='{{ asset('/images/default-profile-pic.jpg') }}';" style="width: 90%;height:90%;">-->
                                                                                                        {!! Helper::Images( $player->logo ,config('constants.PHOTO_PATH.USERS_PROFILE'),array('height'=>90,'width'=>90,'class'=>'img-circle img-border img-scale-down img-responsive') )!!}
                                                                                                        @else
                                                                                                           <!-- <img class="img-circle img-border" src="{{ asset('/images/default-profile-pic.jpg') }}" onerror="this.onerror=null;this.src='{{ asset('/images/default-profile-pic.jpg') }}';" style="width: 90%;height:90%;">-->
                                                                                                        {!! Helper::Images('default-profile-pic.jpg','images',array('class'=>'img-circle img-border  img-scale-down','height'=>90,'width'=>90) )!!}
                                                                                                        @endif
                                                                                                </div>
                                                                                                <div class="col-md-10 col-sm-9 col-xs-12">
                                                                                                        <div class="t_tltle">
                                                                                                                <div class="pull-left"><a href="{{ url('/editsportprofile').'/'.$player->user_id }}" id="{{'uname_'.$player->user_id}}">{{ $player->name }}</a></div>
                                                                                                                <p class="search_location t_by">{{ $player->location }}</p>
                                                                                                        </div>
                                                                                                        <ul class="t_tags">
                                                                                                                <li>Sports:
                                                                                                                <?php $sport_ids = explode(",", trim($player->following_sports,","));
                                                                                                                                        ?>													   
                                                                                                                <span class="green">
                                                                                                                    <?php $sport_names = ''; ?>
                                                                                                                    @foreach($sport_ids as $key=>$val)
                                                                                                                    <?php 							
                                                                                                                        $sport_names .= ", ".$sports_array[$val];					   
                                                                                                                    ?>
                                                                                                                    @endforeach													   
                                                                                                                    <?php $sport_names = trim($sport_names,",");?>
                                                                                                                    {{$sport_names}}
                                                                                                                </span>
                                                                                                            </li>
                                                                                                        </ul>                      
                                                                                                </div>                      	
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                        @endforeach

                                                                        @else
                                                                        <div class="message_new_for_team">Search for Players and Follow easily.</div>
                                                                        @endif
                                                                </td>
                                                        </tr>
                                                </tbody>
                                        </table>
                                </div>
                        </div>
                </div>
                <!-- /.panel-body -->
        </div>
</div>
<div id="displaytournament"></div>

@endsection