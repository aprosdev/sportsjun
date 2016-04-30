
@if(count($tournamentDetails[0]['final_stage_teams']))
<!--<div>
    Add Round
</div>


<div>
    <div>Round 1</div>
    <span class="button btn-primary" onclick='addRoundMatchesSchedule({{$tournament_id}},1)'>Add Schedule</span>
</div>

<div id="round_div_1">
</div>    -->
<div class="col-sm-12">
<div class="row group-flex-content">
@if(count($roundArray))
        @foreach($roundArray as $round)
        @if($round==1)
        <div class="col-sm-2">
            <div class="round-{{Helper::convert_number_to_words($round)}}">
                <div class="round"><p>ROUND {{$round}}</p></div>
                 @if(count($firstRoundBracketArray))
                 @foreach($firstRoundBracketArray as $key => $schedule)
                 	<div class="match_set" style="height: 150px;">
                    @if(isset($schedule['tournament_round_number']) && $schedule['tournament_round_number']==$round)
                           <ul>
                               <div class="clearfix">
                                  <span class="tour_match_date fa fa-info" data-toggle="tooltip" data-placement="left" title="{{$schedule['match_start_date'].$sport_name.' '.$schedule['match_type']}}"></span>
                                  <span class="tour_score">

                                  @if(isset($schedule['winner_text']))
                                  <a href="{{ url('match/scorecard/edit/'.$schedule['id']) }}">{{$schedule['winner_text']}}</a>
                                  @else
                                      @if($isOwner)
                                          <a href="javascript:void(0)" id="scheduleEdit_{{$schedule['id']}}"  onclick="editMatchSchedule({{$schedule['id']}},1,'','myModal')">Edit</a>
                                      @endif
                                  @endif
                                  </span>
                               </div>
                              <li title="{{isset($schedule[$scheduleTypeOne]['name'])?$schedule[$scheduleTypeOne]['name']:'Bye'}}"  data-toggle="tooltip" data-placement="top">
                                {!! Helper::Images($schedule[$scheduleTypeOne]['url'],config('constants.PHOTO_PATH.TEAMS_FOLDER_PATH'),array('class'=>'img-circle img-border','height'=>30,'width'=>30) )!!}
                                @if(isset($schedule[$scheduleTypeOne]['name']))
                                    <span>
                                        <a href="{{ url($linkUrl,[$schedule[$scheduleTypeOne]['id']]) }}">
                                            {{Helper::get_first_letters($schedule[$scheduleTypeOne]['name'])}}
                                        </a>
                                    </span>
                                @else
                                   <span>{{trans('message.bye')}}</span>
                                @endif
                              </li>
                              <li title="{{isset($schedule[$scheduleTypeTwo]['name'])?$schedule[$scheduleTypeTwo]['name']:'Bye'}}"  data-toggle="tooltip" data-placement="top">
                                {!! Helper::Images($schedule[$scheduleTypeTwo]['url'],config('constants.PHOTO_PATH.TEAMS_FOLDER_PATH'),array('class'=>'img-circle img-border','height'=>30,'width'=>30) )!!}
                                @if(isset($schedule[$scheduleTypeTwo]['name']))
                                   <span>
                                        <a href="{{ url($linkUrl,[$schedule[$scheduleTypeOne]['id']]) }}">
                                            {{Helper::get_first_letters($schedule[$scheduleTypeTwo]['name'])}}
                                        </a>
                                   </span>
                                @else
                                   <span>{{trans('message.bye')}}</span>
                                @endif
                              </li>
                          </ul>
                    @else
                            <ul>
                                @if($isOwner)
                                    <div class="clearfix">
                                      <span class="tour_score">
                                        <a href="javascript:void(0)" id="scheduleEdit_{{$key}}"  onclick="addRoundMatchesSchedule({{$tournament_id}},{{$round}},{{$key}})">Schedule Match</a>
                                      </span>
                                    </div>
                                @endif
                                   <li>
                                       <span>Match {{$key}}</span>
                                   </li>
                                   <li>
                                       <span></span>
                                   </li>
                            </ul>
                    @endif
                 </div>
                 @endforeach

                 @endif
            </div>
        </div>
        @else
        <div class="col-sm-2">
            <div class="round-{{Helper::convert_number_to_words($round)}}">
                <div class="round"><p>ROUND {{$round}}</p></div>

                 @if(count($bracketTeamArray))
                    <?php
                        if(empty($minHeight)) {
                            $minHeight = 150;
                        }else{
                            $minHeight = $height;
                        }
                        $height = $minHeight*2;
                        $actualHeigh = $height.'px';
                    ?>
                    @foreach($bracketTeamArray as $brk => $bracketTeam)
                    	<div class="match_set" style="height: <?php echo $height.'px';?>">
                        <ul>
                            @foreach($bracketTeam as $bt => $bracket)
                                @if(isset($bracket['tournament_round_number']) && $bracket['tournament_round_number']==$round)

                                    @if($round==($lastRoundWinner+1))
                                        <div class="clearfix">
                                            <span class="winner_text"><span class="fa fa-star" style="color:#f27676;"></span>&nbsp;&nbsp;Winner&nbsp;&nbsp;<span class="fa fa-star" style="color:#f27676;"></span></span>
                                        </div>
                                    @else

                                        @if(isset($bracket['match_start_date']))
                                            <div class="clearfix">
                                               <span class="tour_match_date fa fa-info"  data-toggle="tooltip" data-placement="left" title="{{(isset($bracket['winner_text'])&&$bracket['winner_text']!='edit')?$bracket['match_start_date'].$sport_name.' '.$bracket['match_type']:trans('message.tournament.final.editscheduletoaddscore')}}"></span>
                                               <span class="tour_score">
                                               @if(isset($bracket['winner_text']))
                                                    @if($bracket['winner_text']=='edit')
                                                        @if(isset($bracket['id']))
                                                            <a href="javascript:void(0)" id="scheduleEdit_{{$bracket['id']}}" onclick="editMatchSchedule({{$bracket['schdule_id']}},1,{{$round}},'myModal')">Edit</a>
                                                        @endif    
                                                    @else
                                                        @if(isset($bracket['id']))
                                                            <a href="{{ url('match/scorecard/edit/'.$bracket['id']) }}">{{$bracket['winner_text']}}</a>
                                                        @endif    
                                                    @endif
                                               @else
                                                    @if($isOwner)
                                                        @if(isset($bracket['id']))
                                                            <a href="javascript:void(0)" id="scheduleEdit_{{$bracket['id']}}" onclick="editMatchSchedule({{$bracket['schdule_id']}},1,{{$round}},'myModal')">Edit</a>
                                                        @endif    
                                                    @endif
                                               @endif
                                               </span>
                                            </div>
                                        @endif
                                    @endif


                                   <li title="{{isset($bracket['name'])?$bracket['name']:''}}"  data-toggle="tooltip" data-placement="top">
                                       {!! Helper::Images($bracket['url'],config('constants.PHOTO_PATH.TEAMS_FOLDER_PATH'),array('class'=>'img-circle img-border','height'=>30,'width'=>30) )!!}
					@if(isset($bracket['name']))
                                                <span>
                                                   <a href="{{ url($linkUrl,[$bracket['team_or_player_id']]) }}">
                                                    {{Helper::get_first_letters($bracket['name'])}}
                                                   </a>
                                                </span>
                                        @else
                                                <span></span>
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                      	</div>
                    @endforeach
                 @endif
            </div>
       </div>
        @endif
        @endforeach
@else
        <div class="col-sm-2">
            <div class="round-one">
                <div class="round"><p>ROUND ONE</p></div>

                 @if(count($firstRoundBracketArray))
                 @foreach($firstRoundBracketArray as $key => $schedule)
                 	<div class="match_set" style="height: 150px">
                            <ul>
                                @if($isOwner)
                                    <div class="clearfix">
                                      <span class="tour_score">
                                        <a href="javascript:void(0)" id="scheduleEdit_{{$key}}"  onclick="addRoundMatchesSchedule({{$tournament_id}},1,{{$key}})">Schedule Match</a>
                                      </span>
                                    </div>
                                @endif
                                   <li>
                                       <span>Match {{$key}}</span>
                                   </li>
                                   <li>
                                       <span></span>
                                   </li>
                            </ul>
					</div>
                 @endforeach

                 @endif
            </div>
        </div>
@endif
</div>
</div>
@else
<div class="sj-alert sj-alert-info">
@if($isOwner)
                    {{ trans('message.tournament.final.addfinalteams') }}
@else
			 {{ trans('message.tournament.final.nofinalstageteams') }}
@endif		 
</div>
@endif


<script type="text/javascript">
function finalStageTeams(flag) {
//    var finalStageTeams = $("#final_stage_teams").val();
    var finalStageTeams = $('select#final_stage_teams').val();
    var tournamentId = {{$tournamentDetails[0]['id']}}
    if(!tournamentId) {
        return false;
    }
    if(flag=='group' && !finalStageTeams){
        $.alert({
                title: 'Alert!',
                content: 'Select final stage teams.'
        });
        return false;
    }
    if(flag=='ko' && $(".selected-teams").length<1){
        $.alert({
                title: 'Alert!',
                content: 'Select final stage teams.'
        });
        return false;
    }
    var html='';
//    if(Math.floor(finalStageTeams) == finalStageTeams && $.isNumeric(finalStageTeams)) {
        $.ajax({
            type: 'POST',
            url: base_url + '/tournament/updatefinalstageteams',
            data: {tournamentId:tournamentId, finalStageTeams:finalStageTeams, flag:flag},
            dataType: 'json',
            beforeSend: function() {
                $.blockUI({width: '50px', message: $("#spinner").html()});
            },
            success: function(response) {
                $.unblockUI();
                window.location.reload();
//                html ='<div class="col-sm-10">';
//                html+='<div class="col-sm-8">';
//                html+='<div class="row group-flex-content">';
//                html+='<div class="col-sm-3">';
//                html+='<div class="row round-one">';
//                html+='<div class="round"><p>ROUND ONE</p></div>';
//                html+='<span class="button btn-primary" onclick="addRoundMatchesSchedule('+tournamentId+',1)">Add Schedule</span>';
//                html+='</div>';
//                html+='</div>';
//                html+='</div>';
//                html+='</div>';
//                html+='</div>';
//                $("#final_stage_div").html(html);

            }
        });
//    }
}

function addRoundMatches(tournamentId,roundNumber) {
    var finalStageTeamsCount = $("#final_stage_teams_count").val();
    var teamIds = $("#team_ids").val();
    $.ajax({
            type: 'GET',
            url: base_url + '/tournament/addRoundMatches',
            data: {tournamentId:tournamentId, finalStageTeamsCount:finalStageTeamsCount, roundNumber:roundNumber, teamIds:teamIds},
            dataType: 'html',
            beforeSend: function() {
                $.blockUI({width: '50px', message: $("#spinner").html()});
            },
            success: function(response) {
                $.unblockUI();
            }
    });
}

function addRoundMatchesSchedule(tournamentId,roundNumber, matchNumber) {
    $.ajax({
            type: 'GET',
            url: base_url + '/tournament/getroundteams',
            data: {tournamentId:tournamentId, roundNumber:roundNumber, matchNumber:matchNumber},
            dataType: 'json',
            beforeSend: function() {
                $.blockUI({width: '50px', message: $("#spinner").html()});
            },
            success: function(response) {
                $.unblockUI();
                $('#bye').prop("selectedIndex","0");
                if(response['result'] == 'success') {
                    $("#myModal").modal();
                    $("#byeDiv").show();
                    $("#byeTextDiv").hide();
                    clearModal();
                    
                    var tournamentDetails = response['tournamentDetails'];
                    $(".modal-body #search_team_ids").val(response['searchTeamIds']);
                    $(".modal-body #tournament_round_number").val(roundNumber);
                    $(".modal-body #tournament_id").val(tournamentId);
//                    $(".modal-body #tournament_match_number").val(response['matchNumber']);
                    $(".modal-body #tournament_match_number").val(matchNumber);
                    $(".modal-body #scheduletype").val(response['scheduleType']);
                    
                   autofillsubtournamentdetails(tournamentDetails);
                }
            }
    });
}

</script>