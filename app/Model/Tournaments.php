<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Sofa\Eloquence\Eloquence;
use App\Helpers\Helper;
use Auth;

class Tournaments extends Model
{

    use SoftDeletes,
        Eloquence;

    protected $table             = 'tournaments';
    protected $dates             = ['deleted_at'];
    protected $searchableColumns = ['name',
        'location'];
    protected $morphClass        = 'tournaments';
    protected $fillable          = array(
        'id',
        'name',
        'created_by',
        'sports_id',
        'start_date',
        'end_date',
        'contact_number',
        'email',
        'location',
        'longitude',
        'latitude',
        'address',
        'city_id',
        'city',
        'state_id',
        'state',
        'country_id',
        'country',
        'zip',
        'groups_number',
        'groups_teams',
        'facility_id',
        'prize_money',
        'enrollment_fee',
        'points_win',
        'points_loose',
        'status',
        'description',
        'final_stage_teams',
        'type',
        'facility_name',
        'schedule_type',
        'alternate_contact_number',
        'contact_name',
        'logo',
        'tournament_parent_id',
        'tournament_parent_name',
        'manager_id',
        'match_type',
        'player_type');

    public function sports()
    {
        return $this->hasMany('App\Model\Sport', 'id', 'sports_id');
    }

    public function photos()
    {
        $this->morphClass = 'tournaments';
        return $this->morphMany('App\Model\Photo', 'imageable')->where('imageable_type', 'tournaments')->where('is_album_cover', 1);
    }

    public function photo()
    {
        $this->morphClass = 'form_gallery_tournaments';
        return $this->morphMany('App\Model\Photo', 'imageable')->where('imageable_type', 'form_gallery_tournaments')->where('is_album_cover', 1);
    }

    public function groups()
    {
        return $this->hasMany('App\Model\TournamentGroups', 'tournament_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id');
    }

    public function sport()
    {
        return $this->belongsTo('App\Model\Sport', 'sports_id');
    }

    public function searchResults($req_params)
    {
        $offset = !empty($req_params['offset']) ? $req_params['offset'] : 0;
        $limit  = !empty($req_params['limit']) ? $req_params['limit'] : config('constants.LIMIT');
        $query  = $this->search($req_params['search_by']);
        if (trim($req_params['sport']) != '')
        {
            $query = $this
                ->search($req_params['search_by'])
                ->whereIn('sports_id', explode(",", $req_params['sport']));
        }
        if ($req_params['amount'] != '')
        {
            $amount = explode("-", $req_params['amount']);
            $query  = $query->whereBetween('enrollment_fee', $amount);
        }
        if (trim($req_params['search_city_id']) != '')
        {
            $query = $query->where('city_id', trim($req_params['search_city_id']));
        }

        $query = $query->where('isactive', 1);
        $query = $query->whereNull('deleted_at');
        //echo $query;exit;	

        $totalresult = $query->get();
        $total       = count($totalresult);
        $result      = $query->limit($limit)->offset($offset)->orderBy('updated_at', 'desc')->get();
        $response    = array(
            'result' => $result,
            'total' => $total);
        return $response;
    }
}