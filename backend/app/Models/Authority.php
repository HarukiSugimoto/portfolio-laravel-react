<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Authority extends Model
{
    protected $fillable = [
        'name',
    ];
    
    protected $appends = [
        'detail_nos',
    ];

    public function authorityDetails()
    {
        return $this->hasMany(AuthorityDetail::class);
    }

    /**
     * @return array
     * 権限が持つ権限詳細番号の配列を返す
     */
    public function getDetailNosAttribute()
    {
        $list = [];
        $authority_details = $this->authorityDetails()->pluck('detail_no', 'detail_no');
        foreach (config('model.authorityDetailNo') as $key => $val) {
            if (isset($authority_details[$key])) {
                $list[] = $key;
            }
        }

        return $list;
    }
    /**
     * 権限詳細番号の配列を同期する
     *
     * @param array $detailNos
     * 権限詳細番号の配列
     * @return void
     */
    public function syncAuthorityDetails(array $detailNos)
    {
        $currentDetailNos = $this->authorityDetails()->pluck('detail_no')->toArray();
        $toAdd = array_diff($detailNos, $currentDetailNos);
        $toRemove = array_diff($currentDetailNos, $detailNos);

        foreach ($toAdd as $detailNo) {
            $this->authorityDetails()->create(['detail_no' => $detailNo]);
        }

        foreach ($toRemove as $detailNo) {
            $this->authorityDetails()->where('detail_no', $detailNo)->delete();
        }
    }



}
