@extends(Auth::user() ? 'layouts.app' : 'home.layout')
@section('content')

<?php 
    $team_a_name = $user_a_name;
    $team_b_name = $user_b_name;

    $team_a_id=$match_data[0]['a_id'];
    $team_b_id=$match_data[0]['b_id'];

    $player_a_ids=$match_data[0]['player_a_ids'];
    $player_b_ids=$match_data[0]['player_b_ids'];

    $match_details=json_decode($match_data[0]['match_details']);

    isset($match_details->preferences)?$preferences=$match_details->preferences:[];
    
    if(isset($preferences->number_of_sets))$set=$preferences->number_of_sets ;
    else $set=3;
?>

<div class="col_standard table_tennis_scorcard">
    <div id="team_vs" class="tt_bg">
      <div class="container">
          <div class="row">
                <div class="team team_one col-xs-5">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                        	<div class="team_logo">
                       
						 @if($user_a_logo['url']!='')
							<!--<img class="img-responsive img-circle" width="270" height="204" src="{{ url('/uploads/'.$upload_folder.'/'.$user_a_logo['url']) }}" onerror="this.onerror=null;this.src='{{ asset('/images/default-profile-pic.jpg') }}';">-->
						  {!! Helper::Images($user_a_logo['url'],$upload_folder,array('class'=>'img-responsive img-circle','height'=>110,'width'=>110) )!!}	
							@else
							<!--<img  class="img-responsive img-circle" width="270" height="204" src="{{ asset('/images/default-profile-pic.jpg') }}">-->
							 {!! Helper::Images('default-profile-pic.jpg','images',array('class'=>'img-responsive img-circle','height'=>110,'width'=>110) )!!}	
						@endif
                        	</div>
                        </div>
                        <div class="col-md-8 col-sm-12">
                        	<div class="team_detail">
	                    @if($match_data[0]['schedule_type']=='player')
                          <div class="team_name"><a href="{{ url('/editsportprofile/'.$match_data[0]['a_id'])}}">{{ $user_a_name }}</a></div>
						@else
							<div class="team_name"><a href="{{ url('/team/members').'/'.$match_data[0]['a_id'] }}">{{ $user_a_name }}</a></div>
						@endif
							  <div class="team_city">{!! $team_a_city !!}</div>
                         	</div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-2">
                    <span class="vs"></span>
                </div>
                <div class="team team_two col-xs-5">
                  <div class="row">
                       <div class="col-md-8 col-sm-12 visible-md visible-lg">
                        <div class="team_detail">
                        @if($match_data[0]['schedule_type']=='player')
                          <div class="team_name"><a href="{{ url('/editsportprofile/'.$match_data[0]['b_id'])}}">{{ $user_b_name }}</a></div>
						@else
							<div class="team_name"><a href="{{ url('/team/members').'/'.$match_data[0]['b_id'] }}">{{ $user_b_name }}</a></div>
						@endif
							 <div class="team_city">{!! $team_b_city !!}</div>
                            </div>
                        </div>
                              <div class="col-md-4 col-sm-12">
                              	<div class="team_logo">
                                
								
								 @if($user_b_logo['url']!='')
                <!--<img class="img-responsive img-circle" width="270" height="204" src="{{ url('/uploads/'.$upload_folder.'/'.$user_b_logo['url']) }}" onerror="this.onerror=null;this.src='{{ asset('/images/default-profile-pic.jpg') }}';">-->
			 {!! Helper::Images($user_b_logo['url'],$upload_folder,array('class'=>'img-responsive img-circle','height'=>110,'width'=>110) )!!}	
                @else
               <!-- <img  class="img-responsive img-circle"width="270" height="204" src="{{ asset('/images/default-profile-pic.jpg') }}">-->
		   	 {!! Helper::Images('default-profile-pic.jpg','images',array('class'=>'img-responsive img-circle','height'=>110,'width'=>110) )!!}	
              @endif
              </div>
                              </div>
                              <div class="col-md-8 col-sm-12 visible-xs visible-sm">
                        		<div class="team_detail">
                            		@if($match_data[0]['schedule_type']=='player')
                                      <div class="team_name"><a href="{{ url('/editsportprofile/'.$match_data[0]['b_id'])}}">{{ $user_b_name }}</a></div>
                                    @else
                                        <div class="team_name"><a href="{{ url('/team/members').'/'.$match_data[0]['b_id'] }}">{{ $user_b_name }}</a></div>
                                    @endif
                                         <div class="team_city">{!! $team_b_city !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if(!is_null($match_data[0]['tournament_id']))
                <div class='row'>
                    <div class='col-xs-12'>
                        <div class='match_loc'>
                            {{$tournamentDetails[0]['name']}}
                                
                        </div>
                    </div>
                </div>
            @endif
            
            <div class="row">
              <div class="col-xs-12">
                  <div class="match_loc">
                      {{ date('jS F , Y',strtotime($match_data[0]['match_start_date'])).' - '.date("g:i a", strtotime($match_data[0]['match_start_time'])).(($match_data[0]['facility_name']!='')?' , '.$match_data[0]['facility_name']:'').(($match_data[0]['address']!='')?' , '.$match_data[0]['address']:'') }}
                    </div>
                </div>
            </div>
			<h5 class="scoreboard_title">Squash Scorecard @if($match_data[0]['match_type']!='other')
											<span class='match_type_text'>({{ $match_data[0]['match_type']=='odi'?strtoupper($match_data[0]['match_type']):ucfirst($match_data[0]['match_type']) }})</span>
									@endif</h5>
        </div>
          @if (session('status'))
          <div class="alert alert-success">{{ session('status') }}</div>
          @endif
    </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12">
    <div class="form-inline">    
	@if($match_data[0]['winner_id']>0)
	<div class="form-group">
        <label class="win_head">Winner</label>
        <h3 class="win_team">{{ ($match_data[0]['a_id']==$match_data[0]['winner_id'])?$user_a_name:$user_b_name }}</h3>
    </div>
	@else

      <div class="form-group">
        <label>Winner is not updated</label>

      </div>

	@endif
    <p class="match-status mg"><a href="{{ url('user/album/show').'/match'.'/0'.'/'.$action_id }}"><span class="fa" style="float: left; margin-left: 8px;"><img src="{{ asset('/images/sc-gallery.png') }}" height="18" width="22"></span> <b>Media Gallery</b></a></p>
	@include('scorecards.share')
        <p class="match-status">@include('scorecards.scorecardstatusview')</p>
    </div>

  <div class="row">
    <div class="col-sm-12">
   <div class='table-responsive'>
      <table class='table table-striped table-bordered'>
        <thead>
          <tr class='team_fall team_title_head'>
             <th>TEAMS</th>
             <th>PLAYERS</th>
              <th>SET 1</th>
            @if($set>1)
              <th>SET 2</th>
              <th>SET 3</th>
            @endif 
            @if($set>3)
              <th>SET 4</th>
              <th>SET 5</th>
            @endif
          </tr>
        </thead>
        <tbody>
             <tr>
            <td>{{$score_a_array['team_name']}}</td>
            <td>{{$score_a_array['player_name_a']}} / {{$score_a_array['player_name_b']}}</td>
            <td class='a_set1'>{{$score_a_array['set1']}}</td>
          @if($set>1)
            <td class='a_set2'>{{$score_a_array['set2']}}</td>
            <td class='a_set3'>{{$score_a_array['set3']}}</td>
          @endif

           @if($set>3)
            <td class='a_set4'>{{$score_a_array['set4']}}</td>
            <td class='a_set5'>{{$score_a_array['set5']}}</td>
          @endif
        </tr>

          <tr>
            <td>{{$score_a_array['team_name']}}</td>
            <td>{{$score_b_array['player_name_a']}} / {{$score_b_array['player_name_b']}}</td>
            <td class='b_set1'>{{$score_b_array['set1']}}</td>
          @if($set>1)
            <td class='b_set2'>{{$score_b_array['set2']}}</td>
            <td class='b_set3'>{{$score_b_array['set3']}}</td>
          @endif

           @if($set>3)
            <td class='b_set4'>{{$score_b_array['set4']}}</td>
            <td class='b_set5'>{{$score_b_array['set5']}}</td>
          @endif
        </tr>

        </tbody>
        </tbody>
      </table>
    </div>

	
	<!-- if match schedule type is team -->

	<!-- end -->
	
    <div class="sportsjun-forms text-center scorecards-buttons">
	<input type="hidden" name="match_id" id="match_id" value="{{$match_data[0]['id']}}">
	@if($isValidUser && $isApproveRejectExist)
		
	<button style="text-align:center;" type="button" onclick="scoreCardStatus('approved');" class="button green">Approve</button>
	<button style="text-align:center;" type="button" onclick="scoreCardStatus('rejected');" class="button black">Reject</button><br />	
	
	<textarea name="rej_note" id="rej_note" rows="4" cols="50" placeholder="Reject Note" style="margin:20px 0 10px 0;"></textarea>
    @endif
    </div>
   </div>
   </div>
  </div>
</div>
</div>
</div>

<script>
//Send Approve
function scoreCardStatus(status)
{
		var msg = ' Reject ';
	if(status=='approved')
		var msg = ' Approve ';
	$.confirm({
	title: 'Confirmation',
	content: 'Are You Sure You Want To '+msg+' This ScoreCard?',
	confirm: function() {
		match_id = $('#match_id').val();
		rej_note = $('#rej_note').val();
		$.ajax({
            url: base_url+'/match/scoreCardStatus',
            type: "post",
            data: {'scorecard_status': status,'match_id':match_id,'rej_note':rej_note,'sport_name':'Squash'},
            success: function(data) {
                if(data.status == 'success') {
					window.location.href = base_url+'/match/scorecard/edit/'+match_id;
                }
            }
		});
	},
	cancel: function() {
			// nothing to do
		}
	});
}


function getMatchDetails(){

  var data={
    match_id:{{$match_data[0]['id']}}
  }

  var base_url=base_url || secure_url;
        $.ajax({
            url:  base_url+'/viewpublic/match/getSquashDetails', 
            type:'get', 
            dataType:'json',
            data:data,
            success:function(response){
                var left_team_id=response.preferences.left_team_id;
                var right_team_id=response.preferences.right_team_id;

                  $.each(response.match_details, function(key, value){
                      $('.a_'+key).html(value[left_team_id+'_score']);
                      $('.b_'+key).html(value[right_team_id+'_score']);
                  })
            }
        })
}

@if($match_data[0]['match_status']!='completed')
window.setInterval(getMatchDetails, 10000);
@endif

</script>
@endsection